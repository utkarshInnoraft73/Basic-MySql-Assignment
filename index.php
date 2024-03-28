<?php
require('./Data/Db.php');

/**
 * Constant variable to stores query to display.
 */
define("DISPLAYTABLE", "SELECT * FROM ");

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
$employee_code = $query->runQuery(DISPLAYTABLE . 'employee_code_table');
$employee_salary = $query->runQuery(DISPLAYTABLE . 'employee_salary_table');
$employee_details = $query->runQuery(DISPLAYTABLE . 'employee_details_table');

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
</head>

<body>
    <div class="wrapper">

        <!-- Employee Code table. -->
        <div class="container mt-5">
            <table class="table caption-top  table-hover" id="myTable">
                <a href="./addEmployeeDetails.php" class="btn btn-primary my-2 me-2">Add employee details.</a>
                <a href="./results.php" class="btn btn-primary my-2">See results.</a>
                <thead>
                    <tr>
                        <th colspan="3" class="fs-5 text-center">Employee code Table.</th>
                    </tr>
                    <tr class="table-dark py-3">
                        <th scope="col" class="text-center">Employee Code</th>
                        <th scope="col" class="text-center">Code name</th>
                        <th scope="col" class="text-center">Domain</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Print all data in the form of HTML table.
                    foreach ($employee_code as $rdb) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $rdb['employee_code']; ?></td>
                            <td class="text-center"><?php echo $rdb['employee_code_name']; ?></td>
                            <td class="text-center"><?php echo $rdb['employee_domain']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Employee salary table. -->
        <div class="container mt-5">
            <table class="table caption-top  table-hover" id="myTable">
                <thead>
                    <tr>
                        <th colspan="3" class="fs-5 text-center">Employee salary Table.</th>
                    </tr>
                    <tr class="table-dark py-3">
                        <th scope="col" class="text-center">Employee ID</th>
                        <th scope="col" class="text-center">Salary</th>
                        <th scope="col" class="text-center">Employee code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Print all data in the form of HTML table.
                    foreach ($employee_salary as $rdb) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $rdb['employee_id']; ?></td>
                            <td class="text-center"><?php echo $rdb['employee_salary']; ?></td>
                            <td class="text-center"><?php echo $rdb['employee_code']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Employee details table. -->
        <div class="container mt-5">
            <table class="table caption-top  table-hover" id="myTable">
                <thead>
                    <tr>
                        <th colspan="4" class="fs-5 text-center">Employee details Table.</th>
                    </tr>
                    <tr class="table-dark py-3">
                        <th scope="col" class="text-center">Employee ID</th>
                        <th scope="col" class="text-center">First name</th>
                        <th scope="col" class="text-center">Last name</th>
                        <th scope="col" class="text-center">Graduation percentile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Print all data in the form of HTML table.
                    foreach ($employee_details as $rdb) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $rdb['employee_id']; ?></td>
                            <td class="text-center"><?php echo $rdb['employee_first_name']; ?></td>
                            <td class="text-center"><?php echo $rdb['employee_last_name']; ?></td>
                            <td class="text-center"><?php echo $rdb['graduation_percentile']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add script from bootstrap. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>