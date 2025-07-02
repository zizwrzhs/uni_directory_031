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

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
    echo "</ul>";
    echo "<hr>";
    
    include 'conn_db.php';
?>
<form action="student_thesis.php?DEPT_ID=<?php echo $_GET['DEPT_ID'];?>" method="post">
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
            $sql = "SELECT COURSE_ID FROM course WHERE DEPT_ID = '$DEPT_ID' AND COURSE_ID LIKE 'TH%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row["COURSE_ID"];
                    $course_name = $row["CourseName"];
                    echo "<option value='$course_id'>$course_id</option>";
                }
            }
        ?>
    </select><br>
    Καθηγητής:
    <select id='PROF_ID' name='PROF_ID'>
        <?php
            $sql = "SELECT PROF_ID, ProfFname, ProfMname, ProfLname FROM professor WHERE DEPT_ID = '$DEPT_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $prof_id = $row["PROF_ID"];
                    $proffname = $row["ProfFname"];
                    $profmname = $row["ProfMname"];
                    $proflname = $row["ProfLname"];
                    echo "<option value='$prof_id'>$proffname $profmname $proflname - $prof_id</option>";
                }
            }
        ?>
    </select><br>
    Όνομα Πτυχιακής Εργασίας: <input type="text" name="ThesisName" id="ThesisName" required><br>
    Υποχρεωτική: <input type="checkbox" name="Mandatory" id="Mandatory"><br>
    Περιορισμός για το πότε μπορεί να ξεκινήσει: <input type="text" name="RestrOnWhenToStart" id="RestrOnWhenToStart"><br>
    Ελάχιστος Χρόνος Ολοκλήρωσης: <input type="text" name="MinCompletionTime" id="MinCompletionTime" min="1" required><br>
    Μέγιστος Χρόνος Ολοκλήρωσης: <input type="text" name="MaxCompletionTime" id="MaxCompletionTime" min="1" required><br>
    <input type="submit" value="Εισαγωγή Πτυχιακής Εργασίας">
</form>
</body>
</html>