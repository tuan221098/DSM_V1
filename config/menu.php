<?php
return [
    'items' => [
        [
            'icon' => 'media/icons/duotune/finance/fin001.svg',
            'name' => 'Trang Chủ',
            'href' => '/',
        ],
        [
            'icon' => 'media/icons/duotune/electronics/elc004.svg',
            'name' => 'Bán hàng',
            'href' => '/pos',
        ],
        [
            'icon' => 'media/icons/duotune/ecommerce/ecm003.svg',
            'name' => 'Đơn hàng',
            'menu_items' =>
                [
                    [
                        'name' => 'Tạo đơn và giao hàng',
                        'href' => '/bills/create',
                    ],
                    [
                        'name' => 'Danh sách đơnh hàng',
                        'href' => '/bills',
                    ],
                ],
        ],
        [
            'icon' => 'media/icons/duotune/abstract/abs027.svg',
            'name' => 'Sản phẩm',
            'menu_items' => [
                [
                    'name' => 'Danh mục sản phẩm',
                    'href' => '/categories'
                ],
                [
                    'name' => 'Danh sách sản phẩm',
                    'href' => '/products'
                ],
                [
                    'name' => 'Quản lý kho',
                    'href' => '/variants'
                ],
                [
                    'name' => 'Nhập hàng',
                    'href' => '/purchase_order'
                ],
                [
                    'name' => 'Nhà cung cấp',
                    'href' => '/suppliers'
                ],
            ],
        ],
        [
            'icon' => 'media/icons/duotune/communication/com013.svg',
            'name' => 'Khách hàng',
            'menu_items' => [
                [
                    'name' => 'Danh sách khách hàng',
                    'href' => '/customers'
                ],
                [
                    'name' => 'Nhóm khách hàng',
                    'href' => '/group-customers'
                ],
            ],
        ],
        [
            'icon' => 'media/icons/duotune/finance/fin010.svg',
            'name' => 'Sổ quỹ',
            'menu_items' => [
                [
                    'name' => 'Phiếu thu',
                    'href' => '/receipt_vouchers'
                ],
                [
                    'name' => 'Phiếu chi',
                    'href' => '/payment_vouchers'
                ],
            ],
        ],
        [
            'icon' => 'media/icons/duotune/graphs/gra004.svg',
            'name' => 'Báo cáo',
            'menu_items' =>
                [
                    [
                        'name' => 'Báo cáo bán hàng',
                        'href' => '/reports/bills',
                    ],
                    [
                        'name' => 'Báo cáo nhập hàng',
                        'href' => '/reports/purchase_order',
                    ],
                    [
                        'name' => 'Báo cáo kho',
                        'href' => '/report/inventories',
                    ],
                    [
                        'name' => 'Báo cáo tài chính',
                        'href' => '/reports/finance',
                    ],
                    [
                        'name' => 'Báo cáo khách hàng',
                        'href' => '/reports/customers',
                    ],
                ],
        ],
        [
            'icon' => 'media/icons/duotune/coding/cod009.svg',
            'name' => 'Cấu hình',
            'href' => '/settings'
        ],
    ]
];
