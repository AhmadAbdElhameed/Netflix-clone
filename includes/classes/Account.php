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

            if(empty($this->errorArray)){
                return $this->insertUserDetails($fn,$ln,$un,$em,$pw);
            }

            return false;
        }

        public function insertUserDetails($fn,$ln,$un,$em,$pw){
            //$pw = hash("ahm123",$pw);

            $query = $this->con->prepare("INSERT INTO users (firstName,lastName,username,email,password)
                                        VALUES(:fn,:ln,:un,:em,:pw)");
            $query->bindValue(":fn",$fn);
            $query->bindValue(":ln",$ln);
            $query->bindValue(":un",$un);
            $query->bindValue(":em",$em);
            $query->bindValue(":pw",$pw);

            return $query->execute();
        
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

            $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
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
            if(strlen($pw) < 5 || strlen($pw) > 25 ){
                array_push($this->errorArray, Constants::$passwordLength);
                return;
            }
        }

        public function getError($error){

            if(in_array($error,$this->errorArray)){
                return "<span class='errorMessage'>$error</span>";
            }
            
        }

    }

?>