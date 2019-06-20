<?php
include('database.php');
if(isset($_POST['category']) && isset($_POST['sub_category']) ) {
    $category = "select content_length FROM users where category = '".$_POST['category']."' AND sub_category ='".$_POST['sub_category']."'";    
    $resultcategory = $conn->query($category);
    if ($resultcategory->num_rows > 0) {    
        while($row_cat = $resultcategory->fetch_assoc()) { 
            $resCat[] = $row_cat;                        
        }
        echo json_encode($resCat);  
    } 
    
} else{
    echo('');
}

// $category = "select content_length FROM users";
// $resultcategory = $conn->query($category);

// if ($resultcategory->num_rows > 0) {    
//     while($row_cat = $resultcategory->fetch_assoc()) { 
//         $resCat[] = $row_cat;
                     
//     }
//     echo json_encode($resCat);  

// } 
?>

