<?PHP
session_start();
include("database.php");

$act = (isset($_POST['act'])) ? trim($_POST['act']) : '';

// Initialize error variable
$error = "";

if($act == "login") 
{
	// Check if the form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get username and password from the form
		$username 	= addslashes($_POST['username']);
		$password 	= addslashes($_POST['password']);

		// Validate username and password (you can add more validation as needed)
		if (empty($username) || empty($password)) {
			$error = "Both username and password are required.";
		} else {
			// Use prepared statement to prevent SQL injection
			$stmt = $con->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
			$stmt->bind_param("ss", $username, $password);

			// Execute the query
			$stmt->execute();

			// Get the result
			$result = $stmt->get_result();

			// Check if the query returned a row
			if ($result->num_rows > 0) {
				$_SESSION["password"] 	= $password;
				$_SESSION["username"] 	= $username;
			
				// Redirect to the assessment page
				header("Location: a-main.php");			

				exit();
			} else {
				// Invalid credentials, display an error message
				$error = "Invalid username or password";
				header( "refresh:1;url=admin.php" );
			}

			// Close the statement
			$stmt->close();
		}
	}

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
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
  min-height: 100%;
  background-attachment:fixed;
  background-image: url(images/banner.jpg);
  background-color: rgba(0, 0, 0, 0.1);
  background-blend-mode: overlay;
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
			<form action="" method="post">
			<img src="images/logo-main.png" class="w3-image">
			<hr>
			<h3><b>Tailor</b></h3>
			
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
				<label>Username *</label>
				<input class="w3-input w3-border w3-round" type="text" name="username"  required>
			  </div>
			  <div class="w3-section">
				<label>Password *</label>
				<input class="w3-input w3-border w3-round" type="password" name="password" required>
			  </div>
	
			  <input name="act" type="hidden" value="login">
			  <button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>LOGIN</b></button>
			</form>
			
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
