<?php
require('./Data/Db.php');
require('./Validations/Validate.php');

/**
 * Constant.
 *   To store the DISPLAY query for match table.
 */
define('DISPLAYMATCHTABLE', "SELECT m.Match_ID, m.Venue, m.Match_data, t1.Teams_name AS team1_name,t2.Teams_name AS team2_name FROM Matches m JOIN Teams t1 ON m.Team1 = t1.Team_ID JOIN Teams t2 ON  m.Team2 = t2.Team_ID");

/**
 * Global variable.
 * 
 * @var array $errors;
 *   Stores the errors for the different input fields after validation.
 */
$errors = [];

/**
 * Create the instase of the class Query.
 */
$query = new Db();

/**
 * To connect the database.
 */
$query->connectDB();

/**
 * To Call run the query.
 * 
 * @param string $query;
 *   The SQL query to select the column of Match_ID, Venue, Team1 name, Team2 name.
 * 
 * @return array $row;
 *   The data from database.
 */
$row = $query->runQuery(DISPLAYMATCHTABLE);

// PHP ends here.
?>

<!-- HTML starts here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link bootstrap css. -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
    <!-- Link custom css. -->
    <link rel="stylesheet" href="./Styles/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container mt-5">
            <table class="table caption-top  table-hover" id="myTable">
                <h1>List of Matches</h1>
                <a class="btn btn-primary my-2" href="./addMatch.php">Add Match</a>
                <thead>
                    <tr class="table-dark py-3">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Venue</th>
                        <th scope="col">First team</th>
                        <th scope="col">Another team</th>
                        <th scope="col">Show Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Print all data in the form of HTML table.
                    foreach ($row as $rdb) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $rdb['Match_ID']; ?></th>
                            <td><?php echo $rdb['Match_data']; ?></td>
                            <td><?php echo $rdb['Venue']; ?></td>
                            <td><?php echo $rdb['team1_name'] ?></td>
                            <td><?php echo $rdb['team2_name']; ?></td>
                            <td><a class="btn btn-success" href="matchDetail.php?id=<?php echo $rdb['Match_ID'] ?>">More detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="./JS/script.js"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <!-- Add script from bootstrap. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>