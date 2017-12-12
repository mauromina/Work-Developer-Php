<?php
  $conexion = new mysqli("localhost","root","","online438_ociorders_local");
  if($conexion -> connect_error){
      die('Error de Conexi&oacute;n (' . $conexion -> connect_errno . ') '. $conexion -> connect_error);
  }

  $sql = "SELECT `country_name` FROM josed_countries  WHERE `country_id` = '".$_POST['country']."' ";
  $resultado = $conexion -> query($sql);
  $cadena = '';
  while ($rows = $resultado  -> fetch_assoc()){
    $cadena .= ':'.$rows["country_name"];
  }
  echo "Id Pais: " .$_POST['country' ] ;
  echo $cadena;

  $sql2 = "SELECT a.price,b.document_type_name,a.delivery_time, a.document_type_id FROM josed_document_types_by_country a,josed_document_types b
      WHERE a.document_type_id = b.document_type_id AND a.country_id LIKE '".$_POST["country"]."' HAVING a.price > 0 AND a.delivery_time !=''";

  $resultado2 = $conexion -> query($sql2);
  $cadena2 = '';
  while ($rows = $resultado2  -> fetch_assoc()){
    $cadena2 .= $rows["document_type_name"]. " - " .$rows["delivery_time"] ." - " .$rows["price"] ." - " .$rows["document_type_id"];
  }
   echo $cadena2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<title>Actualización Países</title>
</head>
<body>
<div class="form-group" style="padding:50px 150px;">
<h1>Actualización Países</h1>
<div id="msg" class="form-group"></div>
	  <!-- Content here -->

   <table id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
   <thead>
      <tr>
        <th>Document type</th>
        <th>Delivery time</th>
        <th>Price</th>
      </tr>
   </thead>
   <tbody id="_editable_table">
      <?php foreach($resultado2 as $res) :?>
      <tr data-row-id="<?php echo $res['document_type_id'];?>">
         <td><?php echo $res['document_type_name'];?></td>
         <td class="editable-col" contenteditable="true" col-index='0' oldVal ="<?php echo $res['delivery_time'];?>"><?php echo $res['delivery_time'];?></td>
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['price'];?>"><?php echo $res['price'];?></td>
      </tr>
    <?php endforeach;?>
   </tbody>
</table>


</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('td.editable-col').on('focusout', function() {
    data = {};
    data['val'] = $(this).text();
    data['id'] = $(this).parent('tr').attr('data-row-id');
    data['index'] = $(this).attr('col-index');
      if($(this).attr('oldVal') === data['val'])
    return false;



      $.ajax({
          type: "POST",
          url: "serviceServer.php",
          cache:false,
          data: data,
          dataType: "json",
          success: function(response)
          {
            //$("#loading").hide();
            if(!response.error) {
              $("#msg").removeClass('alert-danger');
              $("#msg").addClass('alert-success').html(response.msg);
            } else {
              $("#msg").removeClass('alert-success');
              $("#msg").addClass('alert-danger').html(response.msg);
            }
          }
        });


    alert("FOCUS FUNCIONANDO");
  });
});

</script>