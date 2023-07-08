<?php
session_start();

if (!isset($_SESSION['userinfo'])) {
    header('Location: index.php');
    exit;
}

// Access user data from session

$arr=json_decode(json_encode($_SESSION['userinfo']), true);
$userId = $arr['id'];
$name = $arr['name'];
$email = $arr['email'];
$pic=$arr['picture'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo $name; ?></h1>
    <p>Email: <a href="<?php echo $email; ?>"><?php echo $email; ?></a></p>
    <p>ID: <?php echo $userId;?></p>
    <p>GPIC: <a href="<?php echo $pic ;?>"><?php echo $pic ;?></a></p>
    <a href="logout.php">Logout</a>
</body>
</html>
