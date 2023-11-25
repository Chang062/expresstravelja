<?php
$title = "Rooms";
require_once "layouts/header.php";
require_once "../db/conn.php";
if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}
$results = $crud->getAllRooms();
?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Rooms</h5>
          <a href="create-rooms.html" class="btn btn-primary mb-4 text-center float-right">Create Room</a>
          <table class="table">
            <thead>
              <tr>

                <th scope="col">Hotel Name</th>
                <th scope="col">Room Type</th>
                <th scope="col">View</th>
                <th scope="col">Beds</th>
                <th scope="col">size</th>
                <th scope="col">Occupants</th>
                <th scope="col">Per Night</th>
                <th scope="col">status</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <th scope="row"><?php echo $r['name'] ?></th>
                  <td><?php echo $r['type'] ?></td>
                  <td><?php echo $r['view'] ?></td>
                  <td><?php echo $r['beds'] ?></td>
                  <td><?php echo $r['size'] ?></td>
                  <td><?php echo $r['num_persons'] ?></td>
                  <td>$<?php echo $r['price'] ?>.00</td>
                  <td><?php echo $r['stat'] ?></td>
                  <td><?php echo $r['date_created'] ?></td>

                  <td>
                    <a href="statusRooms.php?id=<?php echo $r['rm_id'] ?>" class="btn btn-primary">Change Status</a>
                    <a href="updateRooms.php?id=<?php echo $r['rm_id'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="deleteRoom.php?id=<?php echo $r['rm_id'] ?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



</div>
<?php require_once "layouts/footer.php" ?>