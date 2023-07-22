<?php include 'inc/header.php';?>

<?php 
    $login = Session::get("cuslogin");
    if ($login == true) {
        header("Location:order.php");
    }
?>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
		$custLogin = $cmr->customerLogin($_POST);
	}
?>

<div class="main">
    <div class="content">
        <div class="login_panel">

			<?php 
				if (isset($custLogin)) {
				echo $custLogin;
				}
			?>

            <h3> Existing Customer </h3>
            <p> Sign in with the form below. </p>
            <form action="#" method="post">

                <input name="email" type="email" placeholder="Email" class="field">

                <input name="pass" type="password" placeholder="Password" class="field">

				<p class="note">If you forgot your passoword just enter your email and click <a href="#"> here </a>
            	</p>

            	<div class="buttons text_center">
                	<div>
                    	<button class="btn_login" name="login"> Sign In </button>
               		</div>
            	</div>
			  </div>

            </form>

            

        <?php 
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
				$customerReg = $cmr->customerRegistration($_POST);
			}
		?>

        <div class="register_account">

            <?php 
			if (isset($customerReg)) {
				echo $customerReg;
			}
			?>
            <h3 class="text_center">Register New Account</h3>
            <form action="#" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="Name">
                                </div>

                                <div>
                                    <input type="text" name="city" placeholder="City">
                                </div>

                                <div>
                                    <input type="text" name="zip" placeholder="Zip-Code">
                                </div>
                                <div>
                                    <input type="email" name="email" placeholder="E-Mail">
                                </div>
                            </td>

                            <td>
                                <div>
                                    <input type="text" name="address" placeholder="Address">
                                </div>
                                <div>
                                    <input type="text" name="country" placeholder="Country">
                                </div>

                                <div>
                                    <input type="text" name="phone" placeholder="Phone">
                                </div>

                                <div>
                                    <input type="password" name="pass" placeholder="Password">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text_center">
                    <div class="search float_none">
                        <button class="grey btn_reg" name="register"> Create Account </button>
                    </div>
                    <div>
                        <p>By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.
                        </p>
                    </div>
                </div>

                <div class="clear"></div>
            </form>

        </div>
        <div class="clear"></div>
    </div>
</div>


<?php include 'inc/footer.php';?>