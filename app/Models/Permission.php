<?php

namespace Pterodactyl\Models;

use Illuminate\Support\Collection;

class Permission extends Model
{
    /**
     * The resource name for this model when it is transformed into an
     * API representation using fractal.
     */
    public const RESOURCE_NAME = 'subuser_permission';

    /**
     * Constants defining different permissions available.
     */
    public const ACTION_WEBSOCKET_CONNECT = 'websocket.connect';
    public const ACTION_CONTROL_CONSOLE = 'control.console';
    public const ACTION_CONTROL_START = 'control.start';
    public const ACTION_CONTROL_STOP = 'control.stop';
    public const ACTION_CONTROL_RESTART = 'control.restart';

    public const ACTION_DATABASE_READ = 'database.read';
    public const ACTION_DATABASE_CREATE = 'database.create';
    public const ACTION_DATABASE_UPDATE = 'database.update';
    public const ACTION_DATABASE_DELETE = 'database.delete';
    public const ACTION_DATABASE_VIEW_PASSWORD = 'database.view_password';

    public const ACTION_SCHEDULE_READ = 'schedule.read';
    public const ACTION_SCHEDULE_CREATE = 'schedule.create';
    public const ACTION_SCHEDULE_UPDATE = 'schedule.update';
    public const ACTION_SCHEDULE_DELETE = 'schedule.delete';

    public const ACTION_USER_READ = 'user.read';
    public const ACTION_USER_CREATE = 'user.create';
    public const ACTION_USER_UPDATE = 'user.update';
    public const ACTION_USER_DELETE = 'user.delete';

    public const ACTION_BACKUP_READ = 'backup.read';
    public const ACTION_BACKUP_CREATE = 'backup.create';
    public const ACTION_BACKUP_DELETE = 'backup.delete';
    public const ACTION_BACKUP_DOWNLOAD = 'backup.download';
    public const ACTION_BACKUP_RESTORE = 'backup.restore';

    public const ACTION_ALLOCATION_READ = 'allocation.read';
    public const ACTION_ALLOCATION_CREATE = 'allocation.create';
    public const ACTION_ALLOCATION_UPDATE = 'allocation.update';
    public const ACTION_ALLOCATION_DELETE = 'allocation.delete';

    public const ACTION_FILE_READ = 'file.read';
    public const ACTION_FILE_READ_CONTENT = 'file.read-content';
    public const ACTION_FILE_CREATE = 'file.create';
    public const ACTION_FILE_UPDATE = 'file.update';
    public const ACTION_FILE_DELETE = 'file.delete';
    public const ACTION_FILE_ARCHIVE = 'file.archive';
    public const ACTION_FILE_SFTP = 'file.sftp';

    public const ACTION_STARTUP_READ = 'startup.read';
    public const ACTION_STARTUP_UPDATE = 'startup.update';
    public const ACTION_STARTUP_DOCKER_IMAGE = 'startup.docker-image';

    public const ACTION_SETTINGS_RENAME = 'settings.rename';
    public const ACTION_SETTINGS_REINSTALL = 'settings.reinstall';

    public const ACTION_ACTIVITY_READ = 'activity.read';

    /**
     * Should timestamps be used on this model.
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     */
    protected $table = 'permissions';

    /**
     * Fields that are not mass assignable.
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Cast values to correct type.
     */
    protected $casts = [
        'subuser_id' => 'integer',
    ];

    public static array $validationRules = [
        'subuser_id' => 'required|numeric|min:1',
        'permission' => 'required|string',
    ];

    /**
     * All the permissions available on the system. You should use self::permissions()
     * to retrieve them, and not directly access this array as it is subject to change.
     *
     * @see \Pterodactyl\Models\Permission::permissions()
     */
    protected static array $permissions = [
        'websocket' => [
            'description' => 'ユーザーがサーバーのウェブソケットに接続できるようにし、コンソール出力やリアルタイムのサーバー統計情報を表示できるようにします。',
            'keys' => [
                'connect' => 'コンソールをストリーミングするために、ユーザーがサーバーのウェブソケットインスタンスに接続できるようにします。',
            ],
        ],

        'control' => [
            'description' => 'サーバーの電源状態を制御したり、コマンドを送信したりするユーザーの能力を制御する権限。',
            'keys' => [
                'console' => 'ユーザがコンソールを介してサーバインスタンスにコマンドを送信できるようにする。',
                'start' => 'サーバーが停止している場合に、ユーザーがサーバーを起動できるようにする。',
                'stop' => '実行中のサーバーを停止できるようにする。',
                'restart' => 'ユーザーがサーバーの再起動を実行できるようにする。これにより、サーバーがオフラインの場合にサーバーを起動することができますが、サーバーを完全に停止した状態にはできません。',
            ],
        ],

        'user' => [
            'description' => 'ユーザがサーバ上の他のサブユーザを管理できるようにする権限。自分自身のアカウントを編集したり、自分自身が持っていない権限を割り当てたりすることは決してできません。',
            'keys' => [
                'create' => 'ユーザーがサーバーに新しいサブユーザーを作成できるようにします。',
                'read' => 'ユーザーがサーバーのサブューザーとその権限を表示できるようにします。',
                'update' => 'ユーザーが他のサブユーザーを変更できるようにします。',
                'delete' => 'ユーザーがサーバーからサブユーザーを削除できるようにします。',
            ],
        ],

        'file' => [
            'description' => 'このサーバーのファイルシステムを変更するユーザーの能力を制御するパーミッション。',
            'keys' => [
                'create' => 'ユーザーは、パネルを介して追加のファイルとフォルダーを作成するか、直接アップロードできます。',
                'read' => 'ユーザーはディレクトリの内容を表示できますが、ファイルの内容を表示したり、ファイルをダウンロードしたりできません。',
                'read-content' => 'ユーザーが特定のファイルの内容を表示できるようにします。これにより、ユーザーはファイルをダウンロードできます。',
                'update' => 'ユーザーは、既存のファイルまたはディレクトリのコンテンツを更新できます。',
                'delete' => 'ユーザーがファイルまたはディレクトリを削除できるようにします。',
                'archive' => 'ユーザがディレクトリの内容をアーカイブしたり、システム上の既存のアーカイブを解凍したりできるようにする。',
                'sftp' => 'ユーザーがSFTPに接続し、他の割り当てられたファイルパーミッションを使用してサーバーファイルを管理できるようにします。',
            ],
        ],

        'backup' => [
            'description' => 'サーバーのバックアップを生成および管理するユーザーの能力を制御する権限。',
            'keys' => [
                'create' => 'ユーザーはこのサーバーの新しいバックアップを作成できます。',
                'read' => 'ユーザーは、このサーバーに存在するすべてのバックアップを表示できます。',
                'delete' => 'ユーザーがシステムからバックアップを削除できるようにします。',
                'download' => 'ユーザーがサーバーのバックアップをダウンロードできるようにします。危険： バックアップ内のサーバーのすべてのファイルにアクセスできます。',
                'restore' => 'ユーザーがサーバーのバックアップを復元できるようにします。危険：この処理では、サーバーのファイルをすべて削除することができます。',
            ],
        ],

        // Controls permissions for editing or viewing a server's allocations.
        'allocation' => [
            'description' => 'このサーバーのポート割り当てを変更するユーザーの能力を制御する権限。',
            'keys' => [
                'read' => 'このサーバーに現在割り当てられているすべての割り当てを表示できます。このサーバーへのアクセス レベルに関係なく、ユーザーは常にプライマリ割り当てを表示できます。',
                'create' => 'ユーザーが追加の割り当てをサーバーに割り当てることができます。',
                'update' => 'プライマリサーバーの割り当てを変更し、各割り当てにメモを添付することができます。',
                'delete' => 'ユーザーがサーバーから割り当てを削除できるようにします。',
            ],
        ],

        // Controls permissions for editing or viewing a server's startup parameters.
        'startup' => [
            'description' => 'このサーバーの起動パラメータを表示するユーザーを制御する権限。',
            'keys' => [
                'read' => 'ユーザーはサーバーのスタートアップ変数を表示できます。',
                'update' => 'ユーザーは、サーバーのスタートアップ変数を変更できます。',
                'docker-image' => 'ユーザーは、サーバーを実行するときに使用されるDockerイメージを変更できます。',
            ],
        ],

        'database' => [
            'description' => 'このサーバのデータベース管理へのユーザのアクセスを制御する権限。',
            'keys' => [
                'create' => 'ユーザーはこのサーバーの新しいデータベースを作成できます。',
                'read' => 'ユーザーは、このサーバーに関連付けられているデータベースを表示できます。',
                'update' => 'ユーザがデータベース・インスタンスのパスワードを変更できるようにします。ユーザが view_password 権限を持っていない場合、更新されたパスワードは表示されません。',
                'delete' => 'ユーザーがこのサーバーからデータベースインスタンスを削除できるようにします。',
                'view_password' => 'ユーザーは、このサーバーのデータベースインスタンスに関連付けられたパスワードを表示できます。',
            ],
        ],

        'schedule' => [
            'description' => 'このサーバーのスケジュール管理へのユーザーのアクセスを制御する権限。',
            'keys' => [
                'create' => 'ユーザーはこのサーバーの新しいスケジュールを作成できます。', // task.create-schedule
                'read' => 'Aこのサーバーのスケジュールとそれに関連するタスクを表示します。', // task.view-schedule, task.list-schedules
                'update' => 'ユーザーは、このサーバーのスケジュールを更新し、タスクをスケジュールすることができます。', // task.edit-schedule, task.queue-schedule, task.toggle-schedule
                'delete' => 'ユーザーがこのサーバーのスケジュールを削除できるようにします。', // task.delete-schedule
            ],
        ],

        'settings' => [
            'description' => 'ユーザがこのサーバの設定にアクセスすることを制御する権限。',
            'keys' => [
                'rename' => 'ユーザーがこのサーバーの名前を変更したり、説明を変更したりできるようにします。',
                'reinstall' => 'ユーザーがこのサーバーの再インストールを起動できるようにします。',
            ],
        ],

        'activity' => [
            'description' => 'ユーザーのサーバーアクティビティログへのアクセスを制御する権限。',
            'keys' => [
                'read' => 'ユーザーはサーバーのアクティビティログを表示できます。',
            ],
        ],
    ];

    /**
     * Returns all the permissions available on the system for a user to
     * have when controlling a server.
     */
    public static function permissions(): Collection
    {
        return Collection::make(self::$permissions);
    }
}
