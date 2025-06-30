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
        echo "<li><a href='student.php?DEPT_ID=$DEPT_ID'>Επιστροφή στο μενού Φοιτητών</a></li>";
        echo "</ul>";
        echo "<hr>";

        $query = $_GET['query'];

        include 'conn_db.php';

        echo "<form action='student_queries_result.php?DEPT_ID=$DEPT_ID&query=$query' method='post'>";
        echo "Φοιτητής: <select id='AM_ID' name='AM_ID'>";
        $sql = "SELECT AM_ID, StudFname, StudMname, StudLname FROM student WHERE DEPT_ID = '$DEPT_ID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $AM_ID = $row["AM_ID"];
                $StudFname = $row["StudFname"];
                $StudMname = $row["StudMname"];
                $StudLname = $row["StudLname"];
                echo "<option type='text' id='AM_ID' name='AM_ID' value='$AM_ID'>$StudFname $StudMname $StudLname - $AM_ID</option>";
            }
        }
        if ($query == 'attend_prof') {
            echo "Καθηγητής: <select id='PROF_ID' name='PROF_ID'>";
            $sql = "SELECT PROF_ID, ProfFname, ProfMname, ProfLname FROM professor WHERE DEPT_ID = '$DEPT_ID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "Καθηγητής: <select id='PROF_ID' name='PROF_ID'>";
                while ($row = $result->fetch_assoc()) {
                    $PROF_ID = $row["PROF_ID"];
                    $ProfFname = $row["ProfFname"];
                    $ProfMname = $row["ProfMname"];
                    $ProfLname = $row["ProfLname"];
                    echo "<option value='$PROF_ID'>$ProfFname $ProfMname $ProfLname - $PROF_ID</option>";
                }
                echo "</select><br>";
            }
        }
        echo "</select><br>";
        echo "<input type='submit' value='Υποβολή'>";
        echo "</form>";
    ?>
</body>
</html>