<?php include 'inc/header.php' ;?>

<?php

    if (!isset($_GET['search']) || $_GET['search'] == NULL) {
        echo "<script> window.location = '404.php'; </script>";
    } else {
        $search = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['search']);
    }

?>

<div class="main">
    <div class="content">
            
        <div class="content_top">
            <div class="heading">
                <h3> <span class="sentence_case">Searched book/s on "<span class="upper_case bold red"><?php echo $search ?></span> " keyword </span> </h3>
            </div>
            <div class="clear"></div>
        </div>

        <div class="section group center">

            <?php
				$searchProduct = $pd->searchProduct($search);
					if ($searchProduct) {
						while ($result = $searchProduct->fetch_assoc()) {			
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

            <?php } } else { ?>

                <h2> Your search is not found </h2>
            <?php }?>

        </div>
    </div>
</div>



<?php include 'inc/footer.php';?>