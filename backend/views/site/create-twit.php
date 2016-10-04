<?php
/* @var $twit \common\models\Twits */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'twit-form',
    'options' => ['class' => 'form-horizontal'],
]);
?>

<?= $form->field($twit, 'text')->textarea()->label('Текст твита') ?>
<?= $form->field($twit, 'image')->fileInput()->label('Картинка') ?>

<?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
<a href="/index.php" class="btn btn-default">Вернуться</a>

<?php
ActiveForm::end();
?>
