<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Στοιχεία Τμήματος</title>
</head>
<body>
    <ul>
        <li><a href='index.html'>Αρχική Σελίδα</a></li>
        <li><a href='uni.php?DEPT_ID=<?php echo $_GET['DEPT_ID']; ?>'>Επιστροφή στο μενού Τμήματος</a></li>
    </ul>
    <hr>
<table>
    <tr>
        <th>Department ID</th>
        <th>Name</th>
        <th>Headquarters</th>
        <th>Minimum Semesters</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Website</th>
        <th>Social Media</th>
    </tr>
    <?php
        include 'conn_db.php';

        $DEPT_ID = $_GET['DEPT_ID'];

        $sql = "SELECT * FROM department WHERE DEPT_ID = '$DEPT_ID'";

        $result = $conn->query($sql); 

        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()) {
                $DEPT_ID = $row["DEPT_ID"];
                $DeptName = $row["DeptName"];
                $DeptHeadquarters = $row["DeptHeadquarters"];
                $DeptMinSemesters = $row["DeptMinSemesters"];
                $DeptAddress = $row["DeptAddress"];
                $DeptPhoneNumber = $row["DeptPhoneNumber"];
                $DeptEmail = $row["DeptEmail"];
                $DeptWebsite = $row["DeptWebsite"];
                $DeptSocialMedia = $row["DeptSocialMedia"];
                echo "<tr>";
                echo "<td>$DEPT_ID</td>";
                echo "<td>$DeptName</td>";
                echo "<td>$DeptHeadquarters</td>";
                echo "<td>$DeptMinSemesters</td>";
                echo "<td>$DeptAddress</td>";
                echo "<td>$DeptPhoneNumber</td>";
                echo "<td>$DeptEmail</td>";
                echo "<td>$DeptWebsite</td>";
                echo "<td>$DeptSocialMedia</td>";
                echo "</tr>";
            }
        } else {
            echo "No results found";
        }
        $conn->close();
    ?>
</body>
</html>