$(document).ready(function() {
  $( '#adv-search' ).submit(function() {
    return false;
  });

  $('#exSearchBtn').click(function(e){
    e.preventDefault();
    $("#exSearchBtn").class = "active";
    $.ajax({
      type: "GET",
      url: "exSearch.html",
      data: { },
      success: function(data){
          $('#mainWindow').html(data);
      }
    });
  });

  $( "#cardName" ).change(function() {

    $.ajax({
      url: 'searchCardName.php',
      data: { searchCardName: $( "#cardName" ).val(),
            searchCardRulesText: $( "#cardRulesText" ).val(),
            typeIndex: $( '#cardType' ).val() },
      success: function(data){
        $('#cardResult').html(data);

      }
    });
  });

  $( "#cardRulesText" ).change(function() {

    $.ajax({
      url: 'searchCardName.php',
      data: { searchCardName: $( "#cardName" ).val(),
            searchCardRulesText: $( "#cardRulesText" ).val(),
            typeIndex: $( '#cardType' ).val() },
      success: function(data){
        $('#cardResult').html(data);

      }
    });
  });

  $( "#cardType" ).change(function() {

    $.ajax({
      url: 'searchCardName.php',
      data: { searchCardName: $( "#cardName" ).val(),
            searchCardRulesText: $( "#cardRulesText" ).val(),
            typeIndex: $( '#cardType' ).val() },
      success: function(data){
        $('#cardResult').html(data);

      }
    });
  });

  $( "#expansionName" ).change(function() {

    $.ajax({
      url: 'searchExpansionName.php',
      data: { searchExpansionName: $( "#expansionName" ).val(),
            searchCardNameText: $( "#expansionCardNameText" ).val(),
            searchIndex: $( '#searchType' ).val() },
      success: function(data){
        $('#expansionCardResult').html(data);

      }
    });
  });

  $( "#expansionCardNameText" ).change(function() {

    $.ajax({
      url: 'searchExpansionName.php',
      data: { searchExpansionName: $( "#expansionName" ).val(),
            searchCardNameText: $( "#expansionCardNameText" ).val(),
            searchIndex: $( '#searchType' ).val() },
      success: function(data){
        $('#expansionCardResult').html(data);

      }
    });
  });

  $( "#searchType" ).change(function() {

    if ($("#searchType").val() == 0) {
      $("#cardNameLabel").hide();
      $("#expansionCardNameText").hide();
    }
    if ($("#searchType").val() == 1) {
      $("#cardNameLabel").show();
      $("#expansionCardNameText").show();
    }

    $.ajax({
      url: 'searchExpansionName.php',
      data: { searchExpansionName: $( "#expansionName" ).val(),
            searchCardNameText: $( "#cardNameText" ).val(),
            searchIndex: $( '#searchType' ).val() },
      success: function(data){
        $('#expansionCardResult').html(data);

      }
    });
  });

  $("#json-button").click(function() {
    var result = $("#query-result").tableToJSON();
    $("#query-json").html(JSON.stringify(result))
  });
  
});
