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
    exportData = 'data:text/json;charset=utf-8,';
    exportData += JSON.stringify(result);
    encodedUri = encodeURI(exportData);
    newWindow = window.open(encodedUri);
  });

  $("#login-form").submit(function(e) {
      e.preventDefault;
    $.ajax({
      url: 'login.php',
      data: { username: $( "#username" ).val(),
            password: $( "#pwd" ).val(),
            },
      success: function(data) {
          window.location.href="admin-home.php" //change the URL HERE
      }
    });
  });

  $("#admin-op-select").change(function() {
    if ($("#admin-op-select").val() == "0") {
      $("#admin-card-name").hide();
      $("#admin-card-rules-text").hide();
      $("#admin-insert-card-button").hide();
      $("#admin-card-select").hide();
      $("#admin-update-card-rules-text").hide();
      $("#admin-update-card-button").hide();
      $("#admin-delete-card-button").hide();
      $("#admin-insert-card-name-label").hide();
      $("#admin-insert-card-rules-text-label").hide();
      $("#admin-update-card-rules-text-label").hide();
      $("#admin-card-select-label").hide();
    }
    if ($("#admin-op-select").val() == "1") {
      $("#admin-card-name").show();
      $("#admin-card-rules-text").show();
      $("#admin-insert-card-button").show();
      $("#admin-card-select").hide();
      $("#admin-update-card-rules-text").hide();
      $("#admin-update-card-button").hide();
      $("#admin-delete-card-button").hide();
      $("#admin-insert-card-name-label").show();
      $("#admin-insert-card-rules-text-label").show();
      $("#admin-update-card-rules-text-label").hide();
      $("#admin-card-select-label").hide();
    }
    if ($("#admin-op-select").val() == "2") {
      $("#admin-card-name").hide();
      $("#admin-card-rules-text").hide();
      $("#admin-insert-card-button").hide();
      $("#admin-card-select").show();
      $("#admin-update-card-rules-text").show();
      $("#admin-update-card-button").show();
      $("#admin-delete-card-button").hide();
      $("#admin-insert-card-name-label").hide();
      $("#admin-insert-card-rules-text-label").hide();
      $("#admin-update-card-rules-text-label").show();
      $("#admin-card-select-label").show();
    }
    if ($("#admin-op-select").val() == "3") {
      $("#admin-card-name").hide();
      $("#admin-card-rules-text").hide();
      $("#admin-insert-card-button").hide();
      $("#admin-card-select").show();
      $("#admin-update-card-rules-text").hide();
      $("#admin-update-card-button").hide();
      $("#admin-delete-card-button").show();
      $("#admin-insert-card-name-label").hide();
      $("#admin-insert-card-rules-text-label").hide();
      $("#admin-update-card-rules-text-label").hide();
      $("#admin-card-select-label").show();
    }
  });

  $("#admin-insert-card-button").click(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'adminInsertCard.php',
      data: { cardName: $("#admin-card-name").val(),
            cardRulesText: $("#admin-card-rules-text").val() },
      success: function(data){
        alert("Successfully added Card");
      }
    });
  });

  $("#admin-card-select").change(function() {
    if ($("#admin-op-select").val() == "2") {
      $.ajax({
        url: 'adminSelectCard.php',
        data: { cardName: $("#admin-card-select").val()},
        success: function(data){
          $("#admin-update-card-rules-text").val(data);
        }
      });
    }
  });

  $("#admin-update-card-button").click(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'adminUpdateCard.php',
      data: { cardName: $("#admin-card-select").val(),
            cardRulesText: $("#admin-update-card-rules-text").val()},
      success: function(data){
        alert("Successfully updated Card");
      }
    });
  });

  $("#admin-delete-card-button").click(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'adminDeleteCard.php',
      data: { cardName: $("#admin-card-select").val()},
      success: function(data){
        alert("Successfully deleted Card");
      }
    });
  });

  $("#admin-logout-button").click(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'logout.php',
      success: function(data){
        window.location.replace("admin-login.php");
      }
    });
  });
});
