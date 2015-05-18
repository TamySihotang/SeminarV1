<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview'=>[
             'class' => '\kartik\grid\Module'
//             'i18n' => [
//                     'class' => 'yii\i18n\PhpMessageSource',
//                     'basePath' => '@kvgrid/messages',
//                     'forceTranslation' => true
//             ],
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        
            'authManager'=> [
                'class' => 'yii\rbac\DbManager',
                'defaultRoles' => ['guest'],
            ],
        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'view' => [
//              'theme' => [
//                 'pathMap' => [
//                    '@app/views' => '@app/web/themes/fedora/views'],
//                                    'baseUrl'=>'@web/themes/fedora'
//                 ],
//               ],    
        ],
    'params' => $params,
];
