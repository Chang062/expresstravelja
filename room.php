<?php $title = "Room";
require "includes/header.php";
require_once 'db/conn.php';
require_once 'includes/auth_check.php';

if (!isset($_GET['id'])) {
    include 'includes/errormessage.php';
} else {
    $id = $_GET['id'];
    $result = $crud->getRoomDetails($id);

    $amenities = $pdo->query("SELECT * FROM utilities WHERE room_id='$id'");
    $amenities->execute();
    $allamenities = $amenities->fetchAll(PDO::FETCH_OBJ);
}


?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/room-1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Boom Your Room </h2>
                <h1 class="mb-4"><?php echo $result['type'] ?></h1>

            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form action="success.php?id=<?php echo $id; ?>" class="appointment-form" style="margin-top: -568px;" method="post">
                    <h3 class=" mb-3">Book this room</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input required type="email" class="form-control" placeholder="Email" id="email" name="email">
                            </div>
                        </div>

                        <div class=" col-md-12">
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Full Name" id="full_name" name="full_name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input required type="text" class="form-control" placeholder="Phone Number" id="contact" name="contact">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input required type="text" class="form-control appointment_date-check-in" placeholder="Check-In" id="check_in" name="check_in">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input required type="text" class="form-control appointment_date-check-out" placeholder="Check-Out" id="check_out" name="check_out">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="<?php echo $result['hotel_id'] ?>">
                                <input type="hidden" class="form-control" id="room_id" name="room_id" value="<?php echo $result['room_id'] ?>">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="booknow" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 wrap-about">
                <div class="img img-2 mb-4" style="background-image: url(images/<?php echo $result['rm_image'] ?>);">
                </div>
                <h2>The most recommended vacation rental</h2>
                <p>something to go here.</p>
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section">
                    <div class="pl-md-5">
                        <h2 class="mb-2">What we offer</h2>
                    </div>
                </div>
                <div class="pl-md-5">
                    <p>something to go here.</p>
                    <div class="row">

                        <?php foreach ($allamenities as $amenity) : ?>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="<?php echo $amenity->icon; ?>"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading"><?php echo $amenity->utility_name; ?></h3>
                                    <p><?php echo $amenity->description; ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro" style="background-image: url(images/image_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2>Ready to get started</h2>
                <p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
            </div>
        </div>
    </div>
</section>

<?php require "includes/footer.php";
?>