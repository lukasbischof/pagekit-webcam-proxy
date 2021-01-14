<?php

namespace Pagekit\Webcam\Controller;

use Pagekit\Application as App;

class PresentationController {
  public function indexAction() {
    $config = App::module('webcam')->config;
    list($process, $result) = $this->fetch_image(
      $config['access']['url'],
      $config['access']['user'],
      $config['access']['password']
    );

    $len = curl_getinfo($process, CURLINFO_SIZE_DOWNLOAD);
    $content_type = curl_getinfo($process, CURLINFO_CONTENT_TYPE);

    header("Content-Type: $content_type");
    header("Content-Length: $len");

    echo($result);
  }

  /**
   * @param $url
   * @param $user
   * @param $password
   * @return array
   */
  public function fetch_image($url, $user, $password) {
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPAUTH, 1);
    curl_setopt($process, CURLOPT_USERPWD, "$user:$password");
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($process);

    return array($process, $result);
  }
}
