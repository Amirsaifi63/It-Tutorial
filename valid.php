<?php
if (isset($_POST['logged_in'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    include "config.php";
    $sql = "SELECT email, password FROM users WHERE email='$email' AND password='$password'";

    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die('query Failed' . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        header('location:index.php');
    } else {
        header('location:login.php');
    }
} else {
    echo "not logged_in";
}
?>
