<?php
class ImagesController extends AppController {
    public $scaffold; 

    public function add($id = null) {
       $this->set('design_id', $id);

        if ($this->request->is('post')) {
            if ($this->Image->save($this->request->data)) {
                $this->Session->setFlash('Your image has been added');
                $this->redirect(array('controller' => 'Designs', 'action' => 'view', $this->Image->field('design_id')));
            }
        }

    }

   public function delete($id = null) {
    if (!$this->request->is('post')) {
        throw new MethodNotAllowedException();
    }

  //  if($this->isActionable($id)){
    $image = $this->Image->find('all', array('conditions' => array('Image.id' => $id)));
    $design_id = $image['0']['Image']['design_id'];
    if ($this->Image->delete($id)) {
        $this->Session->setFlash('Image successfully deleted.');
        $this->redirect(array('controller' => 'Designs', 'action' => 'view', $design_id));
    }
 //   } else {
 //          $this->Session->setFlash('You cannot delete that image.');
 //         $this->redirect(array('controller' => 'Designs', 'action' => 'view', $design_id));
 //   }
  }

}
?>
