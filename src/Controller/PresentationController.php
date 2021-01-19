<?php

namespace Pagekit\Webcam\Controller;

use Pagekit\Application as App;

class PresentationController {
  /**
   * @param int $id Image id
   */
  public function indexAction($id = null) {
    $id = intval($id);
    $config = App::module('webcam')->config;

    $webcam = current(array_filter($config['webcams'], function ($element) use ($id) {
      return $element['id'] == intval($id);
    }));

    if ($webcam == false) {
      http_response_code(404);
      die('Not found');
    }

    list($process, $result) = $this->fetch_image(
      $webcam['url'],
      $webcam['user'],
      $webcam['password']
    );

    if ($result == false) {
      http_response_code(500);
      die('Could not fetch image');
    }

    $len = curl_getinfo($process, CURLINFO_SIZE_DOWNLOAD);
    $content_type = curl_getinfo($process, CURLINFO_CONTENT_TYPE);

    header("Content-Type: $content_type");
    header("Content-Length: $len");

    echo($result);
  }

  /**
   * @param string $url The URL
   * @param string $user The HTTP basic auth user
   * @param string $password The HTTP basic auth password
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
