<?php include __DIR__ . "/../start.html.php" ?>

<title><?= $title ?></title>

<?php foreach ($users as $value): ?>

    <?=  $value->getEmail() ?>

<?php endforeach ?>


<?php include __DIR__ . "/../end.html.php" ?>