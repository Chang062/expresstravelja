<?php
$title = "Admins";
require_once "layouts/header.php";
require_once "../db/conn.php";

if (!isset($_SESSION['username'])) {
  echo "<script>window.location.href='loginAdmins.php'</script>";
}

$results = $admins->getAdmins();
?>



<div class="container">
  <h1 class="mb-4">Admins</h1>
  <a href="createAdmins.php" class="btn btn-primary mb-4 text-center float-right">Create Admin</a>
  <table class="table mt-5" id="sortable">
    <thead class=" thead-dark">
      <tr>

        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Date Created</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <th scope="row"><?php echo $r['username'] ?></th>
          <td><?php echo $r['email'] ?></td>
          <td><?php echo $r['date_created'] ?></td>
          <td> <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
          </td>


        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>
<?php require "layouts/footer.php"; ?>