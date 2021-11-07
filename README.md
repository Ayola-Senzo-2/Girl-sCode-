# AllCanteen

Before you can run this website, You need to import the database into your database server. 

database file is at directory 'db/AllCanteen.sql'

To config the database connect open up this file 'php/db.php'

the fill will look like this 

```
 class db {
	
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $con;
		
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
}
```
  
  Make changes on the $dbname, $servername, $username, $password


