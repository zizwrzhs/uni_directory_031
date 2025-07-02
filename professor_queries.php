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
        echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Καθηγητών</a></li>";
        echo "</ul>";
        echo "<hr>";

        $query = $_GET['query'];

        include 'conn_db.php';

        if ($query == 'info') {
            $sql = 'SELECT p.ProfFname, p.ProfMname, p.ProfLname, p.ProfSpeciality, d.DeptName, d.DeptAddress FROM professor p, department d WHERE p.DEPT_ID = d.DEPT_ID';
            echo "<h2>Πληροφορίες Καθηγητών</h2>";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Όνομα</th><th>Μεσαίο Όνομα</th><th>Επώνυμο</th><th>Ειδικότητα</th><th>Τμήμα</th><th>Διεύθυνση Τμήματος</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ProfFname'] . "</td>";
                    echo "<td>" . $row['ProfMname'] . "</td>";
                    echo "<td>" . $row['ProfLname'] . "</td>";
                    echo "<td>" . $row['ProfSpeciality'] . "</td>";
                    echo "<td>" . $row['DeptName'] . "</td>";
                    echo "<td>" . $row['DeptAddress'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Δεν βρέθηκαν αποτελέσματα.</p>";
            }
        } elseif ($query == 'thesis') {
            echo "<h2>Πτυχιακές Εργασίες Καθηγητή</h2>";
            echo "<form action='professor_thesis_result.php?DEPT_ID=$DEPT_ID&query=$query' method='post'>";
            echo "Καθηγητής: <select id='PROF_ID' name='PROF_ID'>";
            $sql = "SELECT PROF_ID, ProfFname, ProfMname, ProfLname FROM professor WHERE DEPT_ID = '$DEPT_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $PROF_ID = $row["PROF_ID"];
                    $ProfFname = $row["ProfFname"];
                    $ProfMname = $row["ProfMname"];
                    $ProfLname = $row["ProfLname"];
                    echo "<option value='$PROF_ID'>$ProfFname $ProfMname $ProfLname - $PROF_ID</option>";
                }
            }
            echo "</select><br>";
            echo "<input type='submit' value='Αναζήτηση'>";
            echo "</form>";
        }
    ?>
</body>
</html>