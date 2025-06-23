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
        <th>Professor ID</th>
        <th>Department ID</th>
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
        <th>Speciality</th>
        <th>Rank</th>
        <th>Subject Area</th>
    </tr>
    <?php
        include 'conn_db.php';

        $DEPT_ID = $_GET['DEPT_ID'];
        $type = $_GET['type'];

        switch($type){
            case 'all':
                $sql = "SELECT * FROM professor p WHERE DEPT_ID = '$DEPT_ID'";
                break; 
            case 'prof':
                $sql = "SELECT * FROM professor p WHERE DEPT_ID = '$DEPT_ID' AND  ProfRank = 'Professor'";
                break;
            case 'assoc':    
                $sql = "SELECT * FROM professor p WHERE DEPT_ID = '$DEPT_ID' AND  ProfRank = 'Associate Professor'";
                break;
            case 'assis':
                $sql = "SELECT * FROM professor p WHERE DEPT_ID = '$DEPT_ID' AND  ProfRank = 'Assistant Professor'";
                break;
            default:
                echo "Invalid Type";
                exit;
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()) {
                $count++;
                $PROF_ID = $row["PROF_ID"];
                $DEPT_ID = $row["DEPT_ID"];
                $ProfFname = $row["ProfFname"];
                $ProfMname = $row["ProfMname"];
                $ProfLname = $row["ProfLname"];
                $ProfAddress = $row["ProfAddress"];
                $ProfPhoneNumber = $row["ProfPhoneNumber"];
                $ProfEmail = $row["ProfEmail"];
                $ProfFatherName = $row["ProfFatherName"];
                $ProfGender = $row["ProfGender"];
                $ProfBirthDate = $row["ProfBirthDate"];
                $ProfBirthPlace = $row["ProfBirthPlace"];
                $ProfCitizenship = $row["ProfCitizenship"];
                $ProfSpeciality = $row["ProfSpeciality"];
                $ProfRank = $row["ProfRank"];
                $ProfSubjectArea = $row["ProfSubjectArea"];
                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td>$PROF_ID</td>";
                echo "<td>$DEPT_ID</td>";
                echo "<td>$ProfFname</td>";
                echo "<td>$ProfMname</td>";
                echo "<td>$ProfLname</td>";
                echo "<td>$ProfAddress</td>";
                echo "<td>$ProfPhoneNumber</td>";
                echo "<td>$ProfEmail</td>";
                echo "<td>$ProfFatherName</td>";
                echo "<td>$ProfGender</td>";
                echo "<td>$ProfBirthDate</td>";
                echo "<td>$ProfBirthPlace</td>";
                echo "<td>$ProfCitizenship</td>";
                echo "<td>$ProfSpeciality</td>";
                echo "<td>$ProfRank</td>";
                echo "<td>$ProfSubjectArea</td>";
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