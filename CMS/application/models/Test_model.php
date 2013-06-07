<?php


class Test_model extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	public function auth(){
		 
		echo "Test_model method = > auth()<br/>" ;
		 
		return array(
            'admin/index' => array(
                'text_login' => array(
                    'validate' => 'login_validate'
                    )
                    )
                    );
	}

	public function listen(){
		return array(
            "user logged in" => "react_user_login"
            );
	}


	public function login_validate(){
		echo "test login_validate";
	}

	public function react_user_login( $user = false ){
		echo "{$user} user logged in react from Test.";
	}
}
