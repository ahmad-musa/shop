<?php include 'inc/header.php' ;?>


<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Choose Publication:</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group sidecat j_c_center ">

            <ul class="center">

                <?php 
                    $getBrand = $br->getAllBrand(); 
                    if ($getBrand) {
                        while ($result = $getBrand->fetch_assoc()) {  
                ?>

                <li class="flex-direction"> 
                    <a href="productbybrand.php?brandId=<?php echo $result['brandId'];?>">
                        <?php echo $result['brandName'];?>
                        <i class="fas fa-chevron-down"> </i>
                    </a>
                </li>

                <?php } } ?>

            </ul>


        </div>

        <div class="content_bottom">
            <div class="heading">
                <h3>Books</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">

            <?php
				$getAllProduct = $pd->getAllProduct();
					if ($getAllProduct) {
						while ($result = $getAllProduct->fetch_assoc()) {			
			?>

            <div class="grid_1_of_4 images_1_of_4">

                <a href="details.php?proid=<?php echo $result['productId'] ;?>"><img
                        src="admin/<?php echo $result['image'] ;?>" class="img_cng" alt="" /></a>

                <h2> <?php echo $result['productName'] ;?> </h2>
                <p><?php echo $fm->textShorten($result['body'], 65) ;?> </p>

                <p><span class="price">Tk <?php echo $result['price'] ;?></span></p>

                <div class="button"> <span> 
                    <a href="details.php?proid=<?php echo $result['productId'] ;?>"
                      class="details">Details</a>
                    </span> </div>
            </div>

            <?php } }?>

        </div>
    </div>
</div>



<?php include 'inc/footer.php';?>