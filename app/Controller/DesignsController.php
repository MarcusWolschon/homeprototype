<?php
class DesignsController extends AppController {
    public $scaffold; 
    public $helpers = array('Html', 'Form');

    // action
    // show the 10 newest, 10 most popular (TODO: and 10 newest derived) designs
    public function index() {
        // ---------------- newest designs 
        $temp = $this->Design->find('all', array('order' => 'created DESC', 
                                                 'conditions' => array('public' => '1'),
                                                 'limit' => 10));
        $this->set('newdesigns', $temp);
       
        // ---------------- most popular designs 
        $temp = $this->Design->find('all', array('order' => 'liked DESC',
                                                 'conditions' => array('public' => '1'),
                                                 'limit' => 10));
        $this->set('populardesigns', $temp);
    }

    // action
    // show all most recent designs
    public function index_latest() {
        $this->set('designs', $this->Design->find('all'));
    }

    // get all designs of a user
    public function getByUser($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
       return  $this->Design->find('threaded', array('conditions' => array('user_id' => $id)));
    }

    // get all details on a single design
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $design = $this->Design->find('threaded', array('conditions' => array('id' => $id)));
        if (!$design) {
            throw new NotFoundException(__('Invalid post'));
        }
//TODO: test if public OR user_id==logged in user
        $this->set('design', $design['0']);
        $this->set('user', ($this->Auth->user('id')));
        $this->set('canAddFile', $this->Design->canAddFile($design['0']['Design']));
    }

   // GET:  get all details of a single design for editing
   // POST: save changes made
   public function edit($id = null) {
       if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $design = $this->Design->find('threaded', array('conditions' => array('id' => $id)));
        if (!$design) {
            throw new NotFoundException(__('Invalid post'));
        }
//TODO: test if public OR user_id==logged in user
        $this->set('design', $design['0']);
        $this->set('user', ($this->Auth->user('id')));

        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
            if ($this->Design->save($this->request->data)) {
                $this->Session->setFlash('Your design has been updated (uid ' .  $this->Auth->user('id') . ').');
                $this->redirect(array('action' => 'view', $id));
            }
        }

   }

   // POST: add a new design
   public function add() {
        // store ID of current user
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
            if ($this->Design->save($this->request->data)) {
                $this->Session->setFlash('Your design has been saved (uid ' .  $this->Auth->user('id') . ').');
           //     $this->Design->read(null, 1);
           //TODO     $this->redirect(array('action' => 'view', $this->Design->field['id']));
                $this->redirect(array('action' => 'index'));
            }
        }
   }

    // define actions that are always allowed on all controllers
    public function beforeFilter() {
        // no "view"
        $this->Auth->allow('index', 'index_latest', 'index_latestderived', 'index_mostfav', 'home', 'display');
    }


   // is the given user allowed to do $this->action
   public function isAuthorized($user) {
    // All registered users can add designs
    if ($this->action === 'add') {
        return true;
    }
    if ($this->action === 'index_latest') {
        return true;
    }

    if ($this->action === 'view') {
        $postId = $this->request->params['pass'][0];
        if ($this->Design->isPublic($postId)) {
            return true;
        }
        if ($this->Design->isOwnedBy($postId, $user['id'])) {
            return true;
        }
        return false;
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
