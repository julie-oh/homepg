<!DOCTYPE html>
<html>
              <?php include '../session.php';?>
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Korea Security Company | 공지사항 글쓰기</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main_page.css" />
<!-- Script dependencies -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!-- 달력 -->
<link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />
<script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-ui-1.10.3.custom.min.js'></script>
<script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/fullcalendar/fullcalendar.min.js'></script>

<!-- chat js -->
<script type="text/javascript">
(function () {
    var Message;
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
    $(function () {
        var getMessageText, message_side, sendMessage;
        message_side = 'right';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');
            return $message_input.val();
        };
        sendMessage = function (text) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message_side = message_side === 'left' ? 'right' : 'left';
            message = new Message({
                text: text,
                message_side: message_side
            });
            message.draw();
            return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        };
        $('.send_message').click(function (e) {
            return sendMessage(getMessageText());
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                return sendMessage(getMessageText());
            }
        });
        sendMessage('Hello Philip! :)');
        setTimeout(function () {
            return sendMessage('Hi Sandy! How are you?');
        }, 1000);
        return setTimeout(function () {
            return sendMessage('I\'m fine, thank you!');
        }, 2000);
    });
}.call(this));

// 달력
  $(document).ready(function() {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
      header : {
        left : 'prev,next today',
        center : 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      editable : true,
      events : [ {
        title : 'All Day Event',
        start : new Date(y, m, 1)
      }, {
        title : 'Long Event',
        start : new Date(y, m, d - 5),
        end : new Date(y, m, d - 2)
      }, {
        id : 999,
        title : 'Repeating Event',
        start : new Date(y, m, d - 3, 16, 0),
        allDay : false
      }, {
        id : 999,
        title : 'Repeating Event',
        start : new Date(y, m, d + 4, 16, 0),
        allDay : false
      }, {
        title : 'Meeting',
        start : new Date(y, m, d, 10, 30),
        allDay : false
      }, {
        title : 'Lunch',
        start : new Date(y, m, d, 12, 0),
        end : new Date(y, m, d, 14, 0),
        allDay : false
      }, {
        title : 'Click for Google',
        start : new Date(y, m, 28),
        end : new Date(y, m, 29),
        url : 'http://google.com/'
      } ]
    });

  });

//quick_menu
//<![CDATA[
$(function(){
  $(window).scroll(function(){ //$(window).scroll(function(){실행문}) 윈도우에 스크롤바를 움직일 때 마다 실행문을 실행
    var topPos=$(window).scrollTop(); //스크롤 내려온 높이값을 구한다. 스크롤 높이값에 50px을 더한다.
    $("#aside2").stop().animate({top:topPos+"px"},1000); //id="quick"가 움직일 수 있도록 애니메이션 적용
  })
});
//]]>

 </script>
</head>



<!-- header -->
<header>
  <div><a href="main_page.php"><img src="../images/logo.png" alt="logo" /></a></div>
</header>
<!-- //header -->

<!-- 상단 nav -->
          <nav class="navbar navbar-fixed-top">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      </button>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav">
                          <li class="active padLR20"><a href="menubar_email.html" class="">e-mail</a></li>
                          <li class="padLR20"><a href="aboard/index.php">공지사항</a></li>
                          <li class="padLR20"><a href="#">스케줄 관리</a></li>
                          <li class=" dropdown padLR20"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">회의실<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="#">팀회의</a></li>
                                  <li><a href="#">임원직 회의</a></li>
                              </ul>
                          </li>
                          <li class=" dropdown padLR20"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">결재문서 <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="document_form.html">품의/제안서</a></li>
                                  <li><a href="#">결재완료건</a></li>
                              </ul>
                          </li>
                          <li class=" down padLR20"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">익명게시판<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="#">건의사항</a></li>
                                  <li><a href="board/index.php">자유게시판</a></li>
                              </ul>
                          </li>
                          <li class=" down padLR20"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">cafe<span class="caret"></span></a></li>
                      </ul>
                  </div>
              </div>
          </nav>
<!-- //상단 nav -->

<div id="mainbody">

<!-- 좌측 snb -->
  <div class="container" id="aside1">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
      <aside class="sm-side">
          <div class="user-head">
              <a class="inbox-avatar" href="javascript:;">
                  <img  width="64" hieght="60" src="images/ohyeonjoo.jpg" alt="사용자 사진" />
              </a>
              <div class="user-name">
                  <h5>
                    <a href="#">
                      <?php
                      echo $_SESSION['user_name'];
                      ?>
                    </a>
                  </h5>
                  <span><a href="#">yj_oh@naver.com</a></span>
              </div>
          </div>
          <div class="inbox-body">
              <a href="/login/logout.php"class="btn btn-compose">Logout</a>
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Compose</h4>
                          </div>
                          <div class="modal-body">
                              <form role="form" class="form-horizontal">
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">To</label>
                                      <div class="col-lg-10">
                                          <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Cc / Bcc</label>
                                      <div class="col-lg-10">
                                          <input type="text" placeholder="" id="cc" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Subject</label>
                                      <div class="col-lg-10">
                                          <input type="text" placeholder="" id="inputPassword1" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Message</label>
                                      <div class="col-lg-10">
                                          <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <span class="btn green fileinput-button">
                                            <i class="fa fa-plus fa fa-white"></i>
                                            <span>Attachment</span>
                                            <input type="file" name="files[]" multiple="">
                                          </span>
                                          <button class="btn btn-send" type="submit">Send</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          </div>
          <ul class="inbox-nav inbox-divider">
              <li class="active">
                  <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
              </li>
              <li>
                  <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
              </li>
              <li>
                  <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
              </li>
          </ul>
          <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
              <li> <h4>Labels</h4> </li>
              <li> <a href="#"> <i class=" fa fa-sign-blank text-danger"></i> Work </a> </li>
              <li> <a href="#"> <i class=" fa fa-sign-blank text-success"></i> Design </a> </li>
              <li> <a href="#"> <i class=" fa fa-sign-blank text-info "></i> Family </a>
              </li><li> <a href="#"> <i class=" fa fa-sign-blank text-warning "></i> Friends </a>
              </li><li> <a href="#"> <i class=" fa fa-sign-blank text-primary "></i> Office </a>
              </li>
          </ul>
          <ul class="nav nav-pills nav-stacked labels-info ">
              <li> <h4>Buddy online</h4> </li>
              <li> <a href="#"> <i class=" fa fa-circle text-success"></i>Alireza Zare <p>I do not think</p></a>  </li>
              <li> <a href="#"> <i class=" fa fa-circle text-danger"></i>Dark Coders<p>Busy with coding</p></a> </li>
              <li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Mentaalist <p>I out of control</p></a>
              </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>H3s4m<p>I am not here</p></a>
              </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Dead man<p>I do not think</p></a>
              </li>
          </ul>

          <div class="inbox-body text-center">
              <div class="btn-group">
                  <a class="btn mini btn-primary" href="javascript:;">
                      <i class="fa fa-plus"></i>
                  </a>
              </div>
              <div class="btn-group">
                  <a class="btn mini btn-success" href="javascript:;">
                      <i class="fa fa-phone"></i>
                  </a>
              </div>
              <div class="btn-group">
                  <a class="btn mini btn-info" href="javascript:;">
                      <i class="fa fa-cog"></i>
                  </a>
              </div>
          </div>
    </aside>
  </div>
  </div>
<!-- //좌측 snb -->

<!-- section -->
  <section id="section1">
    <!-- 공지사항 게시판 글쓰기 -->
    <div class="notice">
      <div class="inbox-head">
        <h3>자유게시판 글쓰기</h3>
      </div>
      <div class="document_form">
        <table>
        <caption>자유게시판 게시판 글쓰기</caption>
        <colgroup>
          <col style="width:25%;">
          <col style="width:75%;">
        </colgroup>
          <tbody>
            <form action="board_write2.php" method="POST">
              <tr>
                <td class="head">사원 이름</td><td><?php echo $_SESSION['user_name']?></td>
              </tr>
              <tr>
                <td class="head">Password</td><td><input type="password" name="writePW" placeholder="사원의 비밀번호를 입력하세요"/></td>
              </tr>
              <tr>
                <td class="head">제목</td><td><input type="text" class="title" placeholder="제목을 입력하세요" name="b_title" /></td>
              </tr>
              <tr>
                <td class="head">첨부파일</td><td><input type="file" /></td>
              </tr>
              <tr>
                <td colspan="2" class="head" >내용</td>
              </tr>
              <tr>
                <td colspan="2"><textarea placeholder="내용을 입력하세요" name="b_text" ></textarea></td>
              </tr>
              <input class="buttons" type="submit" name="board_b" value="register"></input>
            </form>
          </tbody>
        </table>
      </div>
    </div>
    <!-- / /공지사항 게시판 -->
  </section>
<!-- // section -->

<!-- 우측 chat -->
  <aside id="aside2">
    <!-- chat s_c  -->
    <div class="chat_window">
      <div class="top_menu">
        <div class="buttons">
          <div class="button close">
          </div>
          <div class="button minimize">
          </div>
          <div class="button maximize">
          </div>
        </div>
        <div class="title">Chat</div>
      </div>
      <ul class="messages"></ul>
      <div class="bottom_wrapper clearfix">
        <div class="message_input_wrapper">
          <input class="message_input" placeholder="Type your message here..." />
        </div>
        <div class="send_message">
          <div class="icon"></div>
          <div class="text">Send</div>
        </div>
      </div>
    </div>
    <div class="message_template">
      <li class="message">
        <div class="avatar"></div>
        <div class="text_wrapper">
          <div class="text"></div>
        </div>
      </li>
    </div>
</aside>
<!-- //우측 chat -->

</body>
</html>
