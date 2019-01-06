<?php

$api->group(['middleware' => 'api.auth'], function () use ($api) {
	$api->get('/my-ontology', [
		'as' => 'api.my-ontology.index',
		'uses' => 'MyOntologyController@index',
	]);
    
	$api->get('/my-ontology/{ontology}', [
		'as' => 'api.my-ontology.show',
		'uses' => 'MyOntologyController@show',
	]);
});
