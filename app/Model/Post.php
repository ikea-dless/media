<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 12/27/14
 * Time: 12:11
 */
class Post extends AppModel {
    public $belongsTo = array(
        'User'
    );

    public $validate = array(
        'message' => array(
            'between' => array(
                'rule'    => array('between', 2, 140),
                'message' => '2~15文字で入力してください'
            ),
        )
    );
}