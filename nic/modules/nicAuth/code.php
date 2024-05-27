<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$auth = new auth();
class auth extends mysql
{

    public function register($username, $email, $firstname, $lastname, $city, $street, $postcode, $password, $password_repeat)
    {

        // Setup variables
        $registerSuccess = true;
        global $errorMessage;

        // Check if username is used >>>
        $USED_USERNAME = self::db()->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $USED_USERNAME->execute(array(
            ":username" => $username
        ));

        if(!$USED_USERNAME->rowCount() == NULL) {
            $registerSuccess = false;
            $errorMessage = "Username is already in use";
        }
        // Check if username is used <<<

        // Check if mail is used >>>
        $USED_MAIL = self::db()->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $USED_MAIL->execute(array(
            ":email" => $email
        ));

        if(!$USED_MAIL->rowCount() == NULL) {
            $registerSuccess = false;
            $errorMessage = "E-Mail is already in use";
        }
        // Check if mail is used <<<

        // Check password matching >>>
        if(!$password == $password_repeat) {
            $registerSuccess = false;
            $errorMessage = "Password does not match";
        }
        // Check password matching <<<

        if($registerSuccess == true) {

            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            $CREATEUSER = self::db()->prepare("INSERT INTO `users` SET 
                    `username` = :username,
                    `email` = :email,
                    `firstname` = :firstname,
                    `lastname` = :lastname,
                    `city` = :city,
                    `street` = :street,
                    `postcode` = :postcode,
                    `password` = :password
            ");
            $CREATEUSER->execute(array(
                ":username" => $username,
                ":email" => $email,
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":city" => $city,
                ":street" => $street,
                ":postcode" => $postcode,
                ":password" => $password_hashed,
            ));
        }

    }

    public function login($username, $password) {

        // Setup variables
        $loginSuccess = true;
        global $errorMessage;

        // Validate Password >>>
        $VALPASSWORD = self::db()->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $VALPASSWORD->execute(array(":username" => $username));
        while ($user = $VALPASSWORD -> fetch(PDO::FETCH_ASSOC)) {

            if(!password_verify($password, $user["password"])) {
                $loginSuccess = false;
                $errorMessage = "The password is not correct";
            }

        }
        // Validate Password <<<

        if($VALPASSWORD->rowCount() == NULL) {
            $loginSuccess = false;
            $errorMessage = "The user doesnt exist";
        }

        if($loginSuccess == true) {

            $length = 32;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $sessiontoken .= $characters[random_int(0, $charactersLength - 1)];
            }

            $INSERTSESS = self::db()->prepare("UPDATE `users` SET `session` = :sesstoken WHERE `username` = :username");
            $INSERTSESS->execute(array(":sesstoken" => $sessiontoken, ":username" => $username));

            setcookie('sess', $sessiontoken, time()+'864000', '/');
            header("Location:".$GLOBALS['APP_URL']);

        }

    }

    public function getSession() {

        if(!empty($_COOKIE['sess'])) {
            $sessionToken = $_COOKIE['sess'];
            return $sessionToken;
        }
    }

    public function getUser() {

        $sessionToken = self::getSession();

        if(!empty($sessionToken)) {
            $GETUSER = self::db()->prepare("SELECT * FROM `users` WHERE `session` = :sessionToken");
            $GETUSER->execute(array(":sessionToken" => $sessionToken));
            while ($user = $GETUSER -> fetch(PDO::FETCH_ASSOC)) {

                $this->username = $user['name'];

            }

            return true;
        } else {
            return false;
        }

    }

}