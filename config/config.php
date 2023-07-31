<?php

return [
    'enable' => true, //Enable or disable support
    'support_users' => [1], //An array of support user ids. If you have live-controls/groups installed, use support_groups instead!
    'support_groups' => ['admin'], //An array of support group keys. You need to have live-controls/groups package installed to use it!
    'layout' => 'x-app-layout', //Choose the layout (without tag characters) from your list of layouts
    'route_prefix' => 'support' //The prefix used for the routes
];