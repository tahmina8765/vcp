<!--<div class="row">
    <div class="large-9 columns chats form">
<?php echo $this->Form->create('Chat'); ?>
        <fieldset>
            <legend><?php echo __('Add Chat'); ?></legend>
<?php
//echo $this->Form->input('name');
//echo $this->Form->input('email');
//echo $this->Form->input('keywords');
//echo $this->Form->input('reason');
//echo $this->Form->input('agent_id');
?>
        </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
    </div>
    <div class="large-3 columns actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>

            <li><?php echo $this->Html->link(__('List Chats'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Agents'), array('controller' => 'agents', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Agent'), array('controller' => 'agents', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>-->

<div class="row">
    <div class="large-6 columns large-centered">        
        <h1 class="centered-text">Start Chat</h1>
        <p class="centered-text"><i>Please give us some information so we can best serve you!</i></p>
        <?php echo $this->Form->create('Chat', array('action' => 'add', 'novalidate' => true)); ?>
        <?php
        echo $this->Form->input('name', array('label' => false, 'placeholder' => 'Name'));
        echo $this->Form->input('email', array('label' => false, 'placeholder' => 'E-mail'));
        echo $this->Form->input('keywords', array('label' => false, 'placeholder' => 'Keywords'));
        $reasons = array('' => '-- Reason for chat --', 'Sale' => 'Sale', 'Return' => 'Return', 'Question' => 'Question', 'Other' => 'Other');
        echo $this->Form->input(
                'reason', array('options' => $reasons, 'default' => '', 'label' => false)
        );
        ?>
        <?php echo $this->Form->button(__('GO >'), array('class' => 'button expand')); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
