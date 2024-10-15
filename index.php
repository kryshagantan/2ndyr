<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container" style="max-width: 200px; margine: 0 auto;">
        <h2>LOGIN</h2>
        <span style="color: red; font-size: 8px;">
            <?php
            if(isset($_GET['incorrect']))
            {
                echo "Incorrect Username or Password!";
            }
             ?> 
        </span>
        
     <form action="authenticate.php" method="post">
        <input type="text" name="username" id="" placeholder="Enter username" required>
        <br> <br> 
        <input type="text" name="password" id="" placeholder="Enter password" required>
        <br> <br> 
        <input type="submit" value="Login" name="login" style="width: 80%">
     </form>
    </div>
</body>
</html>