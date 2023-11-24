<?php require_once "layouts/header.php";
require_once "../db/conn.php";


if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}

$hotels = $pdo->query("SELECT count(*) AS count_hotels FROM hotels");
$hotels->execute();
$allHotels = $hotels->fetch(PDO::FETCH_OBJ);


$rooms = $pdo->query("SELECT count(*) AS count_rooms FROM rooms");
$rooms->execute();
$allRooms = $rooms->fetch(PDO::FETCH_OBJ);


$admins = $pdo->query("SELECT count(*) AS count_admins FROM admins");
$admins->execute();
$allAdmins = $admins->fetch(PDO::FETCH_OBJ);

$users = $pdo->query("SELECT count(*) AS count_users FROM users");
$users->execute();
$allUsers = $users->fetch(PDO::FETCH_OBJ);


?>
<div class="container-fluid">

  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Hotels</h5>
          <p class="card-text">number of hotels: <?php echo $allHotels->count_hotels ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>

          <p class="card-text">number of admins: <?php echo $allAdmins->count_admins ?></p>

        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class=" card">
        <div class="card-body">
          <h5 class="card-title">Registered Users</h5>

          <p class="card-text">number of Users: <?php echo $allUsers->count_users ?></p>

        </div>
      </div>
    </div>
  </div>

</div>


<?php require_once "layouts/footer.php"; ?>