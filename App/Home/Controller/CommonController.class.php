<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller 
{
   
   public function _initialize()
   {
   		$users = M('Users');
      //获取网站所属用户名
      $prefix_array = explode('.',$_SERVER['HTTP_HOST']);
      //如果获取到的不是 云狄 的域名  就去查询用户是否解析了自己的域名
      if($prefix_array['1'] != 'ydwzjs'){
          //如果访问的不是带www的就跳转到带www的
          if($prefix_array['0'] != 'www'){
            echo "<script>window.location.href='http://www.".$_SERVER['HTTP_HOST']."'</script>";exit;
            // $this->redirect('http://www.'.$_SERVER['HTTP_HOST']);
          }
          $domain = $users->where("domain = '{$_SERVER['HTTP_HOST']}'")->field('name')->find();
          if($domain){
            $_SESSION['prefix'] = $domain['name'];
          }else{
            exit('域名错误！');
          }
      }else{
        $_SESSION['prefix']  =  $prefix_array['0'];
        
      }
     //分配主域名  取图片时用
     $this->assign('host','http://jz.ydwzjs.cn');
     $this->assign('host2','http://'.$_SERVER['HTTP_HOST']);//当前域名


      //查询用户的模板路径
   		$user_tpl = M('User_tpl');//用户模板表
   		$templates = M('Templates');//模板表
   		$userid = $users->where("name = '{$_SESSION['prefix']}'")->field('id')->find();//用户id
         session('userid',$userid['id']);
   		if(!$userid)exit('你访问的网站还未开通或已过期！');
   		$tplid  = $user_tpl->where("user_id = {$userid['id']}")->field('tpl_id')->find();//查询用户模板表 得到模板id
   		$tpl_path = $templates->where("id = {$tplid['tpl_id']}")->field('path')->find();//查询模板路径
   		$this->assign('tpl_path',$tpl_path['path']);
   		C('VIEW_PATH',".{$tpl_path['path']}");//配置模板路径

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


        //分配友情链接
        $friendship = M('Cms_friendship');
        $friendships = $friendship->where('friendship_status = 0 and friendship_userid = '.session('userid'))->select();
        $this->assign('friendships',$friendships);


        //云狄建站标示
        $this->assign('yundi',"<div style='width:100%;height:30px;background:#008CBA;'>
                      <div style='width:260px;text-align:center;height:30px;margin:0 auto;color:#fff;font-size:18px;line-height:30px;' class='ydjz'>
                      本站使用 <a href='http://www.ydwzjs.cn' title='云狄建站''><h1 style='display:inline;font-size:18px;color:#fff;'>云狄建站</h1></a> 搭建
                        </div></div> ");
   }

}