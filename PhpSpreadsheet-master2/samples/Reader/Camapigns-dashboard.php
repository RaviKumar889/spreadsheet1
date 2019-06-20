<?php include('database.php'); ?>
<?php include('header.php'); ?>
<body>
  <div class="flex-container"><!--FLEX CONTAINER-->
        <div class="">
            	<img src="monet.png" alt="Smiley face" height="42" width="42">
        </div>

        <div class="form-group">
            <label for="sel1">Category</label>
            <select class="form-control" id="catFilter" name="category">
                <option value="">Select Category</option>
                <option value="Branded Content">Branded Content </option>
                <option value="Movie trailer">Movie trailer </option>
                <option value="TV Series">TV Series </option>
            </select>
        </div>

        <div class="form-group">
            <label>Select Sub Category</label><br />
            <select id="sub_category" name="sub_category[]" multiple class="form-control">
            
            </select>
        </div>
        
        <div class="form-group">
            <label for="sel1">Category Length</label>
            <select class="form-control" id="c_length" name="content_length">
              <option value="">Select Length</option>
              <option value="BETWEEN  0 AND 30">0-30</option>
              <option value="BETWEEN  31 AND 60">31-60</option>
              <option value=">=61">61+</option>
            </select>
        </div>

        <!-- <div>
        <button type="submit" name="filterOne" class="filter btn btn-primary">Filter</button>
        </div> -->
        </form>

        <div>
        <a href="Camapigns-dashboard.php" class="filter btn btn-success btn-lg">Show All</a>
        </div>
        <div class="groove">
        <button id="average"  style="display:none" type='button'>Average</button>
        <button id="reset" class ="filter btn btn-info"type='button'>Reset Order</button>
        </div>
  </div><!--FLEX CONTAINER-->
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

<!-- table -->
<table id="example" class="display table table-bordered " style="width:100%">
    
    
        <thead style=''>        
                <th style="width:77px" data-column-index="0">Sr_no</th>
                <th style="width:77px" data-column-index="1">Ra_id</th>
                <th style="width:77px" data-column-index="2">Campaign_name</th>
                <th style="width:77px" data-column-index="3">Company_email</th>
                <th style="width:77px"data-column-index="4">Category</th>
                <th style="width:77px" data-column-index="5">Sub_category</th>
                <th style="width:77px" data-column-index="6">Content_Length</th>
                <th style="width:77px" data-column-index="7">Content_url</th>
                <th style="width:77px" data-column-index="8">Target</th>
                <th style="width:77px" data-column-index="9">Status</th>
                <th style="width:77px" data-column-index="10">Lift</th>
                <th style="width:77px" data-column-index="11">urgency</th>
                <th style="width:77px" data-column-index="12">Intent</th>
                <th style="width:77px" data-column-index="13">Reaction_Ratio</th>
                <th style="width:77px" data-column-index="14">Share</th>
                <th style="width:77px" data-column-index="15">Recall</th>
                <th style="width:77px" data-column-index="16">Trust</th>
                <th style="width:77px" data-column-index="17">Virality</th>
                <th style="width:77px" data-column-index="18">Relatable</th>
                <th style="width:77px" data-column-index="19">Relevance</th>
                <th style="width:77px" data-column-index="20">attention</th>
                <th style="width:77px" data-column-index="21">Emotion_End</th>
                <th style="width:77px" data-column-index="22">Awareness</th>
                <th style="width:77px" data-column-index="23">Brand</th>
                <th style="width:77px" data-column-index="24">headroom_lift</th>
                <th style="width:77px" data-column-index="25">Positive_attitude</th>
                <th style="width:77px" data-column-index="26">Negative_attitude</th>
                <th style="width:77px" data-column-index="27">pre_interest</th>
                <th style="width:77px" data-column-index="28">post_interest</th>
                <th style="width:77px" data-column-index="29">Urgency_Headroom_lift</th>
                <th style="width:77px" data-column-index="30">Positive_Urgency</th>
                <th style="width:77px" data-column-index="31">Negative_Urgency</th>
                <th style="width:77px" data-column-index="32">Urgency_Pre_Interest</th>
                <th style="width:77px" data-column-index="33">Urgency_Post_Interest</th>
                <th style="width:77px" data-column-index="34">Subscriber_intent</th>
                <th style="width:77px" data-column-index="35">Persuasion</th>
                <th style="width:77px" data-column-index="36">continuity</th>
                <th style="width:77px" data-column-index="37">Enjoyment</th>
                <th style="width:77px" data-column-index="38">Valence</th>
                <th style="width:77px" data-column-index="39">Arousal</th>
                <th style="width:77px" data-column-index="40">Reaction_intensity</th>
                <th style="width:77px" data-column-index="41">Attention_New</th>
                <th style="width:77px" data-column-index="42">Emotional_Engagement</th>
                <th style="width:77px"data-column-index="43">Action</th>
                <th style="width:77px">Edit</th>
            </tr>
        </thead>
        <tbody id="tbody">
        <?php
        if ($result->num_rows > 0) {
            $c=0 ;
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
            <tr class="table_row">
                <td class="col-md-2"><?php echo ++$c; ?></td>
                <td style="width:77px" ><?php if($row['ra_id']){ echo ($row['ra_id']); } else { echo ('N/A'); }?></td>
                <td style="width:77px" ><?php if($row['campaign_name']){ echo ($row['campaign_name']); } else { echo ('N/A'); }?></td>
                <td style="width:77px" ><?php if($row['company_email']){ echo ($row['company_email']); } else { echo ('N/A'); }?></td>
                <td style="width:77px" ><?php if($row['category']){ echo ($row['category']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['sub_category']){ echo ($row['sub_category']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['content_length']){ echo ($row['content_length']); } else { echo ('N/A'); }?></td>
                <td style="width:77px" style="width: 10%"><?php if($row['content_url']){ echo ($row['content_url']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['target']){ echo ($row['target']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['status']){ echo ($row['status']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['lift']){ echo ($row['lift']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['urgency']){ echo ($row['urgency']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['Intent']){ echo ($row['Intent']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['reaction_ratio']){ echo ($row['reaction_ratio']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['share']){ echo ($row['share']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['recall']){ echo ($row['recall']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['trust']){ echo ($row['trust']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['virality']){ echo ($row['virality']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['relatable']){ echo ($row['relatable']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['relevance']){ echo ($row['relevance']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['attention']){ echo ($row['attention']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['emotion_end']){ echo ($row['emotion_end']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['awareness']){ echo ($row['awareness']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['brand']){ echo ($row['brand']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['headroom_lift']){ echo ($row['headroom_lift']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['positive_attitude']){ echo ($row['positive_attitude']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['negative_attitude']){ echo ($row['negative_attitude']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['pre_interest']){ echo ($row['pre_interest']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['post_interest']){ echo ($row['post_interest']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['urgency_headroom_lift']){ echo ($row['urgency_headroom_lift']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['positive_urgency']){ echo ($row['positive_urgency']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['negative_urgency']){ echo ($row['negative_urgency']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['urgency_pre_interest']){ echo ($row['urgency_pre_interest']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['urgency_post_interest']){ echo ($row['urgency_post_interest']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['subscriber_intent']){ echo ($row['subscriber_intent']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['persuasion']){ echo ($row['persuasion']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['continuity']){ echo ($row['continuity']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['enjoyment']){ echo ($row['enjoyment']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['valence']){ echo ($row['valence']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['arousal']){ echo ($row['arousal']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['reaction_intensity']){ echo ($row['reaction_intensity']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['attention_new']){ echo ($row['attention_new']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['emotional_engagement']){ echo ($row['emotional_engagement']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><?php if($row['action']){ echo ($row['action']); } else { echo ('N/A'); }?></td>
                <td style="width:77px"><button id="<?php if($row['id']){ echo ($row['id']); } else { echo ('0'); }?>"  class="btn btn-primary editBtn"" data-toggle="modal" data-target="#message">Edit</button></td>
            </tr>
            <?php } }?>
        </tfoot>
    </table>
<?php  include('modal.php');?>

</body>