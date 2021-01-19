<?php
$config = $app->module('webcam')->config;
?>

<?php foreach ($config['webcams'] as $webcam): ?>
<img src="/index.php/webcam/image/<?php echo $webcam['id'] ?>" />
<?php endforeach; ?>
