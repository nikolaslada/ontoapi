<?php

$api->get('/version', [
    'as'   => 'api.version.index',
    'uses' => 'VersionController@index',
]);
