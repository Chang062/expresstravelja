<?php $title = "Room";
require "includes/header.php";
require_once 'db/conn.php';
require_once 'includes/auth_check.php';

if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href='index.php'</script>";
}


?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h1 class="mb-4">PAY FOR YOUR ROOM</h1>
            </div>
            <div class="col-md-7 ftco-animate">
                <script src="https://www.paypal.com/sdk/js?client-id=AWK4k4UtH6xY8DCWilmOsHrthku10qgsab_79ZlVwh4BKLn9X3QsqRcTDTk_r8EKvHNZ6rJ1RDvWHLz8&currency=USD"></script>
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container" class="align-items-center justify-content-center"></div>
                <script>
                    paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: <?php echo $_SESSION['price']; ?> // Can also reference a variable or function
                                    }
                                }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {

                                window.location.href = 'index.php';
                            });
                        }
                    }).render('#paypal-button-container');
                </script>
            </div>

        </div>



    </div>
</div>
<?php require "includes/footer.php";
?>