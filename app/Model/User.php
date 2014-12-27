<?php
/**
 * Created by PhpStorm.
 * User: ikea
 * Date: 12/26/14
 * Time: 12:13
 */
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    public $validate = array(
        'email' => array(
            'notempty'=>array(
                'rule' =>array('notempty'),
                'message' => 'メールアドレスを入力してください。',
            ),
            'isUnique'=>array(
                'rule'=>'isUnique',
                'message'=>'このメールアドレスは既に使われています',
            ),
            'mail'=>array(
                'rule'=>array('email',true),
                'message'=>'メールアドレスの形式として不正です。申し訳ありませんが、他のメールアドレスを記入して下さい',
            ),
        ),
        'email2'=>array(
            'mail'=>array(
                'rule'=>array('emailcorrespond'),
                'message'=>'メールアドレスが一致しません',
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message'=>'パスワードを入力してください',
            ),
            'alphaNumeric' => array(
                'rule' => '/^[a-z\d]*$/i',
                'message' => '半角英数で入力してください',
            ),
            'minLength'=>array(
                'rule' => array('minLength',2),
                'message' => '2文字以上で入力して下さい。',
            ),
            'maxLength' =>array(
                'rule' => array('maxLength',20),
                'message' => '20文字以内で入力して下さい。',
            ),
        ),
        'password2'=>array(
            'password'=>array(
                'rule'=>array('correspond'),
                'message'=>'パスワードが一致しません',
            ),
        )
    );

    public function correspond($check){
        return($check['password2']==$this->data['User']['password']);
    }

    public function emailcorrespond($emailcheck){
        return($emailcheck['email2']==$this->data['User']['email']);
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}