<?php 
include('database.php');
$category = "select TRIM(sub_cat_name) as sub_category FROM subcategories";
$resultcategory = $conn->query($category);

if ($resultcategory->num_rows > 0) {    
    while($row_cat = $resultcategory->fetch_assoc()) {         
        $data = "<option value='".$row_cat['sub_category']."'>".$row_cat['sub_category']."</option>";  
        echo $data;                   
    }    
    
} 
?>