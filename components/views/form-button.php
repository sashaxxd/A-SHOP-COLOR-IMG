<?php
use yii\widgets\ActiveForm;

?>



<?php $form = ActiveForm::begin(['id' => 'modal_konsult',
//                                            'enableAjaxValidation'   => true,
//                                            'enableClientValidation' => false,
//                                            'validateOnBlur'         => false,
//                                            'validateOnType'         => false,
//                                            'validateOnChange'       => false,
//                                            'validateOnSubmit'       => false,
    'enableClientValidation'=>false,
    'enableClientScript' => false //отключает скрипты на клиенте

]); ?>
<div id="modal_window" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <hr id="modal_line">
                <div id="site_mod_cont">
                    <div id="mod_cont">
                        <div class="row">
                            <div class="col-1">
                                <div id="site_modal_title">
                                    <span id="site_uid47">ЗАПОЛНИТЕ ФОРМУ</span>
                                </div>
                                <?= $form->field($call, 'name', ['errorOptions'=>['class'=>'error-modal']])->textInput(['id' => 'EditboxCal5', 'placeholder' => 'Ваше имя*', 'required' => ''])->label(false)  ?>
                                <?=  $form->field($call, 'phone',['errorOptions'=>['class'=>'error-main']])->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' =>['+375(99)999-99-99', ], 'clientOptions' => [/*'clearIncomplete'=>true, Нужно ввести все символы*/ ],
                                    'options' => ['id'=>'EditboxCal6',  'placeholder' => 'Ваш телефон*',  'required' => '']
                                ])->label(false); ?>

                                <div id="site_Text44">
                                    <span id="site_uid48">* - поля, обязательные к заполнению</span><span id="site_uid49"><br>Нажимая на кнопку, вы даете согласие на обработку ваших персональных данных</span>
                                </div>
                                <input type="submit" id="ButtonCal1"  name="" value="Отправить" class="button_m">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

