<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashboard</h2>
                <div class="block">               
                  Welcome to the Admin Panel. <br>
                  Hi <?php echo Session::get('adminName'); ?>        
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>