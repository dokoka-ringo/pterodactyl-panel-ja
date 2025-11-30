import React, { useEffect, useState } from 'react';
import { ServerContext } from '@/state/server';
import TitledGreyBox from '@/components/elements/TitledGreyBox';
import reinstallServer from '@/api/server/reinstallServer';
import { Actions, useStoreActions } from 'easy-peasy';
import { ApplicationStore } from '@/state';
import { httpErrorToHuman } from '@/api/http';
import tw from 'twin.macro';
import { Button } from '@/components/elements/button/index';
import { Dialog } from '@/components/elements/dialog';

export default () => {
    const uuid = ServerContext.useStoreState((state) => state.server.data!.uuid);
    const [modalVisible, setModalVisible] = useState(false);
    const { addFlash, clearFlashes } = useStoreActions((actions: Actions<ApplicationStore>) => actions.flashes);

    const reinstall = () => {
        clearFlashes('settings');
        reinstallServer(uuid)
            .then(() => {
                addFlash({
                    key: 'settings',
                    type: 'success',
                    message: 'サーバーは再インストールプロセスを開始しました。',
                });
            })
            .catch((error) => {
                console.error(error);

                addFlash({ key: 'settings', type: 'error', message: httpErrorToHuman(error) });
            })
            .then(() => setModalVisible(false));
    };

    useEffect(() => {
        clearFlashes();
    }, []);

    return (
        <TitledGreyBox title={'サーバーを再インストール'} css={tw`relative`}>
            <Dialog.Confirm
                open={modalVisible}
                title={'サーバーの再インストールを確認'}
                confirm={'はい、サーバーを再インストールします'}
                onClose={() => setModalVisible(false)}
                onConfirmed={reinstall}
            >
                サーバーは停止し、このプロセス中に一部のファイルが削除または変更される場合があります。続行しますか？
            </Dialog.Confirm>
            <p css={tw`text-sm`}>
                サーバーを再インストールすると、サーバーは停止し、最初に設定されたインストールスクリプトを再実行します。&nbsp;
                <strong css={tw`font-medium`}>
                    一部のファイルは、このプロセス中に削除または変更される場合があります。継続する前にデータをバックアップしてください。
                </strong>
            </p>
            <div css={tw`mt-6 text-right`}>
                <Button.Danger variant={Button.Variants.Secondary} onClick={() => setModalVisible(true)}>
                    サーバーを再インストール
                </Button.Danger>
            </div>
        </TitledGreyBox>
    );
};
