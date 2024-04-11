<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\SignInForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-4 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'phone')->textInput(['placeholder' => "Пример ввода: +7(912)5678990"]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'repeatPassword')->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Зарегестрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>