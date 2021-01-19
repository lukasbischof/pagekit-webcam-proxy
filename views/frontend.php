<?php
$view->script('frontend', 'webcam:js/frontend.js', '');
$config = $app->module('webcam')->config;
?>

<style>
  .webcam-container {
    border-bottom: 1px solid #eee;
    margin-bottom: .5em;
  }

  .webcam-container:last-child {
    border-bottom: none;
  }
</style>

<h1>Webcams</h1>

<?php foreach ($config['webcams'] as $webcam): ?>
    <div data-webcam-id="<?php echo $webcam['id'] ?>" class="webcam-container">
        <progress min="0" max="1" id="progress"></progress>
    </div>
<?php endforeach; ?>
