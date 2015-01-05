<h4>プロジェクト作成</h4>
<?php echo $this->Form->create('Project'); ?>
<div class="input-field">
    <?php echo $this->Form->input('name', array('div' => false, 'label' => 'プロジェクト名')); ?>
</div>
<div class="input-field">
    <?php echo $this->Form->input('purpose', array('div' => false, 'label' => '解決する問題', 'default' => $post['Post']['message'])); ?>
</div>
<div class="input-field">
    <?php echo $this->Form->input('message', array('div' => false, 'label' => 'メッセージ')); ?>
</div>
<?php echo $this->Form->input('Submit', array('label' => false, 'type' => 'button', 'class' => 'waves-effect waves-light btn')); ?>
<?php echo $this->Form->end(); ?>