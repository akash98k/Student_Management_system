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

<form action="updateStudent.php" method="post">
    <table align="center">
        <tr>
            <th>Enter Standard</th>
            <td><input type="number" name="standard" placeholder="Enter standard" required /></td>
       
            <th>Enter Student Name</th>
            <td><input type="text" name="stuname" placeholder="Enter student name" required /></td>

            <td colspan="2"><input type="submit" name="submit" value="Search"></td>
        </tr>
    </table>
</form>

<table align="center" width="80%" border="1" style="margin-top:10px; background-color:#dcdcdc">

    <tr style="background-color:#fff">
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Edit</th>
    </tr>

    <?php
        if (isset($_POST['submit'])) {
            include('../dbcon.php');

            $std = $_POST['standard'];
            $sname = $_POST['stuname'];

            $qry = "SELECT * FROM `student` WHERE `standard` = '$std' AND `name` LIKE '%$sname%'";
            $run = mysqli_query($conn, $qry);

            if (mysqli_num_rows($run)<1) {
                ?><tr>
                    <th colspan="5">
                    <?php echo "No student named '".$sname."' read in ".$std."th standard."; ?>
                    </th>
                <tr><?php
            }
            else {
                $count = 0;
                while ($data = mysqli_fetch_assoc($run)) {
                    $count++;
                    ?>

                    <tr align="center">
                        <td><?php echo $count; ?></td>
                        <td><img src="../images/<?php echo $data['image']; ?>" style="max-width:100px;"></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['rollno']; ?></td>
                        <td><a href="updatefrom.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
                    </tr>

                    <?php
                }
                $data = mysqli_fetch_assoc($run);

                echo "<pre>";
                print_r($data);
                echo "</pre>";
            }
        }
    ?>

</table>