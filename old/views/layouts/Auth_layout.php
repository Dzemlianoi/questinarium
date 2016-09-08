<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin data</title>
    <link rel="stylesheet" href="/old/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/old/assets/css/style.css">
    <script src="/old/assets/js/jquery-1.11.min.js"></script>
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
                <?php
                //ВЫНЕСТИ НАФИГ ОТСЮДА!!!
                if (!empty ($_SESSION['user'])) {
                    $link = 'http://' . $_SERVER['HTTP_HOST'] . '/auth/exit';
                    $text='Sign out';
                    $glyph='glyphicon-log-out';
                }else{
                    $link = 'http://' . $_SERVER['HTTP_HOST'] . '/auth';
                    $text='Sign in';
                    $glyph='glyphicon-log-in';
                }
                //ПОВТОРЮСЬ - НАФИГ!!!
                ?>
                <a href="<?php echo $link?>">
                    <div class="inline navbar-item">
                            <?php echo $text ?>
                            <i class="glyphicon <?php echo $glyph ?>"></i>
                    </div>
                </a>
                <div class="inline navbar-item">
                    <span class="navbar-span">Contacts</span>
                    <i class="glyphicon glyphicon-facetime-video"></i>
                </div>
            </div>
        </nav>

        <?php include 'views/' . $content_view; ?>
    </div>
    <script src="/old/assets/js/main.js"></script>
</body>
</html>