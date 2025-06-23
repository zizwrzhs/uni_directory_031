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
        <?php
            if (isset($_GET['type']) && $_GET['type'] == 'all') {
                echo "<th>Type</th>";
            }
        ?>
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
        <?php
            if (isset($_GET['type']) && $_GET['type'] == 'under') {
                echo "<th>Admission Rank</th>";
                echo "<th>Admission Type</th>";
            }
            if (isset($_GET['type']) && $_GET['type'] == 'post') {
                echo "<th>First Degree</th>";
            }
            if (isset($_GET['type']) && $_GET['type'] == 'ptc') {
                echo "<th>University of Origin</th>";
                echo "<th>Department of Origin</th>";
            }
        ?>
    </tr>
    <?php
        include 'conn_db.php';

        $DEPT_ID = $_GET['DEPT_ID'];
        $type = $_GET['type'];

        switch($type){
            case 'all':
                $sql = "SELECT S.*, CASE WHEN U.AM_ID IS NOT NULL THEN 'Προπτυχιακός' WHEN P.AM_ID IS NOT NULL THEN 'Μεταπτυχιακός' WHEN PTC.AM_ID IS NOT NULL THEN 'PTC' ELSE 'unknown' END AS student_type FROM STUDENT S LEFT JOIN UNDERGRADUATE U ON S.AM_ID = U.AM_ID LEFT JOIN POSTGRADUATE P ON S.AM_ID = P.AM_ID LEFT JOIN PTC ON S.AM_ID = PTC.AM_ID WHERE DEPT_ID = '$DEPT_ID'";
                break; 
            case 'under':
                $sql = strtoupper("SELECT * FROM STUDENT S, UNDERGRADUATE U WHERE S.AM_ID = U.AM_ID AND DEPT_ID = '$DEPT_ID'");
                break;
            case 'post':    
                $sql = strtoupper("SELECT * FROM STUDENT S, POSTGRADUATE P WHERE S.AM_ID = P.AM_ID AND DEPT_ID = '$DEPT_ID'");
                break;
            case 'ptc':
                $sql = strtoupper("SELECT * FROM STUDENT S, PTC WHERE S.AM_ID = PTC.AM_ID AND DEPT_ID = '$DEPT_ID'");
                break;
            default:
                echo "Invalid type";
                exit;
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()) {
                $count++;
                if (isset($_GET['type']) && $_GET['type'] == 'all') {
                    $stype = $row["student_type"];
                }
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
                if (isset($_GET['type']) && $_GET['type'] == 'under') {
                    $AdmissionRank = $row["AdmissionRank"];
                    $AdmissionType = $row["AdmissionType"];
                }
                if (isset($_GET['type']) && $_GET['type'] == 'post') {
                    $FirstDegree = $row["FirstDegree"];
                }
                if (isset($_GET['type']) && $_GET['type'] == 'ptc') {
                    $UniversityOfOrigin = $row["UniversityOfOrigin"];
                    $DepartmentOfOrigin = $row["DepartmentOfOrigin"];
                }

                echo "<tr>";
                echo "<td>$count</td>";
                if (isset($_GET['type']) && $_GET['type'] == 'all') {
                    echo "<td>$stype</td>";
                }
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
                if (isset($_GET['type']) && $_GET['type'] == 'under') {
                    echo "<td>$AdmissionRank</td>";
                    echo "<td>$AdmissionType</td>";
                }
                if (isset($_GET['type']) && $_GET['type'] == 'post') {
                    echo "<td>$FirstDegree</td>";
                }
                if (isset($_GET['type']) && $_GET['type'] == 'ptc') {
                    echo "<td>$UniversityOfOrigin</td>";
                    echo "<td>$DepartmentOfOrigin</td>";
                }
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