// 채팅방 모듈
(function () {
  var lastTimeID = 0;
  var Message;

  // Define Message object function
  Message = function (arg) {
      this.text = arg.text, this.message_side = arg.message_side;
      this.draw = function (_this) {
          return function () {
              var $message;
              $message = $($('.message_template').clone().html());
              $message.addClass(_this.message_side).find('.text').html(_this.text);
              $('.messages').append($message);
              return setTimeout(function () {
                  return $message.addClass('appeared');
              }, 0);
          };
      }(this);
      return this;
  };

  // Get the list of chat rooms for current user and display them.
  getChatList = function() {
    $("#chatlist_list").html("");
    $.ajax({
      type: "GET",
      url: "/chat/list.php"
    }).done(function (data) {
      var jsonData = JSON.parse(data);
      var html = "";
      for (var i = 0; i < jsonData.results.length; i++) {
        var result = jsonData.results[i];
        var chatlistElem = $($('.chatlist_template').clone().html());
        chatlistElem.find('#chatlist_number').html("#" + result.chatroomID);
        chatlistElem.find('#chatlist_number').val(result.chatroomID);
        chatlistElem.find('#chatlist_lastActive').html(result.last_active);
        chatlistElem.click(function (e) {
          enterChat($(this).find('#chatlist_number').val());
        });
        $("#chatlist_list").append(chatlistElem);
      }
    });
  };

  // Enter a chat room with the given roomID.
  // Display the previous conversation.
  enterChat = function(roomID) {
    setNextTimeID(0);
    $('#chatroom_num').text(roomID);
    $('#chat_list').hide();
    $('.messages').html('');
    $('.messages').show();
    $('.chat_title').html(roomID);
    getChatText($('#chatroom_num').text());
    startChat();
  };

  // Creates a new chatroom with the given receiver and the user.
  createChatRoom = function(receiver) {
    if (receiver != "") {
      $.ajax({
        type: "GET",
        url: "/chat/makechat.php?receiver=" + receiver,
      });
    }
    getChatList();
  };

  // Begin the timer to refresh the conversation regularly.
  startChat = function() {
    setInterval(function() {
      getChatText($('#chatroom_num').text());
    }, 2000); // 2 seconds
  };

  // Sends the message up to the chat room.
  // This only registers the chatting message to the database.
  sendChatText = function(chatroomID, text) {
    if (text !== "") {
      $.ajax({
        type: "GET",
        url: "/chat/submit.php?chattext=" + encodeURIComponent(text) + "&chatroomID=" + chatroomID,
      });
    }
  };

  // Display the given text in the conversation panel.
  showMessage = function (text, isSender) {
    if (text.trim() === '') {
        return;
    }

    // if the sender is the user, display the message on the right
    message_side = isSender ? 'right' : 'left';
    var $messages = $('.messages');
    var message = new Message({
        text: text,
        message_side: message_side
    });
    message.draw();
    return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
  };

  // Sets the nextTimeID so that duplicate messages would not be displayed.
  setNextTimeID = function (nextID) {
    lastTimeID = nextID;
  }

  // Gets the conversation of given chatroomID from the database.
  getChatText = function(chatroomID) {
    $.ajax({
      type: "GET",
      url: "/chat/refresh.php?chatroomID=" + chatroomID + "&lastTimeID=" + lastTimeID,
    }).done(function (data)
    {
      var jsonData = JSON.parse(data);
      var jsonLength = jsonData.results.length;
      var html = "";
      for (var i = 0; i < jsonLength; i++) {
        var result = jsonData.results[i];
        showMessage(result.chattext, result.isSender);
        setNextTimeID(result.chatID);
      }
    });
  };

  // ON DOCUMENT READY
  $(function () {
    $('.messages').hide(); // hide the message box for now
    getChatList();

    var message_side = 'right';
    var getMessageText = function () {
        var $message_input;
        $message_input = $('#message_input');
        return $message_input.val();
    };

    // CLICK the SEND button.
    $('#send_message_btn').click(function (e) {
      sendChatText($('#chatroom_num').text(), getMessageText());
      getChatText($('#chatroom_num').text());
      $('#message_input').val('');  // empty input space
    });

    // ENTER KEY
    $('.message_input').keyup(function (e) {
      // when pressed enter key
      if (e.which === 13) {
        sendChatText($('#chatroom_num').text(), getMessageText());
        getChatText($('#chatroom_num').text());
        $('#message_input').val('');  // empty input space
      }
    });

    // 목록보기
    $('.goback').click(function (e) {
      $('.messages').hide();
      $('.chat_title').html("채팅목록");
      getChatList();
      $('#chat_list').show();
    });

    // 채팅방 생성
    $('#make_chat_btn').click(function (e) {
      createChatRoom($('.input_receiver').val());
    });

    // 스크롤시 채팅창 위치 변경
    $(window).scroll(function () {
      var topPos = $(window).scrollTop();
      // 180px과 바교하는 이유는 헤더 사이즈가 180이기 때문.
      if (topPos < 180) {
        $("#aside2").stop().animate({top: 0}, 500);
      } else {
        $("#aside2").stop().animate({
          top: (topPos - 130) + "px",
        }, 500);
      }
    })
  });
}.call(this));
