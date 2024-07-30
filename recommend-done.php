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
$baju		= (isset($_POST['baju'])) ? trim($_POST['baju']) : '';
$material	= (isset($_POST['material'])) ? trim($_POST['material']) : '';
$height		= (isset($_POST['height'])) ? trim($_POST['height']) : '0';
$weight		= (isset($_POST['weight'])) ? trim($_POST['weight']) : '0';

if($baju == "bka") {
	$category = "Baju Kurung";
	$jenis = "Baju Kurung Pahang";
	$photo = "bka.jpg";
	$descripton = "Style features a longer and looser top that extends well below the knee. It has a more flared skirt compared to other types, providing a flowing silhouette.";
}

if($baju == "bkb") {
	$category = "Baju Kurung";
	$jenis = "Baju Kurung Moden";
	$photo = "bkb.jpg";
	$descripton = "A modern variation of the traditional design, this style incorporates contemporary fashion elements such as slimmer cuts, various fabrics, and embellishments. ";
}

if($baju == "bkc") {
	$category = "Baju Kurung";
	$jenis = "Baju Kurung Kebaya";
	$photo = "bkc.jpg";
	$descripton = "Contemporary kebaya designs often incorporate modern elements such as zippers, varying lengths, and different cuts to appeal to younger generations while preserving traditional aesthetics.";
}

if($baju == "bkd") {
	$category = "Baju Kurung";
	$jenis = "Baju Kurung Kedah";
	$photo = "bkd.jpg";
	$descripton = "This version is shorter and looser, with the top reaching just below the hips and the sleeves stopping at the wrist or forearm. ";
}

if($baju == "bke") {
	$category = "Baju Kurung";
	$jenis = "Baju Kurung Riau";
	$photo = "bke.jpg";
	$descripton = "Baju Kurung Riau can be worn for various events, from daily wear to formal ceremonies, depending on the fabric and embellishments used. Lighter fabrics and simpler designs are suitable for casual wear, while more ornate versions are reserved for weddings, festivals, and others.";
}

if($baju == "bma") {
	$category = "Baju Melayu";
	$jenis = "Baju Melayu Teluk Belanga";
	$photo = "bma.jpg";
	$descripton = "This traditional style features a simple, round neckline without a collar, often decorated with intricate embroidery. It originated from the Johor region.";
}

if($baju == "bmb") {
	$category = "Baju Melayu";
	$jenis = "Baju Melayu Cekak Musang";
	$photo = "bmb.jpg";
	$descripton = "Distinguished by its standing collar, this type has a more formal appearance. The neckline is similar to that of a mandarin collar and is fastened with buttons.";
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

<div class="" >

	<div class="w3-padding-48"></div>
		
	
<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-containerx w3-white w3-round w3-card" style="max-width:700px">
		<a class="w3-right" href="main.php"><i class="fa fa-times-circle fa-2x"></i></a>
		<div class="w3-padding w3-margin">
		
			<form method="post" action="booking-add.php" >
				<h3><b>Design & Material Recommendation</b></h3>
				<hr class="w3-clear">
							
				<div class="w3-section w3-row" >
					<div class="w3-col s5 w3-padding">
						<img src="images/<?PHP echo $photo;?>" class="w3-image">
					</div>
					
					<div class="w3-col s7 w3-padding">
						<div class="w3-large w3-margin-bottom"><b><?PHP echo $jenis;?></b></div>
						
						<?PHP echo $descripton;?>
					</div>
					
				</div>
				
				<hr>
			  
				<div class="w3-section" >
					Material : <b><?PHP echo $material;?></b>
					
				</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="jenis" value="<?PHP echo $jenis;?>" >
				<input type="hidden" name="category" value="<?PHP echo $category;?>" >
				<input type="hidden" name="material" value="<?PHP echo $material;?>" >
				<input type="hidden" name="weight" value="<?PHP echo $weight;?>" >
				<input type="hidden" name="height" value="<?PHP echo $height;?>" >
				<a href="main.php" class="w3-button w3-padding-large w3-dark-grey w3-margin-bottom w3-round"><b>BACK</b></a>
				<button type="submit" class="w3-button w3-padding-large w3-teal w3-margin-bottom w3-round"><b>PROCEED BOOKING <I class="fa fa-fw fa-chevron-right"></i></b></button>

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