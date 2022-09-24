<?php
    require_once("functions/connect.php");
    include("includes/header.php");

?>
    
<?php
    if(!isset($_GET["action"]) || isset($_GET['search'])){
        require_once("functions/listUser.php");
    }
    elseif($_GET["action"] == "add"){
        require_once("functions/addUser.php");
    }
    elseif($_GET["action"] == "edit"){
        require_once("functions/edit.php");
    }
?>


<?php
    require_once("includes/footer.php");
?>