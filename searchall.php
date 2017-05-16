<!DOCTYPE HTML>
<html>
<?php session_start(); $page = 'login';?>
<head>
  <title>SEARCH OFFERS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';

require_once 'config.php';
$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

if ($mysqli->connect_errno){
	printf("connect fail: %s\n", $mysqli->connect_error);
	exit();
}



$search  = $_POST['search'];
$nsearch = filter_var($search, FILTER_SANITIZE_STRING);
$arrayinput = explode(" ", $nsearch);
foreach ($arrayinput as $input) {
$sql = "SELECT COUNT(offer.offerID) as search_count FROM offer WHERE offerTitle LIKE '%$input%'OR offerDescription LIKE '%$$input%'OR offerTime LIKE '%$input%'OR offerLocation LIKE '%$input%' ORDER BY offer.offerTime ";
$result = $mysqli -> query($sql);
if(!$result){
  print('<p>error</p>');
  print($mysqli->error);
  exit();
}
while ( $row = $result->fetch_assoc() ){
print ("Search found ".$row['search_count']. " results in Offers")."<br />" ;


if ($row['search_count'] > 0) {
  $sql = "SELECT * FROM offer WHERE offerTitle LIKE '%$input%'OR offerDescription LIKE '%$$input%'OR offerTime LIKE '%$input%'OR offerLocation LIKE '%$input%' ORDER BY offer.offerTime ";

  	$result = $mysqli -> query($sql);
  	if(!$result){
  		print('<p>error</p>');
  		print($mysqli->error);
  		exit();
  	}

  print('<table>');
  print( '<thead><tr></th><th>Offer Title</th><th>Offer Description</th><th>Status</th><th>Time</th><th>Location</th><th>Type</th><th>Timestamp</th></tr></thead>' );
  while ( $row = $result->fetch_assoc() ){
  	print("<tr>");
  	print " <td>{$row[ 'offerTitle' ]} </td>";
  	print " <td>{$row[ 'offerDescription' ]} </td>";
  	print " <td> {$row[ 'offerClosed' ]} </td>";
  	print " <td> {$row[ 'offerTime' ]} </td>";
    print " <td> {$row[ 'offerLocation' ]} </td>";
  	print " <td> {$row[ 'offerType' ]} </td>";
    print " <td> {$row[ 'offerTimeStamp' ]} </td>";

  	print("</tr>");
  }

  print('</table>');
}
}
}

foreach ($arrayinput as $input) {
$sql = "SELECT COUNT(request.requestID) as search_count FROM request WHERE requestTitle LIKE '%$input%'OR requestDescription LIKE '%$$input%'OR requestTime LIKE '%$input%'OR requestLocation LIKE '%$input%' ORDER BY request.requestTime ";
$result = $mysqli -> query($sql);
if(!$result){
  print('<p>error</p>');
  print($mysqli->error);
  exit();
}
while ( $row = $result->fetch_assoc() ){
print ("Search found ".$row['search_count']. " results in Requests")."<br />";

if ($row['search_count'] > 0) {
$sql = "SELECT * FROM request WHERE requestTitle LIKE '%$input%'OR requestDescription LIKE '%$$input%'OR requestTime LIKE '%$input%'OR requestLocation LIKE '%$input%' ORDER BY request.requestTime ";

	$result = $mysqli -> query($sql);
	if(!$result){
		print('<p>error</p>');
		print($mysqli->error);
		exit();
	}

print('<table>');
print( '<thead><tr></th><th>Request Title</th><th>Request Description</th><th>Status</th><th>Time</th><th>Location</th><th>Type</th><th>Timestamp</th></tr></thead>' );
while ( $row = $result->fetch_assoc() ){
	print("<tr>");
	print " <td>{$row[ 'requestTitle' ]} </td>";
	print " <td>{$row[ 'requestDescription' ]} </td>";
	print " <td> {$row[ 'requestClosed' ]} </td>";
	print " <td> {$row[ 'requestTime' ]} </td>";
  print " <td> {$row[ 'requestLocation' ]} </td>";
	print " <td> {$row[ 'requestType' ]} </td>";
  print " <td> {$row[ 'requestTimeStamp' ]} </td>";

	print("</tr>");
}

print('</table>');
}
}
}
foreach ($arrayinput as $input) {
$sql = "SELECT COUNT(users.userID) as search_count FROM users WHERE name LIKE '%$input%'OR userType LIKE '%$$input%'OR gender LIKE '%$input%'OR address LIKE '%$input%' OR language LIKE '%$input%' OR age LIKE '%$input%' ";
$result = $mysqli -> query($sql);
if(!$result){
  print('<p>error</p>');
  print($mysqli->error);
  exit();
}
while ( $row = $result->fetch_assoc() ){
print ("Search found ".$row['search_count']. " results in Users")."<br />";

if ($row['search_count'] > 0) {
$sql = "SELECT * FROM users WHERE name LIKE '%$input%'OR userType LIKE '%$$input%'OR gender LIKE '%$input%'OR address LIKE '%$input%' OR language LIKE '%$input%' OR age LIKE '%$input%' ORDER BY users.userType ";
	$result = $mysqli -> query($sql);
	if(!$result){
		print('<p>error</p>');
		print($mysqli->error);
		exit();
	}

print('<table>');
print( '<thead><tr></th><th>Name</th><th>User Type</th><th>Gender</th><th>Address</th><th> Preffered Language</th><th>Age</th><th>Email</th><th>Phone Number</th></tr></thead>' );
while ( $row = $result->fetch_assoc() ){
	print("<tr>");
	print " <td>{$row[ 'name' ]} </td>";
	print " <td>{$row[ 'userType' ]} </td>";
	print " <td> {$row[ 'gender' ]} </td>";
	print " <td> {$row[ 'address' ]} </td>";
  print " <td> {$row[ 'language' ]} </td>";
	print " <td> {$row[ 'age' ]} </td>";
  print " <td> {$row[ 'email' ]} </td>";
  print " <td> {$row[ 'phone' ]} </td>";
  print " <td class = \"myid\"><img src={$row['pictureURL']} alt='image'></td>";
	print("</tr>");
}

print('</table>');
}
}
}

include 'footer.php';?>
</body>
</html>
