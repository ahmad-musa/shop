<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>


<?php

    class Product{
        private $db;
        private $fm;
    
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function productInsert($data, $file){
             
            $productName = $this->fm->validation($data['productName']);
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);

            $catId       = $this->fm->validation($data['catId']);
            $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);

            $brandId     = $this->fm->validation($data['brandId']);
            $brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);

            $body        = $this->fm->validation($data['body']);
            $body        = mysqli_real_escape_string($this->db->link, $data['body']);

            $price       = $this->fm->validation($data['price']);
            $price       = mysqli_real_escape_string($this->db->link, $data['price']);

            $type        = $this->fm->validation($data['type']);
            $type        = mysqli_real_escape_string($this->db->link, $data['type']);


            // Image Validation Starts //
            
            $permited       = array('jpg', 'jpeg', 'png', 'gif');
            $file_name      = $file['image']['name'];
            $file_size      = $file['image']['size'];
            $file_temp      = $file['image']['tmp_name'];
        
            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            
            // Image Validation Ends //

            if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" ||  $file_name == "" || $type == "" )
            {

                $msg = "<span class = 'error'> Field must not be empty! </span>";
                return $msg;

            } elseif ($file_size >1048567) {

                $msg = "<span class= 'error'> Image Size should be less then 1MB!
                </span>";
                return $msg;

            } elseif (in_array($file_ext, $permited) === false) {

                $msg = "<span class='error'> You can upload only:-".implode(', ', $permited)."</span>";
                return $msg;

            } else {

                move_uploaded_file($file_temp, $uploaded_image);

                $query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type) 
                VALUES('$productName', '$catId', '$brandId', '$body', '$price','$uploaded_image', '$type')";

                $inserted_row = $this->db->insert($query);
               
                if ($inserted_row) {

                    $msg= "<span class = 'success'> Product inserted successfully! </span>";
                    return $msg;

                } else {

                    $msg= "<span class = 'error'> Product not inserted! </span>";
                    return $msg;

                }
            }
        }

        public function getAllProduct(){

            $query = "SELECT p.*, c.catName, b.brandName 
                        FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                        WHERE p.catId = c.catId AND p.brandId = b.brandId
                        ORDER BY p.productId DESC";

            // $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
            //             FROM tbl_product
            //             INNER JOIN tbl_category
            //             ON tbl_product.catId = tbl_category.catId
            //             INNER JOIN tbl_brand
            //             ON tbl_product.brandId = tbl_brand.brandId
            //             ORDER BY tbl_product.productId DESC";

            $result = $this->db->select($query);
            return $result;
        }

        public function searchProduct($search){

            $query = "SELECT p.*, c.catName, b.brandName 
                        FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                        WHERE (p.catId = c.catId AND p.brandId = b.brandId) AND 
                        (productName LIKE '%$search%' OR catName LIKE '%$search%' OR 
                        brandName LIKE '%$search%' OR body LIKE '%$search%' OR 
                        price LIKE '%$search%')
                        ORDER BY p.productId DESC";

            $result = $this->db->select($query);
            return $result;
        }


        public function getProById($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id' ORDER BY productId DESC";
            $result = $this->db->select($query);
            return $result;
        }


        public function productUpdate($data, $file, $id){
            
            $productName = $this->fm->validation($data['productName']);
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);

            $catId       = $this->fm->validation($data['catId']);
            $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);

            $brandId     = $this->fm->validation($data['brandId']);
            $brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);

            $body        = $this->fm->validation($data['body']);
            $body        = mysqli_real_escape_string($this->db->link, $data['body']);

            $price       = $this->fm->validation($data['price']);
            $price       = mysqli_real_escape_string($this->db->link, $data['price']);

            $type        = $this->fm->validation($data['type']);
            $type        = mysqli_real_escape_string($this->db->link, $data['type']);


            // Image Validation Starts //
            
            $permited       = array('jpg', 'jpeg', 'png', 'gif');
            $file_name      = $file['image']['name'];
            $file_size      = $file['image']['size'];
            $file_temp      = $file['image']['tmp_name'];
        
            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            
            // Image Validation Ends //

            if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" )
            {

                $msg = "<span class = 'error'> Field must not be empty! </span>";
                return $msg;

            } else {

                    if(!empty($file_name))
                    {
                        
                        if ($file_size >1048567) {

                            $msg = "<span class= 'error'> Image Size should be less then 1MB!
                            </span>";
                            return $msg;

                        } elseif (in_array($file_ext, $permited) === false) {

                            $msg = "<span class='error'> You can upload only:-".implode(', ', $permited)."</span>";
                            return $msg;

                        } else {

                            move_uploaded_file($file_temp, $uploaded_image);

                            $query = "UPDATE tbl_product
                                        SET 
                                        productName = '$productName',
                                        catId       = '$catId',
                                        brandId     = '$brandId',
                                        body        = '$body',
                                        price       = '$price',
                                        image       = '$uploaded_image',
                                        type        = '$type'
                                        WHERE productId = '$id'";

                            $updated_row = $this->db->update($query);
                        
                            if ($updated_row) {

                                $msg= "<span class = 'success'> Product updated successfully! </span>";
                                return $msg;

                            } else {

                                $msg= "<span class = 'error'> Product not updated! </span>";
                                return $msg;

                                }
                        }

                } else {
                            $query = "UPDATE tbl_product
                                        SET 
                                        productName = '$productName',
                                        catId       = '$catId',
                                        brandId     = '$brandId',
                                        body        = '$body',
                                        price       = '$price',
                                        type        = '$type'
                                        WHERE productId = '$id'";

                            $updated_row = $this->db->update($query);
                        
                            if ($updated_row) 
                            {
                                $msg= "<span class = 'success'> Product updated successfully! </span>";
                                return $msg;

                            } else {

                                    $msg= "<span class = 'error'> Product not updated! </span>";
                                    return $msg;

                                }
                        }
            }
    
        }


        public function delProById($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
            $getData = $this->db->select($query);

            if ($getData) {
                while ($delImg = $getData->fetch_assoc()) {
                    $dellink = $delImg['image'];
                    unlink($dellink);
                }
            }
            
            $delquery = "DELETE FROM tbl_product WHERE productId = '$id' ";
            $deldata = $this->db->delete($delquery);
           
            if ($deldata) {

                $msg= "<span class = 'success'> Product Deleted Successfully! </span>";
                return $msg;

            } else {

                $msg= "<span class = 'error'> Product Not Deleted! </span>";
                return $msg;

            }

        }

    
    
    public function getFeaturedProduct(){
        $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getNewProduct(){
        $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 10";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getSingleProduct($id){
        $query = "SELECT p.*, c.catName, b.brandName 
        FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
        WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = '$id' ";

        $result = $this->db->select($query);
        return $result;

    }
    
    
    public function latestFromApple(){
        $query = "SELECT p.*, b.brandName 
                FROM tbl_product AS p, tbl_brand AS b 
                WHERE p.brandId = '3' AND p.brandId = b.brandId 
                ORDER BY p.productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function latestFromSamsung(){
        $query = "SELECT p.*, b.brandName 
                FROM tbl_product AS p, tbl_brand AS b 
                WHERE p.brandId = '2' AND p.brandId = b.brandId 
                ORDER BY p.productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function latestFromAcer(){
        $query = "SELECT p.*, b.brandName 
                FROM tbl_product AS p, tbl_brand AS b 
                WHERE p.brandId = '1' AND p.brandId = b.brandId 
                ORDER BY p.productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function latestFromCanon(){
        $query = "SELECT p.*, b.brandName 
                FROM tbl_product AS p, tbl_brand AS b 
                WHERE p.brandId = '4' AND p.brandId = b.brandId 
                ORDER BY p.productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    
    
    public function productByCat($id){
        $catId     = mysqli_real_escape_string($this->db->link, $id);
        // $catName   = mysqli_real_escape_string($this->db->link, $id);

        $query  = "SELECT tbl_category.catName, tbl_product.* FROM tbl_product, tbl_category WHERE tbl_product.catId = tbl_category.catId AND tbl_product.catId = '$catId' ";
        $result = $this->db->select($query);
        return $result;
    }


    public function countProductOfCat($id){
        $catId     = mysqli_real_escape_string($this->db->link, $id);

        $query = "SELECT COUNT(productId) AS Total FROM tbl_product WHERE catId = '$catId' ";

        $result = $this->db->select($query);
        return $result;
    }


    public function productByBrand($id){
        $brandId     = mysqli_real_escape_string($this->db->link, $id);
        // $catName   = mysqli_real_escape_string($this->db->link, $id);

        $query  = "SELECT tbl_brand.brandName, tbl_product.* FROM tbl_product, tbl_brand WHERE tbl_product.brandId = tbl_brand.brandId AND tbl_product.brandId = '$brandId' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function countProductOfBrand($id){
        $brandId     = mysqli_real_escape_string($this->db->link, $id);

        $query = "SELECT COUNT(productId) AS Total FROM tbl_product WHERE brandId = '$brandId' ";

        $result = $this->db->select($query);
        return $result;
    }


    
    }

?>