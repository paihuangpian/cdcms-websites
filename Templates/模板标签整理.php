<?php

$yundi//底部云狄建站标示
$host //主域名 http://www.cms.com
$host2//本网站的二级域名 test.cms.com


 //面包屑导航
 $position



//网站配置
$configs 
array (size=19)
  'config_id' => string '2' (length=1)  
  'config_userid' => string '17' (length=2)//用户id
  'config_name' => string '广州云狄网络科技有限公司' (length=36)//网站名称
  'config_title' => string '广州云狄网络科技有限公司' (length=36)//主页标题
  'config_keywords' => string '云狄网络' (length=12)//主页关键词
  'config_description' => string 'eeeeeeeeeeeeeeeeee' (length=18)//主页描述
  'config_home' => string '首页' (length=6)//主页名称
  'config_ico' => string '/Customer_Uploadszhoufei/2016-09-24/57e5f08166f09.ico' (length=53)//网站ico图片
  'config_logo' => string '/Customer_Uploads/zhoufei/2016-09-21/57e27a2725167.png' (length=54)//网站LOGO图片
  'config_pic' => string '/Customer_Uploads/zhoufei/2016-09-21/57e27a2728010.png' (length=54)//二维码图片
  'config_tel' => string '020-8888888' (length=11)//电话号码
  'config_phone' => string '13539993040' (length=11)//手机号码
  'config_customer' => string '869688800' (length=9)//在线聊天工具号
  'config_copyright' => string '云狄网络公司版权所有' (length=30)//网站版权信息
  'config_record' => string '888888888' (length=9)//备案号
  'config_address' => string '广州' (length=6)//地址
  'config_email' => string 'vzhoufei@qq.com' (length=15)//邮箱
  'config_statistics' => string 'rerrrrrrrrrrrrrrrr' (length=18)//站长统计代码
  'config_time' => string '1474687105' (length=10)



  //栏目导航数据
  $columns
  //栏目传参格式：
   <li><a href="{{:U($v['column_type'],array('id'=>$v['column_id']))}}">{{$v['column_name']}}</a></li>
  //遍历数据格式
  <foreach name="columns" item="v">//遍历一级栏目
  	 <li><a href="{{:U($v['column_type'],array('id'=>$v['column_id']))}}">{{$v['column_name']}}</a></li>
  	 <foreach name="v['second']" item="vo">//遍历二级栏目
  	 <li><a href="{{:U($vo['column_type'],array('id'=>$vo['column_id']))}}">{{$vo['column_name']}}</a></li>
  	 </foreach>
  </foreach>

   			[column_id] => 10 //栏目id
            [column_name] => 栏目名称
            [column_title] => 栏目标题
            [column_keywords] => 栏目关键字
            [column_description] => 栏目描述
            [column_type] => newss   //栏目类型



 //轮播图
$carousel;
array (size=5)
  0 => 
    array (size=5)
      'carousel_id' => string '14' (length=2)  //id
      'carousel_name' => string '第一张轮播图' (length=18)//名称
      'carousel_url' => string 'http://www.airenxiao.com' (length=24)//要跳转的地址url
      'carousel_pic' => string '/Customer_Uploads/test111/2016-09-24/57e626d313fa6.jpg' (length=54)//图片
      'carousel_remarks' => string 'FFFFFFFFFFFFFFFFFFFFFF' (length=22)//备注
  1 => ........



//友情链接
   $friendships;
   array (size=2)
  0 => 
    array (size=9)
      'friendship_id' => string '2' (length=1)
      'friendship_userid' => string '27' (length=2)
      'friendship_name' => string '第一个友链' (length=15)
      'friendship_url' => string 'http://www.baidu.com' (length=20)
      'friendship_logo' => string '/Customer_Uploads/test111/2016-09-26/57e8e2ae8afe1.jpg' (length=54)
      'friendship_email' => string '' (length=0)
      'friendship_status' => string '0' (length=1)
      'friendship_remarks' => string '' (length=0)
      'friendship_addtime' => string '1474880174' (length=10)
  1 => 




//留言表单
    <form action="" method="post">
      <input type="hidden" name="url" value="{{$redirect}}"> <!-- 必须 -->
      <input type="hidden" name="name" value="{{:session('prefix')}}"> <!-- 必须 -->
      <input type="text" name="username" placeholder="留言者姓名">
      <input type="text" name="tel" placeholder="留言者电话">
      <input type="text" name="qq" placeholder="留言者qq">
      <input type="text" name="email" placeholder="留言者邮箱">
      <textarea name="text" placeholder="留言内容"></textarea>
      <input type="text" name="code" placeholder="验证码" >
      <img src="{{$host}}/Message/code" alt="验证码图片" />
   </form>

  		----------------------------------------首页----------------------------------------
//资讯文章数据
$articles_news
//遍历格式
 <volist name="articles_news" id="vo" offset="0" length='12'>//从多少条开始 取多少条  0开始  取12条
 <a href="{{{{:U('Indexs/news',array('id'=>$vo['article_id']))}}}">{{$v['article_title']}}</a>
 </volist>

 //产品文章数据
$articles_product
//遍历格式
 <volist name="articles_product" id="vo" offset="0" length='12'>//从多少条开始 取多少条  0开始  取12条
 <a href="{{{{:U('Indexs/product',array('id'=>$vo['article_id']))}}}">{{$v['article_title']}}</a>
 </volist>
 //文章数据数组
array (size=3)
  0 => 
    array (size=12)
      'article_id' => string '35' (length=2)
      'article_userid' => string '27' (length=2)
      'article_title' => string '标题' (length=156)
      'article_keywords' => string '关键字' (length=12)
      'article_description' => string '描述' (length=84)
      'article_column' => string '10' (length=2)
      'article_pic' => string '/Customer_Uploads/test111/2016-09-24/57e6335f9225e.png' (length=54)//缩略图
      'article_publisher' => string '发布人' (length=6)
      'article_clicks' => string '0' (length=1)//点击数
      'article_text' => string '文章内容' (length=16464)//文章
      'article_time' => string '1474704223' (length=10)//发布时间
  1 => .....




  		--------------列表页 资讯列表、产品列表、封面页通用  封面页没有文章-------------------------
  //栏目信息  如 标题、关键字、描述等
  $column
  array (size=12)
  'column_text' => null
  'column_id' => string '10' (length=2)
  'column_userid' => string '27' (length=2)
  'column_name' => string '新闻资讯' (length=12)
  'column_title' => string '新闻资讯新闻资讯' (length=24)
  'column_keywords' => string '新闻资讯' (length=12)
  'column_description' => string '新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯' (length=96)
  'column_pid' => string '0' (length=1)
  'column_path' => string '0,' (length=2)
  'column_status' => string '0' (length=1)
  'column_time' => string '1474699052' (length=10)
  'column_type' => string 'newss' (length=5)



$current //当前栏目名称

//当前栏目导航
$current_column  
//遍历格式
	<div class="page-menu-title">
      <h3>{{$current_column['column_name']}}</h3>//一级导航
    </div>
      <ul>
       <foreach name="current_column['second']" item="v">//二级导航
        <li class="">
        <a href="{{:U($v['column_type'],array('id'=>$v['column_id']))}}"  target="">{{$v['column_name']}}</a><i></i></li>
      </foreach>
      </ul>
//数据
array (size=13)
  'column_text' => null
  'column_id' => string '10' (length=2)
  'column_userid' => string '27' (length=2)
  'column_name' => string '新闻资讯' (length=12)
  'column_title' => string '新闻资讯新闻资讯' (length=24)
  'column_keywords' => string '新闻资讯' (length=12)
  'column_description' => string '新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯新闻资讯' (length=96)
  'column_pid' => string '0' (length=1)
  'column_path' => string '0,' (length=2)
  'column_status' => string '0' (length=1)
  'column_time' => string '1474699052' (length=10)
  'column_type' => string 'newss' (length=5)
  'second' => 
    array (size=2)
      0 => .....




//文章数据
$articles;
//产品列表遍历格式  注意：产品列表模板a链接中传 product
<foreach name="articles" item="v">
	<a href="{{:U('product',array('id'=>$v['article_id']))}}" target="_blank">//链接格式
	<img src="{{$host}}{{$v['article_pic']}}" alt="{{$v['article_title']}}" />//缩略图
	</a>
</foreach>
//资讯列表遍历格式   注意：资讯列表模板a链接中传 news
<foreach name="articles" item="v">
	<a href="{{:U('news',array('id'=>$v['article_id']))}}" target="_blank">//链接格式
	<img src="{{$host}}{{$v['article_pic']}}" alt="{{$v['article_title']}}" />//缩略图
	</a>
</foreach>
//文章数据
array (size=3)
  0 => 
    array (size=12)
      'article_id' => string '35' (length=2)
      'article_userid' => string '27' (length=2)
      'article_title' => string '标题' (length=156)
      'article_keywords' => string '关键字' (length=12)
      'article_description' => string '描述' (length=84)
      'article_column' => string '10' (length=2)
      'article_pic' => string '/Customer_Uploads/test111/2016-09-24/57e6335f9225e.png' (length=54)//缩略图
      'article_publisher' => string '发布人' (length=6)
      'article_clicks' => string '0' (length=1)//点击数
      'article_text' => string '文章内容' (length=16464)//文章
      'article_time' => string '1474704223' (length=10)//发布时间
  1 => .....


//分页
 共 {{$number}} 页 {{$count}} 条记录 {{$show}}



 //相关文章
 $related_articles
 //遍历格式 注意：如果是资讯a链接中传news  产品传product
 <volist name="related_articles" id="vo" offset="0" length='12'>//从多少条开始 取多少条  0开始  取12条
 <a href="{{{{:U('Indexs/product',array('id'=>$vo['article_id']))}}}">{{$v['article_title']}}</a>
 </volist>
 //数据
 array (size=2)
  0 => 
    array (size=12)
      'article_id' => string '36' (length=2)
      'article_userid' => string '27' (length=2)
      'article_title' => string '第三篇篇文章测试1111111111111' (length=37)
      'article_keywords' => string '测试一发' (length=12)
      'article_description' => string '第三篇篇文章测试1111111111111' (length=37)
      'article_column' => string '11' (length=2)
      'article_pic' => string '/Customer_Uploads/test111/2016-09-24/57e64534cc942.png' (length=54)
      'article_publisher' => string '周飞' (length=6)
      'article_clicks' => string '1' (length=1)
      'article_status' => string '0' (length=1)
      'article_text' => string '<p>第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第��'... (length=12828)
      'article_time' => string '1474708789' (length=10)
  1 => 
    array (size=12).....






  		----------------------------文章页   文章页通用-------------------------

$article
 array (size=12)
  'article_id' => string '36' (length=2)
  'article_userid' => string '27' (length=2)
  'article_title' => string '第三篇篇文章测试1111111111111' (length=37)
  'article_keywords' => string '测试一发' (length=12)
  'article_description' => string '第三篇篇文章测试1111111111111' (length=37)
  'article_column' => string '11' (length=2)
  'article_pic' => string '/Customer_Uploads/test111/2016-09-24/57e64534cc942.png' (length=54)
  'article_publisher' => string '周飞' (length=6)
  'article_clicks' => string '1' (length=1)
  'article_status' => string '0' (length=1)
  'article_text' => string '<p>第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第三篇篇文章测试第��'... (length=12828)
  'article_time' => string '1474708789' (length=10)

  //上一篇 下一篇
 $listitem

//替换文章内容页中的图片 注意：对象要修改   将代码放到页面底部(不是footer.html)
  <script>
    for(var i = 0;i <= $('.qhd-content img').length;i++){
        
        $('.qhd-content img').eq(i).attr('src','{{$host}}' + $('.qhd-content img').eq(i).attr('src'))
    }

 </script>

// 相关文章和列表页一样
//当前栏目导航和列表页一样







































  //文章列表
$articles;
Array
(
    [0] => Array
        (
            [article_id] => 33
            [article_userid] => 27
            [article_title] => 第一篇文章测试1111111111111
            [article_keywords] => 测试一发
            [article_description] => 第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111
            [article_column] => 12
            [article_pic] => /Customer_Uploads/test111/2016-09-24/57e62cb7a0e27.png
            [article_publisher] => 周飞
            [article_clicks] => 0
            [article_status] => 0
            [article_text] => 

第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试111111111157830a419f306.jpg111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111第一篇文章测试1111111111111

            [article_time] => 1474702520
        )

    [1] => Array