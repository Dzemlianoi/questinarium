<?php
use \app\assets\AppAsset;
use \yii\bootstrap\NavBar;
use \yii\bootstrap\Nav;

/*@var $content string
 *@var $this \yii\web\View */

AppAsset::register($this);
$this->beginPage();
?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset?>"/>
    <?= $this->head() ?>
</head>
<body>
<?=$this->beginBody()?>
<div class="wrapper container admin-wrapper">
    <?php
    NavBar::begin(
        [
            'brandLabel' => 'Questinarium',
            'options' => ['class'=>'nav-row bg-primary']
        ]
    );

    $menuItems[]= [
        'label' => 'Home <span class="glyphicon glyphicon-home"></span>',
        'url' => ['/']
    ];

    if (Yii::$app->user->isGuest){

        $menuItems[]=[
            'label' => 'Sign in <span class="glyphicon glyphicon-log-in"></span>',
            'url' => ['/auth/index']
        ];
        $menuItems[]=[
            'label' => 'Contacts <span class="glyphicon glyphicon-facetime-video"></span>',
            'url' => ['/admin/contacts']
        ];
    }else{
        $menuItems[]=[
            'label' => 'Admin <span class="glyphicon glyphicon-list-alt"></span>',
            'url' => ['/admin/index']
        ];
        $menuItems[]=[
            'label' => 'Logout ('.$_SESSION['user'].') <span class="glyphicon glyphicon-log-out"></span>',
            'url' => ['/auth/logout']
        ];

    }
    echo Nav::widget([
        'items' => $menuItems,
        'encodeLabels'=>false,
        'options' => [
            'class' => 'navbar-nav navbar-right',
        ],
    ]);


    NavBar::end() ?>
    <!--    Insert content-->
    <div class="container main-content">
        <?=$content ?>
    </div>


</div>

<?=$this->endBody()?>
</body>
</html>
<?php
$this->endPage() ?>