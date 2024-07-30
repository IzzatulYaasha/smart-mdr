<?PHP
session_start();
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

<body>

<?PHP include("menu.php"); ?>


<div class="bgimg-1" >

<div class="w3-padding-32"></div>

<div class="w3-xxlarge w3-center w3-text-white"><b>Contact Us</b></div>

<div class="w3-container w3-padding-16" id="contact">
    <div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:800px">
		<div class="w3-padding">

			<h3><b>Get In Touch </b></h3>
			<p>Question, bug reports, complaints, and compliments- we're here for it all. Our help support team is ready to help you!</p>
			<table class="w3-table" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="150px">Contact : </td>
					<td> 603 1234567</td>
				</tr>
				<tr>
					<td>Email : </td>
					<td>support@smartmdr.com</td>
				</tr>
				<tr>
					<td>Address : </td>
					<td>
					<b>YAASHA SHOP</b><br>
					No.114 Blok 18 Jalan Tupai 20/16<br>
					Seksyen 20,<br>
					40300 Shah Alam Selangor</td>
				</tr>
			</table>
		</div>
    </div>
</div>


<div class="w3-padding-32"></div>
	
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
