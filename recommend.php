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

<div class="" >

	<div class="w3-padding-48"></div>
		
	
<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-containerx w3-white w3-round w3-card" style="max-width:600px">
		<a class="w3-right" href="main.php"><i class="fa fa-times-circle fa-2x"></i></a>
		<div class="w3-padding w3-margin">
		
			<form method="post" action="recommend-done.php" >
				<h3><b>Material Recommendation</b></h3>
				<hr class="w3-clear">
				
				
				<div class="w3-section w3-row" >
					<div>Baju Kurung *</div>
					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bka" >
						<a target="_blank" href="images/bka.jpg"><img src="images/bka.jpg" class="w3-image" style="width:100px"></a>
					</div>
					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bkb" >
						<a target="_blank" href="images/bkb.jpg"><img src="images/bkb.jpg" class="w3-image" style="width:100px"></a>
					</div>
					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bkc" >
						<a target="_blank" href="images/bkc.jpg"><img src="images/bkc.jpg" class="w3-image" style="width:100px"></a>
					</div>
				</div>
				<div class="w3-section w3-row" >				
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bkd" >
						<a target="_blank" href="images/bkd.jpg"><img src="images/bkd.jpg" class="w3-image" style="width:100px"></a>
					</div>
					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bke" >
						<a target="_blank" href="images/bke.jpg"><img src="images/bke.jpg" class="w3-image" style="width:100px"></a>
					</div>
				</div>
				
				<div class="w3-section w3-row" >
					<div>Baju Melayu *</div>
					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bma" >
						<a target="_blank" href="images/bma.jpg"><img src="images/bma.jpg" class="w3-image" style="width:100px"></a>
					</div>
					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bmb" >
						<a target="_blank" href="images/bmb.jpg"><img src="images/bmb.jpg" class="w3-image" style="width:100px"></a>
					</div>
				</div>
				
				<hr>
			  
				<div class="w3-section" >
					Material *
					<select class="w3-input w3-border w3-round" name="material" required>
						<option value="Cotton">Cotton</option>
						<option value="Linen">Linen</option>
						<option value="Wool">Wool</option>
						<option value="Silk">Silk</option>
						<option value="Polyster">Polyster</option>
						<option value="Nylon">Nylon</option>
						<option value="Rayon">Rayon</option>
						<option value="Polyster-Cotton Blend">Polyster-Cotton Blend</option>
						<option value="Wool-Silk Blend">Wool-Silk Blend</option>
					</select>
				</div>
				
				<hr class="w3-clear">
				<button type="submit" class="w3-button w3-block w3-padding-large w3-brown w3-margin-bottom w3-round"><b>GET RECOMMENDATION <I class="fa fa-fw fa-chevron-right"></i></b></button>

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