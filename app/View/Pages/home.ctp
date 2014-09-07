<div class="row">
    <div class="large-12 columns large-centered">
        <h1 class="centered-text">Welcome to Video Chat Project</h1>
        <hr>
        <?php
        $groupId = AuthComponent::user('group_id');
        switch($groupId){
            case 1:
                echo $this->element('admin_menu');
                break;
            case 2:
                echo $this->element('agent_menu');
                break;
            default:
                echo $this->element('guest_menu');
                break;
        }
        ?>
    </div>
</div>

<?php
// echo $this->element('chat'); ?>