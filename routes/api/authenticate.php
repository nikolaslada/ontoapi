<?php

$api->post('/login', [
	'as'   => 'authenticate.login',
	'uses' => 'AuthenticateController@login',
]);
