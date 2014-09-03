<div class="row">
<div class="large-9 columns expertises form">
<?php echo $this->Form->create('Expertise'); ?>
	<fieldset>
		<legend><?php echo __('Add Expertise'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Expertises'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>
