<?php
$title = "create Hotels";
require_once "layouts/header.php";
require_once "../db/conn.php";
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}

?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Hotels</h5>
          <form method="POST" action="../success.php" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <label for="name">Name</label>
              <input require type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-outline mb-4 mt-4">
              <label for="name">Image</label>
              <input type="file" name="image" id="image" class="form-control" />

            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" rows="6"></textarea>
            </div>

            <div class="form-outline mb-4 mt-4">
              <label for="location">Location</label>

              <input required type="text" name="location" id="location" class="form-control" />

            </div>

            <!-- Submit button -->
            <button type="submit" name="createHotel" class="btn btn-primary  mb-4 text-center">create</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "layouts/footer.php" ?>