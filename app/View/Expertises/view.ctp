<div class="row">
<div class="large-9 columns expertises view">
<h2><?php echo __('Expertise'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($expertise['Expertise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($expertise['Expertise']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Expertise'), array('action' => 'edit', $expertise['Expertise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Expertise'), array('action' => 'delete', $expertise['Expertise']['id']), array(), __('Are you sure you want to delete # %s?', $expertise['Expertise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Expertises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expertise'), array('action' => 'add')); ?> </li>
	</ul>
</div>
</div>
