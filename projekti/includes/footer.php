<?php
	
	include('connect.php');
	
	$query = $pdo->query("SELECT * FROM services ORDER BY created_date DESC limit 3");
	$services = $query->fetchAll();

	if(isset($_POST['mailsubmit'])) {
		$errorArray = array();
		$error = false;
		
		if(empty($_POST['name'])) {
			array_push($errorArray, 'Name is empty');
			$error = true;
		} else {
			$name = $_POST['name'];
		}
		
		if(empty($_POST['email'])) {
			array_push($errorArray, 'Email is empty');
			$error = true;
		} else {
			$name = $_POST['email'];
		}
		
		if(empty($_POST['message'])) {
			array_push($errorArray, 'Message is empty');
			$error = true;
		} else {
			$name = $_POST['message'];
		}
		
		if(!$error) {
			$sql = 'INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)';
			$query = $pdo->prepare($sql);
			$query->bindParam(':name', $name);
			$query->bindParam(':email', $email);
			$query->bindParam(':message', $message);

			$result = $query->execute();
			$mailmessage = '';
			if($result) {
				$mailmessage = 'Message sent';
				header("Location: ../index.php?mailmessage=$mailmessage");
			} else {
				$mailmessage = 'Message not sent';
				header("Location: ../index.php?mailmessage=$mailmessage");
			}
		} else {
			header("Location: ../index.php?mailmessage=Mbusheni te gjitha format");
		}
		
		
	}

	
	

?>
	<footer>
		<div class="mainfooter group">
			<div class="about">
				<h2>About Us</h2>
				<p>Praesent auctor sodales ultricies. Cras interdum justo et lectus accumsan euismod. Ut et mauris quam. Ut posuere leo eget dolor gravida hendrerit. Donec vel libero eget metus ullamcorper laoreet. <a href="#">Read More</a> </p>
				
				<div class="social">
				<h2>Socially Love</h2>
					<img src="images/footer-icon1.png" alt="icon1" />
					<img src="images/footer-icon2.png" alt="icon2" />
					<img src="images/footer-icon3.png" alt="icon3" />
					<img src="images/footer-icon4.png" alt="icon4" />
					<img src="images/footer-icon5.png" alt="icon5" />
					<img src="images/footer-icon6.png" alt="icon6" />
					<img src="images/footer-icon7.png" alt="icon7" />
					<img src="images/footer-icon8.png" alt="icon8" />
				</div>
			</div> <!--End of about-->

			<div class="recent">
				<h2>Recent Blog</h2>
				
				<?php foreach($services as $service): ?>
				<div>
				<img src="uploads/<?php echo $service['photo']; ?>" width="53" height="48" alt="box1" />
					<p><?php echo $service['title']; ?></p>
				</div>
				<?php endforeach; ?>
<!--
				<div>
					<img src="images/footer-box2.png" alt="box2" />
					<p>Praesent auctor sodales ultricies. Cras interdum justo et lectus</p>
				</div>
				<div>
					<img src="images/footer-box3.png" alt="box3" />
					<p>Praesent auctor sodales ultricies. Cras interdum justo et lectus</p>
				</div>
-->
			</div> <!--End of recent-->

			<div class="form">
				<h2>Contact Us</h2>
				<p style="color: red;"><?php if(isset($_GET['mailmessage'])) { echo $_GET['mailmessage']; } ?></p>
				<form id="form" name="send-email" method="post" action="includes/footer.php">
					
					<input name="name" type="text" minlength="2" class="form-control" placeholder="Your Name" required>
					
					<input name="email" type="email" class="form-control" placeholder="Your Email" required>
					
					<textarea name="messages" class="form-control-txt" placeholder="Message" rows="6" required></textarea>
					
					<input type="submit" class="form-control-sbm" name="mailsubmit" value="SEND MESSAGE">
					
				</form>
				
			</div> <!--End of form-->
			</div> <!--End of mainfooter-->
			<div class="copyright">
			Copyright 2010. Designed by <a href="#"> WebDesignerAid.com</a> 
			</div> <!--End of copyright--> 
		</footer>
		
	<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="js/form-validation.js"></script>