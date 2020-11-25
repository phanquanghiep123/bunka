<?php

return [
    'backup' => [
        /*
        * The disk where your files will be backed up
        **/
        'disk' => 'local',

        /*
        * Location on disk where to backup migratons
        **/
        'migrations' => 'backup' . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR,

        /*
        * Location on disk where to backup seeds
        **/
        'seeds' => 'backup' . DIRECTORY_SEPARATOR . 'seeds' . DIRECTORY_SEPARATOR,
    ],
    'export_path' => [
        'migrations' => database_path('backup' . DIRECTORY_SEPARATOR . 'migrations'),
        'seeds' => database_path('backup' . DIRECTORY_SEPARATOR . 'seeds'),
    ],
    'seeds' => [
        'ignore_tables' => [
            // Add tables
        ]
    ]
];
