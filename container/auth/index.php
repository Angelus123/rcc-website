<?php
$message="";

// login.php
if(count($_POST)>0) {
    $pdo = require_once 'database.php';
	// $conn = mysqli_connect("localhost","iz","cri11ern","payload");
    // $statement = $pdo->prepare('SELECT * FROM home_card ORDER BY created_date DESC');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE userName = ?");
    $stmt->execute([$_POST['userName']]);
    $user = $stmt->fetch();
    echo $user['password'] . "<br>"; 
$pepper = "pepper";

$pwd = $_POST['password'];

$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
echo  'izere' .$pwd_hashed;


if (password_verify($pwd_peppered, $pwd_hashed)&& $_POST['userName'] == "admin") {
    echo "Password matches.";
   
        header('Location: http://localhost/rcc_rwanda_web/container/');
    }
else if (password_verify($pwd_peppered, $pwd_hashed)){
    header('Location: http://localhost/rcc_rwanda_web');
   
}
else  echo "Password incorrect.";
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
                <td style = "text-align:center" colspan="2">Enter Login Details</td>
                </tr>
                <tr class="tablerow">
                <td>
                <input type="text" name="userName" placeholder="User Name" class="login-input"></td>
                </tr>
                <tr class="tablerow">
                <td>
                <input type="password" name="password" placeholder="Password" class="login-input"></td>
                </tr>
                <tr class="tableheader">
                <td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
    </form>
</body>
</html>
