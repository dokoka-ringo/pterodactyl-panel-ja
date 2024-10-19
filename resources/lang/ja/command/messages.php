<?php

return [
    'location' => [
        'no_location_found' => '入力されたショートコードに一致するレコードが見つかりませんでした。',
        'ask_short' => 'ロケーションショートコード',
        'ask_long' => 'ロケーションの詳細',
        'created' => 'IDが :id の新しいロケーション (:name) の作成に成功した。',
        'deleted' => '要求されたlocationの削除に成功しました。',
    ],
    'user' => [
        'search_users' => 'ユーザー名、ユーザーID、またはメールアドレスを入力してください。',
        'select_search_user' => '削除するユーザーのID (再検索する場合は\'0\'を入力)',
        'deleted' => 'Panel からユーザが正常に削除された。',
        'confirm_delete' => '本当にこのユーザをパネルから削除しますか？',
        'no_users_found' => '該当するユーザーが見つかりませんでした。',
        'multiple_found' => '指定されたユーザーに対して複数のアカウントが見つかりました。--no-interactionフラグのため、ユーザーを削除できません。',
        'ask_admin' => 'このユーザーは管理者ですか？',
        'ask_email' => 'メールアドレス',
        'ask_username' => 'ユーザー名',
        'ask_name_first' => '名',
        'ask_name_last' => '姓',
        'ask_password' => 'パスワード',
        'ask_password_tip' => 'ユーザーにランダムなパスワードをメールで送信してアカウントを作成したい場合は、このコマンドを再実行（CTRL+C）し、`--no-password`フラグを渡します。',
        'ask_password_help' => 'パスワードの長さは8文字以上で、少なくとも1つの大文字と数字を含んでいる必要があります。',
        '2fa_help_text' => [
            'このコマンドは、ユーザアカウントの2FAが有効になっている場合に2FAを無効にします。これは、ユーザがアカウントからロックアウトされた場合にのみ、アカウント回復コマンドとして使用されるべきです。',
            'このプロセスを中断するには、CTRL+Cキーを押します。',
        ],
        '2fa_disabled' => ':email の2要素認証は無効になっています。',
    ],
    'schedule' => [
        'output_line' => '`:schedule`の最初のタスクに対するジョブのディスパッチ (:hash).',
    ],
    'maintenance' => [
        'deleting_service_backup' => 'サービスバックアップファイルの削除 :file',
    ],
    'server' => [
        'rebuild_failed' => 'ノード ":node " の ":name" (#:id) に対する再構築リクエストにエラーが発生しました: :message',
        'reinstall' => [
            'failed' => 'ノード ":node " の ":name" (#:id) の再インストール要求に失敗しました: :message',
            'confirm' => 'サーバーグループに対して再インストールしようとしています。続行しますか？',
        ],
        'power' => [
            'confirm' => ':count サーバーに対して :action を実行しようとしています。続行しますか？',
            'action_failed' => 'ノード ":node " の ":name" (#:id) に対するパワーアクションリクエストに失敗しました。',
        ],
    ],
    'environment' => [
        'mail' => [
            'ask_smtp_host' => 'SMTPホスト (例: smtp.gmail.com)',
            'ask_smtp_port' => 'SMTPポート',
            'ask_smtp_username' => 'SMTPユーザー名',
            'ask_smtp_password' => 'SMTPパスワード',
            'ask_mailgun_domain' => 'Mailgunドメイン',
            'ask_mailgun_endpoint' => 'Mailgunエンドポイント',
            'ask_mailgun_secret' => 'Mailgunシークレット',
            'ask_mandrill_secret' => 'Mandrillシークレット',
            'ask_postmark_username' => 'Postmark APIキー',
            'ask_driver' => '電子メールの送信にどのドライバを使用しますか？',
            'ask_mail_from' => '送信元メールアドレス',
            'ask_mail_name' => '送信者名',
            'ask_encryption' => '使用する暗号化方式',
        ],
    ],
];
