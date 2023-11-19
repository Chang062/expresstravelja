<?php $title = "Room";
require "includes/header.php";
require_once 'db/conn.php';

if (!isset($_GET['id'])) {
    echo "<script>window.location.href='404.php'</script>";
} else {
    $id = $_GET['id'];
    $rooms = $pdo->query("SELECT * FROM rooms r inner join hotels h on r.hotel_id = h.id WHERE id='$id'");
    $rooms->execute();
    $allroom = $rooms->fetchAll(PDO::FETCH_OBJ);

    $hotel = $crud->getHotelById($id);
}

?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/<?php echo $hotel['image'] ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Rooms <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread"><?php echo $hotel['name'] ?></h1>
                <h2 class="mb-0 subheading">Available Rooms</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">

            <?php foreach ($allroom as $r) : ?>
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img order-md-last" style="background-image: url(images/<?php echo $r->rm_image ?>);"></a>
                        <div class="half right-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <h3 class="mb-3"><a href="room.php?id=<?php echo $r->rm_id ?>"><?php echo $r->type ?></a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> <?php echo $r->num_persons ?></li>
                                    <li><span>Size:</span> <?php echo $r->size ?></li>
                                    <li><span>View:</span> <?php echo $r->view ?></li>
                                    <li><span>Bed:</span> <?php echo $r->beds ?></li>
                                    <li><span>Per night:</span> $<?php echo $r->price ?>.00</li>
                                </ul>
                                <p class="pt-1"><a href="room.php?id=<?php echo $r->rm_id ?>" class="btn-custom px-3 py-2">Book Now <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>
<?php require "includes/footer.php";
?>