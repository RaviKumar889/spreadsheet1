<?php
include('database.php');

$category = "select TRIM(category) as category FROM users group by category";
$resultcategory = $conn->query($category);

if ($resultcategory->num_rows > 0) {    
    while($row_cat = $resultcategory->fetch_assoc()) { 
        $resCat[] = $row_cat;
                     
    }
    echo json_encode($resCat);  

} 
?>

