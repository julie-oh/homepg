
<?php
                    header('Content-type text/html; charset=utf-8');
                    include '../session.php';
                    include '../dbconfig.php';
                                if(isset($_POST["notice_b"])){
                                    if($_POST["writePW"]==$_SESSION['user_pw']){
                                        $write = TRUE;
                                    }else{
                                         echo "<script>alert(\"실패\")</script>"; 
                                    }
                                } 
                                
                                
                                  if ($write == TRUE) {
                                  $n_title = $_POST["n_title"];
                                  $n_text = $_POST["n_text"];
                                  $n_date = Date('Y-m-d H:i:s');
                                  $n_no = NULL;
                                  
                                  }
                                  
                                  if (isset($nNo)) {
                                    $sql = "insert into notice values (''.$n_no.','.$n_title.','.$n_text.','.$n_date.','10','.$prodID.','.$prodID.'')";
                                    $result = $db->query($sql);
                                  if($result=!null){
                                      echo "<script>alert(\"게시물 작성에 성공하였습니다\")</script>";
                                      ?> <meta http-equiv='refresh' content='0;url=notice.php'> <?php
                                  }else{
                                      print "실패ㅠ";
                                  }
                                  }
          ?>

