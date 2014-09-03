<div class="row">
<div class="large-9 columns agentExpertises view">
<h2><?php echo __('Agent Expertise'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agentExpertise['AgentExpertise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agent'); ?></dt>
		<dd>
			<?php echo $this->Html->link($agentExpertise['Agent']['name'], array('controller' => 'agents', 'action' => 'view', $agentExpertise['Agent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expertise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($agentExpertise['Expertise']['name'], array('controller' => 'expertises', 'action' => 'view', $agentExpertise['Expertise']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agent Expertise'), array('action' => 'edit', $agentExpertise['AgentExpertise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agent Expertise'), array('action' => 'delete', $agentExpertise['AgentExpertise']['id']), array(), __('Are you sure you want to delete # %s?', $agentExpertise['AgentExpertise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agent Expertises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent Expertise'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agents'), array('controller' => 'agents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent'), array('controller' => 'agents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Expertises'), array('controller' => 'expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expertise'), array('controller' => 'expertises', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
