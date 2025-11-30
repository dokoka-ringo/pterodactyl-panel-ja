@extends('layouts.admin')

@section('title')
    データベースホスト &rarr; 詳細ビュー &rarr; {{ $host->name }}
@endsection

@section('content-header')
    <h1>{{ $host->name }}<small>このデータベースホストに関連するデータベースとその詳細を表示しています。</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">管理</a></li>
        <li><a href="{{ route('admin.databases') }}">データベースホスト</a></li>
        <li class="active">{{ $host->name }}</li>
    </ol>
@endsection

@section('content')
<form action="{{ route('admin.databases.view', $host->id) }}" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ホストの詳細</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="pName" class="form-label">名前</label>
                        <input type="text" id="pName" name="name" class="form-control" value="{{ old('name', $host->name) }}" />
                    </div>
                    <div class="form-group">
                        <label for="pHost" class="form-label">ホスト</label>
                        <input type="text" id="pHost" name="host" class="form-control" value="{{ old('host', $host->host) }}" />
                        <p class="text-muted small">新しいデータベースを追加するために、<em>パネルから</em>このMySQLホストに接続する際に使用すべきIPアドレスまたはFQDN。</p>
                    </div>
                    <div class="form-group">
                        <label for="pPort" class="form-label">ポート</label>
                        <input type="text" id="pPort" name="port" class="form-control" value="{{ old('port', $host->port) }}" />
                        <p class="text-muted small">このホストでMySQLが実行されているポート番号。</p>
                    </div>
                    <div class="form-group">
                        <label for="pNodeId" class="form-label">割り当てられたノード</label>
                        <select name="node_id" id="pNodeId" class="form-control">
                            <option value="">なし</option>
                            @foreach($locations as $location)
                                <optgroup label="{{ $location->short }}">
                                    @foreach($location->nodes as $node)
                                        <option value="{{ $node->id }}" {{ $host->node_id !== $node->id ?: 'selected' }}>{{ $node->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <p class="text-muted small">この設定は、選択したノード上のサーバーにデータベースを追加する際に、デフォルトでこのデータベースホストを使用する以外の機能はありません。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ユーザーの詳細</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="pUsername" class="form-label">ユーザー名</label>
                        <input type="text" name="username" id="pUsername" class="form-control" value="{{ old('username', $host->username) }}" />
                        <p class="text-muted small">システム上で新しいユーザーやデータベースを作成するための十分な権限を持つアカウントのユーザー名。</p>
                    </div>
                    <div class="form-group">
                        <label for="pPassword" class="form-label">パスワード</label>
                        <input type="password" name="password" id="pPassword" class="form-control" />
                        <p class="text-muted small">設定されたアカウントのパスワード。割り当てられたパスワードを引き続き使用する場合は空白のままにしてください。</p>
                    </div>
                    <hr />
                    <p class="text-danger small text-left">このデータベースホストに対して定義されたアカウントには、<strong>必ず</strong> <code>WITH GRANT OPTION</code> 権限が必要です。この権限がない場合、データベース作成のリクエストは<em>失敗</em>します。<strong>このパネルに設定したMySQLのアカウント情報と同じアカウント情報を使用しないでください。</strong></p>
                </div>
                <div class="box-footer">
                    {!! csrf_field() !!}
                    <button name="_method" value="PATCH" class="btn btn-sm btn-primary pull-right">保存</button>
                    <button name="_method" value="DELETE" class="btn btn-sm btn-danger pull-left muted muted-hover"><i class="fa fa-trash-o"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">データベース</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>サーバー</th>
                        <th>データベース名</th>
                        <th>ユーザー名</th>
                        <th>からの接続</th>
                        <th>最大接続</th>
                        <th></th>
                    </tr>
                    @foreach($databases as $database)
                        <tr>
                            <td class="middle"><a href="{{ route('admin.servers.view', $database->getRelation('server')->id) }}">{{ $database->getRelation('server')->name }}</a></td>
                            <td class="middle">{{ $database->database }}</td>
                            <td class="middle">{{ $database->username }}</td>
                            <td class="middle">{{ $database->remote }}</td>
                            @if($database->max_connections != null)
                                <td class="middle">{{ $database->max_connections }}</td>
                            @else
                                <td class="middle">無制限</td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('admin.servers.view.database', $database->getRelation('server')->id) }}">
                                    <button class="btn btn-xs btn-primary">管理</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @if($databases->hasPages())
                <div class="box-footer with-border">
                    <div class="col-md-12 text-center">{!! $databases->render() !!}</div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
        $('#pNodeId').select2();
    </script>
@endsection
