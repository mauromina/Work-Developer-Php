
<?php
	//include connection file 
	include_once("connection.php");
    
    
	//define index of column
	$columns = array(
		0 =>'delivery_time',
		1 => 'price'
	);
	$error = false;
	$colVal = '';
	$colIndex = $rowId = 0;
	
	$msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

	if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && !$error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  !$error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['id']) && !$error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }
	
	if(!$error) {
			
			$sql = "UPDATE josed_document_types_by_country SET ".$columns[$colIndex]." = '".$colVal."' WHERE document_type_id ='".$rowId."'";
			//$sql = "UPDATE josed_countries SET country_name = 'LOL YOLO' WHERE country_id ='XAD'";

			
			$status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			$msg = array('error' => $error, 'msg' => 'Success! updation in mysql');

	} else {
		$msg = array('error' => $error, 'msg' => 'Error Actualizacion in mysql');
	}
	}
	// send data as json format
	$LOL = "11111"
	echo json_encode($LOL);
	
?>
	