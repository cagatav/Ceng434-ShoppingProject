<?php
class MySQL
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    public function __construct(
        $dbname = "productdb",
        $tablename = "producttable",
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

        $this->con = mysqli_connect($servername, $username, $password);

        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

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

            // create OrderHistory table if not exists
            /* $sql = "CREATE TABLE IF NOT EXISTS OrderHistory (
                order_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                user_id INT(11) NOT NULL,
                product_id INT(11) NOT NULL,
                order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES Users(user_id),
                FOREIGN KEY (product_id) REFERENCES $tablename(product_id)
            )";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            } */

        }else{
            return false;
        }
    }

    public function executeQuery($sql) {
        return $this->con->query($sql);
    }

    public function getData($sql = null) {
        if ($sql === null) {
            $sql = "SELECT product_id, product_name, product_description, product_price, product_image, product_seller, product_type FROM $this->tablename";
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


    public function addToProductTable($product_name, $product_description, $product_price, $product_image, $product_seller, $product_type) {
        $sql = "INSERT INTO $this->tablename (product_name, product_description, product_price, product_image, product_seller, product_type) 
                VALUES ('$product_name', '$product_description', '$product_price', '$product_image', '$product_seller', '$product_type')";
        if ($this->con->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
            return false;
        }
    }

    public function deleteProduct($productId) {
        $sql = "DELETE FROM $this->tablename WHERE product_id = $productId";
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
        public function getOrders() {
            $sql = "SELECT * FROM productdb.orderhistory";
            $result = $this->con->query($sql);
            return $result;
        }
    }
?>
