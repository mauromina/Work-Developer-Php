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

    
	<form id="ficha">
    <div id="content_name">
        <label>Document type</label>
        <input type="text" id="documento" name="documento" value="<?=$row['name']?>" />
    </div>
    <div id="content_lastname">
        <label>Apellidos</label>
           <input type="text" id="lastname" name="lastname" value="<?=$row['lastname']?>" />
    </div>
    <div id="content_email">
        <label>Email</label>
        <input type="text" id="email" name="email" value="<?=$row['email']?>" />
    </div>
    <div id="content_biography">
        <label>Biografía</label>
        <textarea rows="7" cols="30" name="biography"><?=$row['biography']?></textarea>
    </div>
</form>




  </body>
</html>