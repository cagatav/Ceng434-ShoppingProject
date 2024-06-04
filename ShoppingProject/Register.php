<?php
session_start();


function createDatabaseAndTable($host, $username, $password, $dbName, $tableName) {

    $conn = new mysqli($host, $username, $password);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($sqlCreateDB) === FALSE) {
        echo "Error creating database: " . $conn->error;
    }


    $conn->select_db($dbName);


    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    if ($conn->query($sqlCreateTable) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }


    $conn->close();
}


createDatabaseAndTable("localhost", "root", "", "YourDBName", "users");


if (isset($_SESSION['user_id'])) {
    header("Location: Account.php");
    exit;
}


require_once('php/MySQL.php');


$database = new MySQL("YourDBName", "YourTableName");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $database->executeQuery($query);
        if ($result && mysqli_num_rows($result) > 0) {
            $error = "Email is already registered.";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            if ($database->executeQuery($insert_query)) {

                header("Location: login.php");
                exit;
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php require_once("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4 text-dark">Register</h2>
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Register</button>
                </form>
                <p class="text-center mt-3">Already have an account? <a href="login.php" class="text-info">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
