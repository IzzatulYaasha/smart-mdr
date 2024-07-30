<?PHP
session_start();

include("database.php");
if( !verifyAdmin($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP	
$SQL_view 	= " SELECT * FROM `admin` WHERE `username` =  '". $_SESSION["username"] ."'";
$result 	= mysqli_query($con, $SQL_view);
$data		= mysqli_fetch_array($result);

$today = date("Y-m-d");

$tot_user		= numRows($con, "SELECT * FROM `user`");
$tot_booking	= numRows($con, "SELECT * FROM `booking`");
$tot_new		= numRows($con, "SELECT * FROM `booking` WHERE `status` = 'New' ");
$tot_appointment= numRows($con, "SELECT * FROM `appointment`");
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
  background-attachment: fixed;
  background-image: url("images/banner.jpg");
  background-color: rgba(0, 0, 0, 0.1);
  background-blend-mode: overlay;
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<body class="bgimg-1">

<?PHP include("menu-admin.php"); ?>


<div class="" >

	<div class="w3-padding-32"></div>
	
	<div class=" w3-center w3-text-white w3-padding-16">
		<span class="w3-xlarge"><b>DASHBOARD</b></span><br>
	</div>


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1200px;">    
	  <!-- The Grid -->
	  <div class="w3-row">
	  

		<div class="w3-paddingx w3-padding-16x">
			<div class="w3-card w3-padding w3-round w3-white">
				<div class="w3-xlarge w3-padding-24 w3-padding" >
					<div class="w3-padding">Welcome, Admin</div>
				</div>
				
				<div class="w3-row w3-padding-24">
					
					<div class="w3-col m3 w3-container">
						<div class=" w3-card w3-teal w3-round w3-padding-16">
							<div class="w3-container w3-large">
								User <i class="fa fa-user fa-lg w3-right"></i> 
								<hr style="border-top: 1px dashed; margin: 1px 0 15px !important;">
								<h2 class="w3-center"><?PHP echo $tot_user;?></h2>
							</div>
						</div>
					</div>
					
					<div class="w3-col m3 w3-container">
						<div class=" w3-card w3-red w3-round w3-padding-16">
							<div class="w3-container w3-large">
								New Booking <i class="fa fa-tasks fa-lg w3-right"></i> 
								<hr style="border-top: 1px dashed; margin: 1px 0 15px !important;">
								<h2 class="w3-center"><?PHP echo $tot_new;?></h2>
							</div>
						</div>
					</div>
					
					<div class="w3-col m3 w3-container">
						<div class=" w3-card w3-teal w3-round w3-padding-16">
							<div class="w3-container w3-large">
								All Booking <i class="fa fa-tasks fa-lg w3-right"></i> 
								<hr style="border-top: 1px dashed; margin: 1px 0 15px !important;">
								<h2 class="w3-center"><?PHP echo $tot_booking;?></h2>
							</div>
						</div>
					</div>
		
					
					<div class="w3-col m3 w3-container">
						<div class=" w3-card w3-teal w3-round w3-padding-16">
							<div class="w3-container w3-large">
								All Appointment <i class="fa fa-calendar-check fa-lg w3-right"></i> 
								<hr style="border-top: 1px dashed; margin: 1px 0 15px !important;">
								<h2 class="w3-center"><?PHP echo $tot_appointment;?></h2>
							</div>
						</div>
					</div>
					
					
						
				</div>
		  </div>
		</div>
			  

		
	  <!-- End Grid -->
	  </div>
	  
	<!-- End Page Container -->
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
