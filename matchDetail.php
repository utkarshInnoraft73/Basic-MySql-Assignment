<?php
require('./Data/Db.php');

/**
 * Create the instase of the class Query.
 */
$query = new Db();

/**
 * Connect the database.
 */
$query->connectDB();

// Initialize $row to null in case no match is found
$row = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Store the query to display selected match details .
    $displayMatchDetail = "SELECT m.Match_ID, m.Venue, m.Match_data, t1.Teams_name AS team1_name, t1.Captian AS team1_captain, t2.Teams_name AS team2_name, t2.Captian AS team2_captain, t3.Teams_name AS toss_won, t4.Teams_name AS match_won FROM Matches m JOIN Teams t1 ON m.Team1 = t1.Team_ID JOIN Teams t2 ON m.Team2 = t2.Team_ID JOIN Teams t3 ON m.Toss_won = t3.Team_ID JOIN Teams t4 ON m.Match_won = t4.Team_ID WHERE m.Match_ID = $id";

    // Fetch only one row where Match_ID matches the provided id.
    $result = $query->runQuery($displayMatchDetail);

    // Fetch the first (and hopefully only) row from the result set.
    $row = $result ? $result[0] : null;
}

// PHP ends here.
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Match detail</title>
    <!-- Custom CSS. -->
    <link rel="stylesheet" href="./Styles/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card" style="width: 30rem;margin:auto;">
            <h4 class="card-header bg-dark text-light">
                Details about match-<?php echo $row['Match_ID']; ?>
            </h4>
            <ul class="list-group list-group-flush">
                <?php if ($row) : ?>
                    <li class="list-group-item">ID: <?php echo $row['Match_ID'] ?></li>
                    <li class="list-group-item">Date: <?php echo $row['Match_data'] ?> </li>
                    <li class="list-group-item">Venue: <?php echo $row['Venue'] ?></li>
                    <li class="list-group-item">First team: <?php echo $row['team1_name'] ?></li>
                    <li class="list-group-item">1st Captain: <?php echo $row['team1_captain'] ?></li>
                    <li class="list-group-item">Second team: <?php echo $row['team2_name'] ?></li>
                    <li class="list-group-item">2nd Captain: <?php echo $row['team2_captain'] ?></li>
                    <li class="list-group-item">Toss winner: <?php echo $row['toss_won'] ?></li>
                    <li class="list-group-item">Match winner: <?php echo $row['match_won'] ?></li>
                <?php else : ?>
                    <li class="list-group-item">No match found with ID: <?php echo $id ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Bootstrap javaScrip CDN. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>