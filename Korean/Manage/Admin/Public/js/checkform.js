$(document).ready(function(){	
	$(".myoption").hide();
	//删除批量上传图片
    $(".titlepicdel").click(function(){
        var id=this.title;
        $.get("/Admin-News-Titlepic-id-"+id+'.html',null,function(data){
            $(".img"+id).remove();
        });
    })

	//.css('background-color', 'red');  
	$(".checkboxs").click(function (){
		var is_check = $(this).find('input').get(0).checked; //判断是否选中
		$(this).parent().find(".auth_rules").find('input').attr("checked",is_check);    
	})
	$(".auth_rules").click(function (){
		var is_check = $(this).find('input').get(0).checked; //判断是否选中
		var c=$(this).parent().find(".auth_rules>input:checkbox:checked").length;
		if(c==0) is_check=false;else is_check=true;
		//alert(c);
	   $(this).parent().find(".checkboxs").find('input').attr("checked",is_check);  
	})   
	
	$("#vartype").click(function(){
		var v=$(this).val();
		if(v==3){
			$(".varoption").show();
		}
	});
	
	$("#model_id").change(function (){
		var v=$(this).val();
		strs=v.split("|"); 
		var model_id=$("#model_id").find("option:selected").attr("title");
		if(model_id>0){
			$(".show").show();	
		}else{
			$(".show").hide();	
		}
		
		$("#templet").val(strs[1]);	
		$("#sort_c").val(strs[1]);	
		$("#sort_a").val(strs[2]);	
 	})

	
	
	$('.tablelist tbody tr:odd').addClass('odd');
	
   $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
	
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
	
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
	
	
	$(".do").click(function(){
		var type=$(this).attr("type");
		var list=$(this).attr("data-name");
		var choose=$(this).parent().parent().find("input").is(':checked');
 	 
		if(choose==false)
		{
			alert('请选择表');
			return false;
		}
		else
		{
			var url=$("#url").val();
			//alert(url+"/btach/id/"+list+"/type/"+type)
			$.get(url+"-btach-id-"+list+"-type-"+type+'.html',null,function(data){   
				alert(data);
				setTimeout(function(){location.href=url;},1500);
 			});
		}
	});
	
	
	$(".btach").click(function(){
		var type=$(this).attr("type");

		var list="";		
		$($("input[name='id']:checked")).each(function(){
			if(list==""){list+=this.value}else{list+=","+this.value}                   
		}); 
		 
		if(list=="")
		{
			alert('至少选择一个表');
			return false;
		}
		else
		{
			var url=$("#url").val();	
			$.get(url+"-btach-id-"+list+"-type-"+type+'.html',null,function(data){
				if(data=='备份成功'||data=='优化成功'||data=='删除成功'||data=='还原成功'||data=='修复成功')alert(data);else alert('表文件太大,运行超时,备份失败!');
				setTimeout(function(){location.href=url;},1500);
 			});
		}
	});
	
	
	
	
	$(".del").click(function(){
		if(confirm("您确定要删除备份数据吗?")){
            var url=$(this).attr("data-url");
            var gourl=$(this).attr("go-url");
            $.get(url,null,function(data){
                alert(data);
                setTimeout(function(){location.href=gourl;},1500);
            });
		}
 	});
		
	
	
	
	$(".import").click(function(){
		var key=$(this).attr("data-name");
		var gourl=$(this).attr("go-url");
		//alert(gourl+"-key-"+key+'.html');
		//return false;
		$.get(gourl+"-key-"+key+'.html',null,function(data){   
			alert(data);
			setTimeout(function(){location.href=gourl;},1500);
		});
 	});
		
	
	
});

function deleteimg(id){
	
	$.get("/Admin-Artist-Delete-id-"+id+'.html',null,function(data){  
		$(".img"+id).remove();													 	
	});
}



 
function showtr(seltag){
	if(seltag=="1"){
		$('#clzshow').show();
		//$('#cwcshow').hide();
	}else if(seltag=="2"){
		//$('#clzshow').hide();
		$('#cwcshow').show();
	}
 }


function CheckAll(formlist){
  var val=document.formlist.all.checked;
  for (var i=0;i<document.formlist.elements.length;i++){
    var e = document.formlist.elements[i];
    if (e.name != 'all')
      e.checked = val;
  }
}

function checkData (formlist){  
  var RecordsCount=0;
  for (var i=0;i<document.formlist.elements.length;i++){
                var e = document.formlist.elements[i];
                if (e.name != 'all' && e.checked)
                       RecordsCount++;
  }
           
  if(!RecordsCount){
      alert("你还没选择记录！");
      return false
  }else {
     if (confirm("即将操作所有选择的记录， 是否继续 ？")){            
     	return true;
	 }else{
         return false;
	 }
   }
}
 
function show(val){
	if(val==2){
		document.getElementById("dlqy").style.display = "block";
	}else{
		document.getElementById("dlqy").style.display = "none";
	}
			
	if(val==1){
		document.getElementById("gsmc").style.display = "block";
		document.getElementById("ywfw").style.display = "block";				
	}else{
		document.getElementById("gsmc").style.display = "none";
		document.getElementById("ywfw").style.display = "none";
	}
			
}


function changeselect1(locationid){
	document.formlist.ty.length = 0;
	document.formlist.ty.options[0] = new Option('-请选择-','');
	for (i=0; i<subcat.length; i++){
		if (subcat[i][0] == locationid){
			document.formlist.ty.options[document.formlist.ty.length] = new Option(subcat[i][1], subcat[i][2]);
		}
	}
}

function changeselect2(locationid2){
	document.formlist.tty.length = 0;
	document.formlist.tty.options[0] = new Option('-请选择-','');
	for (n=0; n<subcat2.length; n++){
		if (subcat2[n][0] == locationid2){
			document.formlist.tty.options[document.formlist.tty.length] = new Option(subcat2[n][1], subcat2[n][2]);
		}
	}
}

function changeselect3(locationid){
	document.formlist.cityid.length = 0;
	document.formlist.cityid.options[0] = new Option('-请选择-','');
	for (i=0; i<subcat.length; i++){
		if (subcat[i][0] == locationid){
			document.formlist.cityid.options[document.formlist.cityid.length] = new Option(subcat[i][1], subcat[i][2]);
		}
	}
}

function changeselect4(locationid2){
	document.formlist.countyid.length = 0;
	document.formlist.countyid.options[0] = new Option('-请选择-','');
	for (n=0; n<subcat2.length; n++){
		if (subcat2[n][0] == locationid2){
			document.formlist.countyid.options[document.formlist.countyid.length] = new Option(subcat2[n][1], subcat2[n][2]);
		}
	}
}

function changecats(locationid){
	document.formlist.ty.length = 0;
	document.formlist.ty.options[0] = new Option('-请选择-','');
	for (i=0; i<subcat3.length; i++){
		if (subcat3[i][0] == locationid){
			document.formlist.ty.options[document.formlist.ty.length] = new Option(subcat3[i][1], subcat3[i][2]);
		}
	}
}


//去空格
function checkspace(checkstr) {
	var str = '';
	for(i = 0; i < checkstr.length; i++) 
	{
		str = str + ' ';
	}
	return (str == checkstr);
}

//验证用户登录
function check_login(formlist){
	if(checkspace(formlist.username.value)||formlist.username.value=='用户名'){
		alert("请输入登录用户名!");
		formlist.username.focus();
		return false;
	}
	if(checkspace(formlist.password.value)||formlist.password.value=='密码'){
		alert("请输入登录密码!");
		formlist.password.focus();
		return false;
	}	
	if(checkspace(formlist.yzm.value)||formlist.yzm.value=='验证码'){
		alert("请输入验证码!");
		formlist.yzm.focus();
		return false;
	}	
}
   
   
 //角色
function check_person(formlist){	
	if (checkspace(formlist.oldpwd.value)){
		alert("请输入原密码！");
		formlist.oldpwd.focus();
		return false;
	}
	
	if (checkspace(formlist.newpwd.value)){
		alert("请输入新密码！");
		formlist.newpwd.focus();
		return false;
	}
	
	
	if (checkspace(formlist.renewpwd.value)){
		alert("请输入确认密码！");
		formlist.renewpwd.focus();
		return false;
	}
	
	
	if (formlist.newpwd.value!=formlist.renewpwd.value)
	{
		alert("提示：您两次输入的密码不一样，请检查后重新输入！");
		formlist.renewpwd.focus();
		return (false);
	}
    	
}  
     
   
 //角色
function check_role_add(formlist){	
	if (checkspace(formlist.role_name.value)){
		alert("请输入角色名称！");
		formlist.role_name.focus();
		return false;
	}
}  
  
 //权限
function check_auth_add(formlist){	
	if (checkspace(formlist.auth_name.value)){
		alert("请输入权限名称！");
		formlist.auth_name.focus();
		return false;
	}
}  
 
  
 //模块
function check_model_add(formlist){
	if (checkspace(formlist.model_name.value)){
		alert("请输入模块名称！");
		formlist.model_name.focus();
		return false;
	}
}  

  
 //分类
function check_sort_add(formlist){	
	if (checkspace(formlist.catname.value)){
		alert("请输入分类名称！");
		formlist.catname.focus();
		return false;
	}
}  
 
  
//商品添加
function check_goods_add(formlist){	
	
	if (checkspace(formlist.title.value)){
		alert("请输入标题名称！");
		formlist.title.focus();
		return false;
	}
 	
	if (checkspace(formlist.productcode.value)){
		alert("请输入产品编码！");
		formlist.productcode.focus();
		return false;
	}
	
	if (checkspace(formlist.productname.value)){
		alert("请输入产品名称！");
		formlist.productname.focus();
		return false;
	}
 	
	if (checkspace(formlist.marketprice.value)){
		alert("请输入原价！");
		formlist.marketprice.focus();
		return false;
	}
 	
	if (checkspace(formlist.unitprice.value)){
		alert("请输入单价！");
		formlist.unitprice.focus();
		return false;
	}
 	
	if (checkspace(formlist.saleprice.value)){
		alert("请输入促销价！");
		formlist.saleprice.focus();
		return false;
	}
 	
	if (checkspace(formlist.discountprice.value)){
		alert("请输入打折价！");
		formlist.discountprice.focus();
		return false;
	}
 	
	if (checkspace(formlist.consumption.value)){
		alert("请输入最低消费！");
		formlist.consumption.focus();
		return false;
	}
}  
 
//优惠券添加
function check_coupon_add(formlist){	
  	
	if (checkspace(formlist.money.value)){
		alert("请输入优惠金额！");
		formlist.money.focus();
		return false;
	}
	
	if (checkspace(formlist.sdate.value)){
		alert("请选择开始时间！");
		formlist.sdate.focus();
		return false;
	}
 	
	if (checkspace(formlist.edate.value)){
		alert("请选择结束时间！");
		formlist.edate.focus();
		return false;
	}
}

//表单
function check_forms(formlist){
    if (checkspace(formlist.title.value)){
        alert("请输入字段标题！");
        formlist.title.focus();
        return false;
    }

    if (checkspace(formlist.tablename.value)){
        alert("请输入字段名称！");
        formlist.tablename.focus();
        return false;
    }
}


//用户添加
function check_user_add(formlist){	
 	if (checkspace(formlist.typeid.value)){
		alert("请选择会员等级！");
		formlist.typeid.focus();
		return false;
	}
 	
	if (checkspace(formlist.realname.value)){
		alert("请输入联系人！");
		formlist.realname.focus();
		return false;
	}
	
	if (checkspace(formlist.username.value)){
		alert("请输入客户编码！");
		formlist.username.focus();
		return false;
	}
 	
	if (checkspace(formlist.userpwd.value)){
		alert("请输入密码！");
		formlist.userpwd.focus();
		return false;
	}
 	
	if (checkspace(formlist.reuserpwd.value)){
		alert("请输入确认密码！");
		formlist.reuserpwd.focus();
		return false;
	}
 	
	if (formlist.userpwd.value!=formlist.reuserpwd.value){
		alert("您两次输入的密码不一样，请检查后重新输入！");
		formlist.saleprice.focus();
		return false;
	}
}  
 

 

 //密码修改页 JS验证
function checkperson(formlist){
  if (checkspace(formlist.pwd_old.value))
  {
    alert("原密码不能为空！");
    formlist.pwd_old.focus();
    return false;
  }
  if (checkspace(formlist.pwd_new.value))
  {
    alert("新密码不能为空！");
    formlist.pwd_new.focus();
    return false;
  }
  if (formlist.pwd_new1.value!=formlist.pwd_new1.value)
  {
    alert("二次密码不一样！");
    document.frm.pwd_new1.focus();
    return false;
  }
}
 
 
//管理员添加页add/edit JS验证
function check_manager_add(formlist){
  if (checkspace(formlist.realname.value))
  {
    alert("请输入管理姓名！");
    formlist.realname.focus();
    return false;
  }
  if (checkspace(formlist.username.value))
  {
    alert("请输入管理帐号！");
    formlist.username.focus();
    return false;
  }
  if (checkspace(formlist.password.value))
  {
    alert("请输入登陆密码！");
    formlist.password.focus();
    return false;
  }
    
  if (formlist.password.value!=formlist.repassword.value)
  {
    alert("请保证两次密码一致！");
    formlist.repassword.focus();
    return false;
  }
}

  
//管理员添加页add/edit JS验证
function check_news_add(formlist){
  if (checkspace(formlist.title.value)){
    alert("请输入新闻标题！");
    formlist.title.focus();
    return false;
  }
}

