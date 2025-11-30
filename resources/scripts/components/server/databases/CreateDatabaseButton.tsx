import React, { useState } from 'react';
import Modal from '@/components/elements/Modal';
import { Form, Formik, FormikHelpers } from 'formik';
import Field from '@/components/elements/Field';
import { object, string } from 'yup';
import createServerDatabase from '@/api/server/databases/createServerDatabase';
import { ServerContext } from '@/state/server';
import { httpErrorToHuman } from '@/api/http';
import FlashMessageRender from '@/components/FlashMessageRender';
import useFlash from '@/plugins/useFlash';
import Button from '@/components/elements/Button';
import tw from 'twin.macro';

interface Values {
    databaseName: string;
    connectionsFrom: string;
}

const schema = object().shape({
    databaseName: string()
        .required('データベース名を提供する必要があります。')
        .min(3, 'データベース名は少なくとも3文字でなければなりません。')
        .max(48, 'データベース名は48文字を超えてはなりません。')
        .matches(
            /^[\w\-.]{3,48}$/,
            'データベース名には、英数字、アンダースコア、ダッシュ、および/または期間のみを含める必要があります。'
        ),
    connectionsFrom: string().matches(/^[\w\-/.%:]+$/, '有効なホストアドレスを提供する必要があります。'),
});

export default () => {
    const uuid = ServerContext.useStoreState((state) => state.server.data!.uuid);
    const { addError, clearFlashes } = useFlash();
    const [visible, setVisible] = useState(false);

    const appendDatabase = ServerContext.useStoreActions((actions) => actions.databases.appendDatabase);

    const submit = (values: Values, { setSubmitting }: FormikHelpers<Values>) => {
        clearFlashes('database:create');
        createServerDatabase(uuid, {
            databaseName: values.databaseName,
            connectionsFrom: values.connectionsFrom || '%',
        })
            .then((database) => {
                appendDatabase(database);
                setVisible(false);
            })
            .catch((error) => {
                addError({ key: 'database:create', message: httpErrorToHuman(error) });
                setSubmitting(false);
            });
    };

    return (
        <>
            <Formik
                onSubmit={submit}
                initialValues={{ databaseName: '', connectionsFrom: '' }}
                validationSchema={schema}
            >
                {({ isSubmitting, resetForm }) => (
                    <Modal
                        visible={visible}
                        dismissable={!isSubmitting}
                        showSpinnerOverlay={isSubmitting}
                        onDismissed={() => {
                            resetForm();
                            setVisible(false);
                        }}
                    >
                        <FlashMessageRender byKey={'database:create'} css={tw`mb-6`} />
                        <h2 css={tw`text-2xl mb-6`}>新しいデータベースを作成</h2>
                        <Form css={tw`m-0`}>
                            <Field
                                type={'string'}
                                id={'database_name'}
                                name={'databaseName'}
                                label={'データベース名'}
                                description={'データベースインスタンスの記述名。'}
                            />
                            <div css={tw`mt-6`}>
                                <Field
                                    type={'string'}
                                    id={'connections_from'}
                                    name={'connectionsFrom'}
                                    label={'からの接続'}
                                    description={
                                        '接続を許可する必要がある場合。どこからでも接続を許可するために空白のままにします。'
                                    }
                                />
                            </div>
                            <div css={tw`flex flex-wrap justify-end mt-6`}>
                                <Button
                                    type={'button'}
                                    isSecondary
                                    css={tw`w-full sm:w-auto sm:mr-2`}
                                    onClick={() => setVisible(false)}
                                >
                                    キャンセル
                                </Button>
                                <Button css={tw`w-full mt-4 sm:w-auto sm:mt-0`} type={'submit'}>
                                    データベースを作成
                                </Button>
                            </div>
                        </Form>
                    </Modal>
                )}
            </Formik>
            <Button onClick={() => setVisible(true)}>新しいデータベース</Button>
        </>
    );
};
