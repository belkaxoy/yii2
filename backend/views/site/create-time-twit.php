<?php
/* @var $twit \common\models\Twits */
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$alert_class = $success ? 'success' : 'danger';
?>

<?php
$form = ActiveForm::begin([
    'id' => 'time-twit-form'
]);
?>

<br>
<?php
if($_POST){
?>
<div class="alert alert-<?=$alert_class?>" role="alert"><?=$message?></div>
<?php
}
?>
<p>Создать твит с текущим временем?</p>

<?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
<a href="/index.php" class="btn btn-default">Вернуться</a>

<?php
ActiveForm::end();
?>
