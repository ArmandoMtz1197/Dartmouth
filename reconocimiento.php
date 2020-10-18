<?php include_once "includes/header.php"; ?>
<form action="accion_index.php">
<input type="hidden" id="nombre" value=<?php echo "'".$_REQUEST['nombre']."'"; ?> >

<div class="container mt-3">
  <div class="d-flex justify-content-center mb-3">
    <h5>Usuario: <i><?php echo $_REQUEST['nombre']; ?></i></h5>
  </div>

  <div class="d-flex justify-content-center mb-3">
    <h6>Monto a cobrar: <i><?php echo "&#8364;".$_REQUEST['cantidad']; ?></i></h6>
  </div>

  <img id="imagen" src="src/espera.png" width="340px" height="430px" style="display:none">

  <div id="canvasVideo" class="embed-responsive embed-responsive-16by9">
    <video id="video" autoplay></video>
    <canvas id="canvas" width="100px" height="60px" style="display:none"></canvas>
  </div><br>

  <div class="d-flex justify-content-center mb-3">
    <button  id="btn" type="button" class="btn" onClick="guardar_foto();"><img src="src/captura.png" width="125px" height="125px" /></button>
  </div>
</div>

</form>

<script src="js/script.js"></script>

<?php include_once "includes/footer.php"; ?>