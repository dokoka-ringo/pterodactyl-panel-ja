<?php

return [
    'validation' => [
        'fqdn_not_resolvable' => 'FQDNまたはIPアドレスが有効なIPアドレスに解決されていません。',
        'fqdn_required_for_ssl' => 'このノードでSSLを使用するには、パブリックIPアドレスに解決されるFQDNが必要です。',
    ],
    'notices' => [
        'allocations_added' => 'このノードに割り当てが正常に追加されました。',
        'node_deleted' => 'パネルからノードが削除されました。',
        'location_required' => 'このパネルにノードを追加する前に、少なくとも1つのロケーションが設定されている必要があります。',
        'node_created' => '新しいノードの作成に成功しました。このマシンのデーモンは、\'Configuration\'タブで自動的に設定することができます。<strong>サーバーを追加する前に、まず少なくとも1つのIPアドレスとポートを割り当てる必要があります。</strong>',
        'node_updated' => 'ノード情報が更新されました。デーモンの構成が変更されている場合は、変更を反映するために再起動する必要があります。',
        'unallocated_deleted' => '<code>:ip</code> の未割り当てポートをすべて削除しました。',
    ],
];
