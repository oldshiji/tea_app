<?php
	namespace app\h5\controller;
	
	class Users extends Base
	{
	    //用户钱包
	    public function account()
	    {
	        $result = $this->get_api_data(C("GET_USER"),'post');
	        $this->assign("user",$result['result']);
	        return $this->fetch("money");
	    }
	    
	    //用户详情
	    public function userinfo()
	    {
	        /*if(session("?user")){
	            $this->assign("user",session("user"));
	        }else{
	            $result = $this->get_api_data(C("GET_USER"),'post');
	            $user = json_decode($result,true);
	            session("user",$user['result']);
	            $this->assign("user",session("user"));
	        }*/
	        return $this->fetch("person");
	    }
	    
	    //注册协议
	    public function regagreement()
	    {
	        $result = $this->get_api_data(C("REGAGREEMENT"),"post");
	        $this->assign("content",$result['result']);
	        return $this->fetch("regagreement");
	        
	    }
	}
?>