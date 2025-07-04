<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Φόρμα Εισαγωγής Μαθήματος</title>
</head>
<body>
<?php
    $DEPT_ID = $_GET['DEPT_ID'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Μαθημάτων</a></li>";
    echo "</ul>";
    echo "<hr>";
?>
<form action="course_import.php?DEPT_ID=<?php echo $_GET['DEPT_ID']; ?>" method="post">
    Κωδικός Μαθήματος: <input type="text" name="COURSE_ID" id="COURSE_ID" required><br>
    Όνομα Μαθήματος: <input type="text" name="CourseName" id="CourseName" required><br>
    Πρόγραμμα Σπουδών:
    <select id='CourseProgramme' name='CourseProgramme'>
        <option value='INF'>INF PROGRAMME 2025</option>
        <option value='ECO'>ECO PROGRAMME 2025</option>
        <option value='MATH'>MATH PROGRAMME 2025</option>
        <option value='TOUR'>TOUR PROGRAMME 2025</option>
    </select><br>
    Κατηγορία: 
    <select id='CourseCategory' name='CourseCategory'>
        <option value='Compulsory'>Compulsory</option>
        <option value='Compulsory Elective'>Compulsory Elective</option>
    </select><br>
    ECTS: <input type="number" name="CourseECTS" id="CourseECTS" required><br>
    Βαρύτητα: <input type="number" name="CourseLoad" id="CourseLoad" required><br>
    Εξάμηνο: <input type="number" name="CourseSemester" id="CourseSemester" required><br>
    <input type="submit" value="Εισαγωγή Μαθήματος">
</form>
</body>
</html>