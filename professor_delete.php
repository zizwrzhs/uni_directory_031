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

    $PROF_ID = $_GET['PROF_ID'];
    $DEPT_ID = $_GET['DEPT_ID'];
    $type = $_GET['type'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Καθηγητών</a></li>";
    echo "<li><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή</a></li>";
    echo "</ul>";
    echo "<hr>";

    $sql = "DELETE FROM professor WHERE PROF_ID = '$PROF_ID' AND DEPT_ID = '$DEPT_ID'";
    
    if ($result = $conn->query($sql)) {
        echo "<h3>Ο καθηγητής με Αριθμό Μητρώου $PROF_ID διαγράφηκε επιτυχώς.</h3>";
    }  else {
        echo "<h3>Σφάλμα κατά τη διαγραφή του καθηγητή: " . $conn->error . "</h3>";
    }
    $conn->close();
?>
</body>
</html>