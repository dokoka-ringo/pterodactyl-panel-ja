<?php

return [
    'notices' => [
        'created' => '新しいネスト :name が正常に作成されました。',
        'deleted' => 'パネルからネストを削除しました。',
        'updated' => 'ネスト構成オプションを更新しました。',
    ],
    'eggs' => [
        'notices' => [
            'imported' => 'Eggと関連する変数をインポートしました。',
            'updated_via_import' => 'このEggはファイルによって更新されました。',
            'deleted' => 'PanelからこのEggを削除しました。',
            'updated' => 'Eggの構成が正常に更新されました。',
            'script_updated' => 'Eggインストールスクリプトが更新され、サーバー作成時に実行されるようになりました。',
            'egg_created' => '新しいEggが導入されました。新しいEggを適用するために、実行中のデーモンを再起動する必要があります。',
        ],
    ],
    'variables' => [
        'notices' => [
            'variable_deleted' => '変数 ":variable"は削除されたため、再構築後はサーバーで利用できなくなります。',
            'variable_updated' => '変数 ":variable" が更新されました。この変数を使用しているサーバーは、変更を適用するために再構築する必要があります。',
            'variable_created' => '新しい変数が作成され、このEggに割り当てられました。',
        ],
    ],
];
