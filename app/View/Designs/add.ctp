<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('Design'); ?>
    <fieldset>
        <legend><?php echo __('Add Design'); ?></legend>
        <?php
         echo $this->Form->input('title');
        echo $this->Form->input('body');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
