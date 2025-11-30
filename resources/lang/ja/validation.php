<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute を受け入れる必要があります。',
    'active_url' => ':attribute は有効な URL ではありません。',
    'after' => ':attribute は :date 以降の日付である必要があります。',
    'after_or_equal' => ':attribute は、:date 以降の日付である必要があります。',
    'alpha' => ':attribute には文字のみを含めることができます。',
    'alpha_dash' => ':attribute には文字、数字、ダッシュのみを含めることができます。',
    'alpha_num' => ':attribute には文字と数字のみを含めることができます。',
    'array' => ':attribute は配列でなければなりません。',
    'before' => ':attribute は :date より前の日付である必要があります。',
    'before_or_equal' => ':attribute は、:date 以前の日付である必要があります。',
    'between' => [
        'numeric' => ':attribute は :min と :max の間でなければなりません。',
        'file' => ':attribute は :min ～ :max キロバイトの範囲にする必要があります。',
        'string' => ':attribute は、:min 文字と :max 文字の間である必要があります。',
        'array' => ':attribute には :min と :max の間の項目が必要です。',
    ],
    'boolean' => ':attribute フィールドは true または false である必要があります。',
    'confirmed' => ':attribute の確認が一致しません。',
    'date' => ':attribute は有効な日付ではありません。',
    'date_format' => ':attribute が形式 :format と一致しません。',
    'different' => ':attribute と :other は異なっていなければなりません。',
    'digits' => ':attribute は :digitals 数字である必要があります。',
    'digits_between' => ':attribute は :min から :max までの数字でなければなりません。',
    'dimensions' => ':attribute の画像サイズが無効です。',
    'distinct' => ':attribute フィールドに重複した値があります。',
    'email' => ':attribute は有効な電子メールアドレスである必要があります。',
    'exists' => '選択された :attribute は無効です。',
    'file' => ':attribute はファイルである必要があります。',
    'filled' => ':attribute フィールドは必須です。',
    'image' => ':attribute は画像である必要があります。',
    'in' => '選択された :attribute 属性は無効です。',
    'in_array' => ':attribute フィールドは :other には存在しません。',
    'integer' => ':attribute は整数である必要があります。',
    'ip' => ':attribute は有効な IP アドレスである必要があります。',
    'json' => ':attribute は有効な JSON 文字列である必要があります。',
    'max' => [
        'numeric' => ':attribute は :max を超えることはできません。',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => ':attribute は :max 文字を超えることはできません。',
        'array' => ':attribute には :max を超える項目を含めることはできません。',
    ],
    'mimes' => ':attribute はタイプ :values のファイルである必要があります。',
    'mimetypes' => 'attribute はタイプ :values のファイルである必要があります。',
    'min' => [
        'numeric' => ':attribute は少なくとも :min である必要があります。',
        'file' => ':attribute は少なくとも :min キロバイトでなければなりません。',
        'string' => ':attribute は少なくとも :min 文字でなければなりません。',
        'array' => ':attribute には少なくとも :min 項目が必要です。',
    ],
    'not_in' => '選択された :attribute は無効です。',
    'numeric' => ':attribute は数値である必要があります。',
    'present' => ':attribute フィールドが存在する必要があります。',
    'regex' => ':attribute 形式が無効です。',
    'required' => ':attribute フィールドは必須です。',
    'required_if' => ':other が :value の場合、:attribute フィールドは必須です。',
    'required_unless' => ':values に :other が含まれていない限り、:attribute フィールドは必須です。',
    'required_with' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_with_all' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_without' => ':values が存在しない場合は、:attribute フィールドが必要です。',
    'required_without_all' => ':value が存在しない場合は、:attribute フィールドが必要です。Z',
    'same' => ':attribute と :other は一致する必要があります。',
    'size' => [
        'numeric' => ':attribute は :size でなければなりません。',
        'file' => ':attribute は :size キロバイトでなければなりません。',
        'string' => ':attribute は :size 文字でなければなりません。',
        'array' => ':attribute には :size 項目が含まれている必要があります。',
    ],
    'string' => ':attribute は文字列である必要があります。',
    'timezone' => ':attribute は有効なゾーンでなければなりません。',
    'unique' => ':attribute はすでに取得されています。',
    'uploaded' => ':attribute のアップロードに失敗しました。',
    'url' => ':attribute 形式が無効です。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

    // Internal validation logic for Pterodactyl
    'internal' => [
        'variable_value' => ':env 変数',
        'invalid_password' => '指定されたパスワードはこのアカウントでは無効です。',
    ],
];
