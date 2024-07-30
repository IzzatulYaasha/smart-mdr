<?PHP
session_start();

include("database.php");
if( !verifyUser($con) ) 
{
	header( "Location: index.php" );
	return false;
}

$id_user = $_SESSION["id_user"];
?>
<?PHP	
$act 	= (isset($_POST['act'])) ? trim($_POST['act']) : '';	

$name 		= (isset($_POST['name'])) ? trim($_POST['name']) : '';
$phone		= (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
$gender		= (isset($_POST['gender'])) ? trim($_POST['gender']) : '0';
$email 		= (isset($_POST['email'])) ? trim($_POST['email']) : '';
$phone		= (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
$password 	= (isset($_POST['password'])) ? trim($_POST['password']) : '';

$name	=	mysqli_real_escape_string($con, $name);

$success = "";

if($act == "edit")
{	
	$SQL_update = " UPDATE `user` SET 
						`name` = '$name',
						`phone` = '$phone',
						`gender` = '$gender',
						`password` = '$password'
					WHERE `email` =  '{$_SESSION['email']}'";	
										
	$result = mysqli_query($con, $SQL_update) or die("Error in query: ".$SQL_update."<br />".mysqli_error($con));
	
	$success = "Successfully Updated";
	//print "<script>alert('Successfully Updated');</script>";
}


$SQL_view 	= " SELECT * FROM `user` WHERE `email` =  '{$_SESSION['email']}' ";
$result 	= mysqli_query($con, $SQL_view) or die("Error in query: ".$SQL_view."<br />".mysqli_error($con));
$data		= mysqli_fetch_array($result);
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
a {
  text-decoration: none;
}

body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height imgender header */
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

<?PHP include("menu-user.php"); ?>

<!--- Toast Notification -->
<?PHP 
if($success) { Notify("success", $success, "profile.php"); }
?>	


<div class="" >

	<div class="w3-padding-48"></div>
		
	
<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:500px">
		<div class="w3-padding">
		
			<form method="post" action="" >
				<h3><b>My Profile</b></h3>
				<hr class="w3-clear" style="margin: 10px 0 10px 0">
				<div class="w3-section" >
					Full Name *
					<input class="w3-input w3-border w3-round" type="text" name="name" value="<?PHP echo $data["name"]; ?>" required>
				</div>
			  
				<div class="w3-section">
					Contact No *
					<input class="w3-input w3-border w3-round" type="text" name="phone" value="<?PHP echo $data["phone"]; ?>" required>
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
					<input class="w3-input w3-border w3-round" type="email" name="email" value="<?PHP echo $data["email"]; ?>"  disabled>
				</div>

				<div class="w3-section">
					Password *
					<input class="w3-input w3-border w3-round" type="password" name="password" value="<?PHP echo $data["password"]; ?>" required>
				</div>
				
				<hr class="w3-clear" style="margin: 10px 0 10px 0">
				<input type="hidden" name="act" value="edit" >
				<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>SAVE CHANGES</b></button>

			</form>
		</div>
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