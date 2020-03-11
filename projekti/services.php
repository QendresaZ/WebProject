<?php
	include('includes/connect.php');
	
	$query = $pdo->query("SELECT * FROM services");
	$services = $query->fetchAll();
	
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Contact</title>
	<link rel="stylesheet" href="css/main.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css"/>
	

</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="content main">

		<div class="main-content">
			<div class="main">


				<div class="aboutUs">

					<?php foreach($services as $service): ?>
					<img src="uploads/<?php echo $service['photo']; ?>" width="65" height="65">
					<h2><?= $service['title'] ?></h2>
					<p><?= $service['description'] ?></p>
					<?php endforeach; ?>

					
				</div>

			</div>
			<!--End of main-->
		</div>
		<!--End of main content-->

	</div>
	<!--End of content-->
	<div class="blacktop">
		<img src="images/top.png" alt="top">
	</div>

	<?php include('includes/footer.php'); ?>
	<script type="text/javascript">
		$( document ).ready( function () {
			$( '.slider' ).bxSlider();
		} );
	</script>

</body>

</html>