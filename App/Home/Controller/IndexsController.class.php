<?php
namespace Home\Controller;
use Think\Controller;
class IndexsController extends CommonController 
{

	/**
	 * 网站首页
	 */
    public function index()
    {
        //分配轮播图
        $cms_carousel = M('Cms_carousel');
        $carousel = $cms_carousel->where('carousel_status = 0 and carousel_userid ='.session('userid'))->field('carousel_id,carousel_name,carousel_url,carousel_pic,carousel_remarks')->select();
        $this->assign('carousel',$carousel);

    

        //分配资讯信息
        $cms_column = M('Cms_column');
        $column_id = $cms_column->where("column_type = 'newss' and column_status = 0 and column_userid = ".session('userid'))->getField('column_id',true);
        if($column_id){

            foreach($column_id as $k=>$v){
                if($k != 0){$or = ' or ';}
                $columnid .= "{$or}article_column = {$v}";
            }

            $news_article = M('Cms_article');
            $articles_news = $news_article->where("($columnid) and article_status = 0 and article_userid = ".session('userid'))->order('article_id desc')->limit('30')->select();
            $this->assign('articles_news',$articles_news);
        }


        //分配产品信息
        $column_id2 = $cms_column->where("column_type = 'products' and column_status = 0 and column_userid = ".session('userid'))->getField('column_id',true);
        if($column_id2){
            foreach($column_id2 as $k=>$v){
                if($k != 0){$ors = ' or ';}
                $columnids .= "{$ors}article_column = {$v}";
            }
            $product_article = M('Cms_article');
            $articles_product = $product_article->where("($columnids) and article_status = 0 and article_userid =" .session('userid'))->order('article_id desc')->limit('30')->select();
            $this->assign('articles_product',$articles_product);

        }


        //banner图
        $posters = M('Cms_posters');
        $poster = $posters->where("posters_type = 'index' and posters_status = 0 and posters_userid = ".session('userid'))->find();
        $this->assign('posters',$poster);


    	$this->display();
    }
   
    /**
     * 新闻资讯列表
     */
    public function newss()
    {
        $id = I('get.id');
        $cms_column = M('Cms_column');//查询传过来的栏目id下是否有子栏目  如果有 把子栏目下的文章一起查出来
        //r如果$id不为真  就取一条id 给$id
        if(!$id || !is_numeric($id)){
            $res_id = $cms_column->where("column_status = 0 and column_type = 'newss' and column_userid =".session('userid'))->find();
            $id = $res_id['column_id'];
        }


        //分配栏目信息  如 标题、关键字、描述等
        $column = $cms_column->where("column_status = 0 and column_id = {$id} and column_userid = ".session('userid'))->find();
        $this->assign('column',$column);
        if(!$column){$this->_empty();exit;}

        //分配当前栏目导航
        $current_column_res = $cms_column->where("(column_id = {$column['column_pid']} || column_id = {$id}) and column_userid = ".session('userid'))->find();
        if($current_column_res){
            $current_column_res['second'] = $cms_column->where("column_status = 0 and column_pid = {$current_column_res['column_id']} and column_userid = ".session('userid'))->select();
        }
        $this->assign('current_column',$current_column_res);

         //分当前栏目id做选中当前导航用
        $current_column_['column_id'] = $current_column_res['column_id'];
        $this->assign('column',$current_column_);


        //分配面包屑导航
        $position_name = $cms_column->where("column_id = {$column['column_pid']} and column_userid = ".session('userid'))->field('column_name,column_id')->find();
         $position = "<a href='".U(__CONTROLLER__)."'>首页</a> >";
         if($position_name){

            $position .= "<a href='".U("newss",array('id'=>$position_name['column_id']))."'>".$position_name['column_name']."</a> >";
         }
         $position .= $current = "{$column['column_name']}";
         $this->assign('current',$current);//当前栏目名称
         $this->assign('position',$position);

        //查询文章
            $columnid = $cms_column->where("column_status = 0 and column_path like '%,{$id},%' and column_userid =".session('userid'))->getField('column_id',true);//返回一个id数组
        $cms_article = M('Cms_article');
        //分页
         foreach($columnid as $v){
            $str .= "or article_column = {$v} ";
        }
        $count = $cms_article->where("(article_column = {$id} {$str}) and article_status = 0 and article_userid =".session('userid'))->count();     
        $num     = 5;//每页显示的条数
        $number  =     ceil($count / $num);//页码数
        $page    = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show    = $page->show();// 分页显示输出
        $articles = $cms_article->where("(article_column = {$id} {$str}) and article_status = 0 and article_userid =".session('userid'))->limit($page->firstRow.','.$page->listRows)->select(); 
        //相关资讯
        if($count > 15){
            $mt_rand = mt_rand(0,$count - 15);
            $related = "$mt_rand,15";
        }else{
            $related = 15;
        }
        $related_articles = $cms_article->where("(article_column = {$id} {$str}) and article_status = 0 and article_userid =".session('userid'))->limit($related)->select(); 

        //baauer图
        $posters = M('Cms_posters');
        $poster = $posters->where("posters_type = 'news' and posters_status = 0 and posters_userid = ".session('userid'))->find();
        $this->assign('posters',$poster);


        $this->assign('posters',$poster);
        $this->assign('number',$number);//页码数
        $this->assign('count',$count);//总条数
        $this->assign('show',$show);
        $this->assign('articles',$articles);
        $this->assign('related_articles',$related_articles);//相关资讯
        $this->display('news-list');

    }


    /**
     * 产品列表
     */
    public function products()
    {
        $id = I('get.id');
        $cms_column = M('Cms_column');//查询传过来的栏目id下是否有子栏目  如果有 把子栏目下的文章一起查出来
        //r如果$id不为真  就取一条id 给$id
        if(!$id || !is_numeric($id)){
            $res_id = $cms_column->where("column_type = 'products' and column_userid =".session('userid'))->find();
            $id = $res_id['column_id'];
        }

        //分配栏目信息  如 标题、关键字、描述等
        $column = $cms_column->where("column_status = 0 and column_id = {$id} and column_userid = ".session('userid'))->find();
        $this->assign('column',$column);
         if(!$column){$this->_empty();exit;}

        //分配当前栏目导航
        $current_column_res = $cms_column->where("(column_id = {$column['column_pid']} || column_id = {$id}) and column_userid = ".session('userid'))->find();
        if($current_column_res){
            $current_column_res['second'] = $cms_column->where("column_pid = {$current_column_res['column_id']} and column_userid = ".session('userid'))->select();
        }
        $this->assign('current_column',$current_column_res);

         //分当前栏目id做选中当前导航用
        $current_column_['column_id'] = $current_column_res['column_id'];
        $this->assign('column',$current_column_);


        //分配面包屑导航
        $position_name = $cms_column->where("column_id = {$column['column_pid']} and column_userid = ".session('userid'))->field('column_name,column_id')->find();
         $position = "<a href='".U(__CONTROLLER__)."'>首页</a> → ";
         if($position_name){

            $position .= "<a href='".U("{$position_name['column_type']}",array('id'=>$position_name['column_id']))."'>".$position_name['column_name']."</a> → ";
         }
         $position .= $current = "{$column['column_name']}";
         $this->assign('current',$current);
         $this->assign('position',$position);


        //查询文章
            $columnid = $cms_column->where("column_status = 0 and column_path like '%,{$id},%' and column_userid =".session('userid'))->getField('column_id',true);//返回一个id数组
        $cms_article = M('Cms_article');
        //分页
         foreach($columnid as $v){
            $str .= "or article_column = {$v} ";
        }
        $count = $cms_article->where("(article_column = {$id} {$str}) and article_status = 0 and article_userid =".session('userid'))->count();     
        $num     = 12;//每页显示的条数
        $number  =     ceil($count / $num);//页码数
        $page    = new \Think\Page($count,$num);
        $show    = $page->show();// 分页显示输出
        $articles = $cms_article->where("(article_column = {$id} {$str}) and article_status = 0 and article_userid =".session('userid'))->limit($page->firstRow.','.$page->listRows)->select();
        //相关产品
        if($count > 15){
            $mt_rand = mt_rand(0,$count - 15);
            $related = "$mt_rand,15";
        }else{
            $related = 15;
        }
        $related_articles = $cms_article->where("(article_column = {$id} {$str}) and article_status = 0 and article_userid =".session('userid'))->limit($related)->select(); 

        //baauer图
        $posters = M('Cms_posters');
        $poster = $posters->where("posters_type = 'product' and posters_status = 0 and posters_userid = ".session('userid'))->find();
        $this->assign('posters',$poster);



        $this->assign('show',$show);
        $this->assign('number',$number);//页码数
        $this->assign('count',$count);//总条数
        $this->assign('articles',$articles);
        $this->assign('related_articles',$related_articles);//相关产品
    	$this->display('product-list');
    }

    /**
     * 新闻资讯文章页
     */
    public function news()
    {
        $id = I('get.id');
        if(!$id || !is_numeric($id))$this->_empty();
        $cms_column = M('Cms_column');
        $cms_article = M('Cms_article');
        $article = $cms_article->where('article_status = 0 and article_id ='.$id.' and article_userid = '.session('userid'))->find();
        if(!$article){$this->_empty();exit;} 

        //分配当前导航
        $columnid = $cms_column->where("column_status = 0 and column_id = {$article['article_column']} and column_userid = ".session('userid'))->find();//得到当前栏目id
       if($columnid){
            $column_ids = $cms_column->where("column_status = 0 and column_id = {$columnid['column_pid']} and column_userid = ".session('userid'))->find();//得到顶级栏目
            if($column_ids){
             $column_ids['second'] = $cms_column->where("column_status = 0 and column_pid = {$columnid['column_pid']} and column_userid = ".session('userid'))->select();//在用顶级栏目查询所有下级栏目
            $this->assign('current_column',$column_ids);
             //分配当前所属栏目数据 做导航选中时用
            $this->assign('column',$column_ids);
            }else{
                $this->assign('current_column',$columnid);
                //分配当前所属栏目数据 做导航选中时用
                $this->assign('column',$columnid);
            }
       }
    


       


        //分配面包屑导航
        $position_name = $cms_column->where("column_id = {$columnid['column_pid']} and column_userid = ".session('userid'))->field('column_name,column_id,column_type')->find();
         $position = "<a href='".U(__CONTROLLER__)."'>首页</a> → ";
         if($position_name){

            $position .= "<a href='".U("{$columnid['column_type']}",array('id'=>$position_name['column_id']))."'>".$position_name['column_name']."</a> → ";
         }
         $position .= $current = "<a href='".U("{$columnid['column_type']}",array('id'=>$columnid['column_id']))."'>{$columnid['column_name']}</a>";
         $this->assign('current',$current);//当前栏目
         $this->assign('position',$position);//面包屑导航



         //文章的上下一篇
         $pre = $cms_article->where("article_id < {$article['article_id']} and article_column = {$article['article_column']} and article_userid = ".session('userid'))->field('article_id,article_title')->order('article_id desc')->find();

         $next = $cms_article->where("article_id > {$article['article_id']} and article_column = {$article['article_column']} and article_userid = ".session('userid'))->field('article_id,article_title')->find();
         if($pre){
            
            $listitem = "<li>上一篇: <a href='".U('news',array('id'=>$pre['article_id']))."'> {$pre['article_title']}</a></li>";
         }else{
            $listitem = "<li>上一篇 没有了</li>";
         }
         if($next){

            $listitem .= "<li>下一篇: <a href='".U('news',array('id'=>$next['article_id']))."'> {$next['article_title']}</a></li>";
         }else{
            $listitem .= "<li>下一篇 没有了</li>";
         }
         $this->assign('listitem',$listitem);


        //相关文章
       $count = $cms_article->where("article_column = {$article['article_column']} and article_status = 0 and article_userid = ".session('userid'))->count();
       if($count > 15){
        $mt_rand = mt_rand(0,$count - 15);
        $related = "{$mt_rand},15";
       }else{
        $related = 15;
       }
        $related_articles = $cms_article->where("article_column = {$article['article_column']} and article_status = 0 and article_userid = ".session('userid'))->limit($related)->select();
        

        //baauer图
        $posters = M('Cms_posters');
        $poster = $posters->where("posters_type = 'news_show' and posters_status = 0 and posters_userid = ".session('userid'))->find();
        $this->assign('posters',$poster);



       if($article){
                $cms_article->where("article_id = {$id}")->setInc('article_clicks');//浏览量
                $this->assign('article',$article);
                $this->display('news-show');
        }else{
            echo '文章不存在';
        }
    }

    /**
     * 产品页
     */
    public function product()
    {
        $id = I('get.id');
        if(!$id || !is_numeric($id))$this->_empty();
        $cms_column = M('Cms_column');
        $cms_article = M('Cms_article');
        $article = $cms_article->where('article_status = 0 and article_id ='.$id.' and article_userid = '.session('userid'))->find(); 
         if(!$article){$this->_empty();exit;}

        //分配当前导航
        $columnid = $cms_column->where("column_status = 0 and column_id = {$article['article_column']} and column_userid = ".session('userid'))->find();//得到当前栏目id
       if($columnid){
            $column_ids = $cms_column->where("column_status = 0 and  column_id = {$columnid['column_pid']} and column_userid = ".session('userid'))->find();//得到顶级栏目
            if($column_ids){
             $column_ids['second'] = $cms_column->where("column_status = 0 and  column_pid = {$columnid['column_pid']} and column_userid = ".session('userid'))->select();//在用顶级栏目查询所有下级栏目

             $this->assign('current_column',$column_ids);
             //分配当前所属栏目数据 做导航选中时用
            $this->assign('column',$column_ids);
            }else{
                $this->assign('current_column',$columnid);
                //分配当前所属栏目数据 做导航选中时用
                $this->assign('column',$columnid);
            }
       }
       



        //分配面包屑导航
        $position_name = $cms_column->where("column_status = 0 and column_id = {$columnid['column_pid']} and column_userid = ".session('userid'))->field('column_name,column_id,column_type')->find();
         $position = "<a href='".U(__CONTROLLER__)."'>首页</a> → ";
         if($position_name){

            $position .= "<a href='".U("products",array('id'=>$position_name['column_id']))."'>".$position_name['column_name']."</a> → ";
         }
         $position .= $current = "<a href='".U("products",array('id'=>$columnid['column_id']))."'>{$columnid['column_name']}</a>";
         $this->assign('current',$current);//当前
         $this->assign('position',$position);//导航



         //文章的上下一篇
         $pre = $cms_article->where("article_status = 0 and article_id < {$article['article_id']} and article_column = {$article['article_column']} and article_userid = ".session('userid'))->field('article_id,article_title')->order('article_id desc')->find();

         $next = $cms_article->where("article_status = 0 and article_id > {$article['article_id']} and article_column = {$article['article_column']} and article_userid = ".session('userid'))->field('article_id,article_title')->find();
         if($pre){
            
            $listitem = "<li>上一篇: <a href='".U('product',array('id'=>$pre['article_id']))."'> {$pre['article_title']}</a></li>";
         }else{
            $listitem = "<li>上一篇 没有了</li>";
         }
         if($next){

            $listitem .= "<li>下一篇: <a href='".U('product',array('id'=>$next['article_id']))."'> {$next['article_title']}</a></li>";
         }else{
            $listitem .= "<li>下一篇 没有了</li>";
         }
         $this->assign('listitem',$listitem);

        //相关文章
       $count = $cms_article->where("article_column = {$article['article_column']} and article_status = 0 and article_userid = ".session('userid'))->count();
       if($count > 15){
        $mt_rand = mt_rand(0,$count - 15);
        $related = "{$mt_rand},15";
       }else{
        $related = 15;
       }
        $related_articles = $cms_article->where("article_column = {$article['article_column']} and article_status = 0 and article_userid = ".session('userid'))->limit($related)->select();


        //baauer图
        $posters = M('Cms_posters');
        $poster = $posters->where("posters_type = 'product-show' and posters_status = 0  and posters_userid = ".session('userid'))->find();
        $this->assign('posters',$poster);

        if($article){
                
                $cms_article->where("article_id = {$id}")->setInc('article_clicks');//浏览量
                $this->assign('article',$article);
                $this->display('product-show');
        }else{
            echo '文章不存在';
        }
    }



    /**
     * 封面页
     */
    public function cover()
    {
        $id = I('get.id');
        if(!$id || !is_numeric($id))$this->_empty();
        $cms_column = M('Cms_column');

        $column = $cms_column->where("column_type = 'cover' and column_status = 0 and column_id = ".$id.' and column_userid = '.session('userid'))->find();
        if(!$column){$this->_empty();exit;}

        //分配当前导航
        if($column['column_pid'] != 0){

                $current_column = $cms_column->where("column_id = {$column['column_pid']} and column_status = 0 and column_userid = ".session('userid'))->field('column_name,column_id')->find();//查询顶级栏目
                $current_column['second'] = $cms_column->where("column_pid = {$current_column['column_id']} and column_status = 0 and column_userid = ".session('userid'))->field('column_name,column_id')->select();
        }else{

                $column['second'] =   $cms_column->where("column_pid = {$column['column_id']} and column_status = 0 and column_userid = ".session('userid'))->field('column_name,column_id')->select();
                $current_column = $column;
                
        }
             $this->assign('current_column',$current_column);

      

        // 分配面包屑导航
        $position_name = $cms_column->where("column_id = {$column['column_pid']} and column_userid = ".session('userid'))->field('column_name,column_id')->find();
         $position = "<a href='".U(__CONTROLLER__)."'>首页</a> → ";
         if($position_name){

            $position .= "<a href='".U("{$column['column_type']}",array('id'=>$position_name['column_id']))."'>".$position_name['column_name']."</a> → ";
         }
         $position .= $current = "<a href='".U("{$column['column_type']}",array('id'=>$column['column_id']))."'>{$column['column_name']}</a>";
         $this->assign('current',$current);//当前
         $this->assign('position',$position);//导航

         //baauer图
        $posters = M('Cms_posters');
        $poster = $posters->where("posters_type = 'cover' and posters_status = 0 and posters_userid = ".session('userid'))->find();
        $this->assign('posters',$poster);

        if($column){
                $this->assign('column',$column);
                $this->display();
        }else{
            echo '文章不存在';
        }

    }


     public function _empty()
    {
        $this->display('404');
    }
}
