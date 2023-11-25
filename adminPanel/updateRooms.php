<<?php
    $title = "Update Room";
    require_once "layouts/header.php";
    require_once "../db/conn.php";
    if (!isset($_SESSION['username'])) {
        echo "<script>window.location.href='loginAdmins.php'</script>";
    }
    if (!isset($_GET['id'])) {
        echo "<script>window.location.href='404.php'</script>";
    } else {
        $id = $_GET['id'];
        $hotel = $crud->getAllHotels();
        $result = $crud->getRoomById($id);
    }
    ?> <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
                    <form method="POST" action="../success.php" enctype="multipart/form-data">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <label for="specialty">Room Type</label>
                            <input type="text" name="type" id="type" class="form-control" value="<?php echo $result['type'] ?>" />
                            <input type="hidden" name="rm_id" id="rm_id" class="form-control" value="<?php echo $result['rm_id'] ?>" />

                        </div>
                        <div class=" form-outline mb-4 mt-4">

                            <div class="form-group">
                                <label for="specialty">Hotel Name</label>
                                <select class="form-control" id="hotel_id" name="hotel_id">
                                    <?php while ($h = $hotel->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?php echo $h['id'] ?>" <?php if ($h['id'] == $result['hotel_id']) echo 'selected' ?>>
                                            <?php echo $h['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <label for="specialty">Number of Beds</label>
                            <input type="text" name="beds" id="beds" class="form-control" value="<?php echo $result['beds']; ?> " />

                        </div>
                        <div class=" form-outline mb-4 mt-4">
                            <label for="specialty">Occupants</label>
                            <input type="text" name="num_persons" id="num_persons" class="form-control" value="<?php echo $result['num_persons']; ?> " />

                        </div>
                        <div class=" form-outline mb-4 mt-4">
                            <label for="specialty">Size (sqft)</label>
                            <input type="text" name="size" id="size" class="form-control" value="<?php echo $result['size']; ?>" />

                        </div>
                        <div class=" form-outline mb-4 mt-4">
                            <label for="specialty">View</label>
                            <input type="text" name="view" id="view" class="form-control" value="<?php echo $result['view']; ?>" />

                        </div>

                        <div class=" form-outline mb-4 mt-4">
                            <label for="specialty">Per Night</label>
                            <input type="text" name="price" id="price" value="<?php echo $result['price']; ?>" class=" form-control" />

                        </div>


                        <br>

                        <!-- Submit button -->
                        <button type="submit" name="updateRooms" class="btn btn-primary  mb-4 text-center">Update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require_once "layouts/footer.php"
    ?>