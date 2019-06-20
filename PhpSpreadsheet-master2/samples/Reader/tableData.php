<?php 
include('database.php');
// case1:
// if(isset($_POST['cat_value']) && isset($_POST['sub_cat_value']) && isset($_POST['c_length']))
// {
// echo "all";
// }elseif(isset($_POST['cat_value']) && isset($_POST['sub_cat_value']))
// {
//     echo "1 and 2";
// }
// elseif(isset($_POST['cat_value']) && isset($_POST['c_length']))
// {
//     echo "1 and 3";
// }
// elseif(isset($_POST['sub_cat_value']) && isset($_POST['c_length']))
// {
//     echo "2 and 3";
// }
// elseif(isset($_POST['sub_cat_value']))
// {
//   echo "3";
// }
// elseif(isset($_POST['cat_value']))
// {
//     echo "1";
// }
// elseif(isset($_POST['c_length']))
// {
//     echo "2";
// }

// else{
// echo "nothing";
// }
// die();

if(isset($_POST['cat_value']) && !empty($_POST['cat_value']) ) {

    if( ( isset($_POST['sub_cat_value']) && empty($_POST['sub_cat_value'])) OR (!isset($_POST['sub_cat_value']) ) ) {

        if( ( isset($_POST['c_length']) && empty($_POST['c_length'])) OR (!isset($_POST['c_length']) ) ) {
            die('category selected only');
            $query = "select * from users where category like '%".$_POST['cat_value']."%'";            
        }

    }   
}   

    if(isset($_POST['sub_cat_value']) && !empty($_POST['sub_cat_value']) ){
        if( ( isset($_POST['cat_value']) && empty($_POST['cat_value'])) OR (!isset($_POST['cat_value']) ) ) {
            if( ( isset($_POST['c_length']) && empty($_POST['c_length'])) OR (!isset($_POST['c_length']) ) ) {
                //die('sub_cat_value selected only');
                $query = "select * from users where category like '%".$_POST['cat_value']."%'";
            }    
        }        
    }

//cat and sub cat    
    if(isset($_POST['sub_cat_value']) && !empty($_POST['sub_cat_value']) ){
        if( ( isset($_POST['cat_value']) && !empty($_POST['cat_value'])) ) {
            //if( (!isset($_POST['c_length']) && empty($_POST['c_length'])) ) {
                //die('sub_cat_value and cat selected only');
                $append='';
                $C=1;
                foreach($_POST['sub_cat_value'] as $data) {
                $C++;
                //echo $data;
                if($C>2){
                $append= $append . " OR sub_category like '%".$data."%'";
                }else{
                $append = $append." sub_category like '%".$data."%'";
                }
                //echo $append;
                }

                $query = "select * from users where category like '%".$_POST['cat_value']."%' AND".$append."";
                //echo $query;
            //}    
        }        
    }



    if(isset($_POST['c_length']) && !empty($_POST['c_length']) ) {
        if( ( isset($_POST['cat_value']) && empty($_POST['cat_value'])) OR (!isset($_POST['cat_value']) ) ) {
            if( ( isset($_POST['sub_cat_value']) && empty($_POST['sub_cat_value'])) OR (!isset($_POST['sub_cat_value']) ) ) {
                //die('c_length selected only');
                
                $query = "select * from users where category like '%".$_POST['cat_value']."%'";
            }
    
        }        
    }



    if(isset($_POST['c_length']) && isset($_POST['cat_value']) && isset($_POST['sub_cat_value'])) {
            //$query = "select * from users where category like '%".$_POST['cat_value']."%'";
            $append='';
            $C=1;
            foreach($_POST['sub_cat_value'] as $data) {
            $C++;
            //echo $data;
            if($C>2){
            $append= $append . " OR sub_category like '%".$data."%'";
            }else{
            $append = $append." sub_category like '%".$data."%'";
            }
            //echo $append;
            }
            $query = "SELECT * FROM users WHERE ".$append." AND category like '%".$_POST['cat_value']."%' AND content_length " .$_POST['c_length']."";
            //echo($query);
    } 
//  elseif(isset($_POST['sub_cat_value']) && !empty($_POST['sub_cat_value']) && empty($_POST['c_length']) || empty($_POST['cat_value'])) {
//     die('case2');
//     $append='';
//     $C=1;
//     foreach($_POST['sub_cat_value'] as $data) {
//     $C++;
//     //echo $data;
//     if($C>2){
//     $append= $append . " OR sub_category like '%".$data."%'";
//     }else{
//     $append=$append." sub_category like '%".$data."%'";
//     }
//     //echo $append;
//     }
//     $query = "SELECT * FROM users WHERE ".$append."";       

// } elseif(isset($_POST['c_length']) && !empty($_POST['c_length']) && empty($_POST['sub_cat_value']) && empty($_POST['cat_value']) ){     
//      die('case3');
//     $query = "SELECT * FROM users WHERE content_length " .$_POST['c_length']."";   
//     echo($query) ;            
// } else{
//     // die('in else');
//     $query = "select * from users";
// }
//echo $query;
$result = $conn->query($query);
if ($result->num_rows > 0) {  
    $i=0;  
    while($row_cat = $result->fetch_assoc()) {         
        $i++;
        $data = "<tr class='table_row'>
                <td>".$i."</td>
                <td>".$row_cat['ra_id']."</td>
                <td>".$row_cat['campaign_name']."</td>
                <td>".$row_cat['company_email']."</td>
                <td>".$row_cat['category']."</td>
                <td>".$row_cat['sub_category']."</td>
                <td>".$row_cat['content_length']."</td>
                <td>".$row_cat['content_url']."</td>
                <td>".$row_cat['target']."</td>
                <td>".$row_cat['status']."</td>
                <td>".$row_cat['lift']."</td>
                <td>".$row_cat['urgency']."</td>
                <td>".$row_cat['Intent']."</td>
                <td>".$row_cat['reaction_ratio']."</td>
                <td>".$row_cat['share']."</td>                
                <td>".$row_cat['recall']."</td>
                <td>".$row_cat['trust']."</td>
                <td>".$row_cat['virality']."</td>
                <td>".$row_cat['relatable']."</td>
                <td>".$row_cat['relevance']."</td>
                <td>".$row_cat['attention']."</td>
                <td>".$row_cat['emotion_end']."</td>
                <td>".$row_cat['awareness']."</td>
                <td>".$row_cat['brand']."</td>
                <td>".$row_cat['headroom_lift']."</td>
                <td>".$row_cat['positive_attitude']."</td>
                <td>".$row_cat['negative_attitude']."</td>
                <td>".$row_cat['pre_interest']."</td>
                <td>".$row_cat['post_interest']."</td>
                <td>".$row_cat['urgency_headroom_lift']."</td>
                <td>".$row_cat['positive_urgency']."</td>
                <td>".$row_cat['negative_urgency']."</td>
                <td>".$row_cat['urgency_pre_interest']."</td>
                <td>".$row_cat['urgency_post_interest']."</td>
                <td>".$row_cat['subscriber_intent']."</td>
                <td>".$row_cat['persuasion']."</td>
                <td>".$row_cat['continuity']."</td>
                <td>".$row_cat['enjoyment']."</td>
                <td>".$row_cat['valence']."</td>
                <td>".$row_cat['arousal']."</td>
                <td>".$row_cat['reaction_intensity']."</td>
                <td>".$row_cat['attention_new']."</td>
                <td>".$row_cat['emotional_engagement']."</td>
                <td>".$row_cat['action']."</td>
                <td><button id=".$row_cat['id']." class='btn btn-primary editBtn' data-toggle='modal' data-target='#message'>Edit</button></td>
                </tr>";  
        echo $data;                   
    }    
    
} 


?>