<?php

namespace Pagekit\Webcam\Controller;

use Pagekit\Application as App;

class FrontendController {
  protected $webcam;

  public function __construct() {
    $this->webcam = App::module('webcam');
  }

  /**
   * @Route("/")
   * @Route("/webcam", name="webcam")
   */
  public function indexAction() {
    return [
      '$view' => [
        'title' => 'Webcam',
        'name' => 'webcam:views/frontend.php',
      ]
    ];
  }
}