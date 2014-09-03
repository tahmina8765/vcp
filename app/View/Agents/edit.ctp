<div class="agents form">
<?php echo $this->Form->create('Agent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Agent'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('designation');
		echo $this->Form->input('address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Agent.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Agent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Agents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Agent Expertises'), array('controller' => 'agent_expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent Expertise'), array('controller' => 'agent_expertises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chats'), array('controller' => 'chats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chat'), array('controller' => 'chats', 'action' => 'add')); ?> </li>
	</ul>
</div>
