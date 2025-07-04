<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Εισαγωγή Μαθήματος</title>
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

    $COURSE_ID = (isset($_POST['COURSE_ID']) && $_POST['COURSE_ID'] != '') ? $_POST['COURSE_ID'] : null;
    if ($COURSE_ID === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Κωδικό του Μαθήματος.</h3>";
        echo "<p><a href='course_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $CourseName = (isset($_POST['CourseName']) && $_POST['CourseName'] != '') ? $_POST['CourseName'] : null;
    if ($CourseName === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του Μαθήματος.</h3>";
        echo "<p><a href='course_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $CourseProgramme = $_POST['CourseProgramme'];
    $CourseCategory = $_POST['CourseCategory'];
    $CourseECTS = (isset($_POST['CourseECTS']) && $_POST['CourseECTS'] != '') ? $_POST['CourseECTS'] : null;
    if ($CourseECTS === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τα ECTS του Μαθήματος.</h3>";
        echo "<p><a href='course_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $CourseLoad = (isset($_POST['CourseLoad']) && $_POST['CourseLoad'] != '') ? $_POST['CourseLoad'] : null;
    if ($CourseLoad === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Φορτίο του Μαθήματος.</h3>";
        echo "<p><a href='course_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $CourseSemester = (isset($_POST['CourseSemester']) && $_POST['CourseSemester'] != '') ? $_POST['CourseSemester'] : null;
    if ($CourseSemester === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Εξάμηνο του Μαθήματος.</h3>";
        echo "<p><a href='course_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }

    $sql = "INSERT INTO course (COURSE_ID, DEPT_ID, CourseName, CourseSemester, CourseProgramme, CourseCategory, CourseECTS, CourseLoad)
            VALUES ('$COURSE_ID', '$DEPT_ID', '$CourseName', '$CourseSemester', '$CourseProgramme', '$CourseCategory', '$CourseECTS', '$CourseLoad')";

    if ($result = $conn->query($sql)) {
        echo "<h3>Οι λεπτομέρειες του μαθήματος προστέθηκαν με επιτυχία.</h3>";
        echo "<p><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή</a></p>";
    } else {
        echo "<h3>Σφάλμα: Δεν ήταν δυνατή η προσθήκη των λεπτομερειών του μαθήματος.</h3>";
        echo "<p>Σφάλμα: " . $conn->error . "</p>";
    }
    $conn->close();
?>
</body>
</html>