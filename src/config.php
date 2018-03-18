<?php

return [
  'app_key'    => env('DIRECT_MAIL_APP_KEY'),
  'app_secret' => env('DIRECT_MAIL_APP_SECRET'),
  'region'     => 'cn-beijing',
  'account'    => [
    'name'  => env('DIRECT_MAIL_ACCOUNT_NAME'),//控制台创建的发信地址
    'alias' => env('DIRECT_MAIL_ACCOUNT_ALIAS'),
  ]
];