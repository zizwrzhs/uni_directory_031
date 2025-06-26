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

    $sql = "DELETE FROM student WHERE AM_ID = '$AM_ID' AND DEPT_ID = '$DEPT_ID'";
    
    if ($result = $conn->query($sql)) {
        echo "<p>Ο φοιτητής με Αριθμό Μητρώου $AM_ID διαγράφηκε επιτυχώς.</p>";
    }  else {
        echo "<p>Σφάλμα κατά τη διαγραφή του φοιτητή: " . $conn->error . "</p>";
    }
    echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=all'>Επιστροφή στη λίστα φοιτητών</a></p>";
    $conn->close();
?>
</body>
</html>