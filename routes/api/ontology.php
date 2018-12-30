<?php

$api->get('/ontology', [
    'as'   => 'api.version.index',
    'uses' => 'OntologyController@index',
]);
