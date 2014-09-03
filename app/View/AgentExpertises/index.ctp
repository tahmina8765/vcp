<div class="row">
<div class="large-9 columns agentExpertises index">
	<h2><?php echo __('Agent Expertises'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('agent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('expertise_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($agentExpertises as $agentExpertise): ?>
	<tr>
		<td><?php echo h($agentExpertise['AgentExpertise']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($agentExpertise['Agent']['name'], array('controller' => 'agents', 'action' => 'view', $agentExpertise['Agent']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($agentExpertise['Expertise']['name'], array('controller' => 'expertises', 'action' => 'view', $agentExpertise['Expertise']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agentExpertise['AgentExpertise']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agentExpertise['AgentExpertise']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $agentExpertise['AgentExpertise']['id']), array(), __('Are you sure you want to delete # %s?', $agentExpertise['AgentExpertise']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Agent Expertise'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Agents'), array('controller' => 'agents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent'), array('controller' => 'agents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Expertises'), array('controller' => 'expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Expertise'), array('controller' => 'expertises', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
