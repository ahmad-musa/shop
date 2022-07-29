<?php include 'inc/header.php' ;?>


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

            <li class="flex-direction"> <a href="productbycat.php?catId=<?php echo $result['catId'];?>">
                <?php echo $result['catName'];?>
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
				$getNpd = $pd->getNewProduct();
					if ($getNpd) {
						while ($result = $getNpd->fetch_assoc()) {			
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