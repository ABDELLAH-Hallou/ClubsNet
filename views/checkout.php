<?php 
include('components/header_1.php');
?>
<!-- 
    block style
 -->
<link href="assets/css/details.css" rel="stylesheet" type="text/css">
<link href="assets/css/checkout.css" rel="stylesheet" type="text/css">
<!-- 
    end block style 
 -->
<?php 
include('components/navbar.php');
include('models/club/getFromClub.php');
// check GET request id param
if(isset($_GET['id'])){
    // get the club
    $club = getClub($db, $_GET['id']);
    // get president
    $student = getStudent($db, $_SESSION['id']);
}
include('controllers/club/feedback.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <!-- profile -->
            <div class="col-xs-12 col-lg-4 col-md-4 col-sm-12">
                <!-- profile card -->
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="<?php echo htmlspecialchars($club['image']); ?>" loading="lazy" alt="AdminBSB - Profile Image" />
                        </div>
                        <div class="content-area">
                            <h3><?php echo htmlspecialchars($club['name']); ?></h3>
                            <p><?php echo htmlspecialchars($club['domain']); ?></p>
                            <p>Club</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-8 col-md-8">
                <div class="card">
                    <div class="body">

                        <h3>Thank you for donating :</h3>
                        <div class="checkoutinfo">
                            <p><strong>Club : </strong><?php echo htmlspecialchars($club['name']); ?></p>
                            <label class="labels" for="price"><strong>Amount</strong></label>
                            <input name="price" type="number" value="0" class="form-control" id="price" required>
                            <span><strong>DH</strong></span>
                        </div>
                        <div id="paypal-button-container"></div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('components/footer_1.php'); ?>
<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=ASJ920rtwxVmDQOqqTSX-l8yxVnBWlOhGVWBP4uLBwjhr18_prdqsJ7vJNeLT7XhrpJs0QhZ_dXZFAjw&currency=USD"></script>
<script>
    let price = document.getElementById("price").value/10;
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: price
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Successful capture! For demo purposes:
                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                // var transaction = orderData.purchase_units[0].payments.captures[0];
                // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                const element = document.getElementById('paypal-button-container');
                element.innerHTML = '';
                element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }


    }).render('#paypal-button-container');
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>