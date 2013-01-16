<?php
App::uses('AuthComponent', 'Controller/Component');
class File extends AppModel {
    public $name = 'File';
    public $belongsTo = array(
        'Design' => array(
            'className'    => 'User',
            'foreignKey'   => 'id'
        )
    );


}
?>
