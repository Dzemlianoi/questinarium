<?php
use \app\assets\AppAsset;

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

<div class="wrapper container main-wrapper">
    <?=$content?>
</div>

<?=$this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>