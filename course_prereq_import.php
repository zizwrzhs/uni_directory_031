<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Εισαγωγή Προαπαιτούμενου Μαθήματος</title>
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
    
    $COURSE_ID = $_POST['COURSE_ID'];
    $PREREQ_ID = $_POST['PREREQ_ID'];

    $sql = "INSERT INTO requires (COURSE_ID, PREREQ_ID) VALUES ('$COURSE_ID', '$PREREQ_ID')";
    if ($conn->query($sql) === TRUE) {
        echo "<h3>Το προαπαιτούμενο μάθημα προστέθηκε με επιτυχία.</h3>";
        echo "<p><a href='course.php?DEPT_ID=$DEPT_ID'>Επιστροφή</a></p>";
    } else {
        echo "<h3>Σφάλμα: " . $sql . "<br>" . $conn->error . "</h3>";
    }
    $conn->close();
?>
</body>
</html>