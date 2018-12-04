<?php

namespace App\Http\Controllers;

final class VersionController extends Controller
{
	public function index(): array
	{
		return [
            'version' => '0',
        ];
	}
}
