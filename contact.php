<?php include 'inc/header.php';?>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$name     = $fm->validation($_POST['name']);
        $name     = mysqli_real_escape_string($db->link, $name);
		
		$email     = $fm->validation($_POST['email']);
        $email     = mysqli_real_escape_string($db->link, $email);

		$subject     = $fm->validation($_POST['subject']);
        $subject     = mysqli_real_escape_string($db->link, $subject);

		$body     = $fm->validation($_POST['body']);
        $body     = mysqli_real_escape_string($db->link, $body);


		$error 	= " ";
		if(empty($name)){
			$error 	= "Name must not be empty! ";
		}elseif(empty($email)){
			$error 	= "Email must not be empty! ";
		}elseif(empty($body)){
			$error 	= "Message must not be empty! ";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error 	= "Invalid Email!";
		}else{
			$msg = "Message sent successfully!";
		}

		}
?>

 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> Please let us know about your thoughts. Feel free to knock us.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					<?php
						if(isset($error)){ 		echo "<span class='error'> $error </span> ";
						}
						if(isset($msg)){ 		echo "<span class='success'> $msg </span> ";
						}
					?>

					    <form action=" " method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" class="form_input"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="email" name="email" class="form_input"></span>
						    </div>
						    <div>
						     	<span><label>SUBJECT</label></span>
						    	<span><input type="text" name="subject"class="form_input"></span>
						    </div>
						    <div>
						    	<span><label>MESSAGE</label></span>
						    	<span><textarea name="body" class="form_input"> </textarea></span>
						    </div>
						   <div class="center">
						   		<span><input type="submit" value="SEND" class="btn btn_send"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>


 <?php include 'inc/footer.php';?>
