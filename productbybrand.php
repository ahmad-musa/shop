<?php include 'inc/header.php';?>

<?php
	if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
        echo "<script> window.location = '404.php'; </script>";
    } else {
        $id =  preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandId']);
    }
?> 

 <div class="main">
    <div class="content">
    	<div class="content_top">
		
    		<div class="heading">
			
			<?php 
				$namebybrand = $br->getBrandNameById($id);
				if ($namebybrand ) {
					while ($result = $namebybrand->fetch_assoc() ) {
			?>

    		<h3> <?php echo $result['brandName'];?> 
				 <?php 	} }?> 

				<?php 
					$productofbrand = $pd->countProductOfBrand($id);
					if ($productofbrand ) {
					while ($result = $productofbrand->fetch_assoc() ) {
				?>

				<b>Publication (<?php echo $result['Total'];?> Book/s) <b> 
				
				<?php 	} }?> 

			</h3>

    		</div> 

			

    		<div class="clear"></div>
    	</div>

	      <div class="section group">

		  	<?php 
				$productbybrand = $pd->productByBrand($id); 
				if ($productbybrand) {
					while ($result = $productbybrand->fetch_assoc()) {
			?>

				<div class="grid_1_of_4 images_1_of_4">
					 
					<a href="details.php?proid=<?php echo $result['productId'] ;?>"><img
							src="admin/<?php echo $result['image'] ;?>" class="img_cng" alt="" /></a>

					<h2> <?php echo $result['productName'] ;?> </h2>

					<p><?php echo $fm->textShorten($result['body'], 60) ;?> </p>

					<p><span class="price">Tk <?php echo $result['price'] ;?></span></p>

					<div class="button"> <span> 
						<a href="details.php?proid=<?php echo $result['productId'] ;?>"
						class="details">Details</a>
						</span> </div>
				</div>
			<?php 	} } else {
				echo "<h3> This category has no products available! </h3>";
			} ?>
				
			</div>

    </div>
 </div>


 <?php include 'inc/footer.php';?>