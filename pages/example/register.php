<?php
#
#  _   _ _____ ____ _____ _____  _____ ____
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |
# | |\  | |___|  _ < | || |_| /  \ | | |___
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#
?>


<?php
    if(isset($_POST['register'])){
        $auth->register($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['city'], $_POST['street'], $_POST['street_number'], $_POST['postcode'], $_POST['password'], $_POST['password_repeat']);
    }
?>
<div>
    <form method="POST">

        <input name="username" type="text" placeholder="Username"><br>
        <input name="firstname" type="text" placeholder="Firstname"><br>
        <input name="lastname" type="text" placeholder="Lastname"><br>
        <input name="email" type="email" placeholder="E-Mail"><br>
        <input name="city" type="text" placeholder="City"><br>
        <input name="street" type="text" placeholder="Street"><br>
        <input name="street_number" type="text" placeholder="Street Number"><br>
        <input name="postcode" type="text" placeholder="Postcode"><br>
        <input name="password" type="password" placeholder="Password"><br>
        <input name="password_repeat" type="password" placeholder="Password Repeat"><br>

        <br>
        <button name="register" type="submit">Register</button>

    </form>
</div>