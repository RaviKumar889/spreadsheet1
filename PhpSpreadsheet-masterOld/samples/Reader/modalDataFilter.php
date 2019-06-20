<?php
include('database.php');
if(isset( $_POST['id'] ) && !empty($_POST['id']) ){
    $sqlModal = "select * from users where id='".$_POST['id']."'";       
    $result = mysqli_query($conn, $sqlModal);

if (mysqli_num_rows($result) > 0) {    
    while($row = mysqli_fetch_assoc($result)) {
        echo(json_encode($row));
    }
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
}

?>