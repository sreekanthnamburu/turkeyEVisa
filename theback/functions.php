<?php
/**
 * Created by PhpStorm.
 * User: snamburu
 * Date: 05/09/17
 * Time: 4:56 PM
 */
session_start();
error_reporting(1);
include_once(dirname(__FILE__) . '/dataconfig.php');


if ($_POST['action'] == 'PRICES') {

    $normal = $_POST['normal'];
    $urgent = $_POST['urgent'];
    $immediate = $_POST['immediate'];
    $date = date('Y-m-d H:i:s', time());
    $query1 = mysql_query('SELECT * FROM visa_prices WHERE id=1');
    if (mysql_num_rows($query1) > 0) {
        $query = "UPDATE visa_prices SET normal=" . $normal . ", urgent=" . $urgent . ", immediate=" . $immediate . ", date_modified" . $date . " WHERE id=1";
        $_SESSION['errorMsg'] = '<p style="color:green">Successfully Updated Prices</p>';
    } else {
        $query = "INSERT INTO visa_prices SET normal=" . $normal . ", urgent=" . $urgent . ", immediate=" . $immediate . ", date_modified" . $date;
        $_SESSION['errorMsg'] = '<p style="color:green">Successfully Inserted Prices</p>';
    }
    mysql_query($query);

    header("Location: prices.php");
}