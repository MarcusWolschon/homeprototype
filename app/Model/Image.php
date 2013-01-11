<?php
App::uses('AuthComponent', 'Controller/Component');
class Image extends AppModel {
    public $name = 'Image';
    public $belongsTo = array(
        'Design' => array(
            'className'    => 'User',
            'foreignKey'   => 'id'
        )
    );

}
?>
