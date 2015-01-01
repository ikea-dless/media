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
        debug($post);
    }
}