<?php
class DesignsController extends AppController {
    public $scaffold; 
    public $helpers = array('Html', 'Form');
    public function index() {
        $this->set('newdesigns', $this->Design->find('all', array('order' => 'created')));
        $this->set('populardesigns', $this->Design->find('all', array('order' => 'liked DESC')));
    }
    public function index_latest() {
        $this->set('designs', $this->Design->find('all'));
    }
    public function getByUser($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
       return  $this->Design->find('threaded', array('conditions' => array('user_id' => $id)));
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $design = $this->Design->find('threaded', array('conditions' => array('id' => $id)));
        if (!$design) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('design', $design['0']);
        $this->set('user', ($this->Auth->user('id')));
    }

   public function add() {
        // store ID of current user
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
            if ($this->Design->save($this->request->data)) {
                $this->Session->setFlash('Your design has been saved (uid ' .  $this->Auth->user('id') . ').');
                $this->redirect(array('action' => 'index'));
            }
        }
   }

   public function isAuthorized($user) {
    // All registered users can add designs
    if ($this->action === 'add') {
        return true;
    }
    if ($this->action === 'index_latest') {
        return true;
    }

//TODO: unpublished designs can only be seen by it's author

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = $this->request->params['pass'][0];
        if ($this->Design->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
   }
}
?>
