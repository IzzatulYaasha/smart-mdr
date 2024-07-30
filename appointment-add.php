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

$date 		= (isset($_POST['date'])) ? trim($_POST['date']) : '';
$time		= (isset($_POST['time'])) ? trim($_POST['time']) : '';
$service	= (isset($_POST['service'])) ? trim($_POST['service']) : '';

$service	=	mysqli_real_escape_string($con, $service);

$success = "";

if($act == "add")
{	
	$SQL_insert = " 
	INSERT INTO `appointment`(`id_appointment`, `id_user`, `date`, `time`, `service`) 
				VALUES (NULL,'$id_user','$date','$time','$service')
	";	
										
	$result = mysqli_query($con, $SQL_insert) or die("Error in query: ".$SQL_insert."<br />".mysqli_error($con));
	
	$success = "Successfully Submitted";
	//print "<script>alert('Successfully Updated');</script>";
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
if($success) { Notify("success", $success, "appointment.php"); }
?>	


<div class="" >

	<div class="w3-padding-48"></div>
		
	
<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-containerx w3-white w3-round w3-card" style="max-width:500px">
		<a class="w3-right" href="appointment.php"><i class="fa fa-times-circle fa-2x"></i></a>
		<div class="w3-padding w3-margin">
		
			<form method="post" action="" >
				<h3><b>Make Appointment</b></h3>
				<hr class="w3-clear">
				<div class="w3-section" >
					Date *
					<input class="w3-input w3-border w3-round" type="date" name="date" required>
				</div>
			  
				<div class="w3-section">
					Time *
					<input class="w3-input w3-border w3-round" type="time" name="time"  required>
				</div>
				
				<div class="w3-section" >
					Service *
					<textarea class="w3-input w3-border w3-round" name="service" required></textarea>
				</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="act" value="add" >
				<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>SUBMIT</b></button>

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