<?php require_once "layouts/header.php";
require_once "../db/conn.php";
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}
$results = $crud->getAllHotels();
?>



<div class="container">
  <h1 class="mb-4">Hotels</h1>
  <a href="createHotels.php" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
  <table class="table mt-5" id="sortable">
    <thead class=" thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Location</th>
        <th scope="col">Status</th>
        <th scope="col">Date Created</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <th scope="row"><?php echo $r['name'] ?></th>
          <td><?php echo $r['location'] ?></td>
          <td><?php echo $r['stats'] ?></td>
          <td><?php echo $r['date_created'] ?></td>
          <td>
            <a href="statusHotel.php?id=<?php echo $r['id'] ?>" class="btn btn-primary">Change Status</a>
            <a href="updateHotel.php?id=<?php echo $r['id'] ?>" class="btn btn-warning">Update</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');" href="deleteHotel.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
          </td>


        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>
<?php require "layouts/footer.php"; ?>