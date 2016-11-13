<?php
  // 게시판 코드 답지


  // 날짜정보를 현지 시간에 맞춘다
  // date()함수를 사용하기 앞서 필요한 작업이다
  date_default_timezone_set('Asia/Seoul');
  header('Content-type text/html; charset=utf-8');

  // 이 두 파일은 반드시 필요한 파일이기 때문에 include 보다는 require가 맞다
  // include는 해당 파일을 가져오는게 실패하면 무시하지만
  // require는 프로그램이 죽어버리기 때문이다.
  require_once("../session.php");
  require_once("../dbconfig.php");
  // include '../session.php';
  // include '../dbconfig.php';

  if (isset($_POST["notice_b"])) {
    // 비밀번호를 세션에 저장해서 직접 비교하는거보단
    // 데이터베이스에서 결과를 가져와서 직접 검사하는게 맞을듯.
    // 이걸 위해 login.php에서 비밀번호 저장하는 방식을 바꾸는 것은 너무 큰 희생임

    // 예시코드 :
    /*
    $pwd = $_POST["writePW"];
    $prodID; // session.php에서 정의되어있다
    $sql = "SELECT * FROM user WHERE prodID=" . $prodID . " AND pwd=password(" .$pwd. ")";
    $result = $db->query($sql);
    if (!$result || mysqli_num_rows($result) == 0) {
      echo "<script>alert(\" 비밀번호가 틀렸습니다 \")</script>";
      echo "<script>history.back()</script>";
      exit;
    }
    $write = TRUE;
    */

    // 하지만 일단 이 코드를 살려두기로 하고
    if ($_POST["writePW"] == $_SESSION["user_pw"]) {
      $write = TRUE;
    } else {
      echo "<script>alert(\"실패\")</script>";
      echo "<script>history.back()</script>"; // 이부분이 실패시 이전 화면으로 돌아가게 만드는 부분
      exit;  // 이 파일을 종료해줘야 뒷부분이 실행되지 않고 안전하게 종료됨
    }
  }

  // 위 코드에서 비밀번호를 제대로 입력했다면 $write가 TRUE일 것이므로 이것을 활용함.
  // $write == TRUE라고 쓰는 것은 불필요함.
  if ($write) {
    $n_title = $_POST["n_title"];
    $n_text = $_POST["n_text"];
    $n_date = Date('Y-m-d H:i:s');
    // $n_no 를 따로 정의하지 말고 그냥 밑에 쿼리에 null을 입력해주면 됨
    // mysql에서 'alter table notice modify column n_no int(10) not null primary key auto_increment;' 를 실행해서
    // 반드시 n_no 항목에 auto_increment 특성이 포함되게 해야지 정상작동됨.


    // php는 겁나 거지같아서 문자열을 합치는데 마침표 따위를 사용함!!

    // 코드의 쿼리가 정상적으로 합쳐졌다면
    // "insert into notice values (null, '제목', '내용', '2016-11-9 1:36:14', 0, 1, 1)" 과 같이 생겼을것임
    // 분명히 알아둬야 할 것은!!!
    // 1. 숫자가 아닌 입력항목들은 전부 홑따옴표 (') 가 붙어있어야함. - 제목, 내용, 날짜/시간이 여기에 해당됨
    // 2. datetime은 사실상 문자와 같이 취급함. 그래서 홑따옴표 있음.
    // 3. 쿼리문 합성할때 홑따옴표 겹따옴표 구별하는데 원래 눈알 빠짐. php가 이래서 거지같음.
    // 4. 밑에 홑따옴표 처리를 위해 한 짓을 잘 보면, 우선 $sql 전체를 겹따옴표(")로 감쌌는데, 그 이유는
    // 만일 홑따옴표로 감쌌다면 쿼리 문자열 내부에 홑따옴표를 포함시킬 수 없기 때문이다. (escape 처리하는 쓸모없는 개고생을 할수도 있긴 함)
    // 따라서 "(null, '" . $n_title . "', ...)" 이렇게 생긴건  (null , '  까지는 문자열이고, $n_title = 제목을 그 뒤에 바로 붙인 뒤,
    // 또 바로 뒤에 홑따옴표를 붙이게 하는 거임. 따라서 저거 대입 결과는 "(null, '제목', ...)" 이렇게 됨 ($n_title = 제목).
    $sql = "insert into notice values (null, '" . $n_title . "', '" . $n_text . "', '" . $n_date . "', 0, " . $prodID . ", " . $prodID . ")";
    $result = $db->query($sql);  // 쿼리 날리고
  }
    // 결과가 성공적으로 저장되었다면 $result값이 false나 null이 아닌 값을 돌려주기 때문에
    // 밑에 방법으로 if문을 작성하면 완성.
    if ($result) {
      echo "<script>alert(\"게시물 작성에 성공하였습니다\")</script>";
      echo "<meta http-equiv='refresh' content='0; url=notice.php'>";  // 이게 있어야 이전 화면으로 다시 돌아감
      exit;
    } else {
      echo "<script>alert(\"게시물 작성에 실패하였습니다\")</script>";
      echo "<meta http-equiv='refresh' content='0; url=notice.php'>";
      exit;
    }


/*
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
  */
?>
