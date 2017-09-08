<?php include('dataconfig.php');
//@ini_set('display_errors',true);
?>
<?php 
$id=$_REQUEST['id'];
$result=$mysqli->query("select * from email_templates where id={$id}");
$result_json=$result->fetch_array(MYSQLI_ASSOC);

// headers for not caching the results
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

// headers to tell that result is JSON
header('Content-type: application/json');

// send the result now
echo json_encode($result_json);