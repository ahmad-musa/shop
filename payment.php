<?php include 'inc/header.php'; ?>

<?php
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>

<style>


</style>

<div class="main">
    <div class="content">

        <div class="section group">

            <div class="payment">
                <h2> Choose Payment Option</h2>
                
                <div class="button_payment">
                    <a class="continue checkout" href="offline.php"> Offline Pay </a>
                    <a class="continue checkout" href="online.php"> Online Pay </a>
                </div>
                
                <div class="back">
                    <a class="continue btn_grey" href="cart.php"> Back </a>
                </div>
            </div>

        </div>

        <div class="clear"></div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>