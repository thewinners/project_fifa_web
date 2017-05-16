<?php
require_once ("tamplates/header.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<div class="page-title">
    <h2>Add player</h2>
</div>
<div class="wrapper wrapper_page">
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
