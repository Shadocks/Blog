<?php

return [
    'home' => [
        'path' => '/',
        'action' => App\Action\ActionIndexContact::class
    ],
    'articles' => [
        'path' => '/articles',
        'action' => App\Action\ActionArticles::class
    ],
    'article_add' => [
        'path' => '/article/add',
        'action' => App\Action\ActionAddArticle::class
    ],
    'article_detail' => [
        'path' => '/article/detail/:id',
        'action' => App\Action\ActionDetailArticle::class
    ],
    'article_update' => [
        'path' => '/article/update/:id',
        'action' => App\Action\ActionUpdateArticle::class
    ],
    'article_delete' => [
        'path' => '/article/delete/:id',
        'action' => App\Action\ActionDeleteArticle::class
    ]
];
