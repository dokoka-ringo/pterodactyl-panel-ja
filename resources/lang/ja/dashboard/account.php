<?php

return [
    'email' => [
        'title' => 'メールアドレスの更新',
        'updated' => 'メールアドレスが更新されました。',
    ],
    'password' => [
        'title' => 'パスワードの変更',
        'requirements' => '新しいパスワードは8文字以上にしてください。',
        'updated' => 'パスワードが更新されました。',
    ],
    'two_factor' => [
        'button' => '2要素認証を設定',
        'disabled' => 'あなたのアカウントで二要素認証が無効になりました。ログイン時にトークンの入力を求められることはありません。',
        'enabled' => 'あなたのアカウントで二要素認証が有効になりました。今後、ログインの際には、お使いのデバイスで生成されたコードを入力する必要があります。',
        'invalid' => '無効なトークンです',
        'setup' => [
            'title' => '二要素認証を設定',
            'help' => 'コードをスキャンできませんか？下のコードをアプリケーションに入力してください：',
            'field' => 'トークンを入力',
        ],
        'disable' => [
            'title' => '二要素認証を無効にする',
            'field' => 'トークンを入力',
        ],
    ],
];
