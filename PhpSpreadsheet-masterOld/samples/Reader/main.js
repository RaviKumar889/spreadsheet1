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
        ]

        });

        $('#reset').click( function (e) {
            e.preventDefault();
            table.colReorder.reset();
        });

        $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
        var column = table.column( $(this).attr('data-column-index') );
        // Toggle the visibility
        var isClicked = column.visible( ! column.visible() );
        $(this).toggleClass("btn-danger");
    });
    });

//endof doc ready
</script>

<script>
$(document).ready(function() {
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
            $("#catg").append('<option>'+sss+'</option>');
        });
        });
        //alert(response);
    }
});


});
</script>
<script>

// $("#selectitem").on('click', function() {

//   $("#custom3").slideToggle("slow");
// });                
$('#catg').change(function() {
  $("#custom3").show();
    //ravi---------------------------------------------------------------------------------------**********************************************
    var cat_value = $(this).val();
    var val = $('div #custom3').val();
    $.ajax({
    type: "POST",
    url: "SubCatData.php",
    data : {cat_value},
    dataType: "json",   //expect html to be returned
    success: function(response) {
      $("#custom3").empty();
      $.each(response, function(key,val) {
        $("#custom3").append("<input type='checkbox' value="+val+">"+val+"</input><br>");
        //$("#custom3").append("<option>"+val+"</option>");
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
//   $('#subCatg').change(function() {
//   var sub_category = $(this).val();
//   var category = $(catg).val();
//   $.ajax({    //create an ajax request to display.php
//   type: "POST",
//   url: "cat_length.php",
//   data : {sub_category,category},
//   dataType: "html",   //expect html to be returned
//   success: function(response) {
//      // alert(response);
//      $("#cLength").empty();
//       var result = eval(response);
//       $.each(result, function(key,val)
//       {
//           $.each(val, function(key,sss)
//       {
//           $("#cLength").append('<option>'+sss+'</option>');
//       });
//     });
//   }
// });
// })
</script>
<script>
  $('#filter').click(function() {
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