<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"/www/wwwroot/zxdwlkj.com/application/admin/view/active/index.html";i:1592634116;s:67:"/www/wwwroot/zxdwlkj.com/application/admin/view/layout/layout3.html";i:1593686780;}*/ ?>
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
                        <dd><a href="<?php echo url('fengcai/index'); ?>"> 查看风采</a></dd>
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
            <li class="layui-this">查看活动</li>
        </ul>
        <div class="layui-tab-content">
            <form class="layui-form layui-form-pane" action="<?php echo url('admin/active/search'); ?>" method="get">
                <!-- <div class="layui-inline">
                    <label class="layui-form-label">分类</label>
                    <div class="layui-input-inline">
                        <select name="cid">
                            <option value="0">全部</option>
                            <?php if(is_array($category_level_list) || $category_level_list instanceof \think\Collection || $category_level_list instanceof \think\Paginator): if( count($category_level_list)==0 ) : echo "" ;else: foreach($category_level_list as $key=>$vo): ?>
                            <option value="<?php echo $vo['id']; ?>" <?php if($cid==$vo['id']): ?> selected="selected"<?php endif; ?>><?php if($vo['level'] != '1'): ?>|<?php for($i=1;$i<$vo['level'];$i++){echo ' ----';} endif; ?> <?php echo $vo['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div> -->
                <div class="layui-inline">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="请输入关键词" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn">搜索</button>
                </div>
            </form>
            <hr>

                <div class="layui-tab-item layui-show">
                    <!-- <button type="button" class="layui-btn layui-btn-small ajax-action" data-action="<?php echo url('admin/article/toggle',['type'=>'audit']); ?>">审核</button>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-small ajax-action" data-action="<?php echo url('admin/article/toggle',['type'=>'cancel_audit']); ?>">取消审核</button>
                    <button type="button" class="layui-btn layui-btn-danger layui-btn-small ajax-action" data-action="<?php echo url('admin/article/delete'); ?>">删除</button> -->
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <!-- <th style="width:80px;"><input type="checkbox"  name="quanxuan" id="quan"> 全选</th> -->
                            <!-- <th style="width: 30px;">ID</th> -->
                            <th>活动标题</th>
                            <th>开始时间</th>
                            <th>结束时间</th>
                            
                            

                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
                        <tr>
                            <!-- <td align="center" style="width:80px;"><input type="checkbox"  class="xuan" name="id[]" value="<?php echo $vo['id']; ?>"></td> -->
                            <!-- <td><?php echo $vo['id']; ?></td> -->
                            <td><?php echo $vo['title']; ?></td>
                            <td><?php echo $vo['start_time']; ?></td>
                            <td><?php echo $vo['end_time']; ?></td>
                            <td>
                                <a href="<?php echo url('active/status',array('id'=>$vo['id'],'status'=>$vo['status'])); ?>" class="layui-btn layui-btn-normal layui-btn-mini"><?php if(($vo['status'] == 0)): ?>首页轮播<?php else: ?>首页不轮播<?php endif; ?></a>

                            	<a href="<?php echo url('active/updateactive',array('id'=>$vo['id'])); ?>" class="layui-btn layui-btn-normal layui-btn-mini">修改</a>

                                <a href="<?php echo url('active/delactive',array('id'=>$vo['id'])); ?>" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <!--分页-->
                    <?php echo $data->render(); ?>
                </div>
            <!-- </form> -->
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