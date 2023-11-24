<?php require_once "layouts/header.php";
require_once "../db/conn.php";



if (isset($_SESSION['username'])) {
  echo "<script>window.location.href='index.php'</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = strtolower(trim($_POST['username']));
  $password = $_POST['password'];
  $new_password = sha1($password . $username);

  $result = $admins->getAdmin($username, $new_password);
  if (!$result) {
    echo '<div class="alert alert-danger">Username or Password ins incorrect! Please try again. </div>';
  } else {
    $_SESSION['username'] = $username;
    $_SESSION['admin_id'] = $result['id'];
    echo "<script>window.location.href='index.php'</script>";
  }
} ?>

<div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row justify-content-middle" style="margin-left: 397px;">
      <div class="col-md-6 mt-5">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="appointment-form" style="margin-top: -568px;" method="post">
          <h3 class=" mb-3"> Admin Login</h3>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input require type="text" class="form-control" placeholder="Username" id="username" name="username">
              </div>
            </div>

            <div class=" col-md-12">
              <div class="form-group">
                <input require type="password" id="password" name="password" class=" form-control" placeholder="Password">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary py-3 px-4">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once "layouts/footer.php"; ?>