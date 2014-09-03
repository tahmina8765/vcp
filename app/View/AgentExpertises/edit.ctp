<div class="row">
<div class="large-9 columns agentExpertises form">
<?php echo $this->Form->create('AgentExpertise'); ?>
	<fieldset>
		<legend><?php echo __('Edit Agent Expertise'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('agent_id');
		echo $this->Form->input('expertise_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AgentExpertise.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('AgentExpertise.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Agent Expertises'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Agents'), array('controller' => 'agents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent'), array('controller' => 'agents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Expertises'), array('controller' => 'expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expertise'), array('controller' => 'expertises', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
