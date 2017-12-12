<?php
	$conexion = new mysqli("localhost","root","","online438_ociorders_local");
	if($conexion -> connect_error){
			die('Error de Conexi&oacute;n (' . $conexion -> connect_errno . ') '. $conexion -> connect_error);
	}

	$resultado = $conexion -> query("select * from josed_countries");
	$cadena = '';
	while ($rows = $resultado  -> fetch_assoc()){
		$cadena .= '<option value="'.$rows["country_id"].'">'.$rows["country_name"].'</option>';
	}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Prueba</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
  </head>
  <body>

	<div class="container">
	  <!-- Content here -->
        <form action="accion.php" method="post" class="form-inline">
            <div class="form-group mx-sm-3">
                <label for="country" class="col-sm-2 col-form-label">Country</label>
                <select class="form-control" id="country">
                    <option>Select</option>
                    <?php
                    echo $cadena;
                    ?>
                </select>
                <div class="col-auto">
                <input type="submit" value="Modificar Datos" class="btn btn-info">
            </div>
                <small class="form-text text-muted">Price list by country.</small>
            </div>

		</form>
          
          
       



  </body>
</html>

