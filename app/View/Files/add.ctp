<?php echo $this->Form->create('File'); ?>
    <fieldset>
        <legend><?php echo __('Add File'); ?></legend>
        <?php
         echo $this->Form->input('name');
        echo $this->Form->input('url');
        echo $this->Form->hidden('design_id', array('value' => $design_id));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
