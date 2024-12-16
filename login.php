<html>
    <head>
        <title>HomeQuest Real Estate</title>
        <link href="style_register.css" rel="stylesheet">
    </head>
    <body>
    <h1>LOGIN</h1>
        <div class="seller_login">
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
                    echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
                }
            
            ?>

            <form method="post" action="seller_login_submit.php">

                <h3>SELLER</h3>
                
                <div class="fields">
                    <input type="text" name="seller_user_id_login" id="seller_user_id_login" placeholder="USERID" required>
                </div> <br>
                <div class="fields">
                    <input type="password" name="seller_password_login" id="seller_password_login" placeholder="PASSWORD" required>
                </div> <br>
                
                <div class="fields">
                    <input type="submit" value="LOGIN">
                </div>

            </form>

        </div>
        <div class="cen">
            <div class="vl_login"></div>
        </div>
        <div class = "buyer_login">

            <form method = "post" action="buyer_login_submit.php">
                <h3>BUYER</h3>

                
                <div class="fields">
                    <input type="text" name="buyer_user_id_login" id="buyer_user_id_login" placeholder="USERID" required>
                </div> <br>

                <div class="fields">
                    <input type="password" name="buyer_password_login" id="buyer_password_login" placeholder="PASSWORD" required>
                </div> <br>
                
                <div class="fields">
                    <input type="submit" value="LOGIN">
                </div>

            </form>


        </div>
        <div class="redirect">
            <h4>Don't have an account? </h4><a href="register.php">SIGNUP</a>
        </div>

    </body>
</html>