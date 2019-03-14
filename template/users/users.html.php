<?php include __DIR__ . "/../start.html.php" ?>

<title><?= $title ?></title>



    <div class="row col-lg-2 col-md-2">
        <form method="post" action="" >
<?php

foreach ($users as $value): ?>

    <?php
  echo  "<input type=\"checkbox\" name=".$value->getEmail()." value=".$value->getEmail()." id=".$value->getEmail().">
    <label for=".$value->getEmail()."> ".$value->getEmail()." </label><br>";

    ?>

<?php endforeach ?>

        <input type="text" name="nom_discussion" class="form-control" placeholder="nom_discussion">
        <input type="text" name="admin_discussion" class="form-control" placeholder="admin_discussion email">
        <input type="submit" name="createDiscussion" value="Create Discussion" class="btn btn-primary">

     </form>
</div>


<?php include __DIR__ . "/../end.html.php" ?>
