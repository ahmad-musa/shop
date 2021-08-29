<?php include 'inc/header.php' ;?>

<?php 
    $login = Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
?>

<?php 
    $cmrId = Session::get("cmrId");
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$updateCmr = $cmr->customerUpdate($_POST, $cmrId);
	}
?>

<style>

    .tblone{
        width: 60%;
        margin: 0 auto;
        border: 2px solid #ddd;
    }
    .tblone tr td{
        text-align: justify;
    }
    .tblone input{
        width: 70%;
        padding: 5px 10px;
        font-size: 16px;
    }
    .tblone input:focus{
        outline: 1px solid var(--color1);
        color: var(--color1);
    }
    .tblone .center{
        width: 50%;
        margin: 0 auto;
    } 
    
</style>

 <div class="main">
    <div class="content">
        <div class="section group">

            <?php 
                $id = Session::get("cmrId");
                $getdata = $cmr->getCustomerData($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
            ?>

                <form action="" method="post">
                    <table class="tblone">

                    <!-- General Style -->
                    <?php 
                            if (isset($updateCmr)) { ?>
                                <tr> <td colspan = '2' ><?php echo $updateCmr ; ?> </td> </tr>;
                    <?php } ?>
                    <!-- General Style -->

                         <!-- concade style  -->

                            <!-- <?php 
                            if (isset($updateCmr)) {
                                echo "<tr> <td colspan = '2' >".$updateCmr."</td> </tr>";
                             } 
                            ?>  -->

                        <!-- concade style  -->


                        <tr>
                            <td colspan = "2" > <h2 > Update Profile Details </h2> </td>
                        </tr>

                        <tr>
                            <td width = "25%" > Name </td>
                            <td> <input type="text" name="name" value="<?php echo $result['name'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td> Phone</td>
                            <td> <input type="text" name="phone" value="<?php echo $result['phone'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> <input type="email" name="email" value="<?php echo $result['email'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td> Address </td>
                            <td> <input type="text" name="address" value="<?php echo $result['address'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td> City </td>
                            <td> <input type="text" name="city" value="<?php echo $result['city'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td> Zip Code </td>
                            <td> <input type="text" name="zip" value="<?php echo $result['zip'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td> Country </td>
                            <td> <input type="text" name="country" value="<?php echo $result['country'];?>">
                            </td>
                        </tr>

                        <tr>
                            <td>  </td>
                            <td> 
                                <div class="center"> 
                                     <button type="submit" class="save-btn" name="submit"> Save </button> 
                                </div> 
                            </td>
                        </tr>

                    </table>
                </form>
 
          <?php } } ?>



        </div>

    </div>
 </div>

 <?php include 'inc/footer.php';?>