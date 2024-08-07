<?PHP
session_start();
?>
<?PHP
include("database.php");
$act = (isset($_POST['act'])) ? trim($_POST['act']) : '';

$error = "";
$success = "";

if($act == "reset") 
{
	$email 	= (isset($_POST['email'])) ? trim($_POST['email']) : '';
	$password 	= (isset($_POST['password'])) ? trim($_POST['password']) : '';
	$phone		= (isset($_POST['phone'])) ? trim($_POST['phone']) : '';

	$SQL_login = " SELECT * FROM `user` WHERE `email` = '$email' AND `phone` = '$phone'  ";

	$result = mysqli_query($con, $SQL_login);
	$data	= mysqli_fetch_array($result);

	$valid = mysqli_num_rows($result);

	if($valid > 0)
	{		
		$SQL_update = " 
		UPDATE `user` SET `password` = '$password' WHERE `email` =  '$email' AND `phone` = '$phone'";
		
		$result = mysqli_query($con, $SQL_update);
		
		$success = "Successfully Reset";
	}else{
		$error = "Invalid";
		header( "refresh:1;url=reset.php" );
	}
}
?>
<!DOCTYPE html>
<html>
<title>Smart MDR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

a:link {
  text-decoration: none;
}

/* Full height image header */
.bgimg-1 {
  background-position: top;
  background-size: cover;
  background-attachment:fixed;
  background-image: url(images/banner.jpg);
  min-height:100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<body class="bgimg-1 ">

<?PHP include("menu.php"); ?>


<!--- Toast Notification -->
<?PHP 
if($success) { Notify("success", $success, "index.php"); }
?>	

<div  >

<div class="w3-padding-48"></div>

<div class="w3-container w3-padding-16" id="contact">
    <div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:500px">
		<div class="w3-padding">
			<img src="images/logo-main.png" class="w3-image">
			<hr>
			<h3><b>Reset Password</b></h3>
			
			<form action="" method="post">
			
			<hr style="margin :  0 0 0 0">
			
			<?PHP if($error) { ?>			
			<div class="w3-container w3-padding-32" id="contact">
				<div class="w3-content w3-container w3-red w3-round w3-card" style="max-width:600px">
					<div class="w3-padding w3-center">
					<h3>Error! Invalid login</h3>
					<p>Please try again...</p>
					</div>
				</div>
			</div>
			<?PHP } ?>
			
			
				<div class="w3-section" >
					<label>Email *</label>
					<input class="w3-input w3-border w3-round" type="email" name="email" placeholder="Enter Registered Email" required>
				</div>
				
				<div class="w3-section" >
					<label>Contact No *</label>
					<input class="w3-input w3-border w3-round" type="text" name="phone" placeholder="Enter Registered Phone" required>
				</div>
				
				<div class="w3-section">
					<label>New Password *</label>
					<input class="w3-input w3-border w3-round" type="text" name="password" placeholder="Enter New Password *" required>
				</div>
	
				<input name="act" type="hidden" value="reset">
				<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-round"><b>RESET PASSWORD</b></button>
			</form>
			
		</div>
		
		<div class="w3-center w3-padding">Already registered? <a href="index.php" class="w3-text-teal"><b>Login here</b></a></div>

    </div>
</div>

<div class="w3-padding-16"></div>

	
</div>


 
<script>

// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
