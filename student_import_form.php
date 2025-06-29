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

    $sql = "SELECT s.PROF_ID, ProfFname, ProfMname, ProfLname FROM student s, professor p WHERE s.DEPT_ID = '$DEPT_ID' AND s.PROF_ID = p.PROF_ID";

    include 'conn_db.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $PROF_ID = $row["PROF_ID"];
        }
    }
?>
<form action="student_import.php?DEPT_ID=<?php echo $_GET['DEPT_ID']; ?>&type=<?php echo $_GET['type']; ?>" method="post">
    Αριθμός Μητρώου: <input type="text" name="AM_ID" id="AM_ID" required><br>
    Σύμβουλος Καθηγητής:
    <select id='PROF_ID' name='PROF_ID'>
        <?php
            $sql = "SELECT PROF_ID, ProfFname, ProfMname, ProfLname FROM professor WHERE DEPT_ID = '$DEPT_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $prof_id = $row["PROF_ID"];
                    $proffname = $row["ProfFname"];
                    $profmname = $row["ProfMname"];
                    $proflname = $row["ProfLname"];
                    if ($PROF_ID == $prof_id) {
                        echo "<option value='$prof_id' selected>$proffname $profmname $proflname - $prof_id</option>";
                    } else {
                        echo "<option value='$prof_id'>$proffname $profmname $proflname - $prof_id</option>";
                    }
                }
            }
        ?>
    </select><br>
    Όνομα: <input type="text" name="StudFname" id="StudFname" required><br>
    Μεσαίο Όνομα: <input type="text" name="StudSname" id="StudSname"><br>
    Επώνυμο: <input type="text" name="StudLname" id="StudLname" required><br>
    Διεύθυνση: <input type="text" name="StudAddress" id="StudAddress"><br>
    Τηλέφωνο: <input type="text" name="StudPhoneNumber" id="StudPhoneNumber"><br>
    Email: <input type="email" name="StudEmail" id="StudEmail"><br>
    Όνομα Πατέρα: <input type="text" name="StudFatherName" id="StudFatherName"><br>
    Φύλο:
    <select id='StudGender' name='StudGender'>
        <option value='Male'>Male</option>
        <option value='Female'>Female</option>
        <option value='Other'>Other</option>
    </select><br>
    Ημερομηνία Γέννησης: <input type="date" name="StudBirthDate" id="StudBirthDate"><br>
    Τόπος Γέννησης: <input type="text" name="StudBirthPlace" id="StudBirthPlace"><br>
    Ιθαγένεια: <input type="text" name="StudCitizenship" id="StudCitizenship"><br>
    <?php
        $type = $_GET['type'];
        if (isset($type) && $type == 'under') {
            echo "Κατάταξη Εισαγωγής: <input id='AdmissionRank' name='AdmissionRank' type='text'><br>";
            echo "Τύπος Εισαγωγής: <input id='AdmissionType' name='AdmissionType' type='text'><br>";
        }
        if (isset($type) && $type == 'post') {
            echo "Πρώτο Πτυχίο: <input id='FirstDegree' name='FirstDegree' type='text'><br>";
            }
        if (isset($type) && $type == 'ptc') {
            echo "Πανεπιστήμιο Προέλευσης: <input id='UniversityOfOrigin' name='UniversityOfOrigin' type='text'><br>";
            echo "Τμήμα Προέλευσης: <input id='DepartmentOfOrigin' name='DepartmentOfOrigin' type='text'><br>";
        }
    ?>
    <input type="submit" value="Εισαγωγή Φοιτητή">
</form>
<p><a href='student.php?DEPT_ID=<?php echo $DEPT_ID; ?>&type=<?php echo $type; ?>'>Επιστροφή</a></p>
</body>
</html>