<?php
session_start();
require_once ("tamplates/header.php");
?>
<div class="page-title">
    <h2>Add player</h2>
</div>
<div class="wrapper wrapper_page">
    <?php
        if(isset($_SESSION["player_error"])){
            echo $_SESSION["player_error"];
            unset($_SESSION["player_error"]);
        }
    ?>
    <form action="../app/players/PlayerAdder.php" method="POST">
        <div class="group-form">
            <label for="first_name">firstname</label>
            <input type="text" name="first_name" class="textarea" required>
        </div>
        <div class="group-form">
            <label for="last_name">lastname</label>
            <input type="text" name="last_name" class="textarea" required>
        </div>
        <div class="group-form">
            <label for="email">email</label>
            <input type="email" name="email" class="textarea" required>
        </div>
        <div class="group-form">
            <label for="student_id">student id</label>
            <input type="text" name="student_id" class="textarea" required>
        </div>
        <div class="group-form">
            <input type="submit" class="button">
        </div>
    </form>
    <?php
    require_once ("tamplates/footer.php");
    ?>
</div>
