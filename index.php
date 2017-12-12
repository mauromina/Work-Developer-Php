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
        <form action="accion.php" method="POST">
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" class="form-control" id="country" >
                    <option>Select</option>
                    <?php
                    echo $cadena;
                    ?>
                </select>
                <p></p>
                <button type="submit" class="btn btn-success">Modificar Documentos</button>
                <small class="form-text text-muted">Price list by country.</small>
            </div>
		</form>
        

    <!-- Optional JavaScript -->   
    <script src="js/jquery-1.9.0.js"/>
    <script src="js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>




  </body>
</html>

