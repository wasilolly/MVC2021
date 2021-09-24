
<h1>Register</h1>

<?php $form = \app\core\forms\Form::begin('', 'post') ?>
    <div class="row">
        <div class="col"><?php echo $form->field($model, 'firstname')?></div>
        <div class="col"><?php echo $form->field($model, 'lastname') ?></div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php echo \app\core\forms\Form::end() ?>

<!--form action="" , method="POST">
    <div class="mb-3">
        <label>First name</label>
        <input type="text" name="firstname" value="<?php //echo $model->firstname; ?>"  
        class="form-control <?php //echo $model->hasError('firstname') ? 'is-invalid' : ''?>">
        <div class="invalid-feedback">
            <?php //echo $model->getFirstError('firstname') ?>
        </div>
    </div>
    <div class="mb-3">
        <label>Last name</label>
        <input type="text" name="lastname" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email address</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input">
        <label>Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form-->