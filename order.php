<?php include 'inc/header.php' ;?>

<?php 
    $login = Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
?>

<style>
    .notfound{ }
    .notfound h2{
        font-size: 100px;
        line-height: 130px;
        text-align: center;
    }
    .notfound h2 span{
        display: block;
        color: red;
        font-size: 180px;
     }

</style>

 <div class="main">
    <div class="content">
    	
    <div class="section group">
        <div class="order">
            <h2 > Order Page </h2>
        </div>
    </div>

       <div class="clear"></div>
    </div>
 </div>


 <?php include 'inc/footer.php';?>