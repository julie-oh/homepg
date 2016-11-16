<aside id="chat_side">
  <!-- chat s_c  -->
  <div class="chat_window">
    <div class="top_menu">
      <div class="goback">List</div>
      <div class="chat_title">Chat</div>
      <!-- 채팅 제목 -->
      <div id="chatroom_num"></div>
    </div>
    <div class="chat_main" id="chat_main">
      <!-- 채팅방 목록이 진열됨 -->
      <div id="chat_list" class="chatroom_list">
        <!-- 채팅방으로 유저 초대 후 채팅방 생성 -->
        <input type="text" class="input_receiver" name="receiver" placeholder="invite user">
        <button class="create_chat_btn" id="make_chat_btn" name="make_chat_btn">
          Create
        </button>
        <div id="chatlist_list">
        </div>
        <!-- 채팅방 목록 템플릿 - 표시되지 않음 -->
        <div class="chatlist_template">
          <div class="chatlist_elem">
            <span id="chatlist_number"></span>
            <span id="chatlist_lastActive"></span>
          </div>
        </div>
      </div>
      <!-- 대화 내용이 표시됨 -->
      <ul class="messages"></ul>
    </div>
    <!-- 채팅 입력창 및 보내기 버튼 -->
    <div class="bottom_wrapper clearfix">
      <div class="message_input_wrapper">
        <input id="message_input" class="message_input" placeholder="Type your message here..." />
      </div>
      <div id="send_message_btn" class="send_message">
        <div class="icon"></div>
        <div class="text">Send</div>
      </div>
    </div>
  </div>
  <!-- 메세지 템플릿 - 숨겨져있음 -->
  <div class="message_template">
    <li class="message">
      <div class="avatar"></div>
      <div class="text_wrapper">
        <div class="text"></div>
      </div>
    </li>
  </div>
</aside>
