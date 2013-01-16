<!-- app/View/Users/add.ctp -->
<?php
   echo $this->Form->create('Design', array('url' => array('controller' => 'Designs', 'action' => 'delete', $design['Design']['id'])));
   echo $this->Form->end(__('Delete'));
?>

<div class="users form">
<?php echo $this->Form->create('Design'); ?>
    <fieldset>
        <legend><?php echo __('Edit Design'); ?></legend>
        <?php
         echo $this->Form->input('title', array('value' => $design['Design']['title']));
        echo $this->Form->input('body', array('value' => $design['Design']['body']));
        echo $this->Form->hidden('public', array('value' => $design['Design']['public']));
        echo $this->Form->hidden('id', array('value' => $design['Design']['id']));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
