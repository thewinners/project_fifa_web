<?php
namespace App;

require_once("DataValidator.php");
require_once("../DatabaseConnector.php");

class dataSender
{
    private $username;
    private $email;
    private $password;
    private $dbc;
    private $studentNumber;
    private $validator;

    public function __construct($username, $email, $password, $confirmPassword, $studentNumber)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->validator = new DataValidator();
        $this->studentNumber = $studentNumber;
        $this->dbc = Connect();
    }

    public function Send()
    {
        //Will send the data to database if the validator returns false (no errors).
        $errorMessage = $this->validator->Validate($this->email, $this->username, $this->password, $this->confirmPassword, $this->studentNumber, $this->dbc);
        if ($errorMessage == false)
        {
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tbl_users` (`username`, `email`, `password`, `studentnumber`) VALUES ('$this->username', '$this->email', '$hashedPassword', '$this->studentNumber');";
            $this->dbc->query($sql);
        }
        return $errorMessage;
    }
}
?>