<?php
	require '../config/config.php';
	

	if($_SESSION['role'] == 'admin'){
		$stmt = $connect->prepare('SELECT count(*) as register_user FROM users');
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_ASSOC);
       

		$stmt = $connect->prepare('SELECT count(*) as total_rent FROM room_rental_registrations');
		$stmt->execute();
		$total_rent = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $connect->prepare('SELECT count(*) as total_rent_apartment FROM room_rental_registrations_apartment');
		$stmt->execute();
		$total_rent_apartment = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent FROM room_rental_registrations WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent_ap FROM room_rental_registrations_apartment WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent_ap = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="shortcut icon" href="/assets/favicon.ico">



<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.topnav-right {
  float: right;
 margin:0 1.5%;
}
.container {
    width: 275px;
    max-width: 275px;
    margin: 1rem;
    padding: 2rem;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
    border-radius: var(--border-radius);
    background: #ffffff;
}
.right {
  background-color: #e5e5e5;
  float: right;
  width: 30%;
  padding: 15px;
  margin-top: 7px;
  text-align: center;
}
.main {
  float: left;
  width: 60%;
  padding: 0 20px;
}
footer {
  text-align: center;
  padding: 3px;
  background-color: DarkSalmon;
  color: white;
}
</style>
</head>
<body>
    <div style="padding-left:16px">
        <h1 align= "center" font-family="monospace">OMKAAR TEMPLE</h1>
        <h4 align= "center" font-family="monospace">Hindu Temple of Fort Wayne</h2>
      </div>
<div class="topnav">
  <a  class="active" href="home.php">Home</a>
    <a  href="mission.php">Mission</a>
    <a  href="priest.php">Priest</a>
    <a  href="services.php">Services</a>
    <a href="calender.php">Calender</a>
    <a href="gallery.php">Gallery</a>
    <a href="donation.php">Donations</a>
    <a  href="education.php">Education</a>
    <a  href="contact.php">Contact</a>
	<?php if($_SESSION['role'] == 'admin'){ 
	
	 echo '<a  href="Register_user.php">Registered Users</a>';
	      	 	} ?>  
	<?php if($_SESSION['role'] == 'priest'){ 
	
	 echo '<a  href="../app/priest_sms.php">Send sms</a>';
	      	 	} ?> 
				<?php if($_SESSION['role'] == 'user'){ 
	
	 echo '<a  href="../auth/appointmentbooking.php">Book Appointment</a>';
	      	 	} ?> 
    <div class="topnav-right">
      <a  href="../auth/login.php">Logout</a>
  </div> 
 
</div>

<br>
<div style="overflow:auto">
<div class="main">
  <h2>main </h2>
  <p>data goes here</p>
</div>

<div class="right">
  <div class="container">
  <h2>Temple Hours</h2>
  <h3><b>Mon-Fri</b></h3>
  <h4>9:30am - 11:00am</h4>
  <h4>5:30am - 8:00pm</h4>
  <h3><b>Sat-Sun</b></h3>
  <h4>9:30am - 12:00am</h4>
  <h4>5:30am - 8:00pm</h4>
  <h4>Abhishekam @6pm</h4>
  <h4>Aarthu @6:30pm</h4>
</div>

  <div class="container">
    <h2>Temple Address</h2>
    <h4>Omkaar Temple 14745 Yellow River Road, Fort Wayne, IN 46818</h4>
    <h4><a href="https://www.google.com/maps/place/Omkaar+Temple/@41.117634,-85.333675,17z/data=!3m1!4b1!4m6!3m5!1s0x8815de98058d4389:0xbacc97d8d7f4dbaa!8m2!3d41.117634!4d-85.333675!16s%2Fg%2F1q5bm99pl">Open in Google Maps</a></h4>
    <h4><a href="https://maps.apple.com/?address=14745%20Yellow%20River%20Rd,%20Fort%20Wayne,%20IN%20%2046818,%20United%20States&auid=18339372791188327544&ll=41.115716,-85.333863&lsp=9902&q=Omkaar%20Temple&_ext=CjIKBQgEEOIBCgQIBRADCgQIBhB9CgQIChAACgQIUhAHCgQIVRAQCgQIWRAGCgUIpAEQARImKbOk7Zo8jkRAMY0arbG/VVXAOTF6E/dij0RAQbOQ1VX8VFXAUAM%3D">Open in Apple Maps</a></h4>
    
  </div>
  <form action="action_page.php">
    <div class="container">
      <h2>Subscribe to our Newsletter</h2>
      <input type="text" placeholder="Name" name="name" required>
      <input type="text" placeholder="Email address" name="mail" required>
      <br>
      <label>
        <input type="checkbox" checked="checked" name="subscribe"> Daily Newsletter
      </label>
   
      <input type="submit" value="Subscribe">
    </div>
  </form>

</div>

</div>

<footer>
  
  <h4> Copyright &copy; : 2022-2024 | Omkaar Temple. All right reserved </h4>
</footer>



   
    
    
  
    
    
    
 






</body>
</html>
