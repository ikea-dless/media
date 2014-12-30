<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 12/27/14
 * Time: 11:24
 */
class PostsController extends AppController {
    var $uses = array('Post', 'Category');

//    public function beforeFilter() {
//        parent::beforeFilter();
//        $this->Auth->allow('add');
//    }

    public function index($Category_id = null) {
        if (!$Category_id) {
            throw new BadRequestException('指定されたURLは見つかりません');
        }
        $thread = $this->Category->findById($Category_id);
        $messages = $this->Post->find(
            'all',
            array(
                'conditions' => array(
                    'category_id' => $Category_id
                )
            )
        );
        $this->set('thread_title', $thread);
        $this->set('messages', $messages);
        //debug($messages);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Session->read('Auth.User.id');
            $this->Post->save($this->request->data);
        }
    }
}