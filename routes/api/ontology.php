<?php


$api->group(['middleware' => 'api.auth'], function () use ($api) {
    $api->get('/ontology', [
        'as' => 'api.ontology.index',
        'uses' => 'OntologyController@index',
    ]);
});
