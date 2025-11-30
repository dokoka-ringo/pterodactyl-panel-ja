<?php

return [
    'daemon_connection_failed' => 'HTTP/:code レスポンスコードでデーモンとの通信を試みている間に例外が発生しました。この例外はログに記録されました。',
    'node' => [
        'servers_attached' => 'ノードを削除するには、そのノードにリンクされているサーバーを削除する必要があります。',
        'daemon_off_config_updated' => 'デーモン構成は<strong>更新されました</strong>が、デーモンの構成ファイルを自動的に更新しようとしてエラーが発生しました。これらの変更を適用するには、デーモンの設定ファイル(config.yml)を手動で更新する必要があります。',
    ],
    'allocations' => [
        'server_using' => 'このAllocationには現在サーバーが割り当てられています。Allocationを削除できるのは、現在サーバーが割り当てられていない場合のみです。',
        'too_many_ports' => '1つのレンジに1000以上のポートを一度に追加することはサポートされていません。',
        'invalid_mapping' => 'ポートに指定されたマッピングは無効であり、処理できませんでした。',
        'cidr_out_of_range' => 'CIDR表記/25から/32までのマスクしか使用できません。',
        'port_out_of_range' => '割り当てのポートは1024以上65535以下である必要があります。',
    ],
    'nest' => [
        'delete_has_servers' => '有効なサーバーが接続されているネストは、パネルから削除できません。',
        'egg' => [
            'delete_has_servers' => 'アクティブサーバが接続されているエッグはパネルから削除できません。',
            'invalid_copy_id' => 'スクリプトのコピー元として選択されたEggが存在しないか、スクリプト自体をコピーしています。',
            'must_be_child' => 'The "Copy Settings From" このEggの "Copy Settings From "ディレクティブは、選択されたNestの子オプションでなければならない。',
            'has_children' => 'この Egg は他の Egg の親になっています。このEggを削除する前に、それらのEggを削除してください。',
        ],
        'variables' => [
            'env_not_unique' => '環境変数 :name は、このEgg固有のものでなければなりません。',
            'reserved_name' => '環境変数 :name は保護されているため、変数に割り当てることはできません。',
            'bad_validation_rule' => '検証ルール ":rule" は、このアプリケーションにとって有効なルールではありません。',
        ],
        'importer' => [
            'json_error' => 'JSONファイルを解析しようとしたときにエラーが発生しました: :error',
            'file_error' => '提供されたJSONファイルが無効です。',
            'invalid_json_provided' => '提供されたJSONファイルは認識できる形式ではありません。',
        ],
    ],
    'subusers' => [
        'editing_self' => '自分のサブユーザー アカウントを編集することは許可されていません。',
        'user_is_owner' => 'サーバー所有者をこのサーバーのサブユーザーとして追加することはできません。',
        'subuser_exists' => 'その電子メールアドレスを持つユーザーは、このサーバーのサブユーザーとしてすでに割り当てられています。',
    ],
    'databases' => [
        'delete_has_databases' => 'アクティブなデータベースがリンクされているデータベース ホスト サーバーは削除できません。',
    ],
    'tasks' => [
        'chain_interval_too_long' => '連鎖タスクの最大間隔時間は 15 分です。',
    ],
    'locations' => [
        'has_nodes' => 'アクティブなノードが接続されているロケーションは削除できません。',
    ],
    'users' => [
        'node_revocation_failed' => '<a href=":link">ノード #:node</a> でキーを取り消すことができませんでした。 :error',
    ],
    'deployment' => [
        'no_viable_nodes' => '自動展開に指定された要件を満たすノードが見つかりませんでした。',
        'no_viable_allocations' => '自動展開の要件を満たすAllocationが見つかりませんでした。',
    ],
    'api' => [
        'resource_not_found' => '要求されたリソースはこのサーバー上に存在しません。',
    ],
];
