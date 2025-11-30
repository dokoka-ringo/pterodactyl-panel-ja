@extends('layouts.admin')

@section('title')
    Nests &rarr; 新しいEgg
@endsection

@section('content-header')
    <h1>新しいEgg<small>サーバーに割り当てる新しいEggを作成します。</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">管理</a></li>
        <li><a href="{{ route('admin.nests') }}">ネスト</a></li>
        <li class="active">新しいEgg</li>
    </ol>
@endsection

@section('content')
<form action="{{ route('admin.nests.egg.new') }}" method="POST">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">設定</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pNestId" class="form-label">関連ネスト</label>
                                <div>
                                    <select name="nest_id" id="pNestId">
                                        @foreach($nests as $nest)
                                            <option value="{{ $nest->id }}" {{ old('nest_id') != $nest->id ?: 'selected' }}>{{ $nest->name }} &lt;{{ $nest->author }}&gt;</option>
                                        @endforeach
                                    </select>
                                    <p class="text-muted small">ネストはカテゴリのようなものです。複数のEggをネストに入れることができますが、各ネストには関連するEggのみを入れることを検討してください。</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pName" class="form-label">名前</label>
                                <input type="text" id="pName" name="name" value="{{ old('name') }}" class="form-control" />
                                <p class="text-muted small">このEggを識別するための人間に読みやすい名前です。ユーザーにはゲームサーバーの種類として表示されます。</p>
                            </div>
                            <div class="form-group">
                                <label for="pDescription" class="form-label">説明</label>
                                <textarea id="pDescription" name="description" class="form-control" rows="8">{{ old('description') }}</textarea>
                                <p class="text-muted small">このEggの説明です。</p>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-primary no-margin-bottom">
                                    <input id="pForceOutgoingIp" name="force_outgoing_ip" type="checkbox" value="1" {{ \Pterodactyl\Helpers\Utilities::checked('force_outgoing_ip', 0) }} />
                                    <label for="pForceOutgoingIp" class="strong">送信元IPを強制</label>
                                    <p class="text-muted small">
                                        すべての送信ネットワークトラフィックが、サーバーの主要割り当てIPのIPとしてNATされることを強制します。
                                        ノードに複数の公開IPがある場合、特定のゲームが正しく動作するために必要です。
                                        <br>
                                        <strong>
                                            このオプションを有効にすると、このEggを使用するサーバーの内部ネットワークが無効になり、
                                            同じノード上の他のサーバーに内部からアクセスできなくなります。
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pDockerImage" class="control-label">Dockerイメージ</label>
                                <textarea id="pDockerImages" name="docker_images" rows="4" placeholder="quay.io/pterodactyl/service" class="form-control">{{ old('docker_images') }}</textarea>
                                <p class="text-muted small">このEggを使用するサーバーで利用可能なDockerイメージです。1行につき1つ入力してください。複数の値を入力すると、ユーザーはリストから選択できます。</p>
                            </div>
                            <div class="form-group">
                                <label for="pStartup" class="control-label">起動コマンド</label>
                                <textarea id="pStartup" name="startup" class="form-control" rows="10">{{ old('startup') }}</textarea>
                                <p class="text-muted small">このEggで作成される新しいサーバーに使用されるデフォルトの起動コマンドです。必要に応じてサーバーごとに変更できます。</p>
                            </div>
                            <div class="form-group">
                                <label for="pConfigFeatures" class="control-label">機能</label>
                                <div>
                                    <select class="form-control" name="features[]" id="pConfigFeatures" multiple>
                                    </select>
                                    <p class="text-muted small">Eggに属する追加機能です。追加のパネル設定を構成するのに便利です。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">プロセス管理</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-warning">
                                <p>すべてのフィールドは必須です。ただし、「設定コピー元」ドロップダウンから別のオプションを選択した場合は、そのオプションの値を使用するためにフィールドを空白にすることができます。</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pConfigFrom" class="form-label">設定コピー元</label>
                                <select name="config_from" id="pConfigFrom" class="form-control">
                                    <option value="">なし</option>
                                </select>
                                <p class="text-muted small">別のEggの設定をデフォルトとして使用したい場合は、上のドロップダウンから選択してください。</p>
                            </div>
                            <div class="form-group">
                                <label for="pConfigStop" class="form-label">停止コマンド</label>
                                <input type="text" id="pConfigStop" name="config_stop" class="form-control" value="{{ old('config_stop') }}" />
                                <p class="text-muted small">サーバープロセスを正常に停止するために送信されるコマンドです。<code>SIGINT</code>を送信する場合は<code>^C</code>と入力してください。</p>
                            </div>
                            <div class="form-group">
                                <label for="pConfigLogs" class="form-label">ログ設定</label>
                                <textarea data-action="handle-tabs" id="pConfigLogs" name="config_logs" class="form-control" rows="6">{{ old('config_logs') }}</textarea>
                                <p class="text-muted small">ログファイルの保存場所、およびデーモンがカスタムログを作成するかどうかをJSON形式で表現してください。</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pConfigFiles" class="form-label">設定ファイル</label>
                                <textarea data-action="handle-tabs" id="pConfigFiles" name="config_files" class="form-control" rows="6">{{ old('config_files') }}</textarea>
                                <p class="text-muted small">変更する設定ファイルと変更すべき箇所をJSON形式で表現してください。</p>
                            </div>
                            <div class="form-group">
                                <label for="pConfigStartup" class="form-label">起動設定</label>
                                <textarea data-action="handle-tabs" id="pConfigStartup" name="config_startup" class="form-control" rows="6">{{ old('config_startup') }}</textarea>
                                <p class="text-muted small">サーバー起動時にデーモンが完了を判断するために参照すべき値をJSON形式で表現してください。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-success btn-sm pull-right">作成</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('vendor/lodash/lodash.js') !!}
    <script>
    $(document).ready(function() {
        $('#pNestId').select2().change();
        $('#pConfigFrom').select2();
    });
    $('#pNestId').on('change', function (event) {
        $('#pConfigFrom').html('<option value="">なし</option>').select2({
            data: $.map(_.get(Pterodactyl.nests, $(this).val() + '.eggs', []), function (item) {
                return {
                    id: item.id,
                    text: item.name + ' <' + item.author + '>',
                };
            }),
        });
    });
    $('textarea[data-action="handle-tabs"]').on('keydown', function(event) {
        if (event.keyCode === 9) {
            event.preventDefault();

            var curPos = $(this)[0].selectionStart;
            var prepend = $(this).val().substr(0, curPos);
            var append = $(this).val().substr(curPos);

            $(this).val(prepend + '    ' + append);
        }
    });
    </script>
@endsection
