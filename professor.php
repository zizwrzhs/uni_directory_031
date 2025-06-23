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

            echo "<li><a href='professor_results.php?DEPT_ID=$DEPT_ID&type=all'>Εμφάνιση όλων των καθηγητών</a></li>";
            echo "<li><a href='professor_results.php?DEPT_ID=$DEPT_ID&type=prof'>Εμφάνιση μόνιμων καθηγητών</a></li>";
            echo "<li><a href='professor_results.php?DEPT_ID=$DEPT_ID&type=assoc'>Εμφάνιση αναπληρωτών καθηγητών</a></li>";
            echo "<li><a href='professor_results.php?DEPT_ID=$DEPT_ID&type=assis'>Εμφάνιση επίκουρων καθηγτών</a></li>";
        ?>
    </ul>
</body>
</html>