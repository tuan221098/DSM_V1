<?php
return[
    'items'=> [
        [
            'icon'=>'media/icons/duotune/finance/fin001.svg',
            'name'=>'Trang Chủ',
            'href'=>'/',
        ],
        [
            'icon'=>'media/icons/duotune/ecommerce/ecm001.svg',
            'name'=>'Giỏ hàng',
            'href'=>'/cart',
        ],
        [
            'icon'=>'media/icons/duotune/files/fil001.svg',
            'name'=>'Danh Mục',
            'href'=>'/category',
            'menu_items'=>
                [
                    [   'icon'=>'media/icons/duotune/arrows/arr071.svg',
                        'name' => 'Sản phẩm',
                        'href' => '/produce',
                    ],
                    [   'icon'=>'media/icons/duotune/arrows/arr071.svg',
                        'name' => 'Giảm giá',
                        'href' => '/discount',
                    ],
                ],
        ],
        [
            'icon' => 'media/icons/duotune/coding/cod001.svg',
            'name' => 'Cài đặt',
            'href' => '',
            'menu_items' => [
                [
                    'name' => 'Chung',
                    'href' => 'settings/general'
                ],
            ],
        ],

    ]
];
