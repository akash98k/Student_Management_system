<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('location:admin/adminDash.php');
}
?>

<?php
    include('admin/header.php');
?>
    
    <h1 align="center">Admin Login</h1>
    
    <form action="login.php" method="post">
        <table align="center" border="1">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>

</body>
</html>

<?php

// include('dbcon.php');

// if (isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password  = $_POST['password'];

//     $qry = "SELECT * FROM `admin` WHERE `username`= '$username' AND `password`= '$password'";
//     $run = mysqli_query($conn, $qry);
//     $row = mysqli_num_rows($run);
//     if ($row < 1) {
//         ?>
<!--//         <script>
//             alert('Username or Password not match !!');
//             window.open('login.php','_self');
//         </script>
//         --><?php
//     }
//     else {
//         $data = mysqli_fetch_assoc($run);
//         $id = $data['id'];

        
//         $_SESSION['uid'] = $id;
//         header('location:admin/adminDash.php');
//     }
// }
include('dbcon.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `admin` WHERE `username`= '$username' AND `password`= '$password'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert('Incorrect Username or Password');
            window.open('login.php', '_self');
        </script>
        <?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];

        $_SESSION['uid'] = $id;
        header('location:admin/adminDash.php');
    }
}



?>