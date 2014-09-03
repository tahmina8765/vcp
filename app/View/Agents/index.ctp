<div class="row">
<div class="large-9 columns agents index">
	<h2><?php echo __('Agents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('designation'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($agents as $agent): ?>
	<tr>
		<td><?php echo h($agent['Agent']['id']); ?>&nbsp;</td>
		<td><?php echo h($agent['Agent']['name']); ?>&nbsp;</td>
		<td><?php echo h($agent['Agent']['designation']); ?>&nbsp;</td>
		<td><?php echo h($agent['Agent']['address']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agent['Agent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agent['Agent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $agent['Agent']['id']), array(), __('Are you sure you want to delete # %s?', $agent['Agent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Agent'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Agent Expertises'), array('controller' => 'agent_expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent Expertise'), array('controller' => 'agent_expertises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chats'), array('controller' => 'chats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chat'), array('controller' => 'chats', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
