<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select *  FROM users";
$result = $conn->query($sql);

//  print_r($result);
//  die;

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Botstrap cdn -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- Botstrap cdn -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.1/js/dataTables.colReorder.min.js"></script>
    <style>
        .container{
        width:100vw !important;
        margin-left:4px !important;
        }
        .tableFixHead    { overflow-y: auto; height:100vh; }
        .tableFixHead th { position: sticky; top: 0; }

        /* Just common table stuff. Really. */
        table  { border-collapse: collapse; width: 100vw; height:100vh;}
        th, td { padding: 8px 16px; }
        th     { background:#eee; }

        .dataTables_filter {
            margin-bottom:10px !important;
        }
        span{
            margin-left:15px
        }
        /* filter css */
        .flex-container {
            display: flex;
            /* background-color: DodgerBlue; */
        }

        .flex-container > div {
            /* background-color: #f1f1f1; */
            margin: 10px;
            padding: 20px;
            font-size: 12px;
        }

        .wrapper{
            width:200px;
            padding:20px;
            height: 150px;
        }
    </style>
</head>
<body>
<div class="flex-container">
  <div class="page-header">
    <h3>Campaign Dashboard</h3>
  </div>
  <!-- selcet box1 -->
  <div>
  <form>
    <div class="form-group">
      <label for="sel1">Category</label>
      <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
  </form>
  </div>
  <!-- selcet box2 -->
  <div>
  <form>
    <div class="form-group">
      <label for="sel1">Sub-Category</label>
      <select class="form-control wrapper"  id="sel1" size="5">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
  </form>
  </div>
  <!-- selcet box1 -->
  <div>
  <form>
    <div class="form-group">
      <label for="sel1">C-length</label>
      <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
  </form>
  </div>
  </div>




<table id="example" class="display table table-bordered " style="width:100%">
        <thead style='postion:absolute ;top:0px'>
        <tr>
                <th>Sr.no<span><a href=""><img src="delete.png" alt="Smiley face" width="10" height="10"></a></span></th>
                <th>Ra_id <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Campaign_name <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Company_email <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Category <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Sub category <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Content Length <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Content_url <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Target <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Status <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Lift <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>urgency <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Intent <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Reaction Ratio <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Share <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Recall <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Trust <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Virality <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Relatable <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span></th>
                <th>Relevance <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th>
                <th>attention <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th>  </th>
                <th>Emotion-End <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Awareness<span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Brand <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>headroom_lift <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Positive_attitude <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Negative_attitude <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>pre_interest <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>post_interest <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Urgency Headroom lift <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Positive-Urgency <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Negative-Urgency <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Urgency-Pre-Interest <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Urgency-Post-Interest <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Subscriber_intent <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Persuasion <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>continuity <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Enjoyment <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Valence  <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Arousal  <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Reaction intensity <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th>  </th>
                <th>Attention New <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Emotional Engagement <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
                <th>Action <span><img src="delete.png" alt="Smiley face" width="10" height="10"></span> </th> </th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            $c=0 ;
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td><?php echo ++$c; ?></td>
                <td><?php if($row['ra_id']){ echo ($row['id']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['campaign_name']){ echo ($row['campaign_name']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['company_email']){ echo ($row['company_email']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['category']){ echo ($row['category']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['sub_category']){ echo ($row['sub_category']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['content_length']){ echo ($row['content_length']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['content_url']){ echo ($row['content_url']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['target']){ echo ($row['target']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['status']){ echo ($row['status']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['lift']){ echo ($row['lift']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['urgency']){ echo ($row['urgency']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['Intent']){ echo ($row['Intent']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['reaction_ratio']){ echo ($row['reaction_ratio']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['share']){ echo ($row['share']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['recall']){ echo ($row['recall']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['trust']){ echo ($row['trust']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['virality']){ echo ($row['virality']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['relatable']){ echo ($row['relatable']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['relevance']){ echo ($row['relevance']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['attention']){ echo ($row['attention']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['emotion_end']){ echo ($row['emotion_end']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['awareness']){ echo ($row['awareness']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['brand']){ echo ($row['brand']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['headroom_lift']){ echo ($row['headroom_lift']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['positive_attitude']){ echo ($row['positive_attitude']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['negative_attitude']){ echo ($row['negative_attitude']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['pre_interest']){ echo ($row['pre_interest']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['post_interest']){ echo ($row['post_interest']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['urgency_headroom_lift']){ echo ($row['urgency_headroom_lift']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['positive_urgency']){ echo ($row['positive_urgency']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['negative_urgency']){ echo ($row['negative_urgency']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['urgency_pre_interest']){ echo ($row['urgency_pre_interest']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['urgency_post_interest']){ echo ($row['urgency_post_interest']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['subscriber_intent']){ echo ($row['subscriber_intent']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['persuasion']){ echo ($row['persuasion']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['continuity']){ echo ($row['continuity']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['enjoyment']){ echo ($row['enjoyment']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['valence']){ echo ($row['valence']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['arousal']){ echo ($row['arousal']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['reaction_intensity']){ echo ($row['reaction_intensity']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['attention_new']){ echo ($row['attention_new']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['emotional_engagement']){ echo ($row['emotional_engagement']); } else { echo ('N/A'); }?></td>
                <td><?php if($row['action']){ echo ($row['action']); } else { echo ('N/A'); }?></td>
            </tr>
            <?php } }?>
        </tfoot>
    </table>
</body>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        colReorder: true
    } );

    $('#reset').click( function (e) {
        e.preventDefault();

        table.colReorder.reset();
    } );
} );
</script>
</html>
