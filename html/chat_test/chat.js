var lastTimeID = 0;

$(document).ready(function() {
  $('#btnSend').click(function() {
    sendChatText($('#userID').val(), $('#chatroomID').val());
    $('#chatInput').val("");
  });
  startChat();
});

function startChat(){
  setInterval(function() {
    getChatText($('#userID').val(), $('#chatroomID').val());
  }, 2000);  // 2 seconds
}

function getChatText(userID, chatroomID) {
  $.ajax({
    type: "GET",
    url: "/chat_test/refresh.php?userID=" + userID + "&chatroomID=" + chatroomID,
  }).done(function (data)
  {
    var jsonData = JSON.parse(data);
    var jsonLength = jsonData.results.length;
    var html = "";
    for (var i = 0; i < jsonLength; i++) {
      var result = jsonData.results[i];
      html += '<div>(' + result.chattime + ') <b>' + result.sender +'</b>: ' + result.chattext + '</div>';
      lastTimeID = result.chatID;
    }
    $('#view_ajax').append(html);
  });
}

function sendChatText(userID, chatroomID) {
  var chatInput = $('#chatInput').val();
  if (chatInput != "") {
    $.ajax({
      type: "GET",
      url: "/chat_test/submit.php?chattext=" + encodeURIComponent(chatInput) + "&userID=" + userID + "&chatroomID=" + chatroomID,
    });
  }
}
