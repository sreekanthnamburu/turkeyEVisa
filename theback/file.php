<?php


$upload_dir = "uploads/";

if (isset($_FILES["myfile"])) {
    $no_files = count($_FILES["myfile"]['name']);
    for ($i = 0; $i < $no_files; $i++) {

        if ($_FILES["myfile"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["myfile"]["error"][$i] . "<br>";
        } else {

            move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $upload_dir . $_FILES["myfile"]["name"][$i]);
            echo $_FILES["myfile"]["name"][$i] . "<br>";
			$name=$_FILES["myfile"]["name"][$i] . "<br>";
			$mysqli->query("Update applications Set status = '$status',visapdf='$name',notes='$notes',active='$active'

Where id = $id
        }
    }
    echo " Files Uploaded Successfully!<br>";
}
?>