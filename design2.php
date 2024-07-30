<?PHP
session_start();

include("database.php");
if( !verifyUser($con) ) 
{
	header( "Location: index.php" );
	return false;
}

$id_user = $_SESSION["id_user"];

$baju		= (isset($_POST['baju'])) ? trim($_POST['baju']) : '';
$material	= (isset($_POST['material'])) ? trim($_POST['material']) : '';
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
		<a class="w3-right" href="design.php"><i class="fa fa-times-circle fa-2x"></i></a>
		<div class="w3-padding w3-margin">
		
			<form method="post" action="recommend-done.php" >
				<h3><b>Design Recommendation</b></h3>
				<hr class="w3-clear">
				
				
				<div class="w3-section w3-row" >
					<div>Baju Kurung *</div>
					
					<?PHP if(($material == "Cotton") OR ($material == "Silk" ) OR ($material == "Satin") OR ($material == "Linen") ){ ?>
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bka" checked>
						<a target="_blank" href="images/bka.jpg"><img src="images/bka.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Pahang </span></div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($material == "Cotton") OR ($material == "Satin")){ ?>
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bkb" >
						<a target="_blank" href="images/bkb.jpg"><img src="images/bkb.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Moden </span></div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($material == "Batik") OR ($material == "Songket")){ ?>
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bkc" >
						<a target="_blank" href="images/bkc.jpg"><img src="images/bkc.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Kebaya </span></div>
					</div>
					<?PHP } ?>
				</div>
				<div class="w3-section w3-row" >									
					<?PHP if(($material == "Cotton") OR ($material == "Chiffon") OR ($material == "Polyester")){ ?>
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bkd"  >
						<a target="_blank" href="images/bkd.jpg"><img src="images/bkd.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Kedah </span></div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($material == "Satin") OR ($material == "Linen")){ ?>
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bke" >
						<a target="_blank" href="images/bke.jpg"><img src="images/bke.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Riau </span></div>
					</div>
					<?PHP } ?>
				</div>
				
				<div class="w3-section w3-row" >
					<div>Baju Melayu *</div>
										
					<?PHP if(($material == "Cotton") OR ($material == "Satin") OR ($material == "Batik") OR ($material == "Songket") OR ($material == "Jacquard") OR ($material == "Crepe")){ ?>					
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bma" >
						<a target="_blank" href="images/bma.jpg"><img src="images/bma.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Teluk Belanga </span></div>
					</div>
					<?PHP } ?>
					
					<?PHP if(($material == "Cotton") OR ($material == "Silk") OR ($material == "Satin") OR ($material == "Linen") OR ($material == "Polyester") OR ($material == "Rayon") OR ($material == "Songket")){ ?>
					<div class="w3-col s4 w3-border w3-padding">
						<input class="w3-radio" type="radio" name="baju" value="bmb" >
						<a target="_blank" href="images/bmb.jpg"><img src="images/bmb.jpg" class="w3-image" style="width:100px"></a>
						<div class="w3-center w3-padding-small"><span class="w3-tag w3-round"> Cekak Musang </span></div>
					</div>
					<?PHP } ?>
				</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="material" value="<?PHP echo $material;?>">
				<input type="hidden" name="weight" value="<?PHP echo $weight;?>" >
				<input type="hidden" name="height" value="<?PHP echo $height;?>" >
				<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>NEXT <I class="fa fa-fw fa-chevron-right"></i></b></button>

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