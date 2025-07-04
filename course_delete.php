<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Διαγραφή Μαθήματος</title>
</head>
<body>
<?php
    include 'conn_db.php';

    $COURSE_ID = $_GET['COURSE_ID'];
    $DEPT_ID = $_GET['DEPT_ID'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Μαθημάτων</a></li>";
    echo "</ul>";
    echo "<hr>";

    $sql = "DELETE FROM course WHERE COURSE_ID = '$COURSE_ID' AND DEPT_ID = '$DEPT_ID'";
    
    if ($result = $conn->query($sql)) {
        echo "<h3>Το μάθημα με Κωδικό $COURSE_ID διαγράφηκε επιτυχώς.</h3>";
        echo "<p><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή</a></p>";
    }  else {
        echo "<h3>Σφάλμα κατά τη διαγραφή του μαθήματος: " . $conn->error . "</h3>";
    }
    $conn->close();
?>
</body>
</html>