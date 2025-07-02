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
    $AM_ID = $_POST['AM_ID'];
    $COURSE_ID = $_POST['COURSE_ID'];
    $PROF_ID = $_POST['PROF_ID'];
    $ThesisName = $_POST['ThesisName'];
    $Mandatory = isset($_POST['Mandatory']) ? 1 : 0;
    $RestrOnWhenToStart = $_POST['RestrOnWhenToStart'];
    $MinCompletionTime = $_POST['MinCompletionTime'];
    $MaxCompletionTime = $_POST['MaxCompletionTime'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
    echo "</ul>";
    echo "<hr>";

    $sql = "INSERT INTO thesis (AM_ID, COURSE_ID, PROF_ID, ThesisName, Mandatory, RestrOnWhenToStart, MinCompletionTime, MaxCompletionTime) VALUES ('$AM_ID', '$COURSE_ID', '$PROF_ID', '$ThesisName', $Mandatory, '$RestrOnWhenToStart', '$MinCompletionTime', '$MaxCompletionTime')";
    include 'conn_db.php';
    if ($conn->query($sql)) {
        echo "<h3>Η πτυχιακή εργασία καταχωρήθηκε επιτυχώς.</h3>";
    } else {
        echo "<h3>Σφάλμα: " . $conn->error . "</h3>";
    }
    $conn->close();
?>
</body>
</html>