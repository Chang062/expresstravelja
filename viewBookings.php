<?php $title = "Booking History";
require "includes/header.php";
require_once 'db/conn.php'; ?>


<?php if (!isset($_GET['id'])) {
    echo "<script>
    window.location.href = '404.php'
</script>";
} else {
    $id = $_GET['id'];
    if ($_SESSION['userid'] != $id) {
        echo "<script>
        window.location.href = '404.php'
    </script>";
    }
    $bookings = $pdo->query("SELECT * FROM ((bookings b inner join hotels h on h.id = b.hotel_id) inner join rooms r on r.rm_id = b.room_id) WHERE user_id='$id'");
    $bookings->execute();
    $allbookings = $bookings->fetchAll(PDO::FETCH_OBJ);
} ?>

<div class="container">
    <h1 class="mb-4">Booking History</h1>
    <?php if (count($allbookings) > 0) : ?>
        <table class="table mt-5" id="sortable">
            <thead class=" thead-dark">
                <tr>

                    <th scope="col">Booked For</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact #</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Booked</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allbookings as $b) : ?>
                    <tr>
                        <th scope="row"><?php echo $b->full_name ?></th>
                        <td><?php echo $b->email ?></td>
                        <td><?php echo $b->contact ?></td>
                        <td><?php echo $b->name ?></td>
                        <td><?php echo $b->type ?></td>
                        <td><?php echo $b->check_in ?></td>
                        <td><?php echo $b->check_out ?></td>
                        <td>US$<?php echo $b->payment ?>.00</td>
                        <td><?php echo $b->status ?></td>
                        <td><?php echo $b->date_created ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-primary text-center" role="alert">
            NO RECORDS AVAILABLE
        </div>
    <?php endif ?>
</div>

<?php require "includes/footer.php";
?>