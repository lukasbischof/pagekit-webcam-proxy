<?php

namespace Pagekit\Webcam\Controller;
use Pagekit\Application as App;

/**
 * @Access(admin=true)
*/
class WebcamController {
	public function indexAction() {
		$module = App::module('webcam');
		$config = $module->config;

		return [
		    '$view' => [
		        'title' => 'WebCam settings',
		        'name' => 'webcam:views/admin/index.php'
		    ],
		    'message' => 'Hello how\'s it going?',
		    '$data' => $config
		];
	}

	/**
	 * @Request({"access": "array"}, csrf=true)
	*/
	public function saveAction($access=[]) {
		App::config('webcam')->set('access', $access);

		return ['success' => true];
	}
}
