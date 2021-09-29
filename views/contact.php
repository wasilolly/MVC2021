<?php

/**
 * @var $this \app\core\View
 * @var $model \app\Models\Contact
 */
$this->title = 'Contact';
?>

<h1> Contact us</h1>

<?php $form = \app\core\forms\Form::begin('', 'post') ?>
<?php echo  $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new \app\core\forms\TextareaField($model, 'body') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php app\core\forms\Form::end(); ?>