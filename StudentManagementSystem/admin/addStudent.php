<?php

session_start();
if (isset($_SESSION['uid'])) {
    echo "";
}
else {
    hreader("location:../login.php");
}

?>
<?php
    include('header.php');
    include('adminDashTitle.php');
?>

<form action="addStudent.php" method="post" enctype="multipart/form-data">
    <table border="1"  style="width:70%;background-color: #00e5ff; color: #000000; text-align: center;"   align="center">
        <tr>
            <td>Roll No</td>
            <td><input type="text" name="rollno" placeholder="Enter roll no" required></td>
        </tr>
        <tr>
            <td>Full name</td>
            <td><input type="text" name="name" placeholder="Enter Full Name" required></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" name="city" placeholder="Enter City" required></td>
        </tr>
        <tr>
            <td>Parent's Contact no</td>
            <td><input type="text" name="pcon" placeholder="Enter the contact no of parents" required></td>
        </tr>
        <tr>
            <td>Standard</td>
            <td><input type="number" name="standard" placeholder="Enter standard" required></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="img" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>


<?php
if (isset($_POST['submit'])) {

    include('../dbcon.php');

    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['standard'];
    $imagename = $_FILES["img"]["name"];
    $tmpimgname = $_FILES["img"]["tmp_name"];

    move_uploaded_file($tmpimgname,"../images/".$imagename);

    $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$rollno','$name','$city','$pcon','$std', '$imagename')";

    $run = mysqli_query($conn, $qry);

    if ($run == true) {
        ?>
        <script>
            alert('Data inserted successfully....');
        </script><?php
    }
}
?>