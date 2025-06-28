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

    $type = $_GET['type'];
    $type1 = $_GET['type1'];

    $DEPT_ID = $_POST['DEPT_ID'];
    $AM_ID = (isset($_POST['AM_ID']) && $_POST['AM_ID'] != '') ? $_POST['AM_ID'] : null;
    if ($AM_ID === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Αριθμό Μητρώου του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $PROF_ID = $_POST['PROF_ID'];
    $StudFname = (isset($_POST['StudFname']) && $_POST['StudFname'] != '') ? $_POST['StudFname'] : null;
    if ($StudFname === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    if (isset($_POST['StudMname']) && $_POST['StudMname'] !== '') {
        $StudMname = "'" . $conn->real_escape_string($_POST['StudMname']) . "'";
    } else {
        $StudMname = "NULL";
    }
    $StudLname = (isset($_POST['StudLname']) && $_POST['StudLname'] != '') ? $_POST['StudLname'] : null;
    if ($StudLname === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Επώνυμο του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudAddress = (isset($_POST['StudAddress']) && $_POST['StudAddress'] != '') ? $_POST['StudAddress'] : null;
    if ($StudAddress === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τη Διεύθυνση του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudPhoneNumber = (isset($_POST['StudPhoneNumber']) && $_POST['StudPhoneNumber'] != '') ? $_POST['StudPhoneNumber'] : null;
    if ($StudPhoneNumber === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Αριθμό Τηλεφώνου του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudEmail = (isset($_POST['StudEmail']) && $_POST['StudEmail'] != '') ? $_POST['StudEmail'] : null;
    if ($StudEmail === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Email του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudFatherName = (isset($_POST['StudFatherName']) && $_POST['StudFatherName'] != '') ? $_POST['StudFatherName'] : null;
    if ($StudFatherName === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Όνομα του Πατέρα του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudGender = $_POST['StudGender'];
    $StudBirthDate = (isset($_POST['StudBirthDate']) && $_POST['StudBirthDate'] != '') ? $_POST['StudBirthDate'] : null;
    if ($StudBirthDate === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ημερομηνία Γέννησης του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudBirthPlace = (isset($_POST['StudBirthPlace']) && $_POST['StudBirthPlace'] != '') ? $_POST['StudBirthPlace'] : null;
    if ($StudBirthPlace === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Τόπο Γέννησης του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }
    $StudCitizenship = (isset($_POST['StudCitizenship']) && $_POST['StudCitizenship'] != '') ? $_POST['StudCitizenship'] : null;
    if ($StudCitizenship === null) {
        echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Ιθαγένεια του φοιτητή.</h3>";
        echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
        exit;
    }

    $sql = "UPDATE student SET AM_ID = '$AM_ID', DEPT_ID = '$DEPT_ID', PROF_ID = '$PROF_ID',
            StudFname = '$StudFname', StudMname = $StudMname, StudLname = '$StudLname',
            StudAddress = '$StudAddress', StudPhoneNumber = '$StudPhoneNumber', 
            StudEmail = '$StudEmail', StudFatherName = '$StudFatherName', 
            StudGender = '$StudGender', StudBirthDate = '$StudBirthDate',
            StudBirthPlace = '$StudBirthPlace', StudCitizenship = '$StudCitizenship' WHERE AM_ID = '$AM_ID' AND DEPT_ID = '$DEPT_ID'";
    
    try {
        $conn->query($sql);
        echo "<p>Ο φοιτητής με Αριθμό Μητρώου $AM_ID ενημερώθηκε επιτυχώς.</p>";
    } catch (Exception $e) {
        echo "<h3>Σφάλμα κατά την ενημέρωση του φοιτητή: </h3>";
        echo "<p>Παρακαλώ ελέγξτε τα δεδομένα σας και προσπαθήστε ξανά.</p>";
        echo "<p>Σφάλμα: " . $e->getMessage() . "</p>";
    }
    
    if ($type == 'under') {
        $AdmissionRank = (isset($_POST['AdmissionRank']) && $_POST['AdmissionRank'] != '') ? $_POST['AdmissionRank'] : null;
        if ($AdmissionRank === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε την Κατάταξη Εισαγωγής του προπτυχιακού φοιτητή.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $AdmissionType = (isset($_POST['AdmissionType']) && $_POST['AdmissionType'] != '') ? $_POST['AdmissionType'] : null;
        if ($AdmissionType === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε τον Τύπο Εισαγωγής του προπτυχιακού φοιτητή.</h3>";
            echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
            exit;
        }
        $sql = "UPDATE undergraduate SET AdmissionRank = '$AdmissionRank', AdmissionType = '$AdmissionType' WHERE AM_ID = '$AM_ID'";
        try {
            $conn->query($sql);
            echo "<p>Οι πληροφορίες προπτυχιακού φοιτητή ενημερώθηκαν επιτυχώς.</p>";
        } catch (Exception $e) {
            echo "<h3>Σφάλμα κατά την ενημέρωση των πληροφοριών προπτυχιακού φοιτητή: </h3>";
            echo "<p>Παρακαλώ ελέγξτε τα δεδομένα σας και προσπαθήστε ξανά.</p>";
            echo "<p>Σφάλμα: " . $e->getMessage() . "</p>";
        }
    } elseif ($type == 'post') {
        $FirstDegree = (isset($_POST['FirstDegree']) && $_POST['FirstDegree'] != '') ? $_POST['FirstDegree'] : null;
        if ($FirstDegree === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Πρώτο Πτυχίο του μεταπτυχιακού φοιτητή.</h3>";
        }
        $sql = "UPDATE postgraduate SET FirstDegree = '$FirstDegree' WHERE AM_ID = '$AM_ID'";
        try {
            $conn->query($sql);
            echo "<p>Οι πληροφορίες μεταπτυχιακού φοιτητή ενημερώθηκαν επιτυχώς.</p>";
        } catch (Exception $e) {
            echo "<h3>Σφάλμα κατά την ενημέρωση των πληροφοριών μεταπτυχιακού φοιτητή: </h3>";
            echo "<p>Παρακαλώ ελέγξτε τα δεδομένα σας και προσπαθήστε ξανά.</p>";
            echo "<p>Σφάλμα: " . $e->getMessage() . "</p>";
        }
    } elseif ($type == 'ptc') {
        $UniversityOfOrigin = (isset($_POST['UniversityOfOrigin']) && $_POST['UniversityOfOrigin'] != '') ? $_POST['UniversityOfOrigin'] : null;
        if ($UniversityOfOrigin === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Πανεπιστήμιο Προέλευσης του PTC φοιτητή.</h3>";
        }
        $DepartmentOfOrigin = (isset($_POST['DepartmentOfOrigin']) && $_POST['DepartmentOfOrigin'] != '') ? $_POST['DepartmentOfOrigin'] : null;
        if ($DepartmentOfOrigin === null) {
            echo "<h3>Σφάλμα: Παρακαλώ εισάγετε το Τμήμα Προέλευσης του PTC φοιτητή.</h3>";
        }
        $sql = "UPDATE ptc SET UniversityOfOrigin = '$UniversityOfOrigin', DepartmentOfOrigin = '$DepartmentOfOrigin' WHERE AM_ID = '$AM_ID'";
        try {
            $conn->query($sql);
            echo "<p>Οι πληροφορίες PTC φοιτητή ενημερώθηκαν επιτυχώς.</p>";
        } catch (Exception $e) {
            echo "<h3>Σφάλμα κατά την ενημέρωση των πληροφοριών PTC φοιτητή: </h3>";
            echo "<p>Παρακαλώ ελέγξτε τα δεδομένα σας και προσπαθήστε ξανά.</p>";
            echo "<p>Σφάλμα: " . $e->getMessage() . "</p>";
        }
    }
    echo "<p><a href='student_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type1'>Επιστροφή στα αποτελέσματα</a></p>";
    $conn->close();
?>
</body>
</html>