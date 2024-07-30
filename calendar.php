<?PHP require_once("database.php"); ?>
<?PHP 
function GetEventX($con, $tarikh)
{
	$SQL_login = " SELECT * FROM `appointment` WHERE `date` = '$tarikh'  ";

	$result = mysqli_query($con, $SQL_login);
	$data	= mysqli_fetch_array($result);
	
	if(mysqli_num_rows($result) > 0) 
	{
		return array($data["id_user"],$data["time"],$data["service"]);
	}else{
		return array('','','');
	}
}
?>
<style>
a {
  text-decoration: none;
}
</style>
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
</style>

<style>
.tooltip {
    display:inline-block;
    position:relative;
    text-align:left;
}

.tooltip .top {
    min-width:180px; 
    top:-10px;
    left:50%;
    transform:translate(-50%, -100%);
    padding:10px 20px;
    color:#444444;
    background-color:#FFFFFF;
    font-weight:normal;
    font-size:14px;
    border-radius:8px;
    position:absolute;
    z-index:99999999;
    box-sizing:border-box;
    border:1px solid #3399CC;box-shadow:0 1px 8px #EEEEEE;
    display:none;
}

.tooltip:hover .top {
    display:block;
}

.tooltip .top i {
    position:absolute;
    top:100%;
    left:50%;
    margin-left:-12px;
    width:24px;
    height:12px;
    overflow:hidden;
}

.tooltip .top i::after {
    content:'';
    position:absolute;
    width:12px;
    height:12px;
    left:50%;
    transform:translate(-50%,-50%) rotate(45deg);
    background-color:#FFFFFF;
    border:1px solid #3399CC;box-shadow:0 1px 8px #EEEEEE;
}
</style>

<?php
	// core
	$monthNames = Array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DIS");

	if (!isset($_REQUEST["month"])) 
		$_REQUEST["month"] = date("n");
	if (!isset($_REQUEST["year"]))  
		$_REQUEST["year"]  = date("Y");

	$cMonth = $_REQUEST["month"];
	$cYear  = $_REQUEST["year"];

	$prev_year = $cYear;
	$next_year = $cYear;

	$prev_month = $cMonth-1;
	$next_month = $cMonth+1;

	if ($prev_month == 0 ) {
		$prev_month = 12;
		$prev_year = $cYear - 1;
	}

	if ($next_month == 13 ) {
		$next_month = 1;
		$next_year = $cYear + 1;
	}

?>
<div id="calendar_div" name="calendar_div">
	<table width="100%">
		<tr align="center">
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50%" align="left">
						<form action="" method="post">
								<input type="hidden" name="month" value="<?PHP echo $prev_month; ?>">
								<input type="hidden" name="year" value="<?PHP echo $prev_year; ?>">
								<button type="submit" class="w3-green w3-button w3-round"><i class="fa fa-w fa-chevron-left"></i> Prev	</button>
						</form>
							<!--
							<a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" class="w3-green w3-button w3-round" >
								<i class="fa fa-w fa-chevron-left" aria-hidden="true"></i> Sebelum
							</a>
							-->
						</td>
						<td width="50%" align="right">
						<form action="" method="post">
								<input type="hidden" name="month" value="<?PHP echo $next_month; ?>">
								<input type="hidden" name="year" value="<?PHP echo $next_year; ?>">
								<button type="submit" class="w3-green w3-button w3-round">Next <i class="fa fa-w fa-chevron-right" aria-hidden="true"></i></button>
						</form>
							<!--
							<a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" class="w3-green w3-button w3-round" >
								Selepas <i class="fa fa-w fa-chevron-right" aria-hidden="true"></i>
							</a>
							-->
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td align="center">
				<table width="100%" class="w3-card w3-round-xlarge" border="1" cellpadding="0" cellspacing="0" bordercolor="#E5E7E9">
					<tr align="center" height="50">
						<td colspan="7" ><h3><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></h3></td>
					</tr>
					<tr height="50" class="w3-blue">
						<td align="center"><strong>SUN</strong></td>
						<td align="center"><strong>MON</strong></td>
						<td align="center"><strong>TUE</strong></td>
						<td align="center"><strong>WED</strong></td>
						<td align="center"><strong>THU</strong></td>
						<td align="center"><strong>FRI</strong></td>
						<td align="center"><strong>SAT</strong></td>
					</tr>

					<?php
						$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
						$maxday    = date("t",$timestamp);
						$thismonth = getdate ($timestamp);
						$startday  = $thismonth['wday'];

						for ($i=0; $i<($maxday+$startday); $i++) {
							if(($i % 7) == 0 ) 
								echo "<tr>\n";
							if($i < $startday) 
								echo "<td></td>\n";
							else {
								$now = ($i - $startday + 1);
								$date =	$cYear . "-" . $cMonth . "-" . $now ;
									
								$event = "";
								
								$SQL_login = " SELECT * FROM `appointment`,`user` WHERE appointment.id_user = user.id_user AND `date` = '$date' ";

								$result = mysqli_query($con, $SQL_login);
								while($data	= mysqli_fetch_array($result))
								{
								
								if(mysqli_num_rows($result) > 0) 
								{

									$id_user 	= $data["id_user"];
									$name 		= $data["name"];
									$time 		= $data["time"];
									$service 	= $data["service"];
									
									$program_st	= substr($service, 0, 15);
									
									$color = "";
									
									$color	= "w3-text-blue";
	
									if($id_user =="")
										$event .= "";
									else {
									$event .= "
					
										<div class='tooltip w3-left  " . $color . "  w3-round '>
										   <i class='fa fa-fw fa-circle fa-lg'></i> 
										  
											<div class='top " . $color . "'>
												<b>" . $name ."</b><br>
												" . $service ."<br>
												Time : " . $time . "
												<i></i>
											</div>
											
											
										</div>
										
										";
									}
								
								} // if
								
								} // while
								
								
								echo "
								
								<td align='right' class='w3-hover-text-white w3-hover-pale-blue' valign='top' height='100px' style='max-width:50px'>
								
								<span class='w3-padding w3-text-grey'>". $now  . "</span>
								<br>
								" . $event . "


								</td>\n

								";
							}
							if(($i % 7) == 6 ) 
								echo "</tr>\n";
						}
					?>
				</table>
			</td>
		</tr>
	</table>
</div>
