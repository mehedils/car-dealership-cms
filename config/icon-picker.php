<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Sets
    |--------------------------------------------------------------------------
    |
    | This configures the icon sets the plugin should use by default.
    | When set to null, all registered icon sets (Heroicons, FontAwesome, etc.)
    | will be available in the IconPicker.
    |
    */
    'sets' => null,

    /*
    |--------------------------------------------------------------------------
    | Default Columns
    |--------------------------------------------------------------------------
    |
    | Number of columns displayed in the icon picker dropdown grid.
    |
    */
    'columns' => [
        'default' => 3,
        'lg' => 4,
        '2xl' => 5,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Layout
    |--------------------------------------------------------------------------
    |
    | FLOATING: behaves like a select popup.
    | ON_TOP: catalogue grid view.
    |
    */
    'layout' => \Guava\FilamentIconPicker\Layout::FLOATING,

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'enabled' => true,
        'duration' => '7 days',
    ],

];
