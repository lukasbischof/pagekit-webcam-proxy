function errorHandler($container, progress) {
  return function () {
    $container.append('<p>Webcam konnte nicht geladen werden</p>');
    progress.remove();
  };
}

function fetchImage($container) {
  var imageId = $container.data('webcam-id');
  var url = '/webcam/image/' + imageId;

  if (window.XMLHttpRequest && window.Blob && window.URL && window.URL.createObjectURL) {
    var $progress = $container.children('progress');

    Image.prototype.load = function (url) {
      var thisImg = this;
      var xmlHTTP = new XMLHttpRequest();

      xmlHTTP.open('GET', url, true);
      xmlHTTP.responseType = 'arraybuffer';

      xmlHTTP.onload = function (e) {
        if (this.status === 200) {
          var blob = new Blob([this.response]);
          thisImg.src = window.URL.createObjectURL(blob);

          $container.append(thisImg);
          $progress.remove();
        } else {
          errorHandler($container, $progress)();
        }
      };

      xmlHTTP.onerror = errorHandler($container, $progress);

      xmlHTTP.onprogress = function (e) {
        $progress.value = e.loaded / e.total;
      };

      xmlHTTP.send();
    };

    new Image().load(url);
  } else {
    document.getElementById('webcamContent').removeChild(document.getElementById('progress'));

    var img = new Image();
    img.src = url;
    img.alt = 'Webcam';

    document.getElementById('webcamContent').appendChild(img);
  }
}

window.addEventListener('load', function () {
  $('[data-webcam-id]').each(function (idx, container) {
    fetchImage($(container));
  });
});
