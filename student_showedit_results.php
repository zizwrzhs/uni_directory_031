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
<?php
    include 'conn_db.php';

    $DEPT_ID = $_GET['DEPT_ID'];
    $type = $_GET['type'];

    switch($type){
        case 'all':
            $sql = "SELECT s.*, CASE WHEN u.AM_ID IS NOT NULL THEN 'Προπτυχιακός' 
                                    WHEN p.AM_ID IS NOT NULL THEN 'Μεταπτυχιακός'
                                    WHEN ptc.AM_ID IS NOT NULL THEN 'PTC' ELSE '-' END AS student_type
                    FROM student s LEFT JOIN undergraduate u ON s.AM_ID = u.AM_ID LEFT JOIN postgraduate p ON s.AM_ID = p.AM_ID LEFT JOIN ptc ON s.AM_ID = ptc.AM_ID 
                    WHERE DEPT_ID = '$DEPT_ID'";
            break; 
        case 'under':
            $sql = "SELECT * FROM student s, undergraduate u WHERE s.AM_ID = u.AM_ID AND DEPT_ID = '$DEPT_ID'";
            break;
        case 'post':    
            $sql = "SELECT * FROM student s, postgraduate p WHERE s.AM_ID = p.AM_ID AND DEPT_ID = '$DEPT_ID'";
            break;
        case 'ptc':
            $sql = "SELECT * FROM student s, ptc WHERE s.AM_ID = ptc.AM_ID AND DEPT_ID = '$DEPT_ID'";
            break;
        default:
            echo "Invalid Type";
            exit;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<tr>";
        echo "<th>No</th>";
        if (isset($_GET['type']) && $_GET['type'] == 'all') {
            echo "<th>Type</th>";
        }
        echo "<th>Student ID</th>";
        echo "<th>Department ID</th>";
        echo "<th>Professor ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Middle Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Address</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Email</th>";
        echo "<th>Father Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Birth Date</th>";
        echo "<th>Birth Place</th>";
        echo "<th>Citizenship</th>";
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
        echo "<th></th>";
        echo "<th></th>";
        echo "</tr>";
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
            if (isset($_GET['type']) && $_GET['type'] == 'all') {
                if ($stype == 'Προπτυχιακός') {
                    echo "<td><a href='student_edit.php?AM_ID=$AM_ID&DEPT_ID=$DEPT_ID&type=under'>Edit</a></td>";
                } elseif ($stype == 'Μεταπτυχιακός') {
                    echo "<td><a href='student_edit.php?AM_ID=$AM_ID&DEPT_ID=$DEPT_ID&type=post'>Edit</a></td>";
                } elseif ($stype == 'PTC') {
                    echo "<td><a href='student_edit.php?AM_ID=$AM_ID&DEPT_ID=$DEPT_ID&type=ptc'>Edit</a></td>";
                }
            } else {
                echo "<td><a href='student_edit.php?AM_ID=$AM_ID&DEPT_ID=$DEPT_ID&type=$type'>Edit</a></td>";
            }
            echo "<td><a href='student_delete.php?AM_ID=$AM_ID&DEPT_ID=$DEPT_ID'>Delete</a></td>";
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