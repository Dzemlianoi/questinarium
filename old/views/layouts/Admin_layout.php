
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin data</title>
</head>
<body>
<div class="wrapper container admin-wrapper">
    <nav class="navbar navbar-light navbar-full bg-primary navbar-admin">

        <div class="row nav-row">
            <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/' ?>">
                <div class="inline navbar-brand m-b-0 admin-logo">Questionarium</div>
            </a>

            <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/admin' ?>">
                <div class="inline navbar-item active">
                    Admin
                    <i class="glyphicon glyphicon-home"></i>
                </div>
            </a>

            <div class="inline navbar-item">
                About
                <i class="glyphicon glyphicon-question-sign"></i>
            </div>

            <a href="<?php echo $link?>">
                <div class="inline navbar-item">
                    Sign out
                    <i class="glyphicon <glyphicon-log-out"></i>
                </div>
            </a>
            <div class="inline navbar-item">
                <span class="navbar-span">Contacts</span>
                <i class="glyphicon glyphicon-facetime-video"></i>
            </div>
        </div>
    </nav>
    <?=$content?>
</div>
<script src="/old/assets/js/main.js"></script>
</body>