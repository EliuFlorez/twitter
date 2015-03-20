<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Twitter Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'consumer_key'        => 'your-app-key',
            'consumer_secret'     => 'your-app-secret',
            'access_token'        => 'oauth-token',
            'access_token_secret' => 'oauth-secret'
        ],

        'alternative' => [
            'consumer_key'        => 'your-app-key',
            'consumer_secret'     => 'your-app-secret',
            'access_token'        => 'oauth-token',
            'access_token_secret' => 'oauth-secret'
        ],

    ]

];
