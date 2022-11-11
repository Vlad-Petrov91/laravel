<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
</head>
<body>
<?php include_once 'news/menu.blade.php'; ?>

<?php foreach ($categories as $item) : ?>
    <a href="<?=route('news.categories.categoryNews', $item['slug'])?>"><?= $item['name']?></a>
<?php endforeach;?>
</body>
</html>
