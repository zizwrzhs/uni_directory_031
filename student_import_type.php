<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Τύπος Εισαγωγής Φοιτητή</title>
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

        echo "<ul>";
        echo "<li><a href='student_import_form.php?DEPT_ID=$DEPT_ID&type=under'>Εισαγωγή προπτυχιακού φοιτητή</a></li>";
        echo "<li><a href='student_import_form.php?DEPT_ID=$DEPT_ID&type=post'>Εισαγωγή μεταπτυχιακού φοιτητή</a></li>";
        echo "<li><a href='student_import_form.php?DEPT_ID=$DEPT_ID&type=ptc'>Εισαγωγή PTC</a></li>";
        echo "</ul>";
    ?>
</body>
</html>