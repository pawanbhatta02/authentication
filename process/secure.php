<?php
session_start();
if($_SESSION['email'] && $_SESSION['id'])
{

}
else{
    ?>
        <script>
            location.replace("http://localhost/authentication/index.php?msg=accessdenied");
        </script>
    <?php
}
?>