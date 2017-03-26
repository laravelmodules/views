<?php

\DashboardMenu::registerItem([
    'id' => 'Views',
    'priority' => 20,
    'parent_id' => null,
    'heading' => '',
    // 'heading' => 'Views',
    'title' => 'Views',
    'font_icon' => 'fa fa-bars',
    // 'link' => route('views.views.index.get'),
    'link' => '',
    'css_class' => null,
    'permissions' => ['view-menus']
]);

// \DashboardMenu::registerResource([
//      'parent' => 'Views', // Module Name
//      'prefix' => 'views', // Route prefix
//      'resource' => 'views', // Resouce name
//      'permissions' => 'view-backend', // Permissions Group
//      'priority' => 31, // priority Group
// ]);

// \MenuDashboard::registerItem([
//         'id' => route('views.views.index'),
//         'priority' => 1,
//         'parent_id' => 'Views',
//         'heading' => 'Claro',
//         'title' => 'Claro',
//         'font_icon' => 'fa fa-plus-circle',
//         'link' => route('views.views.index'),
//         // 'link' => '',
//         'css_class' => null,
//         'permissions' => 'view-backend'
// ]);

includeFiles(__DIR__.'/Dashboard/');
