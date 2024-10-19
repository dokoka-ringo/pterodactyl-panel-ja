<?php

/**
 * 異なるアクティビティログイベントのためのすべての翻訳文字列が含まれています。
 * これらは、イベント名のコロン（:）の前の値でキー付けされるべきです。
 * コロンが存在しない場合は、トップレベルに配置されるべきです。
 */
return [
    'auth' => [
        'fail' => 'ログイン失敗',
        'success' => 'ログイン',
        'password-reset' => 'パスワードのリセット',
        'reset-password' => 'パスワードのリセット要求',
        'checkpoint' => '二要素認証を要求',
        'recovery-token' => '二要素回復トークンを使用',
        'token' => '2要素チャレンジ成功',
        'ip-blocked' => '未登録のIPアドレスからの :identifier に対するリクエストをブロック',
        'sftp' => [
            'fail' => 'SFTPログイン失敗',
        ],
    ],
    'user' => [
        'account' => [
            'email-changed' => 'メールアドレスを :old から :new に変更',
            'password-changed' => 'パスワードを変更',
        ],
        'api-key' => [
            'create' => '新しいAPIキー :identifier を作成',
            'delete' => 'APIキー :identifier を削除',
        ],
        'ssh-key' => [
            'create' => 'アカウントにSSHキー :fingerprint を追加',
            'delete' => 'アカウントからSSHキー :fingerprint を削除',
        ],
        'two-factor' => [
            'create' => '二要素認証を有効化',
            'delete' => '二要素認証を無効化',
        ],
    ],
    'server' => [
        'reinstall' => 'サーバーの再インストール',
        'console' => [
            'command' => 'サーバー上で ":command" を実行',
        ],
        'power' => [
            'start' => 'サーバーを起動',
            'stop' => 'サーバーを停止',
            'restart' => 'サーバーを再起動',
            'kill' => 'サーバープロセスを強制終了',
        ],
        'backup' => [
            'download' => 'バックアップ :name をダウンロード',
            'delete' => 'バックアップ :name を削除',
            'restore' => 'バックアップ :name を復元 (削除されたファイル: :truncate)',
            'restore-complete' => 'バックアップ :name の復元が完了',
            'restore-failed' => 'バックアップ :name の復元を完了できませんでした',
            'start' => '新しいバックアップを :name で開始',
            'complete' => 'バックアップ :nameを完了としてマーク',
            'fail' => 'バックアップ :name を失敗としてマーク',
            'lock' => 'バックアップ :name をロック',
            'unlock' => 'バックアップ :name のロックを解除',
        ],
        'database' => [
            'create' => '新しいデータベースを :name で作成',
            'rotate-password' => 'データベース :name のパスワードを変更',
            'delete' => 'データベース :name を削除',
        ],
        'file' => [
            'compress_one' => ':directory:file を圧縮',
            'compress_other' => ':directory の :count ファイルを圧縮',
            'read' => ':file の内容を表示',
            'copy' => ':file のコピーを作成',
            'create-directory' => ':directory:name ディレクトリを作成',
            'decompress' => 'directory:file を解凍',
            'delete_one' => ':directory:files.0 を削除',
            'delete_other' => ':directory の :count ファイルを削除',
            'download' => ':file をダウンロード',
            'pull' => 'リモートファイルを :url から :directory にダウンロード',
            'rename_one' => '名前が :directory:files.0.from から :directory:files.0.to に変更',
            'rename_other' => ':directory の :count ファイルの名前を変更',
            'write' => '新しい内容を :file に書き込み',
            'upload' => 'ファイルのアップロードを開始',
            'uploaded' => ':directory:file をアップロード',
        ],
        'sftp' => [
            'denied' => '権限によりSFTPアクセスをブロック',
            'create_one' => ':files.0 を作成',
            'create_other' => ':count 個の新しいファイルが作成されました',
            'write_one' => ':files.0 の内容を変更',
            'write_other' => ':count ファイルの内容を変更',
            'delete_one' => ':files.0 を削除',
            'delete_other' => ':count ファイルを削除',
            'create-directory_one' => ':files.0 ディレクトリを作成',
            'create-directory_other' => ':count ディレクトリを作成',
            'rename_one' => '名前が :files.0.from から :files.0.to に変更',
            'rename_other' => ':count ファイルを名前変更または移動',
        ],
        'allocation' => [
            'create' => ':allocation をサーバーに追加',
            'notes' => ':allocation のメモを ":old" から ":new" に更新',
            'primary' => ':allocation をプライマリ割り当てとして設定',
            'delete' => ':allocation 割り当てを削除',
        ],
        'schedule' => [
            'create' => ':name スケジュールを作成',
            'update' => ':name スケジュールを更新',
            'execute' => ':name スケジュールを手動で実行',
            'delete' => ':name スケジュールを削除',
        ],
        'task' => [
            'create' => ':name スケジュール用に新しい ":action" タスクを作成',
            'update' => ':name スケジュールの ":action" タスクを更新',
            'delete' => ':name スケジュールのタスクを削除',
        ],
        'settings' => [
            'rename' => 'サーバーの名前を :old から :new に変更',
            'description' => 'サーバーの説明を :old から :new に変更',
        ],
        'startup' => [
            'edit' => ':variable 変数を ":old" から ":new" に変更',
            'image' => 'サーバーのDockerイメージを :old から :new に更新',
        ],
        'subuser' => [
            'create' => ':email をサブユーザーとして追加',
            'update' => ':email のサブユーザー権限を更新',
            'delete' => ':email をサブユーザーから削除',
        ],
    ],
];
