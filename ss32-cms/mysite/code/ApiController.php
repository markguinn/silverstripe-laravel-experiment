<?php

/**
 * @author Mark Guinn <mark@adaircreative.com>
 * @date 11.01.2015
 * @package ss32
 */
class ApiController extends Controller
{
	private static $allowed_actions = ['bird', 'birds'];

	public function index() {
		return $this->json([
			'hello' => 'world',
		]);
	}

	public function bird(SS_HTTPRequest $req) {
		$bird = Bird::get()->byID($req->param('ID'));
		return $this->json($bird->toMap());
	}

	public function birds() {
		$out = [];
		foreach (Bird::get() as $bird) {
			$out[] = $bird->toMap();
		}
		return $this->json($out);
	}

	private function json(array $data) {
		$response = $this->getResponse();
		$response->addHeader('Content-type', 'application/json');
		$response->setBody(json_encode($data));
		return $response;
	}
}
