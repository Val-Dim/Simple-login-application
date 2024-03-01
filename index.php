<?php
    include("database.php");
?>

<?php
    if(isset($_POST['register'])){
        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($username)){
            echo"Enter a username";
        }
        elseif(empty($password)){
            echo"Enter a password";
        }
        else{
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql= "INSERT INTO users(username,email,password) VALUES('$username','$email','$hash')";
            try{
                mysqli_query($conn,$sql);
                echo"You have been registered";
                header('Location: signup.html?status=success'); 
                exit();
                
            }
            catch(mysqli_sql_exception){
                echo"This username is taken";
            }
        }
    }
    mysqli_close($conn);
?>