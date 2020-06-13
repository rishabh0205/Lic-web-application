<?php include_once '../connection/db.php'; ?>
<?php

  if(isset($_SESSION["email"]) || isset($_SESSION["name"])) {

    echo "<script> window.location.href = 'index.php'; </script>";
  }

  if(isset($_POST['loginbtn'])) {

    $user_id  = $_POST['user_id'];
    $password  = md5($_POST['password']);

    $login = "SELECT * FROM adminlogin WHERE email = '$user_id' AND password = '$password'";
    $ra = $conn->query($login);
    $ras_login = $ra->fetch_assoc();

    if($ra->num_rows > 0) {
      if($user_id == $ras_login['email'] || $password == $ras_login['password']) {

        $_SESSION['id'] = $ras_login['id'];
        $_SESSION['name'] = $ras_login['name'];
        $_SESSION['short_name'] = $ras_login['short_name'];
        $_SESSION['email'] = $ras_login['email'];
        $_SESSION['phone'] = $ras_login['phone'];
        $_SESSION['address'] = $ras_login['address'];
        $_SESSION['type'] = $ras_login['type'];
        $_SESSION['image'] = $ras_login['image'];
        $_SESSION['isActive'] = $ras_login['isActive'];

        echo "<script> alert('Welcome to $_SESSION[name] : Admin Panel..!'); window.location.href = 'index.php'; </script>";
      } else {

        echo "<script> alert('Invalid Email Id or Password..!'); window.location.href = 'login.php'; </script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>	
  <title> Login | District Institute of Education & Training, Saidpur, Ghazipur </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
  
  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="assets/js/chart-master/Chart.js"></script>

  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });
  </script>

  <style>
    .container .jumbotron {
      padding-left:30px !important;
      padding-right:20px !important;
      padding-top:10px !important;
      padding-bottom: 0 !important;
      background: linear-gradient(to left, #cea934 0%, #cea934 99%)
    }
    .container h3 {
      color:#fff !important;
      text-align:center !important;
      font-family: cambria;
    }
    .container .jumbotron h3 {
      color:#000 !important;
      text-align:center !important;
      padding-bottom: 25px;
      font-weight: bold;
    }
    .container .jumbotron form label {
      color:#000 !important;
      font-size: 1.3em;
      font-weight: bold;
    }
    .container .jumbotron form input[type = 'text'] {
      color:#000 !important;
      font-size: 1.3em;
    }
    .container .jumbotron form input[type = 'checkbox'] {
      color:#000 !important;
      font-size: 1.3em;
    }

  </style>
</head>

<body style="background:linear-gradient(to left, #000 0%, #1900e6 99%)">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12" style="padding-top:40px;">
        <h3> Welcome To<br>DISTRICT INSTITUTE of EDUCATION & TRAINING,<br>Saidpur, Ghazipur </h3>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <div class="jumbotron">
          <h3> Login Form </h3>

          <form role="form" method="post" class="form-horizontal style-form">
            <div class="form-group">
              <label class="col-md-3 col-lg-3 col-sm-12 control-label"> User Name : </label>
              <div class="col-md-8 col-lg-8 col-sm-12">
                <input type="text" name="user_id" class="form-control" placeholder="Email Id / Username..!">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-lg-3 col-sm-12 control-label"> Password : </label>
              <div class="col-md-8 col-lg-8 col-sm-12">
                <input type="password" name="password" id="pass" class="form-control" placeholder="Password..!">
                <input type="checkbox" name="check" onclick="showPass()" value="Show Password">&nbsp;&nbsp; Show Password &nbsp;&nbsp;&nbsp;
                <!-- <input type="checkbox" name="remember_me" value="Remember Me">&nbsp;&nbsp; Remember me -->
              </div>
            </div>

            <script>
              function showPass() {

                var show = document.getElementById('pass');
                if(show.type === "password") {
                  show.type = "text";
                } else {
                  show.type = "password";
                }
              }
            </script>

            <div class="form-group">
              <input type="submit" name="loginbtn" value="Login" class="btn btn-primary">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>