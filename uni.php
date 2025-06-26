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
            
            echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Φοιτητές</a></li>";
            echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Καθηγητές</a></li>";
            echo "<li><a href='course.php?DEPT_ID=$DEPT_ID'>Μαθήματα</a></li>";
            echo "<li><a href='department.php?DEPT_ID=$DEPT_ID'>Στοιχεία Τμήματος</a></li>";
        ?>
    </ul>
</body>
</html>