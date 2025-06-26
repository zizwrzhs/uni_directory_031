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

            echo "<li><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=all'>Εμφάνιση όλων των φοιτητών</a></li>";
            echo "<li><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=under'>Εμφάνιση προπτυχιακών φοιτητών</a></li>";
            echo "<li><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=post'>Εμφάνιση μεταπτυχιακών φοιτητών</a></li>";
            echo "<li><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=ptc'>Εμφάνιση PTC</a></li>";
        ?>
    </ul>
</body>
</html>