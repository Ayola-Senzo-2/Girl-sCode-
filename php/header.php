
<header id="header">
    <nav class="navbar navbar-expand-lg nav-bg">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5 menu-title">
                <i class="fas fa-shopping-basket"></i> AllCanteen
            </h3>
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


        <form name=form1 action='' method=GET>


        <?php


        if (isset($_GET['cust_address_id']))   
            $selval=$_GET['cust_address_id'];
        else 
             $selval='%';

        echo "<select name=cust_address_id onchange='form1.submit()'>";
        $result = $db->getCustomerAddress();
        while ($row = mysqli_fetch_assoc($result)){
            if ($selval==$row['cust_address_id']) 
            $selsel=" Selected";
        else 
            $selsel="";
  

    echo "<option  value=".$row['cust_address_id'].$selsel.">".		 $row['cust_address']."</option>";
            
        }

        echo"</select>";


        ?>

        </form>


        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">

            
            <a href="#" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-search"></i> Search     
                    </h5>
                </a>

                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
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


                <a href="#" class="nav-item nav-link active">
                    <h5 class="px-5 cart menu-title">
                    <i class="far fa-user-circle"></i> Profile     
                    </h5>
                </a>

            </div>
        </div>

    </nav>
</header>





