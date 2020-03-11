<?php
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
    }

    if($_SESSION['isAdmin'] == 0) {
        echo 'Not Authorized';
        exit;
    }

    require '../../includes/connect.php';
	
	$query = $pdo->query("SELECT * FROM about");
	if($query) {
		$aboutarticles = $query->fetchAll();
	} 
	

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="add_about.php">Add a new article</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aboutarticles as $article): ?>
                    <tr>
                        <td><?php echo $article['Title']; ?></td>
                        <td><?php echo $article['Content']; ?></td>
                        <td><a href="edit_about.php?id=<?php echo $article['ID']; ?>">Edit</a></td>
                        <td><a href="delete_about.php?id=<?php echo $article['ID']; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>