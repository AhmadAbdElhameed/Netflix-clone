<?php
    class Account {

        private $con;
        private $errorArray = array();
        public function __construct($con) {


            $this->con = $con;

        }
        public function register($fn,$ln,$un,$em,$cem,$pw,$cpw){
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateUsername($un);
            $this->validateEmails($em,$cem);
            $this->validatePasswords($pw,$cpw);
        }


        private function validateFirstName($fn){
            if(strlen($fn) < 2 || strlen($fn) > 25 ){
                array_push($this->errorArray, Constants::$firstNameCharacters);
            }
        }

        private function validateLastName($ln){
            if(strlen($ln) < 2 || strlen($ln) > 25 ){
                array_push($this->errorArray, Constants::$lastNameCharacters);
            }
        }

        private function validateUsername($un){
            if(strlen($un) < 2 || strlen($un) > 25 ){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
            $query->bindValue(":un",$un);
            $query->execute();

            if($query->rowCount() !== 0){
                array_push($this->errorArray, Constants::$usernameTaken);
            }
        }

        public function validateEmails($em,$cem){
            if($em !== $cem){
                array_push($this->errorArray, Constants::$emailsDonotMatch);
                return;
            }
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;

            }

            $query = $this->con->prepare("SELECT * FROM emails WHERE email=:em");
            $query->bindValue(":em",$em);
            $query->execute();

            if($query->rowCount() !== 0){
                array_push($this->errorArray, Constants::$emailTaken);
            }

        }


        public function validatePasswords($pw,$cpw){
            if($pw !== $cpw){
                array_push($this->errorArray, Constants::$passwordsDonotMatch);
                return;
            }
            if(strlen($un) < 5 || strlen($un) > 25 ){
                array_push($this->errorArray, Constants::$passwordLength);
                return;
            }
        }

        public function getError($error){

            if(in_array($error,$this->errorArray)){
                return $error;
            }
            
        }

    }

?>