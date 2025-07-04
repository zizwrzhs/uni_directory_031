<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Φόρμα Εισαγωγής Προαπαιτούμενου Μαθήματος</title>
</head>
<body>
<?php
    include 'conn_db.php';
    $DEPT_ID = $_GET['DEPT_ID'];
    $COURSE_ID = $_GET['COURSE_ID'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Μαθημάτων</a></li>";
    echo "</ul>";
    echo "<hr>";
?>
<form action="course_prereq_import.php?DEPT_ID=<?php echo $DEPT_ID; ?>" method="post">
    Μάθημα:
    <select id='COURSE_ID' name='COURSE_ID'>
        <?php
            $sql = "SELECT COURSE_ID, CourseName FROM course WHERE DEPT_ID = '$DEPT_ID' AND COURSE_ID = '$COURSE_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row["COURSE_ID"];
                    $course_name = $row["CourseName"];
                    echo "<option value='$course_id'>$course_name - $course_id</option>";
                }
            }
        ?>
    </select><br>
    Προαπαιτούμενο Μάθημα:
    <select id='PREREQ_ID' name='PREREQ_ID'>
        <?php
            $sql = "SELECT COURSE_ID, CourseName FROM course WHERE DEPT_ID = '$DEPT_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $prereq_id = $row["COURSE_ID"];
                    $prereq_name = $row["CourseName"];
                    echo "<option value='$prereq_id'>$prereq_name - $prereq_id</option>";
                }
            }
        ?>
    </select><br>
    <input type="submit" value="Υποβολή">
</form>
<?php
    $conn->close();
?>
</body>
</html>