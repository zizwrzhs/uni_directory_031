<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="G. Georgopetris - I. K. Soukeras">
    <link rel="stylesheet" href="style.css">
    <title>Φόρμα Εισαγωγής Καθηγητή</title>
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
?>
<form action="professor_import.php?DEPT_ID=<?php echo $_GET['DEPT_ID']; ?>" method="post">
    Κωδικός Καθηγητή: <input type="text" name="PROF_ID" id="PROF_ID" required><br>
    Όνομα: <input type="text" name="ProfFname" id="ProfFname" required><br>
    Μεσαίο Όνομα: <input type="text" name="ProfMname" id="ProfMname"><br>
    Επώνυμο: <input type="text" name="ProfLname" id="ProfLname" required><br>
    Διεύθυνση: <input type="text" name="ProfAddress" id="ProfAddress"><br>
    Τηλέφωνο: <input type="text" name="ProfPhoneNumber" id="ProfPhoneNumber"><br>
    Email: <input type="email" name="ProfEmail" id="ProfEmail"><br>
    Όνομα Πατέρα: <input type="text" name="ProfFatherName" id="ProfFatherName"><br>
    Φύλο:
    <select id='ProfGender' name='ProfGender'>
        <option value='Male'>Male</option>
        <option value='Female'>Female</option>
        <option value='Other'>Other</option>
    </select><br>
    Ημερομηνία Γέννησης: <input type="date" name="ProfBirthDate" id="ProfBirthDate"><br>
    Τόπος Γέννησης: <input type="text" name="ProfBirthPlace" id="ProfBirthPlace"><br>
    Ιθαγένεια: <input type="text" name="ProfCitizenship" id="ProfCitizenship"><br>
    Ειδικότητα: <input type="text" name="ProfSpeciality" id="ProfSpeciality"><br>
    Βαθμίδα:
    <select id='ProfRank' name='ProfRank'>
        <option value='Professor'>Professor</option>
        <option value='Associate Professor'>Associate Professor</option>
        <option value='Assistant Professor'>Assistant Professor</option>
    </select><br>
    Τομέας Ειδίκευσης: <input type="text" name="ProfSubjectArea" id="ProfSubjectArea"><br>
    <input type="submit" value="Εισαγωγή Καθηγητή">
</form>
</body>
</html>