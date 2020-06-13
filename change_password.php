<?php include_once 'database/connection.php'; ?>
<?php
  include_once 'header.php';

  if(isset($_POST['change_pass'])) {

    $old_pass  = md5($_POST['old_password']);
    $new_pass  = $_POST['new_password'];
    $con_pass  = $_POST['con_password'];

    $change = "SELECT * FROM authenticate WHERE email = '$_SESSION[email]' AND password = '$old_pass'";
    $ra = $conn->query($change);
    $ras_change = $ra->fetch_assoc();

    if($ra->num_rows > 0) {
      if($new_pass == $con_pass) {

        $new_password = md5($new_pass);
        $con_password = md5($con_pass);
      
        $changepass = "UPDATE authenticate SET password = '$new_password' WHERE email = '$_SESSION[email]'";

        if($conn->query($changepass) === TRUE) {
          echo "<script> alert('Your Password Changed Successfully..!'); window.location.href = 'logout.php'; </script>";
        } else {
          echo $conn->error;
        }
      } else {
        echo "<script> alert('Keep The Password Change..!'); window.location.href = 'logout.php'; </script>";
      }
    } else {
      echo "<script> alert('Your Password Changed Successfully..!'); window.location.href = 'logout.php'; </script>";
    }
  }
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <div class="container-fluid">
            <div class="title">
              <h4> Change Password </h4>
            </div>
            <div class="clearfix"></div><br>

            <form role="form" method="post" class="form-horizontal style-form">
              <div class="form-group">
                <label class="col-md-2 col-lg-2 col-sm-12 control-label"> Old Password : </label>
                <div class="col-md-4 col-lg-4 col-sm-12">
                  <input type="password" name="old_password" class="form-control" placeholder="Old Password..!">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 col-lg-2 col-sm-12 control-label"> New Password : </label>
                <div class="col-md-4 col-lg-4 col-sm-12">
                  <input type="password" name="new_password" class="form-control" placeholder="New Password..!">
                </div>

                <label class="col-md-2 col-lg-2 col-sm-12 control-label"> Confirm Password : </label>
                <div class="col-md-4 col-lg-4 col-sm-12">
                  <input type="password" name="con_password" class="form-control" placeholder="Confirm Password..!">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-offset-5">
                  <input type="submit" name="change_pass" value="Change Password" class="btn btn-warning">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>