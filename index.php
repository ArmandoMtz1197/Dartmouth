<?php include_once "includes/header.php"; ?>
<form action="accion_index.php">

<div class="container mt-3">
  <div class="d-flex justify-content-center mb-3">
    <h5>Ingresar monto de compra:</h5>
  </div>

  <div class="d-flex justify-content-center mb-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">&#64;</span>
      </div>
      <input type="text" class="form-control" name="nombre" placeholder="Nombre">
    </div>
  </div>

  <div class="d-flex justify-content-center mb-3">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">&nbsp;&#8364;&nbsp;</span>
      </div>
      <input type="number" class="form-control" name="cantidad" placeholder="Monto">
    </div>
  </div>

  <div class="d-flex justify-content-center mb-3">
    <button type="submit" class="btn"><img src="src/next.png" width="125px" height="25px"></button>
  </div>

</div>
</form><br><br>
<?php include_once "includes/footer.php"; ?>

