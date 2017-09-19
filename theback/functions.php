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
    $query1 = $mysqli->query('SELECT * FROM visa_prices WHERE id=1');
    if ($query1->num_rows > 0) {
        $query = "UPDATE visa_prices SET normal=" . $normal . ", urgent=" . $urgent . ", immediate=" . $immediate . ", date_modified='" . $date . "' WHERE id=1";
        $_SESSION['errorMsg'] = '<p style="color:green">Successfully Updated Prices</p>';
    } else {
        $query = "INSERT INTO visa_prices SET normal=" . $normal . ", urgent=" . $urgent . ", immediate=" . $immediate . ", date_modified='" . $date."'";
        $_SESSION['errorMsg'] = '<p style="color:green">Successfully Inserted Prices</p>';
    }

    if (!$mysqli->query($query)) {
        $err = $st->errorInfo();
        die("Error in query: $query . " . $mysqli->error);
    }

    header("Location: prices.php");
}

if ($_POST['action'] == 'SEOINFORMATION') {

    $page = $_POST['page'];
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $keywords = addslashes($_POST['keywords']);

    $query1 = $mysqli->query("SELECT * FROM seoinformation WHERE page='".$page."'");
    if ($query1->num_rows > 0) {
        $query = "UPDATE seoinformation SET page='".$page."', title='" . $title . "', description='" . $description . "', keywords='" . $keywords . "' WHERE page='".$page."'";
        $_SESSION['errorMsg'] = '<p style="color:green">Successfully Updated Seo Information for Page: '.$page.'</p>';
    } else {
        $query = "INSERT INTO seoinformation SET page='".$page."',title='" . $title . "', description='" . $description . "', keywords='" . $keywords . "'";
        $_SESSION['errorMsg'] = '<p style="color:green">Successfully Inserted Seo Information for Page: '.$page.'</p>';
    }

    if (!$mysqli->query($query)) {
        $err = $st->errorInfo();
        die("Error in query: $query . " . $mysqli->error);
    }

    header("Location: seoinformation.php");
}