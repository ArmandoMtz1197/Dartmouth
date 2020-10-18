function tieneSoporteUserMedia() {
    return !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
}
function _getUserMedia() {
    return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
}

// Declaramos elementos del DOM
var $video = document.getElementById("video"),
    $canvas = document.getElementById("canvas"),
    $imagen = document.getElementById("imagen");
if (tieneSoporteUserMedia()) {
    _getUserMedia(
        {video: true},
        function (stream) {
            console.log("Permiso concedido");
            $video.srcObject = stream;
            $video.play();
        }, function (error) {
            console.log("Permiso denegado o error: ", error);
        });
} else {
    alert("Lo siento. Tu navegador no soporta esta característica");
}

function guardar_foto(){
  //Pausar reproducción
  $video.pause();

  //Obtener contexto del canvas y dibujar sobre él
  var contexto = $canvas.getContext("2d");
  $canvas.width = $video.videoWidth;
  $canvas.height = $video.videoHeight;
  contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);
  document.getElementById('btn').style.display='none';
  document.getElementById('canvasVideo').style.display='none';
  $imagen.style.display='inline';

  var nombre = document.getElementById('nombre').value;
  var foto = $canvas.toDataURL(); //Esta es la foto, en base 64
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "guardar_foto.php", true);
  xhr.send(encodeURIComponent(foto)); //Codificar y enviar

  xhr.onreadystatechange = function() {
      if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
        if(xhr.responseText == nombre) {
          window.location.href= "confirmacion.php";
        } else {
          window.location.href= "fallida.php";
        }
        return;
      }
  }

  //Reanudar reproducción
  $video.play();
}