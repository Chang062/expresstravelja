<?php require_once "layouts/header.php";
require_once "../db/conn.php"; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="../success.php" enctype=" multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input required type="email" class="form-control" placeholder="Email" id="email" name="email">

            </div>

            <div class="form-outline mb-4">
              <input required type="text" placeholder="Username" class=" form-control" id="username" name="username">
            </div>
            <div class="form-outline mb-4">
              <input required type="password" class="form-control" placeholder="Password" id="password" name="password">
            </div>

            <button type="submit" name="createAdmin" class="btn btn-primary  mb-4 text-center">create</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require "layouts/footer.php"; ?>