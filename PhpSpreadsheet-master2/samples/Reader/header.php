<?php
include('database.php');
setcookie("category", "test", time() + 3600, '/'); 
if( isset($_POST['category']) && !empty($_POST['category']) )
{   
  setcookie('category',$_POST['category'],time() + (86400 * 30), "/" );  
}else{  
  setcookie("category", "test", time() + 3600, '/'); 
}

if ( isset( $_POST['filterOne']) && ( (!empty($_POST['category'])) || ((!empty($_POST['sub_category']))) || ((!empty($_POST['content_length'])))    ) ) { 
  if( isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['sub_category']) && !empty($_POST['sub_category']) && isset($_POST['content_length']) && !empty($_POST['content_length']) ) {
  //echo('3 selected');
  $append='';
  $C=1;
  foreach($_POST['sub_category'] as $data) {
  $C++;
  //echo $data;    
  if($C>2){
  $append= $append . " OR sub_category like '%".$data."%'";
  }else{
  $append=$append." sub_category like '%".$data."%'";   
  }
  //echo $append;
  }
  $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%' AND (".$append.") AND content_length ".$_POST['content_length'].""; 
 // echo($sql);   
  }

  //category and subcategory
  if( isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['sub_category']) && !empty($_POST['sub_category'] && empty($_POST['content_length'])) ) {
    //echo('category,sub_category selected');
    $append='';    $C=1;  
    foreach($_POST['sub_category'] as $data) {
      $C++;    
    if ( $C > 2 ) {
      $append= $append . "OR sub_category like '%".$data."%'";
    } else {
      $append = $append." sub_category like '%".$data."%'";   
    }
    //echo $append;
    }
    $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%' AND (".$append.")"; 
    //echo($sql) ;    
  }


  //category and content length
  if( empty($_POST['sub_category']) && isset($_POST['content_length']) && !empty($_POST['content_length']) && isset($_POST['category']) && !empty($_POST['category']) ){
    //echo('category and content length selected');
    $sql = "SELECT * FROM users WHERE content_length " .$_POST['content_length']. " AND category like '%".$_POST['category']."%'";  
    //echo($sql);
  }

  //content length
  if( isset($_POST['content_length']) && !empty($_POST['content_length']) ){
    if(empty($_POST['sub_category']) && empty($_POST['category'])) {   
    // echo('content_length selected');  
    $sql = "SELECT * FROM users WHERE content_length " .$_POST['content_length']."";  
    //echo($sql) ;
    //echo($sql);
  }
}

  //category
  // && empty($_POST['sub_category']) && empty($_POST['content_length']) ) {
  if( isset($_POST['category']) && !empty($_POST['category']) ){
    if(empty($_POST['sub_category']) && empty($_POST['content_length'])) {
      //echo('category selected');  
      $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%'";
      //echo($sql);
      //echo($sql) ;
    }
}

} else {
  $sql ="select *  FROM users";
  //echo($sql) ;
}//main if else
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.1/css/colReorder.dataTables.min.css"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <!-- Botstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    <!-- Botstrap cdn -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.1/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"></script>
    <link rel = "stylesheet" type = "text/css" href = "Camapigns.css" />
    <link rel="stylesheet" type="text/css" href="lib/example-styles.css">
    <!-- <script type="text/javascript" src="lib/jquery-2.2.4.min.js"></script> -->
    <!-- <script type="text/javascript" src="lib/jquery.multi-select.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/average().js"></script>
  <script src="javascriptFile.js"></script>
</head>

