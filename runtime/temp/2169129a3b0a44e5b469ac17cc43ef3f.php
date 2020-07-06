<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/www/wwwroot/zxdwlkj.com/application/admin/view/active/addactive.html";i:1593504686;s:67:"/www/wwwroot/zxdwlkj.com/application/admin/view/layout/layout3.html";i:1593686780;}*/ ?>
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
            <li class="">添加活动</li>
            <!-- <li class="layui-this">添加文章</li> -->
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form id="good" class="layui-form form-container" action="<?php echo url('active/zuoaddactive'); ?>" method="post">

                    <div class="layui-form-item">
                        <label class="layui-form-label">所属地点</label>
                        <div class="layui-input-block">
                            <select name="place_cate" lay-verify="required">
                                
                                <?php if(is_array($places) || $places instanceof \think\Collection || $places instanceof \think\Paginator): if( count($places)==0 ) : echo "" ;else: foreach($places as $key=>$vo): ?>
                                <option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                
                               
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">活动标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" value="" required  lay-verify="required" placeholder="请输入标题" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">banner图</label>
                        <div class="layui-input-block">
                            <input type="hidden" id="pic" name="banner" value="">
                            <input type="file" onchange="picUpload()" name="slt" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">banner图展示</label>
                        <div class="layui-input-block" style="display:none;">
                            <img src="" id="slideimg">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">预约开始时间</label>
                        <div class="layui-input-block">
                            <!-- <input name="start_time" value="<?php echo $shijian; ?>" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"> -->
                            <input type="text" id="date2" name="start_time">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">预约结束时间</label>
                        <div class="layui-input-block">
                            <input type="text" id="date3" name="end_time">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">活动地点</label>
                        <div class="layui-input-block">
                            <input type="text" name="place" value="" required  lay-verify="required" placeholder="请输入活动地点" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">活动说明</label>
                        <div class="layui-input-block">
                            <input type="text" name="descrip" value="" required  lay-verify="required" placeholder="请输入活动说明" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">详情图片组</label>
                        <div class="layui-input-block">
                            <input type="hidden" id="detail_pics" name="detail_pics" value="">
                            <input type="file" onchange="erpicUpload()" name="detail_img" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">详情图片组展示</label>
                        <div class="layui-input-block">
                            <div id="charu">
                                <!-- <div style="float:left;margin-top:20px;">
                                    <a href="/public/uploads/20200620/6abac3dacda262280ce5da5db9331fb5.png" target="_blank">
                                        <img src="/public/uploads/20200620/6abac3dacda262280ce5da5db9331fb5.png" class="imgss" style="width:100px;height:100px;">
                                    </a>
                                    <img src="/public/file/images/cuo.png" style="width:20px;height:20px;position: relative;left:-16px;top:-46px;">
                                </div> -->


                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">课程日期</label>
                        <div class="layui-input-block">
                            <input type="text" name="start_day" value="" required  lay-verify="required" placeholder="2020-06-30" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">课程时间</label>
                        <div class="layui-input-block">
                            <input type="text" name="lesson_time" value="" required  lay-verify="required" placeholder="12:30-13:30" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">课程功能</label>
                        <div class="layui-input-block">
                            <input type="text" name="lesson_function" value="" required  lay-verify="required" placeholder="请输入课程功能" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">教练名字</label>
                        <div class="layui-input-block">
                            <input type="text" name="lesson_coach" value="" required  lay-verify="required" placeholder="请输入教练名字" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">从课程中获得</label>
                        <div class="layui-input-block">
                            <input type="text" name="lesson_learned" value="" required  lay-verify="required"  class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">跟着课程一起</label>
                        <div class="layui-input-block">
                            <input type="text" name="lesson_together" value="" required  lay-verify="required"  class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">启发我个人灵感的有</label>
                        <div class="layui-input-block">
                            <input type="text" name="personal_inspiration" value="" required  lay-verify="required"  class="layui-input">
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

    <script type="text/javascript">
        //给表单元素绑定change事件
        function picUpload(){
            $.ajax({
                url:"<?php echo url('slideimg/picUpload'); ?>",
                type:'POST',
                cache:false,
                data:new FormData($('#good')[0]),
                processData:false,
                contentType:false,
                dataType:"text",
                success:function(data){
                    console.log(data);
                    $('#pic').attr('value',data);
                    $('#slideimg').attr('src',data);
                    $('#slideimg').parent().css('display','block');
                },
                error:function(data){
                    console.log(data);
                    // $('#pic').attr('value',data);
                },
                async:false
            });
        }
    </script>

    <script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script>
        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
          var ue = UE.getEditor('editor', {
    toolbars: [
            ['source', 'bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage', 'fullscreen']
        ],
        elementPathEnabled: false,
        enableContextMenu: false,
        autoClearEmptyNode:true,
        wordCount:false,
        imagePopup:false,
        autotypeset:{ indent: true,imageBlockLine: 'center' }
    });

          


    </script>

    <!-- <script type="text/javascript" src="/public/timejs/laydate.js"></script>
    <script type="text/javascript">
        !function(){
            laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
            laydate({elem: '#demo'});//绑定元素
        }();
    </script> -->

    <script type="text/javascript" src="/public/times/1.js"></script>
    <script type="text/javascript">
        // demo1
        // var picker1 = new Datepicker({
        //     elemName: 'date1',
        //     format: 'YYYY-MM-DD hh:mm:ss',
        //     min: -4,
        //     callBack: function(a, b){
        //         console.log(a, b)
        //     }
        // });

        // demo2
        var picker2 = new Datepicker({
            elemName: 'date2',
            format: 'YYYY-MM-DD hh:mm:ss',
            callBack: function(a, b){
                picker3.setMinScope(b, 1);
            }
        });
        var picker3 = new Datepicker({
            elemName: 'date3',
            format: 'YYYY-MM-DD hh:mm:ss',
            callBack: function(a, b){
                picker2.setMaxScope(a);
            }
        });
    </script>

    <script type="text/javascript">
        function erpicUpload(){

            $.ajax({
                url:"<?php echo url('active/erpicUpload'); ?>",
                type:'POST',
                cache:false,
                data:new FormData($('#good')[0]),
                processData:false,
                contentType:false,
                dataType:"text",
                success:function(data){
                    console.log(data);
                    var str = '';
                   

                    str += `
                        <div style="float:left;margin-top:20px;">
                            <a href="${data}" target="_blank">
                                <img src="${data}" class="imgss" style="width:100px;height:100px;">
                            </a>
                            <img src="/public/file/images/cuo.png" class="sss" style="width:20px;height:20px;position: relative;left:-16px;top:-46px;">
                        </div>
                    `;
                    
                    $('#charu').append(str);
                    shanchu();

                    chongzhi();
                },
                error:function(data){
                    console.log(123);
                    console.log(data);
                }
            });
        }

        function shanchu(){
            $('.sss').click(function(){
                $(this).parent().remove();
                chongzhi();
            })
        }

        function chongzhi(){
            var pinjie = '';
            $('.imgss').each(function(){
                pinjie += $(this).attr('src') + ',';
            });
            // console.log(pinjie);
            $('#detail_pics').val(pinjie);
        }
    </script>

<!--页面JS脚本-->

</body>
</html>