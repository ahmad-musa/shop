<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>User Profile</h2>
        <div class="block">               
         <form>
            <table class="form">					
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="Text" placeholder="Enter Your Name..."  name="name" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Enter Your Mail..." name="email" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>