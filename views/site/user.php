<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\UserForm $model */
  
?>

 <?php
 
 if(Yii::$app->session->hasFlash('success'))
 {
     
    echo Yii::$app->session->getFlash('success');
 }
 if(Yii::$app->session->hasFlash('failed'))
 {
     
    echo Yii::$app->session->getFlash('failed');
 }
 ?>

    <?php $form = ActiveForm::begin([
        'id' => 'registration_form',
        
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countryCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'gender')->dropDownList([
        'M' => 'M',
        'F' => 'F',
        'T' => 'T',
    ]) ?>

    
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'id' => 'submit-button']) ?>
 

    <?php ActiveForm::end(); ?>

 <?php
$this->registerJs("
    $('#registration_form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(response) {
                console.log('AJAX response:', response);
                if (response.success) {
                    $('#submit-button').prop('disabled', true);
                    alert('Form submitted successfully!');
                } else {
                    $('#submit-button').prop('disabled', false);
                    alert('Failed to submit the form. Please check your input.');
                    console.error('Server validation errors:', response.errors);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#submit-button').prop('disabled', false);
                alert('An error occurred. Please try again.');
                console.error('AJAX error:', textStatus, errorThrown);
            }
        });
    });
");
?>