<?php 
	if($_POST){
    $conexion = new mysqli("localhost","root","","online438_ociorders_local");
    if($conexion -> connect_error){
      die('Error de Conexi&oacute;n (' . $conexion -> connect_errno . ') '. $conexion -> connect_error);
    }
  }


echo "Nombre: " .$_POST['country']; 

 echo $cadena;

  $sql2 = "SELECT a.price,b.document_type_name,a.delivery_time 
          FROM josed_document_types_by_country a,josed_document_types b
      WHERE a.document_type_id = b.document_type_id AND a.country_id LIKE '".$_POST["country"]."' HAVING a.price > 0 AND a.delivery_time !=''";

  $resultado2 = $conexion -> query($sql2);
  $cadena2 = '';
  while ($rows = $resultado2  -> fetch_assoc()){
    $cadena2 .= $rows["document_type_name"]. " - " .$rows["delivery_time"] ." - " .$rows["price"];
  }
   echo $cadena2;
?>
$sql = "SELECT a.price,b.document_type_name,a.delivery_time 
	        FROM josed_document_types_by_country a,josed_document_types b
			WHERE a.document_type_id = b.document_type_id AND a.country_id LIKE '".$_POST["id"]."' HAVING a.price > 0 AND a.delivery_time !=''";
	//!=''
    $queryRecords = mysqli_query($conn, $sql) or die("error to fetch employees data");

------------------------------

tabla+

------------------

<!--
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
          
          -->


          --------