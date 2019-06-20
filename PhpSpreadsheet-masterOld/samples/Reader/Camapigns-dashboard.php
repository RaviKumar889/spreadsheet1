<?php
include('database.php');
setcookie("category", "test", time() + 3600, '/');
if( isset($_POST['category']) && !empty($_POST['category']) )
{
  setcookie('category',$_POST['category'],time() + (86400 * 30), "/" );
}else{
  setcookie("category", "test", time() + 3600, '/');
}

if ( isset( $_POST['filterOne']) && ( (!empty($_POST['category'])) || ((!empty($_POST['sub_category']))) || ((!empty($_POST['content_length'])))    ) ) {
  if( isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['sub_category']) && !empty($_POST['sub_category']) && isset($_POST['content_length']) && !empty($_POST['content_length']) ) {
  //echo('3 selected');
  $append='';
  $C=1;
  foreach($_POST['sub_category'] as $data) {
  $C++;
  //echo $data;
  if($C>2){
  $append= $append . " OR sub_category like '%".$data."%'";
  }else{
  $append=$append." sub_category like '%".$data."%'";
  }
  //echo $append;
  }
  $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%' AND (".$append.") AND content_length ".$_POST['content_length']."";
 // echo($sql);
  }

  //category and subcategory
  if( isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['sub_category']) && !empty($_POST['sub_category'] && empty($_POST['content_length'])) ) {
    //echo('category,sub_category selected');
    $append='';    $C=1;
    foreach($_POST['sub_category'] as $data) {
      $C++;
    if ( $C > 2 ) {
      $append= $append . "OR sub_category like '%".$data."%'";
    } else {
      $append = $append." sub_category like '%".$data."%'";
    }
    //echo $append;
    }
    $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%' AND (".$append.")";
    //echo($sql) ;
  }


  //category and content length
  if( empty($_POST['sub_category']) && isset($_POST['content_length']) && !empty($_POST['content_length']) && isset($_POST['category']) && !empty($_POST['category']) ){
    //echo('category and content length selected');
    $sql = "SELECT * FROM users WHERE content_length " .$_POST['content_length']. " AND category like '%".$_POST['category']."%'";
    //echo($sql);
  }

  //content length
  if( isset($_POST['content_length']) && !empty($_POST['content_length']) ){
    if(empty($_POST['sub_category']) && empty($_POST['category'])) {
    // echo('content_length selected');
    $sql = "SELECT * FROM users WHERE content_length " .$_POST['content_length']."";
    //echo($sql) ;
    //echo($sql);
  }
}

  //category
  // && empty($_POST['sub_category']) && empty($_POST['content_length']) ) {
  if( isset($_POST['category']) && !empty($_POST['category']) ){
    if(empty($_POST['sub_category']) && empty($_POST['content_length'])) {
      //echo('category selected');
      $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%'";
      //echo($sql);
      //echo($sql) ;
    }
}

} else {
  $sql ="select * FROM users";
  //echo($sql) ;
}//main if else
$result = $conn->query($sql);
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Botstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    <!-- Botstrap cdn -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.1/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"></script>
    <link rel = "stylesheet" type = "text/css" href = "Camapigns.css" />
    <link rel="stylesheet" type="text/css" href="lib/example-styles.css">
    <!-- <script type="text/javascript" src="lib/jquery-2.2.4.min.js"></script> -->
    <!-- <script type="text/javascript" src="lib/jquery.multi-select.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/average().js"></script>

</head>
<body>
<form action="" method="POST" id="form1">
<div class="flex-container">
      <div class="">
          <img src="monet.png" alt="Smiley face" height="42" width="42">
        </div>

      <div class="form-group">
          <label for="sel1">Category</label>
          <select class="form-control" id="catg" name="category">
          <option value="">Select Category</option>
          </select>
        </div>

      <div class="form-group">
          <label>Select Sub Category</label><br />
          <select id="sub_category" name="sub_category[]" multiple class="form-control">
          </select>
    </div>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group">
          <label for="sel1">Category Length</label>
            <select class="form-control" id="c_length" name="content_length">
              <option value="">Select Length</option>
              <option <?php if ( isset($_POST['content_length']) && $_POST['content_length'] == "BETWEEN  0 AND 30") { echo 'selected'; }?> value="BETWEEN  0 AND 30">0-30</option>
              <option <?php if ( isset($_POST['content_length']) && $_POST['content_length'] == "BETWEEN  31 AND 60") { echo 'selected'; }?> value="BETWEEN  31 AND 60">31-60</option>
              <option <?php if ( isset($_POST['content_length']) && $_POST['content_length'] == ">=61") { echo 'selected'; }?> value=">=61">61+</option>
            </select>
      </div>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div>
      <button type="submit" name="filterOne" class="filter btn btn-primary">Filter</button>
      </div>
   </form>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div>
      <button href="Camapigns-dashboard.php" class="filter btn btn-success">Show All</button>
</div>
<div class="groove">
  <button id="average"  style="display:none" type='button'>Average</button>
  <button id="reset" class ="filter btn btn-info"type='button'>Reset Order</button>
</div>

</div>
<!----------------------------------------------------------------------------end flex-container ------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------Toggle button div------------------------------------------------------------------------------------------>
<div class="toggleDiv">
    <a class="toggle-vis" data-column-index="0">Sr.no</a>
    <a class="toggle-vis" data-column-index="1">Ra_id</a>
    <a class="toggle-vis" data-column-index="2">Campaign_name</a>
    <a class="toggle-vis" data-column-index="3">Company_email</a>
    <a class="toggle-vis" data-column-index="4">Category</a>
    <a class="toggle-vis" data-column-index="5">Sub category</a>
    <a class="toggle-vis" data-column-index="6">Content Length</a>
    <a class="toggle-vis" data-column-index="7">Content_url </a>
    <a class="toggle-vis" data-column-index="8">Target</a>
    <a class="toggle-vis" data-column-index="9">Status</a>
    <a class="toggle-vis" data-column-index="10">Lift </a>
    <a class="toggle-vis" data-column-index="11">urgency</a>
    <a class="toggle-vis" data-column-index="12">Intent</a>
    <a class="toggle-vis" data-column-index="13">Reaction Ratio</a>
    <a class="toggle-vis" data-column-index="14">Share</a>
    <a class="toggle-vis" data-column-index="15">Recall</a>
    <a class="toggle-vis" data-column-index="16">Trust</a>
    <a class="toggle-vis" data-column-index="17">Virality</a>
    <a class="toggle-vis" data-column-index="18">Relatable</a>
    <a class="toggle-vis" data-column-index="19">Relevance</a>
    <a class="toggle-vis" data-column-index="20">attention</a>
    <a class="toggle-vis" data-column-index="21">Emotion-End</a>
    <a class="toggle-vis" data-column-index="22">Awareness</a>
    <a class="toggle-vis" data-column-index="23">Brand</a>
    <a class="toggle-vis" data-column-index="24">headroom_lift</a>
    <a class="toggle-vis" data-column-index="25">Positive_attitude</a>
    <a class="toggle-vis" data-column-index="26">Negative_attitude</a>
    <a class="toggle-vis" data-column-index="27">pre_interest</a>
    <a class="toggle-vis" data-column-index="28">post_interest</a>
    <a class="toggle-vis" data-column-index="29">Urgency Headroom lift</a>
    <a class="toggle-vis" data-column-index="30">Positive-Urgency</a>
    <a class="toggle-vis" data-column-index="31">Negative-Urgency</a>
    <a class="toggle-vis" data-column-index="32">Urgency-Pre-Interest</a>
    <a class="toggle-vis" data-column-index="33">Urgency-Post-Interest</a>
    <a class="toggle-vis" data-column-index="34">Subscriber_intent</a>
    <a class="toggle-vis" data-column-index="35">Persuasiont</a>
    <a class="toggle-vis" data-column-index="36">continuity</a>
    <a class="toggle-vis" data-column-index="37">Enjoyment</a>
    <a class="toggle-vis" data-column-index="38">Valence</a>
    <a class="toggle-vis" data-column-index="39">Arousal</a>
    <a class="toggle-vis" data-column-index="40">Reaction intensity </a>
    <a class="toggle-vis" data-column-index="41">Attention New</a>
    <a class="toggle-vis" data-column-index="42">Emotional Engagement</a>
    <a class="toggle-vis" data-column-index="43">Action</a>
  </div>
  <!----------------------------------------------------------------------------End Toggle button div ------------------------------------------------------------------------------------------>

  <!----------------------------------------------------------------------------Table start------------------------------------------------------------------------------------------>
  <table id="example" class="display table table-bordered " style="width:100%">
        <thead style=''>
        <tr>
                <th data-column-index="0">Sr_no</th>
                <th data-column-index="1">Ra_id</th>
                <th data-column-index="2">Campaign_name</th>
                <th data-column-index="3">Company_email</th>
                <th data-column-index="4">Category</th>
                <th data-column-index="5">Sub_category</th>
                <th data-column-index="6">Content_Length</th>
                <th data-column-index="7">Content_url</th>
                <th data-column-index="8">Target</th>
                <th data-column-index="9">Status</th>
                <th data-column-index="10">Lift</th>
                <th data-column-index="11">urgency</th>
                <th data-column-index="12">Intent</th>
                <th data-column-index="13">Reaction_Ratio</th>
                <th data-column-index="14">Share</th>
                <th data-column-index="15">Recall</th>
                <th data-column-index="16">Trust</th>
                <th data-column-index="17">Virality</th>
                <th data-column-index="18">Relatable</th>
                <th data-column-index="19">Relevance</th>
                <th data-column-index="20">attention</th>
                <th data-column-index="21">Emotion_End</th>
                <th data-column-index="22">Awareness</th>
                <th data-column-index="23">Brand</th>
                <th data-column-index="24">headroom_lift</th>
                <th data-column-index="25">Positive_attitude</th>
                <th data-column-index="26">Negative_attitude</th>
                <th data-column-index="27">pre_interest</th>
                <th data-column-index="28">post_interest</th>
                <th data-column-index="29">Urgency_Headroom_lift</th>
                <th data-column-index="30">Positive_Urgency</th>
                <th data-column-index="31">Negative_Urgency</th>
                <th data-column-index="32">Urgency_Pre_Interest</th>
                <th data-column-index="33">Urgency_Post_Interest</th>
                <th data-column-index="34">Subscriber_intent</th>
                <th data-column-index="35">Persuasion</th>
                <th data-column-index="36">continuity</th>
                <th data-column-index="37">Enjoyment</th>
                <th data-column-index="38">Valence</th>
                <th data-column-index="39">Arousal</th>
                <th data-column-index="40">Reaction_intensity</th>
                <th data-column-index="41">Attention_New</th>
                <th data-column-index="42">Emotional_Engagement</th>
                <th data-column-index="43">Action</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            $c=0 ;
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
            <tr class="table_row">
                <td><?php echo ++$c; ?></td>
                <td><?php if($row['ra_id']){ echo ($row['ra_id']); } else { echo ('N/A'); }?></td>
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
                <td><button id="<?php if($row['id']){ echo ($row['id']); } else { echo ('0'); }?>"  class="btn btn-primary editBtn"" data-toggle="modal" data-target="#message">Edit</button></td>
            </tr>
            <?php } }?>
        </tfoot>
    </table>
<!----------------------------------------------------------------------------End Table------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------Start calling modal------------------------------------------------------------------------------------------>
<?php
  include('modal.php');
?>
<!----------------------------------------------------------------------------Endcalling modal------------------------------------------------------------------------------------------>
</body>
<script>
    $(document).ready(function() {
      //here
      $("a").addClass("btn btn-primary btn-xs");
        var table = $('#example').DataTable( {
            colReorder: true,
            "scrollY": "750px",
            "scrollX": "750px",
            "lengthMenu": [[-1], ["All"]],
            dom: 'Bfrtip',
            buttons: [
            {
            extend: 'csv',
            footer: false,
            exportOptions: {
                    //columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43]
              }
            },
            {
              extend: 'excel',
              footer: false,
              exportOptions: {
                //columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43]
              }
            }
        ],
        });

        ////////table.column( 1 ).data().average();
        $('#reset').click( function (e) {
            e.preventDefault();
            table.colReorder.reset();
        });

        $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
        var column = table.column( $(this).attr('data-column-index') );

        // Toggle the visibility
        var isClicked = column.visible( ! column.visible() );
        //console.log(isClicked);

        $(this).toggleClass("btn-danger");
    });
    });

//endof doc ready
</script>
<script>
$('#catg').change(function() {
    var cat_value = $(this).val();
    $.ajax({
    type: "POST",
    url: "SubCatData.php",
    data : {cat_value},
    dataType: "json",   //expect html to be returned
    success: function(response) {
      $('#sub_category').html('');
      $.each(response, function(key,val) {
        $("#sub_category").multiselect('rebuild').append("<option>"+val+"</option>");
      });

        // var result = eval(response);
        // $.each(result, function(key,val)
        // {
        //   $("#subCatg").append('<option>'+val+'</option>');
        // });
        // $('#subCatg').multiSelect();
    }
});
})
</script>
<script>
$(document).ready(function() {
  //var x = $.cookie("category").replace('+', ' ');

  var x = $.cookie('category');

  $.ajax({    //create an ajax request to display.php
    type: "GET",
    url: "CampfilterData.php",
    dataType: "html",   //expect html to be returned
    success: function(response) {
        var result = eval(response);
        $.each(result, function(key,val)
        {
            $.each(val, function(key,sss)
        {
          if(x==sss){
            $("#catg").append('<option selected value="'+sss+'">'+sss+' </opton>');
          } else{
            $("#catg").append('<option value="'+sss+'">'+sss+' </opton>');
          }

        });
        });
    }
});
//second
$('#sub_category').multiselect({
  nonSelectedText:'Select Sub Category',
  buttonWidth:'400px',
  onChange:function(option, checked){
    $('li').removeClass('active')
  }
 });
});
</script>



<script>
  $('#filter').click(function() {
    event.preventDefault();
    //$(".table_row").empty();
    var sub_category = $(subCatg).val();
    var category = $(catg).val();
    // var c_length = $(cLength).val();
    $.ajax({    //create an ajax request to display.php
    type: "POST",
    url: "Camapigns-dashboard.php",
    data : {sub_category,category},
    dataType: "html",   //expect html to be returned
    beforeSend: function() {
      document.clear();
    },
    success: function(response) {
      //  alert(response);
      body.html(response);
    }
});
});
</script>

<script>
$('.editBtn').click(function() {
var id = $(this).attr('id');
$.ajax({    //create an ajax request to display.php
type: "POST",
url: "modalDatafilter.php",
data : {id:id},
dataType: "json",
success: function(data) {
$('#campaign_name').val(data.campaign_name);
$('#company_email').val(data.company_email);
$('#category').val(data.category);
$('#content_length').val(data.content_length);
$('#status').val(data.status);
$('#target').val(data.target);
$('#ra_id').val(data.ra_id);
$('#lift').val(data.lift);
$('#urgency').val(data.urgency);
$('#Intent').val(data.Intent);
$('#reaction_ratio').val(data.reaction_ratio);
$('#share').val(data.share);
$('#recall').val(data.recall);
$('#trust').val(data.trust);
$('#virality').val(data.virality);
$('#relatable').val(data.relatable);
$('#relevance').val(data.relevance);
$('#attention').val(data.attention);
$('#emotion_end').val(data.emotion_end);
$('#awareness').val(data.awareness);
$('#brand').val(data.brand);
$('#headroom_lift').val(data.headroom_lift);
$('#positive_attitude').val(data.positive_attitude);
$('#negative_attitude').val(data.negative_attitude);
$('#pre_interest').val(data.pre_interest);
$('#post_interest').val(data.post_interest);
$('#urgency_headroom_lift').val(data.urgency_headroom_lift);
$('#positive_urgency').val(data.positive_urgency);
$('#negative_urgency').val(data.negative_urgency);
$('#urgency_pre_interest').val(data.urgency_pre_interest);
$('#urgency_post_interest').val(data.urgency_post_interest);
$('#subscriber_intent').val(data.subscriber_intent);
$('#persuasion').val(data.persuasion);
$('#continuity').val(data.continuity);
$('#enjoyment').val(data.enjoyment);
$('#valence').val(data.valence);
$('#arousal').val(data.arousal);
$('#reaction_intensity').val(data.reaction_intensity);
$('#attention_new').val(data.attention_new);
$('#emotional_engagement').val(data.emotional_engagement);
$('#action').val(data.action);
$('#sub_category').val(data.sub_category);
$('#content_url').val(data.content_url);
$('#cmp_id').val(data.id);
$('#message').modal('show')
}
});
})
</script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) {

    for (let row of example.rows) {
              for(let cell of row.cells) {
                   average = average + cell.innerText+"," ;
                  // break;
                }
                //console.log(average);
                //var columns = row.innerText.trim();
                //columns.trim();
                break;
            }

            $.ajax({
              type: "POST",
              url: "dataFilter.php",
              data : {columns:average},
              dataType: "text",  //expect html to be returned
              success: function(response) {
                $("table tbody").append(response);
              }
          });

    // var markup ="<tr role='row' class='odd'><td class='sorting_1'>Average</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td><td>39</td><td>40</td><td>41</td><td>42</td><td>43</td><td>44</td></tr>"
    // $("table tbody").append(markup);
  });
</script>
</html>
