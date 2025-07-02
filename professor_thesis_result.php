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
        $PROF_ID = $_POST['PROF_ID'];
        $query = $_GET['query'];

        echo "<ul>";
        echo "<li><a href='index.html'>Αρχική Σελίδα</a></li>";
        echo "<li><a href='uni.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Τμήματος</a></li>";
        echo "<li><a href='professor.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Καθηγητών</a></li>";
        echo "<li><a href='professor_queries.php?DEPT_ID=$DEPT_ID&query=$query'>Επιστροφή</a></li>";
        echo "</ul>";
        echo "<hr>";

        include 'conn_db.php';
        $sql = "SELECT t.AM_ID, s.StudFname, s.StudMname, s.StudLname, t.ThesisName FROM thesis t, student s WHERE t.PROF_ID = '$PROF_ID' AND t.AM_ID = s.AM_ID";
        $result = $conn->query($sql);
        echo "<h2>Theses Supervised by Professor $PROF_ID</h2>";
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Student ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Thesis Title</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["AM_ID"] . "</td><td>" . $row["StudFname"] . "</td><td>" . $row["StudMname"] . "</td><td>" . $row["StudLname"] . "</td><td>" . $row["ThesisName"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No theses found.";
        }
    ?>
</body>
</html>