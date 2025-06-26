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
        $AM_ID = $_GET['AM_ID'];
        $DEPT_ID = $_GET['DEPT_ID'];

        $sql = "SELECT * FROM student WHERE AM_ID = '$AM_ID' AND DEPT_ID = '$DEPT_ID'";

        include 'conn_db.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $AM_ID = $row["AM_ID"];
                $DEPT_ID = $row["DEPT_ID"];
                $PROF_ID = $row["PROF_ID"];
                $StudFname = $row["StudFname"];
                $StudMname = $row["StudMname"];
                $StudLname = $row["StudLname"];
                $StudAddress = $row["StudAddress"];
                $StudPhone = $row["StudPhoneNumber"];
                $StudEmail = $row["StudEmail"];
                $StudFatherName = $row["StudFatherName"];
                $StudGender = $row["StudGender"];
                $StudBirthDate = $row["StudBirthDate"];
                $StudBirthPlace = $row["StudBirthPlace"];
                $StudCitizenship = $row["StudCitizenship"];
            }
        }
    ?>
    <form action="student_update.php?type=" method="POST">
        Αριθμός Μητρώου: <input id='AM_ID' name='AM_ID' type='text' name="OLD_AM_ID" value="<?php echo $AM_ID; ?>"><br>
        Τμήμα:
        <select id='DEPT_ID' name='DEPT_ID'>
            <?php
                $sql = "SELECT DEPT_ID, DeptName FROM department";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $dept_id = $row["DEPT_ID"];
                        $dept_name = $row["DeptName"];
                        if ($dept_id == $DEPT_ID) {
                            echo "<option value='$dept_id' selected>$dept_name - $dept_id</option>";
                        } else {
                            echo "<option value='$dept_id'>$dept_name - $dept_id</option>";
                        }
                    }
                }
            ?>
        </select><br>
        Σύμβουλος Καθηγητής:
        <select id='PROF_ID' name='PROF_ID'>
            <option value=''>Κανείς</option>
            <?php
                $sql = "SELECT PROF_ID, ProfFname, ProfLname FROM professor WHERE DEPT_ID = '$DEPT_ID'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $prof_id = $row["PROF_ID"];
                        $proffname = $row["ProfFname"];
                        $proflname = $row["ProfLname"];
                        if ($PROF_ID == $prof_id) {
                            echo "<option value='$prof_id' selected>$proffname $proflname - $prof_id</option>";
                        } else {
                            echo "<option value='$prof_id'>$proffname $proflname - $prof_id</option>";
                        }
                    }
                }
            ?>
        </select><br>
        Όνομα: <input id='StudFname' name='StudFname' type='text' value="<?php echo $StudFname; ?>"><br>
        Μεσαίο Όνομα: <input id='StudMname' name='StudMname' type='text' value="<?php echo $StudMname; ?>"><br>
        Επώνυμο: <input id='StudLname' name='StudLname' type='text' value="<?php echo $StudLname; ?>"><br>
        Διεύθυνση: <input id='StudAddress' name='StudAddress' type='text' value="<?php echo $StudAddress; ?>"><br>
        Τηλέφωνο: <input id='StudPhoneNumber' name='StudPhoneNumber' type='text' value="<?php echo $StudPhone; ?>"><br>
        Email: <input id='StudEmail' name='StudEmail' type='text' value="<?php echo $StudEmail; ?>"><br>
        Όνομα Πατέρα: <input id='StudFatherName' name='StudFatherName' type='text' value="<?php echo $StudFatherName; ?>"><br>
        Φύλο: 
        <select id='StudGender' name='StudGender'>
            <option value='Male' <?php if ($StudGender == 'Male') {echo "selected";} ?>>Male</option>
            <option value='Female' <?php if ($StudGender == 'Female') {echo "selected";} ?>>Female</option>
            <option value='Other' <?php if ($StudGender == 'Other') {echo "selected";} ?>>Other</option>
        </select><br>
        Ημερομηνία Γέννησης: <input id='StudBirthDate' name='StudBirthDate' type='date' value="<?php echo $StudBirthDate; ?>"><br>
        Τόπος Γέννησης: <input id='StudBirthPlace' name='StudBirthPlace' type='text' value="<?php echo $StudBirthPlace; ?>"><br>
        Ιθαγένεια: <input id='StudCitizenship' name='StudCitizenship' type='text' value="<?php echo $StudCitizenship; ?>"><br>
        <?php
            $type = $_GET['type'];
            if (isset($type) && $type == 'under') {
                $sql = "SELECT AdmissionRank, AdmissionType FROM undergraduate WHERE AM_ID = '$AM_ID'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                    $AdmissionRank = $row["AdmissionRank"];
                    $AdmissionType = $row["AdmissionType"];
                    echo "Κατάταξη Εισαγωγής: <input id='AdmissionRank' name='AdmissionRank' type='text' value='$AdmissionRank'><br>";
                    echo "Τύπος Εισαγωγής: <input id='AdmissionType' name='AdmissionType' type='text' value='$AdmissionType'><br>";
                }
            }
            if (isset($type) && $type == 'post') {
                $sql = "SELECT FirstDegree FROM postgraduate WHERE AM_ID = '$AM_ID'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                    $FirstDegree = $row["FirstDegree"];
                    echo "Πρώτο Πτυχίο: <input id='FirstDegree' name='FirstDegree' type='text' value='$FirstDegree'><br>";
                }
            }
            if (isset($type) && $type == 'ptc') {
                $sql = "SELECT UniversityOfOrigin, DepartmentOfOrigin FROM ptc WHERE AM_ID = '$AM_ID'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                    $UniversityOfOrigin = $row["UniversityOfOrigin"];
                    $DepartmentOfOrigin = $row["DepartmentOfOrigin"];
                    echo "Πανεπιστήμιο Προέλευσης: <input id='UniversityOfOrigin' name='UniversityOfOrigin' type='text' value='$UniversityOfOrigin'><br>";
                    echo "Τμήμα Προέλευσης: <input id='DepartmentOfOrigin' name='DepartmentOfOrigin' type='text' value='$DepartmentOfOrigin'><br>";
                }
            }
        ?>
        <input type='submit' value='Ενημέρωση Στοιχείων'>
    </form>
</body>
</html>