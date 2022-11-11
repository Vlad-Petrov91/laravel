<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Публикация новости</title>
</head>
<body>

<?php include_once "menu.blade.php"; ?>

<div>
    <?php if ($news): ?>

    <h3><?= $news['title'] ?></h3>
    <p><?= $news['text'] ?></p>
    <?php else: ?>
    <p>Данная новость отсутсвует</p>
    <?php endif; ?>
</div>

</body>
</html>
