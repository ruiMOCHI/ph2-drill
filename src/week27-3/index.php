<?php
    session_start();
    $_SESSION['name'] = 'POSSE';  # nameというkeyに、POSSEという値をセットする
?>  <!-- $_SESSION['key名'] = 値(value,文字列なら''か""をつける); -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?= $_SESSION["name"] ?>
</body>
</html>