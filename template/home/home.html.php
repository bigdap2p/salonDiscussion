<?php include __DIR__ . "/../start.html.php"; ?>
<div class="container">
        <div class="row">
            <div class="col-sm">
                <form class="row col-lg-6 col-md-6" style="width:80px" method="post" action="">
                    <?php foreach ($nomDiscussion as $value): ?>
                        <?php echo   $value[0]['nom_discussion'].'<input type="submit" name="discussionEnvoi" class="form-control" value="'.$value[0]['id_discussion'].'" >' ?>
                        <?= "<br>" ?>
                    <?php endforeach ?>
                </form>
            </div>
            <div class="col-sm " style=" overflow: scroll;height: 500px;">
                <?php foreach ($discussion as $value): ?>
                    <?=  "<li><strong>".$value->{'login'}."</strong> :".$value->{'message'}."</li>" ?>
                <?php endforeach ?>
            </div>
            <div class="col-sm">
                <form method="post" action="" >
                    <input type="text" name="message" class="form-control" placeholder="message*">
                    <input type="submit" name="messageEnvoi" value="Envoi" class="btn btn-primary">
                </form>
            </div>
        </div>
</div>

<?php include __DIR__ . "/../end.html.php"; ?>

