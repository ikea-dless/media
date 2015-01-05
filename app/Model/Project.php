<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 1/2/15
 * Time: 07:05
 */
class Project extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'User2' => array(
            'className' => 'User2',
            'foreignKey' => 'origin_id'
        )
    );

    public $validate = array(
        'name' => array(
            'notempty'=>array(
                'rule' =>array('notempty')
            ),
        ),
        'purpose' => array(
            'notempty'=>array(
                'rule' =>array('notempty')
            ),
        ),
        'message' => array(
            'notempty'=>array(
                'rule' =>array('notempty')
            ),
        ),
    );
}