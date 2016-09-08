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

    $menuItems[]= [
        'label' => 'Contacts <span class="glyphicon glyphicon-home"></span>',
        'url' => ['/']
    ];

    $menuItems[]=[
            'label' => 'Logout ('.$_SESSION['user'].') <span class="glyphicon glyphicon-log-out"></span>',
            'url' => ['/admin/exit']
    ];

    echo Nav::widget([
        'items' => $menuItems,
        'encodeLabels'=>false,
        'options' => [
            'class' => 'navbar-nav navbar-right',
        ],
    ]);


    NavBar::end() ?>
    <div class="wrapper-admin-panel">
        <?= $content ?>
    </div>


</div>

<?=$this->endBody()?>
</body>
</html>
<?php
$this->endPage() ?>