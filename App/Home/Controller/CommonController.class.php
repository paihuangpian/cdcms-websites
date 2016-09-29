<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller 
{
   
   public function _initialize()
   {
   		//查询用户的模板路径
   		$users = M('Users');
   		$user_tpl = M('User_tpl');//用户模板表
   		$templates = M('Templates');//模板表
   		$userid = $users->where("name = '{$_SESSION['prefix']}'")->field('id')->find();//用户id
         session('userid',$userid['id']);
   		if(!$userid)exit('你访问的网站还未开通或已过期！');
   		$tplid  = $user_tpl->where("user_id = {$userid['id']}")->field('tpl_id')->find();//查询用户模板表 得到模板id
   		$tpl_path = $templates->where("id = {$tplid['tpl_id']}")->field('path')->find();//查询模板路径
   		$this->assign('tpl_path',$tpl_path['path']);
   		C('VIEW_PATH',".{$tpl_path['path']}");//配置模板路径

         //分配主域名  取图片时用
         $prefix_array = explode('.',$_SERVER['HTTP_HOST']);
         $host  =  'http://www.'.$prefix_array['1'].'.'.$prefix_array['2'];
         $this->assign('host',$host);
         $this->assign('host2','http://'.$_SERVER['HTTP_HOST']);

         //分配网站配置
         $cms_config = M('Cms_config');
         $configs = $cms_config->where('config_userid ='.$userid['id'])->find();
         $this->assign('configs',$configs);


         //分配栏目数据
         $cms_column = M('cms_column');
         $columns = $cms_column->where('column_userid ='.$userid['id'].' and column_pid = 0 and column_status = 0')->select();
         foreach($columns as $k=>$v){

            $columns[ $k ]['second'] = $cms_column->where("{$v['column_id']} = column_pid and column_status = 0 and column_userid =".$userid['id'])->select();
         }
        $this->assign('columns',$columns);

        //分配当前url
        $this->assign('redirect',$_SERVER['REQUEST_SCHEME' ].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL']);
        //分配当前域名的前缀  也就是用户名
        $this->assign('username',$_SESSION['prefix']);

       
   }

}