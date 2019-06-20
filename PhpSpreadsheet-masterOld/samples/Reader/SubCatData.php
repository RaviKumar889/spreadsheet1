<?php
include('database.php');
$dataArray = []; 
if(isset($_POST['cat_value'])) {
    $category = "select sub_category FROM users where category = '".$_POST['cat_value']."' group by sub_category";  
    //echo($category);  
    $result = mysqli_query($conn, $category);
    if (mysqli_num_rows($result) > 0) {
        $i=0;
        while($row = mysqli_fetch_assoc($result)) {                      
            $row['sub_category']  = trim($row['sub_category']," ");            
            $dataArray[$i] = $row['sub_category'];
            $i++;
        }
           $new_arr = array_filter(array_map('trim',$dataArray),'strlen');          
           $tags = implode(',', $new_arr);          
           $arrVal   = explode(",",$tags);
           $new_arr2 = array_filter(array_map('trim',$arrVal),'strlen');          
           $finalArray = array_unique($new_arr2);     
           
           
          // echo('<pre>');
          // print_r($finalArray);
          echo(json_encode($finalArray));
          //  print_r($arrVal);
          //print_r(array_unique($arrVal));
          //print_r(array_unique($arrVal));
        
    }
} else{
// $category = "SELECT sub_cat_name FROM `subcategories`WHERE status=1 ORDER BY `sub_cat_name` ASC";
// $resultcategory = $conn->query($category);
// if ($resultcategory->num_rows > 0) {        

//     while($row_cat = $resultcategory->fetch_assoc()) {

//         //$resCat[] = $row_cat;
//         //print_r($row_cat);
//     }
    
// }
}
?>
