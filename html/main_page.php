<?php
// 로그인 세션이 정상적으로 시작되었는지 체크.
// 세션 없으면 로그인 페이지로 바로 접속함
require_once('dbconfig.php');
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  echo "<script>alert(\" 어허! 로그인부터 하고오셈. \")</script>";
  echo "<script>window.location.replace(\" login/login.html \");</script>";
  exit;
}
$prodID = $_SESSION['user_id'];

header('Content-type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Korea Security Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main_page.css" />
    <link rel="stylesheet" type="text/css" href="css/board.css" />
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

<body>

<!-- header -->
<header>
  <div><a href="main_page.php"><img src="images/logo.png" alt="logo" /></a></div>
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
              <!-- 로그인된 사원 정보 -->
              <div class="user-name">
                <h5>
                  <?php
                  $query = "SELECT * FROM user WHERE prodID=" . $prodID;
                  $result = $db->query($query);
                  $row = $result->fetch_assoc();
                  $user_name = $row['name'];
                  $user_mail = $row['mail'];
                  $user_position = $row['position'];
                  echo $user_name;
                  ?>
                </h5>
                <!-- 직책 -->
                <span>
                  <?php
                  echo $user_position
                   ?>
                </span>
                <!-- 이메일 -->
                <span>
                  <?php
                  echo $user_mail
                   ?>
                </span>
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
<!-- 게시판 -->
    <section id="subsection1">
                      <article id="article1">
                      <div class="inbox-head">
                          <h3>Notice</h3>
                          <span><a href="">more</a></span>
                      </div>
                      <div class="inbox-body" style="padding:0;">
                          <table class="table table-inbox table-hover">
                          <colgroup>
                          <col style="width:25%;">
                          <col style="width:50%;">
                          <col style="width:25%;">
                          </colgroup>
                            <tbody>
                              <tr class="">
                                  <td class="view-message dont-show">PHPClass</td>
                                  <td class="view-message">Added a new class: Login Class Fast Site</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Google Webmaster </td>
                                  <td class="view-message">Improve the search presence of WebSite</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">JW Player</td>
                                  <td class="view-message">Last Chance: Upgrade to Pro for </td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Tim Reid, S P N</td>
                                  <td class="view-message">Boost Your Website Traffic</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Freelancer.com</td>
                                  <td class="view-message">Stop wasting your visitors </td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">WOW Slider </td>
                                  <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">LinkedIn Pulse</td>
                                  <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Drupal Community</td>
                                  <td class="view-message view-message">Welcome to the Drupal Community</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Facebook</td>
                                  <td class="view-message view-message">Somebody requested a new password </td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Skype</td>
                                  <td class="view-message view-message">Password successfully changed</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                          </tbody>
                          </table>
                      </div>
                      </article>

                      <article id="article2">
                      <div class="inbox-head" style="background:#5bc0de;">
                          <h3>News</h3>
                          <span><a href="">more</a></span>
                      </div>
                      <div class="inbox-body" style="padding:0;">
                          <table class="table table-inbox table-hover">
                          <colgroup>
                          <col style="width:25%;">
                          <col style="width:50%;">
                          <col style="width:25%;">
                          </colgroup>
                            <tbody>
                              <tr class="">
                                  <td class="view-message dont-show">PHPClass</td>
                                  <td class="view-message">Added a new class: Login Class Fast Site</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Google Webmaster </td>
                                  <td class="view-message">Improve the search presence of WebSite</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">JW Player</td>
                                  <td class="view-message">Last Chance: Upgrade to Pro for </td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Tim Reid, S P N</td>
                                  <td class="view-message">Boost Your Website Traffic</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Freelancer.com</td>
                                  <td class="view-message">Stop wasting your visitors </td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">WOW Slider </td>
                                  <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">LinkedIn Pulse</td>
                                  <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Drupal Community</td>
                                  <td class="view-message view-message">Welcome to the Drupal Community</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Facebook</td>
                                  <td class="view-message view-message">Somebody requested a new password </td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                              <tr class="">
                                  <td class="view-message dont-show">Skype</td>
                                  <td class="view-message view-message">Password successfully changed</td>
                                  <td class="view-message text-right">2016.10.10 18:09</td>
                              </tr>
                          </tbody>
                          </table>
                      </div>
                      </article>
    </section>
<!-- //게시판 -->

<!-- 위젯 -->
    <section id="subsection2">
      <article id="article3">
        <div id="calendar" style="margin: 0; font-size: 13px; background-color:white;"></div>
      </article>

      <article id="article4" style="background: #fff;">
      식단
<!--         <div id="lunch_menu" class="meal">
          <label>
            <img src="lunch_menu.png" id="menuimg" alt="식단" title="오늘의 메뉴">
            <ul>
              <li>현미밥</li>
              <li>양념게장</li>
              <li>감자채볶음</li>
              <li>햄구이</li>
              <li>깻잎절임</li>
              <li>총각무김치</li>
              <li>미역국</li>
            </ul>
          </label>
        </div> -->
      </article>

      <article id="article5" style="background: #fff;">
      날씨
<!--         <fieldset>
          <iframe id="weather" src="http://www.accuweather.com/ko/kr/seoul/226081/current-weather/226081/#detail-now" seamless>
          </iframe>
        </fieldset> -->
      </article>
    </section>
  </section>
<!-- //위젯 -->

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