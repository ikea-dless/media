<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 1/5/15
 * Time: 08:52
 */
class CategoriesController extends AppController {

    public function index() {
        $cate = $this->Category->find('all');
        $this->set('categories', $cate);
    }
}