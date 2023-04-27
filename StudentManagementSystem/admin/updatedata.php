<?php

include('../dbcon.php');

    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['standard'];
    $id = $_POST['sid'];
    $imagename = $_FILES["img"]["name"];
    $tmpimgname = $_FILES["img"]["tmp_name"];

    move_uploaded_file($tmpimgname,"../images/".$imagename);

    $qry = "UPDATE `student` SET `rollno`='$rollno', `name`='$name', `city`='$city', `pcont`='$pcon', `standard`='$std', `image`='$imagename' WHERE `id`=$id";

    $run = mysqli_query($conn, $qry);

    if ($run == true) {
        ?>
        <script>
            alert('Data Updated successfully....');
            window.open('updatefrom.php?sid=<?php echo $id; ?>', '_self');
        </script><?php
    }

?>