<?php
if(isset($_POST['email'])) {

    $email_to = "info@soffito.com";
    $string_exp = "/^([а-яА-ЯЁёa-zA-Z0-9_ ]+)$/u";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $tel_exp = '/^([0-9_ +]+)$/';

    //flags
    $formCorrect=false;
    $nameEntered=false;
    $nameValid=false;
    $surnameEntered=false;
    $surnameValid=false;
    $telEntered=false;
    $telValid=false;
    $emailEntered=false;
    $emailValid=false;

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $error_message = '<ul>';

    if(isset($_POST['firstname'])&&$_POST['firstname']!=''){
        $nameEntered=true;
        if(preg_match($string_exp,$firstname)) {
          $nameValid=true;
        } else {
          $error_message .= '<li>Имя может содержать только английские и русские буквы, тире и пробел</li>';
        }
    } else {
      $error_message .= '<li>Вы не ввели имя</li>';
    }

    if(isset($_POST['lastname'])&&$_POST['lastname']!=''){
        $surnameEntered=true;
        if(preg_match($string_exp,$lastname)) {
          $surnameValid=true;
        } else {
          $error_message .= '<li>Фамилия может содержать только английские и русские буквы, тире и пробел</li>';
        }
    } else {
      $error_message .= '<li>Вы не ввели фамилию</li>';
    }

    if(isset($_POST['tel'])&&$_POST['tel']!=''){
        $telEntered=true;
        if(preg_match($tel_exp,$tel)) {
          $telValid=true;
        } else {
          $error_message .= '<li>Телефон должен содержать только цифры и знак "+"</li>';
        }
    } else {
      $error_message .= '<li>Вы не ввели телефон</li>';
    }

    if(isset($_POST['email'])&&$_POST['email']!=''){
        $emailEntered=true;
        if(preg_match($email_exp,$email)) {
          $emailValid=true;
        } else {
          $error_message .= '<li>E-mail в формате email@domain.com</li>';
        }
    } else {
      $error_message .= '<li>Вы не ввели e-mail</li>';
    }
    $error_message .='</ul>';

    if($nameEntered&&$nameValid&&$surnameEntered&&$surnameValid&&$telEntered&&$telValid&&$emailEntered&&$emailValid){
      $formCorrect=true;
    }

    if($formCorrect){
      $email_message = "";

      function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
      }

      $email_message .= "First Name: ".clean_string($firstname)."\n";
      $email_message .= "Last Name: ".clean_string($lastname)."\n";
      $email_message .= "Email: ".clean_string($email)."\n";
      $email_message .= "Telephone: ".clean_string($tel)."\n";
      $email_message .= "Comments: ".clean_string($comment)."\n";

      $email_subject = "New request from ".$firstname." ".$lastname;

      // create email headers
      $headers = 'From: soffito@soffito.com'."\r\n".
      'Reply-To: '.$email."\r\n" .
      'X-Mailer: PHP/' . phpversion();
      @mail($email_to, $email_subject, $email_message, $headers);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Заявка на замер</title>

    <!-- Bootstrap Core CSS -->
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/form.css" />

    <!-- Custom Fonts -->
    <link href="../libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- inner pages styles -->
    <link href="../css/inner.css" rel="stylesheet"/>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                  <div class="int_page_logo">
                  </div>
                <p>Soffito</p>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                      <a href="#">О нас</a>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Натяжные потолки<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                            <a href="about.html">Фактуры</a>
                          </li>
                          <li>
                            <a href="about.html#design">Дизайн</a>
                          </li>
                          <li>
                              <a href="features.html">Преимущества</a>
                          </li>
                        </ul>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Свет<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="light.html#spotlight">Точечный</a>
                          </li>
                          <li>
                              <a href="light.html#lightpanel">Панели</a>
                          </li>
                          <li>
                              <a href="light.html#crystal">Споты</a>
                          </li>
                          <li>
                              <a href="light.html#carnice">Закарнизный</a>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Услуги<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="installation.html">Установка</a>
                          </li>
                          <li>
                              <a href="otherservices.html#services_repair">Ремонт</a>
                          </li>
                          <li>
                              <a href="otherservices.html#services_drain">Слив воды</a>
                          </li>
                      </ul>
                  </li>
                  <li class='active'>
                      <a href="contacts.html">Контакты</a>
                  </li>
                  <li>
                    <a id="language_icon" href="javascript: window.location = window.location.href.replace('/ru/', '/en/');"><img width=30px; height=30px; src="../pics/en.png"></a>
                  </li>
                  <!-- <li>
                      <a href="#">Галерея</a>
                  </li> -->
              </ul>
          </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--/.Navigation-->
    <!-- Page Content -->
    <div class="container">

        <!-- Section Heading-->
        <section>
          <div class="row">
            <div class="col-sm-11 col-sm-offset-1 form_success_notice<?php echo $formCorrect?'':' hidden'; ?>">
              <h1 style="text-align: center;" class="page-header"><?php echo $firstname.", "; ?>cпасибо за вашу заявку,<br><small>наш сотрудник свяжется с вами в ближайшее время!</small></h1>
              <a href="index.html"><button class='btn btn-default center-block'>Вернуться на главную</button></a>
            </div>
          </div>
          <div class="col-sm-12 form_error_notice<?php echo !$formCorrect?'':' hidden'; ?>">
            <h1 class="page-header">Хьюстон, у нас проблема!<br><small>Похоже, кое-что нужно поправить:</small></h1><?php echo $error_message; ?>
          </div>
          <br>
          <div <?php echo !$formCorrect?'':' hidden'; ?>>
            <form class="form-horizontal" method="post" action="myprocessor.php">
              <div class="form-group <?php echo $nameEntered&&$nameValid ?' has-success':'has-error'; ?>">
                <label class="col-sm-2  col-md-offset-3 control-label" for="firstname" >Имя:</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" name="firstname" id="firstname"
                    value="<?php echo $firstname; ?>"><br>
                </div>
              </div>
              <div class="form-group <?php echo $surnameEntered&&$surnameValid ?' has-success':'has-error'; ?>">
                <label class="col-sm-2  col-md-offset-3 control-label" for="lastname">Фамилия:</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>"><br>
                </div>
              </div>
              <div class="form-group <?php echo $telEntered&&$telValid ?' has-success':'has-error'; ?>">
                <label class="col-sm-2  col-md-offset-3 control-label" for="tel">Телефон:</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $tel; ?>"><br>
                </div>
              </div>
              <div class="form-group <?php echo $emailEntered&&$emailValid ?' has-success':'has-error';  ?>">
                <label class="col-sm-2  col-md-offset-3 control-label" for="email">E-mail:</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"><br>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2  col-md-offset-3 control-label" for="comment">Комментарий:</label>
                <div class="col-sm-10 col-md-4">
                  <textarea class="form-control" rows='5' placeholder=""></textarea>
                </div>
              </div>
              <div class="form-group">
                <br>
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-5">
                  <button type="submit" class="btn btn-default">Отправить заявку</button>
                </div>
              </div>
            </form>
          </div>
        </section>
        <!-- /.content -->

    </div>

    <!-- Footer -->
    <footer>
      <div class="container-liquid">
        <div class="col-xs-12 social">
          <a class="hvr" href="#">
            <i class="fa fa-facebook-square" aria-hidden="true"></i>
          </a>
          <a class="hvr" href="#">
            <i class="fa fa-twitter-square" aria-hidden="true"></i>
          </a>
          <a class="hvr" href="#">
            <i class="fa fa-youtube-square" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col-xs-12 contacts">
          <email class="hvr">info@soffito.com</email><br />
          <a class="hvr" href="tel:0035725580418">+357 25 580 418</a>
        </div>
        <div>
          <p id="copyright">Copyright &copy; soffito.com 2016</p>
        </div>
      </div>
    </footer>
<!-- /. footer -->

    <!-- jQuery -->
    <script src="libs/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
