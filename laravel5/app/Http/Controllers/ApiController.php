<?php namespace App\Http\Controllers;

use App\Bird;

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

	public function getBird($id) {
		return Bird::findOrFail($id);
	}

	public function getBirds() {
		return Bird::all();
	}
}
