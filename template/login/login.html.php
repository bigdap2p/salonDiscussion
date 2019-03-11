<?php include __DIR__ . "/../start.html.php"; ?>


    <h1><?= $title ?></h1>

    <form class="row col-lg-6 col-md-6" method="post" action="">
        <div class="col-6">
            <div class="form-group">
                <label>Email address</label>
                <?php if(array_key_exists("email", $error)):
                    $message = $error["email"];
                    include __DIR__ . "/../shared/alert.html.php";
                endif ?>
                <input type="text" name="email" class="form-control" placeholder="@email*"
                       value="<?= filter_input(INPUT_POST,'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <?php if(array_key_exists("pass", $error)):
                    $message = $error["pass"];
                    include __DIR__ . "/../shared/alert.html.php";
                endif ?>
                <input type="password" name="pass" class="form-control"  placeholder="Password*"
                       value="<?= filter_input(INPUT_POST,'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>">
            </div>
            <input type="submit" name="signinLogin" value="Submit" class="btn btn-primary">
            <?php if(array_key_exists("pdo", $error)):
                $message = $error["pdo"];
                include __DIR__ . "/../shared/alert.html.php";
            endif ?>
        </div>


        </div>
    </form>

<?php include __DIR__ . "/../end.html.php"; ?>