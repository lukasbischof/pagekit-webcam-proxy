window.addEventListener("load", function () {
    if (window.XMLHttpRequest && window.Blob && window.URL && window.URL.createObjectURL) {
        var progress = document.getElementById("progress");

        Image.prototype.load = function (url) {
            var thisImg = this;
            var xmlHTTP = new XMLHttpRequest();

            xmlHTTP.open('GET', url, true);
            xmlHTTP.responseType = 'arraybuffer';

            xmlHTTP.onload = function (e) {
                var blob = new Blob([this.response]);
                thisImg.src = window.URL.createObjectURL(blob);

                document.getElementById("webcamContent").appendChild(thisImg);
                document.getElementById("webcamContent").removeChild(progress);
            };

            xmlHTTP.onprogress = function (e) {
                progress.value = e.loaded / e.total;
            };

            xmlHTTP.send();
        };

        var img = new Image();
        img.load("/index.php/webcam/image");
    } else {
        document.getElementById("webcamContent").removeChild(document.getElementById("progress"));

        var img = new Image();
        img.src = "/index.php/webcam/image";
        img.alt = "Webcam";

        document.getElementById("webcamContent").appendChild(img);
    }
});