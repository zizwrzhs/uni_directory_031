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
        $PROF_ID = $_GET['PROF_ID'];
        $DEPT_ID = $_GET['DEPT_ID'];

        $sql = "SELECT * FROM professor WHERE PROF_ID = '$PROF_ID' AND DEPT_ID = '$DEPT_ID'";

        include 'conn_db.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $PROF_ID = $row["PROF_ID"];
                $DEPT_ID = $row["DEPT_ID"];
                $ProfFname = $row["ProfFname"];
                $ProfMname = $row["ProfMname"];
                $ProfLname = $row["ProfLname"];
                $ProfAddress = $row["ProfAddress"];
                $ProfPhoneNumber = $row["ProfPhoneNumber"];
                $ProfEmail = $row["ProfEmail"];
                $ProfFatherName = $row["ProfFatherName"];
                $ProfGender = $row["ProfGender"];
                $ProfBirthDate = $row["ProfBirthDate"];
                $ProfBirthPlace = $row["ProfBirthPlace"];
                $ProfCitizenship = $row["ProfCitizenship"];
                $ProfSpeciality = $row["ProfSpeciality"];
                $ProfRank = $row["ProfRank"];
                $ProfSubjectArea = $row["ProfSubjectArea"];
            }
        }
        $type = $_GET['type'];

        echo "<ul>";
        echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
        echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
        echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Καθηγητών</a></li>";
        echo "<li><a href='professor_showedit.php?DEPT_ID=$DEPT_ID'>Επιστροφή στα Είδη Καθηγητών</a></li>";
        echo "<li><a href='professor_showedit_results.php?DEPT_ID=$DEPT_ID&type=$type'>Επιστροφή</a></li>";
        echo "</ul>";
        echo "<hr>";

        echo "<form action='professor_update.php?DEPT_ID=$DEPT_ID&PROF_ID=$PROF_ID&type=$type' method='POST'>"; ?>
        Κωδικός Καθηγητή: <input id='PROF_ID' name='PROF_ID' type='text' name="OLD_PROF_ID" value="<?php echo $PROF_ID; ?>"><br>
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
        Όνομα: <input id='ProfFname' name='ProfFname' type='text' value="<?php echo $ProfFname; ?>"><br>
        Μεσαίο Όνομα: <input id='ProfMname' name='ProfMname' type='text' value="<?php echo $ProfMname; ?>"><br>
        Επώνυμο: <input id='ProfLname' name='ProfLname' type='text' value="<?php echo $ProfLname; ?>"><br>
        Διεύθυνση: <input id='ProfAddress' name='ProfAddress' type='text' value="<?php echo $ProfAddress; ?>"><br>
        Τηλέφωνο: <input id='ProfPhoneNumber' name='ProfPhoneNumber' type='text' value="<?php echo $ProfPhoneNumber; ?>"><br>
        Email: <input id='ProfEmail' name='ProfEmail' type='text' value="<?php echo $ProfEmail; ?>"><br>
        Όνομα Πατέρα: <input id='ProfFatherName' name='ProfFatherName' type='text' value="<?php echo $ProfFatherName; ?>"><br>
        Φύλο: 
        <select id='ProfGender' name='ProfGender'>
            <option value='Male' <?php if ($ProfGender == 'Male') {echo "selected";} ?>>Male</option>
            <option value='Female' <?php if ($ProfGender == 'Female') {echo "selected";} ?>>Female</option>
            <option value='Other' <?php if ($ProfGender == 'Other') {echo "selected";} ?>>Other</option>
        </select><br>
        Ημερομηνία Γέννησης: <input id='ProfBirthDate' name='ProfBirthDate' type='date' value="<?php echo $ProfBirthDate; ?>"><br>
        Τόπος Γέννησης: <input id='ProfBirthPlace' name='ProfBirthPlace' type='text' value="<?php echo $ProfBirthPlace; ?>"><br>
        Ιθαγένεια: <input id='ProfCitizenship' name='ProfCitizenship' type='text' value="<?php echo $ProfCitizenship; ?>"><br>
        Ειδικότητα: <input id='ProfSpeciality' name='ProfSpeciality' type='text' value="<?php echo $ProfSpeciality; ?>"><br>
        Βαθμίδα:
        <select id='ProfRank' name='ProfRank'>
            <option value='Professor' <?php if ($ProfRank == 'Professor') {echo "selected";} ?>>Professor</option>
            <option value='Associate Professor' <?php if ($ProfRank == 'Associate Professor') {echo "selected";} ?>>Associate Professor</option>
            <option value='Assistant Professor' <?php if ($ProfRank == 'Assistant Professor') {echo "selected";} ?>>Assistant Professor</option>
        </select><br>
        Τομέας Ειδίκευσης: <input id='ProfSubjectArea' name='ProfSubjectArea' type='text' value="<?php echo $ProfSubjectArea; ?>"><br>
        <input type='submit' value='Ενημέρωση Στοιχείων'>
    </form>
</body>
</html>