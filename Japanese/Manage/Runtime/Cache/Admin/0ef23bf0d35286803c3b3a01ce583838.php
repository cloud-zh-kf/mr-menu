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
			<ul class="layui-tab-title">
				<li><a href="<?php echo U('Model/Index');?>">角色列表</a></li>
				<li class="layui-this"><a href="<?php echo U('Model/Add');?>">角色添加</a></li>
			</ul>
			<div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
					<form action="" method="post" class="layui-form">
						<input type="hidden" name="id" value="<?php echo ($v['id']); ?>">
						<div class="layui-form-item">
							<label class="layui-form-label">角色名称</label>
							<div class="layui-input-inline">
								<input type="text" name="role_name" value="<?php echo ($v['role_name']); ?>" required lay-verify="required" placeholder="请输入角色名称" class="layui-input">
							</div>
						</div>

						<div class="layui-form-item">
							<label class="layui-form-label">角色权限</label>
							<div class="layui-input-block" id="selectitem">

								<?php $_result=get_table_list('sort',' AND pid=0','id,catname');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><div class='layui-row'>
									<div class='layui-col-md3 layui-col-lg2 checkboxs' style='margin-top:10px;'>　　
										<i class='fa fa-folder-o' aria-hidden='true'></i> <?php echo ($v1['catname']); ?>
									</div>

									<div class='layui-col-md9 auth_rules'>
										<?php $_result=get_table_list('sort',' AND pid='.$v1['id'].'','id,catname','');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><input type="checkbox" <?php if(in_array($v2['id'],$v['role_auth_ids'])): ?>checked<?php endif; ?> class="checkbox" lay-skin="primary" name="role_auth_ids[]" value="<?php echo ($v2['id']); ?>" title='<?php echo ($v2['catname']); ?>'><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>

								<div class='layui-row'>
									<div class='layui-col-md3 layui-col-lg2' style='margin-top:10px;'>　　
										<i class='fa fa-folder-o' aria-hidden='true'></i>系统管理</div>
									<div class='layui-col-md9'>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9901' title='系统设置' <?php if(in_array(9901,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9902' title='模型管理' <?php if(in_array(9902,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9903' title='栏目管理' <?php if(in_array(9903,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9904' title='系统角色' <?php if(in_array(9904,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9905' title='系统用户' <?php if(in_array(9905,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9906' title='系统日志' <?php if(in_array(9906,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9907' title='数据库备份' <?php if(in_array(9907,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
										<input type='checkbox' class='checkbox' lay-skin='primary' name='role_auth_ids[]' value='9908' title='更新缓存' <?php if(in_array(9908,$v['role_auth_ids'])): ?>checked<?php endif; ?>>
									</div>
								</div>

							</div>
						</div>


						<div class="layui-form-item">
							<label class="layui-form-label">状态</label>
							<div class="layui-input-block">
								<input type="radio" name="status" value="1" title="启用"  <?php echo get_my_checked($v['status'],1);?>>
								<input type="radio" name="status" value="0" title="禁用"  <?php echo get_my_checked($v['status'],0);?>>
							</div>
						</div>

						<div class="layui-form-item">
							<div class="layui-input-block">
								<button class="layui-btn" lay-submit name="dosave">立即提交</button>
								<button type="reset" class="layui-btn layui-btn-primary">重置</button>
							</div>
						</div>

					</form>
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