<?php require '../../includes/connect.php'; ?>

<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
}

if($_SESSION['isAdmin'] == 0) {
    echo 'Not Authorized';
    exit;
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $isAdmin = 0;
    if(isset($_POST['isAdmin'])) {
        $isAdmin = 1;
    }
	
	$password = password_hash($password, PASSWORD_BCRYPT);
    $sql = 'INSERT INTO users (name, email, password, isAdmin) VALUES (:name, :email, :password, :isAdmin)';
    $query = $pdo->prepare($sql);
    $query->bindParam('name', $name);
    $query->bindParam('email', $email);
    $query->bindParam('password', $password);
    $query->bindParam('isAdmin', $isAdmin);

    $query->execute();

    //Poashtu mundemi mos mi bo bind parametrat dhe tek metoda execute e bonja pass nje array
    //dhe e ka efektin e njejt
    /*$query->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ]);*/

    header("Location: users.php");
}
?>

<div class="mt-2">
    <div class="container">
        <form action="add_users.php" method="post">
            <input type="text" name="name" placeholder="Enter your name"><br>
            <input type="text" name="email" placeholder="Enter your email"><br>
            <input type="password" name="password" placeholder="Enter your password"><br>
            <input type="checkbox" name="isAdmin">isAdmin<br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>