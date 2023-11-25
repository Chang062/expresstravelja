<?php $title = "Home";
require "includes/header.php";
require_once 'db/conn.php';

$results = $crud->getHotels();
$outcome = $crud->getRooms();
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to Travel Express JA</h2>
                <h1 class="mb-4">Book a Suite for your vacation</h1>
                <p><a href="about.php" class="btn btn-primary">Learn more</a> <a href="contact.php" class="btn btn-white">Contact us</a></p>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(<?php echo $r['image'] ?>);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading"><?php echo $r['name'] ?></h3>
                            <p><?php echo $r['description'] ?>.</p>
                            <p><?php echo $r['location'] ?></p>
                            <p><a href="rooms.php?id=<?php echo $r['id'] ?>" class="btn btn-primary">View rooms</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Available Rooms</h2>
            </div>
        </div>
        <div class="row no-gutters">
            <?php while ($o = $outcome->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img order-md-last" style="background-image: url(<?php echo $o['rm_image'] ?>);"></a>
                        <div class="half right-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <h3 class="mb-3"><a href="room.php?id=<?php echo $o['rm_id'] ?>"><?php echo $o['type'] ?></a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> <?php echo $o['num_persons'] ?></li>
                                    <li><span>Size:</span> <?php echo $o['size'] ?></li>
                                    <li><span>View:</span> <?php echo $o['view'] ?></li>
                                    <li><span>Bed:</span> <?php echo $o['beds'] ?></li>
                                    <li><span>Per night:</span> $<?php echo $o['price'] ?>.00</li>
                                </ul>
                                <p class="pt-1"><a href="room.php?id=<?php echo $o['rm_id'] ?>" class="btn-custom px-3 py-2">Book Now <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                <p class="mb-0"><a href="about.php" class="btn btn-primary px-4 py-3">Learn More</a> <a href="contact.php" class="btn btn-white px-4 py-3">Contact us</a></p>
            </div>
        </div>
    </div>
</section>





















<?php require "includes/footer.php";
?>