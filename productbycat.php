<?php include 'inc/header.php';?>

<?php
	if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
        echo "<script> window.location = '404.php'; </script>";
    } else {
        $id =  preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
    }
?> 

 <div class="main">
    <div class="content">
    
		<div class="content_top">
            <div class="heading">
                <h3>Choose Category:</h3>
            </div>
            <div class="clear"></div>
        </div>
       
        <div class="section group sidecat j_c_center ">

            <ul class="center">

				<?php 
					$getCat = $cat->getAllCat(); 
					if ($getCat) {
						while ($result = $getCat->fetch_assoc()) {  
				?>

				<li class="flex-direction"> 
					<a href="productbycat.php?catId=<?php echo $result['catId'];?>">
						<?php echo $result['catName'];?>
						<i class="fas fa-chevron-down"> </i>
					</a>
				</li>

            	<?php } } ?>

            </ul>

        </div>
	</div>


		<div class="content_top">
		
    		<div class="heading">
			
				<?php 
					$namebycat = $cat->getCatNameById($id);
					if ($namebycat ) {
						while ($result = $namebycat->fetch_assoc() ) {
				?>

				<h3> <?php echo $result['catName'];?> 
					<?php 	} }?> 

					<?php 
						$productofcat = $pd->countProductOfCat($id);
						if ($productofcat ) {
						while ($result = $productofcat->fetch_assoc() ) {
					?>

					<b> (<?php echo $result['Total'];?> Book/s) <b> 
					
					<?php 	} }?> 

				</h3>

    		</div> 

    		<div class="clear"></div>

    	</div>

	    <div class="section group">

				<?php 
					$productbycat = $pd->productByCat($id); 
					if ($productbycat) {
						while ($result = $productbycat->fetch_assoc()) {
				?>

				<div class="grid_1_of_4 images_1_of_4">
					 
					<a href="details.php?proid=<?php echo $result['productId'] ;?>">
						<img src="admin/<?php echo $result['image'] ;?>" class="img_cng" alt=""/>
					</a>

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