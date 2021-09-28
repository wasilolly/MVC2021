<?php /** $var model  \app\models\user;  */ ?>
<div class="container">
    <h1>Log in</h1>
</div>


<?php $form = \app\core\forms\Form::begin('', 'post') ?>
    
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php echo \app\core\forms\Form::end() ?>
