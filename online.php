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
                
            </div>

        </div>

        <div class="clear"></div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>