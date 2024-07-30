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
$id_booking	= (isset($_REQUEST['id_booking'])) ? trim($_REQUEST['id_booking']) : '0';
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	

$status		= (isset($_POST['status'])) ? trim($_POST['status']) : '';
$remark		= (isset($_POST['remark'])) ? trim($_POST['remark']) : '';
$remark		= mysqli_real_escape_string($con, $remark);

$success = "";

if($act == "edit")
{	
	$SQL_update = " 
	UPDATE
		`booking`
	SET
		`status` = '$status',
		`remark` = '$remark'
	WHERE `id_booking` =  '$id_booking'";	
										
	$result = mysqli_query($con, $SQL_update) or die("Error in query: ".$SQL_update."<br />".mysqli_error($con));
	
	$success = "Successfully Update";
}


if($act == "del")
{
	$SQL_delete = " DELETE FROM `booking` WHERE `id_booking` =  '$id_booking' ";
	$result = mysqli_query($con, $SQL_delete);
	
	$success = "Successfully Delete";
	//print "<script>self.location='a-booking.php';</script>";
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

<link href="css/table.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />


<style>
a { text-decoration : none ;}

body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: top;
  background-attachment: fixed;
  background-size: cover;
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

<!--- Toast Notification -->
<?PHP 
if($success) { Notify("success", $success, "a-booking.php"); }
?>	

<div class="" >

	<div class="w3-padding-32"></div>
	
	<div class=" w3-center w3-text-white w3-padding-16">
		<span class="w3-xlarge"><b>BOOKING</b></span><br>
	</div>


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-white w3-card w3-padding">
		
		<div class="w3-row w3-margin ">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>#</th>	
					<th width="25%">Booking Detail</th>
					<th width="35%">Measurement (Inch)</th>
					<th>Date Collect</th>
					<th>Status</th>
					<th width="60px"></th>
				</tr>
			</thead>
			<tbody>
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `booking`,`user` WHERE booking.id_user = user.id_user ";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
				$id_booking	= $data["id_booking"];
				$name		= $data["name"];
				$category	= $data["category"];
				$weight		= $data["weight"];
				$height		= $data["height"];
				$design		= $data["design"];
			?>			
			<tr>
				<td><?PHP echo $bil ;?></td>			
				<td>
					<div class="w3-row">
						<div class="w3-col s4">User</div>
						<div class="w3-col s8"><?PHP echo $name ;?></div>
						
						<div class="w3-col s4">Weight</div>
						<div class="w3-col s8"><?PHP echo $weight ;?> kg</div>
						
						<div class="w3-col s4">Height</div>
						<div class="w3-col s8"><?PHP echo $height ;?> cm</div>
						
						<div class="w3-col s4">Category</div>
						<div class="w3-col s8"><?PHP echo $category ;?></div>
						
						<div class="w3-col s4">Design Type</div>
						<div class="w3-col s8"><?PHP echo $data["jenis"] ;?>&nbsp;</div>
						
						<div class="w3-col s4">Colour</div>
						<div class="w3-col s8"><?PHP echo $data["colour"] ;?></div>
						
						<div class="w3-col s4">Material</div>
						<div class="w3-col s8"><?PHP echo $data["material"] ;?></div>
						
						<div class="w3-col s4">Design</div>
						<div class="w3-col s8">
							<?PHP if($design) { ?>
								<a target="_blank" href="upload/<?PHP echo $design;?>" class="w3-text-blue"><?PHP echo $design;?></a>
							<?PHP }	?>
						</div>
					</div>
				<td>
					
					<div class="w3-row">
					
						<div class="w3-col s5 w3-border-right w3-padding">
							<b>[ TOP ]</b>
							<div class="w3-row" >
								<div class="w3-col s8 ">Shoulder</div>
								<div class="w3-col s4 "><?PHP echo $data["shoulder"] ;?></div>
							</div>
							
							<div class="w3-row" >
								<div class="w3-col s8 ">Sleeve</div>
								<div class="w3-col s4 "><?PHP echo $data["sleeve"] ;?></div>
							</div>
							
							<div class="w3-row" >
								<div class="w3-col s8 ">Chest</div>
								<div class="w3-col s4 "><?PHP echo $data["chest"] ;?></div>
							</div>
							
							<div class="w3-row" >
								<div class="w3-col s8 ">Length</div>
								<div class="w3-col s4 "><?PHP echo $data["length"] ;?></div>
							</div>											
								
							<?PHP if($category == "Baju Kurung") { ?>
							<div class="w3-row" >
								<div class="w3-col s8 ">Waist</div>
								<div class="w3-col s4 "><?PHP echo $data["waist"] ;?></div>
							</div>
							
							<div class="w3-row" >
								<div class="w3-col s8 ">Hips</div>
								<div class="w3-col s4 "><?PHP echo $data["hip"] ;?></div>
							</div>
							<?PHP } ?>
	
						</div>

						<div class="w3-col s5 w3-padding">
							<b>[ BOTTOM ]</b>
							<div class="w3-row" >
								<div class="w3-col s8 ">Waist</div>
								<div class="w3-col s4 "><?PHP echo $data["bwaist"] ;?></div>
							</div>
							
							<div class="w3-row" >
								<div class="w3-col s8 ">Hip</div>
								<div class="w3-col s4 "><?PHP echo $data["bhip"] ;?></div>
							</div>
							
							<div class="w3-row" >
								<div class="w3-col s8 ">Length</div>
								<div class="w3-col s4 "><?PHP echo $data["blength"] ;?></div>
							</div>
						</div>
					</div>									
					
				</td>
				<td><?PHP echo $data["date_pickup"] ;?></td>
				<td><b><?PHP echo $data["status"] ;?></b><br><?PHP echo $data["remark"] ;?></td>

				<td>
				<a href="#" onclick="document.getElementById('idEdit<?PHP echo $bil;?>').style.display='block'" class="w3-button"><i class="fa fa-fw fa-edit fa-lg"></i></a>
				<a target="_blank" href="a-print.php?id_booking=<?PHP echo $id_booking;?>" class="w3-button w3-text-brown"><i class="fa fa-fw fa-print fa-lg"></i></a>
				<a title="Delete" onclick="document.getElementById('idDelete<?PHP echo $bil;?>').style.display='block'" class="w3-button w3-text-red"><i class="fa fa-fw fa-trash-alt fa-lg"></i></a>				
				</td>
			</tr>

<div id="idEdit<?PHP echo $bil; ?>" class="w3-modal" style="z-index:10;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:600px">
      <header class="w3-container "> 
        <span onclick="document.getElementById('idEdit<?PHP echo $bil; ?>').style.display='none'" 
        class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
      </header>

		<div class="w3-container w3-padding">
		
		<form action="" method="post">
			<div class="w3-padding"></div>
			<b class="w3-large">Update Booking</b>
			<hr>

				<div class="w3-section" >
					Status *
					<select class="w3-select w3-border w3-round w3-padding" name="status" required>
						<option value="New" <?PHP if($data["status"] == "New") echo "selected";?>>New</option>
						<option value="Accept" 	<?PHP if($data["status"] == "Accept") echo "selected";?>>Accept</option>
						<option value="Reject" 	<?PHP if($data["status"] == "Reject") echo "selected";?>>Reject</option>
					</select>
				</div>
				
				<div class="w3-section" >
					Remark 
					<input class="w3-input w3-border w3-round" type="text" name="remark" value="<?PHP echo $data["remark"]; ?>">
				</div>

			<hr class="w3-clear">
			<input type="hidden" name="id_booking" value="<?PHP echo $id_booking;?>" >
			<input type="hidden" name="act" value="edit" >
			<button type="submit" class="w3-button w3-brown w3-text-white w3-margin-bottom w3-round">SAVE CHANGES</button>

		</form>
		</div>
	</div>
<div class="w3-padding-24"></div>
</div>

<div id="idDelete<?PHP echo $bil; ?>" class="w3-modal" style="z-index:10;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:500px">
      <header class="w3-container "> 
        <span onclick="document.getElementById('idDelete<?PHP echo $bil; ?>').style.display='none'" 
        class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
      </header>

		<div class="w3-container w3-padding">
		
		<form action="" method="post">
			<div class="w3-padding"></div>
			<b class="w3-large">Confirmation</b>
			  
			<hr class="w3-clear">			
			Are you sure to delete this record ?
			<div class="w3-padding-16"></div>
			
			<input type="hidden" name="id_booking" value="<?PHP echo $id_booking;?>" >
			<input type="hidden" name="act" value="del" >
			<button type="button" onclick="document.getElementById('idDelete<?PHP echo $bil; ?>').style.display='none'"  class="w3-button w3-gray w3-text-white w3-margin-bottom w3-round">CANCEL</button>
			
			<button type="submit" class="w3-right w3-button w3-red w3-text-white w3-margin-bottom w3-round">YES, CONFIRM</button>
		</form>
		</div>
	</div>
</div>				
			<?PHP } ?>
			</tbody>
		</table>
		</div>
		</div>

		
	  <!-- End Grid -->
	  </div>
	  
	<!-- End Page Container -->
	</div>
	
	<div class="w3-padding-24"></div>
	
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!--<script src="assets/demo/datatables-demo.js"></script>-->


<script>
$(document).ready(function() {

  
	$('#dataTable').DataTable( {
		paging: true,
		
		searching: true
	} );
		
	
});
</script>

 
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
