<?php
require_once('dbconfig.php');
require_once('session.php');
 ?>

<!-- 좌측 snb -->
<div class="container" id="aside1">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
      <aside class="sm-side">
          <div class="user-head">
            <?php
              $query = "SELECT * FROM user WHERE prodID=" . $prodID;
              $result = $db->query($query);
              $row = $result->fetch_assoc();
              $user_name = $row['name'];
              $user_mail = $row['mail'];
              $user_position = $row['position'];
              $image_path = $row['image'];
             ?>
              <a class="inbox-avatar" href="javascript:;">
              <img width="64" height="60" src=
            <?php
              echo "\"images/userImages/" . $image_path . "\""
             ?>
              alt="사용자사진" />
              </a>
              <!-- 로그인된 사원 정보 -->
              <div class="user-name">
                <h5>
                  <?php
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
                  <a href="#"><i class="fa fa-inbox"></i> 수신메일함 <span class="label label-danger pull-right">2</span></a>
              </li>
              <li class="active">
                  <a href="#"><i class="fa fa-inbox"></i> 발신메일함 </a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-envelope-o"></i> 메일보내기</a>
              </li>
              <li>
                  <a href="#"><i class=" fa fa-trash-o"></i> 지운메일함</a>
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
