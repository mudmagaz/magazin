<?php

return [
        'catalog/category/([0-9]+)/([0-9]+)' => 'catalog/category/$1/$2',
        'catalog/category/([0-9]+)' => 'catalog/category/$1',
        'product/category/([0-9]+)' => 'product/category/$1',
        'cart/index' => 'cart/index',
        'cart/add/([0-9]+)' => 'cart/add/$1',

        '' => 'site/index'
    ];
    

