<?php

// display items
$query = "SELECT * FROM formulier ORDER BY uID ASC";
$result = mysqli_query($conn, $query);
if ($result) {
    if ($result->num_rows > 0) {
        $rowpos = 0;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $rowpos += 1;
            $test = $row['pathbijlage'];
            if ($test == null) {
                echo "<tr><td>" . $rowpos . "</td><td>" . $row['uID'] . "</td><td>" . $row['uName'] . "</td><td><a target='_blank' href=" . $row['path'] . ">Bekijk</a></td><td><a>Geen bijlage</a></td></tr>";

            } else {
                echo "<tr><td>" . $rowpos . "</td><td>" . $row['uID'] . "</td><td>" . $row['uName'] . "</td><td><a target='_blank' href=" . $row['path'] . ">Bekijk</a></td><td><a target='_blank' href=" . $row['pathbijlage'] . ">Bekijk</a></td></tr>";
            }
        }
    } else {
        echo "<h3 style='text-align: center; font-family: sans-serif;'>Er zijn geen lopende aanvragen</h3>";
    };
} else {
    echo "<h3 style='text-align: center; font-family: sans-serif;'>Er zijn geen lopende aanvragen</h3>";
}

?>