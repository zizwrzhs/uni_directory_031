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
    echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
    echo "<li><a href='student_import_type.php?DEPT_ID=$DEPT_ID'>Επιστροφή</a></li>";
    echo "</ul>";
    echo "<hr>";

    $type = $_GET['type'];
    
    $AM_ID = (isset($_POST['AM_ID']) && $_POST['AM_ID'] != '') ? $_POST['AM_ID'] : null;
    if ($AM_ID === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Αριθμό Μητρώου του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $PROF_ID = (isset($_POST['PROF_ID']) && $_POST['PROF_ID'] != '') ? $_POST['PROF_ID'] : null;
    if ($PROF_ID === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Καθηγητή του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudFname = (isset($_POST['StudFname']) && $_POST['StudFname'] != '') ? $_POST['StudFname'] : null;
    if ($StudFname === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    if (isset($_POST['StudMname']) && $_POST['StudMname'] !== '') {
        $StudMname = "'" . $conn->real_escape_string($_POST['StudMname']) . "'";
    } else {
        $StudMname = "NULL";
    }
    $StudLname = (isset($_POST['StudLname']) && $_POST['StudLname'] != '') ? $_POST['StudLname'] : null;
    if ($StudLname === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Επώνυμο του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudAddress = (isset($_POST['StudAddress']) && $_POST['StudAddress'] != '') ? $_POST['StudAddress'] : null;
    if ($StudAddress === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τη Διεύθυνση του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudPhoneNumber = (isset($_POST['StudPhoneNumber']) && $_POST['StudPhoneNumber'] != '') ? $_POST['StudPhoneNumber'] : null;
    if ($StudPhoneNumber === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Αριθμό Τηλεφώνου του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudEmail = (isset($_POST['StudEmail']) && $_POST['StudEmail'] != '') ? $_POST['StudEmail'] : null;
    if ($StudEmail === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Email του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudFatherName = (isset($_POST['StudFatherName']) && $_POST['StudFatherName'] != '') ? $_POST['StudFatherName'] : null;
    if ($StudFatherName === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του Πατέρα του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudGender = $_POST['StudGender'];
    $StudBirthDate = (isset($_POST['StudBirthDate']) && $_POST['StudBirthDate'] != '') ? $_POST['StudBirthDate'] : null;
    if ($StudBirthDate === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ημερομηνία Γέννησης του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudBirthPlace = (isset($_POST['StudBirthPlace']) && $_POST['StudBirthPlace'] != '') ? $_POST['StudBirthPlace'] : null;
    if ($StudBirthPlace === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Τόπο Γέννησης του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudCitizenship = (isset($_POST['StudCitizenship']) && $_POST['StudCitizenship'] != '') ? $_POST['StudCitizenship'] : null;
    if ($StudCitizenship === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ιθαγένεια του Φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }

    $sql = "INSERT INTO student (AM_ID, DEPT_ID, PROF_ID, StudFname, StudMname, StudLname, StudAddress, StudPhoneNumber, StudEmail, StudFatherName, StudGender, StudBirthDate, StudBirthPlace, StudCitizenship)
            VALUES ('$AM_ID', '$DEPT_ID', '$PROF_ID', '$StudFname', $StudMname, '$StudLname', '$StudAddress', '$StudPhoneNumber', '$StudEmail', '$StudFatherName', '$StudGender', '$StudBirthDate', '$StudBirthPlace', '$StudCitizenship')";
    
    if ($result = $conn->query($sql)) {
        echo "<h3>Οι λεπτομέρειες του φοιτητή προστέθηκαν με επιτυχία.</h3>";
    } else {
        echo "<h3>Σφάλμα: Δεν ήταν δυνατή η προσθήκη των λεπτομερειών του φοιτητή.</h3>";
        echo "<p>Σφάλμα: " . $conn->error . "</p>";
    }
    
    if (isset($type) && $type == 'under') {
        $AdmissionRank = (isset($_POST['AdmissionRank']) && $_POST['AdmissionRank'] != '') ? $_POST['AdmissionRank'] : null;
        if ($AdmissionRank === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Κατάταξη Εισαγωγής.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $AdmissionType = (isset($_POST['AdmissionType']) && $_POST['AdmissionType'] != '') ? $_POST['AdmissionType'] : null;
        if ($AdmissionType === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Τύπο Εισαγωγής.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $sql = "INSERT INTO undergraduate (AM_ID, AdmissionRank, AdmissionType) VALUES ('$AM_ID', $AdmissionRank, '$AdmissionType')";
        if ($conn->query($sql)) {
            echo "<h3>Οι λεπτομέρειες του προπτυχιακού φοιτητή προστέθηκαν με επιτυχία.</h3>";
        }  else {
            echo "<h3>Σφάλμα: Δεν ήταν δυνατή η προσθήκη των λεπτομερειών του προπτυχιακού φοιτητή.</h3>";
            echo "<p>Σφάλμα: " . $conn->error . "</p>";
        }
    } else if (isset($type) && $type == 'post') {
        $FirstDegree = (isset($_POST['FirstDegree']) && $_POST['FirstDegree'] != '') ? $_POST['FirstDegree'] : null;
        if ($FirstDegree === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Πρώτο Τίτλο.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $sql = "INSERT INTO postgraduate (AM_ID, FirstDegree) VALUES ('$AM_ID', '$FirstDegree')";
        if ($conn->query($sql)) {
            echo "<h3>Οι λεπτομέρειες του μεταπτυχιακού φοιτητή προστέθηκαν με επιτυχία.</h3>";
        } else {
            echo "<h3>Σφάλμα: Δεν ήταν δυνατή η προσθήκη των λεπτομερειών του μεταπτυχιακού φοιτητή.</h3>";
            echo "<p>Σφάλμα: " . $conn->error . "</p>";
        }
    } else if (isset($type) && $type == 'ptc') {
        $UniversityOfOrigin = (isset($_POST['UniversityOfOrigin']) && $_POST['UniversityOfOrigin'] != '') ? $_POST['UniversityOfOrigin'] : null;
        if ($UniversityOfOrigin === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Πανεπιστήμιο Προέλευσης.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $DepartmentOfOrigin = (isset($_POST['DepartmentOfOrigin']) && $_POST['DepartmentOfOrigin'] != '') ? $_POST['DepartmentOfOrigin'] : null;
        if ($DepartmentOfOrigin === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Τμήμα Προέλευσης.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $sql = "INSERT INTO ptc (AM_ID, UniversityOfOrigin, DepartmentOfOrigin) VALUES ('$AM_ID', '$UniversityOfOrigin', '$DepartmentOfOrigin')";
        if ($conn->query($sql)) {
            echo "<h3>Οι λεπτομέρειες του φοιτητή PTC προστέθηκαν με επιτυχία.</h3>";
        } else {
            echo "<h3>Σφάλμα: Δεν ήταν δυνατή η προσθήκη των λεπτομερειών του φοιτητή PTC.</h3>";
            echo "<p>Σφάλμα: " . $conn->error . "</p>";
        }
    }
    $conn->close();
?>
</body>
</html>