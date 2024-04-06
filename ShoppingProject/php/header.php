<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="Home.php" class="navbar-brand">
            <img src="logo/shopingtime.png" class="ml-3" width="300">
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Home.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Shop.php"><b>Shop</b></a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="Account.php"><b>Account</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.php"><b>About Us</b></a>
                </li>
            </ul>
                <a href="cart.php" class="nav-item nav-link">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                        ?>
                    </h5>
                </a>
            <div>
            </div>
        </div>
    </nav>
</header>