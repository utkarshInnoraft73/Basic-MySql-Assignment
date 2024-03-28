<?php

/**
 * Create a class to validate the user inputs.
 */
class Validate
{

    /**
     * To store the errors for user inputs.
     * 
     * @var array $errors;
     *   Stores the errors for different input fields.
     */
    public $errors = [];

    /**
     * To set the error according to respective field.
     * 
     * @param string $field;
     *   Input field name.
     * @param string $errorMsg;
     *   Error message.
     */
    function setError(string $errorMsg, string $field)
    {
        $this->errors[$field] = $errorMsg;
    }

    /**
     * To validate whose input field type is text.
     * 
     * @param string $data;
     *   The data given by user.
     * @param string $pattern;
     *   The pattern for that this mathod validate.
     * @param string $field;
     *   The input field.
     * 
     * @return string $data;
     *   The return data after all checks.
     */
    function valiidateText(string $data, string $pattern, string $field)
    {
        if (empty($data)) {
            $this->setError('This field is required', $field);
        } else if (!preg_match($pattern, $data)) {
            $this->setError('Please enter valid input', $field);
        } else {
            return $data;
        }
    }

    /**
     * To validate to select input type field.
     * 
     * @param string $data;
     *   Data given by user.
     * @param string $field;
     *   Field name.
     * 
     * @return string $data;
     *   Return data after all check.
     */
    function valiidateOption(string $data, string $field)
    {
        if (empty($data)) {
            $this->setError('This field is required', $field);
        } else {
            return $data;
        }
    }

    /**
     * To return errors.
     * 
     * @return array $errors;
     *   Returns errors for different input fields.
     */
    function getErrors()
    {
        return $this->errors;
    }
}
