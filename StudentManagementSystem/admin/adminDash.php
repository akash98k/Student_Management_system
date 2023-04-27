<?php

// session_start();
// if ($_SESSION['uid']) {
//     echo $_SESSION['uid'];
// }
// else {
//     header('location:../login.php');
// }

session_start();
if (isset($_SESSION['uid'])) {
    echo "";
}
else {
    header('location:../login.php');
}

?>
<?php
    include('header.php');
    include('adminDashTitle.php');
?>

<div class="dashboard">
    <table border="1" style="width:50%;" align="center">
        <tr>
            <td>1</td><td><a href="addStudent.php">Insert Student</a></td>
        </tr>
        <tr>
            <td>1</td><td><a href="updateStudent.php">Update Student</a></td>
        </tr>
        <tr>
            <td>1</td><td><a href="deleteStudent.php">Delete Student</a></td>
        </tr>
    </table>
</div>
    
</body>
</html>