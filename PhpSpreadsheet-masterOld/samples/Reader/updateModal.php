<?php
include('database.php');
if(isset($_POST['campaign_name']) && !empty($_POST['campaign_name'])) {  
   $id  =   mysqli_real_escape_string($conn, $_POST['id']);
   if(empty($id)){
    $id ='';
   } 
   $ra_id  =   mysqli_real_escape_string($conn, $_POST['ra_id']);
   if(empty($ra_id)){
    $ra_id ='N/A';
   }

   $campaign_name  =   mysqli_real_escape_string($conn, $_POST['campaign_name']);
   if(empty($campaign_name)){
    $campaign_name ='N/A';
   }

   $company_email  =   mysqli_real_escape_string($conn, $_POST['company_email']);
   if(empty($company_email)){
    $company_email ='N/A';
   }   

   $category  =   mysqli_real_escape_string($conn, $_POST['category']);
   if(empty($category)){
    $category ='N/A';
   }   

   $sub_category  =   mysqli_real_escape_string($conn, $_POST['sub_category']);
   if(empty($sub_category)){
    $sub_category ='N/A';
   }else{
    $sub_category =$sub_category; 
   }

   $content_length  =   mysqli_real_escape_string($conn, $_POST['content_length']);
   if(empty($content_length)){
    $content_length ='N/A';
   }

   $content_url  =   mysqli_real_escape_string($conn, $_POST['content_url']);
   if(empty($content_url)){
    $content_url ='N/A';
   }

   $target  =   mysqli_real_escape_string($conn, $_POST['target']);
   if(empty($target)){
    $target ='N/A';
   }
   
   $status	  =   mysqli_real_escape_string($conn, $_POST['status']);
   if(empty($status)){
    $status ='N/A';
   }

   $lift  =   mysqli_real_escape_string($conn, $_POST['lift']);
   if(empty($lift)){
    $lift ='N/A';
   }

   $urgency  =   mysqli_real_escape_string($conn, $_POST['urgency']);
   if(empty($urgency)){
    $urgency ='N/A';
   }

   $Intent  =   mysqli_real_escape_string($conn, $_POST['Intent']);
   if(empty($Intent)){
    $Intent ='N/A';
   }

   $reaction_ratio  =   mysqli_real_escape_string($conn, $_POST['reaction_ratio']);
   if(empty($reaction_ratio)){
    $reaction_ratio ='N/A';
   }

   $share  =   mysqli_real_escape_string($conn, $_POST['share']);
   if(empty($share)){
    $share ='N/A';
   }

   $recall  =   mysqli_real_escape_string($conn, $_POST['recall']);
   if(empty($recall)){
    $recall ='N/A';
   }

   $trust  =   mysqli_real_escape_string($conn, $_POST['trust']);
   if(empty($trust)){
    $trust ='N/A';
   }

   $virality  =   mysqli_real_escape_string($conn, $_POST['virality']);
   if(empty($virality)){
    $virality ='N/A';
   }

   $relatable  =   mysqli_real_escape_string($conn, $_POST['relatable']);
   if(empty($relatable)){
    $relatable ='N/A';
   }

   $relevance  =   mysqli_real_escape_string($conn, $_POST['relevance']);
   if(empty($relevance)){
    $relevance ='N/A';
   }

   $attention  =   mysqli_real_escape_string($conn, $_POST['attention']);
   if(empty($attention)){
    $attention ='N/A';
   }

   $emotion_end  =   mysqli_real_escape_string($conn, $_POST['emotion_end']);
   if(empty($emotion_end)){
    $emotion_end ='N/A';
   }

   $awareness  =   mysqli_real_escape_string($conn, $_POST['awareness']);
   if(empty($awareness)){
    $awareness ='N/A';
   }

   $brand  =   mysqli_real_escape_string($conn, $_POST['brand']);
   if(empty($brand)){
    $brand ='N/A';
   }

   $headroom_lift  =   mysqli_real_escape_string($conn, $_POST['headroom_lift']);
   if(empty($headroom_lift)){
    $headroom_lift ='N/A';
   }

   $positive_attitude  =   mysqli_real_escape_string($conn, $_POST['positive_attitude']);
   if(empty($positive_attitude)){
    $positive_attitude ='N/A';
   }
   
   $negative_attitude  =   mysqli_real_escape_string($conn, $_POST['negative_attitude']);
   if(empty($negative_attitude)){
    $negative_attitude ='N/A';
   }

   $pre_interest  =   mysqli_real_escape_string($conn, $_POST['pre_interest']);
   if(empty($pre_interest)){
    $pre_interest ='N/A';
   }
   
   $post_interest  =   mysqli_real_escape_string($conn, $_POST['post_interest']); 
   if(empty($post_interest)){
    $post_interest ='N/A';
   }  

   $urgency_headroom_lift  =   mysqli_real_escape_string($conn, $_POST['urgency_headroom_lift']); 
   if(empty($urgency_headroom_lift)){
    $urgency_headroom_lift ='N/A';
   }   

   $positive_urgency  =   mysqli_real_escape_string($conn, $_POST['positive_urgency']); 
   if(empty($positive_urgency)){
    $positive_urgency ='N/A';
   }   

   $negative_urgency  =   mysqli_real_escape_string($conn, $_POST['negative_urgency']);
   if(empty($negative_urgency)){
    $negative_urgency ='N/A';
   }   
      
   $urgency_pre_interest  =   mysqli_real_escape_string($conn, $_POST['urgency_pre_interest']); 
   if(empty($urgency_pre_interest)){
    $urgency_pre_interest ='N/A';
   }     

   $urgency_post_interest  =   mysqli_real_escape_string($conn, $_POST['urgency_post_interest']);
   if(empty($urgency_post_interest)){
    $urgency_post_interest ='N/A';
   }
   $subscriber_intent  =   mysqli_real_escape_string($conn, $_POST['subscriber_intent']);   
   if(empty($subscriber_intent)){
    $subscriber_intent ='N/A';
   }
   $persuasion  =   mysqli_real_escape_string($conn, $_POST['persuasion']);  
   if(empty($persuasion)){
    $persuasion ='N/A';
   }
   
   $continuity  =   mysqli_real_escape_string($conn, $_POST['continuity']);  
   $continuity  =   mysqli_real_escape_string($conn, $_POST['continuity']);  
   if(empty($continuity)) {
    $continuity ='N/A';
   }

   $enjoyment  =   mysqli_real_escape_string($conn, $_POST['enjoyment']); 
   if(empty($enjoyment)) {
    $enjoyment ='N/A';
   }

   $valence  =   mysqli_real_escape_string($conn, $_POST['valence']);
   if(empty($valence)) {
    $valence ='N/A';
   }

   $arousal  =   mysqli_real_escape_string($conn, $_POST['arousal']); 
   if(empty($arousal)) {
    $arousal ='N/A';
   }
  
   $reaction_intensity  =   mysqli_real_escape_string($conn, $_POST['reaction_intensity']);   
   if(empty($reaction_intensity)) {
    $reaction_intensity ='N/A';
   }
  

   $attention_new  =   mysqli_real_escape_string($conn, $_POST['attention_new']);  
   if(empty($attention_new)) {
    $attention_new ='N/A';
   }
   
   $emotional_engagement  =   mysqli_real_escape_string($conn, $_POST['emotional_engagement']);
   if(empty($emotional_engagement)) {
    $emotional_engagement ='N/A';
   }
   $action  =   mysqli_real_escape_string($conn, $_POST['action']);
   if(empty($action)) {
    $action ='N/A';
   }

    $sql ="UPDATE users SET 
    ra_id ='$ra_id',
    campaign_name ='$campaign_name',
    company_email ='$company_email',
    category ='$category',
    sub_category ='$sub_category',
    content_length ='$content_length',
    content_url ='$content_url',
    target ='$target',
    status ='$status',
    lift ='$lift',
    urgency ='$urgency',
    Intent ='$Intent',
    reaction_ratio ='$reaction_ratio',
    share ='$share',
    recall ='$recall',
    trust ='$trust',
    virality ='$virality',
    relatable ='$relatable',
    relevance ='$relevance',
    attention ='$attention',
    emotion_end ='$emotion_end',
    awareness ='$awareness',
    brand ='$brand',
    headroom_lift ='$headroom_lift',
    positive_attitude ='$positive_attitude',
    negative_attitude ='$negative_attitude',
    pre_interest ='$pre_interest',
    post_interest ='$post_interest',
    post_interest ='$post_interest',
    urgency_headroom_lift ='$urgency_headroom_lift',
    negative_urgency ='$negative_urgency',
    urgency_pre_interest ='$urgency_pre_interest',    
    urgency_post_interest ='$urgency_post_interest',
    subscriber_intent ='$subscriber_intent',
    persuasion ='$persuasion',
    continuity ='$continuity', 
    enjoyment ='$enjoyment', 
    valence ='$valence',
    arousal ='$arousal',
    reaction_intensity ='$reaction_intensity',
    attention_new ='$attention_new',
    emotional_engagement ='$emotional_engagement',
    action ='$action'
    WHERE id ='$id'";  
    
    //echo($sql);
    if($conn->query($sql) === TRUE){
        echo('1');
    }else{
        echo('0');
    }
} else {
    echo('sdc');
}