<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController 
{

	/**
	 * 网站首页
	 */
    public function index()
    {

    	$this->redirect('Indexs/index');
    }

    public function _empty()
    {
    	$this->redirect('404');
    }

   
}