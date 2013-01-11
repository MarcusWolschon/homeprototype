<?php
App::uses('AuthComponent', 'Controller/Component');
class Design extends AppModel {

   public function isOwnedBy($design, $user) {
       return $this->field('id', array('id' => $design, 'user_id' => $user)) === $design;
   }

  public $hasMany = array(
        'images' => array('className' => 'Image',
            'foreignKey' => 'design_id',
            'dependent'     => true),
        'files' => array('className' => 'File',
            'foreignKey' => 'design_id',
            'dependent'     => true)
    );

   public function beforeSave($options = array()){
        if (empty($this->data[$this->alias]['user_id'])) {
            App::uses('SessionComponent', 'Controller/Component'); //Load the Session Component
            $this->data[$this->alias]['user_id'] = SessionComponent::read('Auth.User.id'); //Get the logged in user id
        }
        return true;
    }
}
?>
