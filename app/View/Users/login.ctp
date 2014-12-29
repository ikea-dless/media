<div class="card-panel" style="text-align: center;">
    <?php echo $this->Form->create('User'); ?>
    <div class="input-field">
        <?php echo $this->Form->input('email'); ?>
    </div>
    <div class="input-field">
        <?php echo $this->Form->input('password'); ?>
    </div>
    <?php echo $this->Form->input('Login', array('label' => false, 'type' => 'button', 'class' => 'waves-effect waves-light btn')); ?>
    <?php echo $this->Form->end(); ?>
</div>