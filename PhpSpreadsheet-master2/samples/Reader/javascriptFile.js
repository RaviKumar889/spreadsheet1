$(document).ready(function() {   
 
    $.ajax({   
    type: "GET",
    cache: false,
    url: "dataOnLoad.php",    
    dataType: "text",
    success: function(response) {
      $("#sub_category").append(response);
       $("#sub_category").multiselect('true');               
    }
});//end of ajax

///
// var firstload = 1; 
// $.ajax({   
//   type: "GET",
//   method:"POST",
//   cache: false,
//   url: "tableData.php",
//   data: {firstload : firstload},
//   dataType: "text",
//   success: function(response) {
//     $("#tbody").empty();   
//     $("#tbody").append(response);               
//   }
// });//end of ajax

});//end of doc4/

////////filter//////
$(document).on('change', '#catFilter', function() {
  var cat_value = $('#catFilter').val(); 
  var sub_cat_value = $('#sub_category').val();
  var c_length = $('#c_length').val();  
      $.ajax({   
      type: "GET",
      method:"POST",
      cache: false,
      url: "tableData.php",
      data: {cat_value : cat_value,sub_cat_value : sub_cat_value,c_length : c_length},
      dataType: "text",
      success: function(response) {
        $("#tbody").empty();   
        $("#tbody").append(response);               
      }
    });//end of ajax
});

$(document).on('change', '#sub_category', function() {
  var cat_value = $('#catFilter').val(); 
  var sub_cat_value = $('#sub_category').val();
  var c_length = $('#c_length').val(); 
      $.ajax({   
      type: "GET",
      method:"POST",
      cache: false,
      url: "tableData.php",
      data: {cat_value : cat_value,sub_cat_value : sub_cat_value,c_length : c_length },
      dataType: "text",
      success: function(response) {
        $("#tbody").empty();   
        $("#tbody").append(response);               
      }
    });//end of ajax
});

$(document).on('change', '#c_length', function() {
  var cat_value = $('#catFilter').val();
  var sub_cat_value = $('#sub_category').val();
  var c_length = $('#c_length').val();
  //alert(c_length);
       $.ajax({   
       type: "GET",
       method:"POST",
       cache: false,
       url: "tableData.php",
       data: {cat_value : cat_value,sub_cat_value : sub_cat_value,c_length : c_length},
       dataType: "text",
       success: function(response) {
         $("#tbody").empty();   
         $("#tbody").append(response);               
       }
     });//end of ajax
 });

////DATA TABLE
$(document).ready(function() {  
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

    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust();
   });


    $('a.toggle-vis').on( 'click', function (e) {
    e.preventDefault();
    var column = table.column( $(this).attr('data-column-index') );
    var isClicked = column.visible( ! column.visible() );
    $(this).toggleClass("btn-danger");
});
});

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
              //alert(response);
              $("table tbody").append(response);
            }
        });

  // var markup ="<tr role='row' class='odd'><td class='sorting_1'>Average</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td><td>39</td><td>40</td><td>41</td><td>42</td><td>43</td><td>44</td></tr>"
  // $("table tbody").append(markup);
});

/////Modal/////////
$('.editBtn').click(function() {
  //alert('asda');
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

//filter
// $('.toggleDiv').find('a').each(function(e) {
//   //console.log('ok');
//   e.preventDefault();
//   console.log($(this).attr('href'));
// });


$(document).ready(function() {   
//   var columns = ['0'];
// $('.toggle-vis').click(function() {
//   //alert($(this).attr('data-column-index'));
//   //alert($(this).text().hasClass('btn-danger'));

// columns.push($(this).text().hasClass('btn-danger'));
// });
// console.log(columns);

// $('.toggleDiv','a').each(function(i) {
// alert('clicked');
// var vall = $(this).attr('class', 'btn-danger');
// console.log(vall);
// });

var columns=[];
// for (let row of example.rows) {
//   for(let cell of row.cells) {
//        average = average + cell.innerText+"," ;
//       // break;
//     }
//     //console.log(average);
//     //var columns = row.innerText.trim();
//     //columns.trim();
//     break;
// }

$('.toggle-vis').on('click',function() {
  columns=[];
  $(".toggleDiv .btn-danger").each(function() {
    var val =$(this).text();
    columns.push(val);
  });
  $("#countId").empty();
  $("#maxId").empty();
  $("#minId").empty();
  ////
  $.ajax({
    type: "POST",
    url: "dataFilter.php",
    data : {hiddenColumns:columns,average:average},
    dataType: "text",  //expect html to be returned
    cache:false,
    success: function(response) {
      //alert(response); 
      
      $("#avgId").replace(response);
      //$("#loadAvgId").empty();

      $("table tbody").append(response);
    }
});

});

});
