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
    $type = $_GET['type'];

    $AM_ID = $_POST['AM_ID'];
    $DEPT_ID = $_POST['DEPT_ID'];
    $PROF_ID = $_POST['PROF_ID'];
    $StudFname = $_POST['StudFname'];
    $StudMname = $_POST['StudMname'];
    $StudLname = $_POST['StudLname'];
    $StudAddress = $_POST['StudAddress'];
    $StudPhoneNumber = $_POST['StudPhoneNumber'];
    $StudEmail = $_POST['StudEmail'];
    $StudFatherName = $_POST['StudFatherName'];
    $StudGender = $_POST['StudGender'];
    $StudBirthDate = $_POST['StudBirthDate'];
    $StudBirthPlace = $_POST['StudBirthPlace'];
    $StudCitizenship = $_POST['StudCitizenship'];

    $sql = "UPDATE student SET AM_ID = '$AM_ID', DEPT_ID = '$DEPT_ID', PROF_ID = '$PROF_ID',
            StudFname = '$StudFname', StudMname = '$StudMname', StudLname = '$StudLname',
            StudAddress = '$StudAddress', StudPhoneNumber = '$StudPhoneNumber', 
            StudEmail = '$StudEmail', StudFatherName = '$StudFatherName', 
            StudGender = '$StudGender', StudBirthDate = '$StudBirthDate',
            StudBirthPlace = '$StudBirthPlace', StudCitizenship = '$StudCitizenship' WHERE AM_ID = '$AM_ID' AND DEPT_ID = '$DEPT_ID'";
    
    try {
        include 'conn_db.php';
        $conn->query($sql);
        echo "<p>Ο φοιτητής με Αριθμό Μητρώου $AM_ID ενημερώθηκε επιτυχώς.</p>";
    }
    catch (Exception $e) {
        echo "<p>Σφάλμα κατά την ενημέρωση του φοιτητή: </p>";
        if ($e->getCode() == 1451) {
            echo "<p>Ο φοιτητής με Αριθμό Μητρώου $AM_ID δεν μπορεί να ενημερωθεί, επειδή υπάρχουν εξαρτήσεις σε άλλους πίνακες.</p>";
        }
        echo "<p>Παρακαλώ ελέγξτε τα δεδομένα και προσπαθήστε ξανά.</p>";
        echo "<p>Σφάλμα: " . $e->getMessage() . "</p>";
    }
    if ($type == 'under') {
        $AdmissionRank = $_POST['AdmissionRank'];
        $AdmissionType = $_POST['AdmissionType'];
    }
    if ($type == 'post') {
        $FirstDegree = $_POST['FirstDegree'];
    }
    if ($type == 'ptc') {
        $UniversityOfOrigin = $_POST['UniversityOfOrigin'];
        $DepartmentOfOrigin = $_POST['DepartmentOfOrigin'];
    }
?>
</body>
</html>