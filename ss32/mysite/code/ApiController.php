<?php

/**
 * @author Mark Guinn <mark@adaircreative.com>
 * @date 11.01.2015
 * @package ss32
 */
class ApiController extends Controller
{
	public function index() {
		$response = $this->getResponse();
		$response->addHeader('Content-type', 'application/json');
		$response->setBody(json_encode([
			'hello' => 'world',
		]));
		return $response;
	}
}
