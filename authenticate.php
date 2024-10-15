<?php 
    //include datavase connection file
    include('database/connection.php');
    //Start a session to manage user data
    session_start();
    //Check if the form is submitted using login button.
    if(isset($_POST['login']))
    {
        //Sanitized the username input to prevent sql injection
        $username = $conn->real_escape_string($_POST['username']);
        //Get password (Note: not yet encrypted) 
        $password = $_POST['password'];
        //SQL Query to select username from the database
        $sql_username = "SELECT * FROM users WHERE username='$username'";
        //Execute the query
        $result = $conn->query($sql_username);

        //Check if the query returned any results 
        if($result->num_rows > 0)
        {
            //Fetch all associated records based on username
            $row = $results->fetch_assoc();
            //Verify the provided password against the stored hash password.
            if(password_verify($password,$row['password']))
            {
                //password is correct, set session variables
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];

                //Redirect the user to appropriate dashboard
                if($row['role'] == 'admin')
                {
                    header("Location: admin_dashboard.php");
                }
                else if($row['role'] == 'client')
                {
                    header("Location: client_dashboard.php");
                }
            }
            else
            {
                header("Location: index.php?incorrect");
            }
        }
        else
        {
            header("Location: index.php?incorrect");
        }
    }
    else
    {
        header("location: index.php");
    }



?>
