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

    $AM_ID = $_GET['AM_ID'];
    $DEPT_ID = $_GET['DEPT_ID'];
    $type1 = $_GET['type1'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
    echo "<li><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή</a></li>";
    echo "</ul>";
    echo "<hr>";

    $sql = "DELETE FROM student WHERE AM_ID = '$AM_ID' AND DEPT_ID = '$DEPT_ID'";
    
    if ($result = $conn->query($sql)) {
        echo "<h3>Ο φοιτητής με Αριθμό Μητρώου $AM_ID διαγράφηκε επιτυχώς.</h3>";
    }  else {
        echo "<h3>Σφάλμα κατά τη διαγραφή του φοιτητή: " . $conn->error . "</h3>";
    }
    $conn->close();
?>
</body>
</html>