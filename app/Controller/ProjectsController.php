<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 1/2/15
 * Time: 07:03
 */
class ProjectsController extends AppController {
    var $uses = array('Project', 'Post');

    public function add($id = null) {
        $post = $this->Post->findById($id);
        $this->set('post', $post);
        if ($this->request->is('post')) {
            $this->request->data['Project']['user_id'] = $this->Session->read('Auth.User.id');
            $this->request->data['Project']['origin_id'] = $post['Post']['user_id'];
            $this->request->data['Project']['category_id'] = $post['Post']['category_id'];
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash('プロジェクトを作成しました');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->serFlash('プロジェクトを作成できませんでした');
            }
        }
    }

    public function index() {
        $projects = $this->Project->find('all');
        $this->set('projects', $projects);
    }

    public function view($id = null) {
        $data = $this->Project->findById($id);
        $this->set('project', $data);
        //debug($data);
        $this->layout = "";
    }
}