<?PHP
include("database.php");

$act	= (isset($_POST['act'])) ? trim($_POST['act']) : '';

// Initialize error variable
$error = "";
$success = false;

if($act == "register")
{
	 // Validate and sanitize user inputs (consider using prepared statements)
	$name 	= addslashes($_POST['name']);
	$email 	= addslashes($_POST['email']);
	$password 	= addslashes($_POST['password']);
	$repassword = addslashes($_POST['repassword']);
	$phone		= (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
	$gender		= (isset($_POST['gender'])) ? trim($_POST['gender']) : '';

	$name		=	mysqli_real_escape_string($con, $name);
	$email		=	mysqli_real_escape_string($con, $email);
	$password	=	mysqli_real_escape_string($con, $password);

	 // Check if the email already exists
    $checkUsernameQuery = "SELECT * FROM user WHERE email = '$email'";
    $checkUsernameResult = $con->query($checkUsernameQuery);

    if ($checkUsernameResult->num_rows > 0) {
        $error ="Error: This email has already been registered.";
    }
	
	if($password <> $repassword) {
		$error ="Error: Confirm password not matched";
	}
}

if(($act == "register") && (!$error))
{	
	// Insert New data
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Insert user data into the database
		$insertQuery = " 
		INSERT INTO `user`(`id_user`, `name`, `email`, `password`, `phone`, `gender`) 
				VALUES (NULL, '$name', '$email', '$password', '$phone', '$gender')	
			";	
		
		if ($con->query($insertQuery) === TRUE) {
			$success = true;
        } else {
            // Provide a user-friendly message
            $error = "Registration failed. Please try again later.";
        }
	}
	
	// Free up the result set
    $checkUsernameResult->free_result();
}

// Close the database connection
$con->close();
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

/* Full height image header */
.bgimg-1 {
  background-position: top;
  background-size: cover;
  min-height: 100%;
  background-attachment:fixed;
  background-image: url(images/banner.jpg);
  background-color: rgba(0, 0, 0, 0.1);
  background-blend-mode: overlay;
}

a:link {
  text-decoration: none;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<body class="bgimg-1">

<?PHP include("menu.php"); ?>


<div  >

<div class="w3-padding-48"></div>


<div class="w3-container w3-padding-16" id="contact">
    <div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:500px">
		<div class="w3-padding">
			
<?PHP if($success) { ?>
<div class="w3-panel w3-green w3-display-container w3-animate-zoom">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h3>Success!</h3>
  <p>Your registration was successful! You may now <a href="index.php" class="w3-xlarge">Login.</a> </p>
</div>
<?PHP  } ?>

<?PHP if($error) { ?>
<div class="w3-panel w3-red w3-display-container w3-animate-zoom">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h3>Error!</h3>
  <p><?PHP echo $error;?></p>
</div>
<?PHP  } ?>

<?PHP if(!$success) { ?>	
		
			<form action="" method="post">
			<img src="images/logo-main.png" class="w3-image">
			<hr>
			<h3><b>Registration</b></h3>
			
				<div class="w3-section" >
					Full Name *
					<input class="w3-input w3-border w3-round" type="text" name="name"  required>
				</div>
			  
				<div class="w3-section">
					Contact No *
					<input class="w3-input w3-border w3-round" type="text" name="phone" required>
				</div>
				
				<div class="w3-section">
					Gender *
					<select class="w3-input w3-border w3-round" name="gender" required>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				
				<div class="w3-section" >
					Email *
					<input class="w3-input w3-border w3-round" type="email" name="email"  required>
				</div>
			  
				<div class="w3-section">
					Password *
					<input class="w3-input w3-border w3-round" type="password" name="password" required>
				</div>
				
				<div class="w3-section">
					Confirm Password *
					<input class="w3-input w3-border w3-round" type="password" name="repassword" required>
				</div>
			  
				<input type="hidden" name="act" value="register">
				<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>SUBMIT</b></button>
			</form>
			
<?PHP } ?>
			<div class="w3-center">Already registered? <a href="index.php" class="w3-text-teal"><b>Login here</b></a></div>
			
		</div>
		


    </div>
</div>

<div class="w3-padding-24"></div>

	
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
