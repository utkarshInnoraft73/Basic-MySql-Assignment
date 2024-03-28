
/**
 * @const.
 *   To fetch the employee id field.
 */
const employeeIDInput = document.getElementById('employeeID');

/**
 * @const.
 *   To fetch the employee code field.
 */
const employeeCodeInput = document.getElementById('employeeCode')

/**
 * @const.
 *   To fetch the employee code name field.
 */
const employeeCodeNameInput = document.getElementById('employeeCodeName')

/**
 * @const.
 *   To fetch the employee first name field.
 */
const firstNameInput = document.getElementById('firstName')

/**
 * @const.
 *   To fetch the employee last name field.
 */
const lastNameInput = document.getElementById('lastName')

/**
 * @const.
 *   To fetch the employee domain field.
 */
const domainInput = document.getElementById('domain')

/**
 * @const.
 *   To fetch the employee graduation percentile field.
 */
const graduationPercentileInput = document.getElementById('graduationPercentile')

/**
 * @const.
 *   To fetch the employee salary field.
 */
const salaryInput = document.getElementById('salary');


document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    validate();
  });

  function validate() {

    // Constant to store the id field's value.
    const employeeID = employeeIDInput.value.trim();

    // Contant to store the code field's value.
    const employeeCode = employeeCodeInput.value.trim();

    // Constant to store the code name field's value.
    const employeeCodeName = employeeCodeNameInput.value.trim();

    // Constant to store the first name field's value.
    const firstName = firstNameInput.value.trim();

    // Constant to store the last name field's value.
    const lastName = lastNameInput.value.trim();

    // Constan to store the domain field's value.
    const domain = domainInput.value.trim();

    // Constant to store the graduation percentile field's value.
    const graduationPercentile = graduationPercentileInput.value.trim();

    // Constant to store the salary field's value.
    const salary = salaryInput.value.trim();

    // Validate the employee id.
    if (employeeID == "") {
      setError(employeeIDInput, "Employee ID cannot be empty.");
    }
    else {
      setSuccess(employeeIDInput);
    }

    // Validate the employee code.
    if (employeeCode == "") {
      setError(employeeCodeInput, "Employee code cannot be empty.");
    }
    else {
      setSuccess(employeeCodeInput);
    }

    // Validate the employee code name.
    if (employeeCodeName == "") {
      setError(employeeCodeNameInput, "Employee code name cannot be empty.");
    }
    else {
      setSuccess(employeeCodeNameInput);
    }

    // Validate the employee first name.
    if (firstName == "") {
      setError(firstNameInput, "First name cannot be empty.");
    }
    else {
      setSuccess(firstNameInput);
    }

    // Validate the employee last name.
    if (lastName == "") {
      setError(lastNameInput, "Last name cannot be empty.");
    }
    else {
      setSuccess(lastNameInput);
    }

    // Validate the employee domain.
    if (domain == "") {
      setError(domainInput, "Domain field cannot be empty.");
    }
    else {
      setSuccess(domainInput);
    }

    // Validate the employee graduation percentile.
    if (graduationPercentile == "") {
      setError(graduationPercentileInput, "Graduation percentile cannot be empty.");
    }
    else {
      setSuccess(graduationPercentileInput);
    }

    // Validate the employee salary.
    if (salary == "") {
      setError(salaryInput, "salary cannot be empty.");
    }
    else {
      setSuccess(salaryInput);
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