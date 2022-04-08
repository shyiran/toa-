<?php
/**
 * 视图配置
 */

return [
    // 模版替换参数
    'tpl_replace_string' => [
        '__STATIC__'        => '/static',
        '__ADMIN_STATIC__'  => '/static/admin',
        '__ADMIN_JS__'      => '/static/admin/js',
        '__ADMIN_CSS__'     => '/static/admin/css',
        '__ADMIN_IMAGES__'  => '/static/admin/images',
        '__ADMIN_PLUGINS__' => '/static/admin/plugins',


        '__STATIC__'        => '/static',
        '__ADMIN_STATIC__'  => '/static/index',
        '__ADMIN_JS__'      => '/static/index/js',
        '__ADMIN_CSS__'     => '/static/index/css',
        '__ADMIN_IMAGES__'  => '/static/index/images',
        '__ADMIN_PLUGINS__' => '/static/index/plugins',
    ]
];
