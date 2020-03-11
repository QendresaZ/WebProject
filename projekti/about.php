<?php
	include('includes/connect.php');
	
	$query = $pdo->query("SELECT * FROM About");
	$about = $query->fetchAll();
	
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
				<div class="slider">
					<div><img src="https://dummyimage.com/600x400/000/fff" alt="Slider Image"/>
					</div>
					<div><img src="https://dummyimage.com/600x400/000/fff" alt="Slider Image"/>
					</div>
				</div>

				<div class="aboutUs">

					<?php foreach($about as $aboutarticle): ?>
					<h2><?= $aboutarticle['Title'] ?></h2>
					<p><?= $aboutarticle['Content'] ?></p>
					<?php endforeach; ?>

					<h2>What We Do?</h2>
					<p>Curabitur convallis massa a dui dignissim, a fringilla ligula dignissim. Praesent id metus quis mi accumsan accumsan. Aenean vel vehicula enim. Duis vitae nunc eu nibh pharetra congue. Vestibulum tristique nisi urna, sed ultricies risus rhoncus et. In posuere turpis eu metus hendrerit volutpat. Vestibulum massa massa, semper ac fermentum id, dapibus at metus. Suspendisse finibus, metus finibus pulvinar placerat, dolor ex ullamcorper lorem, sit amet vulputate nisi nisi sed erat. Nulla et posuere augue, scelerisque pellentesque sapien. Phasellus at viverra velit. In nulla dolor, commodo vitae dolor et, placerat pulvinar mauris. Nunc vel lorem eu elit vehicula finibus. Praesent ullamcorper nibh nec nisl pulvinar, at pellentesque mi iaculis. Nullam sodales ligula id tellus ullamcorper pulvinar. Aliquam sodales metus ut urna tempor pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
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