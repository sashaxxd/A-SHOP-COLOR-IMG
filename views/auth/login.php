<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->registerCssFile('/css/auth.css');
?>



<div id="auth_count_l1">
    <div id="count_l1">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2">
                <div id="auth_Text1">
                    <span id="auth_uid0">АВТОРИЗАЦИЯ</span>
                </div>

                <?php $form = ActiveForm::begin()?>
                <?= $form->field($model, 'email')->textInput(['id' => 'login', 'placeholder' => 'Ваш Email'])->label(false)?>
                <?= $form->field($model, 'password')->passwordInput(['id' => 'password', 'placeholder' => 'Пароль'])->label(false)?>

                <?= Html::submitButton('Войти', ['id' => 'Button1'])?>
                <?php ActiveForm::end()?>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>