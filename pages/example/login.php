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
    $auth->login($_POST['username'], $_POST['password']);
}
?>
<div>
    <form method="POST">

        <input name="username" type="text" placeholder="Username"><br>
        <input name="password" type="password" placeholder="Password"><br>

        <br>
        <button name="register" type="submit">Login</button>

    </form>
</div>