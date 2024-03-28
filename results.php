<?php
require('./Data/Db.php');

/**
 * Constant 
 *   To store the query to display the employee first name vs salary.
 */
define('DISPLAYFNAMESALARY', "SELECT detail.employee_first_name, salary.employee_salary FROM employee_details_table AS detail JOIN employee_salary_table AS salary ON salary.employee_id = detail.employee_id WHERE salary.employee_salary > '50K';");

/**
 * Constant.
 *   To store the query to display the employee last name vs percentile.
 */
define("DISPLAYLNAMEPERCENTILE", "SELECT employee_last_name, graduation_percentile FROM employee_details_table WHERE graduation_percentile > '70%';");

/**
 * Constant.
 *   To store the query to display the employee code vs graduation percentile.
 */
define("DISPLAYCODEPERVENTILE", "SELECT code.employee_code_name, detail.graduation_percentile FROM employee_details_table AS detail JOIN employee_salary_table AS salary ON salary.employee_id = detail.employee_id JOIN employee_code_table AS code ON salary.employee_code = code.employee_code WHERE detail.graduation_percentile < '70%';
");

/**
 * Constant.
 *   To strore the query to display the employee full name vs domain.
 */
define("DISPLAYFULLNAMEDOMAIN", "SELECT CONCAT(detail.employee_first_name,' ', detail.employee_last_name) AS employee_full_name, code.employee_domain FROM employee_details_table AS detail JOIN employee_salary_table AS salary ON salary.employee_id = detail.employee_id JOIN employee_code_table AS code ON code.employee_code = salary.employee_code WHERE code.employee_domain <> 'Java';");

/**
 * Constant.
 *   To store the query to display the salary sum as per domain.
 */
define("DISPLAYSALARYSUMDOMAIN", "SELECT SUM(salary.employee_salary) AS salary_sum, code.employee_domain FROM employee_code_table AS code JOIN employee_salary_table AS salary ON code.employee_code = salary.employee_code GROUP BY code.employee_domain;
");

/**
 * Constant.
 *   To strore the query to display the salary sum as per domain with less the salary 30K.
 */
define("DISPLAYSALARYSUMDOMAINLESS", "SELECT SUM(salary.employee_salary) AS salary_sum, code.employee_domain FROM employee_code_table AS code JOIN employee_salary_table AS salary ON code.employee_code = salary.employee_code WHERE salary.employee_salary < '30K' GROUP BY code.employee_domain;
");

/**
 * Constant.
 *   To store the query to display the employee vs employee code.
 */
define("DISPLAYIDCODE", "SELECT employee_id, employee_code FROM employee_salary_table WHERE employee_code = '';");

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
$fnameVsSalary = $query->runQuery(DISPLAYFNAMESALARY);
$lnameVsGraduation = $query->runQuery(DISPLAYLNAMEPERCENTILE);
$codeVsGraduation = $query->runQuery(DISPLAYCODEPERVENTILE);
$fullNameVsDomain = $query->runQuery(DISPLAYFULLNAMEDOMAIN);
$salarySumVsDomain = $query->runQuery(DISPLAYSALARYSUMDOMAIN);
$salarySumVsDomainLess = $query->runQuery(DISPLAYSALARYSUMDOMAINLESS);
$employeeIdVsCode = $query->runQuery(DISPLAYIDCODE);

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
        <thead>
          <tr>
            <th colspan="3" class="fs-5 text-center table-info">Question-1 : WAQ to list all employee first name with salary greater than 50k.</th>
          </tr>
          <tr class="table-dark py-3">
            <!-- <th scope="col" class="text-center">Employee Code</th> -->
            <th scope="col" class="text-center">First name</th>
            <th scope="col" class="text-center">Salary</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($fnameVsSalary as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['employee_first_name']; ?></td>
              <td class="text-center"><?php echo $rdb['employee_salary']; ?></td>
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
            <th colspan="3" class="fs-5 text-center table-info">Question-2 : WAQ to list all employee last name with graduation percentile greater than 70%.</th>
          </tr>
          <tr class="table-dark py-3">
            <th scope="col" class="text-center">Employee Last Name</th>
            <th scope="col" class="text-center">Graduation percentile</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($lnameVsGraduation as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['employee_last_name']; ?></td>
              <td class="text-center"><?php echo $rdb['graduation_percentile']; ?></td>
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
            <th colspan="4" class="fs-5 text-center table-info">Question-3 : WAQ to list all employee code name with graduation percentile less than 70%.</th>
          </tr>
          <tr class="table-dark py-3">

            <th scope="col" class="text-center">Employee code</th>
            <th scope="col" class="text-center">Graduation percentile</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($codeVsGraduation as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['employee_code_name']; ?></td>
              <td class="text-center"><?php echo $rdb['graduation_percentile']; ?></td>
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
            <th colspan="4" class="fs-5 text-center table-info">Question-4 : WAQ to list all employee’s full name that are not of domain Java.</th>
          </tr>
          <tr class="table-dark py-3">

            <th scope="col" class="text-center">Employee full name</th>
            <th scope="col" class="text-center">Employee domain</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($fullNameVsDomain as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['employee_full_name']; ?></td>
              <td class="text-center"><?php echo $rdb['employee_domain']; ?></td>
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
            <th colspan="4" class="fs-5 text-center table-info">Question-5 : WAQ to list all employee_domain with sum of it's salary.</th>
          </tr>
          <tr class="table-dark py-3">

            <th scope="col" class="text-center">Employee salary sum/domain</th>
            <th scope="col" class="text-center">Employee domain</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($salarySumVsDomain as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['salary_sum']; ?></td>
              <td class="text-center"><?php echo $rdb['employee_domain']; ?></td>
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
            <th colspan="4" class="fs-5 text-center table-info">Question-6 : Write the above query again but dont include salaries which is less than 30k.</th>
          </tr>
          <tr class="table-dark py-3">

            <th scope="col" class="text-center">Employee salary sum/domain</th>
            <th scope="col" class="text-center">Employee domain</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($salarySumVsDomainLess as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['salary_sum']; ?></td>
              <td class="text-center"><?php echo $rdb['employee_domain']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- Employee details table. -->
    <div class="container mt-5">
      <table class="table caption-top  table-hover table-info" id="myTable">
        <thead>
          <tr>
            <th colspan="4" class="fs-5 text-center">Question-7 : WAQ to list all employee id which has not been assigned employee code.</th>
          </tr>
          <tr class="table-dark py-3">

            <th scope="col" class="text-center">Employee ID</th>
            <th scope="col" class="text-center">Employee code</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Print all data in the form of HTML table.
          foreach ($employeeIdVsCode as $rdb) {
          ?>
            <tr>
              <td class="text-center"><?php echo $rdb['employee_id']; ?></td>
              <td class="text-center"><?php echo $rdb['employee_code']; ?></td>
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