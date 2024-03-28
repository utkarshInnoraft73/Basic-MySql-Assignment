<?php
require('./Data/Db.php');

/**
 * Create the instase of the class Query.
 */
$query = new Db();

/**
 * To connect the database.
 */
$query->connectDB();


// Check if the request method is post or not after given input.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Employee ID .
  $employeeID = $_POST['employeeID'];
  // Employee code.
  $employeeCode = $_POST['employeeCode'];
  // Employee code name.
  $employeeCodeName = $_POST['employeeCodeName'];
  // Employee domain.
  $domain = $_POST['domain'];
  // Employee first name.
  $firstName = $_POST['firstName'];
  // Employee last name.
  $lastName = $_POST['lastName'];
  // Employee salary.
  $salary = $_POST['salary'];
  // Employee graduation percentile.
  $graduationPercentile = $_POST['graduationPercentile'];

  // Variable to stores query to add row in employee_code_table. 
  $insertCodeTable = "INSERT INTO `employee_code_table`(`employee_code`, `employee_code_name`, `employee_domain`) VALUES( '$employeeCode', '$employeeCodeName', '$domain')";

  // Variable to stores query to add row in employee_salary_table. 
  $insertSalaryTable = "INSERT INTO `employee_salary_table`(`employee_id`, `employee_salary`, `employee_code`) VALUES( '$employeeID', '$salary', '$employeeCode')";

  // Variable to stores query to add row in employee_details_table. 
  $insertDetailsTable = "INSERT INTO `employee_details_table`(`employee_id`, `employee_first_name`, `employee_last_name`, `graduation_percentile`) VALUES( '$employeeID', '$firstName', '$lastName', '$graduationPercentile')";

  // Run insert query for employee_code_table.
  $query->insertData($insertCodeTable);
  // Run insert query for employee_salary_table.
  $query->insertData($insertSalaryTable);
  // Run insert query for employee_details_table.
  $query->insertData($insertDetailsTable);
  header("location:/");
  exit;
}
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
  <!-- Link the font-awesome. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
  <!-- Link custom css. -->
  <link rel="stylesheet" href="./Styles/style.css">

</head>

<body>
  <section class="wrapper">
    <div class="container mt-5">
      <h3 class="text-center my-3">Add new employee.</h3>
      <form action="<?php echo $_POST['PHP_SELF']; ?>" method="post" id="form">

        <!-- Input for employee id. -->
        <div class="mb-3 form-div">
          <label for="employeeID" class="form-label">Employee ID (Ex: RR127)</label>
          <input type="text" class="form-control" id="employeeID" aria-describedby="emailHelp" name="employeeID" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee code. -->
        <div class="mb-3 form-div">
          <label for="employeeCode" class="form-label">Employee code (Ex: su_utkarsh)</label>
          <input type="text" class="form-control" id="employeeCode" aria-describedby="emailHelp" name="employeeCode" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee code name. -->
        <div class="mb-3 form-div">
          <label for="employeeCodeName" class="form-label">Employee code name (Ex: ru_singh)</label>
          <input type="text" class="form-control" id="employeeCodeName" aria-describedby="emailHelp" name="employeeCodeName" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee first name. -->
        <div class="mb-3 form-div">
          <label for="firstName" class="form-label">First name (Ex: Utkarsh)</label>
          <input type="text" class="form-control" id="firstName" aria-describedby="emailHelp" name="firstName" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee last name. -->
        <div class="mb-3 form-div">
          <label for="lastName" class="form-label">last Name (Ex: Singh)</label>
          <input type="text" class="form-control" id="lastName" aria-describedby="emailHelp" name="lastName" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee domain. -->
        <div class="mb-3 form-div">
          <label for="domain" class="form-label">Domain (Ex: PHP)</label>
          <input type="text" class="form-control" id="domain" aria-describedby="emailHelp" name="domain" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee graduation percentile. -->
        <div class="mb-3 form-div">
          <label for="graduationPercentile" class="form-label">Graduation percentile (Ex: 70%)</label>
          <input type="text" class="form-control" id="graduationPercentile" aria-describedby="emailHelp" name="graduationPercentile" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for employee salary. -->
        <div class="mb-3 form-div">
          <label for="salary" class="form-label">Salary (Ex: 60K)</label>
          <input type="text" class="form-control" id="salary" aria-describedby="emailHelp" name="salary" autocomplete="off">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
      </form>
    </div>
  </section>

  <!-- Add custom javascript for form validation. -->
  <script src="./JS/script.js"></script>
  <!-- Add script from bootstrap. -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>