<?php 
class db {
	
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $con;
        public $con2;

		

  // class constructor
    public function __construct($dbname = "allcanteen",$servername = "localhost",$username = "root", $password = ""){
      $this->dbname = $dbname;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

          // create connection
        $this->con = mysqli_connect($servername, $username, $password);
		mysqli_select_db($this->con,$this->dbname);

		
		 // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }
		
		
		
	}
	
	 public function getData(){
        $sql = "SELECT food_id, f.canteen_id, c.canteen_id, food_name,food_desc,food_image, food_status, 
        food_price, canteen_name 
        FROM food f, canteen c
        WHERE f.canteen_id = c.canteen_id
        ORDER BY food_id DESC";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }


    public function getCustomerAddress(){

        $sql = "SELECT DISTINCT cust_address_id, c.customer_id, ca.customer_id, cust_address, cust_address_latitude, cust_address_longitude 
        FROM 
        customer_address ca, customer c
        WHERE ca.customer_id = c.customer_id
        AND ca.customer_id = 1";

       //$sql = "SELECT * FROM customer_address WHERE customer_id = 2";

        $result = mysqli_query($this->con,$sql);

        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
	
}
?>