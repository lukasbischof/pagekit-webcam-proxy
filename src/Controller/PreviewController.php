<?php

namespace Pagekit\Webcam\Controller;
use Pagekit\Application as App;

/**
 * @Access(admin=true)	
*/
class PreviewController {
	public function indexAction() {
		$module = App::module('webcam');
		$config = $module->config;

		return [
		    '$view' => [
		        'title' => 'Preview',
		        'name' => 'webcam:views/admin/preview.php'
		    ],
		    '$data' => $config
		];
	}
}