<?php echo $this->Form->create('Image'); ?>
    <fieldset>
        <legend><?php echo __('Add Image'); ?></legend>
        <?php
        echo $this->Form->input('image_url');
        echo $this->Form->hidden('design_id', array('value' => $design_id));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
