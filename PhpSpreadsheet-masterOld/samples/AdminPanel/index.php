<?php
include('header.php');
include('sidebar.php');

include('database.php');
if ( isset( $_POST['filterOne'] ) ) {
  //$sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%' OR sub_category IN ('".implode(',',$_POST['sub_category'])."')";

  $append = "";
  $C=1;
  foreach($_POST['sub_category'] as $data){
    $C++;
    //echo $data;
    
    if($C>2){
      $append= $append . "OR sub_category like '%".$data."%'";
    }else{
      $append=$append." sub_category like '%".$data."%'";   
    }
    //echo $append;
  }

  $sql = "SELECT * FROM users WHERE category like '%".$_POST['category']."%' AND (".$append.")";  

  //echo($sql);

} elseif(isset($_POST['filterTwo'])) {

if( $_POST['content_length']==1 ) {
        $sql = "SELECT * FROM users WHERE content_length between 0 AND 30";
      } elseif($_POST['content_length']==2) {
        $sql = "SELECT * FROM users WHERE content_length between 31 AND 60";
      } else {
        $sql = "SELECT * FROM users WHERE content_length >=61";
      }
} else {
  $sql ="select *  FROM users";
}
$result = $conn->query($sql);
?>


<div class="content-wrapper"> 
<section class="content">                     
        <div class="row">
                <div class="col-lg-5">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                        <div class="form-group">
                                <form class="form-inline" action="/action_page.php">
                                    <div class="form-group">
                                      <label for="email">Category:</label>
                                      <select class="form-control" id="catg" name="category">
                                            <option value="">Select Category</option>
                                            <option>Branded Content</option>
                                            <option>Movie trailer </option>
                                            <option>TV Series </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="sel1">Sub-Category</label>
                                            <select class="form-control"  id="subCatg" name="sub_category[]" multiple>
                                              <option value="">Select Sub Category</option>
                                              <option value="Comedy-Drama">Comedy-Drama</option>
                                              <option value="Biographical">Biographical</option>
                                              <option value="Automotive">Automotive</option>
                                              <option value="superbowl">superbowl</option>
                                              <option value="Fantasy">Fantasy</option>
                                              <option value="Musical">Musical</option>
                                              <option value="Mystery">Mystery</option>
                                              <option value="Drama">Drama</option>
                                              <option value="Thriller">Thriller</option>
                                              <option value="Crime">Crime</option>
                                              <option value="Superhero">Superhero</option>
                                              <option value="Action">Action</option>
                                              <option value="Animal Care">Animal Care</option>
                                              <option value="pet">Pet food</option>
                                              <option value="Restaurant">Restaurant</option>
                                              <option value="Food">Food</option>
                                              <option value="Entertainment">Entertainment</option>
                                              <option value="Sports">Sports</option>
                                              <option value="Beverage">Beverage </option>
                                              <option value="CPG/FMCG">CPG/FMCG</option>
                                              <option value="Beverage">Beverage</option>
                                              <option value="Cleaning">Cleaning</option>
                                              <option value="Drugs and Personal Care">Drugs and Personal Care</option>
                                              <option value="Drugs">Drugs</option>
                                              <option value="Financial Services">Financial Services</option>
                                              <option value="Real estate">Real estate</option>
                                              <option value="Science & Technology">Science & Technology</option>
                                              <option value="Film">Film</option>
                                              <option value="Sci-Fi">Sci-Fi</option>
                                              <option value="Animation">Animation</option>
                                              <option value="Family">Family</option>
                                              <option value="Comedy">Comedy</option>
                                              <option value="Adventure">Adventure</option>
                                              <option value="Crime">Crime</option>
                                              <option value="Horror">Horror</option>
                                              <option value="Romance">Romance</option>
                                              <option value="History">History</option>
                                              <option value="Biography">Biography</option>
                                              <option value="Science Fiction">Science Fiction</option>
                                              <option value="Candy">Candy</option>
                                              <option value="Chocolate">Chocolate</option>
                                              <option value="Drugs">Drugs</option>
                                              </select>
                                    </div> 
                                    &nbsp &nbsp                                   
                                    <button type="submit" name="filterOne" class="filter btn btn-primary">Filter</button>
                                  </form>  
                                      
                        </div>                     
                    </div>                 
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                        <div class="form-group">
                            
                            <form class="form-inline" method="post">
                            <label for="sel1">Content Length</label>
                            <select class="form-control" id="c_length" name="content_length">
                                <option value="1">Select Content Length</option>
                                <option value="1">0-30</option>
                                <option value="2">31-60</option>
                                <option value="3">61+</option>
                            </select>
                            &nbsp &nbsp                            
                            <button type="submit" name="filterTwo" class="btn btn-primary">Filter</button>                            
                            </form>
                        </div>
                    </div>                    
                  </div>
                  <div><a type="button" class="filter btn btn-success" id="show_all_btn" href="index.php">Show All</a></div>
                </div>                
              </div>
              <div>Toggle column:
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


                    <div class="box box-info">
                            <table id="example" class="display table table-bordered " style="width:100%">
                                    <thead>
                                    <tr>
                                            <th data-column-index="0">Sr.no</th>
                                            <th data-column-index="1">Ra_id</th>
                                            <th data-column-index="2">Campaign_name</th>
                                            <th data-column-index="3">Company_email</th>
                                            <th data-column-index="4">Category</th>
                                            <th data-column-index="5">Sub category</th>
                                            <th data-column-index="6">Content Length</th>
                                            <th data-column-index="7">Content_url</th>
                                            <th data-column-index="8">Target</th>
                                            <th data-column-index="9">Status</th>
                                            <th data-column-index="10">Lift</th>
                                            <th data-column-index="11">urgency</th>
                                            <th data-column-index="12">Intent</th>
                                            <th data-column-index="13">Reaction Ratio</th>
                                            <th data-column-index="14">Share</th>
                                            <th data-column-index="15">Recall</th>
                                            <th data-column-index="16">Trust</th>
                                            <th data-column-index="17">Virality</th>
                                            <th data-column-index="18">Relatable</th>
                                            <th data-column-index="19">Relevance</th>
                                            <th data-column-index="20">attention</th>
                                            <th data-column-index="21">Emotion-End</th>
                                            <th data-column-index="22">Awareness</th>
                                            <th data-column-index="23">Brand</th>
                                            <th data-column-index="24">headroom_lift</th>
                                            <th data-column-index="25">Positive_attitude</th>
                                            <th data-column-index="26">Negative_attitude</th>
                                            <th data-column-index="27">pre_interest</th>
                                            <th data-column-index="28">post_interest</th>
                                            <th data-column-index="29">Urgency Headroom lift</th>
                                            <th data-column-index="30">Positive-Urgency</th>
                                            <th data-column-index="31">Negative-Urgency</th>
                                            <th data-column-index="32">Urgency-Pre-Interest</th>
                                            <th data-column-index="33">Urgency-Post-Interest</th>
                                            <th data-column-index="34">Subscriber_intent</th>
                                            <th data-column-index="35">Persuasion</th>
                                            <th data-column-index="36">continuity</th>
                                            <th data-column-index="37">Enjoyment</th>
                                            <th data-column-index="38">Valence</th>
                                            <th data-column-index="39">Arousal</th>
                                            <th data-column-index="40">Reaction intensity</th>
                                            <th data-column-index="41">Attention New</th>
                                            <th data-column-index="42">Emotional Engagement</th>
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
                            <?php
                            include('modal.php');
                            ?>
                            <div id="" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                    <form action="/action_page.php" method="get">
                                      First name: <input type="text" name="fname" id="name"><br>
                                      Last name: <input type="text" name="lname"><br>
                                      <input type="submit" value="Submit">
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div><!--end of div-->
                    <div><!--end of div box-->
                    
</section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include('footer.php');
 ?>