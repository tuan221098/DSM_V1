<?php
return [
    'items' => [
        [
            'icon' => 'ri-home-3-line',
            'name' => 'Trang Chủ',
            'href' => '/',
        ],
        [
            'icon' => 'ri-computer-line',
            'name' => 'Bán hàng',
            'href' => '/pos',
        ],
        [
            'key' => 'bills',
            'icon' => 'ri-shopping-basket-2-line',
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
            'key' => 'products',
            'icon' => 'ri-stack-line',
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
            'key' => 'customers',
            'icon' => 'ri-contacts-book-line',
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
            'key' => 'cashbook',
            'icon' => 'ri-file-list-3-line',
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
            'icon' => 'ri-pie-chart-line',
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
            'icon' => 'ri-equalizer-line',
            'name' => 'Cấu hình',
            'href' => '/settings'
        ],
    ]
];
