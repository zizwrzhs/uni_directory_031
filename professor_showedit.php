<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Εμφάνιση/Επεξεργασία Καθηγητών</title>
</head>
<body>
    <?php
        $DEPT_ID = $_GET['DEPT_ID'];
    
        echo "<ul>";
        echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
        echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
        echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Καθηγητών</a></li>";
        echo "</ul>";
        echo "<hr>";

        echo "<ul>";
        echo "<li><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID&type=all'>Εμφάνιση όλων των καθηγητών</a></li>";
        echo "<li><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID&type=prof'>Εμφάνιση μόνιμων καθηγητών</a></li>";
        echo "<li><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID&type=assoc'>Εμφάνιση αναπληρωτών καθηγητών</a></li>";
        echo "<li><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID&type=assis'>Εμφάνιση επίκουρων καθηγητών</a></li>";
        echo "</ul>";
    ?>
</body>
</html>