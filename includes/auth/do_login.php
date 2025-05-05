<?php


$db = connectToDB();

$email = $_POST["email"];
$password = $_POST["password"];

// check if inputs are empty
if (empty($email) || empty($password)) {
    echo "All fields are required";
} else {
    // get user by email
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute(["email" => $email]);
    $user = $query->fetch();

    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            header("Location: /pages/dashboard.php");
            exit;
        } else {
            echo "The password provided is incorrect";
        }
    } else {
        echo "The email provided does not exist";
    }
}
