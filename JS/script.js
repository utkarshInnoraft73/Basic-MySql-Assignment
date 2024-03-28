/**
 * @const.
 *   To fetch the date.
 */
const dateInput = document.getElementById('date');

/**
 * @const.
 *   To fetch the venue.
 */
const venueInput = document.getElementById('venue')

/**
 * @const.
 *   To fetch the first team.
 */
const team1Input = document.getElementById('team1')

/**
 * @const.
 *   To fetch the another team.
 */
const team2Input = document.getElementById('team2')

/**
 * @const.
 *   To fetch the toss winner.
 */
const tossWinnerInput = document.getElementById('tossWinner')

/**
 * @const.
 *   To fetch the match winner.
 */
const matchWinnerInput = document.getElementById('matchWinner')

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    validate();
  });

  function validate() {

    // Constant to store the date field's value.
    const date = dateInput.value.trim();

    // Constant to store the venue field's value.
    const venue = venueInput.value.trim();

    // Constant to store the team1 name field's value.
    const team1 = team1Input.value.trim();

    // Constant to store the team2 name field's value.
    const team2 = team2Input.value.trim();

    // Constant to store the toss winner name field's value.
    const tossWinner = tossWinnerInput.value.trim();

    // Constan to store the match winner field's value.
    const matchWinner = matchWinnerInput.value.trim();

    // Validate the match date.
    if (date == "") {
      setError(dateInput, "Date cannot be empty.");
    }
    else {
      setSuccess(dateInput);
    }

    // Validate the match venue.
    if (venue == "") {
      setError(venueInput, "Venue cannot be empty.");
    }
    else {
      setSuccess(venueInput);
    }

    // Validate the team 1.
    if (team1 == "") {
      setError(team1Input, "Team1 field cannot be empty.");
    }
    else {
      setSuccess(team1Input);
    }

    // Validate the team 2.
    if (team2 == "") {
      setError(team2Input, "Team2 fieldcannot be empty.");
    }
    else {
      setSuccess(team2Input);
    }

    // Validate the toss winner.
    if (tossWinner == "") {
      setError(tossWinnerInput, "Toss winner cannot be empty.");
    }
    else {
      setSuccess(tossWinnerInput);
    }

    // Validate the match winner.
    if (matchWinner == "") {
      setError(matchWinnerInput, "Match winner field cannot be empty.");
    }
    else {
      setSuccess(matchWinnerInput);
    }
  }

  /**
   * Function to set the error.
   *
   * @param { sring} field. 
   * @param {string} errorMsg. 
   */
  function setError(field, errorMsg) {
    const formDiv = field.parentNode;
    const small = formDiv.querySelector('small');
    formDiv.className = "form-div error";
    small.innerText = errorMsg;
  }

  /**
   * Set the success message.
   * 
   * @param {string} field.
   */
  function setSuccess(field) {
    const formDiv = field.parentNode;
    formDiv.className = "form-div success";
  }

})

$(document).ready(function () {
  $('#myTable').DataTable();

});