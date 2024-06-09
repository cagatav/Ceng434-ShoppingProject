<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENG 434 - About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <style>
        #toastContainer {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php require_once("php/header.php"); ?>

<div id="toastContainer"></div> <!-- Ensure toastContainer is present -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-dark">About Us</h3>
            <p>
                At Shopping Time, we aim to offer the latest and highest quality products to technology enthusiasts. <br>
                Developed as part of the CENG 434 course, this e-commerce platform is designed to provide you with an enjoyable shopping experience for technological gadgets.<br><br>
                We are here to provide our customers with a simple and secure shopping experience. Our goal is to offer the latest trends and cutting-edge technological products at affordable prices, catering to your needs.<br><br>
                At Shopping Time, customer satisfaction is always our top priority. Your satisfaction is our success. If you have any questions or feedback, please feel free to contact us. We are here to assist you.<br><br>
                Thank you,<br><br>  
                The Shopping Time Team<br><br>
                <b class="text-info">190444082 - Ahmet Enes KÜÇÜKMADAN<br>
                190444038 - Enes Çağatay SÖZEN<br></b>
            </p>
        </div>
        <div class="col-md-5">
            <div>
                <iframe
                    src="https://app.livechatai.com/aibot-iframe/cluk9o3tp0001v667bvnwghdb"
                    style="border:10px solid #EAEAEA"
                    width="145%"
                    height="600"
                    overflow:hidden;
                ></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha384-IhTC6+CnKp/wK2RR21iCKuJx1dCnKrAKFozSTaNstzL/4e9akJzvcTXlqDXnJvVj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        var toastMessage = <?php echo json_encode($_SESSION['toast_message'] ?? ''); ?>;
        if (toastMessage) {
            var toastHTML = `
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="toast-header">
                    <strong class="mr-auto">Notification</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    ${toastMessage}
                </div>
            </div>`;
            var toastContainer = document.getElementById('toastContainer');
            toastContainer.innerHTML = toastHTML;
            $('.toast').toast('show');
            <?php unset($_SESSION['toast_message']); ?>
        }
    });
</script>
</body>
</html>
