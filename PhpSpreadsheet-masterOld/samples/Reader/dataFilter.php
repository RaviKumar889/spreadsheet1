<?php
include('database.php');
$append = "";
$row_avg='';
$row_count='';
$row_max='';
$row_min='';
$count = "";
$max = "";
$min = "";
if(isset($_POST['columns'])) {    
     $arr[] =   explode(',',$_POST['columns']);                  

       foreach( $arr as $data) {   
           for( $i=0;$i<count($data) ; $i++) {
               
            if($data[$i] == 'Ra_id') {
                $data[$i] = "ra_id";
            }
    
            if($data[$i] == 'Campaign_name') {
                $data[$i] = "campaign_name";    
            }
            
            if($data[$i] == 'Company_email') {
                $data[$i] = "company_email";
            }
            
            if($data[$i] == 'Category') {
                $data[$i] = "category";
            }
            
            if($data[$i] == 'Sub_category') {
                $data[$i] = "sub_category";
            }
            
            if($data[$i] == 'Content_Length') {
                $data[$i] = "content_length";
            }
            
            if($data[$i] == 'Content_url') {
                $data[$i] = "content_url";
            }
            
            if($data[$i] == 'Target') {
                $data[$i] = "target";
            }
            
            if($data[$i] == 'Status') {
                $data[$i] = "status";
            }
            if($data[$i] == 'Lift') {
                $data[$i] = "lift";
            }
            
    
            if($data[$i] == 'urgency') {
                $data[$i] = "urgency";
            }
            
            if($data[$i] == 'Intent') {
                $data[$i] = "Intent";
            }
            
            if($data[$i] == 'Reaction_Ratio') {
                $data[$i] = "reaction_ratio";
            }
            
            if($data[$i] == 'Share') {
                $data[$i] = "share";
            }
            
            if($data[$i] == 'Recall') {
                $data[$i] = "recall";
            }
            
            if($data[$i] == 'Trust') {
                $data[$i] = "trust";
            }
            
            if($data[$i] == 'Virality') {
                $data[$i] = "virality";
            }
            
            if($data[$i] == 'Relatable') {
                $data[$i] = "relatable";
            }
            
            if($data[$i] == 'Relevance') {
                $data[$i] = "relevance";
            }
            
            if($data[$i] == 'attention') {
                $data[$i] = "attention";
            }
            
            if($data[$i] == 'Emotion_End') {
                $data[$i] = "emotion_end";
            }
            
            if($data[$i] == 'Awareness') {
                $data[$i] = "awareness";
            }
            
            if($data[$i] == 'Brand') {
                $data[$i] = "brand";
            }
            
            if($data[$i] == 'headroom_lift') {
                $data[$i] = "headroom_lift";
            }
            
            if($data[$i] == 'Positive_attitude') {
                $data[$i] = "positive_attitude";
            }
            
            if($data[$i] == 'Negative_attitude') {
                $data[$i] = "negative_attitude";
            }
            
            if($data[$i] == 'pre_interest') {
                $data[$i] = "pre_interest";
            }
            
            if($data[$i] == 'post_interest') {
                $data[$i] = "post_interest";
            }
            
            if($data[$i] == 'Urgency_Headroom_lift') {
                $data[$i] = "urgency_headroom_lift";
            }
            
            if($data[$i] == 'Positive_Urgency') {
                $data[$i] = "positive_urgency";
            }
            
            if($data[$i] == 'Negative_Urgency') {
                $data[$i] = "negative_urgency";
            }
            
            if($data[$i] == 'Urgency_Pre_Interest') {
                $data[$i] = "urgency_pre_interest";
            }
            
            if($data[$i] == 'Urgency_Post_Interest') {
                $data[$i] = "urgency_post_interest";
            }
            
            if($data[$i] == 'Subscriber_intent') {
                $data[$i] = "subscriber_intent";
            }
            
            if($data[$i] == 'Persuasion') {
                $data[$i] = "persuasion";
            }
            
            if($data[$i] == 'continuity') {
                $data[$i] = "continuity";
            }
            
            if($data[$i] == 'Enjoyment') {
                $data[$i] = "enjoyment";
            }
            
            if($data[$i] == 'Valence') {
                $data[$i] = "valence";
            }
            
            if($data[$i] == 'Arousal') {
                $data[$i] = "arousal";
            }
            
            if($data[$i] == 'Reaction_intensity') {
                $data[$i] = "reaction_intensity";
            }
            
            if($data[$i] == 'Attention_New') {
                $data[$i] = "attention_new";
            }
            
            if($data[$i] == 'Emotional_Engagement') {
                $data[$i] = "emotional_engagement";         
                }
            if($data[$i] == 'Action') {
                $data[$i] = "action";         
                }
            }
        }        
    $c = 0; $col="";
    foreach($data as $value) {
        if ( $value == '[object HTMLButtonElement]Sr_no' || $value == 'Edit' || $value == 'Action' || empty($value)) {
        } else {
            if( $c < 1 ) {
                $append = $append." avg(" .$value. ") as ". $value."";
                $count = $count." count(".$value. ") as ". $value."";
                $max = $max." max(" .$value. ") as ". $value."";
                $min = $min." min(" .$value. ") as ". $value."";

                $col = $value." REGEXP '^[0-9]+$'";
            }
            else {                
                $append = $append.", avg(".$value.") as ".$value."";
                $count = $count.", count(".$value.") as ".$value."";
                $max = $max." , max(".$value.") as ".$value."";
                $min = $min." , min(".$value.") as ". $value."";
                
                $col = $col." OR " .$value." REGEXP '^[0-9]+$'";
            }
            $c  =   $c + 1;     
        }           
    }

    $category = "select ".$append." from users WHERE ".$col."";
    $count_query    = "select ".$count." from users WHERE ".$col."";
    // echo $count_query;
    // die;
    $count_max    = "select " .$max." from users WHERE ".$col."";
    $count_min    = "select " .$min." from users WHERE ".$col."";
    

    // echo($count_query);
    // die;
    //$max      = "select ".$append." from users WHERE ".$col."";
    //$min      = "select ".$append." from users WHERE ".$col."";
    // echo($category);die;
    $result = mysqli_query($conn, $category);    
    $count_result = mysqli_query($conn, $count_query); 
    $max_result = mysqli_query($conn, $count_max); 
    $min_result = mysqli_query($conn, $count_min); 

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {                        
            $row_avg = "<tr role='row' class='odd'>
                        <td class='sorting_1'>Avg</td>                        
                        <td>".$row['ra_id']."</td>
                        <td>".$row['campaign_name']."</td>
                        <td>".$row['company_email']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['sub_category']."</td>
                        <td>".$row['content_length']."</td>
                        <td>".$row['content_url']."</td>
                        <td>".$row['target']."</td>
                        <td>".$row['status']."</td>
                        <td>".$row['lift']."</td>
                        <td>".$row['urgency']."</td>
                        <td>".$row['Intent']."</td>
                        <td>".$row['reaction_ratio']."</td>
                        <td>".$row['share']."</td>
                        <td>".$row['recall']."</td>
                        <td>".$row['trust']."</td>
                        <td>".$row['virality']."</td>
                        <td>".$row['relatable']."</td>
                        <td>".$row['relevance']."</td>
                        <td>".$row['attention']."</td>
                        <td>".$row['emotion_end']."</td>
                        <td>".$row['awareness']."</td>
                        <td>".$row['brand']."</td>
                        <td>".$row['headroom_lift']."</td>
                        <td>".$row['positive_attitude']."</td>
                        <td>".$row['negative_attitude']."</td>
                        <td>".$row['pre_interest']."</td>
                        <td>".$row['post_interest']."</td>
                        <td>".$row['urgency_headroom_lift']."</td>
                        <td>".$row['positive_urgency']."</td>
                        <td>".$row['negative_urgency']."</td>
                        <td>".$row['urgency_pre_interest']."</td>
                        <td>".$row['urgency_post_interest']."</td>
                        <td>".$row['subscriber_intent']."</td>
                        <td>".$row['persuasion']."</td>
                        <td>".$row['continuity']."</td>
                        <td>".$row['enjoyment']."</td>
                        <td>".$row['valence']."</td>
                        <td>".$row['arousal']."</td>
                        <td>".$row['reaction_intensity']."</td>
                        <td>".$row['attention_new']."</td>
                        <td>".$row['emotional_engagement']."</td>  
                        <td>".$row['action']."</td>                     
                        <td>--</td>
                        </tr>";
        }
       // echo $row_avg;        
    }
    //count
    if (mysqli_num_rows($count_result) > 0) {
        while($count_row = mysqli_fetch_assoc($count_result)) {                        
            $row_count = "<tr role='row' class='odd'>
                        <td class='sorting_1'>Count</td>                        
                        <td>".$count_row['ra_id']."</td>
                        <td>".$count_row['campaign_name']."</td>
                        <td>".$count_row['company_email']."</td>
                        <td>".$count_row['category']."</td>
                        <td>".$count_row['sub_category']."</td>
                        <td>".$count_row['content_length']."</td>
                        <td>".$count_row['content_url']."</td>
                        <td>".$count_row['target']."</td>
                        <td>".$count_row['status']."</td>
                        <td>".$count_row['lift']."</td>
                        <td>".$count_row['urgency']."</td>
                        <td>".$count_row['Intent']."</td>
                        <td>".$count_row['reaction_ratio']."</td>
                        <td>".$count_row['share']."</td>
                        <td>".$count_row['recall']."</td>
                        <td>".$count_row['trust']."</td>
                        <td>".$count_row['virality']."</td>
                        <td>".$count_row['relatable']."</td>
                        <td>".$count_row['relevance']."</td>
                        <td>".$count_row['attention']."</td>
                        <td>".$count_row['emotion_end']."</td>
                        <td>".$count_row['awareness']."</td>
                        <td>".$count_row['brand']."</td>
                        <td>".$count_row['headroom_lift']."</td>
                        <td>".$count_row['positive_attitude']."</td>
                        <td>".$count_row['negative_attitude']."</td>
                        <td>".$count_row['pre_interest']."</td>
                        <td>".$count_row['post_interest']."</td>
                        <td>".$count_row['urgency_headroom_lift']."</td>
                        <td>".$count_row['positive_urgency']."</td>
                        <td>".$count_row['negative_urgency']."</td>
                        <td>".$count_row['urgency_pre_interest']."</td>
                        <td>".$count_row['urgency_post_interest']."</td>
                        <td>".$count_row['subscriber_intent']."</td>
                        <td>".$count_row['persuasion']."</td>
                        <td>".$count_row['continuity']."</td>
                        <td>".$count_row['enjoyment']."</td>
                        <td>".$count_row['valence']."</td>
                        <td>".$count_row['arousal']."</td>
                        <td>".$count_row['reaction_intensity']."</td>
                        <td>".$count_row['attention_new']."</td>
                        <td>".$count_row['emotional_engagement']."</td>  
                        <td>".$count_row['action']."</td>                     
                        <td>--</td>
                        </tr>";
        }
        
    }

    //max

    if (mysqli_num_rows($max_result) > 0) {
        while($max_row = mysqli_fetch_assoc($max_result)) {                        
            $row_max = "<tr role='row' class='odd'>
                        <td class='sorting_1'>Max</td>                        
                        <td>".$max_row['ra_id']."</td>
                        <td>".$max_row['campaign_name']."</td>
                        <td>".$max_row['company_email']."</td>
                        <td>".$max_row['category']."</td>
                        <td>".$max_row['sub_category']."</td>
                        <td>".$max_row['content_length']."</td>
                        <td>".$max_row['content_url']."</td>
                        <td>".$max_row['target']."</td>
                        <td>".$max_row['status']."</td>
                        <td>".$max_row['lift']."</td>
                        <td>".$max_row['urgency']."</td>
                        <td>".$max_row['Intent']."</td>
                        <td>".$max_row['reaction_ratio']."</td>
                        <td>".$max_row['share']."</td>
                        <td>".$max_row['recall']."</td>
                        <td>".$max_row['trust']."</td>
                        <td>".$max_row['virality']."</td>
                        <td>".$max_row['relatable']."</td>
                        <td>".$max_row['relevance']."</td>
                        <td>".$max_row['attention']."</td>
                        <td>".$max_row['emotion_end']."</td>
                        <td>".$max_row['awareness']."</td>
                        <td>".$max_row['brand']."</td>
                        <td>".$max_row['headroom_lift']."</td>
                        <td>".$max_row['positive_attitude']."</td>
                        <td>".$max_row['negative_attitude']."</td>
                        <td>".$max_row['pre_interest']."</td>
                        <td>".$max_row['post_interest']."</td>
                        <td>".$max_row['urgency_headroom_lift']."</td>
                        <td>".$max_row['positive_urgency']."</td>
                        <td>".$max_row['negative_urgency']."</td>
                        <td>".$max_row['urgency_pre_interest']."</td>
                        <td>".$max_row['urgency_post_interest']."</td>
                        <td>".$max_row['subscriber_intent']."</td>
                        <td>".$max_row['persuasion']."</td>
                        <td>".$max_row['continuity']."</td>
                        <td>".$max_row['enjoyment']."</td>
                        <td>".$max_row['valence']."</td>
                        <td>".$max_row['arousal']."</td>
                        <td>".$max_row['reaction_intensity']."</td>
                        <td>".$max_row['attention_new']."</td>
                        <td>".$max_row['emotional_engagement']."</td>  
                        <td>".$max_row['action']."</td>                     
                        <td>--</td>
                        </tr>";
        }
               
    }
    //min
    if (mysqli_num_rows($min_result) > 0) {
        while($min_row = mysqli_fetch_assoc($min_result)) {                        
            $row_min = "<tr role='row' class='odd'>
                        <td class='sorting_1'>Min</td>                        
                        <td>".$min_row['ra_id']."</td>
                        <td>".$min_row['campaign_name']."</td>
                        <td>".$min_row['company_email']."</td>
                        <td>".$min_row['category']."</td>
                        <td>".$min_row['sub_category']."</td>
                        <td>".$min_row['content_length']."</td>
                        <td>".$min_row['content_url']."</td>
                        <td>".$min_row['target']."</td>
                        <td>".$min_row['status']."</td>
                        <td>".$min_row['lift']."</td>
                        <td>".$min_row['urgency']."</td>
                        <td>".$min_row['Intent']."</td>
                        <td>".$min_row['reaction_ratio']."</td>
                        <td>".$min_row['share']."</td>
                        <td>".$min_row['recall']."</td>
                        <td>".$min_row['trust']."</td>
                        <td>".$min_row['virality']."</td>
                        <td>".$min_row['relatable']."</td>
                        <td>".$min_row['relevance']."</td>
                        <td>".$min_row['attention']."</td>
                        <td>".$min_row['emotion_end']."</td>
                        <td>".$min_row['awareness']."</td>
                        <td>".$min_row['brand']."</td>
                        <td>".$min_row['headroom_lift']."</td>
                        <td>".$min_row['positive_attitude']."</td>
                        <td>".$min_row['negative_attitude']."</td>
                        <td>".$min_row['pre_interest']."</td>
                        <td>".$min_row['post_interest']."</td>
                        <td>".$min_row['urgency_headroom_lift']."</td>
                        <td>".$min_row['positive_urgency']."</td>
                        <td>".$min_row['negative_urgency']."</td>
                        <td>".$min_row['urgency_pre_interest']."</td>
                        <td>".$min_row['urgency_post_interest']."</td>
                        <td>".$min_row['subscriber_intent']."</td>
                        <td>".$min_row['persuasion']."</td>
                        <td>".$min_row['continuity']."</td>
                        <td>".$min_row['enjoyment']."</td>
                        <td>".$min_row['valence']."</td>
                        <td>".$min_row['arousal']."</td>
                        <td>".$min_row['reaction_intensity']."</td>
                        <td>".$min_row['attention_new']."</td>
                        <td>".$min_row['emotional_engagement']."</td>  
                        <td>".$min_row['action']."</td>                     
                        <td>--</td>
                        </tr>";
        }
        echo $row_avg.$row_count.$row_max.$row_min;
    }
}
?>
