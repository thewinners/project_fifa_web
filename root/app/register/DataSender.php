<?php
namespace App;

require_once("DataValidator.php");
require_once("../DatabaseConnector.php");
require_once("MailSender.php");

class dataSender
{
    private $username;
    private $email;
    private $password;
    private $dbc;
    private $studentNumber;
    private $validator;
    private $admin;

    public function __construct($username, $email, $studentNumber, $admin)
    {
        $this->username = $username;
        $this->email = $email;
        $this->validator = new DataValidator();
        $this->studentNumber = $studentNumber;
        $this->dbc = Connect();
        $this->admin = $admin;
    }

    public function Send()
    {
        //Will send the data to database if the validator returns false (no errors).
        $errorMessage = $this->validator->Validate($this->email, $this->username, $this->studentNumber, $this->dbc);
        if ($errorMessage == false)
        {
            $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
            // Example output: f4552671f8909587cf485ea990207f3b

            $password = rand(100000,999999); // Generate random number between 1000 and 5000 and assign it to a local variable.

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tbl_users` (`username`, `email`, `password`, `studentnumber`, `hash`, `admin`) VALUES ('$this->username', '$this->email', '$hashedPassword', '$this->studentNumber', '$hash', $this->admin);";
            $this->dbc->query($sql);
            SendMail($this->username,$this->email,$password,$hash);
        }
        return $errorMessage;
    }
}
?>