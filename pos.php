<?php
if($_POST){
    $conexion = new mysqli("localhost","root","","online438_ociorders_local");
    if($conexion -> connect_error){
            die('Error de Conexi&oacute;n (' . $conexion -> connect_errno . ') '. $conexion -> connect_error);
    }

// price            esta en                 josed_document_types_by_country
// delivery_time         esta en            josed_document_types_by_country
// document_type_name            esta en    josed_document_types
// document_type_id  e.g AOA esta en        josed_document_types y josed_document_types_by_country
// country_id                esta en        josed_countries

   // $sql = "SELECT a.price,b.document_type_name FROM josed_document_types_by_country a,josed_document_types b WHERE a.document_type_id = b.document_type_id AND a.country_id LIKE '".$_POST["id"]."' HAVING a.price > 0 ";

    $sql = "SELECT a.price,b.document_type_name,a.delivery_time 
	        FROM josed_document_types_by_country a,josed_document_types b
			WHERE a.document_type_id = b.document_type_id AND a.country_id LIKE '".$_POST["id"]."' HAVING a.price > 0 AND a.delivery_time !=''";
	//!=''
    $resultado = $conexion -> query($sql);
    $cadena = '<table id="list" class="table table-hover">
              <thead>
               
                  <tr>
                      <th>Document Type</th>
                      <th>Delivery Time</th>
                      <th>Price</th>
                  </tr>
              </thead>
              
              <tbody>';
    while ($rows = $resultado  -> fetch_assoc()){
        $cadena .= '<tr>';
        $cadena .= '<td>'.$rows["document_type_name"].'</td>';
        $cadena .= '<td class="editable-col" contenteditable="true" col-index="0" oldVal ="<?php echo $res["delivery_time"];?>">'.$rows["delivery_time"].'</td>';
        $cadena .= '<td class="editable-col" contenteditable="true">'.$rows["price"].'</td>';
        $cadena .= '</tr>';
    }
    $cadena .= '</tbody>
          </table>';
    
    echo $cadena;
}