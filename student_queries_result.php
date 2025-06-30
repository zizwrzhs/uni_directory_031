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
        $DEPT_ID = $_GET['DEPT_ID'];
        $query = $_GET['query'];

        echo "<ul>";
        echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
        echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
        echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
        echo "<li><a href='student_queries.php?DEPT_ID=$DEPT_ID&query=$query'>Επιστροφή</a></li>";
        echo "</ul>";
        echo "<hr>";
        
        $AM_ID = $_POST['AM_ID'];

        include 'conn_db.php';

        if ($query == 'register') {
            $sql = "SELECT c.COURSE_ID, c.CourseName FROM course c, register r WHERE c.COURSE_ID = r.COURSE_ID AND r.AM_ID = '$AM_ID' ORDER BY COURSE_ID";
            $result = $conn->query($sql);
            echo "<h2>Courses Registered by $AM_ID</h2>";
            if ($result->num_rows > 0) {
                echo "<table><tr><th>Course ID</th><th>Course Name</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["COURSE_ID"] . "</td><td>" . $row["CourseName"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No courses registered.";
            }
        } elseif ($query == 'attend') {
            $sql = "SELECT c.COURSE_ID, c.CourseName, p.PROF_ID, p.ProfFname, p.ProfMname, p.ProfLname, e.Grade FROM course c, professor p, attend a LEFT JOIN examined e ON a.AM_ID = e.AM_ID AND a.COURSE_ID = e.COURSE_ID WHERE a.AM_ID = '$AM_ID' AND a.COURSE_ID = c.COURSE_ID AND p.PROF_ID = a.PROF_ID ORDER BY COURSE_ID;";
            $result = $conn->query($sql);
            echo "<h2>Courses Attended by $AM_ID</h2>";
            if ($result->num_rows > 0) {
                echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Professor ID</th><th>Professor First Name</th><th>Professor Middle Name</th><th>Professor Last Name</th><th>Grade</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["COURSE_ID"] . "</td><td>" . $row["CourseName"] . "</td><td>" . $row["PROF_ID"] . "</td><td>" . $row["ProfFname"] . "</td><td>" . $row["ProfMname"] . "</td><td>" . $row["ProfLname"] . "</td><td>" . $row["Grade"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No courses attended.";
            }
        } elseif ($query == 'attend_prof') {
            $PROF_ID = $_POST['PROF_ID'];
            $sql = "SELECT c.*, a.AttendDate, e.Grade FROM COURSE c, ATTEND a LEFT JOIN EXAMINED e ON a.AM_ID = e.AM_ID AND a.COURSE_ID = e.COURSE_ID WHERE a.AM_ID = '$AM_ID' AND a.PROF_ID = '$PROF_ID' AND a.COURSE_ID = c.COURSE_ID ORDER BY COURSE_ID;";
            $result = $conn->query($sql);
            echo "<h2>Courses Attended by $AM_ID with Professor $PROF_ID</h2>";
            if ($result->num_rows > 0) {
                echo "<table><tr><th>Course ID</th><th>Course Name</th><th>Course Programme</th><th>Course Category</th><th>Course ECTS</th><th>Load</th><th>Semester</th><th>Attend Date</th><th>Grade</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["COURSE_ID"] . "</td><td>" . $row["CourseName"] . "</td><td>" . $row["CourseProgramme"] . "</td><td>" . $row["CourseCategory"] . "</td><td>" . $row["CourseECTS"] . "</td><td>" . $row["CourseLoad"] . "</td><td>" . $row["CourseSemester"] . "</td><td>" . $row["AttendDate"] . "</td><td>" . $row["Grade"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No courses attended with this professor.";
            }
        } elseif ($query == 'avg') {
            $sql = "SELECT AVG(e.Grade) FROM examined e WHERE e.AM_ID = '$AM_ID';";
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_row();
                echo "<h2>Average Grade for $AM_ID</h2>";
                echo "Average Grade: " . $row[0];
            }
        } elseif ($query == 'avg_passed') {
            $sql = "SELECT AVG(e.Grade) FROM examined e WHERE e.AM_ID = '$AM_ID' AND e.Grade >= 5;";
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_row();
                echo "<h2>Average Passed Grade for $AM_ID</h2>";
                echo "Average Passed Grade: " . $row[0];
            }
        }
    ?>
</body>
</html>