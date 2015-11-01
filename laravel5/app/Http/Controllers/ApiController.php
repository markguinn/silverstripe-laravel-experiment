<?php namespace App\Http\Controllers;

/**
 * @author Mark Guinn <mark@adaircreative.com>
 * @date 11.01.2015
 * @package laravel5
 */
class ApiController extends Controller
{
	public function getIndex() {
		return \Response::json([
			'hello' => 'world',
		]);
	}
}
