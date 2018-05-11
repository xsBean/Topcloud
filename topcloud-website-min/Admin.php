<?php require_once('Connections/localhost.php'); ?>
<?php @session_start(); ?>
<?php

//Variable to store user level
$User1=2;
$User2=3;

//Query to run to get user level form databse
$sql =mysql_query("SELECT * FROM user WHERE UserLevel = '{$User1}' OR UserLevel = '{$User2}'");
//Store the user level from the database after query
$UserLevel['UserType'] = $sql['UserLevel'];


//If the user session is of the specified $UserLevel and $User then allow access  
if (($_SESSION['UserType']==$User1) or ($_SESSION['UserType']==$User2)) {
	
	//Dreamweaver Defined
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_POST['DeleteUserHiddenField'])) && ($_POST['DeleteUserHiddenField'] != "")) {
  $deleteSQL = sprintf("DELETE FROM `user` WHERE UserID=%s",
                       GetSQLValueString($_POST['DeleteUserHiddenField'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($deleteSQL, $localhost) or die(mysql_error());

  $deleteGoTo = "Admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_ManageUsers = 50;
$pageNum_ManageUsers = 0;
if (isset($_GET['pageNum_ManageUsers'])) {
  $pageNum_ManageUsers = $_GET['pageNum_ManageUsers'];
}
$startRow_ManageUsers = $pageNum_ManageUsers * $maxRows_ManageUsers;

mysql_select_db($database_localhost, $localhost);
$query_ManageUsers = "SELECT * FROM `user` ORDER BY `Timestamp` DESC";
$query_limit_ManageUsers = sprintf("%s LIMIT %d, %d", $query_ManageUsers, $startRow_ManageUsers, $maxRows_ManageUsers);
$ManageUsers = mysql_query($query_limit_ManageUsers, $localhost) or die(mysql_error());
$row_ManageUsers = mysql_fetch_assoc($ManageUsers);

if (isset($_GET['totalRows_ManageUsers'])) {
  $totalRows_ManageUsers = $_GET['totalRows_ManageUsers'];
} else {
  $all_ManageUsers = mysql_query($query_ManageUsers);
  $totalRows_ManageUsers = mysql_num_rows($all_ManageUsers);
}
$totalPages_ManageUsers = ceil($totalRows_ManageUsers/$maxRows_ManageUsers)-1;

$queryString_ManageUsers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ManageUsers") == false && 
        stristr($param, "totalRows_ManageUsers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ManageUsers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ManageUsers = sprintf("&totalRows_ManageUsers=%d%s", $totalRows_ManageUsers, $queryString_ManageUsers);

$queryString_ManageUsers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ManageUsers") == false && 
        stristr($param, "totalRows_ManageUsers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ManageUsers = "&" . htmlentities(implode("&", $newParams));
  }
}	//End Dreamweaver
$queryString_ManageUsers = sprintf("&totalRows_ManageUsers=%d%s", $totalRows_ManageUsers, $queryString_ManageUsers);
}		//End IF statement of user level check
else {
	//Redirects user to login page
	$_SESSION['NotAdmin'] = true;
header('Location: index.php');
	}	//End Else Statement
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/Master.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel = "stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register</title>
</head>

<body>
<div id="Holder" >
<div id="Header"></div>
<div id="NavBar">
	<nav>
   		 <ul>
   			 <li> <a href="Admin.php">Account</a></li>
           <li> <a href="AdminUpdatePassword.php">Update</a></li>           <li> <a href="Dashboard.php"> Dashboard</a></li>
             <li><a href="Scripts/Logout_Script.php">Logout</a></li>
   		 </ul>
	</nav>
</div>
<div id="Content">
	<div id ="PageHeading">
	  <h1>Admin Control Panel</h1>
	</div>
	<div id ="ContentLeft">
	<?php if (isset($_SESSION['NotAdmin'])==true) { ?>
    <a style="color:#F00" ><h3> User does not have priviliges to upgrade user level. Please contact support </h3></a>
    <?php unset($_SESSION['NotAdmin']); } ?>
	</div>
	<div id="ContentRight">
	  <table width="670" border="0" align="center">
	    <tr>
	      <td align="right" valign="top">Showing &nbsp;<?php echo ($startRow_ManageUsers + 1) ?> to <?php echo min($startRow_ManageUsers + $maxRows_ManageUsers, $totalRows_ManageUsers) ?> of <?php echo $totalRows_ManageUsers ?></td>
        </tr>
	    <tr>
	      <td align="center" valign="top"><?php if ($totalRows_ManageUsers > 0) { // Show if recordset not empty ?>
            <?php do { ?>
	            <table width="500" border="0">
	              <tr>
	                <td> <?php echo $row_ManageUsers['FName']; ?> <?php echo $row_ManageUsers['LName']; ?>| <?php echo $row_ManageUsers['Email']; ?> | <?php echo $row_ManageUsers['CourseName']; ?></td>
                  </tr>
	              <tr>
	                <td><form id="DeleteUserForm" name="DeleteUserForm" method="post" action="">
	                  <input name="DeleteUserHiddenField" type="hidden" id="DeleteUserHiddenField" value="<?php echo $row_ManageUsers['UserID']; ?>" />
	                  <input name="DeleteUserButton" type="submit" class="StyleTxtField" id="DeleteUserButton" value="Delete User" />
                    </form></td>
                  </tr>
	              <tr>
	                <td>&nbsp;</td>
                  </tr>
                </table>
	            <?php } while ($row_ManageUsers = mysql_fetch_assoc($ManageUsers)); ?>
          <?php } // Show if recordset not empty ?></td>
        </tr>
	    <tr>
	      <td align="right" valign="top"><?php if ($pageNum_ManageUsers > 0) { // Show if not first page ?>
	          <a href="<?php printf("%s?pageNum_ManageUsers=%d%s", $currentPage, min($totalPages_ManageUsers, $pageNum_ManageUsers + 1), $queryString_ManageUsers); ?>">Next</a>
	          <?php } // Show if not first page ?>
|
<?php if ($pageNum_ManageUsers > 0) { // Show if not first page ?>
  <a href="<?php printf("%s?pageNum_ManageUsers=%d%s", $currentPage, max(0, $pageNum_ManageUsers - 1), $queryString_ManageUsers); ?>">Previous</a>
  <?php } // Show if not first page ?>          </td>
        </tr>
      </table>
	</div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($ManageUsers);
?>
