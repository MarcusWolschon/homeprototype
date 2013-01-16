<?php
class FilesController extends AppController {
    public $scaffold; 

    public function add($id = null) {
       $this->set('design_id', $id);

        if ($this->request->is('post')) {
            if ($this->File->save($this->request->data)) {
                $this->Session->setFlash('Your file has been added');
                $this->redirect(array('controller' => 'Designs', 'action' => 'view', $this->File->field('design_id')));
            }
        }
    }

   public function delete($id = null) {
    if (!$this->request->is('post')) {
        throw new MethodNotAllowedException();
    }

  //  if($this->isActionable($id)){
    $file = $this->File->find('all', array('conditions' => array('id' => $id)));
    $design_id = $file['0']['File']['design_id'];
    if ($this->File->delete($id)) {
        $this->Session->setFlash('File successfully deleted.');
        $this->redirect(array('controller' => 'Designs', 'action' => 'view', $design_id));
    }
 //   } else {
 //          $this->Session->setFlash('You cannot delete that files.');
 //         $this->redirect(array('controller' => 'Designs', 'action' => 'view', $design_id));
 //   }
  }

}
?>
