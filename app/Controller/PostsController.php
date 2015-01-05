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
                ),
                'order' => array('Post.created DESC'),
                'limit' => 10
            )
        );
        $this->set('thread_title', $thread);
        $this->set('messages', $messages);
        //debug($messages);
    }

    public function add() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Session->read('Auth.User.id');
            if ($this->Post->save($this->request->data)) {
                $this->set('result', 'save success');
            } else {
                $this->set('result', 'save filed');
            }
        }
    }
}