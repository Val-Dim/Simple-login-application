<?php
    include("database.php");
?>

<?php
    session_start();

    if(isset($_POST['login'])){
        $login = filter_input(INPUT_POST, "email_or_usr", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT id, username, password FROM users WHERE username = '$login' OR email = '$login'";
        $result = mysqli_query($conn, $sql);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header('Location: home.html');
                exit();
            }
            else{
                echo "Incorrect password";
            }
        }
        else{
            echo "Username or email not found";
        }
    }
    mysqli_close($conn);
?>
