<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
unset($_SESSION['name']);

?>
    <script>
            location.replace("http://localhost/authentication/index.php?msg=logoutsuccessful");
    </script>
<?php

?>