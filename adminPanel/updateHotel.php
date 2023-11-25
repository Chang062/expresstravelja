<?php
$title = "Update Hotel";
require_once "layouts/header.php";
require_once "../db/conn.php";
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}
if (!isset($_GET['id'])) {
  echo "<script>window.location.href='404.php'</script>";
} else {
  $id = $_GET['id'];
  $result = $crud->getHotelById($id);
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
          <form method="POST" action="../success.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="name" class="form-control" value="<?php echo $result['name'] ?>" />
              <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $result['id'] ?>" />

            </div>
            <div class=" form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" name="description" id="description" rows="6"><?php echo $result['description'] ?></textarea>
            </div>

            <div class=" form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Location</label>

              <input type="text" name="location" id="location" class="form-control" value="<?php echo $result['location'] ?>" />


            </div>


            <!-- Submit button -->
            <button type="submit" name="updateHotel" class="btn btn-primary  mb-4 text-center">update</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div><?php require_once "layouts/footer.php"
      ?>