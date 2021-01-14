<?php

use Pagekit\Application as App;

return [
  'name' => 'webcam',
  'menu' => [
    'webcam' => [
      'label' => 'WebCam',
      'icon' => 'webcam:icon.svg',
      'url' => '@webcamAdmin',
      'access' => 'webcam: edit settings'
    ],
    'webcam: settings' => [
      'label' => 'Einstellungen',
      'parent' => 'webcam',
      'url' => '@webcamAdmin',
      'access' => 'webcam: edit settings'
    ],
    'webcam: preview' => [
      'label' => 'Vorschau',
      'parent' => 'webcam',
      'url' => '@webcam/preview',
      'access' => 'webcam: edit settings'
    ],
  ],

  'main' => function (App $app) {
    //echo 'WEbcam';
  },

  'autoload' => [
    'Pagekit\\Webcam\\' => 'src'
  ],

  'routes' => [
    '@webcamAdmin' => [
      'path' => '/webcamAdmin',
      'controller' => 'Pagekit\\Webcam\\Controller\\WebcamController'
    ],

    '@webcam/preview' => [
      'path' => '/webcam/preview',
      'controller' => 'Pagekit\\Webcam\\Controller\\PreviewController'
    ],

    '@webcam/image' => [
      'path' => '/webcam/image',
      'controller' => 'Pagekit\\Webcam\\Controller\\PresentationController'
    ]
  ],
  'config' => [
    'access' => [
      'url' => '',
      'user' => '',
      'password' => ''
    ],
    'webcams' => [],
  ],
  'permissions' => [
    'webcam: edit settings' => [
      'title' => 'Die Webcam-Einstellungen editieren',
      'description' => 'Einstellungen an der Webcam vornehmen'
    ]
  ],
  'nodes' => [
    'webcam' => [
      'name' => '@webcam',
      'label' => 'Webcam',
      'controller' => 'Pagekit\\Webcam\\Controller\\FrontendController',
      'frontpage' => true,
      'protected' => true
    ]
  ],
  'widgets' => [
    'widgets/webcam.php'
  ]
];