<?PHP
session_start();

include("database.php");
if( !verifyUser($con) ) 
{
	header( "Location: index.php" );
	return false;
}

$id_user = $_SESSION["id_user"];

$height		= (isset($_POST['height'])) ? trim($_POST['height']) : '0';
$weight		= (isset($_POST['weight'])) ? trim($_POST['weight']) : '0';
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
		<a class="w3-right" href="design0.php"><i class="fa fa-times-circle fa-2x"></i></a>
		<div class="w3-padding w3-margin">
		
			<form method="post" action="design2.php" >
				<h3><b>Design Recommendation</b></h3>
				<hr class="w3-clear">
				
				
				<div class="w3-section" >
					<div>Material *</div>
					
					<?PHP if(($height >= 160) && ($weight >= 41)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Cotton" checked required>
						Cotton
						</div>
						
						<div class="w3-col s8">
						Comfortable and breathable,perfect for daily wear and casualoccasions.
						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height >= 160) && ($weight <= 80)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Silk" >
						Silk
						</div>
						
						<div class="w3-col s8">
						Luxurious and elegant, suitable for formal occasions and celebrations such as weddings and festive events.
						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height >= 160) && ($weight >= 41)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Satin">
						Satin
						</div>
						
						<div class="w3-col s8">
						Shiny and smooth, giving a sophisticated look. Ideal for formal events.
						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height >= 160) && ($weight <= 80)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Linen" >
						Linen
						</div>
						
						<div class="w3-col s8">
						 Lightweight and cool, great for hot weather and casual settings.
						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height >= 160) && ($weight >= 40)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Batik" >
						Batik
						</div>
						
						<div class="w3-col s8">
						Colorful and unique patterns, suitable for both casual and formal wear depending on the design.
						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height <= 120) && ($weight <= 80)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Songket" >
						Songket
						</div>
						
						<div class="w3-col s8">
						Traditional handwoven fabric with gold or silver threads, often used for special occasions and cultural events.
						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height <= 120) && ($weight <= 80)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Chiffon" >
						Chiffon
						</div>
						
						<div class="w3-col s8">
						Lightweight and flowy, often used for overlays or in combination with other fabrics for a delicate look.						</div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($height <= 120) && ($weight >= 40)) { ?>
					<div class="w3-row w3-border w3-padding">
						<div class="w3-col s4">
						<input class="w3-radio" type="radio" name="material" value="Polyester" >
						Polyester
						</div>
						
						<div class="w3-col s8">
						Durable and easy to care for, suitable for both casual and semiformal wear
						</div>
					</div>
					<?PHP } ?>
	
					
				</div>
			
				<hr class="w3-clear">	
				<input type="hidden" name="weight" value="<?PHP echo $weight;?>" >
				<input type="hidden" name="height" value="<?PHP echo $height;?>" >
				<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>GET RECOMMENDATION  <I class="fa fa-fw fa-chevron-right"></i></b></button>

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