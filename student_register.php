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

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
    echo "</ul>";
    echo "<hr>";

    $check_sql = "SELECT * FROM register WHERE AM_ID = '$AM_ID' AND COURSE_ID = '$COURSE_ID'";
    include 'conn_db.php';
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        echo "<h3>Ο φοιτητής είναι ήδη εγγεγραμμένος σε αυτό το μάθημα.</h3>";
    } else {
        $sql = "INSERT INTO register (AM_ID, COURSE_ID) VALUES ('$AM_ID', '$COURSE_ID')";
    if ($conn->query($sql)) {
        echo "<h3>Η εγγραφή έγινε επιτυχώς.</h3>";
    } else {
        echo "<h3>Σφάλμα: " . $conn->error . "</h3>";
    }
    }
    $conn->close();
?>
</body>
</html>