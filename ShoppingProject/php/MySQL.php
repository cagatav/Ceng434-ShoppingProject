<?php
class MySQL
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    // class constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = "CREATE TABLE IF NOT EXISTS $tablename
                    (product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name TEXT NOT NULL,
                    product_description TEXT NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR (100),
                    product_seller VARCHAR (25) NOT NULL
                    /*product_type VARCHAR (50) NOT NULL*/
                    );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // Method to execute SQL queries
    public function executeQuery($sql) {
        return $this->con->query($sql);
    }

    // get product from the database
    public function getData($sql = null) {
        if ($sql === null) {
            $sql = "SELECT product_id, product_name, product_description, product_price, product_image, product_seller FROM $this->tablename";
        }
        $result = $this->con->query($sql);
        return $result;
    }

    public function addToOrderHistory($userId, $productId) {
        $sql = "INSERT INTO OrderHistory (user_id, product_id) VALUES ('$userId', '$productId')";
        if ($this->con->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
            return false;
        }
    }

    public function getOrderHistory($userId) {
        $sql = "SELECT * FROM OrderHistory WHERE user_id = $userId";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getFilterOptions() {
        $sql = "SELECT DISTINCT product_type FROM $this->tablename";
        $result = $this->con->query($sql);
        $product_types = array();
        while ($row = $result->fetch_assoc()) {
            $product_types[] = $row['product_type'];
        }
    
        $sql = "SELECT DISTINCT product_seller FROM $this->tablename";
        $result = $this->con->query($sql);
        $product_sellers = array();
        while ($row = $result->fetch_assoc()) {
            $product_sellers[] = $row['product_seller'];
        }
    
        return array(
            'product_types' => $product_types,
            'product_sellers' => $product_sellers
        );
    }
    
}
