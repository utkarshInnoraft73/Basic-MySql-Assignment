<?php
require('./Data/Db.php');
require('./Validations/Validate.php');

/**
 * Contant to stor the name pattern.
 */
define('NAMEPATTERN', "/^[a-zA-Z-' ]*$/");

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

  // Create the instage of class Validate.
  $validate = new Validate();

  // Store the venue after the validation .
  $venue = $validate->valiidateText($_POST['venue'], NAMEPATTERN, 'venue');
  $date = $_POST['date'];
  $team1 = $validate->valiidateOption($_POST['team1'], 'team1');
  $team2 = $validate->valiidateOption($_POST['team2'], 'team2');
  $tossWinner = $validate->valiidateOption($_POST['tossWinner'], 'tossWinner');
  $matchWinner = $validate->valiidateOption($_POST['matchWinner'], 'matchWinner');
  $errors = $validate->getErrors();

  // Match detail inser query.
  $inserMatchDetails = "INSERT INTO `Matches`(`Venue`, `Team1`, `Team2`, `Toss_won`, `Match_won`, `Match_data`) VALUES( '$venue', '$team1', '$team2', '$tossWinner', '$matchWinner', '$date')";

  // Call the method insertData.
  $query->insertData($inserMatchDetails);
  header("location:/index.php");
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
      <h3 class="text-center my-3">Add new match.</h3>
      <form action="<?php echo $_POST['PHP_SELF']; ?>" method="post" id="form">

        <!-- Input for date. -->
        <div class="mb-3 form-div">
          <label for="date" class="form-label">Date <span class="errors" id="dateErr">* </span></label>
          <input type="date" class="form-control" id="date" name="date">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for venue. -->
        <div class="mb-3 form-div">
          <label for="venue" class="form-label">Venue <span class="errors" id="venueErr">* <?php echo $errors['venue']; ?></span></label>
          <input type="text" class="form-control" id="venue" name="venue" maxlength="30">
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input fo first team. -->
        <div class="mb-3 form-div">
          <label for="team1" class="form-label">First team <span class="errors" id="team1Err">* <?php echo $errors['team1']; ?></span></label>
          <select class="form-select form-select-lg" aria-label=".form-select-lg example" id="team1" name="team1">
            <option>First Team</option>
            <option value="1">Mumbai Indians</option>
            <option value="2">Royal Challengers Bangalore</option>
            <option value="3">Chennai Super Kings (CSK)</option>
          </select>
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for second team. -->
        <div class="mb-3 form-div">
          <label for="team2" class="form-label">Second team <span class="errors" id="team2Err">* <?php echo $errors['team2']; ?></span></label>
          <select class="form-select form-select-lg" aria-label=".form-select-lg example" id="team2" name="team2">
            <option>Another Team</option>
            <option value="1">Mumbai Indians</option>
            <option value="2">Royal Challengers Bangalore</option>
            <option value="3">Chennai Super Kings (CSK)</option>
          </select>
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for toss winner. -->
        <div class="mb-3 form-div">
          <label for="tossWinner" class="form-label">Toss winner <span class="errors" id="tossWinnerErr">* <?php echo $errors['tossWinner']; ?></span></label>
          <select class="form-select form-select-lg" id="tossWinner" aria-label=".form-select-lg example" name="tossWinner">
            <option>Toss winner</option>
            <option value="1">Mumbai Indians</option>
            <option value="2">Royal Challengers Bangalore</option>
            <option value="3">Chennai Super Kings (CSK)</option>
          </select>
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>

        <!-- Input for match winner. -->
        <div class="mb-3 form-div">
          <label for="matchWinner" class="form-label">Match winner <span class="errors" id="matchWinnerErr">* <?php echo $errors['matchWinner']; ?></span></label>
          <select class="form-select form-select-lg" id="matchWinner" aria-label=".form-select-lg example" name="matchWinner">
            <option>Match winner</option>
            <option value="1">Mumbai Indians</option>
            <option value="2">Royal Challengers Bangalore</option>
            <option value="3">Chennai Super Kings (CSK)</option>
          </select>
          <i class="fa-solid fa-check"></i>
          <i class="fa-solid fa-circle-exclamation"></i>
          <small></small>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
      </form>
    </div>
  </section>

  <!-- Add custom javascript for form validation. -->
  <script src="/JS/script.js"></script>
  <!-- Add script from bootstrap. -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>