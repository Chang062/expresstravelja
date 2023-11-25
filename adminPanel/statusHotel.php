<?php
$title = "Hotel Status";
require_once "layouts/header.php";
require_once "../db/conn.php";
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}
if (!isset($_GET['id'])) {
  echo "<script>window.location.href='404.php'</script>";
} else {
  $id = $_GET['id'];
  if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    $update = $pdo->prepare("UPDATE hotels SET stats = :status WHERE id='$id'");
    $update->execute([":status" => $status]);
    echo "<script>window.location.href='showHotels.php'</script>";
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Status</h5>
          <form method="POST" action="statusHotel.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <!-- Email input -->
            <select style="margin-top: 15px;" class="form-control" name="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>


            <!-- Submit button -->
            <button style=" margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "layouts/footer.php" ?>