<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

require __DIR__ . '/../Header.php';

$inputFileType = 'Xlsx';
$inputFileName = __DIR__ . '/sampleData/scale.xlsx';

//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
$reader = IOFactory::createReader($inputFileType);
//$helper->log('Turning Formatting off for Load');
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


// // var_dump($sheetData);
//  echo('<pre>');
//  print_r($sheetData);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$c =0;
for($i = 2 ; $i <= count($sheetData) ;$i++ ) {           
    $c++;
    $ra_id = $sheetData[$i]['B'];
    $campaign_name = $sheetData[$i]['C'];
    $company_email = $sheetData[$i]['D'];
    $category  =    $sheetData[$i]['E'];
    $sub_category = $sheetData[$i]['F'];
    $content_length = $sheetData[$i]['G'];
    $content_url   = $sheetData[$i]['H'];
    $target         = $sheetData[$i]['I'];    
    $status         = $sheetData[$i]['J'];
    $lift         = $sheetData[$i]['K'];
    $urgency       = $sheetData[$i]['L'];
    $Intent       = $sheetData[$i]['M'];
    $reaction_ratio = $sheetData[$i]['N'];
    $share       = $sheetData[$i]['O'];
    $recall       = $sheetData[$i]['P'];
    $trust       = $sheetData[$i]['Q'];
    $virality       = $sheetData[$i]['R'];
    $relatable       = $sheetData[$i]['S'];    
    $relevance       = $sheetData[$i]['T'];
    $attention       = $sheetData[$i]['U'];
    $emotion_end       = $sheetData[$i]['V'];
    $awareness      =  $sheetData[$i]['W'];
    $brand       = $sheetData[$i]['X'];
    $headroom_lift  =  $sheetData[$i]['Y'];
    $positive_attitude = $sheetData[$i]['Z'];
    $negative_attitude = $sheetData[$i]['AA'];
    $pre_interest = $sheetData[$i]['AB'];
    $post_interest = $sheetData[$i]['AC'];
    $urgency_headroom_lift = $sheetData[$i]['AD'];
    $positive_urgency = $sheetData[$i]['AE'];
    $negative_urgency = $sheetData[$i]['AF'];
    $urgency_pre_interest = $sheetData[$i]['AG'];
    $urgency_post_interest = $sheetData[$i]['AH'];
    $subscriber_intent = $sheetData[$i]['AI'];
    $persuasion = $sheetData[$i]['AJ'];
    $continuity = $sheetData[$i]['AK'];
    $enjoyment = $sheetData[$i]['AL'];
    $valence = $sheetData[$i]['AM'];
    $arousal = $sheetData[$i]['AN'];
    $reaction_intensity = $sheetData[$i]['AO'];
    $attention_new = $sheetData[$i]['AP'];
    //$attention_new = $sheetData[$i]['AP'];
    $emotional_engagement = $sheetData[$i]['AQ']; 
    $action = $sheetData[$i]['AR']; 
    
    $sql = "INSERT INTO users (
        id,
        ra_id,
        campaign_name,
        company_email,
        category,
        sub_category,
        content_length,
        content_url,
        target,
        status,
        lift,
        urgency,
        Intent,
        reaction_ratio,
        share,
        recall,
        trust,
        virality,
        relatable,
        relevance,
        attention,
        emotion_end,
        awareness,
        brand,
        headroom_lift,
        positive_attitude,
        negative_attitude,
        pre_interest,
        post_interest,
        urgency_headroom_lift,
        positive_urgency,
        negative_urgency,
        urgency_pre_interest,
        urgency_post_interest,
        subscriber_intent,
        persuasion,
        continuity,
        enjoyment,
        valence,
        arousal,
        reaction_intensity,
        attention_new,
        emotional_engagement,
        action)        
        VALUES ('',$ra_id,'$campaign_name','$company_email','$category','$sub_category','$content_length','$content_url','$target','$status','$lift','$urgency',
        '$Intent','$reaction_ratio','$share','$recall','$trust','$virality','$relatable','$relevance','$attention','$emotion_end','$awareness','$brand',
        '$headroom_lift','$positive_attitude','$negative_attitude','$pre_interest','$post_interest','$urgency_headroom_lift','$positive_urgency',
        '$negative_urgency','$urgency_pre_interest','$urgency_post_interest','$subscriber_intent','$persuasion','$continuity','$enjoyment','$valence','$arousal','$reaction_intensity',
        '$attention_new','$emotional_engagement','$action')";
        
        $conn->query($sql);

}
//echo($c);

if ($c > 0) {
    echo ($c."records created successfully");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
