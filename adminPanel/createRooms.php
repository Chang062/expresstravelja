<?php require_once "layouts/header.php";
require_once "../db/conn.php";
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}
$results = $crud->getAllHotels();

?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
          <form method="POST" action="../success.php" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <label for="specialty">Room Type</label>
              <input type="text" name="type" id="type" class="form-control" placeholder="name" />

            </div>
            <div class="form-outline mb-4 mt-4">

              <div class="form-group">
                <label for="specialty">Hotel Name</label>
                <select class="form-control" id="hotel_id" name="hotel_id">

                  <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['id'] ?>"><?php echo $r['name']; ?></option>
                  <?php }  ?>
                </select>
              </div>
            </div>
            <div class="form-outline mb-4 mt-4">
              <label for="specialty">Number of Beds</label>
              <input type="text" name="beds" id="beds" class="form-control" />

            </div>
            <div class="form-outline mb-4 mt-4">
              <label for="specialty">Occupants</label>
              <input type="text" name="num_persons" id="num_persons" class="form-control" />

            </div>
            <div class="form-outline mb-4 mt-4">
              <label for="specialty">Size (sqft)</label>
              <input type="text" name="size" id="size" class="form-control" />

            </div>
            <div class="form-outline mb-4 mt-4">
              <label for="specialty">View</label>
              <input type="text" name="view" id="view" class="form-control" />

            </div>

            <div class="form-outline mb-4 mt-4">
              <label for="specialty">Per Night</label>
              <input type="text" name="price" id="price" class="form-control" />

            </div>

            <div class="form-outline mb-4 mt-4">
              <label for="name">Image</label>
              <input type="file" name="rm_image" id="rm_image" class="form-control" />

            </div>
            <br>

            <!-- Submit button -->
            <button type="submit" name="createRooms" class="btn btn-primary  mb-4 text-center">create</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "layouts/footer.php"
?>