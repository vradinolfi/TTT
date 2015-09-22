<? include "base.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Transmute Tournament Tracker</title>
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <header>
        
            <h1>Transmute Tournament Tracker</h1>
            
        </header>
        <main>
            
        <?
        if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
            // let the user access the main page
        ?>
            
            <h1>Member Area</h1>
            
            <p>Thanks for logging in! You are <code><?=$_SESSION['Username']?></code> and your email address is <code><?=$_SESSION['EmailAddress']?></code>.</p>
            
        <?php     
        }

        elseif(!empty($_POST['username']) && !empty($_POST['password'])) {
            // let the user login
            
            $username = mysql_real_escape_string($_POST['username']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            
            $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
            
            if(mysql_num_rows($checklogin) == 1)
            {
                $row = mysql_fetch_array($checklogin);
                $email = $row['EmailAddress'];
                
                $_SESSION['Username'] = $username;
                $_SESSION['EmailAddress'] = $email;
                $_SESSION['LoggedIn'] = 1;
                
                echo "<h1>Success</h1>";
                echo "<p>We are now resirecting you to the member area.</p>";
                echo "<meta http-equiv='refresh' content='=2;index.php' />";
            }
            else
            {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
            }
        }

        else {
            // display the login form
        }

        ?>
            
        </main>
        <footer>
        
        </footer>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>