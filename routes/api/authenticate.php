<?php

$api->post('/login', [
	'as'   => 'api.authenticate.login',
	'uses' => 'AuthenticateController@login',
]);
