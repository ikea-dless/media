<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 12/26/14
 * Time: 12:11
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function index() {
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('ユーザー登録が完了しました');
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash('ユーザー登録できませんでした');
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('ユーザー情報を更新しました');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('ユーザー情報を更新できませんでした');
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('ユーザーを削除しました');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('ユーザーを削除できませんでした');
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('ユーザーネームかパスワードが間違っています');
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function getId() {
        $this->autoRender = false;
        if ($this->request->is('get')) {
            if ($this->Session->check('Auth.User')) {
                $username = $this->Session->read('Auth.User.username');
                return $username;
            }
        }
    }
}