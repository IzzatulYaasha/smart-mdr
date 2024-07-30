<!-- Navbar (sit on top) -->
<div class="w3-top" style="z-index=0">
  <div class="w3-bar w3-teal w3-card" id="myNavbar">
    &nbsp;<a href="main.php"><img src="images/logo.png" height="55"></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="main.php" class="w3-bar-item1 w3-button">DASHBOARD</a>
	  <a href="booking.php" class="w3-bar-item1 w3-button"> BOOKING</a>
	  <a href="appointment.php" class="w3-bar-item1 w3-button"> APPOINTMENT</a>
	  <a href="profile.php" class="w3-bar-item1 w3-button"> PROFILE</a>
	  <a href="logout.php" class="w3-padding w3-round-xlarge w3-border w3-border-white w3-white w3-bar-item1 w3-button"><i class="fa fa-fw fa-lg fa-power-off"></i>   LOGOUT</a>
	  &nbsp;
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-teal w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="main.php" onclick="w3_close()" class="w3-bar-item w3-button">DASHBOARD</a>
  <a href="booking.php" onclick="w3_close()" class="w3-bar-item w3-button">BOOKING</a>  
  <a href="appointment.php" onclick="w3_close()" class="w3-bar-item w3-button">APPOINTMENT</a>
  <a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button">PROFILE</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGOUT</a>
</nav>