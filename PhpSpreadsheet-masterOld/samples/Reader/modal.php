<div id="message" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Details</h4>
        <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong>
        Data has been Updated
        </div>
      </div>
      <div class="modal-body">
      <div>        
        <form class="form-horizontal" id="preview_form">    
            <div class="container-fluid"> 
              <!-- row1        -->
              <div class="row">
                <div class="col-sm-3">
                  <label class="modalLabel">Campaign Name:</label>
                  <input type="hidden" id="cmp_id" name="id">
                  <input type="text" class="form-control" id="campaign_name" name="campaign_name">  
                </div>
              
                <div class="col-sm-3">
                  <label class="modalLabel">Campaign Email:</label>
                  <input type="text" class="form-control" id="company_email" name="company_email">
                </div>

                <div class="col-sm-3">
                  <label class="modalLabel">Category:</label>
                  <input type="text" class="form-control" id="category" name="category">
                </div>
                <div class="col-sm-3">
                  <label class="modalLabel">Content Length:</label>
                  <input type="text" class="form-control" id="content_length" name="content_length">
                </div>              
            </div>
                         
            <!-- row2       -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Status:</label>
                  <input type="text" class="form-control" id="status" name="status">
                </div>
              
                <div class="col-sm-2">
                  <label class="modalLabel">Target:</label>
                  <input type="text" class="form-control" id="target" name="target">
                </div>

                <div class="col-sm-2">
                  <label class="modalLabel">Ra_id:</label>
                  <input type="text" class="form-control" id="ra_id" name="ra_id">
                </div>        

                <div class="col-sm-2">
                  <label class="modalLabel">lift:</label>
                  <input type="text" class="form-control" id="lift" name="lift">
                </div>    

                <div class="col-sm-2">
                  <label class="modalLabel">Urgeny:</label>
                  <input type="text" class="form-control" id="urgency" name="urgency">
                </div> 

                <div class="col-sm-2">
                  <label class="modalLabel">Intent:</label>
                  <input type="text" class="form-control" id="Intent" name="Intent">
                </div> 
              </div>

              <!-- row3      -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Reaction Ratio:</label>
                  <input type="text" class="form-control" id="reaction_ratio" name="reaction_ratio">
                </div>
              
                <div class="col-sm-2">
                  <label class="modalLabel">Share:</label>
                  <input type="text" class="form-control" id="share" name="share">
                </div>

                <div class="col-sm-2">
                  <label class="modalLabel">Recall:</label>
                  <input type="text" class="form-control" id="recall" name="recall">
                </div>        

                <div class="col-sm-2">
                  <label class="modalLabel">Trust:</label>
                  <input type="text" class="form-control" id="trust" name="trust">
                </div>    

                <div class="col-sm-2">
                  <label class="modalLabel">Virality:</label>
                  <input type="text" class="form-control" id="virality" name="virality">
                </div> 

                <div class="col-sm-2">
                  <label class="modalLabel">Relatable:</label>
                  <input type="text" class="form-control" id="relatable" name="relatable">
                </div> 
              </div>

            <!-- row4      -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Relevance:</label>
                  <input type="text" class="form-control" id="relevance" name="relevance">
                </div>
              
                <div class="col-sm-2">
                  <label class="modalLabel">Attention:</label>
                  <input type="text" class="form-control" id="attention" name="attention">
                </div>

                <div class="col-sm-2">
                  <label class="modalLabel">Emotion End:</label>
                  <input type="text" class="form-control" id="emotion_end" name="emotion_end">
                </div>        

                <div class="col-sm-2">
                  <label class="modalLabel">Awareness:</label>
                  <input type="text" class="form-control" id="awareness" name="awareness">
                </div>    

                <div class="col-sm-2">
                  <label class="modalLabel">Brand:</label>
                  <input type="text" class="form-control" id="brand" name="brand">
                </div> 

                <div class="col-sm-2">
                  <label class="modalLabel">Headroomlift:</label>
                  <input type="text" class="form-control" id="headroom_lift" name="headroom_lift">
                </div> 
              </div>

               <!-- row5      -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Positive Attitude:</label>
                  <input type="text" class="form-control" id="positive_attitude" name="positive_attitude">
                </div>
              
                <div class="col-sm-2">
                  <label class="modalLabel">Negative Attitude:</label>
                  <input type="text" class="form-control" id="negative_attitude" name="negative_attitude">
                </div>

                <div class="col-sm-2">
                  <label class="modalLabel">Pre Interest:</label>
                  <input type="text" class="form-control" id="pre_interest" name="pre_interest">
                </div>        

                <div class="col-sm-2">
                  <label class="modalLabel">Post Interest:</label>
                  <input type="text" class="form-control" id="post_interest" name="post_interest">
                </div>    

                <div class="col-sm-2">
                  <label class="modalLabel">Urgency Headroomlift:</label>
                  <input type="text" class="form-control" id="urgency_headroom_lift" name="urgency_headroom_lift">
                </div> 

                <div class="col-sm-2">
                  <label class="modalLabel">Positive Urgency:</label>
                  <input type="text" class="form-control" id="positive_urgency" name="positive_urgency">
                </div> 
              </div>
               <!-- row6      -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Negative Urgency:</label>
                  <input type="text" class="form-control" id="negative_urgency" name="negative_urgency">
                </div>
              
                <div class="col-sm-2">
                  <label class="modalLabel">Urgency Pre Interest:</label>
                  <input type="text" class="form-control" id="urgency_pre_interest" name="urgency_pre_interest">
                </div>

                <div class="col-sm-2">
                  <label class="modalLabel">Urgency Post Interest</label>
                  <input type="text" class="form-control" id="urgency_post_interest" name="urgency_post_interest">
                </div>        

                <div class="col-sm-2">
                  <label class="modalLabel">Subscriber Intent:</label>
                  <input type="text" class="form-control" id="subscriber_intent" name="subscriber_intent">
                </div>    

                <div class="col-sm-2">
                  <label class="modalLabel">Persuasion:</label>
                  <input type="text" class="form-control" id="persuasion" name="persuasion">
                </div> 

                <div class="col-sm-2">
                  <label class="modalLabel">Continuity:</label>
                  <input type="text" class="form-control" id="continuity" name="continuity">
                </div> 
              </div>

                 <!-- row7     -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Enjoyment</label>
                  <input type="text" class="form-control" id="enjoyment" name="enjoyment">
                </div>              
                <div class="col-sm-2">
                  <label class="modalLabel">Valence</label>
                  <input type="text" class="form-control" id="valence" name="valence">
                </div>        

                <div class="col-sm-2">
                  <label class="modalLabel">Arousal:</label>
                  <input type="text" class="form-control" id="arousal" name="arousal">
                </div>    

                <div class="col-sm-2">
                  <label class="modalLabel">Reaction Intensity:</label>
                  <input type="text" class="form-control" id="reaction_intensity" name="reaction_intensity">
                </div> 

                <div class="col-sm-2">
                  <label class="modalLabel">Attention new:</label>
                  <input type="text" class="form-control" id="attention_new" name="attention_new">
                </div> 
              </div>

                  <!-- row8      -->
            <div class="row">
                <div class="col-sm-2">
                  <label class="modalLabel">Emotional Engagement</label>
                  <input type="text" class="form-control" id="emotional_engagement" name="emotional_engagement">
                </div>
              
                <div class="col-sm-2">
                  <label class="modalLabel">Action:</label>
                  <input type="text" class="form-control" id="action" name="action">
                </div>
            </div>   
             <!-- row9        -->
             <div class="row">
                <div class="col-sm-6">
                  <label class="modalLabel">Sub category:</label>
                  <input type="text" class="form-control" id="sub_category" name="sub_category">
                </div>
              
                <div class="col-sm-6">
                  <label class="modalLabel">Content Url:</label>
                  <input type="text" class="form-control" id="content_url" name="content_url">
                </div> 
            </div>           
            <div>
              <button type="button" class="btn btn-primary" id="modalsubmit">Update</button>
            </div>             
            </div>
        </form>   
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$('#modalsubmit').click(function() {     
    var r = confirm("Are you Sure Updating the value");
    if (r == true) {
      
    //$("form#preview_form :input").each(function() {
      //var id = $('#cmp_id').val(); // This is the jquery object of the input, do what you will      
      var data = $('form').serialize();
      //alert(input);
      //exit;
    //});
    //alert(typeof(input[0]));      
        $.ajax({
            type: "POST",            
            url: "updateModal.php",
            data: $('#preview_form').serialize(),
            success: function(data) {                           
            if(data == 1) {           
              $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
              $("#success-alert").slideUp(500);
            });
            }  else {
              alert('Sorry Data Not Updated');
            }
            }
        });    
    } else {      
   }

    // var sub_category = $(subCatg).val();
    // var category = $(catg).val();  
    // var c_length = $(cLength).val();
    // $.ajax({    //create an ajax request to display.php    
    // type: "POST",
    // url: "Camapigns-dashboard.php",
    // data : {sub_category,category,c_length},
    // dataType: "html",   //expect html to be returned   
    // beforeSend: function() {
    //   document.clear();
    // },
    // success: function(response) { 
    //   //  alert(response);   
    //   body.html(response);
    // }
});
    

</script>






