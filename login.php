<style>
    .container {
    max-width: 400px;
    margin: 0 auto;
    padding: 40px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #2d6cde;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #1a4fa7;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
<?php
$connection = mysqli_connect("localhost",'root','','hospital');

if(mysqli_connect_errno()){
    echo "Connection unsuccessful", mysqli_connect_error();
}
if(isset($_POST['username']) && isset($_POST['password'])) {
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connection,"SELECT * FROM login WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query)==1){
    $firstLetter = substr($username, 0, 1);
    if ($firstLetter === 'D') {
        header('Location: doctor/home.php');
        exit;
    } elseif ($firstLetter === 'N') {
        header('Location: nurse/home.php');
        exit;
    } elseif ($firstLetter === 'R') {
        header('Location: reception/home.php');
        exit;
    }
    header('Location: index.php');

}
else{
    echo 'Invalid username or password';
}
}
?>
