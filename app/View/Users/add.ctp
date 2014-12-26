<h4>Sign Up</h4>
<?php echo $this->Form->create('User'); ?>
<div class="input-field">
    <?php echo $this->Form->input('email', array('div' => false)); ?>
</div>
<div class="input-field">
    <?php echo $this->Form->input('password', array('div' => false)); ?>
</div>
<?php echo $this->Form->input('Submit', array('label' => false, 'type' => 'button', 'class' => 'waves-effect waves-light btn')); ?>
<?php echo $this->Form->end(); ?>