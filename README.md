# AllCanteen

Before you can run this website, You need to import the database into your database server. 

database file is at directory 'db/AllCanteen.sql'

To config the database connect open up this file 'php/db.php'

the fill will look like this 

  // class constructor
    public function __construct($dbname = "allcanteen",$servername = "localhost",$username = "root", $password = ""){
      $this->dbname = $dbname;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

          // create connection
        $this->con = mysqli_connect($servername, $username, $password);
	    	mysqli_select_db($this->con,"allcanteen"); // Dabate name can be changed too.
	}
  
  Make changes on the $dbname, $servername, $username, $password


