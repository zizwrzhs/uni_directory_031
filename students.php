<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <title>University Directory</title>
</head>
<body>
<table>
    <tr>
        <th>No</th>
        <th>Student ID</th>
        <th>Department ID</th>
        <th>Professor ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Father Name</th>
        <th>Gender</th>
        <th>Birth Date</th>
        <th>Birth Place</th>
        <th>Citizenship</th>
    </tr>
    <?php
        include 'conn_db.php';
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()) {
                $count++;
                $AM_ID = $row["AM_ID"];
                $DEPT_ID = $row["DEPT_ID"];
                $PROF_ID = $row["PROF_ID"];
                $StudFname = $row["StudFname"];
                $StudMname = $row["StudMname"];
                $StudLname = $row["StudLname"];
                $StudAddress = $row["StudAddress"];
                $StudPhone = $row["StudPhoneNumber"];
                $StudEmail = $row["StudEmail"];
                $StudFatherName = $row["StudFatherName"];
                $StudGender = $row["StudGender"];
                $StudBirthDate = $row["StudBirthDate"];
                $StudBirthPlace = $row["StudBirthPlace"];
                $StudCitizenship = $row["StudCitizenship"];

                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td>$AM_ID</td>";
                echo "<td>$DEPT_ID</td>";
                echo "<td>$PROF_ID</td>";
                echo "<td>$StudFname</td>";
                echo "<td>$StudMname</td>";
                echo "<td>$StudLname</td>";
                echo "<td>$StudAddress</td>";
                echo "<td>$StudPhone</td>";
                echo "<td>$StudEmail</td>";
                echo "<td>$StudFatherName</td>";
                echo "<td>$StudGender</td>";
                echo "<td>$StudBirthDate</td>";
                echo "<td>$StudBirthPlace</td>";
                echo "<td>$StudCitizenship</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }
        $conn->close();
    ?>
</table>
</body>
</html>