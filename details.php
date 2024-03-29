<?php include 'inc/header.php';?>

<?php

    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script> window.location = '404.php'; </script>";
    } else {
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
    }

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$quantity = $_POST['quantity'];
		
		$addCart  = $ct->addToCart($quantity, $id);
	}
?>


<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">

                <?php
					$getPd = $pd->getSingleProduct($id);
					if ($getPd) {
						while ($result = $getPd->fetch_assoc()) {
					
				?>

                <div class="grid images_3_of_2">
                    <img src="admin/<?php echo $result['image'];?>" alt="" />
                </div>

                <div class="desc span_3_of_2">
                    <h2><?php echo $result['productName'];?></h2>
                    <div class="price">
                        <p>Price: <span>Tk <?php echo $result['price'];?></span></p>
                        <p>Category: 
                            <a href="productbycat.php?catId=<?php echo $result['catId'];?>"> 
                                <span> <?php echo $result['catName'];?> </span> 
                            </a> 
                        </p>
                        <p>Publication: 
                            <a href="productbybrand.php?brandId=<?php echo $result['brandId'];?>"> 
                                <span> <?php echo $result['brandName'];?> </span> 
                            </a> 
                        </p>
                        <!-- <p>Publication: <span><?php //echo $result['brandName'];?></span></p> -->
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="number" class="buyfield" name="quantity" value="1" />
                            <input type="submit" class="btn_submit" name="submit" value="Buy Now" />
                        </form>
                    </div>
                    <span class="error">
                        <?php 
                            if(isset($addCart)){
                                echo $addCart;
                            } 
                        ?>
                    </span>

                </div>

                <div class="product-desc">
                    <h2>Product Details</h2>
                    <p><?php echo $result['body'];?></p>

                </div>
                <?php } } ?>
            </div>

            <div class="rightsidebar sidecat span_3_of_1">
                <h2> <a href="category.php">CATEGORIES</a></h2>
                <ul>

                    <?php 
                        $getCat = $cat->getAllCat(); 
                        if ($getCat) {
                            while ($result = $getCat->fetch_assoc()) {  
                    ?>

                    <li> <a href="productbycat.php?catId=<?php echo $result['catId'];?>">
                           <i class="fas fa-chevron-right"> </i>
                           <?php echo $result['catName'];?> 
                        </a>
                    </li>

                         
                    <?php } } ?>

                </ul>

            </div>
        </div>
    </div>


    <?php include 'inc/footer.php';?>