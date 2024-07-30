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
$id_booking	= (isset($_GET['id_booking'])) ? trim($_GET['id_booking']) : '0';

$SQL_list = "SELECT * FROM `booking`,`user` WHERE booking.id_user = user.id_user AND `id_booking` = $id_booking";
$result = mysqli_query($con, $SQL_list) ;
$data	= mysqli_fetch_array($result) ;

$id_booking	= $data["id_booking"];
$name		= $data["name"];
$phone		= $data["phone"];
$category	= $data["category"];
$jenis		= $data["jenis"];
$design		= $data["design"];
$date_pickup= $data["date_pickup"];
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
    body {

        margin: 0;
        padding: 0;
        font-style:normal;font-weight:normal;font-size:11pt;font-family:Poppins;color:#000000
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
        margin: 5mm auto;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 1px grey solid;
        height: 257mm;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: no;
        }
    }
</style>

<body onload="print()">

<div class="book">
    <div class="page">
					<div class="w3-large"><b><?PHP echo $name ;?> (<?PHP echo $phone ;?>)</b></div>
					<div class="w3-padding"></div>
					<table class="w3-table w3-border w3-bordered">
						<tr>
							<td style="width:150px">Pickup Date</td>
							<td><?PHP echo $date_pickup ;?></td>
						</tr>
						<tr>
							<td>Category</td>
							<td><?PHP echo $category ;?></td>
						</tr>
						<tr>
							<td>Design Type</td>
							<td><?PHP echo $jenis ;?></td>
						</tr>
						<tr>	
							<td>Colour</td>
							<td><?PHP echo $data["colour"] ;?></td>
						</tr>
						<tr>	
							<td>Material</td>
							<td><?PHP echo $data["material"] ;?></td>
						</tr>
						<tr>	
							<td>Design</td>
							<td>
								<?PHP if($design) { ?>
									<img src="upload/<?PHP echo $design;?>" class="w3-image" style="max-height:350px;">
								<?PHP }	?>
							</td>
						</tr>
					</table>
					
					<div class="w3-padding"></div>
					<b>Measurement (Inch)</b>
					<div class="w3-row">
						
						<div class="w3-col m6 w3-padding">
						<table class="w3-table w3-table-all">
							<b>[ TOP ]</b>
							<tr>
								<td>Shoulder</td>
								<td><?PHP echo $data["shoulder"] ;?></td>
							</tr>
							
							<tr>
								<td>Sleeve</td>
								<td><?PHP echo $data["sleeve"] ;?></td>
							</tr>
							
							<tr>
								<td>Chest</td>
								<td><?PHP echo $data["chest"] ;?></td>
							</tr>
							
							<tr>
								<td>Length</td>
								<td><?PHP echo $data["length"] ;?></td>
							</tr>											
								
							<?PHP if($category == "Baju Kurung") { ?>
							<tr>
								<td>Waist</td>
								<td><?PHP echo $data["waist"] ;?></td>
							</tr>
							
							<tr>
								<td>Hips</td>
								<td><?PHP echo $data["hip"] ;?></td>
							</tr>
							<?PHP } ?>
	
						</table>
						</div>
						
						<div class="w3-col m6 w3-padding">
						<table class="w3-table w3-table-all">
							<b>[ BOTTOM ]</b>
							<tr>
								<td>Waist</td>
								<td><?PHP echo $data["bwaist"] ;?></td>
							</tr>
							
							<tr>
								<td>Hip</td>
								<td><?PHP echo $data["bhip"] ;?></td>
							</tr>
							
							<tr>
								<td>Length</td>
								<td><?PHP echo $data["blength"] ;?></td>
							</tr>
						</table>
						</div>
					</div>
	
    </div>
</div>	


</body>
</html>