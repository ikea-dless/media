<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 12/27/14
 * Time: 11:24
 */
class PostsController extends AppController {

//    public function beforeFilter() {
//        parent::beforeFilter();
//        $this->Auth->allow('add');
//    }

    public function index() {
        $messages = $this->Post->find('all');
        $this->set('messages', $messages);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Session->read('Auth.User.id');
            $this->Post->save($this->request->data);
        }
    }
}