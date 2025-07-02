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
        echo "<ul>";
        echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
        echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
        echo "</ul>";
        echo "<hr>";

        echo "<ul>";
        echo "<h2>Στοιχεία Φοιτητών</h2>";
        echo "<li><a href='student_showedit.php?DEPT_ID=$DEPT_ID'>Εμφάνιση/Επεξεργασία Φοιτητών</a></li>";
        echo "<h2>Εισαγωγή Πληροφοριών</h2>";
        echo "<li><a href='student_import_type.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Νέου Φοιτητή</a></li>";
        echo "<li><a href='student_attend_form.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Ημερομηνίας Παρακολούθησης Μαθήματος</a></li>";
        echo "<li><a href='student_examined_form.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Εξέτασης</a></li>";
        echo "<li><a href='student_register_form.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Εγγραφής Μαθήματος</a></li>";
        echo "<li><a href='student_thesis_form.php?DEPT_ID=$DEPT_ID'>Εισαγωγή Πτυχιακής Εργασίας</a></li>";
        echo "<h2>Αναζήτηση Πληροφοριών</h2>";
        echo "<li><a href='student_queries.php?DEPT_ID=$DEPT_ID&query=register'>Σε ποια μαθήματα έχει εγγραφεί κάποιος φοιτητής;</a></li>";
        echo "<li><a href='student_queries.php?DEPT_ID=$DEPT_ID&query=attend'>Μαθήματα που έχει παρακολουθήσει κάποιος φοιτητής</a></li>";
        echo "<li><a href='student_queries.php?DEPT_ID=$DEPT_ID&query=attend_prof'>Πληροφορίες όλων των μαθημάτων που έχει παρακολουθήσει κάποιος φοιτητής με κάποιον καθηγητή</a></li>";
        echo "<li><a href='student_queries.php?DEPT_ID=$DEPT_ID&query=avg'>Μέσος όρος βαθμολογίας φοιτητή</a></li>";
        echo "<li><a href='student_queries.php?DEPT_ID=$DEPT_ID&query=avg_passed'>Μέσος όρος βαθμολογίας φοιτητή που πέρασε</a></li>";
        echo "</ul>";
    ?>
</body>
</html>