<?php
    include('admin/header.php');
?>

    <h3 align="right" style="margin-right: 50px;"><a href="login.php">Admin Login</a></h3>

    <h1 align="center">Welcome to Student Management System</h1>
    <form action="index.php" method="post">
        <table style="width:30%;" align="center" border="2">
            <tr>
                <td colspan="2" align="center">Student Information</td>
            </tr>
            <tr>
                <td align="left">Choose Standard</td>
                <td>
                    <select name="std" id="">
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                        <option value="6">6th</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="left">Enter Rollno</td>
                <td><input type="text" name="rollno" required></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit" value="Show Details"></td>
            </tr>
        </table>
    </form>



    <?php

        if (isset($_POST['submit'])) {
            include('dbcon.php');
            include('function.php');
                    
            $standard = $_POST['std'];
            $rollno = $_POST['rollno'];

            showDetails($standard, $rollno);

        }
    ?>

</body>
</html>