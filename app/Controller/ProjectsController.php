<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 1/2/15
 * Time: 07:03
 */
class ProjectsController extends AppController {
    var $uses = array('Project', 'Post', 'Favorite');

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
        $count = $this->Favorite->findAllById($id);
        $this->set('count', count($count));
        $this->set('project', $data);
        $this->layout = "";
    }

    public function favorite() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data['id'];
            $uid = $this->Session->read('Auth.User.id');
            $ary = array(
                'Favorite' => array(
                    'project_id' => $id,
                    'user_id' => $uid
                )
            );
            $already = $this->Favorite->find(
                'first',
                array(
                    'conditions' => array(
                        'project_id' => $id,
                        'user_id' => $uid
                    )
                )
            );
            if (empty($already)) {
                if ($this->Favorite->save($ary)) {
                    echo "応援しました！";
                }
            } else {
                echo "既に応援していますよ";
            }
        }
    }
}