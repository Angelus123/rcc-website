<?php
// register.php
$message ="";
if(count($_POST)>0) {
$pdo = require_once 'database.php';
$pepper = "pepper";
$user_id =$_POST['userId'];
$display_name =$_POST['displayName'];
$pwd = $_POST['password'];
$user_name =$_POST['userName'];
$pwd = $_POST['password'];

echo var_dump($display_name);
echo var_dump($user_id);

$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);

$statement = $pdo->prepare("INSERT INTO users (userId, userName, password, displayName)
VALUES (:userId, :userName, :password, :displayName)");
$statement->bindValue(':userId', $user_id);
$statement->bindValue(':userName', $user_name);
$statement->bindValue(':password', $pwd_hashed);
$statement->bindValue(':displayName', $display_name);
$statement->execute();
header('Location: index.php');
// die();
// INSERT INTO `users` (`userId`, `userName`, `password`, `displayName`) VALUES
// (1, 'admin', 'admin123', 'Admin');
// add_user_to_database($username, $pwd_hashed);

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./asset/image/logo.png" />
    <title>Home|RCC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet"
    href="style.css">
</head>

<body>
    <form name="frmUser" method="post" action="">
        <div class="message"><?php if($message!="") { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
                <tr class="tableheader">
                <td style = "text-align:center" colspan="2">Enter Register Details</td>
                </tr>
                <tr class="tablerow">
                <td>
                <input type="text" name="displayName" placeholder="Full Name" class="login-input"></td>
                </tr>
                <tr class="tablerow">
                <td>
                <input type="text" name="userName" placeholder="User Name" class="login-input"></td>
                </tr>
                <tr class="tablerow">
                <td>
                <input type="text" name="userId" placeholder="ID" class="login-input"></td>
                </tr>
                
                <tr class="tablerow">
                <td>
                <input type="password" name="password" placeholder="Password" class="login-input"></td>
                </tr>
                <tr class="tableheader">
                <td align="center" colspan="2"><button type="submit" name="submit" value="Submit" class="btnSubmit">Sign Up </button></td>
                </tr>
            </table>
    </form>
</body>
</html>