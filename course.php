<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <title>University Directory</title>
</head>
<body>
<?php
    include 'conn_db.php';

    function ordinal($number) {
        $ends = ['th','st','nd','rd','th','th','th','th','th','th'];
        if (($number % 100) >= 11 && ($number % 100) <= 13)
            return $number . 'th';
        else
            return $number . $ends[$number % 10];
    }

    $DEPT_ID = $_GET['DEPT_ID'];

    $sql = "SELECT * FROM course WHERE DEPT_ID = '$DEPT_ID'";

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
                        <th>Course Name</th>
                        <th>Course ID</th>
                        <th>Department ID</th>
                        <th>Semester</th>
                        <th>Programme</th>
                        <th>Category</th>
                        <th>ECTS</th>
                        <th>Load</th>
                    </tr>";
            $count = 0;
            foreach($courses as $course) {
                $CourseName = $course["CourseName"];
                $COURSE_ID = $course["COURSE_ID"];
                $DEPT_ID = $course["DEPT_ID"];
                $CourseSemester = $course["CourseSemester"];
                $CourseProgramme = $course["CourseProgramme"];
                $CourseCategory = $course["CourseCategory"];
                $CourseECTS = $course["CourseECTS"];
                $CourseLoad = $course["CourseLoad"];
                
                echo "<tr>";
                echo "<td>$CourseName</td>";
                echo "<td>$COURSE_ID</td>";
                echo "<td>$DEPT_ID</td>";
                echo "<td>$CourseSemester</td>";
                echo "<td>$CourseProgramme</td>";
                echo "<td>$CourseCategory</td>";
                echo "<td>$CourseECTS</td>";
                echo "<td>$CourseLoad</td>";
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