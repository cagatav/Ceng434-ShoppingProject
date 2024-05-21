<?php
session_start();

// If user is already logged in, redirect to account page
if (isset($_SESSION['user_id'])) {
    header("Location: Account.php");
    exit;
}

// Include necessary files
require_once('php/MySQL.php');

// Database connection
$database = new MySQL("YourDBName", "YourTableName");

// Login functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are provided
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // E-posta admin'e ve şifre admin'e eşitse, yönetici paneline yönlendir
        if ($email === "admin@gmail.com" && $password === "admin") {
            $_SESSION['user_id'] = "admin";
            $_SESSION['user_name'] = "Admin";
            $_SESSION['user_email'] = "admin@gmail.com";

            // Yönetici paneline yönlendir
            header("Location: Account.php");
            exit;
        }
        // Query the database to fetch user with provided email
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $database->executeQuery($query);

        // If user exists, verify password
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                
                // Check if user is admin
                if ($row['is_admin'] == 1) {
                    // If admin, redirect to admin panel
                    header("Location: AdminPanel.php");
                    exit;
                } else {
                    // If normal user, redirect to account page
                    header("Location: Account.php");
                    exit;
                }
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Email and password are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once("php/header.php"); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4 text-dark">Login</h2>
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Login</button>
                </form>
                <p class="text-center mt-3">Don't have an account? <a href="register.php" class="text-info">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
