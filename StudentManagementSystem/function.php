<?php

function showDetails($standard, $rollno){
    include('dbcon.php');

            $qry = "SELECT * FROM `student` WHERE `standard` =  '$standard' AND `rollno` = '$rollno'";
            $run = mysqli_query($conn, $qry);

            if (mysqli_num_rows($run)<1) {
                ?>
                <tr>
                    <td><?php echo "No student of roll no '".$rollno."' read in ".$standard."th standard."; ?></td>
                </tr>
                <?php
            }
            else {
                $data = mysqli_fetch_assoc($run);
                ?>
                <table  align="center" width="50%" border="1" style="margin-top:10px; background-color:#dcdcdc">
                    <tr>
                        <th colspan="3" style="background-color:#fff">Student Details</th>
                    </tr>
                    <tr>
                        <td align="center" rowspan="5"><img src="images/<?php echo $data['image']; ?>" style="max-width:150px; max-width:120px;"></td>
                        <th>Roll No</th>
                        <td><?php echo $data['rollno']; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Standard</th>
                        <td><?php echo $data['standard']; ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo $data['city']; ?></td>
                    </tr>
                    <tr align="center">
                        <th>Parent contact No</th>
                        <td><?php echo $data['pcont']; ?></td>
                    </tr>
                </table>
                <?php
            }
}

?>