<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('Design'); ?>
    <fieldset>
        <legend><?php echo __('Add Design'); ?></legend>
        <?php
         echo $this->Form->input('title');
        echo $this->Form->input('body');
        echo $this->Form->hidden('public', array('value' => 0));
        echo $this->Form->input('license', array('options' => array(
                    '0' => 'Attribution - Creative Commons',
                    '1' => 'Share Alike - Creative Commons',
                    '2' => 'No Derivatives - Creative Commons',
                    '3' => 'Non-Commercial - Creative Commons',
                    '4' => 'Attribution - Non-Commercial - Share Alike',
                    '5' => 'Attribution - Non-Commercial - No Derivatives',
//                    '6' => 'Creative Commons - Public Domain Dedication',
//                    '7' => 'Creative Commons - GNU GPL',
//                    '8' => '>Creative Commons - LGPL'
                      )));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
