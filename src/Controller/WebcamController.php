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
		    '$data' => $config
		];
	}

	/**
	 * @Request({"webcams": "array"}, csrf=true)
	*/
	public function saveAction($webcams=[]) {
		App::config('webcam')->set('webcams', $webcams);

		return ['success' => true];
	}
}
