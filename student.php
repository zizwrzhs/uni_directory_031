<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <title>University Directory</title>
</head>
<body>
    <ul>
        <?php
            $DEPT_ID = $_GET['DEPT_ID'];

            echo "<h2>Στοιχεία Φοιτητών</h2>";
            echo "<li><a href='student_showedit.php?DEPT_ID=$DEPT_ID'>Εμφάνιση/Επεξεργασία Φοιτητών</a></li>";
            echo "<li><a href='student_import.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Φοιτητή</a></li>";
            echo "<h2>Αναζήτηση Πληροφοριών</h2>";
        ?>
    </ul>
</body>
</html>