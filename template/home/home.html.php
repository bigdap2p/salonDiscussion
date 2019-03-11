<?php include __DIR__ . "/../start.html.php"; ?>


    <div class="container ">
    <div class="row">
    <div class="border col-md-6 col-mx-6 col-xl-6 col-sm-12 col-12" >
	<?php foreach ($finalDiscution as $value): ?>
    <?=  "<li>".$value->{'login'}."<br>".$value->{'message'}."</li>" ?>
	<?php endforeach ?>
    </div>
        <div class="border col">
        </div>
        </div>
    </div>


<?php include __DIR__ . "/../end.html.php"; ?>