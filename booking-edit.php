<?PHP
session_start();

include("database.php");
if( !verifyUser($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP	
$id_booking	= (isset($_REQUEST['id_booking'])) ? trim($_REQUEST['id_booking']) : '';	
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	

$category 	= (isset($_POST['category'])) ? trim($_POST['category']) : '';
$colour		= (isset($_POST['colour'])) ? trim($_POST['colour']) : '';
$material	= (isset($_POST['material'])) ? trim($_POST['material']) : '';
$shoulder	= (isset($_POST['shoulder'])) ? trim($_POST['shoulder']) : '';
$sleeve		= (isset($_POST['sleeve'])) ? trim($_POST['sleeve']) : '';
$chest		= (isset($_POST['chest'])) ? trim($_POST['chest']) : '';
$length		= (isset($_POST['length'])) ? trim($_POST['length']) : '';
$waist		= (isset($_POST['waist'])) ? trim($_POST['waist']) : '';
$hip		= (isset($_POST['hip'])) ? trim($_POST['hip']) : '';
$bwaist		= (isset($_POST['bwaist'])) ? trim($_POST['bwaist']) : '';
$bhip		= (isset($_POST['bhip'])) ? trim($_POST['bhip']) : '';
$blength	= (isset($_POST['blength'])) ? trim($_POST['blength']) : '';
$date_pickup= (isset($_POST['date_pickup'])) ? trim($_POST['date_pickup']) : '';

$success = "";

if($act == "edit")
{	
	$SQL_edit = " 
	UPDATE
		`booking`
	SET
		`category` = '$category',
		`colour` = '$colour',
		`material` = '$material',
		`shoulder` = '$shoulder',
		`sleeve` = '$sleeve',
		`chest` = '$chest',
		`length` = '$length',
		`waist` = '$waist',
		`hip` = '$hip',
		`bwaist` = '$bwaist',
		`bhip` = '$bhip',
		`blength` = '$blength',
		`date_pickup` = '$date_pickup'
	WHERE
		`id_booking` = $id_booking
	";	
										
	$result = mysqli_query($con, $SQL_edit) or die("Error in query: ".$SQL_edit."<br />".mysqli_error($con));
	
	// -------- Photo -----------------
	if(isset($_FILES['design'])){
		if($_FILES["design"]["error"] == 4) {
				//means there is no file uploaded
		} else { 

			$file_name = $_FILES['design']['name'];
			$file_size = $_FILES['design']['size'];
			$file_tmp = $_FILES['design']['tmp_name'];
			$file_type = $_FILES['design']['type'];

			$fileNameCmps = explode(".", $file_name);
			$file_ext = strtolower(end($fileNameCmps));
			$new_file	= rand() . "." . $file_ext;

			if(empty($errors)==true) {
				move_uploaded_file($file_tmp,"upload/".$new_file);
			 
				$query = "UPDATE `booking` SET `design`='$new_file' WHERE `id_booking` = '$id_booking'";			
				$result = mysqli_query($con, $query) or die("Error in query: ".$query."<br />".mysqli_error($con));
			}else{
				print_r($errors);
			}  
		  
		}
	}
	// -------- End Photo -----------------
	
	$success = "Successfully Updated";
	//print "<script>alert('Successfully Updated');</script>";
}

if($act == "del_design")
{
	$dat	= mysqli_fetch_array(mysqli_query($con, "SELECT `design` FROM `booking` WHERE `id_booking`= '$id_booking'"));

	unlink("upload/" .$dat['design']);

	$rst_d = mysqli_query( $con, "UPDATE `booking` SET `design`='' WHERE `id_booking` = '$id_booking' " );
	print "<script>self.location='booking-edit.php?id_booking=$id_booking';</script>";
}

$SQL_list = "SELECT * FROM `booking` WHERE id_booking = $id_booking";
$result = mysqli_query($con, $SQL_list) ;
$data	= mysqli_fetch_array($result);
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
if($success) { Notify("success", $success, "booking.php"); }
?>	


<div class="" >

<div class="w3-padding-48"></div>
		
	
<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-containerx w3-white w3-round w3-card" style="max-width:900px">
		<a class="w3-right" href="booking.php"><i class="fa fa-times-circle fa-2x"></i></a>
		<div class="w3-padding w3-margin">
		
			<form method="post" action="" enctype="multipart/form-data" >
			<h3><b>Update Booking</b></h3>
			<hr class="w3-clear" style="margin : 0px 0 0px 0">
			
			<div class="w3-row">
				<div class="w3-col m5 w3-padding">
					<b>Detail</b>
					<div class="w3-section" >
						Category *
						<select class="w3-input w3-border w3-round" name="category" id = "ddlCategpory" onchange = "ShowHideDiv()" required>
							<option value="Baju Melayu" <?PHP if($data["category"] =="Baju Melayu") echo "selected";?>>Baju Melayu</option>
							<option value="Baju Kurung" <?PHP if($data["category"] =="Baju Kurung") echo "selected";?>>Baju Kurung</option>
						</select>
					</div>
					
					<div class="w3-section" >
						Colour *
						<input class="w3-input w3-border w3-round" type="text" name="colour" value="<?PHP echo $data["colour"]; ?>" required>
					</div>
				  
					<div class="w3-section" >
						Material *
						<select class="w3-input w3-border w3-round" name="material" required>
							<option value="Cotton" <?PHP if($data["material"] =="Cotton") echo "selected";?>>Cotton</option>
							<option value="Linen" <?PHP if($data["material"] =="Linen") echo "selected";?>>Linen</option>
							<option value="Wool" <?PHP if($data["material"] =="Wool") echo "selected";?>>Wool</option>
							<option value="Silk" <?PHP if($data["material"] =="Silk") echo "selected";?>>Silk</option>
							<option value="Polyster" <?PHP if($data["material"] =="Polyster") echo "selected";?>>Polyster</option>
							<option value="Nylon" <?PHP if($data["material"] =="Nylon") echo "selected";?>>Nylon</option>
							<option value="Rayon" <?PHP if($data["material"] =="Rayon") echo "selected";?>>Rayon</option>
							<option value="Polyster-Cotton Blend" <?PHP if($data["material"] =="Polyster-Cotton Blend") echo "selected";?>>Polyster-Cotton Blend</option>
							<option value="Wool-Silk Blend" <?PHP if($data["material"] =="Wool-Silk Blend") echo "selected";?>>Wool-Silk Blend</option>
						</select>
					</div>
					
					<div class="w3-section" >
						Upload Design (optional)
						
						<?PHP if($data["design"] =="") { ?>
						<input class="w3-input w3-border w3-round" type="file" name="design" accept=".jpeg, .jpg,.png,.gif, .pdf">						
						<p></p>
						<?PHP } else { ?>										
						<div class="w3-input w3-border w3-round">
						<a class="w3-tag w3-green w3-round" target="_BLANK" href="upload/<?PHP echo $data["design"]; ?>"><small>View</small></a>
						<a class="w3-tag w3-red w3-round" href="?act=del_design&id_booking=<?PHP echo $id_booking;?>"><small>Remove</small></a>						
						</div>
						<?PHP } ?>
					</div>
					
					<div class="w3-section" >
						Date To Collect *
						<input class="w3-input w3-border w3-round" type="date" name="date_pickup" value="<?PHP echo $data["date_pickup"]; ?>" required>
					</div>
					
					<input type="hidden" name="id_booking" value="<?PHP echo $id_booking; ?>" >
					<input type="hidden" name="act" value="edit" >
					<button type="submit" class="w3-button w3-block w3-padding-large w3-teal w3-margin-bottom w3-round"><b>SAVE CHANGES</b></button>
				</div>
				
				
				<div class="w3-col m7 w3-padding">
					<b>Measurement (inch)</b>
					
					<div class="w3-row">
					
					<div class="w3-col m6 w3-border w3-round w3-padding">
						<b>[ TOP ]</b>
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Shoulder *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="shoulder" placeholder="" value="<?PHP echo $data["shoulder"]; ?>" required>
						</div>
						
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Sleeve *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="sleeve" placeholder="" value="<?PHP echo $data["sleeve"]; ?>" required>
						</div>
						
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Chest *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="chest" placeholder="" value="<?PHP echo $data["chest"]; ?>" required>
						</div>
						
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Length *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="length" placeholder="" value="<?PHP echo $data["length"]; ?>" required>
						</div>											
							
						<div id="dvPassport" style="<?PHP if($data["category"] == "Baju Melayu") echo "display: none";?>">
							<div class="w3-section w3-row" >
								<div class="w3-col s6 w3-padding-small">Waist *</div>
								<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="waist" placeholder="" value="<?PHP echo $data["waist"]; ?>" >
							</div>
							
							<div class="w3-section w3-row" >
								<div class="w3-col s6 w3-padding-small">Hips *</div>
								<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="hip" placeholder="" value="<?PHP echo $data["hip"]; ?>" >
							</div>
						</div>
					</div>
					
					<div class="w3-col m6 w3-border w3-round w3-padding">
						<b>[ BOTTOM ]</b>
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Waist *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="bwaist" placeholder="" value="<?PHP echo $data["bwaist"]; ?>" required>
						</div>
						
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Hip *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="bhip" placeholder="" value="<?PHP echo $data["bhip"]; ?>" required>
						</div>
						
						<div class="w3-section w3-row" >
							<div class="w3-col s6 w3-padding-small">Length *</div>
							<input class="w3-col s6 w3-input w3-border w3-round" type="text" name="blength" placeholder=""  value="<?PHP echo $data["blength"]; ?>" required>
						</div>
						
						<a target="_blank" href="images/baju-melayu.jpg"><img src="images/baju-melayu.jpg" width="90px"></a>
						<a target="_blank" href="images/baju-kurung.jpg"><img src="images/baju-kurung.jpg" width="90px"></a>
					</div>
					</div>
					
				</div>
				
				
				<script type="text/javascript">
					function ShowHideDiv() {
						var ddlCategpory = document.getElementById("ddlCategpory");
						var dvPassport = document.getElementById("dvPassport");
						dvPassport.style.display = ddlCategpory.value == "Baju Kurung" ? "block" : "none";
					}
				</script>
				
			</div>
				
			</form>
		</div>
    </div>
</div>


<div class="w3-padding-small"></div>
	
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