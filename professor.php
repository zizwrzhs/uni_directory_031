<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Καθηγητές</title>
</head>
<body>
    <?php
        $DEPT_ID = $_GET['DEPT_ID'];
        echo "<ul>";
        echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
        echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
        echo "</ul>";
        echo "<hr>";

        echo "<ul>";
        echo "<h2>Στοιχεία Καθηγητών</h2>";
        echo "<li><a href='professor_showedit.php?DEPT_ID=$DEPT_ID'>Εμφάνιση/Επεξεργασία Καθηγητών</a></li>";
        echo "<h2>Εισαγωγή Πληροφοριών</h2>";
        echo "<li><a href='professor_import_form.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Νέου Καθηγητή</a></li>";
        echo "<h2>Αναζήτηση Πληροφοριών</h2>";
        echo "<li><a href='professor_queries.php?DEPT_ID=$DEPT_ID&query=info'>Πληροφορίες Καθηγητών</a></li>";
        echo "<li><a href='professor_queries.php?DEPT_ID=$DEPT_ID&query=thesis'>Πτυχιακές Εργασίες Καθηγητή</a></li>";
        echo "</ul>";
    ?>
</body>
</html>