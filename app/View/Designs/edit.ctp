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
                    ),
                    'value' => $design['Design']['license']));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
