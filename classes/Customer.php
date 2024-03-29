<?php
    $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>


<?php

    class Customer{
        private $db;
        private $fm;
    
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function customerRegistration($data)
        {
            $name     = $this->fm->validation($data['name']);
            $name     = mysqli_real_escape_string($this->db->link, $data['name']);
        
            $address  = $this->fm->validation($data['address']);
            $address  = mysqli_real_escape_string($this->db->link, $data['address']);
        
            $city     = $this->fm->validation($data['city']);
            $city     = mysqli_real_escape_string($this->db->link, $data['city']);
        
            $country  = $this->fm->validation($data['country']);
            $country  = mysqli_real_escape_string($this->db->link, $data['country']);
        
            $zip      = $this->fm->validation($data['zip']);
            $zip      = mysqli_real_escape_string($this->db->link, $data['zip']);
        
            $phone    = $this->fm->validation($data['phone']);
            $phone    = mysqli_real_escape_string($this->db->link, $data['phone']);
        
            $email    = $this->fm->validation($data['email']);
            $email    = mysqli_real_escape_string($this->db->link, $data['email']);
        
            $pass     = $this->fm->validation($data['pass']);
            $pass     = mysqli_real_escape_string($this->db->link, md5($data['pass']));


            if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == "" )
            {
                $msg  = "<span class = 'error'> Field must not be empty! </span>";
                return $msg;
            }

            $mailquery = " SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
            $mailchk   = $this->db->select($mailquery);

            if ($mailchk != false) {

                $msg  = "<span class = 'error'> Email already exist! </span>";
                return $msg;
            } 

            $phonequery = " SELECT * FROM tbl_customer WHERE phone = '$phone' LIMIT 1";
            $phonechk   = $this->db->select($phonequery);

            if ($phonechk != false) {

                $msg  = "<span class = 'error'> Phone number already exist! </span>";
                return $msg;
            } 
            
            else {

                $query = "INSERT INTO tbl_customer(name, address, city, country, zip, phone, email, pass) 
                VALUES('$name', '$address', '$city', '$country', '$zip','$phone', '$email', '$pass')";

                $inserted_row = $this->db->insert($query);
               
                if ($inserted_row) {

                    $msg= "<span class = 'success'> Customer data inserted successfully! </span>";
                    return $msg;

                } else {

                    $msg= "<span class = 'error'> Customer data not inserted! </span>";
                    return $msg;

                }
            }


        }
        

        public function customerLogin($data){
            $email    = $this->fm->validation($data['email']);
            $email    = mysqli_real_escape_string($this->db->link, $data['email']);
        
            $pass     = $this->fm->validation($data['pass']);
            $pass     = mysqli_real_escape_string($this->db->link, md5($data['pass']));

            if (empty($email) || empty($pass)) {
                $msg  = "<span class = 'error'> Field must not be empty! </span>";
                return $msg;
            }

            $query = " SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass' ";
            $result   = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("cuslogin", true);
                Session::set("cmrId", $value['id']);
                Session::set("cmrName", $value['name']);
                header("Location:cart.php");
            } else {
                $msg  = "<span class = 'error'> Email or Password not matched! </span>";
                return $msg;
            }

        }




        public function getCustomerData($id){
            $query = "SELECT * FROM tbl_customer WHERE Id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }




        public function customerUpdate($data, $cmrId){

            $name     = $this->fm->validation($data['name']);
            $name     = mysqli_real_escape_string($this->db->link, $data['name']);
        
            $address  = $this->fm->validation($data['address']);
            $address  = mysqli_real_escape_string($this->db->link, $data['address']);
        
            $city     = $this->fm->validation($data['city']);
            $city     = mysqli_real_escape_string($this->db->link, $data['city']);
        
            $country  = $this->fm->validation($data['country']);
            $country  = mysqli_real_escape_string($this->db->link, $data['country']);
        
            $zip      = $this->fm->validation($data['zip']);
            $zip      = mysqli_real_escape_string($this->db->link, $data['zip']);
        
            $phone    = $this->fm->validation($data['phone']);
            $phone    = mysqli_real_escape_string($this->db->link, $data['phone']);
        
            $email    = $this->fm->validation($data['email']);
            $email    = mysqli_real_escape_string($this->db->link, $data['email']);


            if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" )
            {
                $msg  = "<span class = 'error'> Field must not be empty! </span>";
                return $msg;
            } 
            
            else {

                $query = "UPDATE tbl_customer 
                SET 
                name    = '$name' , 
                address = '$address' , 
                city    = '$city' , 
                country = '$country' , 
                zip     = '$zip' ,
                phone   = '$phone' , 
                email   = '$email' 

                WHERE id= '$cmrId' ";

                $updated_row = $this->db->update($query);

                if ($updated_row) {

                    $msg= "<span class = 'success'> Customer Data updated successfully! </span>";
                    return $msg;

                } else {

                    $msg= "<span class = 'error'> Customer Data not updated! </span>";
                    return $msg;

                }
            }

        }
       







    }

?>