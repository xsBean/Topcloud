<?php require 'Connections/Connections.php'; ?>
<?php 
@session_start();
	//Checks if user is logged in
	if (isset($_SESSION["UserID"])) {
	}
	else {	//Else redirects users to login page
	header ('Location: index.php');
	
	}
 ?>
<?php 
 // PHP code is to diplay items in the account page info 
 $User = $_SESSION['UserID'];
 
 $result=$con->query("SELECT * FROM user WHERE UserID ='$User'");
 $row = $result-> fetch_array(MYSQLI_BOTH);
 
 
 //Fetching data to be called in later
 // Session variables to diplay data
 $_SESSION["UserName"] = $row['UserName'];
 $_SESSION["Course"] = $row['CourseName'];
 $_SESSION["UserLevel"]=$row['UserLevel'];

$UserName = $_SESSION["UserName"];
 ?>


<!--PHP to automatically logout user for being inactive -->
<?php 
@session_start();

//Get the login session time for the user
$_SESSION['session_time'] = time();
//Timeout in seconds
$timeout = 10;
//After logout redirect page
$logout_url="Login.php";
//Convert timeout to minutes
//$timeout = $timeout*60;

if (isset($_SESSION['session_time'])) {
	//Get how long the user has been active
	$_elapsed_time = time()-$_SESSION['session_time'];
	//If inactive for long logout user
	if ($_elapsed_time >=$timeout) {
		session_destroy();
		
		header('Location: $logout_url');
	}

}
$_SESSION['start_time']=time();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cleartype" content="on">

    <link rel="stylesheet" href="css/dashboard.css">
    <script type="text/javascript" src="js/dashboard.js"></script>

    <title>TopCoud Dashboard</title>
  </head>

  <body>
 
    <div class="banner">
      <div class="logo">
        <span></span>
      </div>

     
        <div class="settings-card">
        <a class="settings-icon" onclick="settingsCardToggle('settings-container')"></a>
        <div class="unselected-settings-container" id="settings-container">
          <div class="triangle-holder">
            <img src="css/Images/triangle.png"></img>
          </div>
          <div class="settings-buttons-container">
            <a href="Scripts/Logout_Script.php" style="text-decoration:none" class="settings-button-blue">Logout</a>
            <a href="Settings.php" style="text-decoration:none" class="settings-button-yellow">Settings</a>
              <?php if (($_SESSION['UserLevel']==2) OR ($_SESSION['UserLevel']==3)) {?>
           <a href="Admin.php"  style="background:#C00"  class="settings-button-blue">Admin</a>
           <?php } ?>
            <a class="settings-button-green" onclick="settingsCardToggle('settings-container'); togglePopUp('about-page')">About</a>          </div>
        </div>
      </div>
      <div class="invisible-pop-up" id="about-page">
        <div class="solid-filler"></div>
        <div class="about-container">
          <div class="hr">
            <span class="title">About</span>
            <span class="close-button" onclick="togglePopUp('about-page')">
              <img src="css/Images/plus-icon.png"></img>
            </span>
          </div>
          <div class="left-container">
            <img src="css/Images/logo.png"></img>
          </div>
          <div class="right-container">
            <h1>TopCloud: Cloud-based Computing for Education</h1>
            <p>
              &copy;2015 TopCloud Development Team
              <br />
              <br /><a href="https://github.com/Dylan-Howard/TopCloud" target="_blank">Project Website</a>
              <br />
              <br />Project Manager: Trevor Brown
              <br />Web Development Technical Lead: Dylan Howard
              <br />VM Management Technical Lead: Christopher Goulet
              <br />
              <br />Web Developers:
              <br />Dylan Howard
              <br />Darshan Patel
              <br />Darren Do
              <br />Trevor Brown
              <br />
              <br />VM Management Developers:
              <br />Christopher Goulet
              <br />Saad Ahmad
              <br />Thomas Lackey
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="main-container" role="main">
      <div class="column-container1" id="column-container1">
        <div class="vm-container">
            <!--add javascript to prevent multiple submission -->
          <script type= "text/javascript">
		  function check(link) {
		  if (link.className != "visited") {
			  link.className = "visited";
			  alert("Please do not send multiple submissions");
			  return true;
			  
			  } alert("Request is being processess. Please wait");
			  return false;
		  }
		  </script>
      
          <!-- Call the javascript to check the link -->
          <div class="power-button">
            <a target="_blank"  href="socket.php" onClick="return check(this);"><span></span></a>
          </div>
          <div class="status-bar">
            <p>There are currently <span id="machines-avaliable">#</span> machines avaliable</p>
            <div class="progressbar">
              <div class="fill"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="column-container2" id="column-container2">
        <div class="calendar-container" id="calendar-container">
          <div class="calendar-title">
            <p id="month"></p>
          </div>
          <!-- <span class="calendar-horozontal-line"></span> -->
          <div class="calendar-content" id="calendar-content">
            <ul class="calendar-days-row" id="calendar-days-row">
              <li><div>Sun</div></li>
              <li><div>Mon</div></li>
              <li><div>Tue</div></li>
              <li><div>Wed</div></li>
              <li><div>Thu</div></li>
              <li><div>Fri</div></li>
              <li><div>Sat</div></li>
            </ul>
            <ul class="calendar-row" id="calendar-row1">
              <li><div id="date1">#</div></li>
              <li><div id="date2">#</div></li>
              <li><div id="date3">#</div></li>
              <li><div id="date4">#</div></li>
              <li><div id="date5">#</div></li>
              <li><div id="date6">#</div></li>
              <li><div id="date7">#</div></li>
            </ul>
            <ul class="calendar-row" id="calendar-row2">
              <li><div id="date8">#</div></li>
              <li><div id="date9">#</div></li>
              <li><div id="date10">#</div></li>
              <li><div id="date11">#</div></li>
              <li><div id="date12">#</div></li>
              <li><div id="date13">#</div></li>
              <li><div id="date14">#</div></li>
            </ul>
            <ul class="calendar-row" id="calendar-row3">
              <li><div id="date15">#</div></li>
              <li><div id="date16">#</div></li>
              <li><div id="date17">#</div></li>
              <li><div id="date18">#</div></li>
              <li><div id="date19">#</div></li>
              <li><div id="date20">#</div></li>
              <li><div id="date21">#</div></li>
            </ul>
            <ul class="calendar-row" id="calendar-row4">
              <li><div id="date22">#</div></li>
              <li><div id="date23">#</div></li>
              <li><div id="date24">#</div></li>
              <li><div id="date25">#</div></li>
              <li><div id="date26">#</div></li>
              <li><div id="date27">#</div></li>
              <li><div id="date28">#</div></li>
            </ul>
            <ul class="calendar-row" id="calendar-row5">
              <li><div id="date29">#</div></li>
              <li><div id="date30">#</div></li>
              <li><div id="date31">#</div></li>
              <li><div id="date32">#</div></li>
              <li><div id="date33">#</div></li>
              <li><div id="date34">#</div></li>
              <li><div id="date35">#</div></li>
            </ul>
          </div>
        </div>
        <div class="messenger-container" id="messenger-container">
 <form method ="post">
   
          <div class="messenger-card-top-bar">
              <h1>Contacts</h1>
              <div class="icon"></div>
              <div class="new-message-button" onclick="togglePopUp('message-composer')">
                <img src="css/Images/plus-icon.png"></img>
              </div>
            </div>
            <div class="invisible-pop-up" id="message-composer">
              <div class="composer">
                <div class="solid-filler"></div>
                <div class="hr">
                  <span class="title">New Message</span>
                  <span class="close-button" onclick="togglePopUp('message-composer')">
                    <img src="css/Images/plus-icon.png"></img>
                  </span>
                </div>
          		<script src="js/jQuery.js"></script>
                <!--Use the messageInputScrit to populat user-->
				<script src="js/messageInputScript.js"></script>

                <div class="text-bar">
                <label for="emailDestination"></label>
                <input type="text" list="cloudUsers" id="userToSendMessage" name="inputUsers" placeholder="Recipient"></input>                  
                  <datalist id="cloudUsers">               
                    </datalist>
                                
                </div>
                <div class="text-bar">
                <label for="emailTitle"> </label>
                <input type="text" class="address-bar" id="mesTitle" name="mesTitle" placeholder="Title "/>                
                </div>
                <div class="text-container">
                   <label for="emailContent"> </label>
                  <textarea id="message-textarea" placeholder="Content" name="mesContents"></textarea>
                </div>
                <div class="action-bar">
                 <input name="mesSendButton" type="submit" class="send-button" id="mesSendButton" value="Send"></input>
                  </td>
                  
        
             </span> 
                </div>
			</div>
		</div>
</form>
           <!-- Display Messages function -->
            <div class="messages-container" id="messages-container">
            
<?php
// PHP code is to get info from messages table
 $getMes=$con->query("SELECT * FROM messages WHERE destinationID ='$User' ORDER BY mesTime DESC");
 $count = mysqli_num_rows($getMes);
if($getMes -> num_rows >0)
{
	// create a list of message
	for($i=1; $i < $count + 1;$i++)
	{
	$rowMes = $getMes -> fetch_assoc();
	$senderID= $rowMes['originalID'];
  	$getOriginaID = $con->query("SELECT LName,FName FROM user WHERE userID ='$senderID' ");
  	$getFandLName = $getOriginaID -> fetch_array(MYSQLI_BOTH);

?>
 	<!-- Display Messages function -->
              <div class="closed-messenger-division" id="messenger-division<?php echo $i; ?>">
                <div class="messenger-division-top-bar" onclick="toggleMessengerDivisionExpansion('<?php echo $i; ?>')">
                  <div class="left-container">
                    <div class="closed-drop-button" id="drop-button<?php echo $i; ?>"></div>
                    <h2><?php  echo $getFandLName['FName'] ," ",$getFandLName['LName'] ; ?></h2>
                  </div>
                  <div class="invisible-notification-badge" id="notification-badge<?php echo $i; ?>">
                    <p id="notification-number<?php echo $i; ?>"></p>
                  </div>
                </div>
                <div class="closed-messenger-content" id="content<?php echo $i; ?>">
                  <div class="message-container">
                    <div class="message-title">
                      <p><?php echo " ",$rowMes['mesTitle']?></p>
                    </div>
		    <div class="message-time">
        $
		      <p><?php $mesTime = $rowMes['mesTime'];
          date('F j Y h:ia',$mesTime);
           echo  ;?></p>
                    </div>
                    <div class="message-content">
                      <p><?php echo $rowMes['contents']; ?></p>
                    </div>
                  </div>
                </div>
              </div>          

<?php
	}
}
else{?> 
<div class="no-mail"> <h2>
<?php
  echo "You have no mail.</h2></div>";
  }
?></div>
            
          
                    <div class="FormElement" >
      <?php if(isset($_SESSION['MessageSent'])==true) {?>
      <h3> Message Sent </h3>
      <?php unset($_SESSION['MessageSent']); } ?>   
      
      <?php if(isset($_SESSION['MessageNotSent'])==true) {?> 
      <h3>Message Fail </h3>
      <?php unset($_SESSION['MessageNotSent']); }?>
      </div>
        </div>
      </div>  
 <!-- Display Messages function end -->     

 <!-- Announcements start -->  
      <div class="column-container3" id="column-container3">
        <div class="announcements-container" id="announcements-container">
          <div class="announcements-title">
            <span>Announcements
<!-- Action Announcements composer -->              
<?php  if($_SESSION['UserType'] == 3){?>            
              <div class="new-announcement-button" onclick="togglePopUp('announcements-composer')">
                <img src="css/Images/plus-icon.png"></img>
              </div>
<?php }?>            
            </span>
          </div>
<!-- Display Announcements composer --> 
<?php
if (isset($_POST['antButton']))
{
	//Variables created from class id of Login Form
	$antTitle = $_POST['antTitle'];
	$antContent =$_POST['antContent'];
	$checkAntTitle = false;
	$checkAntContent = false;
	if(!empty($antTitle)){
		$checkAntTitle = true;   		
	}
	if(!empty($antContent)){
		$checkAntContent = true;		
	}
	if($checkAntTitle && $checkAntContent){
		$insertAnt=$con->query("INSERT INTO announcements(professorID,antTitle,antContent) VALUES ('$User','$antTitle','$antContent')");

	}
} 

?>
<form method="POST">
          <div class="invisible-pop-up" id="announcements-composer">
            <div class="composer">
              <div class="solid-filler"></div>
              <div class="hr">
                <span class="title">New Announcement</span>
                <span class="close-button" onclick="togglePopUp('announcements-composer')">
                  <img src="css/Images/plus-icon.png"></img>
                </span>
              </div>
              <div class="text-bar">
                <input type="text" placeholder="Title" name="antTitle"></textarea>
              </div>
              <div class="text-container">
                <textarea id="announcement-textarea" name="antContent"></textarea>
              </div>
              <div class="action-bar">
                <input class="send-button" type="submit" placeholder="Post" name="antButton" id="annButton" value="Post"></input>
        
              </div>
            </div>
          </div>
</form>
          
<!-- Display Announcements -->          
          <div class="announcements-content-container" id="announcements-content-container">
 <?php
// PHP code is to fill info into announcements table
 $getAnn=$con->query("SELECT * FROM announcements ORDER BY antTime DESC");
 $countAnn = mysqli_num_rows($getAnn);
if($countAnn > 0)
{
	// create a list of announcements
	for($i=1; $i < $countAnn + 1;$i++)
	{
	$rowAnn = $getAnn -> fetch_assoc();
?>               
<div class="announcement-division">
              <div class="announcement-division-title">
                <h1><?php echo $rowAnn['antTitle']?></h1>
              </div>
	      <div class="announcement-time">
		<p><?php echo $rowAnn['antTime'];?></p>
	      </div>
              <div class="announcement-division-content">
                <p><?php echo $rowAnn['antContent']; ?></p>
              </div>
</div>
<?php
	}
}
else{?> 
<h1> 
<?php
  echo "You have no announcements";
  }
?></h1            
            ></div>     
          </div>
        </div>
<!-- Display Announcements function end -->   
      </div>
    </div>
  </body>
</html>
 
<!-- Test input messages -->

      <?php 
if (isset($_POST['mesSendButton']))
{
	//Variables created from class id of Login Form
	$inputUsers = $_POST['inputUsers'];
	
	$queryMes=$con->query("SELECT UserID FROM user WHERE UserName ='$inputUsers'");
	$mesArray = $queryMes-> fetch_array(MYSQLI_BOTH);
	if($mesArray != null){
		$desUserID = $mesArray['UserID'];	
		$mesContents =$_POST['mesContents'];
		$mesTitle =$_POST['mesTitle'];
//	echo $User,$desIDInput,$titleEmail,$mesContents;	
		$inputMes=$con->query("INSERT INTO messages(originalID,destinationID,mesTitle,contents) VALUES ('$User','$desUserID','$mesTitle','$mesContents')");
		if($inputMes)
		//If message sent
			$_SESSION['MessageSent']=true;
		}else{
			//if Message not sent
			$_SESSION['MessageNotSent']=true;
		}
} 

?>
  

<!-- End input messages -->    



