<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>久鑫网络后台管理系统</title>
    <link rel="stylesheet" href="<?php echo (ADMIN_PUBLIC); ?>/layui/css/layui.css?v=v2.3.0">
    <link rel="stylesheet" href="<?php echo (ADMIN_PUBLIC); ?>/font-awesome/css/font-awesome.min.css?V4.7.0" type="text/css">
    <link rel="stylesheet" href="<?php echo (ADMIN_PUBLIC); ?>/css/comm.css?v=v1.3.6">
    <link href="<?php echo (ADMIN_PUBLIC); ?>/css/jquery.treetable.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.treetable.js"></script>
    <script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/checkform.js"></script>

</head>

<body class="layui-layout-body">


<div class="layui-layout layui-layout-admin">
	<div class="layui-header">
    <div class="layui-logo">
        <a href="/jxadmin/admin.php" title="<?php echo sys('sys_sitename');?>后台管理系统">
            <?php echo sys('sys_sitename');?>后台管理
        </a>
    </div>

    <ul class="menu">
        <li class="menu-ico" title="显示或隐藏侧边栏"><i class="fa fa-bars" aria-hidden="true"></i></li>
    </ul>

    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item layui-hide-xs">
             您好，<?php echo (session('admin_username')); ?>
        </li>
        <?php $qxid=explode(",",session('admin_role_auth_ids'));?>

        <li class="layui-nav-item layui-hide-xs">
            <a href="javascript:;">
                <i class="fa fa-cog" aria-hidden="true"></i> 系统配置</a>
                <dl class="layui-nav-child">

                    <?php if($_SESSION['admin_role_auth_ids']== 0): ?><dd><a href="<?php echo U('Settings/Index');?>"><i class="fa fa-sliders" aria-hidden="true"></i>系统设置</a></dd>
                        <dd ><a href="<?php echo U('Sort/Index');?>"><i class="fa fa-bars" aria-hidden="true"></i>栏目管理</a></dd>
                        <dd ><a href="<?php echo U('Role/Index');?>"><i class="fa fa-hand-stop-o" aria-hidden="true"></i>系统角色</a></dd>
                        <dd ><a href="<?php echo U('Manager/Index');?>"><i class="fa fa-users" aria-hidden="true"></i>系统用户</a></dd>
                        <dd ><a href="<?php echo U('Backup/Index');?>"><i class="fa fa-database" aria-hidden="true"></i>数据备份</a></dd>
                        <dd ><a href="<?php echo U('Logs/Index');?>"><i class="fa fa-history" aria-hidden="true"></i>系统日志</a></dd>
                        <dd ><a href="<?php echo U('Sort/Make');?>"><i class="fa fa-database" aria-hidden="true"></i>更新缓存</a></dd>
                    <?php else: ?>
                        <?php if(in_array(9901,$qxid)): ?><dd><a href="<?php echo U('Settings/Index');?>"><i class="fa fa-sliders" aria-hidden="true"></i>系统设置</a></dd><?php endif; ?>
                        <?php if(in_array(9903,$qxid)): ?><dd><a href="<?php echo U('Sort/Index');?>"><i class="fa fa-bars" aria-hidden="true"></i>栏目管理</a></dd><?php endif; ?>
                        <?php if(in_array(9904,$qxid)): ?><dd><a href="<?php echo U('Role/Index');?>"><i class="fa fa-hand-stop-o" aria-hidden="true"></i>系统角色</a></dd><?php endif; ?>
                        <?php if(in_array(9905,$qxid)): ?><dd><a href="<?php echo U('Manager/Index');?>"><i class="fa fa-users" aria-hidden="true"></i>系统用户</a></dd><?php endif; ?>
                        <?php if(in_array(9907,$qxid)): ?><dd><a href="<?php echo U('Backup/Index');?>"><i class="fa fa-database" aria-hidden="true"></i>数据备份</a></dd><?php endif; ?>
                        <?php if(in_array(9906,$qxid)): ?><dd><a href="<?php echo U('Logs/Index');?>"><i class="fa fa-history" aria-hidden="true"></i>系统日志</a></dd><?php endif; ?>
                        <?php if(in_array(9908,$qxid)): ?><dd><a href="<?php echo U('Sort/Make');?>"><i class="fa fa-database" aria-hidden="true"></i>更新缓存</a></dd><?php endif; endif; ?>


                    <?php if($_SESSION['admin_id']== 99999999): ?><dd ><a href="<?php echo U('Model/Index');?>"><i class="fa fa-codepen" aria-hidden="true"></i>模型管理</a></dd>
                        <dd ><a href="<?php echo U('Forms/Index');?>"><i class="fa fa-database" aria-hidden="true"></i>表单管理</a></dd><?php endif; ?>


                </dl>
        </li>


        <li class="layui-nav-item layui-hide-xs">
            <a href="javascript:;">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo (session('admin_role_name')); ?></a>
                <dl class="layui-nav-child">
                    <dd><a href="/" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> 网站首页</a></dd>
                    <dd><a href="<?php echo U('Manager/Person');?>"><i class="fa fa-address-card-o" aria-hidden="true"></i> 密码修改</a></dd>
                    <dd><a href="<?php echo U('Admin/Logout');?>" onClick="return confirm('确定退出系统吗？\n退出后自动关闭窗口！');"><i class="fa fa-sign-out" aria-hidden="true"></i> 退出登陆</a></dd>
                </dl>
        </li>
    </ul>
</div>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域 -->
        <ul class="layui-nav layui-nav-tree" id="nav" lay-shrink="all">
            <?php $_result=get_mytable_list('sort',' AND pid=0','id,catname');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li class="layui-nav-item nav-item<?php if($v1['id']==I('get.pid',0)){?> layui-nav-itemed<?php }?>">
                <a class="" href="javascript:;"><i class="fa fa-globe" aria-hidden="true"></i><?php echo ($v1['catname']); ?></a>

                <?php $_result=get_mytable_list('sort',' AND pid='.$v1['id'].'','id,catname');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i; $count2=get_count("sort",'status=1 AND pid='.$v2['id'].''); if($count2) $url2="javascript:;";elseif($v2['sort_url'])$url2=$v2['sort_url'];else $url2=U("{$v2['sort_c']}/{$v2['sort_a']}","pid=".$v1['id']."&ty=".$v2['id'].""); ?>
                    <dl class="layui-nav-child ">
                        <dd <?php if($v2['id']==I('get.ty',0)){?>class="layui-nav-itemed"<?php }?>>
                            <a href="<?php echo $url2;?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo ($v2['catname']); ?></a>
                        <?php if($count2){?>
                            <?php $_result=get_table_list('sort',' AND pid='.$v2['id'].'','id,catname,sort_a,sort_c');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?><dl class="layui-nav-child">
                                <dd <?php if($v3['id']==I('get.tty',0)){?>class="layui-nav-itemed"<?php }?>>
                                    <a href="<?php echo U("{$v3['sort_c']}/{$v3['sort_a']}","pid=".$v1['id']."&ty=".$v2['id']."&tty=".$v3['id']."")?>"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo ($v3['catname']); ?></a>
                                </dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php }?>
                        </dd>
                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>

	<div class="layui-body">
		<div class="layui-tab layui-tab-brief" lay-filter="tab">
			<input type="hidden" id="url" value="Admin-Backup">
			<ul class="layui-tab-title">
				<a href="<?php echo U('Backup/Index');?>" class="btachs"><li>数据备份</li></a>
				<li><a href="<?php echo U('Backup/Import');?>" class="layui-this btachs">还原数据</a></li>
			</ul>
			<div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
					<table class="layui-table">
						<form action="" method="post" name="formlist" class="layui-form">
							<thead>
							<tr>
								<th>文件名称</th>
								<th>大小</th>
								<th>创建时间</th>
								<th>操作</th>
							</tr>
							</thead>
							<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($v[0]); ?></td>
									<td><?php echo ($v[2]); ?></td>
									<td><?php echo (date('Y-m-d H:i:s',$v[1])); ?></td>
									<td>
										<a href="javascript:;" data-name="<?php echo ($v[0]); ?>" go-url="Admin-Backup-Import" class='import layui-btn layui-btn-xs layui-btn-danger' title='还原'>还原</a>
										<a href="javascript:;" data-url="<?php echo U(CONTROLLER_NAME.'/Del',"key=".$v[0]."");?>" go-url="<?php echo U(CONTROLLER_NAME.'/Import');?>" class='del layui-btn layui-btn-xs' title='删除'>删除</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</form>
					</table>

				</div>
			</div>
		</div>
	</div>

	<div class="layui-footer">
	<!-- 底部固定区域 -->
	&copy; <a href="../" target="_blank"><?php echo sys('sys_sitename');?> 版权所有</a> - <a href="http://www.9-xin.com" target="_blank">技术支持:久鑫网络.</a>
 </div>
<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/layui/layui.all.js?v=v2.4.5"></script>
<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/comm.js?v=v1.3.6"></script>
<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/mylayui.js?v=v1.3.5"></script>

<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</div>

</body>
</html>