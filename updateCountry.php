<?php
//include connection file 
include_once("connection.php");
$sql = "SELECT * FROM `josed_countries` limit 0,100 ";
$queryRecords = mysqli_query($conn, $sql) or die("error to fetch employees data");
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
<table id="employee_grid" class="table table-hover" cellspacing="0">
   <thead>
      <tr>
         <th>Country ID</th>
         <th>Country Name</th>
      </tr>
   </thead>
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['country_id'];?>">
         <td class="editable-col" maxlength="3" contenteditable="true" col-index='0' oldVal ="<?php echo $res['country_id'];?>"><?php echo $res['country_id'];?></td>
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['country_name'];?>"><?php echo $res['country_name'];?></td>
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
          url: "server.php",  
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
  });
});

</script>