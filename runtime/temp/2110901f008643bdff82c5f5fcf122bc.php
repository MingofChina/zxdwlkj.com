<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/www/wwwroot/zxdwlkj.com/application/admin/view/places/addplaces.html";i:1592630962;s:67:"/www/wwwroot/zxdwlkj.com/application/admin/view/layout/layout3.html";i:1593663714;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/public/layout3/js/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/public/layout3/css/font-awesome.min.css">
    <!--CSS引用-->
    
    <link type="text/css" rel="stylesheet" href="/public/times/1.css">
    

    <link rel="stylesheet" href="/public/layout3/css/admin.css">
    <!--[if lt IE 9]>
    <script src="/public/layout3/css/html5shiv.min.js"></script>
    <script src="/public/layout3/css/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
        <a href=""><img class="logo" src="/public/layout3/images/admin_logo.png" alt=""></a>
        <ul class="layui-nav" style="position: absolute;top: 0;right: 20px;background: none;">
            <!-- <li class="layui-nav-item"><a href="<?php echo url('/'); ?>" target="_blank">前台首页</a></li> -->
            <!-- <li class="layui-nav-item"><a href="" data-url="<?php echo url('admin/system/clear'); ?>" id="clear-cache">清除缓存</a></li> -->
            <li class="layui-nav-item">
                <a href="javascript:;">admin</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="<?php echo url('login/update'); ?>">修改密码</a></dd>
                    <dd><a href="<?php echo url('login/logout'); ?>">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                <!-- <li class="layui-nav-item">
                    <a href="<?php echo url('admin/index/index'); ?>"><i class="fa fa-home"></i> 网站信息</a>
                </li> -->

                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('Adminuser/add'); ?>"> 添加管理员</a></dd>
                        <dd><a href="<?php echo url('Adminuser/index'); ?>"> 查看管理员</a></dd>
                    </dl>
                </li>


                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 幻灯片管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('slideimg/add'); ?>"> 添加幻灯片</a></dd>
                        <dd><a href="<?php echo url('slideimg/index'); ?>"> 查看幻灯片</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 活动管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('active/addactive'); ?>"> 添加活动</a></dd>
                        <dd><a href="<?php echo url('active/index'); ?>"> 查看活动</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 活动地点管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('places/addplaces'); ?>"> 添加活动地点</a></dd>
                        <dd><a href="<?php echo url('places/index'); ?>"> 查看活动地点</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 预约管理</a>
                    <dl class="layui-nav-child">
                        
                        <dd><a href="<?php echo url('orderdetail/index'); ?>"> 查看活动地点</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 风采管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('fengcai/addfengcai'); ?>"> 添加风采</a></dd>
                        <!-- <dd><a href="<?php echo url('fengcai/index'); ?>"> 查看风采</a></dd> -->
                    </dl>
                </li>

              

                <!-- <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 案例管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('active/addcate'); ?>"> 添加案例分类</a></dd>
                        <dd><a href="<?php echo url('active/viewcate'); ?>"> 查看案例分类</a></dd>
                        <dd><a href="<?php echo url('active/addcase'); ?>"> 添加案例</a></dd>
                        <dd><a href="<?php echo url('active/viewcase'); ?>"> 查看案例</a></dd>
                    </dl>
                </li> -->

                <!-- <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 资讯管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('news/addnews'); ?>"> 添加资讯</a></dd>
                        <dd><a href="<?php echo url('news/index'); ?>"> 查看资讯</a></dd>
                        
                    </dl>
                </li> -->

                <!-- <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 服务管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('service/add'); ?>"> 添加服务</a></dd>
                        <dd><a href="<?php echo url('service/index'); ?>"> 查看服务</a></dd>
                        
                    </dl>
                </li> -->

            


                <!-- <li class="layui-nav-item">
                    <a href="javascript:;"><i class="fa fa-home"></i> 关于我们</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('about/content'); ?>"> 关于我们</a></dd>
                        <dd><a href="<?php echo url('about/contact'); ?>"> 联系我们</a></dd>
                    </dl>
                </li> -->

                

                
                
                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>

              
            </ul>
        </div>
    </div>

    <!--主体-->
    
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="">添加城市地点</li>
            <!-- <li class="layui-this">添加文章</li> -->
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form id="good" class="layui-form form-container" action="<?php echo url('places/zuoaddplaces'); ?>" method="post">

                    <div class="layui-form-item">
                        <label class="layui-form-label">城市地点</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="" required  lay-verify="required" placeholder="请输入地点" class="layui-input">
                        </div>
                    </div>

                    



                    
                   
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="*">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <center><p style="width:300px;">2020-2021 &copy; 梦想者工艺管理系统</p></center>
        </div>
    </div>
</div>

<script>
    // 定义全局JS变量
    var GV = {
        current_controller: "admin/<?php echo (isset($controller) && ($controller !== '')?$controller:''); ?>/",
        base_url: "/public/layout3"
    };
</script>
<!--JS引用-->
<script src="/public/layout3/js/jquery.min.js"></script>
<script src="/public/layout3/js/layui/lay/dest/layui.all.js"></script>
<script src="/public/layout3/js/admin.js"></script>

    

<!--页面JS脚本-->

</body>
</html>