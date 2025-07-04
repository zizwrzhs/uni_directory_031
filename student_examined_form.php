<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Φόρμα Εισαγωγής Εξέτασης Φοιτητή</title>
</head>
<body>
<?php
    $DEPT_ID = $_GET['DEPT_ID'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
    echo "</ul>";
    echo "<hr>";
    
    include 'conn_db.php';
?>
<form action="student_examined.php?DEPT_ID=<?php echo $_GET['DEPT_ID'];?>" method="post">
    Φοιτητής: 
    <select id='AM_ID' name='AM_ID'>
        <?php
            $sql = "SELECT AM_ID, StudFname, StudMname, StudLname FROM student WHERE DEPT_ID = '$DEPT_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $AM_ID = $row["AM_ID"];
                    $StudFname = $row["StudFname"];
                    $StudMname = $row["StudMname"];
                    $StudLname = $row["StudLname"];
                    echo "<option value='$AM_ID'>$StudFname $StudMname $StudLname - $AM_ID</option>";
                }
            }
        ?>
    </select><br>
    Μάθημα:
    <select id='COURSE_ID' name='COURSE_ID'>
        <?php
            $sql = "SELECT COURSE_ID, CourseName FROM course WHERE DEPT_ID = '$DEPT_ID'";
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
    Βαθμός: <input type="number" name="Grade" id="Grade" min="0" max="10" step="0.01" required><br>
    Ημερομηνία Εξέτασης: <input type="date" name="ExamDate" id="ExamDate" required><br>
    <input type="submit" value="Εισαγωγή Εξέτασης">
</form>
<?php
    $conn->close();
?>
</body>
</html>