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
    include 'conn_db.php';
    $DEPT_ID = $_GET['DEPT_ID'];

    echo "<ul>";
    echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
    echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
    echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Καθηγητών</a></li>";
    echo "</ul>";
    echo "<hr>";
    
    $PROF_ID = (isset($_POST['PROF_ID']) && $_POST['PROF_ID'] != '') ? $_POST['PROF_ID'] : null;
    if ($PROF_ID === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Αριθμό Μητρώου του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfFname = (isset($_POST['ProfFname']) && $_POST['ProfFname'] != '') ? $_POST['ProfFname'] : null;
    if ($ProfFname === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    if (isset($_POST['ProfMname']) && $_POST['ProfMname'] !== '') {
        $ProfMname = "'" . $conn->real_escape_string($_POST['ProfMname']) . "'";
    } else {
        $ProfMname = "NULL";
    }
    $ProfLname = (isset($_POST['ProfLname']) && $_POST['ProfLname'] != '') ? $_POST['ProfLname'] : null;
    if ($ProfLname === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Επώνυμο του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfAddress = (isset($_POST['ProfAddress']) && $_POST['ProfAddress'] != '') ? $_POST['ProfAddress'] : null;
    if ($ProfAddress === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τη Διεύθυνση του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfPhoneNumber = (isset($_POST['ProfPhoneNumber']) && $_POST['ProfPhoneNumber'] != '') ? $_POST['ProfPhoneNumber'] : null;
    if ($ProfPhoneNumber === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Αριθμό Τηλεφώνου του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfEmail = (isset($_POST['ProfEmail']) && $_POST['ProfEmail'] != '') ? $_POST['ProfEmail'] : null;
    if ($ProfEmail === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Email του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfFatherName = (isset($_POST['ProfFatherName']) && $_POST['ProfFatherName'] != '') ? $_POST['ProfFatherName'] : null;
    if ($ProfFatherName === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του Πατέρα του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfGender = $_POST['ProfGender'];
    $ProfBirthDate = (isset($_POST['ProfBirthDate']) && $_POST['ProfBirthDate'] != '') ? $_POST['ProfBirthDate'] : null;
    if ($ProfBirthDate === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ημερομηνία Γέννησης του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfBirthPlace = (isset($_POST['ProfBirthPlace']) && $_POST['ProfBirthPlace'] != '') ? $_POST['ProfBirthPlace'] : null;
    if ($ProfBirthPlace === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Τόπο Γέννησης του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfCitizenship = (isset($_POST['ProfCitizenship']) && $_POST['ProfCitizenship'] != '') ? $_POST['ProfCitizenship'] : null;
    if ($ProfCitizenship === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ιθαγένεια του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfSpeciality = (isset($_POST['ProfSpeciality']) && $_POST['ProfSpeciality'] != '') ? $_POST['ProfSpeciality'] : null;
    if ($ProfSpeciality === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ειδικότητα του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfRank = (isset($_POST['ProfRank']) && $_POST['ProfRank'] != '') ? $_POST['ProfRank'] : null;
    if ($ProfRank === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Βαθμό του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $ProfSubjectArea = (isset($_POST['ProfSubjectArea']) && $_POST['ProfSubjectArea'] != '') ? $_POST['ProfSubjectArea'] : null;
    if ($ProfSubjectArea === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Αντικείμενο Ειδίκευσης του Καθηγητή.</h3>";
        echo "<p><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }

    $sql = "INSERT INTO professor (PROF_ID, DEPT_ID, ProfFname, ProfMname, ProfLname, ProfAddress, ProfPhoneNumber, ProfEmail, ProfFatherName, ProfGender, ProfBirthDate, ProfBirthPlace, ProfCitizenship, ProfSpeciality, ProfRank, ProfSubjectArea)
            VALUES ('$PROF_ID', '$DEPT_ID', '$ProfFname', $ProfMname, '$ProfLname', '$ProfAddress', '$ProfPhoneNumber', '$ProfEmail', '$ProfFatherName', '$ProfGender', '$ProfBirthDate', '$ProfBirthPlace', '$ProfCitizenship', '$ProfSpeciality', '$ProfRank', '$ProfSubjectArea')";

    if ($result = $conn->query($sql)) {
        echo "<h3>Οι λεπτομέρειες του καθηγητή προστέθηκαν με επιτυχία.</h3>";
    } else {
        echo "<h3>Σφάλμα: Δεν ήταν δυνατή η προσθήκη των λεπτομερειών του καθηγητή.</h3>";
        echo "<p>Σφάλμα: " . $conn->error . "</p>";
    }
    $conn->close();
?>
</body>
</html>