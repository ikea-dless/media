<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 12/26/14
 * Time: 12:13
 */
class User extends AppModel {
    public $validate = array(
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        ),
    );
}