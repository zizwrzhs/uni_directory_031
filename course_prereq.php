<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Εμφάνιση Προαπαιτούμενων Μαθημάτων</title>
</head>
<body>
<?php
    include 'conn_db.php';

    $DEPT_ID = $_GET['DEPT_ID'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Μαθημάτων</a></li>";
    echo "</ul>";
    echo "<hr>";

    function ordinal($number) {
        $ends = ['th','st','nd','rd','th','th','th','th','th','th'];
        if (($number % 100) >= 11 && ($number % 100) <= 13)
            return $number . 'th';
        else
            return $number . $ends[$number % 10];
    }

    $DEPT_ID = $_GET['DEPT_ID'];

    $sql = "SELECT c.CourseSemester AS CourseSemester, c.COURSE_ID AS COURSE_ID, c.CourseName AS CourseName, p.COURSE_ID AS PREREQ_ID, p.CourseName AS PrereqName FROM requires r JOIN course c ON r.COURSE_ID = c.COURSE_ID JOIN course p ON r.PREREQ_ID = p.COURSE_ID WHERE c.DEPT_ID = '$DEPT_ID'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $courses_by_semester = [];

        while($row = $result->fetch_assoc()) {
            $semester = $row["CourseSemester"];
            $courses_by_semester[$semester][] = $row;
        }

        foreach ($courses_by_semester as $semester => $courses) {
            $ordinal = ordinal($semester);
            echo "<h2>$ordinal Semester</h2>";
            echo "<table>
                    <tr>
                        <th>Κωδικός Μαθήματος</th>
                        <th>Όνομα Μαθήματος</th>
                        <th>Κωδικός Προαπαιτούμενου</th>
                        <th>Όνομα Προαπαιτούμενου</th>
                        <th></th>
                    </tr>";
            foreach($courses as $course) {
                $COURSE_ID = $course["COURSE_ID"];
                $CourseName = $course["CourseName"];
                $PREREQ_ID = $course["PREREQ_ID"];
                $PrereqName = $course["PrereqName"];

                echo "<tr>";
                echo "<td>$COURSE_ID</td>";
                echo "<td>$CourseName</td>";
                echo "<td>$PREREQ_ID</td>";
                echo "<td>$PrereqName</td>";
                echo "<td><a href='course_prereq_delete.php?DEPT_ID=$DEPT_ID&COURSE_ID=$COURSE_ID&PREREQ_ID=$PREREQ_ID'>Διαγραφή Προαπαιτούμενου</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        echo "No courses found for this department.";
    }
    $conn->close();
        ?>
</body>
</html>