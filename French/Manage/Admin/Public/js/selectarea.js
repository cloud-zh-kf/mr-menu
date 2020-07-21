/*
--------------------------------------------------------
三级联动菜单
--------------------------------------------------------
*/		var lmcount;
		var lmcount2;
		lm=new Array();
		lm2=new Array();
		
		lm[0]=new Array("北京辖区","北京市");
		
		lm[1]=new Array("北京辖县","北京市");
		
		lm[2]=new Array("天津辖区","天津市");
		
		lm[3]=new Array("天津辖县","天津市");
		
		lm[4]=new Array("石家庄市","河北省");
		
		lm[5]=new Array("唐山市","河北省");
		
		lm[6]=new Array("秦皇岛市","河北省");
		
		lm[7]=new Array("邯郸市","河北省");
		
		lm[8]=new Array("邢台市","河北省");
		
		lm[9]=new Array("保定市","河北省");
		
		lm[10]=new Array("张家口市","河北省");
		
		lm[11]=new Array("承德市","河北省");
		
		lm[12]=new Array("沧州市","河北省");
		
		lm[13]=new Array("廊坊市","河北省");
		
		lm[14]=new Array("衡水市","河北省");
		
		lm[15]=new Array("太原市","山西省");
		
		lm[16]=new Array("大同市","山西省");
		
		lm[17]=new Array("阳泉市","山西省");
		
		lm[18]=new Array("长治市","山西省");
		
		lm[19]=new Array("晋城市","山西省");
		
		lm[20]=new Array("朔州市","山西省");
		
		lm[21]=new Array("晋中市","山西省");
		
		lm[22]=new Array("运城市","山西省");
		
		lm[23]=new Array("忻州市","山西省");
		
		lm[24]=new Array("临汾市","山西省");
		
		lm[25]=new Array("吕梁市","山西省");
		
		lm[26]=new Array("呼和浩特市","内蒙古区");
		
		lm[27]=new Array("包头市","内蒙古区");
		
		lm[28]=new Array("乌海市","内蒙古区");
		
		lm[29]=new Array("赤峰市","内蒙古区");
		
		lm[30]=new Array("通辽市","内蒙古区");
		
		lm[31]=new Array("鄂尔多斯市","内蒙古区");
		
		lm[32]=new Array("呼伦贝尔市","内蒙古区");
		
		lm[33]=new Array("巴彦淖尔市","内蒙古区");
		
		lm[34]=new Array("乌兰察布市","内蒙古区");
		
		lm[35]=new Array("兴安盟","内蒙古区");
		
		lm[36]=new Array("锡林郭勒盟","内蒙古区");
		
		lm[37]=new Array("阿拉善盟","内蒙古区");
		
		lm[38]=new Array("沈阳市","辽宁省");
		
		lm[39]=new Array("大连市","辽宁省");
		
		lm[40]=new Array("鞍山市","辽宁省");
		
		lm[41]=new Array("抚顺市","辽宁省");
		
		lm[42]=new Array("本溪市","辽宁省");
		
		lm[43]=new Array("丹东市","辽宁省");
		
		lm[44]=new Array("锦州市","辽宁省");
		
		lm[45]=new Array("营口市","辽宁省");
		
		lm[46]=new Array("阜新市","辽宁省");
		
		lm[47]=new Array("辽阳市","辽宁省");
		
		lm[48]=new Array("盘锦市","辽宁省");
		
		lm[49]=new Array("铁岭市","辽宁省");
		
		lm[50]=new Array("朝阳市","辽宁省");
		
		lm[51]=new Array("葫芦岛市","辽宁省");
		
		lm[52]=new Array("长春市","吉林省");
		
		lm[53]=new Array("吉林市","吉林省");
		
		lm[54]=new Array("四平市","吉林省");
		
		lm[55]=new Array("辽源市","吉林省");
		
		lm[56]=new Array("通化市","吉林省");
		
		lm[57]=new Array("白山市","吉林省");
		
		lm[58]=new Array("松原市","吉林省");
		
		lm[59]=new Array("白城市","吉林省");
		
		lm[60]=new Array("延边自治州","吉林省");
		
		lm[61]=new Array("哈尔滨市","黑龙江省");
		
		lm[62]=new Array("齐齐哈尔市","黑龙江省");
		
		lm[63]=new Array("鸡西市","黑龙江省");
		
		lm[64]=new Array("鹤岗市","黑龙江省");
		
		lm[65]=new Array("双鸭山市","黑龙江省");
		
		lm[66]=new Array("大庆市","黑龙江省");
		
		lm[67]=new Array("伊春市","黑龙江省");
		
		lm[68]=new Array("佳木斯市","黑龙江省");
		
		lm[69]=new Array("七台河市","黑龙江省");
		
		lm[70]=new Array("牡丹江市","黑龙江省");
		
		lm[71]=new Array("黑河市","黑龙江省");
		
		lm[72]=new Array("绥化市","黑龙江省");
		
		lm[73]=new Array("大兴安岭地区","黑龙江省");
		
		lm[74]=new Array("上海辖区","上海市");
		
		lm[75]=new Array("上海辖县","上海市");
		
		lm[76]=new Array("南京市","江苏省");
		
		lm[77]=new Array("无锡市","江苏省");
		
		lm[78]=new Array("徐州市","江苏省");
		
		lm[79]=new Array("常州市","江苏省");
		
		lm[80]=new Array("苏州市","江苏省");
		
		lm[81]=new Array("南通市","江苏省");
		
		lm[82]=new Array("连云港市","江苏省");
		
		lm[83]=new Array("淮安市","江苏省");
		
		lm[84]=new Array("盐城市","江苏省");
		
		lm[85]=new Array("扬州市","江苏省");
		
		lm[86]=new Array("镇江市","江苏省");
		
		lm[87]=new Array("泰州市","江苏省");
		
		lm[88]=new Array("宿迁市","江苏省");
		
		lm[89]=new Array("杭州市","浙江省");
		
		lm[90]=new Array("宁波市","浙江省");
		
		lm[91]=new Array("温州市","浙江省");
		
		lm[92]=new Array("嘉兴市","浙江省");
		
		lm[93]=new Array("湖州市","浙江省");
		
		lm[94]=new Array("绍兴市","浙江省");
		
		lm[95]=new Array("金华市","浙江省");
		
		lm[96]=new Array("衢州市","浙江省");
		
		lm[97]=new Array("舟山市","浙江省");
		
		lm[98]=new Array("台州市","浙江省");
		
		lm[99]=new Array("丽水市","浙江省");
		
		lm[100]=new Array("合肥市","安徽省");
		
		lm[101]=new Array("芜湖市","安徽省");
		
		lm[102]=new Array("蚌埠市","安徽省");
		
		lm[103]=new Array("淮南市","安徽省");
		
		lm[104]=new Array("马鞍山市","安徽省");
		
		lm[105]=new Array("淮北市","安徽省");
		
		lm[106]=new Array("铜陵市","安徽省");
		
		lm[107]=new Array("安庆市","安徽省");
		
		lm[108]=new Array("黄山市","安徽省");
		
		lm[109]=new Array("滁州市","安徽省");
		
		lm[110]=new Array("阜阳市","安徽省");
		
		lm[111]=new Array("宿州市","安徽省");
		
		lm[112]=new Array("巢湖市","安徽省");
		
		lm[113]=new Array("六安市","安徽省");
		
		lm[114]=new Array("亳州市","安徽省");
		
		lm[115]=new Array("池州市","安徽省");
		
		lm[116]=new Array("宣城市","安徽省");
		
		lm[117]=new Array("福州市","福建省");
		
		lm[118]=new Array("厦门市","福建省");
		
		lm[119]=new Array("莆田市","福建省");
		
		lm[120]=new Array("三明市","福建省");
		
		lm[121]=new Array("泉州市","福建省");
		
		lm[122]=new Array("漳州市","福建省");
		
		lm[123]=new Array("南平市","福建省");
		
		lm[124]=new Array("龙岩市","福建省");
		
		lm[125]=new Array("宁德市","福建省");
		
		lm[126]=new Array("南昌市","江西省");
		
		lm[127]=new Array("景德镇市","江西省");
		
		lm[128]=new Array("萍乡市","江西省");
		
		lm[129]=new Array("九江市","江西省");
		
		lm[130]=new Array("新余市","江西省");
		
		lm[131]=new Array("鹰潭市","江西省");
		
		lm[132]=new Array("赣州市","江西省");
		
		lm[133]=new Array("吉安市","江西省");
		
		lm[134]=new Array("宜春市","江西省");
		
		lm[135]=new Array("抚州市","江西省");
		
		lm[136]=new Array("上饶市","江西省");
		
		lm[137]=new Array("济南市","山东省");
		
		lm[138]=new Array("青岛市","山东省");
		
		lm[139]=new Array("淄博市","山东省");
		
		lm[140]=new Array("枣庄市","山东省");
		
		lm[141]=new Array("东营市","山东省");
		
		lm[142]=new Array("烟台市","山东省");
		
		lm[143]=new Array("潍坊市","山东省");
		
		lm[144]=new Array("济宁市","山东省");
		
		lm[145]=new Array("泰安市","山东省");
		
		lm[146]=new Array("威海市","山东省");
		
		lm[147]=new Array("日照市","山东省");
		
		lm[148]=new Array("莱芜市","山东省");
		
		lm[149]=new Array("临沂市","山东省");
		
		lm[150]=new Array("德州市","山东省");
		
		lm[151]=new Array("聊城市","山东省");
		
		lm[152]=new Array("滨州市","山东省");
		
		lm[153]=new Array("荷泽市","山东省");
		
		lm[154]=new Array("郑州市","河南省");
		
		lm[155]=new Array("开封市","河南省");
		
		lm[156]=new Array("洛阳市","河南省");
		
		lm[157]=new Array("平顶山市","河南省");
		
		lm[158]=new Array("安阳市","河南省");
		
		lm[159]=new Array("鹤壁市","河南省");
		
		lm[160]=new Array("新乡市","河南省");
		
		lm[161]=new Array("焦作市","河南省");
		
		lm[162]=new Array("濮阳市","河南省");
		
		lm[163]=new Array("许昌市","河南省");
		
		lm[164]=new Array("漯河市","河南省");
		
		lm[165]=new Array("三门峡市","河南省");
		
		lm[166]=new Array("南阳市","河南省");
		
		lm[167]=new Array("商丘市","河南省");
		
		lm[168]=new Array("信阳市","河南省");
		
		lm[169]=new Array("周口市","河南省");
		
		lm[170]=new Array("驻马店市","河南省");
		
		lm[171]=new Array("武汉市","湖北省");
		
		lm[172]=new Array("黄石市","湖北省");
		
		lm[173]=new Array("十堰市","湖北省");
		
		lm[174]=new Array("宜昌市","湖北省");
		
		lm[175]=new Array("襄樊市","湖北省");
		
		lm[176]=new Array("鄂州市","湖北省");
		
		lm[177]=new Array("荆门市","湖北省");
		
		lm[178]=new Array("孝感市","湖北省");
		
		lm[179]=new Array("荆州市","湖北省");
		
		lm[180]=new Array("黄冈市","湖北省");
		
		lm[181]=new Array("咸宁市","湖北省");
		
		lm[182]=new Array("随州市","湖北省");
		
		lm[183]=new Array("恩施自治州","湖北省");
		
		lm[184]=new Array("湖北省辖单位","湖北省");
		
		lm[185]=new Array("长沙市","湖南省");
		
		lm[186]=new Array("株洲市","湖南省");
		
		lm[187]=new Array("湘潭市","湖南省");
		
		lm[188]=new Array("衡阳市","湖南省");
		
		lm[189]=new Array("邵阳市","湖南省");
		
		lm[190]=new Array("岳阳市","湖南省");
		
		lm[191]=new Array("常德市","湖南省");
		
		lm[192]=new Array("张家界市","湖南省");
		
		lm[193]=new Array("益阳市","湖南省");
		
		lm[194]=new Array("郴州市","湖南省");
		
		lm[195]=new Array("永州市","湖南省");
		
		lm[196]=new Array("怀化市","湖南省");
		
		lm[197]=new Array("娄底市","湖南省");
		
		lm[198]=new Array("湘西自治州","湖南省");
		
		lm[199]=new Array("广州市","广东省");
		
		lm[200]=new Array("韶关市","广东省");
		
		lm[201]=new Array("深圳市","广东省");
		
		lm[202]=new Array("珠海市","广东省");
		
		lm[203]=new Array("汕头市","广东省");
		
		lm[204]=new Array("佛山市","广东省");
		
		lm[205]=new Array("江门市","广东省");
		
		lm[206]=new Array("湛江市","广东省");
		
		lm[207]=new Array("茂名市","广东省");
		
		lm[208]=new Array("肇庆市","广东省");
		
		lm[209]=new Array("惠州市","广东省");
		
		lm[210]=new Array("梅州市","广东省");
		
		lm[211]=new Array("汕尾市","广东省");
		
		lm[212]=new Array("河源市","广东省");
		
		lm[213]=new Array("阳江市","广东省");
		
		lm[214]=new Array("清远市","广东省");
		
		lm[215]=new Array("东莞市","广东省");
		
		lm[216]=new Array("中山市","广东省");
		
		lm[217]=new Array("潮州市","广东省");
		
		lm[218]=new Array("揭阳市","广东省");
		
		lm[219]=new Array("云浮市","广东省");
		
		lm[220]=new Array("南宁市","广西区");
		
		lm[221]=new Array("柳州市","广西区");
		
		lm[222]=new Array("桂林市","广西区");
		
		lm[223]=new Array("梧州市","广西区");
		
		lm[224]=new Array("北海市","广西区");
		
		lm[225]=new Array("防城港市","广西区");
		
		lm[226]=new Array("钦州市","广西区");
		
		lm[227]=new Array("贵港市","广西区");
		
		lm[228]=new Array("玉林市","广西区");
		
		lm[229]=new Array("百色市","广西区");
		
		lm[230]=new Array("贺州市","广西区");
		
		lm[231]=new Array("河池市","广西区");
		
		lm[232]=new Array("来宾市","广西区");
		
		lm[233]=new Array("崇左市","广西区");
		
		lm[234]=new Array("海口市","海南省");
		
		lm[235]=new Array("三亚市","海南省");
		
		lm[236]=new Array("海南直辖县","海南省");
		
		lm[237]=new Array("重庆辖区","重庆市");
		
		lm[238]=new Array("重庆辖县","重庆市");
		
		lm[239]=new Array("重庆辖市","重庆市");
		
		lm[240]=new Array("成都市","四川省");
		
		lm[241]=new Array("自贡市","四川省");
		
		lm[242]=new Array("攀枝花市","四川省");
		
		lm[243]=new Array("泸州市","四川省");
		
		lm[244]=new Array("德阳市","四川省");
		
		lm[245]=new Array("绵阳市","四川省");
		
		lm[246]=new Array("广元市","四川省");
		
		lm[247]=new Array("遂宁市","四川省");
		
		lm[248]=new Array("内江市","四川省");
		
		lm[249]=new Array("乐山市","四川省");
		
		lm[250]=new Array("南充市","四川省");
		
		lm[251]=new Array("眉山市","四川省");
		
		lm[252]=new Array("宜宾市","四川省");
		
		lm[253]=new Array("广安市","四川省");
		
		lm[254]=new Array("达州市","四川省");
		
		lm[255]=new Array("雅安市","四川省");
		
		lm[256]=new Array("巴中市","四川省");
		
		lm[257]=new Array("资阳市","四川省");
		
		lm[258]=new Array("阿坝自治州","四川省");
		
		lm[259]=new Array("甘孜自治州","四川省");
		
		lm[260]=new Array("凉山自治州","四川省");
		
		lm[261]=new Array("贵阳市","贵州省");
		
		lm[262]=new Array("六盘水市","贵州省");
		
		lm[263]=new Array("遵义市","贵州省");
		
		lm[264]=new Array("安顺市","贵州省");
		
		lm[265]=new Array("铜仁地区","贵州省");
		
		lm[266]=new Array("黔西南自治州","贵州省");
		
		lm[267]=new Array("毕节地区","贵州省");
		
		lm[268]=new Array("黔东南自治州","贵州省");
		
		lm[269]=new Array("黔南自治州","贵州省");
		
		lm[270]=new Array("昆明市","云南省");
		
		lm[271]=new Array("曲靖市","云南省");
		
		lm[272]=new Array("玉溪市","云南省");
		
		lm[273]=new Array("保山市","云南省");
		
		lm[274]=new Array("昭通市","云南省");
		
		lm[275]=new Array("丽江市","云南省");
		
		lm[276]=new Array("思茅市","云南省");
		
		lm[277]=new Array("临沧市","云南省");
		
		lm[278]=new Array("楚雄自治州","云南省");
		
		lm[279]=new Array("红河自治州","云南省");
		
		lm[280]=new Array("文山自治州","云南省");
		
		lm[281]=new Array("西双版纳州","云南省");
		
		lm[282]=new Array("大理自治州","云南省");
		
		lm[283]=new Array("德宏自治州","云南省");
		
		lm[284]=new Array("怒江傈自治州","云南省");
		
		lm[285]=new Array("迪庆自治州","云南省");
		
		lm[286]=new Array("拉萨市","西藏区");
		
		lm[287]=new Array("昌都地区","西藏区");
		
		lm[288]=new Array("山南地区","西藏区");
		
		lm[289]=new Array("日喀则地区","西藏区");
		
		lm[290]=new Array("那曲地区","西藏区");
		
		lm[291]=new Array("阿里地区","西藏区");
		
		lm[292]=new Array("林芝地区","西藏区");
		
		lm[293]=new Array("西安市","陕西省");
		
		lm[294]=new Array("铜川市","陕西省");
		
		lm[295]=new Array("宝鸡市","陕西省");
		
		lm[296]=new Array("咸阳市","陕西省");
		
		lm[297]=new Array("渭南市","陕西省");
		
		lm[298]=new Array("延安市","陕西省");
		
		lm[299]=new Array("汉中市","陕西省");
		
		lm[300]=new Array("榆林市","陕西省");
		
		lm[301]=new Array("安康市","陕西省");
		
		lm[302]=new Array("商洛市","陕西省");
		
		lm[303]=new Array("兰州市","甘肃省");
		
		lm[304]=new Array("嘉峪关市","甘肃省");
		
		lm[305]=new Array("金昌市","甘肃省");
		
		lm[306]=new Array("白银市","甘肃省");
		
		lm[307]=new Array("天水市","甘肃省");
		
		lm[308]=new Array("武威市","甘肃省");
		
		lm[309]=new Array("张掖市","甘肃省");
		
		lm[310]=new Array("平凉市","甘肃省");
		
		lm[311]=new Array("酒泉市","甘肃省");
		
		lm[312]=new Array("庆阳市","甘肃省");
		
		lm[313]=new Array("定西市","甘肃省");
		
		lm[314]=new Array("陇南市","甘肃省");
		
		lm[315]=new Array("临夏自治州","甘肃省");
		
		lm[316]=new Array("甘南自治州","甘肃省");
		
		lm[317]=new Array("西宁市","青海省");
		
		lm[318]=new Array("海东地区","青海省");
		
		lm[319]=new Array("海北自治州","青海省");
		
		lm[320]=new Array("黄南自治州","青海省");
		
		lm[321]=new Array("海南自治州","青海省");
		
		lm[322]=new Array("果洛自治州","青海省");
		
		lm[323]=new Array("玉树自治州","青海省");
		
		lm[324]=new Array("海西自治州","青海省");
		
		lm[325]=new Array("银川市","宁夏区");
		
		lm[326]=new Array("石嘴山市","宁夏区");
		
		lm[327]=new Array("吴忠市","宁夏区");
		
		lm[328]=new Array("固原市","宁夏区");
		
		lm[329]=new Array("中卫市","宁夏区");
		
		lm[330]=new Array("乌鲁木齐市","新疆区");
		
		lm[331]=new Array("克拉玛依市","新疆区");
		
		lm[332]=new Array("吐鲁番地区","新疆区");
		
		lm[333]=new Array("哈密地区","新疆区");
		
		lm[334]=new Array("昌吉自治州","新疆区");
		
		lm[335]=new Array("博尔塔拉州","新疆区");
		
		lm[336]=new Array("巴音郭楞州","新疆区");
		
		lm[337]=new Array("阿克苏地区","新疆区");
		
		lm[338]=new Array("克孜勒苏州","新疆区");
		
		lm[339]=new Array("喀什地区","新疆区");
		
		lm[340]=new Array("和田地区","新疆区");
		
		lm[341]=new Array("伊犁自治州","新疆区");
		
		lm[342]=new Array("塔城地区","新疆区");
		
		lm[343]=new Array("阿勒泰地区","新疆区");
		
		lm[344]=new Array("新疆省辖单位","新疆区");
		
		lm2[0]=new Array("东城区","北京辖区");
		
		lm2[1]=new Array("西城区","北京辖区");
		
		lm2[2]=new Array("崇文区","北京辖区");
		
		lm2[3]=new Array("宣武区","北京辖区");
		
		lm2[4]=new Array("朝阳区","北京辖区");
		
		lm2[5]=new Array("丰台区","北京辖区");
		
		lm2[6]=new Array("石景山区","北京辖区");
		
		lm2[7]=new Array("海淀区","北京辖区");
		
		lm2[8]=new Array("门头沟区","北京辖区");
		
		lm2[9]=new Array("房山区","北京辖区");
		
		lm2[10]=new Array("通州区","北京辖区");
		
		lm2[11]=new Array("顺义区","北京辖区");
		
		lm2[12]=new Array("昌平区","北京辖区");
		
		lm2[13]=new Array("大兴区","北京辖区");
		
		lm2[14]=new Array("怀柔区","北京辖区");
		
		lm2[15]=new Array("平谷区","北京辖区");
		
		lm2[16]=new Array("密云县","北京辖县");
		
		lm2[17]=new Array("延庆县","北京辖县");
		
		lm2[18]=new Array("和平区","天津辖区");
		
		lm2[19]=new Array("河东区","天津辖区");
		
		lm2[20]=new Array("河西区","天津辖区");
		
		lm2[21]=new Array("南开区","天津辖区");
		
		lm2[22]=new Array("河北区","天津辖区");
		
		lm2[23]=new Array("红桥区","天津辖区");
		
		lm2[24]=new Array("塘沽区","天津辖区");
		
		lm2[25]=new Array("汉沽区","天津辖区");
		
		lm2[26]=new Array("大港区","天津辖区");
		
		lm2[27]=new Array("东丽区","天津辖区");
		
		lm2[28]=new Array("西青区","天津辖区");
		
		lm2[29]=new Array("津南区","天津辖区");
		
		lm2[30]=new Array("北辰区","天津辖区");
		
		lm2[31]=new Array("武清区","天津辖区");
		
		lm2[32]=new Array("宝坻区","天津辖区");
		
		lm2[33]=new Array("宁河县","天津辖县");
		
		lm2[34]=new Array("静海县","天津辖县");
		
		lm2[35]=new Array("蓟县","天津辖县");
		
		lm2[36]=new Array("市辖区","石家庄市");
		
		lm2[37]=new Array("长安区","石家庄市");
		
		lm2[38]=new Array("桥东区","石家庄市");
		
		lm2[39]=new Array("桥西区","石家庄市");
		
		lm2[40]=new Array("新华区","石家庄市");
		
		lm2[41]=new Array("井陉矿区","石家庄市");
		
		lm2[42]=new Array("裕华区","石家庄市");
		
		lm2[43]=new Array("井陉县","石家庄市");
		
		lm2[44]=new Array("正定县","石家庄市");
		
		lm2[45]=new Array("栾城县","石家庄市");
		
		lm2[46]=new Array("行唐县","石家庄市");
		
		lm2[47]=new Array("灵寿县","石家庄市");
		
		lm2[48]=new Array("高邑县","石家庄市");
		
		lm2[49]=new Array("深泽县","石家庄市");
		
		lm2[50]=new Array("赞皇县","石家庄市");
		
		lm2[51]=new Array("无极县","石家庄市");
		
		lm2[52]=new Array("平山县","石家庄市");
		
		lm2[53]=new Array("元氏县","石家庄市");
		
		lm2[54]=new Array("赵县","石家庄市");
		
		lm2[55]=new Array("辛集市","石家庄市");
		
		lm2[56]=new Array("藁城市","石家庄市");
		
		lm2[57]=new Array("晋州市","石家庄市");
		
		lm2[58]=new Array("新乐市","石家庄市");
		
		lm2[59]=new Array("鹿泉市","石家庄市");
		
		lm2[60]=new Array("市辖区","唐山市");
		
		lm2[61]=new Array("路南区","唐山市");
		
		lm2[62]=new Array("路北区","唐山市");
		
		lm2[63]=new Array("古冶区","唐山市");
		
		lm2[64]=new Array("开平区","唐山市");
		
		lm2[65]=new Array("丰南区","唐山市");
		
		lm2[66]=new Array("丰润区","唐山市");
		
		lm2[67]=new Array("滦县","唐山市");
		
		lm2[68]=new Array("滦南县","唐山市");
		
		lm2[69]=new Array("乐亭县","唐山市");
		
		lm2[70]=new Array("迁西县","唐山市");
		
		lm2[71]=new Array("玉田县","唐山市");
		
		lm2[72]=new Array("唐海县","唐山市");
		
		lm2[73]=new Array("遵化市","唐山市");
		
		lm2[74]=new Array("迁安市","唐山市");
		
		lm2[75]=new Array("市辖区","秦皇岛市");
		
		lm2[76]=new Array("海港区","秦皇岛市");
		
		lm2[77]=new Array("山海关区","秦皇岛市");
		
		lm2[78]=new Array("北戴河区","秦皇岛市");
		
		lm2[79]=new Array("青龙满族自治县","秦皇岛市");
		
		lm2[80]=new Array("昌黎县","秦皇岛市");
		
		lm2[81]=new Array("抚宁县","秦皇岛市");
		
		lm2[82]=new Array("卢龙县","秦皇岛市");
		
		lm2[83]=new Array("市辖区","邯郸市");
		
		lm2[84]=new Array("邯山区","邯郸市");
		
		lm2[85]=new Array("丛台区","邯郸市");
		
		lm2[86]=new Array("复兴区","邯郸市");
		
		lm2[87]=new Array("峰峰矿区","邯郸市");
		
		lm2[88]=new Array("邯郸县","邯郸市");
		
		lm2[89]=new Array("临漳县","邯郸市");
		
		lm2[90]=new Array("成安县","邯郸市");
		
		lm2[91]=new Array("大名县","邯郸市");
		
		lm2[92]=new Array("涉县","邯郸市");
		
		lm2[93]=new Array("磁县","邯郸市");
		
		lm2[94]=new Array("肥乡县","邯郸市");
		
		lm2[95]=new Array("永年县","邯郸市");
		
		lm2[96]=new Array("邱县","邯郸市");
		
		lm2[97]=new Array("鸡泽县","邯郸市");
		
		lm2[98]=new Array("广平县","邯郸市");
		
		lm2[99]=new Array("馆陶县","邯郸市");
		
		lm2[100]=new Array("魏县","邯郸市");
		
		lm2[101]=new Array("曲周县","邯郸市");
		
		lm2[102]=new Array("武安市","邯郸市");
		
		lm2[103]=new Array("市辖区","邢台市");
		
		lm2[104]=new Array("桥东区","邢台市");
		
		lm2[105]=new Array("桥西区","邢台市");
		
		lm2[106]=new Array("邢台县","邢台市");
		
		lm2[107]=new Array("临城县","邢台市");
		
		lm2[108]=new Array("内丘县","邢台市");
		
		lm2[109]=new Array("柏乡县","邢台市");
		
		lm2[110]=new Array("隆尧县","邢台市");
		
		lm2[111]=new Array("任县","邢台市");
		
		lm2[112]=new Array("南和县","邢台市");
		
		lm2[113]=new Array("宁晋县","邢台市");
		
		lm2[114]=new Array("巨鹿县","邢台市");
		
		lm2[115]=new Array("新河县","邢台市");
		
		lm2[116]=new Array("广宗县","邢台市");
		
		lm2[117]=new Array("平乡县","邢台市");
		
		lm2[118]=new Array("威县","邢台市");
		
		lm2[119]=new Array("清河县","邢台市");
		
		lm2[120]=new Array("临西县","邢台市");
		
		lm2[121]=new Array("南宫市","邢台市");
		
		lm2[122]=new Array("沙河市","邢台市");
		
		lm2[123]=new Array("市辖区","保定市");
		
		lm2[124]=new Array("新市区","保定市");
		
		lm2[125]=new Array("北市区","保定市");
		
		lm2[126]=new Array("南市区","保定市");
		
		lm2[127]=new Array("满城县","保定市");
		
		lm2[128]=new Array("清苑县","保定市");
		
		lm2[129]=new Array("涞水县","保定市");
		
		lm2[130]=new Array("阜平县","保定市");
		
		lm2[131]=new Array("徐水县","保定市");
		
		lm2[132]=new Array("定兴县","保定市");
		
		lm2[133]=new Array("唐县","保定市");
		
		lm2[134]=new Array("高阳县","保定市");
		
		lm2[135]=new Array("容城县","保定市");
		
		lm2[136]=new Array("涞源县","保定市");
		
		lm2[137]=new Array("望都县","保定市");
		
		lm2[138]=new Array("安新县","保定市");
		
		lm2[139]=new Array("易县","保定市");
		
		lm2[140]=new Array("曲阳县","保定市");
		
		lm2[141]=new Array("蠡县","保定市");
		
		lm2[142]=new Array("顺平县","保定市");
		
		lm2[143]=new Array("博野县","保定市");
		
		lm2[144]=new Array("雄县","保定市");
		
		lm2[145]=new Array("涿州市","保定市");
		
		lm2[146]=new Array("定州市","保定市");
		
		lm2[147]=new Array("安国市","保定市");
		
		lm2[148]=new Array("高碑店市","保定市");
		
		lm2[149]=new Array("市辖区","张家口市");
		
		lm2[150]=new Array("桥东区","张家口市");
		
		lm2[151]=new Array("桥西区","张家口市");
		
		lm2[152]=new Array("宣化区","张家口市");
		
		lm2[153]=new Array("下花园区","张家口市");
		
		lm2[154]=new Array("宣化县","张家口市");
		
		lm2[155]=new Array("张北县","张家口市");
		
		lm2[156]=new Array("康保县","张家口市");
		
		lm2[157]=new Array("沽源县","张家口市");
		
		lm2[158]=new Array("尚义县","张家口市");
		
		lm2[159]=new Array("蔚县","张家口市");
		
		lm2[160]=new Array("阳原县","张家口市");
		
		lm2[161]=new Array("怀安县","张家口市");
		
		lm2[162]=new Array("万全县","张家口市");
		
		lm2[163]=new Array("怀来县","张家口市");
		
		lm2[164]=new Array("涿鹿县","张家口市");
		
		lm2[165]=new Array("赤城县","张家口市");
		
		lm2[166]=new Array("崇礼县","张家口市");
		
		lm2[167]=new Array("市辖区","承德市");
		
		lm2[168]=new Array("双桥区","承德市");
		
		lm2[169]=new Array("双滦区","承德市");
		
		lm2[170]=new Array("鹰手营子矿区","承德市");
		
		lm2[171]=new Array("承德县","承德市");
		
		lm2[172]=new Array("兴隆县","承德市");
		
		lm2[173]=new Array("平泉县","承德市");
		
		lm2[174]=new Array("滦平县","承德市");
		
		lm2[175]=new Array("隆化县","承德市");
		
		lm2[176]=new Array("丰宁满族自治县","承德市");
		
		lm2[177]=new Array("宽城满族自治县","承德市");
		
		lm2[178]=new Array("围场满族蒙古族自治县","承德市");
		
		lm2[179]=new Array("市辖区","沧州市");
		
		lm2[180]=new Array("新华区","沧州市");
		
		lm2[181]=new Array("运河区","沧州市");
		
		lm2[182]=new Array("沧县","沧州市");
		
		lm2[183]=new Array("青县","沧州市");
		
		lm2[184]=new Array("东光县","沧州市");
		
		lm2[185]=new Array("海兴县","沧州市");
		
		lm2[186]=new Array("盐山县","沧州市");
		
		lm2[187]=new Array("肃宁县","沧州市");
		
		lm2[188]=new Array("南皮县","沧州市");
		
		lm2[189]=new Array("吴桥县","沧州市");
		
		lm2[190]=new Array("献县","沧州市");
		
		lm2[191]=new Array("孟村回族自治县","沧州市");
		
		lm2[192]=new Array("泊头市","沧州市");
		
		lm2[193]=new Array("任丘市","沧州市");
		
		lm2[194]=new Array("黄骅市","沧州市");
		
		lm2[195]=new Array("河间市","沧州市");
		
		lm2[196]=new Array("市辖区","廊坊市");
		
		lm2[197]=new Array("安次区","廊坊市");
		
		lm2[198]=new Array("广阳区","廊坊市");
		
		lm2[199]=new Array("固安县","廊坊市");
		
		lm2[200]=new Array("永清县","廊坊市");
		
		lm2[201]=new Array("香河县","廊坊市");
		
		lm2[202]=new Array("大城县","廊坊市");
		
		lm2[203]=new Array("文安县","廊坊市");
		
		lm2[204]=new Array("大厂回族自治县","廊坊市");
		
		lm2[205]=new Array("霸州市","廊坊市");
		
		lm2[206]=new Array("三河市","廊坊市");
		
		lm2[207]=new Array("市辖区","衡水市");
		
		lm2[208]=new Array("桃城区","衡水市");
		
		lm2[209]=new Array("枣强县","衡水市");
		
		lm2[210]=new Array("武邑县","衡水市");
		
		lm2[211]=new Array("武强县","衡水市");
		
		lm2[212]=new Array("饶阳县","衡水市");
		
		lm2[213]=new Array("安平县","衡水市");
		
		lm2[214]=new Array("故城县","衡水市");
		
		lm2[215]=new Array("景县","衡水市");
		
		lm2[216]=new Array("阜城县","衡水市");
		
		lm2[217]=new Array("冀州市","衡水市");
		
		lm2[218]=new Array("深州市","衡水市");
		
		lm2[219]=new Array("市辖区","太原市");
		
		lm2[220]=new Array("小店区","太原市");
		
		lm2[221]=new Array("迎泽区","太原市");
		
		lm2[222]=new Array("杏花岭区","太原市");
		
		lm2[223]=new Array("尖草坪区","太原市");
		
		lm2[224]=new Array("万柏林区","太原市");
		
		lm2[225]=new Array("晋源区","太原市");
		
		lm2[226]=new Array("清徐县","太原市");
		
		lm2[227]=new Array("阳曲县","太原市");
		
		lm2[228]=new Array("娄烦县","太原市");
		
		lm2[229]=new Array("古交市","太原市");
		
		lm2[230]=new Array("市辖区","大同市");
		
		lm2[231]=new Array("城区","大同市");
		
		lm2[232]=new Array("矿区","大同市");
		
		lm2[233]=new Array("南郊区","大同市");
		
		lm2[234]=new Array("新荣区","大同市");
		
		lm2[235]=new Array("阳高县","大同市");
		
		lm2[236]=new Array("天镇县","大同市");
		
		lm2[237]=new Array("广灵县","大同市");
		
		lm2[238]=new Array("灵丘县","大同市");
		
		lm2[239]=new Array("浑源县","大同市");
		
		lm2[240]=new Array("左云县","大同市");
		
		lm2[241]=new Array("大同县","大同市");
		
		lm2[242]=new Array("市辖区","阳泉市");
		
		lm2[243]=new Array("城区","阳泉市");
		
		lm2[244]=new Array("矿区","阳泉市");
		
		lm2[245]=new Array("郊区","阳泉市");
		
		lm2[246]=new Array("平定县","阳泉市");
		
		lm2[247]=new Array("盂县","阳泉市");
		
		lm2[248]=new Array("市辖区","长治市");
		
		lm2[249]=new Array("城区","长治市");
		
		lm2[250]=new Array("郊区","长治市");
		
		lm2[251]=new Array("长治县","长治市");
		
		lm2[252]=new Array("襄垣县","长治市");
		
		lm2[253]=new Array("屯留县","长治市");
		
		lm2[254]=new Array("平顺县","长治市");
		
		lm2[255]=new Array("黎城县","长治市");
		
		lm2[256]=new Array("壶关县","长治市");
		
		lm2[257]=new Array("长子县","长治市");
		
		lm2[258]=new Array("武乡县","长治市");
		
		lm2[259]=new Array("沁县","长治市");
		
		lm2[260]=new Array("沁源县","长治市");
		
		lm2[261]=new Array("潞城市","长治市");
		
		lm2[262]=new Array("市辖区","晋城市");
		
		lm2[263]=new Array("城区","晋城市");
		
		lm2[264]=new Array("沁水县","晋城市");
		
		lm2[265]=new Array("阳城县","晋城市");
		
		lm2[266]=new Array("陵川县","晋城市");
		
		lm2[267]=new Array("泽州县","晋城市");
		
		lm2[268]=new Array("高平市","晋城市");
		
		lm2[269]=new Array("市辖区","朔州市");
		
		lm2[270]=new Array("朔城区","朔州市");
		
		lm2[271]=new Array("平鲁区","朔州市");
		
		lm2[272]=new Array("山阴县","朔州市");
		
		lm2[273]=new Array("应县","朔州市");
		
		lm2[274]=new Array("右玉县","朔州市");
		
		lm2[275]=new Array("怀仁县","朔州市");
		
		lm2[276]=new Array("市辖区","晋中市");
		
		lm2[277]=new Array("榆次区","晋中市");
		
		lm2[278]=new Array("榆社县","晋中市");
		
		lm2[279]=new Array("左权县","晋中市");
		
		lm2[280]=new Array("和顺县","晋中市");
		
		lm2[281]=new Array("昔阳县","晋中市");
		
		lm2[282]=new Array("寿阳县","晋中市");
		
		lm2[283]=new Array("太谷县","晋中市");
		
		lm2[284]=new Array("祁县","晋中市");
		
		lm2[285]=new Array("平遥县","晋中市");
		
		lm2[286]=new Array("灵石县","晋中市");
		
		lm2[287]=new Array("介休市","晋中市");
		
		lm2[288]=new Array("市辖区","运城市");
		
		lm2[289]=new Array("盐湖区","运城市");
		
		lm2[290]=new Array("临猗县","运城市");
		
		lm2[291]=new Array("万荣县","运城市");
		
		lm2[292]=new Array("闻喜县","运城市");
		
		lm2[293]=new Array("稷山县","运城市");
		
		lm2[294]=new Array("新绛县","运城市");
		
		lm2[295]=new Array("绛县","运城市");
		
		lm2[296]=new Array("垣曲县","运城市");
		
		lm2[297]=new Array("夏县","运城市");
		
		lm2[298]=new Array("平陆县","运城市");
		
		lm2[299]=new Array("芮城县","运城市");
		
		lm2[300]=new Array("永济市","运城市");
		
		lm2[301]=new Array("河津市","运城市");
		
		lm2[302]=new Array("市辖区","忻州市");
		
		lm2[303]=new Array("忻府区","忻州市");
		
		lm2[304]=new Array("定襄县","忻州市");
		
		lm2[305]=new Array("五台县","忻州市");
		
		lm2[306]=new Array("代县","忻州市");
		
		lm2[307]=new Array("繁峙县","忻州市");
		
		lm2[308]=new Array("宁武县","忻州市");
		
		lm2[309]=new Array("静乐县","忻州市");
		
		lm2[310]=new Array("神池县","忻州市");
		
		lm2[311]=new Array("五寨县","忻州市");
		
		lm2[312]=new Array("岢岚县","忻州市");
		
		lm2[313]=new Array("河曲县","忻州市");
		
		lm2[314]=new Array("保德县","忻州市");
		
		lm2[315]=new Array("偏关县","忻州市");
		
		lm2[316]=new Array("原平市","忻州市");
		
		lm2[317]=new Array("市辖区","临汾市");
		
		lm2[318]=new Array("尧都区","临汾市");
		
		lm2[319]=new Array("曲沃县","临汾市");
		
		lm2[320]=new Array("翼城县","临汾市");
		
		lm2[321]=new Array("襄汾县","临汾市");
		
		lm2[322]=new Array("洪洞县","临汾市");
		
		lm2[323]=new Array("古县","临汾市");
		
		lm2[324]=new Array("安泽县","临汾市");
		
		lm2[325]=new Array("浮山县","临汾市");
		
		lm2[326]=new Array("吉县","临汾市");
		
		lm2[327]=new Array("乡宁县","临汾市");
		
		lm2[328]=new Array("大宁县","临汾市");
		
		lm2[329]=new Array("隰县","临汾市");
		
		lm2[330]=new Array("永和县","临汾市");
		
		lm2[331]=new Array("蒲县","临汾市");
		
		lm2[332]=new Array("汾西县","临汾市");
		
		lm2[333]=new Array("侯马市","临汾市");
		
		lm2[334]=new Array("霍州市","临汾市");
		
		lm2[335]=new Array("市辖区","吕梁市");
		
		lm2[336]=new Array("离石区","吕梁市");
		
		lm2[337]=new Array("文水县","吕梁市");
		
		lm2[338]=new Array("交城县","吕梁市");
		
		lm2[339]=new Array("兴县","吕梁市");
		
		lm2[340]=new Array("临县","吕梁市");
		
		lm2[341]=new Array("柳林县","吕梁市");
		
		lm2[342]=new Array("石楼县","吕梁市");
		
		lm2[343]=new Array("岚县","吕梁市");
		
		lm2[344]=new Array("方山县","吕梁市");
		
		lm2[345]=new Array("中阳县","吕梁市");
		
		lm2[346]=new Array("交口县","吕梁市");
		
		lm2[347]=new Array("孝义市","吕梁市");
		
		lm2[348]=new Array("汾阳市","吕梁市");
		
		lm2[349]=new Array("市辖区","呼和浩特市");
		
		lm2[350]=new Array("新城区","呼和浩特市");
		
		lm2[351]=new Array("回民区","呼和浩特市");
		
		lm2[352]=new Array("玉泉区","呼和浩特市");
		
		lm2[353]=new Array("赛罕区","呼和浩特市");
		
		lm2[354]=new Array("土默特左旗","呼和浩特市");
		
		lm2[355]=new Array("托克托县","呼和浩特市");
		
		lm2[356]=new Array("和林格尔县","呼和浩特市");
		
		lm2[357]=new Array("清水河县","呼和浩特市");
		
		lm2[358]=new Array("武川县","呼和浩特市");
		
		lm2[359]=new Array("市辖区","包头市");
		
		lm2[360]=new Array("东河区","包头市");
		
		lm2[361]=new Array("昆都仑区","包头市");
		
		lm2[362]=new Array("青山区","包头市");
		
		lm2[363]=new Array("石拐区","包头市");
		
		lm2[364]=new Array("白云矿区","包头市");


		
		lm2[365]=new Array("九原区","包头市");
		
		lm2[366]=new Array("土默特右旗","包头市");
		
		lm2[367]=new Array("固阳县","包头市");
		
		lm2[368]=new Array("达尔罕茂明安联合旗","包头市");
		
		lm2[369]=new Array("市辖区","乌海市");
		
		lm2[370]=new Array("海勃湾区","乌海市");
		
		lm2[371]=new Array("海南区","乌海市");
		
		lm2[372]=new Array("乌达区","乌海市");
		
		lm2[373]=new Array("市辖区","赤峰市");
		
		lm2[374]=new Array("红山区","赤峰市");
		
		lm2[375]=new Array("元宝山区","赤峰市");
		
		lm2[376]=new Array("松山区","赤峰市");
		
		lm2[377]=new Array("阿鲁科尔沁旗","赤峰市");
		
		lm2[378]=new Array("巴林左旗","赤峰市");
		
		lm2[379]=new Array("巴林右旗","赤峰市");
		
		lm2[380]=new Array("林西县","赤峰市");
		
		lm2[381]=new Array("克什克腾旗","赤峰市");
		
		lm2[382]=new Array("翁牛特旗","赤峰市");
		
		lm2[383]=new Array("喀喇沁旗","赤峰市");
		
		lm2[384]=new Array("宁城县","赤峰市");
		
		lm2[385]=new Array("敖汉旗","赤峰市");
		
		lm2[386]=new Array("市辖区","通辽市");
		
		lm2[387]=new Array("科尔沁区","通辽市");
		
		lm2[388]=new Array("科尔沁左翼中旗","通辽市");
		
		lm2[389]=new Array("科尔沁左翼后旗","通辽市");
		
		lm2[390]=new Array("开鲁县","通辽市");
		
		lm2[391]=new Array("库伦旗","通辽市");
		
		lm2[392]=new Array("奈曼旗","通辽市");
		
		lm2[393]=new Array("扎鲁特旗","通辽市");
		
		lm2[394]=new Array("霍林郭勒市","通辽市");
		
		lm2[395]=new Array("东胜区","鄂尔多斯市");
		
		lm2[396]=new Array("达拉特旗","鄂尔多斯市");
		
		lm2[397]=new Array("准格尔旗","鄂尔多斯市");
		
		lm2[398]=new Array("鄂托克前旗","鄂尔多斯市");
		
		lm2[399]=new Array("鄂托克旗","鄂尔多斯市");
		
		lm2[400]=new Array("杭锦旗","鄂尔多斯市");
		
		lm2[401]=new Array("乌审旗","鄂尔多斯市");
		
		lm2[402]=new Array("伊金霍洛旗","鄂尔多斯市");
		
		lm2[403]=new Array("市辖区","呼伦贝尔市");
		
		lm2[404]=new Array("海拉尔区","呼伦贝尔市");
		
		lm2[405]=new Array("阿荣旗","呼伦贝尔市");
		
		lm2[406]=new Array("莫力达瓦达斡尔族自治旗","呼伦贝尔市");
		
		lm2[407]=new Array("鄂伦春自治旗","呼伦贝尔市");
		
		lm2[408]=new Array("鄂温克族自治旗","呼伦贝尔市");
		
		lm2[409]=new Array("陈巴尔虎旗","呼伦贝尔市");
		
		lm2[410]=new Array("新巴尔虎左旗","呼伦贝尔市");
		
		lm2[411]=new Array("新巴尔虎右旗","呼伦贝尔市");
		
		lm2[412]=new Array("满洲里市","呼伦贝尔市");
		
		lm2[413]=new Array("牙克石市","呼伦贝尔市");
		
		lm2[414]=new Array("扎兰屯市","呼伦贝尔市");
		
		lm2[415]=new Array("额尔古纳市","呼伦贝尔市");
		
		lm2[416]=new Array("根河市","呼伦贝尔市");
		
		lm2[417]=new Array("市辖区","巴彦淖尔市");
		
		lm2[418]=new Array("临河区","巴彦淖尔市");
		
		lm2[419]=new Array("五原县","巴彦淖尔市");
		
		lm2[420]=new Array("磴口县","巴彦淖尔市");
		
		lm2[421]=new Array("乌拉特前旗","巴彦淖尔市");
		
		lm2[422]=new Array("乌拉特中旗","巴彦淖尔市");
		
		lm2[423]=new Array("乌拉特后旗","巴彦淖尔市");
		
		lm2[424]=new Array("杭锦后旗","巴彦淖尔市");
		
		lm2[425]=new Array("市辖区","乌兰察布市");
		
		lm2[426]=new Array("集宁区","乌兰察布市");
		
		lm2[427]=new Array("卓资县","乌兰察布市");
		
		lm2[428]=new Array("化德县","乌兰察布市");
		
		lm2[429]=new Array("商都县","乌兰察布市");
		
		lm2[430]=new Array("兴和县","乌兰察布市");
		
		lm2[431]=new Array("凉城县","乌兰察布市");
		
		lm2[432]=new Array("察哈尔右翼前旗","乌兰察布市");
		
		lm2[433]=new Array("察哈尔右翼中旗","乌兰察布市");
		
		lm2[434]=new Array("察哈尔右翼后旗","乌兰察布市");
		
		lm2[435]=new Array("四子王旗","乌兰察布市");
		
		lm2[436]=new Array("丰镇市","乌兰察布市");
		
		lm2[437]=new Array("乌兰浩特市","兴安盟");
		
		lm2[438]=new Array("阿尔山市","兴安盟");
		
		lm2[439]=new Array("科尔沁右翼前旗","兴安盟");
		
		lm2[440]=new Array("科尔沁右翼中旗","兴安盟");
		
		lm2[441]=new Array("扎赉特旗","兴安盟");
		
		lm2[442]=new Array("突泉县","兴安盟");
		
		lm2[443]=new Array("二连浩特市","锡林郭勒盟");
		
		lm2[444]=new Array("锡林浩特市","锡林郭勒盟");
		
		lm2[445]=new Array("阿巴嘎旗","锡林郭勒盟");
		
		lm2[446]=new Array("苏尼特左旗","锡林郭勒盟");
		
		lm2[447]=new Array("苏尼特右旗","锡林郭勒盟");
		
		lm2[448]=new Array("东乌珠穆沁旗","锡林郭勒盟");
		
		lm2[449]=new Array("西乌珠穆沁旗","锡林郭勒盟");
		
		lm2[450]=new Array("太仆寺旗","锡林郭勒盟");
		
		lm2[451]=new Array("镶黄旗","锡林郭勒盟");
		
		lm2[452]=new Array("正镶白旗","锡林郭勒盟");
		
		lm2[453]=new Array("正蓝旗","锡林郭勒盟");
		
		lm2[454]=new Array("多伦县","锡林郭勒盟");
		
		lm2[455]=new Array("阿拉善左旗","阿拉善盟");
		
		lm2[456]=new Array("阿拉善右旗","阿拉善盟");
		
		lm2[457]=new Array("额济纳旗","阿拉善盟");
		
		lm2[458]=new Array("市辖区","沈阳市");
		
		lm2[459]=new Array("和平区","沈阳市");
		
		lm2[460]=new Array("沈河区","沈阳市");
		
		lm2[461]=new Array("大东区","沈阳市");
		
		lm2[462]=new Array("皇姑区","沈阳市");
		
		lm2[463]=new Array("铁西区","沈阳市");
		
		lm2[464]=new Array("苏家屯区","沈阳市");
		
		lm2[465]=new Array("东陵区","沈阳市");
		
		lm2[466]=new Array("新城子区","沈阳市");
		
		lm2[467]=new Array("于洪区","沈阳市");
		
		lm2[468]=new Array("辽中县","沈阳市");
		
		lm2[469]=new Array("康平县","沈阳市");
		
		lm2[470]=new Array("法库县","沈阳市");
		
		lm2[471]=new Array("新民市","沈阳市");
		
		lm2[472]=new Array("市辖区","大连市");
		
		lm2[473]=new Array("中山区","大连市");
		
		lm2[474]=new Array("西岗区","大连市");
		
		lm2[475]=new Array("沙河口区","大连市");
		
		lm2[476]=new Array("甘井子区","大连市");
		
		lm2[477]=new Array("旅顺口区","大连市");
		
		lm2[478]=new Array("金州区","大连市");
		
		lm2[479]=new Array("长海县","大连市");
		
		lm2[480]=new Array("瓦房店市","大连市");
		
		lm2[481]=new Array("普兰店市","大连市");
		
		lm2[482]=new Array("庄河市","大连市");
		
		lm2[483]=new Array("市辖区","鞍山市");
		
		lm2[484]=new Array("铁东区","鞍山市");
		
		lm2[485]=new Array("铁西区","鞍山市");
		
		lm2[486]=new Array("立山区","鞍山市");
		
		lm2[487]=new Array("千山区","鞍山市");
		
		lm2[488]=new Array("台安县","鞍山市");
		
		lm2[489]=new Array("岫岩满族自治县","鞍山市");
		
		lm2[490]=new Array("海城市","鞍山市");
		
		lm2[491]=new Array("市辖区","抚顺市");
		
		lm2[492]=new Array("新抚区","抚顺市");
		
		lm2[493]=new Array("东洲区","抚顺市");
		
		lm2[494]=new Array("望花区","抚顺市");
		
		lm2[495]=new Array("顺城区","抚顺市");
		
		lm2[496]=new Array("抚顺县","抚顺市");
		
		lm2[497]=new Array("新宾满族自治县","抚顺市");
		
		lm2[498]=new Array("清原满族自治县","抚顺市");
		
		lm2[499]=new Array("市辖区","本溪市");
		
		lm2[500]=new Array("平山区","本溪市");
		
		lm2[501]=new Array("溪湖区","本溪市");
		
		lm2[502]=new Array("明山区","本溪市");
		
		lm2[503]=new Array("南芬区","本溪市");
		
		lm2[504]=new Array("本溪满族自治县","本溪市");
		
		lm2[505]=new Array("桓仁满族自治县","本溪市");
		
		lm2[506]=new Array("市辖区","丹东市");
		
		lm2[507]=new Array("元宝区","丹东市");
		
		lm2[508]=new Array("振兴区","丹东市");
		
		lm2[509]=new Array("振安区","丹东市");
		
		lm2[510]=new Array("宽甸满族自治县","丹东市");
		
		lm2[511]=new Array("东港市","丹东市");
		
		lm2[512]=new Array("凤城市","丹东市");
		
		lm2[513]=new Array("市辖区","锦州市");
		
		lm2[514]=new Array("古塔区","锦州市");
		
		lm2[515]=new Array("凌河区","锦州市");
		
		lm2[516]=new Array("太和区","锦州市");
		
		lm2[517]=new Array("黑山县","锦州市");
		
		lm2[518]=new Array("义县","锦州市");
		
		lm2[519]=new Array("凌海市","锦州市");
		
		lm2[520]=new Array("北宁市","锦州市");
		
		lm2[521]=new Array("市辖区","营口市");
		
		lm2[522]=new Array("站前区","营口市");
		
		lm2[523]=new Array("西市区","营口市");
		
		lm2[524]=new Array("鲅鱼圈区","营口市");
		
		lm2[525]=new Array("老边区","营口市");
		
		lm2[526]=new Array("盖州市","营口市");
		
		lm2[527]=new Array("大石桥市","营口市");
		
		lm2[528]=new Array("市辖区","阜新市");
		
		lm2[529]=new Array("海州区","阜新市");
		
		lm2[530]=new Array("新邱区","阜新市");
		
		lm2[531]=new Array("太平区","阜新市");
		
		lm2[532]=new Array("清河门区","阜新市");
		
		lm2[533]=new Array("细河区","阜新市");
		
		lm2[534]=new Array("阜新蒙古族自治县","阜新市");
		
		lm2[535]=new Array("彰武县","阜新市");
		
		lm2[536]=new Array("市辖区","辽阳市");
		
		lm2[537]=new Array("白塔区","辽阳市");
		
		lm2[538]=new Array("文圣区","辽阳市");
		
		lm2[539]=new Array("宏伟区","辽阳市");
		
		lm2[540]=new Array("弓长岭区","辽阳市");
		
		lm2[541]=new Array("太子河区","辽阳市");
		
		lm2[542]=new Array("辽阳县","辽阳市");
		
		lm2[543]=new Array("灯塔市","辽阳市");
		
		lm2[544]=new Array("市辖区","盘锦市");
		
		lm2[545]=new Array("双台子区","盘锦市");
		
		lm2[546]=new Array("兴隆台区","盘锦市");
		
		lm2[547]=new Array("大洼县","盘锦市");
		
		lm2[548]=new Array("盘山县","盘锦市");
		
		lm2[549]=new Array("市辖区","铁岭市");
		
		lm2[550]=new Array("银州区","铁岭市");
		
		lm2[551]=new Array("清河区","铁岭市");
		
		lm2[552]=new Array("铁岭县","铁岭市");
		
		lm2[553]=new Array("西丰县","铁岭市");
		
		lm2[554]=new Array("昌图县","铁岭市");
		
		lm2[555]=new Array("调兵山市","铁岭市");
		
		lm2[556]=new Array("开原市","铁岭市");
		
		lm2[557]=new Array("市辖区","朝阳市");
		
		lm2[558]=new Array("双塔区","朝阳市");
		
		lm2[559]=new Array("龙城区","朝阳市");
		
		lm2[560]=new Array("朝阳县","朝阳市");
		
		lm2[561]=new Array("建平县","朝阳市");
		
		lm2[562]=new Array("喀喇沁左翼蒙古族自治县","朝阳市");
		
		lm2[563]=new Array("北票市","朝阳市");
		
		lm2[564]=new Array("凌源市","朝阳市");
		
		lm2[565]=new Array("市辖区","葫芦岛市");
		
		lm2[566]=new Array("连山区","葫芦岛市");
		
		lm2[567]=new Array("龙港区","葫芦岛市");
		
		lm2[568]=new Array("南票区","葫芦岛市");
		
		lm2[569]=new Array("绥中县","葫芦岛市");
		
		lm2[570]=new Array("建昌县","葫芦岛市");
		
		lm2[571]=new Array("兴城市","葫芦岛市");
		
		lm2[572]=new Array("市辖区","长春市");
		
		lm2[573]=new Array("南关区","长春市");
		
		lm2[574]=new Array("宽城区","长春市");
		
		lm2[575]=new Array("朝阳区","长春市");
		
		lm2[576]=new Array("二道区","长春市");
		
		lm2[577]=new Array("绿园区","长春市");
		
		lm2[578]=new Array("双阳区","长春市");
		
		lm2[579]=new Array("农安县","长春市");
		
		lm2[580]=new Array("九台市","长春市");
		
		lm2[581]=new Array("榆树市","长春市");
		
		lm2[582]=new Array("德惠市","长春市");
		
		lm2[583]=new Array("市辖区","吉林市");
		
		lm2[584]=new Array("昌邑区","吉林市");
		
		lm2[585]=new Array("龙潭区","吉林市");
		
		lm2[586]=new Array("船营区","吉林市");
		
		lm2[587]=new Array("丰满区","吉林市");
		
		lm2[588]=new Array("永吉县","吉林市");
		
		lm2[589]=new Array("蛟河市","吉林市");
		
		lm2[590]=new Array("桦甸市","吉林市");
		
		lm2[591]=new Array("舒兰市","吉林市");
		
		lm2[592]=new Array("磐石市","吉林市");
		
		lm2[593]=new Array("市辖区","四平市");
		
		lm2[594]=new Array("铁西区","四平市");
		
		lm2[595]=new Array("铁东区","四平市");
		
		lm2[596]=new Array("梨树县","四平市");
		
		lm2[597]=new Array("伊通满族自治县","四平市");
		
		lm2[598]=new Array("公主岭市","四平市");
		
		lm2[599]=new Array("双辽市","四平市");
		
		lm2[600]=new Array("市辖区","辽源市");
		
		lm2[601]=new Array("龙山区","辽源市");
		
		lm2[602]=new Array("西安区","辽源市");
		
		lm2[603]=new Array("东丰县","辽源市");
		
		lm2[604]=new Array("东辽县","辽源市");
		
		lm2[605]=new Array("市辖区","通化市");
		
		lm2[606]=new Array("东昌区","通化市");
		
		lm2[607]=new Array("二道江区","通化市");
		
		lm2[608]=new Array("通化县","通化市");
		
		lm2[609]=new Array("辉南县","通化市");
		
		lm2[610]=new Array("柳河县","通化市");
		
		lm2[611]=new Array("梅河口市","通化市");
		
		lm2[612]=new Array("集安市","通化市");
		
		lm2[613]=new Array("市辖区","白山市");
		
		lm2[614]=new Array("八道江区","白山市");
		
		lm2[615]=new Array("抚松县","白山市");
		
		lm2[616]=new Array("靖宇县","白山市");
		
		lm2[617]=new Array("长白朝鲜族自治县","白山市");
		
		lm2[618]=new Array("江源县","白山市");
		
		lm2[619]=new Array("临江市","白山市");
		
		lm2[620]=new Array("市辖区","松原市");
		
		lm2[621]=new Array("宁江区","松原市");
		
		lm2[622]=new Array("前郭尔罗斯蒙古族自治县","松原市");
		
		lm2[623]=new Array("长岭县","松原市");
		
		lm2[624]=new Array("乾安县","松原市");
		
		lm2[625]=new Array("扶余县","松原市");
		
		lm2[626]=new Array("市辖区","白城市");
		
		lm2[627]=new Array("洮北区","白城市");
		
		lm2[628]=new Array("镇赉县","白城市");
		
		lm2[629]=new Array("通榆县","白城市");
		
		lm2[630]=new Array("洮南市","白城市");
		
		lm2[631]=new Array("大安市","白城市");
		
		lm2[632]=new Array("延吉市","延边自治州");
		
		lm2[633]=new Array("图们市","延边自治州");
		
		lm2[634]=new Array("敦化市","延边自治州");
		
		lm2[635]=new Array("珲春市","延边自治州");
		
		lm2[636]=new Array("龙井市","延边自治州");
		
		lm2[637]=new Array("和龙市","延边自治州");
		
		lm2[638]=new Array("汪清县","延边自治州");
		
		lm2[639]=new Array("安图县","延边自治州");
		
		lm2[640]=new Array("市辖区","哈尔滨市");
		
		lm2[641]=new Array("道里区","哈尔滨市");
		
		lm2[642]=new Array("南岗区","哈尔滨市");
		
		lm2[643]=new Array("道外区","哈尔滨市");
		
		lm2[644]=new Array("香坊区","哈尔滨市");
		
		lm2[645]=new Array("动力区","哈尔滨市");
		
		lm2[646]=new Array("平房区","哈尔滨市");
		
		lm2[647]=new Array("松北区","哈尔滨市");
		
		lm2[648]=new Array("呼兰区","哈尔滨市");
		
		lm2[649]=new Array("依兰县","哈尔滨市");
		
		lm2[650]=new Array("方正县","哈尔滨市");
		
		lm2[651]=new Array("宾县","哈尔滨市");
		
		lm2[652]=new Array("巴彦县","哈尔滨市");
		
		lm2[653]=new Array("木兰县","哈尔滨市");
		
		lm2[654]=new Array("通河县","哈尔滨市");
		
		lm2[655]=new Array("延寿县","哈尔滨市");
		
		lm2[656]=new Array("阿城市","哈尔滨市");
		
		lm2[657]=new Array("双城市","哈尔滨市");
		
		lm2[658]=new Array("尚志市","哈尔滨市");
		
		lm2[659]=new Array("五常市","哈尔滨市");
		
		lm2[660]=new Array("市辖区","齐齐哈尔市");
		
		lm2[661]=new Array("龙沙区","齐齐哈尔市");
		
		lm2[662]=new Array("建华区","齐齐哈尔市");
		
		lm2[663]=new Array("铁锋区","齐齐哈尔市");
		
		lm2[664]=new Array("昂昂溪区","齐齐哈尔市");
		
		lm2[665]=new Array("富拉尔基区","齐齐哈尔市");
		
		lm2[666]=new Array("碾子山区","齐齐哈尔市");
		
		lm2[667]=new Array("梅里斯达斡尔族区","齐齐哈尔市");
		
		lm2[668]=new Array("龙江县","齐齐哈尔市");
		
		lm2[669]=new Array("依安县","齐齐哈尔市");
		
		lm2[670]=new Array("泰来县","齐齐哈尔市");
		
		lm2[671]=new Array("甘南县","齐齐哈尔市");
		
		lm2[672]=new Array("富裕县","齐齐哈尔市");
		
		lm2[673]=new Array("克山县","齐齐哈尔市");
		
		lm2[674]=new Array("克东县","齐齐哈尔市");
		
		lm2[675]=new Array("拜泉县","齐齐哈尔市");
		
		lm2[676]=new Array("讷河市","齐齐哈尔市");
		
		lm2[677]=new Array("市辖区","鸡西市");
		
		lm2[678]=new Array("鸡冠区","鸡西市");
		
		lm2[679]=new Array("恒山区","鸡西市");
		
		lm2[680]=new Array("滴道区","鸡西市");
		
		lm2[681]=new Array("梨树区","鸡西市");
		
		lm2[682]=new Array("城子河区","鸡西市");
		
		lm2[683]=new Array("麻山区","鸡西市");
		
		lm2[684]=new Array("鸡东县","鸡西市");
		
		lm2[685]=new Array("虎林市","鸡西市");
		
		lm2[686]=new Array("密山市","鸡西市");
		
		lm2[687]=new Array("市辖区","鹤岗市");
		
		lm2[688]=new Array("向阳区","鹤岗市");
		
		lm2[689]=new Array("工农区","鹤岗市");
		
		lm2[690]=new Array("南山区","鹤岗市");
		
		lm2[691]=new Array("兴安区","鹤岗市");
		
		lm2[692]=new Array("东山区","鹤岗市");
		
		lm2[693]=new Array("兴山区","鹤岗市");
		
		lm2[694]=new Array("萝北县","鹤岗市");
		
		lm2[695]=new Array("绥滨县","鹤岗市");
		
		lm2[696]=new Array("市辖区","双鸭山市");
		
		lm2[697]=new Array("尖山区","双鸭山市");
		
		lm2[698]=new Array("岭东区","双鸭山市");
		
		lm2[699]=new Array("四方台区","双鸭山市");
		
		lm2[700]=new Array("宝山区","双鸭山市");
		
		lm2[701]=new Array("集贤县","双鸭山市");
		
		lm2[702]=new Array("友谊县","双鸭山市");
		
		lm2[703]=new Array("宝清县","双鸭山市");
		
		lm2[704]=new Array("饶河县","双鸭山市");
		
		lm2[705]=new Array("市辖区","大庆市");
		
		lm2[706]=new Array("萨尔图区","大庆市");
		
		lm2[707]=new Array("龙凤区","大庆市");
		
		lm2[708]=new Array("让胡路区","大庆市");
		
		lm2[709]=new Array("红岗区","大庆市");
		
		lm2[710]=new Array("大同区","大庆市");
		
		lm2[711]=new Array("肇州县","大庆市");
		
		lm2[712]=new Array("肇源县","大庆市");
		
		lm2[713]=new Array("林甸县","大庆市");
		
		lm2[714]=new Array("杜尔伯特蒙古族自治县","大庆市");
		
		lm2[715]=new Array("市辖区","伊春市");
		
		lm2[716]=new Array("伊春区","伊春市");
		
		lm2[717]=new Array("南岔区","伊春市");
		
		lm2[718]=new Array("友好区","伊春市");
		
		lm2[719]=new Array("西林区","伊春市");
		
		lm2[720]=new Array("翠峦区","伊春市");
		
		lm2[721]=new Array("新青区","伊春市");
		
		lm2[722]=new Array("美溪区","伊春市");
		
		lm2[723]=new Array("金山屯区","伊春市");
		
		lm2[724]=new Array("五营区","伊春市");
		
		lm2[725]=new Array("乌马河区","伊春市");
		
		lm2[726]=new Array("汤旺河区","伊春市");
		
		lm2[727]=new Array("带岭区","伊春市");
		
		lm2[728]=new Array("乌伊岭区","伊春市");
		
		lm2[729]=new Array("红星区","伊春市");
		
		lm2[730]=new Array("上甘岭区","伊春市");
		
		lm2[731]=new Array("嘉荫县","伊春市");
		
		lm2[732]=new Array("铁力市","伊春市");
		
		lm2[733]=new Array("市辖区","佳木斯市");
		
		lm2[734]=new Array("永红区","佳木斯市");
		
		lm2[735]=new Array("向阳区","佳木斯市");
		
		lm2[736]=new Array("前进区","佳木斯市");
		
		lm2[737]=new Array("东风区","佳木斯市");
		
		lm2[738]=new Array("郊区","佳木斯市");
		
		lm2[739]=new Array("桦南县","佳木斯市");
		
		lm2[740]=new Array("桦川县","佳木斯市");
		
		lm2[741]=new Array("汤原县","佳木斯市");
		
		lm2[742]=new Array("抚远县","佳木斯市");
		
		lm2[743]=new Array("同江市","佳木斯市");
		
		lm2[744]=new Array("富锦市","佳木斯市");
		
		lm2[745]=new Array("市辖区","七台河市");
		
		lm2[746]=new Array("新兴区","七台河市");
		
		lm2[747]=new Array("桃山区","七台河市");
		
		lm2[748]=new Array("茄子河区","七台河市");
		
		lm2[749]=new Array("勃利县","七台河市");
		
		lm2[750]=new Array("市辖区","牡丹江市");
		
		lm2[751]=new Array("东安区","牡丹江市");
		
		lm2[752]=new Array("阳明区","牡丹江市");
		
		lm2[753]=new Array("爱民区","牡丹江市");
		
		lm2[754]=new Array("西安区","牡丹江市");
		
		lm2[755]=new Array("东宁县","牡丹江市");
		
		lm2[756]=new Array("林口县","牡丹江市");
		
		lm2[757]=new Array("绥芬河市","牡丹江市");
		
		lm2[758]=new Array("海林市","牡丹江市");
		
		lm2[759]=new Array("宁安市","牡丹江市");
		
		lm2[760]=new Array("穆棱市","牡丹江市");
		
		lm2[761]=new Array("市辖区","黑河市");
		
		lm2[762]=new Array("爱辉区","黑河市");
		
		lm2[763]=new Array("嫩江县","黑河市");
		
		lm2[764]=new Array("逊克县","黑河市");
		
		lm2[765]=new Array("孙吴县","黑河市");
		
		lm2[766]=new Array("北安市","黑河市");
		
		lm2[767]=new Array("五大连池市","黑河市");
		
		lm2[768]=new Array("市辖区","绥化市");
		
		lm2[769]=new Array("北林区","绥化市");
		
		lm2[770]=new Array("望奎县","绥化市");
		
		lm2[771]=new Array("兰西县","绥化市");
		
		lm2[772]=new Array("青冈县","绥化市");
		
		lm2[773]=new Array("庆安县","绥化市");
		
		lm2[774]=new Array("明水县","绥化市");
		
		lm2[775]=new Array("绥棱县","绥化市");
		
		lm2[776]=new Array("安达市","绥化市");
		
		lm2[777]=new Array("肇东市","绥化市");
		
		lm2[778]=new Array("海伦市","绥化市");
		
		lm2[779]=new Array("呼玛县","大兴安岭地区");
		
		lm2[780]=new Array("塔河县","大兴安岭地区");
		
		lm2[781]=new Array("漠河县","大兴安岭地区");
		
		lm2[782]=new Array("黄浦区","上海辖区");
		
		lm2[783]=new Array("卢湾区","上海辖区");
		
		lm2[784]=new Array("徐汇区","上海辖区");
		
		lm2[785]=new Array("长宁区","上海辖区");
		
		lm2[786]=new Array("静安区","上海辖区");
		
		lm2[787]=new Array("普陀区","上海辖区");
		
		lm2[788]=new Array("闸北区","上海辖区");
		
		lm2[789]=new Array("虹口区","上海辖区");
		
		lm2[790]=new Array("杨浦区","上海辖区");
		
		lm2[791]=new Array("闵行区","上海辖区");
		
		lm2[792]=new Array("宝山区","上海辖区");
		
		lm2[793]=new Array("嘉定区","上海辖区");
		
		lm2[794]=new Array("浦东新区","上海辖区");
		
		lm2[795]=new Array("金山区","上海辖区");
		
		lm2[796]=new Array("松江区","上海辖区");
		
		lm2[797]=new Array("青浦区","上海辖区");
		
		lm2[798]=new Array("南汇区","上海辖区");
		
		lm2[799]=new Array("奉贤区","上海辖区");
		
		lm2[800]=new Array("崇明县","上海辖县");
		
		lm2[801]=new Array("市辖区","南京市");
		
		lm2[802]=new Array("玄武区","南京市");
		
		lm2[803]=new Array("白下区","南京市");
		
		lm2[804]=new Array("秦淮区","南京市");
		
		lm2[805]=new Array("建邺区","南京市");
		
		lm2[806]=new Array("鼓楼区","南京市");
		
		lm2[807]=new Array("下关区","南京市");
		
		lm2[808]=new Array("浦口区","南京市");
		
		lm2[809]=new Array("栖霞区","南京市");
		
		lm2[810]=new Array("雨花台区","南京市");
		
		lm2[811]=new Array("江宁区","南京市");
		
		lm2[812]=new Array("六合区","南京市");
		
		lm2[813]=new Array("溧水县","南京市");
		
		lm2[814]=new Array("高淳县","南京市");
		
		lm2[815]=new Array("市辖区","无锡市");
		
		lm2[816]=new Array("崇安区","无锡市");
		
		lm2[817]=new Array("南长区","无锡市");
		
		lm2[818]=new Array("北塘区","无锡市");
		
		lm2[819]=new Array("锡山区","无锡市");
		
		lm2[820]=new Array("惠山区","无锡市");
		
		lm2[821]=new Array("滨湖区","无锡市");
		
		lm2[822]=new Array("江阴市","无锡市");
		
		lm2[823]=new Array("宜兴市","无锡市");
		
		lm2[824]=new Array("市辖区","徐州市");
		
		lm2[825]=new Array("鼓楼区","徐州市");
		
		lm2[826]=new Array("云龙区","徐州市");
		
		lm2[827]=new Array("九里区","徐州市");
		
		lm2[828]=new Array("贾汪区","徐州市");
		
		lm2[829]=new Array("泉山区","徐州市");
		
		lm2[830]=new Array("丰县","徐州市");
		
		lm2[831]=new Array("沛县","徐州市");
		
		lm2[832]=new Array("铜山县","徐州市");
		
		lm2[833]=new Array("睢宁县","徐州市");
		
		lm2[834]=new Array("新沂市","徐州市");
		
		lm2[835]=new Array("邳州市","徐州市");
		
		lm2[836]=new Array("市辖区","常州市");
		
		lm2[837]=new Array("天宁区","常州市");
		
		lm2[838]=new Array("钟楼区","常州市");
		
		lm2[839]=new Array("戚墅堰区","常州市");
		
		lm2[840]=new Array("新北区","常州市");
		
		lm2[841]=new Array("武进区","常州市");
		
		lm2[842]=new Array("溧阳市","常州市");
		
		lm2[843]=new Array("金坛市","常州市");
		
		lm2[844]=new Array("市辖区","苏州市");
		
		lm2[845]=new Array("沧浪区","苏州市");
		
		lm2[846]=new Array("平江区","苏州市");
		
		lm2[847]=new Array("金阊区","苏州市");
		
		lm2[848]=new Array("虎丘区","苏州市");
		
		lm2[849]=new Array("吴中区","苏州市");
		
		lm2[850]=new Array("相城区","苏州市");
		
		lm2[851]=new Array("常熟市","苏州市");
		
		lm2[852]=new Array("张家港市","苏州市");
		
		lm2[853]=new Array("昆山市","苏州市");
		
		lm2[854]=new Array("吴江市","苏州市");
		
		lm2[855]=new Array("太仓市","苏州市");
		
		lm2[856]=new Array("市辖区","南通市");
		
		lm2[857]=new Array("崇川区","南通市");
		
		lm2[858]=new Array("港闸区","南通市");
		
		lm2[859]=new Array("海安县","南通市");
		
		lm2[860]=new Array("如东县","南通市");
		
		lm2[861]=new Array("启东市","南通市");
		
		lm2[862]=new Array("如皋市","南通市");
		
		lm2[863]=new Array("通州市","南通市");
		
		lm2[864]=new Array("海门市","南通市");
		
		lm2[865]=new Array("市辖区","连云港市");
		
		lm2[866]=new Array("连云区","连云港市");
		
		lm2[867]=new Array("新浦区","连云港市");
		
		lm2[868]=new Array("海州区","连云港市");
		
		lm2[869]=new Array("赣榆县","连云港市");
		
		lm2[870]=new Array("东海县","连云港市");
		
		lm2[871]=new Array("灌云县","连云港市");
		
		lm2[872]=new Array("灌南县","连云港市");
		
		lm2[873]=new Array("市辖区","淮安市");
		
		lm2[874]=new Array("清河区","淮安市");
		
		lm2[875]=new Array("楚州区","淮安市");
		
		lm2[876]=new Array("淮阴区","淮安市");
		
		lm2[877]=new Array("清浦区","淮安市");
		
		lm2[878]=new Array("涟水县","淮安市");
		
		lm2[879]=new Array("洪泽县","淮安市");
		
		lm2[880]=new Array("盱眙县","淮安市");
		
		lm2[881]=new Array("金湖县","淮安市");
		
		lm2[882]=new Array("市辖区","盐城市");
		
		lm2[883]=new Array("亭湖区","盐城市");
		
		lm2[884]=new Array("盐都区","盐城市");
		
		lm2[885]=new Array("响水县","盐城市");
		
		lm2[886]=new Array("滨海县","盐城市");
		
		lm2[887]=new Array("阜宁县","盐城市");
		
		lm2[888]=new Array("射阳县","盐城市");
		
		lm2[889]=new Array("建湖县","盐城市");
		
		lm2[890]=new Array("东台市","盐城市");
		
		lm2[891]=new Array("大丰市","盐城市");
		
		lm2[892]=new Array("市辖区","扬州市");
		
		lm2[893]=new Array("广陵区","扬州市");
		
		lm2[894]=new Array("邗江区","扬州市");
		
		lm2[895]=new Array("郊区","扬州市");
		
		lm2[896]=new Array("宝应县","扬州市");
		
		lm2[897]=new Array("仪征市","扬州市");
		
		lm2[898]=new Array("高邮市","扬州市");
		
		lm2[899]=new Array("江都市","扬州市");
		
		lm2[900]=new Array("市辖区","镇江市");
		
		lm2[901]=new Array("京口区","镇江市");
		
		lm2[902]=new Array("润州区","镇江市");
		
		lm2[903]=new Array("丹徒区","镇江市");
		
		lm2[904]=new Array("丹阳市","镇江市");
		
		lm2[905]=new Array("扬中市","镇江市");
		
		lm2[906]=new Array("句容市","镇江市");
		
		lm2[907]=new Array("市辖区","泰州市");
		
		lm2[908]=new Array("海陵区","泰州市");
		
		lm2[909]=new Array("高港区","泰州市");
		
		lm2[910]=new Array("兴化市","泰州市");
		
		lm2[911]=new Array("靖江市","泰州市");
		
		lm2[912]=new Array("泰兴市","泰州市");
		
		lm2[913]=new Array("姜堰市","泰州市");
		
		lm2[914]=new Array("市辖区","宿迁市");
		
		lm2[915]=new Array("宿城区","宿迁市");
		
		lm2[916]=new Array("宿豫区","宿迁市");
		
		lm2[917]=new Array("沭阳县","宿迁市");
		
		lm2[918]=new Array("泗阳县","宿迁市");
		
		lm2[919]=new Array("泗洪县","宿迁市");
		
		lm2[920]=new Array("市辖区","杭州市");
		
		lm2[921]=new Array("上城区","杭州市");
		
		lm2[922]=new Array("下城区","杭州市");
		
		lm2[923]=new Array("江干区","杭州市");
		
		lm2[924]=new Array("拱墅区","杭州市");
		
		lm2[925]=new Array("西湖区","杭州市");
		
		lm2[926]=new Array("滨江区","杭州市");
		
		lm2[927]=new Array("萧山区","杭州市");
		
		lm2[928]=new Array("余杭区","杭州市");
		
		lm2[929]=new Array("桐庐县","杭州市");
		
		lm2[930]=new Array("淳安县","杭州市");
		
		lm2[931]=new Array("建德市","杭州市");
		
		lm2[932]=new Array("富阳市","杭州市");
		
		lm2[933]=new Array("临安市","杭州市");
		
		lm2[934]=new Array("市辖区","宁波市");
		
		lm2[935]=new Array("海曙区","宁波市");
		
		lm2[936]=new Array("江东区","宁波市");
		
		lm2[937]=new Array("江北区","宁波市");
		
		lm2[938]=new Array("北仑区","宁波市");
		
		lm2[939]=new Array("镇海区","宁波市");
		
		lm2[940]=new Array("鄞州区","宁波市");
		
		lm2[941]=new Array("象山县","宁波市");
		
		lm2[942]=new Array("宁海县","宁波市");
		
		lm2[943]=new Array("余姚市","宁波市");
		
		lm2[944]=new Array("慈溪市","宁波市");
		
		lm2[945]=new Array("奉化市","宁波市");
		
		lm2[946]=new Array("市辖区","温州市");
		
		lm2[947]=new Array("鹿城区","温州市");
		
		lm2[948]=new Array("龙湾区","温州市");
		
		lm2[949]=new Array("瓯海区","温州市");
		
		lm2[950]=new Array("洞头县","温州市");
		
		lm2[951]=new Array("永嘉县","温州市");
		
		lm2[952]=new Array("平阳县","温州市");
		
		lm2[953]=new Array("苍南县","温州市");
		
		lm2[954]=new Array("文成县","温州市");
		
		lm2[955]=new Array("泰顺县","温州市");
		
		lm2[956]=new Array("瑞安市","温州市");
		
		lm2[957]=new Array("乐清市","温州市");
		
		lm2[958]=new Array("市辖区","嘉兴市");
		
		lm2[959]=new Array("秀城区","嘉兴市");
		
		lm2[960]=new Array("秀洲区","嘉兴市");
		
		lm2[961]=new Array("嘉善县","嘉兴市");
		
		lm2[962]=new Array("海盐县","嘉兴市");
		
		lm2[963]=new Array("海宁市","嘉兴市");
		
		lm2[964]=new Array("平湖市","嘉兴市");
		
		lm2[965]=new Array("桐乡市","嘉兴市");
		
		lm2[966]=new Array("市辖区","湖州市");
		
		lm2[967]=new Array("吴兴区","湖州市");
		
		lm2[968]=new Array("南浔区","湖州市");
		
		lm2[969]=new Array("德清县","湖州市");
		
		lm2[970]=new Array("长兴县","湖州市");
		
		lm2[971]=new Array("安吉县","湖州市");
		
		lm2[972]=new Array("市辖区","绍兴市");
		
		lm2[973]=new Array("越城区","绍兴市");
		
		lm2[974]=new Array("绍兴县","绍兴市");
		
		lm2[975]=new Array("新昌县","绍兴市");
		
		lm2[976]=new Array("诸暨市","绍兴市");
		
		lm2[977]=new Array("上虞市","绍兴市");
		
		lm2[978]=new Array("嵊州市","绍兴市");
		
		lm2[979]=new Array("市辖区","金华市");
		
		lm2[980]=new Array("婺城区","金华市");
		
		lm2[981]=new Array("金东区","金华市");
		
		lm2[982]=new Array("武义县","金华市");
		
		lm2[983]=new Array("浦江县","金华市");
		
		lm2[984]=new Array("磐安县","金华市");
		
		lm2[985]=new Array("兰溪市","金华市");
		
		lm2[986]=new Array("义乌市","金华市");
		
		lm2[987]=new Array("东阳市","金华市");
		
		lm2[988]=new Array("永康市","金华市");
		
		lm2[989]=new Array("市辖区","衢州市");
		
		lm2[990]=new Array("柯城区","衢州市");
		
		lm2[991]=new Array("衢江区","衢州市");
		
		lm2[992]=new Array("常山县","衢州市");
		
		lm2[993]=new Array("开化县","衢州市");
		
		lm2[994]=new Array("龙游县","衢州市");
		
		lm2[995]=new Array("江山市","衢州市");
		
		lm2[996]=new Array("市辖区","舟山市");
		
		lm2[997]=new Array("定海区","舟山市");
		
		lm2[998]=new Array("普陀区","舟山市");
		
		lm2[999]=new Array("岱山县","舟山市");
		
		lm2[1000]=new Array("嵊泗县","舟山市");
		
		lm2[1001]=new Array("市辖区","台州市");
		
		lm2[1002]=new Array("椒江区","台州市");
		
		lm2[1003]=new Array("黄岩区","台州市");
		
		lm2[1004]=new Array("路桥区","台州市");
		
		lm2[1005]=new Array("玉环县","台州市");
		
		lm2[1006]=new Array("三门县","台州市");
		
		lm2[1007]=new Array("天台县","台州市");
		
		lm2[1008]=new Array("仙居县","台州市");
		
		lm2[1009]=new Array("温岭市","台州市");
		
		lm2[1010]=new Array("临海市","台州市");
		
		lm2[1011]=new Array("市辖区","丽水市");
		
		lm2[1012]=new Array("莲都区","丽水市");
		
		lm2[1013]=new Array("青田县","丽水市");
		
		lm2[1014]=new Array("缙云县","丽水市");
		
		lm2[1015]=new Array("遂昌县","丽水市");
		
		lm2[1016]=new Array("松阳县","丽水市");
		
		lm2[1017]=new Array("云和县","丽水市");
		
		lm2[1018]=new Array("庆元县","丽水市");
		
		lm2[1019]=new Array("景宁畲族自治县","丽水市");
		
		lm2[1020]=new Array("龙泉市","丽水市");
		
		lm2[1021]=new Array("市辖区","合肥市");
		
		lm2[1022]=new Array("瑶海区","合肥市");
		
		lm2[1023]=new Array("庐阳区","合肥市");
		
		lm2[1024]=new Array("蜀山区","合肥市");
		
		lm2[1025]=new Array("包河区","合肥市");
		
		lm2[1026]=new Array("长丰县","合肥市");
		
		lm2[1027]=new Array("肥东县","合肥市");
		
		lm2[1028]=new Array("肥西县","合肥市");
		
		lm2[1029]=new Array("市辖区","芜湖市");
		
		lm2[1030]=new Array("镜湖区","芜湖市");
		
		lm2[1031]=new Array("马塘区","芜湖市");
		
		lm2[1032]=new Array("新芜区","芜湖市");
		
		lm2[1033]=new Array("鸠江区","芜湖市");
		
		lm2[1034]=new Array("芜湖县","芜湖市");
		
		lm2[1035]=new Array("繁昌县","芜湖市");
		
		lm2[1036]=new Array("南陵县","芜湖市");
		
		lm2[1037]=new Array("市辖区","蚌埠市");
		
		lm2[1038]=new Array("龙子湖区","蚌埠市");
		
		lm2[1039]=new Array("蚌山区","蚌埠市");
		
		lm2[1040]=new Array("禹会区","蚌埠市");
		
		lm2[1041]=new Array("淮上区","蚌埠市");
		
		lm2[1042]=new Array("怀远县","蚌埠市");
		
		lm2[1043]=new Array("五河县","蚌埠市");
		
		lm2[1044]=new Array("固镇县","蚌埠市");
		
		lm2[1045]=new Array("市辖区","淮南市");
		
		lm2[1046]=new Array("大通区","淮南市");
		
		lm2[1047]=new Array("田家庵区","淮南市");
		
		lm2[1048]=new Array("谢家集区","淮南市");
		
		lm2[1049]=new Array("八公山区","淮南市");
		
		lm2[1050]=new Array("潘集区","淮南市");
		
		lm2[1051]=new Array("凤台县","淮南市");
		
		lm2[1052]=new Array("市辖区","马鞍山市");
		
		lm2[1053]=new Array("金家庄区","马鞍山市");
		
		lm2[1054]=new Array("花山区","马鞍山市");
		
		lm2[1055]=new Array("雨山区","马鞍山市");
		
		lm2[1056]=new Array("当涂县","马鞍山市");
		
		lm2[1057]=new Array("市辖区","淮北市");
		
		lm2[1058]=new Array("杜集区","淮北市");
		
		lm2[1059]=new Array("相山区","淮北市");
		
		lm2[1060]=new Array("烈山区","淮北市");
		
		lm2[1061]=new Array("濉溪县","淮北市");
		
		lm2[1062]=new Array("市辖区","铜陵市");
		
		lm2[1063]=new Array("铜官山区","铜陵市");
		
		lm2[1064]=new Array("狮子山区","铜陵市");
		
		lm2[1065]=new Array("郊区","铜陵市");
		
		lm2[1066]=new Array("铜陵县","铜陵市");
		
		lm2[1067]=new Array("市辖区","安庆市");
		
		lm2[1068]=new Array("迎江区","安庆市");
		
		lm2[1069]=new Array("大观区","安庆市");
		
		lm2[1070]=new Array("郊区","安庆市");
		
		lm2[1071]=new Array("怀宁县","安庆市");
		
		lm2[1072]=new Array("枞阳县","安庆市");
		
		lm2[1073]=new Array("潜山县","安庆市");
		
		lm2[1074]=new Array("太湖县","安庆市");
		
		lm2[1075]=new Array("宿松县","安庆市");
		
		lm2[1076]=new Array("望江县","安庆市");
		
		lm2[1077]=new Array("岳西县","安庆市");
		
		lm2[1078]=new Array("桐城市","安庆市");
		
		lm2[1079]=new Array("市辖区","黄山市");
		
		lm2[1080]=new Array("屯溪区","黄山市");
		
		lm2[1081]=new Array("黄山区","黄山市");
		
		lm2[1082]=new Array("徽州区","黄山市");
		
		lm2[1083]=new Array("歙县","黄山市");
		
		lm2[1084]=new Array("休宁县","黄山市");
		
		lm2[1085]=new Array("黟县","黄山市");
		
		lm2[1086]=new Array("祁门县","黄山市");
		
		lm2[1087]=new Array("市辖区","滁州市");
		
		lm2[1088]=new Array("琅琊区","滁州市");
		
		lm2[1089]=new Array("南谯区","滁州市");
		
		lm2[1090]=new Array("来安县","滁州市");
		
		lm2[1091]=new Array("全椒县","滁州市");
		
		lm2[1092]=new Array("定远县","滁州市");
		
		lm2[1093]=new Array("凤阳县","滁州市");
		
		lm2[1094]=new Array("天长市","滁州市");
		
		lm2[1095]=new Array("明光市","滁州市");
		
		lm2[1096]=new Array("市辖区","阜阳市");
		
		lm2[1097]=new Array("颍州区","阜阳市");
		
		lm2[1098]=new Array("颍东区","阜阳市");
		
		lm2[1099]=new Array("颍泉区","阜阳市");
		
		lm2[1100]=new Array("临泉县","阜阳市");
		
		lm2[1101]=new Array("太和县","阜阳市");
		
		lm2[1102]=new Array("阜南县","阜阳市");
		
		lm2[1103]=new Array("颍上县","阜阳市");
		
		lm2[1104]=new Array("界首市","阜阳市");
		
		lm2[1105]=new Array("市辖区","宿州市");
		
		lm2[1106]=new Array("墉桥区","宿州市");
		
		lm2[1107]=new Array("砀山县","宿州市");
		
		lm2[1108]=new Array("萧县","宿州市");
		
		lm2[1109]=new Array("灵璧县","宿州市");
		
		lm2[1110]=new Array("泗县","宿州市");
		
		lm2[1111]=new Array("市辖区","巢湖市");
		
		lm2[1112]=new Array("居巢区","巢湖市");
		
		lm2[1113]=new Array("庐江县","巢湖市");
		
		lm2[1114]=new Array("无为县","巢湖市");
		
		lm2[1115]=new Array("含山县","巢湖市");
		
		lm2[1116]=new Array("和县","巢湖市");
		
		lm2[1117]=new Array("市辖区","六安市");
		
		lm2[1118]=new Array("金安区","六安市");
		
		lm2[1119]=new Array("裕安区","六安市");
		
		lm2[1120]=new Array("寿县","六安市");
		
		lm2[1121]=new Array("霍邱县","六安市");
		
		lm2[1122]=new Array("舒城县","六安市");
		
		lm2[1123]=new Array("金寨县","六安市");
		
		lm2[1124]=new Array("霍山县","六安市");
		
		lm2[1125]=new Array("市辖区","亳州市");
		
		lm2[1126]=new Array("谯城区","亳州市");
		
		lm2[1127]=new Array("涡阳县","亳州市");
		
		lm2[1128]=new Array("蒙城县","亳州市");
		
		lm2[1129]=new Array("利辛县","亳州市");
		
		lm2[1130]=new Array("市辖区","池州市");
		
		lm2[1131]=new Array("贵池区","池州市");
		
		lm2[1132]=new Array("东至县","池州市");
		
		lm2[1133]=new Array("石台县","池州市");
		
		lm2[1134]=new Array("青阳县","池州市");
		
		lm2[1135]=new Array("市辖区","宣城市");
		
		lm2[1136]=new Array("宣州区","宣城市");
		
		lm2[1137]=new Array("郎溪县","宣城市");
		
		lm2[1138]=new Array("广德县","宣城市");
		
		lm2[1139]=new Array("泾县","宣城市");
		
		lm2[1140]=new Array("绩溪县","宣城市");
		
		lm2[1141]=new Array("旌德县","宣城市");
		
		lm2[1142]=new Array("宁国市","宣城市");
		
		lm2[1143]=new Array("市辖区","福州市");
		
		lm2[1144]=new Array("鼓楼区","福州市");
		
		lm2[1145]=new Array("台江区","福州市");
		
		lm2[1146]=new Array("仓山区","福州市");
		
		lm2[1147]=new Array("马尾区","福州市");
		
		lm2[1148]=new Array("晋安区","福州市");
		
		lm2[1149]=new Array("闽侯县","福州市");
		
		lm2[1150]=new Array("连江县","福州市");
		
		lm2[1151]=new Array("罗源县","福州市");
		
		lm2[1152]=new Array("闽清县","福州市");
		
		lm2[1153]=new Array("永泰县","福州市");
		
		lm2[1154]=new Array("平潭县","福州市");
		
		lm2[1155]=new Array("福清市","福州市");
		
		lm2[1156]=new Array("长乐市","福州市");
		
		lm2[1157]=new Array("市辖区","厦门市");
		
		lm2[1158]=new Array("思明区","厦门市");
		
		lm2[1159]=new Array("海沧区","厦门市");
		
		lm2[1160]=new Array("湖里区","厦门市");
		
		lm2[1161]=new Array("集美区","厦门市");
		
		lm2[1162]=new Array("同安区","厦门市");
		
		lm2[1163]=new Array("翔安区","厦门市");
		
		lm2[1164]=new Array("市辖区","莆田市");
		
		lm2[1165]=new Array("城厢区","莆田市");
		
		lm2[1166]=new Array("涵江区","莆田市");
		
		lm2[1167]=new Array("荔城区","莆田市");
		
		lm2[1168]=new Array("秀屿区","莆田市");
		
		lm2[1169]=new Array("仙游县","莆田市");
		
		lm2[1170]=new Array("市辖区","三明市");
		
		lm2[1171]=new Array("梅列区","三明市");
		
		lm2[1172]=new Array("三元区","三明市");
		
		lm2[1173]=new Array("明溪县","三明市");
		
		lm2[1174]=new Array("清流县","三明市");
		
		lm2[1175]=new Array("宁化县","三明市");
		
		lm2[1176]=new Array("大田县","三明市");
		
		lm2[1177]=new Array("尤溪县","三明市");
		
		lm2[1178]=new Array("沙县","三明市");
		
		lm2[1179]=new Array("将乐县","三明市");
		
		lm2[1180]=new Array("泰宁县","三明市");
		
		lm2[1181]=new Array("建宁县","三明市");
		
		lm2[1182]=new Array("永安市","三明市");
		
		lm2[1183]=new Array("市辖区","泉州市");
		
		lm2[1184]=new Array("鲤城区","泉州市");
		
		lm2[1185]=new Array("丰泽区","泉州市");
		
		lm2[1186]=new Array("洛江区","泉州市");
		
		lm2[1187]=new Array("泉港区","泉州市");
		
		lm2[1188]=new Array("惠安县","泉州市");
		
		lm2[1189]=new Array("安溪县","泉州市");
		
		lm2[1190]=new Array("永春县","泉州市");
		
		lm2[1191]=new Array("德化县","泉州市");
		
		lm2[1192]=new Array("金门县","泉州市");
		
		lm2[1193]=new Array("石狮市","泉州市");
		
		lm2[1194]=new Array("晋江市","泉州市");
		
		lm2[1195]=new Array("南安市","泉州市");
		
		lm2[1196]=new Array("市辖区","漳州市");
		
		lm2[1197]=new Array("芗城区","漳州市");
		
		lm2[1198]=new Array("龙文区","漳州市");
		
		lm2[1199]=new Array("云霄县","漳州市");
		
		lm2[1200]=new Array("漳浦县","漳州市");
		
		lm2[1201]=new Array("诏安县","漳州市");
		
		lm2[1202]=new Array("长泰县","漳州市");
		
		lm2[1203]=new Array("东山县","漳州市");
		
		lm2[1204]=new Array("南靖县","漳州市");
		
		lm2[1205]=new Array("平和县","漳州市");
		
		lm2[1206]=new Array("华安县","漳州市");
		
		lm2[1207]=new Array("龙海市","漳州市");
		
		lm2[1208]=new Array("市辖区","南平市");
		
		lm2[1209]=new Array("延平区","南平市");
		
		lm2[1210]=new Array("顺昌县","南平市");
		
		lm2[1211]=new Array("浦城县","南平市");
		
		lm2[1212]=new Array("光泽县","南平市");
		
		lm2[1213]=new Array("松溪县","南平市");
		
		lm2[1214]=new Array("政和县","南平市");
		
		lm2[1215]=new Array("邵武市","南平市");
		
		lm2[1216]=new Array("武夷山市","南平市");
		
		lm2[1217]=new Array("建瓯市","南平市");
		
		lm2[1218]=new Array("建阳市","南平市");
		
		lm2[1219]=new Array("市辖区","龙岩市");
		
		lm2[1220]=new Array("新罗区","龙岩市");
		
		lm2[1221]=new Array("长汀县","龙岩市");
		
		lm2[1222]=new Array("永定县","龙岩市");
		
		lm2[1223]=new Array("上杭县","龙岩市");
		
		lm2[1224]=new Array("武平县","龙岩市");
		
		lm2[1225]=new Array("连城县","龙岩市");
		
		lm2[1226]=new Array("漳平市","龙岩市");
		
		lm2[1227]=new Array("市辖区","宁德市");
		
		lm2[1228]=new Array("蕉城区","宁德市");
		
		lm2[1229]=new Array("霞浦县","宁德市");
		
		lm2[1230]=new Array("古田县","宁德市");
		
		lm2[1231]=new Array("屏南县","宁德市");
		
		lm2[1232]=new Array("寿宁县","宁德市");
		
		lm2[1233]=new Array("周宁县","宁德市");
		
		lm2[1234]=new Array("柘荣县","宁德市");
		
		lm2[1235]=new Array("福安市","宁德市");
		
		lm2[1236]=new Array("福鼎市","宁德市");
		
		lm2[1237]=new Array("市辖区","南昌市");
		
		lm2[1238]=new Array("东湖区","南昌市");
		
		lm2[1239]=new Array("西湖区","南昌市");
		
		lm2[1240]=new Array("青云谱区","南昌市");
		
		lm2[1241]=new Array("湾里区","南昌市");
		
		lm2[1242]=new Array("青山湖区","南昌市");
		
		lm2[1243]=new Array("南昌县","南昌市");
		
		lm2[1244]=new Array("新建县","南昌市");
		
		lm2[1245]=new Array("安义县","南昌市");
		
		lm2[1246]=new Array("进贤县","南昌市");
		
		lm2[1247]=new Array("市辖区","景德镇市");
		
		lm2[1248]=new Array("昌江区","景德镇市");
		
		lm2[1249]=new Array("珠山区","景德镇市");
		
		lm2[1250]=new Array("浮梁县","景德镇市");
		
		lm2[1251]=new Array("乐平市","景德镇市");
		
		lm2[1252]=new Array("市辖区","萍乡市");
		
		lm2[1253]=new Array("安源区","萍乡市");
		
		lm2[1254]=new Array("湘东区","萍乡市");
		
		lm2[1255]=new Array("莲花县","萍乡市");
		
		lm2[1256]=new Array("上栗县","萍乡市");
		
		lm2[1257]=new Array("芦溪县","萍乡市");
		
		lm2[1258]=new Array("市辖区","九江市");
		
		lm2[1259]=new Array("庐山区","九江市");
		
		lm2[1260]=new Array("浔阳区","九江市");
		
		lm2[1261]=new Array("九江县","九江市");
		
		lm2[1262]=new Array("武宁县","九江市");
		
		lm2[1263]=new Array("修水县","九江市");
		
		lm2[1264]=new Array("永修县","九江市");
		
		lm2[1265]=new Array("德安县","九江市");
		
		lm2[1266]=new Array("星子县","九江市");
		
		lm2[1267]=new Array("都昌县","九江市");
		
		lm2[1268]=new Array("湖口县","九江市");
		
		lm2[1269]=new Array("彭泽县","九江市");
		
		lm2[1270]=new Array("瑞昌市","九江市");
		
		lm2[1271]=new Array("市辖区","新余市");
		
		lm2[1272]=new Array("渝水区","新余市");
		
		lm2[1273]=new Array("分宜县","新余市");
		
		lm2[1274]=new Array("市辖区","鹰潭市");
		
		lm2[1275]=new Array("月湖区","鹰潭市");
		
		lm2[1276]=new Array("余江县","鹰潭市");
		
		lm2[1277]=new Array("贵溪市","鹰潭市");
		
		lm2[1278]=new Array("市辖区","赣州市");
		
		lm2[1279]=new Array("章贡区","赣州市");
		
		lm2[1280]=new Array("赣县","赣州市");
		
		lm2[1281]=new Array("信丰县","赣州市");
		
		lm2[1282]=new Array("大余县","赣州市");
		
		lm2[1283]=new Array("上犹县","赣州市");
		
		lm2[1284]=new Array("崇义县","赣州市");
		
		lm2[1285]=new Array("安远县","赣州市");
		
		lm2[1286]=new Array("龙南县","赣州市");
		
		lm2[1287]=new Array("定南县","赣州市");
		
		lm2[1288]=new Array("全南县","赣州市");
		
		lm2[1289]=new Array("宁都县","赣州市");
		
		lm2[1290]=new Array("于都县","赣州市");
		
		lm2[1291]=new Array("兴国县","赣州市");
		
		lm2[1292]=new Array("会昌县","赣州市");
		
		lm2[1293]=new Array("寻乌县","赣州市");
		
		lm2[1294]=new Array("石城县","赣州市");
		
		lm2[1295]=new Array("瑞金市","赣州市");
		
		lm2[1296]=new Array("南康市","赣州市");
		
		lm2[1297]=new Array("市辖区","吉安市");
		
		lm2[1298]=new Array("吉州区","吉安市");
		
		lm2[1299]=new Array("青原区","吉安市");
		
		lm2[1300]=new Array("吉安县","吉安市");
		
		lm2[1301]=new Array("吉水县","吉安市");
		
		lm2[1302]=new Array("峡江县","吉安市");
		
		lm2[1303]=new Array("新干县","吉安市");
		
		lm2[1304]=new Array("永丰县","吉安市");
		
		lm2[1305]=new Array("泰和县","吉安市");
		
		lm2[1306]=new Array("遂川县","吉安市");
		
		lm2[1307]=new Array("万安县","吉安市");
		
		lm2[1308]=new Array("安福县","吉安市");
		
		lm2[1309]=new Array("永新县","吉安市");
		
		lm2[1310]=new Array("井冈山市","吉安市");
		
		lm2[1311]=new Array("市辖区","宜春市");
		
		lm2[1312]=new Array("袁州区","宜春市");
		
		lm2[1313]=new Array("奉新县","宜春市");
		
		lm2[1314]=new Array("万载县","宜春市");
		
		lm2[1315]=new Array("上高县","宜春市");
		
		lm2[1316]=new Array("宜丰县","宜春市");
		
		lm2[1317]=new Array("靖安县","宜春市");
		
		lm2[1318]=new Array("铜鼓县","宜春市");
		
		lm2[1319]=new Array("丰城市","宜春市");
		
		lm2[1320]=new Array("樟树市","宜春市");
		
		lm2[1321]=new Array("高安市","宜春市");
		
		lm2[1322]=new Array("市辖区","抚州市");
		
		lm2[1323]=new Array("临川区","抚州市");
		
		lm2[1324]=new Array("南城县","抚州市");
		
		lm2[1325]=new Array("黎川县","抚州市");
		
		lm2[1326]=new Array("南丰县","抚州市");
		
		lm2[1327]=new Array("崇仁县","抚州市");
		
		lm2[1328]=new Array("乐安县","抚州市");
		
		lm2[1329]=new Array("宜黄县","抚州市");
		
		lm2[1330]=new Array("金溪县","抚州市");
		
		lm2[1331]=new Array("资溪县","抚州市");
		
		lm2[1332]=new Array("东乡县","抚州市");
		
		lm2[1333]=new Array("广昌县","抚州市");
		
		lm2[1334]=new Array("市辖区","上饶市");
		
		lm2[1335]=new Array("信州区","上饶市");
		
		lm2[1336]=new Array("上饶县","上饶市");
		
		lm2[1337]=new Array("广丰县","上饶市");
		
		lm2[1338]=new Array("玉山县","上饶市");
		
		lm2[1339]=new Array("铅山县","上饶市");
		
		lm2[1340]=new Array("横峰县","上饶市");
		
		lm2[1341]=new Array("弋阳县","上饶市");
		
		lm2[1342]=new Array("余干县","上饶市");
		
		lm2[1343]=new Array("鄱阳县","上饶市");
		
		lm2[1344]=new Array("万年县","上饶市");
		
		lm2[1345]=new Array("婺源县","上饶市");
		
		lm2[1346]=new Array("德兴市","上饶市");
		
		lm2[1347]=new Array("市辖区","济南市");
		
		lm2[1348]=new Array("历下区","济南市");
		
		lm2[1349]=new Array("市中区","济南市");
		
		lm2[1350]=new Array("槐荫区","济南市");
		
		lm2[1351]=new Array("天桥区","济南市");
		
		lm2[1352]=new Array("历城区","济南市");
		
		lm2[1353]=new Array("长清区","济南市");
		
		lm2[1354]=new Array("平阴县","济南市");
		
		lm2[1355]=new Array("济阳县","济南市");
		
		lm2[1356]=new Array("商河县","济南市");
		
		lm2[1357]=new Array("章丘市","济南市");
		
		lm2[1358]=new Array("市辖区","青岛市");
		
		lm2[1359]=new Array("市南区","青岛市");
		
		lm2[1360]=new Array("市北区","青岛市");
		
		lm2[1361]=new Array("四方区","青岛市");
		
		lm2[1362]=new Array("黄岛区","青岛市");
		
		lm2[1363]=new Array("崂山区","青岛市");
		
		lm2[1364]=new Array("李沧区","青岛市");
		
		lm2[1365]=new Array("城阳区","青岛市");
		
		lm2[1366]=new Array("胶州市","青岛市");
		
		lm2[1367]=new Array("即墨市","青岛市");
		
		lm2[1368]=new Array("平度市","青岛市");
		
		lm2[1369]=new Array("胶南市","青岛市");
		
		lm2[1370]=new Array("莱西市","青岛市");
		
		lm2[1371]=new Array("市辖区","淄博市");
		
		lm2[1372]=new Array("淄川区","淄博市");
		
		lm2[1373]=new Array("张店区","淄博市");
		
		lm2[1374]=new Array("博山区","淄博市");
		
		lm2[1375]=new Array("临淄区","淄博市");
		
		lm2[1376]=new Array("周村区","淄博市");
		
		lm2[1377]=new Array("桓台县","淄博市");
		
		lm2[1378]=new Array("高青县","淄博市");
		
		lm2[1379]=new Array("沂源县","淄博市");
		
		lm2[1380]=new Array("市辖区","枣庄市");
		
		lm2[1381]=new Array("市中区","枣庄市");
		
		lm2[1382]=new Array("薛城区","枣庄市");
		
		lm2[1383]=new Array("峄城区","枣庄市");
		
		lm2[1384]=new Array("台儿庄区","枣庄市");
		
		lm2[1385]=new Array("山亭区","枣庄市");
		
		lm2[1386]=new Array("滕州市","枣庄市");
		
		lm2[1387]=new Array("市辖区","东营市");
		
		lm2[1388]=new Array("东营区","东营市");
		
		lm2[1389]=new Array("河口区","东营市");
		
		lm2[1390]=new Array("垦利县","东营市");
		
		lm2[1391]=new Array("利津县","东营市");
		
		lm2[1392]=new Array("广饶县","东营市");
		
		lm2[1393]=new Array("市辖区","烟台市");
		
		lm2[1394]=new Array("芝罘区","烟台市");
		
		lm2[1395]=new Array("福山区","烟台市");
		
		lm2[1396]=new Array("牟平区","烟台市");
		
		lm2[1397]=new Array("莱山区","烟台市");
		
		lm2[1398]=new Array("长岛县","烟台市");
		
		lm2[1399]=new Array("龙口市","烟台市");
		
		lm2[1400]=new Array("莱阳市","烟台市");
		
		lm2[1401]=new Array("莱州市","烟台市");
		
		lm2[1402]=new Array("蓬莱市","烟台市");
		
		lm2[1403]=new Array("招远市","烟台市");
		
		lm2[1404]=new Array("栖霞市","烟台市");
		
		lm2[1405]=new Array("海阳市","烟台市");
		
		lm2[1406]=new Array("市辖区","潍坊市");
		
		lm2[1407]=new Array("潍城区","潍坊市");
		
		lm2[1408]=new Array("寒亭区","潍坊市");
		
		lm2[1409]=new Array("坊子区","潍坊市");
		
		lm2[1410]=new Array("奎文区","潍坊市");
		
		lm2[1411]=new Array("临朐县","潍坊市");
		
		lm2[1412]=new Array("昌乐县","潍坊市");
		
		lm2[1413]=new Array("青州市","潍坊市");
		
		lm2[1414]=new Array("诸城市","潍坊市");
		
		lm2[1415]=new Array("寿光市","潍坊市");
		
		lm2[1416]=new Array("安丘市","潍坊市");
		
		lm2[1417]=new Array("高密市","潍坊市");
		
		lm2[1418]=new Array("昌邑市","潍坊市");
		
		lm2[1419]=new Array("市辖区","济宁市");
		
		lm2[1420]=new Array("市中区","济宁市");
		
		lm2[1421]=new Array("任城区","济宁市");
		
		lm2[1422]=new Array("微山县","济宁市");
		
		lm2[1423]=new Array("鱼台县","济宁市");
		
		lm2[1424]=new Array("金乡县","济宁市");
		
		lm2[1425]=new Array("嘉祥县","济宁市");
		
		lm2[1426]=new Array("汶上县","济宁市");
		
		lm2[1427]=new Array("泗水县","济宁市");
		
		lm2[1428]=new Array("梁山县","济宁市");
		
		lm2[1429]=new Array("曲阜市","济宁市");
		
		lm2[1430]=new Array("兖州市","济宁市");
		
		lm2[1431]=new Array("邹城市","济宁市");
		
		lm2[1432]=new Array("市辖区","泰安市");
		
		lm2[1433]=new Array("泰山区","泰安市");
		
		lm2[1434]=new Array("岱岳区","泰安市");
		
		lm2[1435]=new Array("宁阳县","泰安市");
		
		lm2[1436]=new Array("东平县","泰安市");
		
		lm2[1437]=new Array("新泰市","泰安市");
		
		lm2[1438]=new Array("肥城市","泰安市");
		
		lm2[1439]=new Array("市辖区","威海市");
		
		lm2[1440]=new Array("环翠区","威海市");
		
		lm2[1441]=new Array("文登市","威海市");
		
		lm2[1442]=new Array("荣成市","威海市");
		
		lm2[1443]=new Array("乳山市","威海市");
		
		lm2[1444]=new Array("市辖区","日照市");
		
		lm2[1445]=new Array("东港区","日照市");
		
		lm2[1446]=new Array("岚山区","日照市");
		
		lm2[1447]=new Array("五莲县","日照市");
		
		lm2[1448]=new Array("莒县","日照市");
		
		lm2[1449]=new Array("市辖区","莱芜市");
		
		lm2[1450]=new Array("莱城区","莱芜市");
		
		lm2[1451]=new Array("钢城区","莱芜市");
		
		lm2[1452]=new Array("市辖区","临沂市");
		
		lm2[1453]=new Array("兰山区","临沂市");
		
		lm2[1454]=new Array("罗庄区","临沂市");
		
		lm2[1455]=new Array("河东区","临沂市");
		
		lm2[1456]=new Array("沂南县","临沂市");
		
		lm2[1457]=new Array("郯城县","临沂市");
		
		lm2[1458]=new Array("沂水县","临沂市");
		
		lm2[1459]=new Array("苍山县","临沂市");
		
		lm2[1460]=new Array("费县","临沂市");
		
		lm2[1461]=new Array("平邑县","临沂市");
		
		lm2[1462]=new Array("莒南县","临沂市");
		
		lm2[1463]=new Array("蒙阴县","临沂市");
		
		lm2[1464]=new Array("临沭县","临沂市");
		
		lm2[1465]=new Array("市辖区","德州市");
		
		lm2[1466]=new Array("德城区","德州市");
		
		lm2[1467]=new Array("陵县","德州市");
		
		lm2[1468]=new Array("宁津县","德州市");
		
		lm2[1469]=new Array("庆云县","德州市");
		
		lm2[1470]=new Array("临邑县","德州市");
		
		lm2[1471]=new Array("齐河县","德州市");
		
		lm2[1472]=new Array("平原县","德州市");
		
		lm2[1473]=new Array("夏津县","德州市");
		
		lm2[1474]=new Array("武城县","德州市");
		
		lm2[1475]=new Array("乐陵市","德州市");
		
		lm2[1476]=new Array("禹城市","德州市");
		
		lm2[1477]=new Array("市辖区","聊城市");
		
		lm2[1478]=new Array("东昌府区","聊城市");
		
		lm2[1479]=new Array("阳谷县","聊城市");
		
		lm2[1480]=new Array("莘县","聊城市");
		
		lm2[1481]=new Array("茌平县","聊城市");
		
		lm2[1482]=new Array("东阿县","聊城市");
		
		lm2[1483]=new Array("冠县","聊城市");
		
		lm2[1484]=new Array("高唐县","聊城市");
		
		lm2[1485]=new Array("临清市","聊城市");
		
		lm2[1486]=new Array("市辖区","滨州市");
		
		lm2[1487]=new Array("滨城区","滨州市");
		
		lm2[1488]=new Array("惠民县","滨州市");
		
		lm2[1489]=new Array("阳信县","滨州市");
		
		lm2[1490]=new Array("无棣县","滨州市");
		
		lm2[1491]=new Array("沾化县","滨州市");
		
		lm2[1492]=new Array("博兴县","滨州市");
		
		lm2[1493]=new Array("邹平县","滨州市");
		
		lm2[1494]=new Array("市辖区","荷泽市");
		
		lm2[1495]=new Array("牡丹区","荷泽市");
		
		lm2[1496]=new Array("曹县","荷泽市");
		
		lm2[1497]=new Array("单县","荷泽市");
		
		lm2[1498]=new Array("成武县","荷泽市");
		
		lm2[1499]=new Array("巨野县","荷泽市");
		
		lm2[1500]=new Array("郓城县","荷泽市");
		
		lm2[1501]=new Array("鄄城县","荷泽市");
		
		lm2[1502]=new Array("定陶县","荷泽市");
		
		lm2[1503]=new Array("东明县","荷泽市");
		
		lm2[1504]=new Array("市辖区","郑州市");
		
		lm2[1505]=new Array("中原区","郑州市");
		
		lm2[1506]=new Array("二七区","郑州市");
		
		lm2[1507]=new Array("管城回族区","郑州市");
		
		lm2[1508]=new Array("金水区","郑州市");
		
		lm2[1509]=new Array("上街区","郑州市");
		
		lm2[1510]=new Array("邙山区","郑州市");
		
		lm2[1511]=new Array("中牟县","郑州市");
		
		lm2[1512]=new Array("巩义市","郑州市");
		
		lm2[1513]=new Array("荥阳市","郑州市");
		
		lm2[1514]=new Array("新密市","郑州市");
		
		lm2[1515]=new Array("新郑市","郑州市");
		
		lm2[1516]=new Array("登封市","郑州市");
		
		lm2[1517]=new Array("市辖区","开封市");
		
		lm2[1518]=new Array("龙亭区","开封市");
		
		lm2[1519]=new Array("顺河回族区","开封市");
		
		lm2[1520]=new Array("鼓楼区","开封市");
		
		lm2[1521]=new Array("南关区","开封市");
		
		lm2[1522]=new Array("郊区","开封市");
		
		lm2[1523]=new Array("杞县","开封市");
		
		lm2[1524]=new Array("通许县","开封市");
		
		lm2[1525]=new Array("尉氏县","开封市");
		
		lm2[1526]=new Array("开封县","开封市");
		
		lm2[1527]=new Array("兰考县","开封市");
		
		lm2[1528]=new Array("市辖区","洛阳市");
		
		lm2[1529]=new Array("老城区","洛阳市");
		
		lm2[1530]=new Array("西工区","洛阳市");
		
		lm2[1531]=new Array("廛河回族区","洛阳市");
		
		lm2[1532]=new Array("涧西区","洛阳市");
		
		lm2[1533]=new Array("吉利区","洛阳市");
		
		lm2[1534]=new Array("洛龙区","洛阳市");
		
		lm2[1535]=new Array("孟津县","洛阳市");
		
		lm2[1536]=new Array("新安县","洛阳市");
		
		lm2[1537]=new Array("栾川县","洛阳市");
		
		lm2[1538]=new Array("嵩县","洛阳市");
		
		lm2[1539]=new Array("汝阳县","洛阳市");
		
		lm2[1540]=new Array("宜阳县","洛阳市");
		
		lm2[1541]=new Array("洛宁县","洛阳市");
		
		lm2[1542]=new Array("伊川县","洛阳市");
		
		lm2[1543]=new Array("偃师市","洛阳市");
		
		lm2[1544]=new Array("市辖区","平顶山市");
		
		lm2[1545]=new Array("新华区","平顶山市");
		
		lm2[1546]=new Array("卫东区","平顶山市");
		
		lm2[1547]=new Array("石龙区","平顶山市");
		
		lm2[1548]=new Array("湛河区","平顶山市");
		
		lm2[1549]=new Array("宝丰县","平顶山市");
		
		lm2[1550]=new Array("叶县","平顶山市");
		
		lm2[1551]=new Array("鲁山县","平顶山市");
		
		lm2[1552]=new Array("郏县","平顶山市");
		
		lm2[1553]=new Array("舞钢市","平顶山市");
		
		lm2[1554]=new Array("汝州市","平顶山市");
		
		lm2[1555]=new Array("市辖区","安阳市");
		
		lm2[1556]=new Array("文峰区","安阳市");
		
		lm2[1557]=new Array("北关区","安阳市");
		
		lm2[1558]=new Array("殷都区","安阳市");
		
		lm2[1559]=new Array("龙安区","安阳市");
		
		lm2[1560]=new Array("安阳县","安阳市");
		
		lm2[1561]=new Array("汤阴县","安阳市");
		
		lm2[1562]=new Array("滑县","安阳市");
		
		lm2[1563]=new Array("内黄县","安阳市");
		
		lm2[1564]=new Array("林州市","安阳市");
		
		lm2[1565]=new Array("市辖区","鹤壁市");
		
		lm2[1566]=new Array("鹤山区","鹤壁市");
		
		lm2[1567]=new Array("山城区","鹤壁市");
		
		lm2[1568]=new Array("淇滨区","鹤壁市");
		
		lm2[1569]=new Array("浚县","鹤壁市");
		
		lm2[1570]=new Array("淇县","鹤壁市");
		
		lm2[1571]=new Array("市辖区","新乡市");
		
		lm2[1572]=new Array("红旗区","新乡市");
		
		lm2[1573]=new Array("卫滨区","新乡市");
		
		lm2[1574]=new Array("凤泉区","新乡市");
		
		lm2[1575]=new Array("牧野区","新乡市");
		
		lm2[1576]=new Array("新乡县","新乡市");
		
		lm2[1577]=new Array("获嘉县","新乡市");
		
		lm2[1578]=new Array("原阳县","新乡市");
		
		lm2[1579]=new Array("延津县","新乡市");
		
		lm2[1580]=new Array("封丘县","新乡市");
		
		lm2[1581]=new Array("长垣县","新乡市");
		
		lm2[1582]=new Array("卫辉市","新乡市");
		
		lm2[1583]=new Array("辉县市","新乡市");
		
		lm2[1584]=new Array("市辖区","焦作市");
		
		lm2[1585]=new Array("解放区","焦作市");
		
		lm2[1586]=new Array("中站区","焦作市");
		
		lm2[1587]=new Array("马村区","焦作市");
		
		lm2[1588]=new Array("山阳区","焦作市");
		
		lm2[1589]=new Array("修武县","焦作市");
		
		lm2[1590]=new Array("博爱县","焦作市");
		
		lm2[1591]=new Array("武陟县","焦作市");
		
		lm2[1592]=new Array("温县","焦作市");
		
		lm2[1593]=new Array("济源市","焦作市");
		
		lm2[1594]=new Array("沁阳市","焦作市");
		
		lm2[1595]=new Array("孟州市","焦作市");
		
		lm2[1596]=new Array("市辖区","濮阳市");
		
		lm2[1597]=new Array("华龙区","濮阳市");
		
		lm2[1598]=new Array("清丰县","濮阳市");
		
		lm2[1599]=new Array("南乐县","濮阳市");
		
		lm2[1600]=new Array("范县","濮阳市");
		
		lm2[1601]=new Array("台前县","濮阳市");
		
		lm2[1602]=new Array("濮阳县","濮阳市");
		
		lm2[1603]=new Array("市辖区","许昌市");
		
		lm2[1604]=new Array("魏都区","许昌市");
		
		lm2[1605]=new Array("许昌县","许昌市");
		
		lm2[1606]=new Array("鄢陵县","许昌市");
		
		lm2[1607]=new Array("襄城县","许昌市");
		
		lm2[1608]=new Array("禹州市","许昌市");
		
		lm2[1609]=new Array("长葛市","许昌市");
		
		lm2[1610]=new Array("市辖区","漯河市");
		
		lm2[1611]=new Array("源汇区","漯河市");
		
		lm2[1612]=new Array("郾城区","漯河市");
		
		lm2[1613]=new Array("召陵区","漯河市");
		
		lm2[1614]=new Array("舞阳县","漯河市");
		
		lm2[1615]=new Array("临颍县","漯河市");
		
		lm2[1616]=new Array("市辖区","三门峡市");
		
		lm2[1617]=new Array("湖滨区","三门峡市");
		
		lm2[1618]=new Array("渑池县","三门峡市");
		
		lm2[1619]=new Array("陕县","三门峡市");
		
		lm2[1620]=new Array("卢氏县","三门峡市");
		
		lm2[1621]=new Array("义马市","三门峡市");
		
		lm2[1622]=new Array("灵宝市","三门峡市");
		
		lm2[1623]=new Array("市辖区","南阳市");
		
		lm2[1624]=new Array("宛城区","南阳市");
		
		lm2[1625]=new Array("卧龙区","南阳市");
		
		lm2[1626]=new Array("南召县","南阳市");
		
		lm2[1627]=new Array("方城县","南阳市");
		
		lm2[1628]=new Array("西峡县","南阳市");
		
		lm2[1629]=new Array("镇平县","南阳市");
		
		lm2[1630]=new Array("内乡县","南阳市");
		
		lm2[1631]=new Array("淅川县","南阳市");
		
		lm2[1632]=new Array("社旗县","南阳市");
		
		lm2[1633]=new Array("唐河县","南阳市");
		
		lm2[1634]=new Array("新野县","南阳市");
		
		lm2[1635]=new Array("桐柏县","南阳市");
		
		lm2[1636]=new Array("邓州市","南阳市");
		
		lm2[1637]=new Array("市辖区","商丘市");
		
		lm2[1638]=new Array("梁园区","商丘市");
		
		lm2[1639]=new Array("睢阳区","商丘市");
		
		lm2[1640]=new Array("民权县","商丘市");
		
		lm2[1641]=new Array("睢县","商丘市");
		
		lm2[1642]=new Array("宁陵县","商丘市");
		
		lm2[1643]=new Array("柘城县","商丘市");
		
		lm2[1644]=new Array("虞城县","商丘市");
		
		lm2[1645]=new Array("夏邑县","商丘市");
		
		lm2[1646]=new Array("永城市","商丘市");
		
		lm2[1647]=new Array("市辖区","信阳市");
		
		lm2[1648]=new Array("师河区","信阳市");
		
		lm2[1649]=new Array("平桥区","信阳市");
		
		lm2[1650]=new Array("罗山县","信阳市");
		
		lm2[1651]=new Array("光山县","信阳市");
		
		lm2[1652]=new Array("新县","信阳市");
		
		lm2[1653]=new Array("商城县","信阳市");
		
		lm2[1654]=new Array("固始县","信阳市");
		
		lm2[1655]=new Array("潢川县","信阳市");
		
		lm2[1656]=new Array("淮滨县","信阳市");
		
		lm2[1657]=new Array("息县","信阳市");
		
		lm2[1658]=new Array("市辖区","周口市");
		
		lm2[1659]=new Array("川汇区","周口市");
		
		lm2[1660]=new Array("扶沟县","周口市");
		
		lm2[1661]=new Array("西华县","周口市");
		
		lm2[1662]=new Array("商水县","周口市");
		
		lm2[1663]=new Array("沈丘县","周口市");
		
		lm2[1664]=new Array("郸城县","周口市");
		
		lm2[1665]=new Array("淮阳县","周口市");
		
		lm2[1666]=new Array("太康县","周口市");
		
		lm2[1667]=new Array("鹿邑县","周口市");
		
		lm2[1668]=new Array("项城市","周口市");
		
		lm2[1669]=new Array("市辖区","驻马店市");
		
		lm2[1670]=new Array("驿城区","驻马店市");
		
		lm2[1671]=new Array("西平县","驻马店市");
		
		lm2[1672]=new Array("上蔡县","驻马店市");
		
		lm2[1673]=new Array("平舆县","驻马店市");
		
		lm2[1674]=new Array("正阳县","驻马店市");
		
		lm2[1675]=new Array("确山县","驻马店市");
		
		lm2[1676]=new Array("泌阳县","驻马店市");
		
		lm2[1677]=new Array("汝南县","驻马店市");
		
		lm2[1678]=new Array("遂平县","驻马店市");
		
		lm2[1679]=new Array("新蔡县","驻马店市");
		
		lm2[1680]=new Array("市辖区","武汉市");
		
		lm2[1681]=new Array("江岸区","武汉市");
		
		lm2[1682]=new Array("江汉区","武汉市");
		
		lm2[1683]=new Array("乔口区","武汉市");
		
		lm2[1684]=new Array("汉阳区","武汉市");
		
		lm2[1685]=new Array("武昌区","武汉市");
		
		lm2[1686]=new Array("青山区","武汉市");
		
		lm2[1687]=new Array("洪山区","武汉市");
		
		lm2[1688]=new Array("东西湖区","武汉市");
		
		lm2[1689]=new Array("汉南区","武汉市");
		
		lm2[1690]=new Array("蔡甸区","武汉市");
		
		lm2[1691]=new Array("江夏区","武汉市");
		
		lm2[1692]=new Array("黄陂区","武汉市");
		
		lm2[1693]=new Array("新洲区","武汉市");
		
		lm2[1694]=new Array("市辖区","黄石市");
		
		lm2[1695]=new Array("黄石港区","黄石市");
		
		lm2[1696]=new Array("西塞山区","黄石市");
		
		lm2[1697]=new Array("下陆区","黄石市");
		
		lm2[1698]=new Array("铁山区","黄石市");
		
		lm2[1699]=new Array("阳新县","黄石市");
		
		lm2[1700]=new Array("大冶市","黄石市");
		
		lm2[1701]=new Array("市辖区","十堰市");
		
		lm2[1702]=new Array("茅箭区","十堰市");
		
		lm2[1703]=new Array("张湾区","十堰市");
		
		lm2[1704]=new Array("郧县","十堰市");
		
		lm2[1705]=new Array("郧西县","十堰市");
		
		lm2[1706]=new Array("竹山县","十堰市");
		
		lm2[1707]=new Array("竹溪县","十堰市");
		
		lm2[1708]=new Array("房县","十堰市");
		
		lm2[1709]=new Array("丹江口市","十堰市");
		
		lm2[1710]=new Array("市辖区","宜昌市");
		
		lm2[1711]=new Array("西陵区","宜昌市");
		
		lm2[1712]=new Array("伍家岗区","宜昌市");
		
		lm2[1713]=new Array("点军区","宜昌市");
		
		lm2[1714]=new Array("猇亭区","宜昌市");
		
		lm2[1715]=new Array("夷陵区","宜昌市");
		
		lm2[1716]=new Array("远安县","宜昌市");
		
		lm2[1717]=new Array("兴山县","宜昌市");
		
		lm2[1718]=new Array("秭归县","宜昌市");
		
		lm2[1719]=new Array("长阳土家族自治县","宜昌市");
		
		lm2[1720]=new Array("五峰土家族自治县","宜昌市");
		
		lm2[1721]=new Array("宜都市","宜昌市");
		
		lm2[1722]=new Array("当阳市","宜昌市");
		
		lm2[1723]=new Array("枝江市","宜昌市");
		
		lm2[1724]=new Array("市辖区","襄樊市");
		
		lm2[1725]=new Array("襄城区","襄樊市");
		
		lm2[1726]=new Array("樊城区","襄樊市");
		
		lm2[1727]=new Array("襄阳区","襄樊市");
		
		lm2[1728]=new Array("南漳县","襄樊市");
		
		lm2[1729]=new Array("谷城县","襄樊市");
		
		lm2[1730]=new Array("保康县","襄樊市");
		
		lm2[1731]=new Array("老河口市","襄樊市");
		
		lm2[1732]=new Array("枣阳市","襄樊市");
		
		lm2[1733]=new Array("宜城市","襄樊市");
		
		lm2[1734]=new Array("市辖区","鄂州市");
		
		lm2[1735]=new Array("梁子湖区","鄂州市");
		
		lm2[1736]=new Array("华容区","鄂州市");
		
		lm2[1737]=new Array("鄂城区","鄂州市");
		
		lm2[1738]=new Array("市辖区","荆门市");
		
		lm2[1739]=new Array("东宝区","荆门市");
		
		lm2[1740]=new Array("掇刀区","荆门市");
		
		lm2[1741]=new Array("京山县","荆门市");
		
		lm2[1742]=new Array("沙洋县","荆门市");
		
		lm2[1743]=new Array("钟祥市","荆门市");
		
		lm2[1744]=new Array("市辖区","孝感市");
		
		lm2[1745]=new Array("孝南区","孝感市");
		
		lm2[1746]=new Array("孝昌县","孝感市");
		
		lm2[1747]=new Array("大悟县","孝感市");
		
		lm2[1748]=new Array("云梦县","孝感市");
		
		lm2[1749]=new Array("应城市","孝感市");
		
		lm2[1750]=new Array("安陆市","孝感市");
		
		lm2[1751]=new Array("汉川市","孝感市");
		
		lm2[1752]=new Array("市辖区","荆州市");
		
		lm2[1753]=new Array("沙市区","荆州市");
		
		lm2[1754]=new Array("荆州区","荆州市");
		
		lm2[1755]=new Array("公安县","荆州市");
		
		lm2[1756]=new Array("监利县","荆州市");
		
		lm2[1757]=new Array("江陵县","荆州市");
		
		lm2[1758]=new Array("石首市","荆州市");
		
		lm2[1759]=new Array("洪湖市","荆州市");
		
		lm2[1760]=new Array("松滋市","荆州市");
		
		lm2[1761]=new Array("市辖区","黄冈市");
		
		lm2[1762]=new Array("黄州区","黄冈市");
		
		lm2[1763]=new Array("团风县","黄冈市");
		
		lm2[1764]=new Array("红安县","黄冈市");
		
		lm2[1765]=new Array("罗田县","黄冈市");
		
		lm2[1766]=new Array("英山县","黄冈市");
		
		lm2[1767]=new Array("浠水县","黄冈市");
		
		lm2[1768]=new Array("蕲春县","黄冈市");
		
		lm2[1769]=new Array("黄梅县","黄冈市");
		
		lm2[1770]=new Array("麻城市","黄冈市");
		
		lm2[1771]=new Array("武穴市","黄冈市");
		
		lm2[1772]=new Array("市辖区","咸宁市");
		
		lm2[1773]=new Array("咸安区","咸宁市");
		
		lm2[1774]=new Array("嘉鱼县","咸宁市");
		
		lm2[1775]=new Array("通城县","咸宁市");
		
		lm2[1776]=new Array("崇阳县","咸宁市");
		
		lm2[1777]=new Array("通山县","咸宁市");
		
		lm2[1778]=new Array("赤壁市","咸宁市");
		
		lm2[1779]=new Array("市辖区","随州市");
		
		lm2[1780]=new Array("曾都区","随州市");
		
		lm2[1781]=new Array("广水市","随州市");
		
		lm2[1782]=new Array("恩施市","恩施自治州");
		
		lm2[1783]=new Array("利川市","恩施自治州");
		
		lm2[1784]=new Array("建始县","恩施自治州");
		
		lm2[1785]=new Array("巴东县","恩施自治州");
		
		lm2[1786]=new Array("宣恩县","恩施自治州");
		
		lm2[1787]=new Array("咸丰县","恩施自治州");
		
		lm2[1788]=new Array("来凤县","恩施自治州");
		
		lm2[1789]=new Array("鹤峰县","恩施自治州");
		
		lm2[1790]=new Array("仙桃市","湖北省辖单位");
		
		lm2[1791]=new Array("潜江市","湖北省辖单位");
		
		lm2[1792]=new Array("天门市","湖北省辖单位");
		
		lm2[1793]=new Array("神农架林区","湖北省辖单位");
		
		lm2[1794]=new Array("市辖区","长沙市");
		
		lm2[1795]=new Array("芙蓉区","长沙市");
		
		lm2[1796]=new Array("天心区","长沙市");
		
		lm2[1797]=new Array("岳麓区","长沙市");
		
		lm2[1798]=new Array("开福区","长沙市");
		
		lm2[1799]=new Array("雨花区","长沙市");
		
		lm2[1800]=new Array("长沙县","长沙市");
		
		lm2[1801]=new Array("望城县","长沙市");
		
		lm2[1802]=new Array("宁乡县","长沙市");
		
		lm2[1803]=new Array("浏阳市","长沙市");
		
		lm2[1804]=new Array("市辖区","株洲市");
		
		lm2[1805]=new Array("荷塘区","株洲市");
		
		lm2[1806]=new Array("芦淞区","株洲市");
		
		lm2[1807]=new Array("石峰区","株洲市");
		
		lm2[1808]=new Array("天元区","株洲市");
		
		lm2[1809]=new Array("株洲县","株洲市");
		
		lm2[1810]=new Array("攸县","株洲市");
		
		lm2[1811]=new Array("茶陵县","株洲市");
		
		lm2[1812]=new Array("炎陵县","株洲市");
		
		lm2[1813]=new Array("醴陵市","株洲市");
		
		lm2[1814]=new Array("市辖区","湘潭市");
		
		lm2[1815]=new Array("雨湖区","湘潭市");
		
		lm2[1816]=new Array("岳塘区","湘潭市");
		
		lm2[1817]=new Array("湘潭县","湘潭市");
		
		lm2[1818]=new Array("湘乡市","湘潭市");
		
		lm2[1819]=new Array("韶山市","湘潭市");
		
		lm2[1820]=new Array("市辖区","衡阳市");
		
		lm2[1821]=new Array("珠晖区","衡阳市");
		
		lm2[1822]=new Array("雁峰区","衡阳市");
		
		lm2[1823]=new Array("石鼓区","衡阳市");
		
		lm2[1824]=new Array("蒸湘区","衡阳市");
		
		lm2[1825]=new Array("南岳区","衡阳市");
		
		lm2[1826]=new Array("衡阳县","衡阳市");
		
		lm2[1827]=new Array("衡南县","衡阳市");
		
		lm2[1828]=new Array("衡山县","衡阳市");
		
		lm2[1829]=new Array("衡东县","衡阳市");
		
		lm2[1830]=new Array("祁东县","衡阳市");
		
		lm2[1831]=new Array("耒阳市","衡阳市");
		
		lm2[1832]=new Array("常宁市","衡阳市");
		
		lm2[1833]=new Array("市辖区","邵阳市");
		
		lm2[1834]=new Array("双清区","邵阳市");
		
		lm2[1835]=new Array("大祥区","邵阳市");
		
		lm2[1836]=new Array("北塔区","邵阳市");
		
		lm2[1837]=new Array("邵东县","邵阳市");
		
		lm2[1838]=new Array("新邵县","邵阳市");
		
		lm2[1839]=new Array("邵阳县","邵阳市");
		
		lm2[1840]=new Array("隆回县","邵阳市");
		
		lm2[1841]=new Array("洞口县","邵阳市");
		
		lm2[1842]=new Array("绥宁县","邵阳市");
		
		lm2[1843]=new Array("新宁县","邵阳市");
		
		lm2[1844]=new Array("城步苗族自治县","邵阳市");
		
		lm2[1845]=new Array("武冈市","邵阳市");
		
		lm2[1846]=new Array("市辖区","岳阳市");
		
		lm2[1847]=new Array("岳阳楼区","岳阳市");
		
		lm2[1848]=new Array("云溪区","岳阳市");
		
		lm2[1849]=new Array("君山区","岳阳市");
		
		lm2[1850]=new Array("岳阳县","岳阳市");
		
		lm2[1851]=new Array("华容县","岳阳市");
		
		lm2[1852]=new Array("湘阴县","岳阳市");
		
		lm2[1853]=new Array("平江县","岳阳市");
		
		lm2[1854]=new Array("汨罗市","岳阳市");
		
		lm2[1855]=new Array("临湘市","岳阳市");
		
		lm2[1856]=new Array("市辖区","常德市");
		
		lm2[1857]=new Array("武陵区","常德市");
		
		lm2[1858]=new Array("鼎城区","常德市");
		
		lm2[1859]=new Array("安乡县","常德市");
		
		lm2[1860]=new Array("汉寿县","常德市");
		
		lm2[1861]=new Array("澧县","常德市");
		
		lm2[1862]=new Array("临澧县","常德市");
		
		lm2[1863]=new Array("桃源县","常德市");
		
		lm2[1864]=new Array("石门县","常德市");
		
		lm2[1865]=new Array("津市市","常德市");
		
		lm2[1866]=new Array("市辖区","张家界市");
		
		lm2[1867]=new Array("永定区","张家界市");
		
		lm2[1868]=new Array("武陵源区","张家界市");
		
		lm2[1869]=new Array("慈利县","张家界市");
		
		lm2[1870]=new Array("桑植县","张家界市");
		
		lm2[1871]=new Array("市辖区","益阳市");
		
		lm2[1872]=new Array("资阳区","益阳市");
		
		lm2[1873]=new Array("赫山区","益阳市");
		
		lm2[1874]=new Array("南县","益阳市");
		
		lm2[1875]=new Array("桃江县","益阳市");
		
		lm2[1876]=new Array("安化县","益阳市");
		
		lm2[1877]=new Array("沅江市","益阳市");
		
		lm2[1878]=new Array("市辖区","郴州市");
		
		lm2[1879]=new Array("北湖区","郴州市");
		
		lm2[1880]=new Array("苏仙区","郴州市");
		
		lm2[1881]=new Array("桂阳县","郴州市");
		
		lm2[1882]=new Array("宜章县","郴州市");
		
		lm2[1883]=new Array("永兴县","郴州市");
		
		lm2[1884]=new Array("嘉禾县","郴州市");
		
		lm2[1885]=new Array("临武县","郴州市");
		
		lm2[1886]=new Array("汝城县","郴州市");
		
		lm2[1887]=new Array("桂东县","郴州市");
		
		lm2[1888]=new Array("安仁县","郴州市");
		
		lm2[1889]=new Array("资兴市","郴州市");
		
		lm2[1890]=new Array("市辖区","永州市");
		
		lm2[1891]=new Array("芝山区","永州市");
		
		lm2[1892]=new Array("冷水滩区","永州市");
		
		lm2[1893]=new Array("祁阳县","永州市");
		
		lm2[1894]=new Array("东安县","永州市");
		
		lm2[1895]=new Array("双牌县","永州市");
		
		lm2[1896]=new Array("道县","永州市");
		
		lm2[1897]=new Array("江永县","永州市");
		
		lm2[1898]=new Array("宁远县","永州市");
		
		lm2[1899]=new Array("蓝山县","永州市");
		
		lm2[1900]=new Array("新田县","永州市");
		
		lm2[1901]=new Array("江华瑶族自治县","永州市");
		
		lm2[1902]=new Array("市辖区","怀化市");
		
		lm2[1903]=new Array("鹤城区","怀化市");
		
		lm2[1904]=new Array("中方县","怀化市");
		
		lm2[1905]=new Array("沅陵县","怀化市");
		
		lm2[1906]=new Array("辰溪县","怀化市");
		
		lm2[1907]=new Array("溆浦县","怀化市");
		
		lm2[1908]=new Array("会同县","怀化市");
		
		lm2[1909]=new Array("麻阳苗族自治县","怀化市");
		
		lm2[1910]=new Array("新晃侗族自治县","怀化市");
		
		lm2[1911]=new Array("芷江侗族自治县","怀化市");
		
		lm2[1912]=new Array("靖州苗族侗族自治县","怀化市");
		
		lm2[1913]=new Array("通道侗族自治县","怀化市");
		
		lm2[1914]=new Array("洪江市","怀化市");
		
		lm2[1915]=new Array("市辖区","娄底市");
		
		lm2[1916]=new Array("娄星区","娄底市");
		
		lm2[1917]=new Array("双峰县","娄底市");
		
		lm2[1918]=new Array("新化县","娄底市");
		
		lm2[1919]=new Array("冷水江市","娄底市");
		
		lm2[1920]=new Array("涟源市","娄底市");
		
		lm2[1921]=new Array("吉首市","湘西自治州");
		
		lm2[1922]=new Array("泸溪县","湘西自治州");
		
		lm2[1923]=new Array("凤凰县","湘西自治州");
		
		lm2[1924]=new Array("花垣县","湘西自治州");
		
		lm2[1925]=new Array("保靖县","湘西自治州");
		
		lm2[1926]=new Array("古丈县","湘西自治州");
		
		lm2[1927]=new Array("永顺县","湘西自治州");
		
		lm2[1928]=new Array("龙山县","湘西自治州");
		
		lm2[1929]=new Array("市辖区","广州市");
		
		lm2[1930]=new Array("东山区","广州市");
		
		lm2[1931]=new Array("荔湾区","广州市");
		
		lm2[1932]=new Array("越秀区","广州市");
		
		lm2[1933]=new Array("海珠区","广州市");
		
		lm2[1934]=new Array("天河区","广州市");
		
		lm2[1935]=new Array("芳村区","广州市");
		
		lm2[1936]=new Array("白云区","广州市");
		
		lm2[1937]=new Array("黄埔区","广州市");
		
		lm2[1938]=new Array("番禺区","广州市");
		
		lm2[1939]=new Array("花都区","广州市");
		
		lm2[1940]=new Array("增城市","广州市");
		
		lm2[1941]=new Array("从化市","广州市");
		
		lm2[1942]=new Array("市辖区","韶关市");
		
		lm2[1943]=new Array("武江区","韶关市");
		
		lm2[1944]=new Array("浈江区","韶关市");
		
		lm2[1945]=new Array("曲江区","韶关市");
		
		lm2[1946]=new Array("始兴县","韶关市");
		
		lm2[1947]=new Array("仁化县","韶关市");
		
		lm2[1948]=new Array("翁源县","韶关市");
		
		lm2[1949]=new Array("乳源瑶族自治县","韶关市");
		
		lm2[1950]=new Array("新丰县","韶关市");
		
		lm2[1951]=new Array("乐昌市","韶关市");
		
		lm2[1952]=new Array("南雄市","韶关市");
		
		lm2[1953]=new Array("市辖区","深圳市");
		
		lm2[1954]=new Array("罗湖区","深圳市");
		
		lm2[1955]=new Array("福田区","深圳市");
		
		lm2[1956]=new Array("南山区","深圳市");
		
		lm2[1957]=new Array("宝安区","深圳市");
		
		lm2[1958]=new Array("龙岗区","深圳市");
		
		lm2[1959]=new Array("盐田区","深圳市");
		
		lm2[1960]=new Array("市辖区","珠海市");
		
		lm2[1961]=new Array("香洲区","珠海市");
		
		lm2[1962]=new Array("斗门区","珠海市");
		
		lm2[1963]=new Array("金湾区","珠海市");
		
		lm2[1964]=new Array("市辖区","汕头市");
		
		lm2[1965]=new Array("龙湖区","汕头市");
		
		lm2[1966]=new Array("金平区","汕头市");
		
		lm2[1967]=new Array("濠江区","汕头市");
		
		lm2[1968]=new Array("潮阳区","汕头市");
		
		lm2[1969]=new Array("潮南区","汕头市");
		
		lm2[1970]=new Array("澄海区","汕头市");
		
		lm2[1971]=new Array("南澳县","汕头市");
		
		lm2[1972]=new Array("市辖区","佛山市");
		
		lm2[1973]=new Array("禅城区","佛山市");
		
		lm2[1974]=new Array("南海区","佛山市");
		
		lm2[1975]=new Array("顺德区","佛山市");
		
		lm2[1976]=new Array("三水区","佛山市");
		
		lm2[1977]=new Array("高明区","佛山市");
		
		lm2[1978]=new Array("市辖区","江门市");
		
		lm2[1979]=new Array("蓬江区","江门市");
		
		lm2[1980]=new Array("江海区","江门市");
		
		lm2[1981]=new Array("新会区","江门市");
		
		lm2[1982]=new Array("台山市","江门市");
		
		lm2[1983]=new Array("开平市","江门市");
		
		lm2[1984]=new Array("鹤山市","江门市");
		
		lm2[1985]=new Array("恩平市","江门市");
		
		lm2[1986]=new Array("市辖区","湛江市");
		
		lm2[1987]=new Array("赤坎区","湛江市");
		
		lm2[1988]=new Array("霞山区","湛江市");
		
		lm2[1989]=new Array("坡头区","湛江市");
		
		lm2[1990]=new Array("麻章区","湛江市");
		
		lm2[1991]=new Array("遂溪县","湛江市");
		
		lm2[1992]=new Array("徐闻县","湛江市");
		
		lm2[1993]=new Array("廉江市","湛江市");
		
		lm2[1994]=new Array("雷州市","湛江市");
		
		lm2[1995]=new Array("吴川市","湛江市");
		
		lm2[1996]=new Array("市辖区","茂名市");
		
		lm2[1997]=new Array("茂南区","茂名市");
		
		lm2[1998]=new Array("茂港区","茂名市");
		
		lm2[1999]=new Array("电白县","茂名市");
		
		lm2[2000]=new Array("高州市","茂名市");
		
		lm2[2001]=new Array("化州市","茂名市");
		
		lm2[2002]=new Array("信宜市","茂名市");
		
		lm2[2003]=new Array("市辖区","肇庆市");
		
		lm2[2004]=new Array("端州区","肇庆市");
		
		lm2[2005]=new Array("鼎湖区","肇庆市");
		
		lm2[2006]=new Array("广宁县","肇庆市");
		
		lm2[2007]=new Array("怀集县","肇庆市");
		
		lm2[2008]=new Array("封开县","肇庆市");
		
		lm2[2009]=new Array("德庆县","肇庆市");
		
		lm2[2010]=new Array("高要市","肇庆市");
		
		lm2[2011]=new Array("四会市","肇庆市");
		
		lm2[2012]=new Array("市辖区","惠州市");
		
		lm2[2013]=new Array("惠城区","惠州市");
		
		lm2[2014]=new Array("惠阳区","惠州市");
		
		lm2[2015]=new Array("博罗县","惠州市");
		
		lm2[2016]=new Array("惠东县","惠州市");
		
		lm2[2017]=new Array("龙门县","惠州市");
		
		lm2[2018]=new Array("市辖区","梅州市");
		
		lm2[2019]=new Array("梅江区","梅州市");
		
		lm2[2020]=new Array("梅县","梅州市");
		
		lm2[2021]=new Array("大埔县","梅州市");
		
		lm2[2022]=new Array("丰顺县","梅州市");
		
		lm2[2023]=new Array("五华县","梅州市");
		
		lm2[2024]=new Array("平远县","梅州市");
		
		lm2[2025]=new Array("蕉岭县","梅州市");
		
		lm2[2026]=new Array("兴宁市","梅州市");
		
		lm2[2027]=new Array("市辖区","汕尾市");
		
		lm2[2028]=new Array("城区","汕尾市");
		
		lm2[2029]=new Array("海丰县","汕尾市");
		
		lm2[2030]=new Array("陆河县","汕尾市");
		
		lm2[2031]=new Array("陆丰市","汕尾市");
		
		lm2[2032]=new Array("市辖区","河源市");
		
		lm2[2033]=new Array("源城区","河源市");
		
		lm2[2034]=new Array("紫金县","河源市");
		
		lm2[2035]=new Array("龙川县","河源市");
		
		lm2[2036]=new Array("连平县","河源市");
		
		lm2[2037]=new Array("和平县","河源市");
		
		lm2[2038]=new Array("东源县","河源市");
		
		lm2[2039]=new Array("市辖区","阳江市");
		
		lm2[2040]=new Array("江城区","阳江市");
		
		lm2[2041]=new Array("阳西县","阳江市");
		
		lm2[2042]=new Array("阳东县","阳江市");
		
		lm2[2043]=new Array("阳春市","阳江市");
		
		lm2[2044]=new Array("市辖区","清远市");
		
		lm2[2045]=new Array("清城区","清远市");
		
		lm2[2046]=new Array("佛冈县","清远市");
		
		lm2[2047]=new Array("阳山县","清远市");
		
		lm2[2048]=new Array("连山壮族瑶族自治县","清远市");
		
		lm2[2049]=new Array("连南瑶族自治县","清远市");
		
		lm2[2050]=new Array("清新县","清远市");
		
		lm2[2051]=new Array("英德市","清远市");
		
		lm2[2052]=new Array("连州市","清远市");
		
		lm2[2053]=new Array("市辖区","潮州市");
		
		lm2[2054]=new Array("湘桥区","潮州市");
		
		lm2[2055]=new Array("潮安县","潮州市");
		
		lm2[2056]=new Array("饶平县","潮州市");
		
		lm2[2057]=new Array("市辖区","揭阳市");
		
		lm2[2058]=new Array("榕城区","揭阳市");
		
		lm2[2059]=new Array("揭东县","揭阳市");
		
		lm2[2060]=new Array("揭西县","揭阳市");
		
		lm2[2061]=new Array("惠来县","揭阳市");
		
		lm2[2062]=new Array("普宁市","揭阳市");
		
		lm2[2063]=new Array("市辖区","云浮市");
		
		lm2[2064]=new Array("云城区","云浮市");
		
		lm2[2065]=new Array("新兴县","云浮市");
		
		lm2[2066]=new Array("郁南县","云浮市");
		
		lm2[2067]=new Array("云安县","云浮市");
		
		lm2[2068]=new Array("罗定市","云浮市");
		
		lm2[2069]=new Array("市辖区","南宁市");
		
		lm2[2070]=new Array("兴宁区","南宁市");
		
		lm2[2071]=new Array("青秀区","南宁市");
		
		lm2[2072]=new Array("江南区","南宁市");
		
		lm2[2073]=new Array("西乡塘区","南宁市");
		
		lm2[2074]=new Array("良庆区","南宁市");
		
		lm2[2075]=new Array("邕宁区","南宁市");
		
		lm2[2076]=new Array("武鸣县","南宁市");
		
		lm2[2077]=new Array("隆安县","南宁市");
		
		lm2[2078]=new Array("马山县","南宁市");
		
		lm2[2079]=new Array("上林县","南宁市");
		
		lm2[2080]=new Array("宾阳县","南宁市");
		
		lm2[2081]=new Array("横县","南宁市");
		
		lm2[2082]=new Array("市辖区","柳州市");
		
		lm2[2083]=new Array("城中区","柳州市");
		
		lm2[2084]=new Array("鱼峰区","柳州市");
		
		lm2[2085]=new Array("柳南区","柳州市");
		
		lm2[2086]=new Array("柳北区","柳州市");
		
		lm2[2087]=new Array("柳江县","柳州市");
		
		lm2[2088]=new Array("柳城县","柳州市");
		
		lm2[2089]=new Array("鹿寨县","柳州市");
		
		lm2[2090]=new Array("融安县","柳州市");
		
		lm2[2091]=new Array("融水苗族自治县","柳州市");
		
		lm2[2092]=new Array("三江侗族自治县","柳州市");
		
		lm2[2093]=new Array("市辖区","桂林市");
		
		lm2[2094]=new Array("秀峰区","桂林市");
		
		lm2[2095]=new Array("叠彩区","桂林市");
		
		lm2[2096]=new Array("象山区","桂林市");
		
		lm2[2097]=new Array("七星区","桂林市");
		
		lm2[2098]=new Array("雁山区","桂林市");
		
		lm2[2099]=new Array("阳朔县","桂林市");
		
		lm2[2100]=new Array("临桂县","桂林市");
		
		lm2[2101]=new Array("灵川县","桂林市");
		
		lm2[2102]=new Array("全州县","桂林市");
		
		lm2[2103]=new Array("兴安县","桂林市");
		
		lm2[2104]=new Array("永福县","桂林市");
		
		lm2[2105]=new Array("灌阳县","桂林市");
		
		lm2[2106]=new Array("龙胜各族自治县","桂林市");
		
		lm2[2107]=new Array("资源县","桂林市");
		
		lm2[2108]=new Array("平乐县","桂林市");
		
		lm2[2109]=new Array("荔蒲县","桂林市");
		
		lm2[2110]=new Array("恭城瑶族自治县","桂林市");
		
		lm2[2111]=new Array("市辖区","梧州市");
		
		lm2[2112]=new Array("万秀区","梧州市");
		
		lm2[2113]=new Array("蝶山区","梧州市");
		
		lm2[2114]=new Array("长洲区","梧州市");
		
		lm2[2115]=new Array("苍梧县","梧州市");
		
		lm2[2116]=new Array("藤县","梧州市");
		
		lm2[2117]=new Array("蒙山县","梧州市");
		
		lm2[2118]=new Array("岑溪市","梧州市");
		
		lm2[2119]=new Array("市辖区","北海市");
		
		lm2[2120]=new Array("海城区","北海市");
		
		lm2[2121]=new Array("银海区","北海市");
		
		lm2[2122]=new Array("铁山港区","北海市");
		
		lm2[2123]=new Array("合浦县","北海市");
		
		lm2[2124]=new Array("市辖区","防城港市");
		
		lm2[2125]=new Array("港口区","防城港市");
		
		lm2[2126]=new Array("防城区","防城港市");
		
		lm2[2127]=new Array("上思县","防城港市");
		
		lm2[2128]=new Array("东兴市","防城港市");
		
		lm2[2129]=new Array("市辖区","钦州市");
		
		lm2[2130]=new Array("钦南区","钦州市");
		
		lm2[2131]=new Array("钦北区","钦州市");
		
		lm2[2132]=new Array("灵山县","钦州市");
		
		lm2[2133]=new Array("浦北县","钦州市");
		
		lm2[2134]=new Array("市辖区","贵港市");
		
		lm2[2135]=new Array("港北区","贵港市");
		
		lm2[2136]=new Array("港南区","贵港市");
		
		lm2[2137]=new Array("覃塘区","贵港市");
		
		lm2[2138]=new Array("平南县","贵港市");
		
		lm2[2139]=new Array("桂平市","贵港市");
		
		lm2[2140]=new Array("市辖区","玉林市");
		
		lm2[2141]=new Array("玉州区","玉林市");
		
		lm2[2142]=new Array("容县","玉林市");
		
		lm2[2143]=new Array("陆川县","玉林市");
		
		lm2[2144]=new Array("博白县","玉林市");
		
		lm2[2145]=new Array("兴业县","玉林市");
		
		lm2[2146]=new Array("北流市","玉林市");
		
		lm2[2147]=new Array("市辖区","百色市");
		
		lm2[2148]=new Array("右江区","百色市");
		
		lm2[2149]=new Array("田阳县","百色市");
		
		lm2[2150]=new Array("田东县","百色市");
		
		lm2[2151]=new Array("平果县","百色市");
		
		lm2[2152]=new Array("德保县","百色市");
		
		lm2[2153]=new Array("靖西县","百色市");
		
		lm2[2154]=new Array("那坡县","百色市");
		
		lm2[2155]=new Array("凌云县","百色市");
		
		lm2[2156]=new Array("乐业县","百色市");
		
		lm2[2157]=new Array("田林县","百色市");
		
		lm2[2158]=new Array("西林县","百色市");
		
		lm2[2159]=new Array("隆林各族自治县","百色市");
		
		lm2[2160]=new Array("市辖区","贺州市");
		
		lm2[2161]=new Array("八步区","贺州市");
		
		lm2[2162]=new Array("昭平县","贺州市");
		
		lm2[2163]=new Array("钟山县","贺州市");
		
		lm2[2164]=new Array("富川瑶族自治县","贺州市");
		
		lm2[2165]=new Array("市辖区","河池市");
		
		lm2[2166]=new Array("金城江区","河池市");
		
		lm2[2167]=new Array("南丹县","河池市");
		
		lm2[2168]=new Array("天峨县","河池市");
		
		lm2[2169]=new Array("凤山县","河池市");
		
		lm2[2170]=new Array("东兰县","河池市");
		
		lm2[2171]=new Array("罗城仫佬族自治县","河池市");
		
		lm2[2172]=new Array("环江毛南族自治县","河池市");
		
		lm2[2173]=new Array("巴马瑶族自治县","河池市");
		
		lm2[2174]=new Array("都安瑶族自治县","河池市");
		
		lm2[2175]=new Array("大化瑶族自治县","河池市");
		
		lm2[2176]=new Array("宜州市","河池市");
		
		lm2[2177]=new Array("市辖区","来宾市");
		
		lm2[2178]=new Array("兴宾区","来宾市");
		
		lm2[2179]=new Array("忻城县","来宾市");
		


		lm2[2180]=new Array("象州县","来宾市");
		
		lm2[2181]=new Array("武宣县","来宾市");
		
		lm2[2182]=new Array("金秀瑶族自治县","来宾市");
		
		lm2[2183]=new Array("合山市","来宾市");
		
		lm2[2184]=new Array("市辖区","崇左市");
		
		lm2[2185]=new Array("江洲区","崇左市");
		
		lm2[2186]=new Array("扶绥县","崇左市");
		
		lm2[2187]=new Array("宁明县","崇左市");
		
		lm2[2188]=new Array("龙州县","崇左市");
		
		lm2[2189]=new Array("大新县","崇左市");
		
		lm2[2190]=new Array("天等县","崇左市");
		
		lm2[2191]=new Array("凭祥市","崇左市");
		
		lm2[2192]=new Array("市辖区","海口市");
		
		lm2[2193]=new Array("秀英区","海口市");
		
		lm2[2194]=new Array("龙华区","海口市");
		
		lm2[2195]=new Array("琼山区","海口市");
		
		lm2[2196]=new Array("美兰区","海口市");
		
		lm2[2197]=new Array("市辖区","三亚市");
		
		lm2[2198]=new Array("五指山市","海南直辖县");
		
		lm2[2199]=new Array("琼海市","海南直辖县");
		
		lm2[2200]=new Array("儋州市","海南直辖县");
		
		lm2[2201]=new Array("文昌市","海南直辖县");
		
		lm2[2202]=new Array("万宁市","海南直辖县");
		
		lm2[2203]=new Array("东方市","海南直辖县");
		
		lm2[2204]=new Array("定安县","海南直辖县");
		
		lm2[2205]=new Array("屯昌县","海南直辖县");
		
		lm2[2206]=new Array("澄迈县","海南直辖县");
		
		lm2[2207]=new Array("临高县","海南直辖县");
		
		lm2[2208]=new Array("白沙黎族自治县","海南直辖县");
		
		lm2[2209]=new Array("昌江黎族自治县","海南直辖县");
		
		lm2[2210]=new Array("乐东黎族自治县","海南直辖县");
		
		lm2[2211]=new Array("陵水黎族自治县","海南直辖县");
		
		lm2[2212]=new Array("保亭黎族苗族自治县","海南直辖县");
		
		lm2[2213]=new Array("琼中黎族苗族自治县","海南直辖县");
		
		lm2[2214]=new Array("西沙群岛","海南直辖县");
		
		lm2[2215]=new Array("南沙群岛","海南直辖县");
		
		lm2[2216]=new Array("中沙群岛的岛礁及其海域","海南直辖县");
		
		lm2[2217]=new Array("万州区","重庆辖区");
		
		lm2[2218]=new Array("涪陵区","重庆辖区");
		
		lm2[2219]=new Array("渝中区","重庆辖区");
		
		lm2[2220]=new Array("大渡口区","重庆辖区");
		
		lm2[2221]=new Array("江北区","重庆辖区");
		
		lm2[2222]=new Array("沙坪坝区","重庆辖区");
		
		lm2[2223]=new Array("九龙坡区","重庆辖区");
		
		lm2[2224]=new Array("南岸区","重庆辖区");
		
		lm2[2225]=new Array("北碚区","重庆辖区");
		
		lm2[2226]=new Array("万盛区","重庆辖区");
		
		lm2[2227]=new Array("双桥区","重庆辖区");
		
		lm2[2228]=new Array("渝北区","重庆辖区");
		
		lm2[2229]=new Array("巴南区","重庆辖区");
		
		lm2[2230]=new Array("黔江区","重庆辖区");
		
		lm2[2231]=new Array("长寿区","重庆辖区");
		
		lm2[2232]=new Array("綦江县","重庆辖县");
		
		lm2[2233]=new Array("潼南县","重庆辖县");
		
		lm2[2234]=new Array("铜梁县","重庆辖县");
		
		lm2[2235]=new Array("大足县","重庆辖县");
		
		lm2[2236]=new Array("荣昌县","重庆辖县");
		
		lm2[2237]=new Array("璧山县","重庆辖县");
		
		lm2[2238]=new Array("梁平县","重庆辖县");
		
		lm2[2239]=new Array("城口县","重庆辖县");
		
		lm2[2240]=new Array("丰都县","重庆辖县");
		
		lm2[2241]=new Array("垫江县","重庆辖县");
		
		lm2[2242]=new Array("武隆县","重庆辖县");
		
		lm2[2243]=new Array("忠县","重庆辖县");
		
		lm2[2244]=new Array("开县","重庆辖县");
		
		lm2[2245]=new Array("云阳县","重庆辖县");
		
		lm2[2246]=new Array("奉节县","重庆辖县");
		
		lm2[2247]=new Array("巫山县","重庆辖县");
		
		lm2[2248]=new Array("巫溪县","重庆辖县");
		
		lm2[2249]=new Array("石柱土家族自治县","重庆辖县");
		
		lm2[2250]=new Array("秀山土家族苗族自治县","重庆辖县");
		
		lm2[2251]=new Array("酉阳土家族苗族自治县","重庆辖县");
		
		lm2[2252]=new Array("彭水苗族土家族自治县","重庆辖县");
		
		lm2[2253]=new Array("江津市","重庆辖市");
		
		lm2[2254]=new Array("合川市","重庆辖市");
		
		lm2[2255]=new Array("永川市","重庆辖市");
		
		lm2[2256]=new Array("南川市","重庆辖市");
		
		lm2[2257]=new Array("市辖区","成都市");
		
		lm2[2258]=new Array("锦江区","成都市");
		
		lm2[2259]=new Array("青羊区","成都市");
		
		lm2[2260]=new Array("金牛区","成都市");
		
		lm2[2261]=new Array("武侯区","成都市");
		
		lm2[2262]=new Array("成华区","成都市");
		
		lm2[2263]=new Array("龙泉驿区","成都市");
		
		lm2[2264]=new Array("青白江区","成都市");
		
		lm2[2265]=new Array("新都区","成都市");
		
		lm2[2266]=new Array("温江区","成都市");
		
		lm2[2267]=new Array("金堂县","成都市");
		
		lm2[2268]=new Array("双流县","成都市");
		
		lm2[2269]=new Array("郫县","成都市");
		
		lm2[2270]=new Array("大邑县","成都市");
		
		lm2[2271]=new Array("蒲江县","成都市");
		
		lm2[2272]=new Array("新津县","成都市");
		
		lm2[2273]=new Array("都江堰市","成都市");
		
		lm2[2274]=new Array("彭州市","成都市");
		
		lm2[2275]=new Array("邛崃市","成都市");
		
		lm2[2276]=new Array("崇州市","成都市");
		
		lm2[2277]=new Array("市辖区","自贡市");
		
		lm2[2278]=new Array("自流井区","自贡市");
		
		lm2[2279]=new Array("贡井区","自贡市");
		
		lm2[2280]=new Array("大安区","自贡市");
		
		lm2[2281]=new Array("沿滩区","自贡市");
		
		lm2[2282]=new Array("荣县","自贡市");
		
		lm2[2283]=new Array("富顺县","自贡市");
		
		lm2[2284]=new Array("市辖区","攀枝花市");
		
		lm2[2285]=new Array("东区","攀枝花市");
		
		lm2[2286]=new Array("西区","攀枝花市");
		
		lm2[2287]=new Array("仁和区","攀枝花市");
		
		lm2[2288]=new Array("米易县","攀枝花市");
		
		lm2[2289]=new Array("盐边县","攀枝花市");
		
		lm2[2290]=new Array("市辖区","泸州市");
		
		lm2[2291]=new Array("江阳区","泸州市");
		
		lm2[2292]=new Array("纳溪区","泸州市");
		
		lm2[2293]=new Array("龙马潭区","泸州市");
		
		lm2[2294]=new Array("泸县","泸州市");
		
		lm2[2295]=new Array("合江县","泸州市");
		
		lm2[2296]=new Array("叙永县","泸州市");
		
		lm2[2297]=new Array("古蔺县","泸州市");
		
		lm2[2298]=new Array("市辖区","德阳市");
		
		lm2[2299]=new Array("旌阳区","德阳市");
		
		lm2[2300]=new Array("中江县","德阳市");
		
		lm2[2301]=new Array("罗江县","德阳市");
		
		lm2[2302]=new Array("广汉市","德阳市");
		
		lm2[2303]=new Array("什邡市","德阳市");
		
		lm2[2304]=new Array("绵竹市","德阳市");
		
		lm2[2305]=new Array("市辖区","绵阳市");
		
		lm2[2306]=new Array("涪城区","绵阳市");
		
		lm2[2307]=new Array("游仙区","绵阳市");
		
		lm2[2308]=new Array("三台县","绵阳市");
		
		lm2[2309]=new Array("盐亭县","绵阳市");
		
		lm2[2310]=new Array("安县","绵阳市");
		
		lm2[2311]=new Array("梓潼县","绵阳市");
		
		lm2[2312]=new Array("北川羌族自治县","绵阳市");
		
		lm2[2313]=new Array("平武县","绵阳市");
		
		lm2[2314]=new Array("江油市","绵阳市");
		
		lm2[2315]=new Array("市辖区","广元市");
		
		lm2[2316]=new Array("市中区","广元市");
		
		lm2[2317]=new Array("元坝区","广元市");
		
		lm2[2318]=new Array("朝天区","广元市");
		
		lm2[2319]=new Array("旺苍县","广元市");
		
		lm2[2320]=new Array("青川县","广元市");
		
		lm2[2321]=new Array("剑阁县","广元市");
		
		lm2[2322]=new Array("苍溪县","广元市");
		
		lm2[2323]=new Array("市辖区","遂宁市");
		
		lm2[2324]=new Array("船山区","遂宁市");
		
		lm2[2325]=new Array("安居区","遂宁市");
		
		lm2[2326]=new Array("蓬溪县","遂宁市");
		
		lm2[2327]=new Array("射洪县","遂宁市");
		
		lm2[2328]=new Array("大英县","遂宁市");
		
		lm2[2329]=new Array("市辖区","内江市");
		
		lm2[2330]=new Array("市中区","内江市");
		
		lm2[2331]=new Array("东兴区","内江市");
		
		lm2[2332]=new Array("威远县","内江市");
		
		lm2[2333]=new Array("资中县","内江市");
		
		lm2[2334]=new Array("隆昌县","内江市");
		
		lm2[2335]=new Array("市辖区","乐山市");
		
		lm2[2336]=new Array("市中区","乐山市");
		
		lm2[2337]=new Array("沙湾区","乐山市");
		
		lm2[2338]=new Array("五通桥区","乐山市");
		
		lm2[2339]=new Array("金口河区","乐山市");
		
		lm2[2340]=new Array("犍为县","乐山市");
		
		lm2[2341]=new Array("井研县","乐山市");
		
		lm2[2342]=new Array("夹江县","乐山市");
		
		lm2[2343]=new Array("沐川县","乐山市");
		
		lm2[2344]=new Array("峨边彝族自治县","乐山市");
		
		lm2[2345]=new Array("马边彝族自治县","乐山市");
		
		lm2[2346]=new Array("峨眉山市","乐山市");
		
		lm2[2347]=new Array("市辖区","南充市");
		
		lm2[2348]=new Array("顺庆区","南充市");
		
		lm2[2349]=new Array("高坪区","南充市");
		
		lm2[2350]=new Array("嘉陵区","南充市");
		
		lm2[2351]=new Array("南部县","南充市");
		
		lm2[2352]=new Array("营山县","南充市");
		
		lm2[2353]=new Array("蓬安县","南充市");
		
		lm2[2354]=new Array("仪陇县","南充市");
		
		lm2[2355]=new Array("西充县","南充市");
		
		lm2[2356]=new Array("阆中市","南充市");
		
		lm2[2357]=new Array("市辖区","眉山市");
		
		lm2[2358]=new Array("东坡区","眉山市");
		
		lm2[2359]=new Array("仁寿县","眉山市");
		
		lm2[2360]=new Array("彭山县","眉山市");
		
		lm2[2361]=new Array("洪雅县","眉山市");
		
		lm2[2362]=new Array("丹棱县","眉山市");
		
		lm2[2363]=new Array("青神县","眉山市");
		
		lm2[2364]=new Array("市辖区","宜宾市");
		
		lm2[2365]=new Array("翠屏区","宜宾市");
		
		lm2[2366]=new Array("宜宾县","宜宾市");
		
		lm2[2367]=new Array("南溪县","宜宾市");
		
		lm2[2368]=new Array("江安县","宜宾市");
		
		lm2[2369]=new Array("长宁县","宜宾市");
		
		lm2[2370]=new Array("高县","宜宾市");
		
		lm2[2371]=new Array("珙县","宜宾市");
		
		lm2[2372]=new Array("筠连县","宜宾市");
		
		lm2[2373]=new Array("兴文县","宜宾市");
		
		lm2[2374]=new Array("屏山县","宜宾市");
		
		lm2[2375]=new Array("市辖区","广安市");
		
		lm2[2376]=new Array("广安区","广安市");
		
		lm2[2377]=new Array("岳池县","广安市");
		
		lm2[2378]=new Array("武胜县","广安市");
		
		lm2[2379]=new Array("邻水县","广安市");
		
		lm2[2380]=new Array("华莹市","广安市");
		
		lm2[2381]=new Array("市辖区","达州市");
		
		lm2[2382]=new Array("通川区","达州市");
		
		lm2[2383]=new Array("达县","达州市");
		
		lm2[2384]=new Array("宣汉县","达州市");
		
		lm2[2385]=new Array("开江县","达州市");
		
		lm2[2386]=new Array("大竹县","达州市");
		
		lm2[2387]=new Array("渠县","达州市");
		
		lm2[2388]=new Array("万源市","达州市");
		
		lm2[2389]=new Array("市辖区","雅安市");
		
		lm2[2390]=new Array("雨城区","雅安市");
		
		lm2[2391]=new Array("名山县","雅安市");
		
		lm2[2392]=new Array("荥经县","雅安市");
		
		lm2[2393]=new Array("汉源县","雅安市");
		
		lm2[2394]=new Array("石棉县","雅安市");
		
		lm2[2395]=new Array("天全县","雅安市");
		
		lm2[2396]=new Array("芦山县","雅安市");
		
		lm2[2397]=new Array("宝兴县","雅安市");
		
		lm2[2398]=new Array("市辖区","巴中市");
		
		lm2[2399]=new Array("巴州区","巴中市");
		
		lm2[2400]=new Array("通江县","巴中市");
		
		lm2[2401]=new Array("南江县","巴中市");
		
		lm2[2402]=new Array("平昌县","巴中市");
		
		lm2[2403]=new Array("市辖区","资阳市");
		
		lm2[2404]=new Array("雁江区","资阳市");
		
		lm2[2405]=new Array("安岳县","资阳市");
		
		lm2[2406]=new Array("乐至县","资阳市");
		
		lm2[2407]=new Array("简阳市","资阳市");
		
		lm2[2408]=new Array("汶川县","阿坝自治州");
		
		lm2[2409]=new Array("理县","阿坝自治州");
		
		lm2[2410]=new Array("茂县","阿坝自治州");
		
		lm2[2411]=new Array("松潘县","阿坝自治州");
		
		lm2[2412]=new Array("九寨沟县","阿坝自治州");
		
		lm2[2413]=new Array("金川县","阿坝自治州");
		
		lm2[2414]=new Array("小金县","阿坝自治州");
		
		lm2[2415]=new Array("黑水县","阿坝自治州");
		
		lm2[2416]=new Array("马尔康县","阿坝自治州");
		
		lm2[2417]=new Array("壤塘县","阿坝自治州");
		
		lm2[2418]=new Array("阿坝县","阿坝自治州");
		
		lm2[2419]=new Array("若尔盖县","阿坝自治州");
		
		lm2[2420]=new Array("红原县","阿坝自治州");
		
		lm2[2421]=new Array("康定县","甘孜自治州");
		
		lm2[2422]=new Array("泸定县","甘孜自治州");
		
		lm2[2423]=new Array("丹巴县","甘孜自治州");
		
		lm2[2424]=new Array("九龙县","甘孜自治州");
		
		lm2[2425]=new Array("雅江县","甘孜自治州");
		
		lm2[2426]=new Array("道孚县","甘孜自治州");
		
		lm2[2427]=new Array("炉霍县","甘孜自治州");
		
		lm2[2428]=new Array("甘孜县","甘孜自治州");
		
		lm2[2429]=new Array("新龙县","甘孜自治州");
		
		lm2[2430]=new Array("德格县","甘孜自治州");
		
		lm2[2431]=new Array("白玉县","甘孜自治州");
		
		lm2[2432]=new Array("石渠县","甘孜自治州");
		
		lm2[2433]=new Array("色达县","甘孜自治州");
		
		lm2[2434]=new Array("理塘县","甘孜自治州");
		
		lm2[2435]=new Array("巴塘县","甘孜自治州");
		
		lm2[2436]=new Array("乡城县","甘孜自治州");
		
		lm2[2437]=new Array("稻城县","甘孜自治州");
		
		lm2[2438]=new Array("得荣县","甘孜自治州");
		
		lm2[2439]=new Array("西昌市","凉山自治州");
		
		lm2[2440]=new Array("木里藏族自治县","凉山自治州");
		
		lm2[2441]=new Array("盐源县","凉山自治州");
		
		lm2[2442]=new Array("德昌县","凉山自治州");
		
		lm2[2443]=new Array("会理县","凉山自治州");
		
		lm2[2444]=new Array("会东县","凉山自治州");
		
		lm2[2445]=new Array("宁南县","凉山自治州");
		
		lm2[2446]=new Array("普格县","凉山自治州");
		
		lm2[2447]=new Array("布拖县","凉山自治州");
		
		lm2[2448]=new Array("金阳县","凉山自治州");
		
		lm2[2449]=new Array("昭觉县","凉山自治州");
		
		lm2[2450]=new Array("喜德县","凉山自治州");
		
		lm2[2451]=new Array("冕宁县","凉山自治州");
		
		lm2[2452]=new Array("越西县","凉山自治州");
		
		lm2[2453]=new Array("甘洛县","凉山自治州");
		
		lm2[2454]=new Array("美姑县","凉山自治州");
		
		lm2[2455]=new Array("雷波县","凉山自治州");
		
		lm2[2456]=new Array("市辖区","贵阳市");
		
		lm2[2457]=new Array("南明区","贵阳市");
		
		lm2[2458]=new Array("云岩区","贵阳市");
		
		lm2[2459]=new Array("花溪区","贵阳市");
		
		lm2[2460]=new Array("乌当区","贵阳市");
		
		lm2[2461]=new Array("白云区","贵阳市");
		
		lm2[2462]=new Array("小河区","贵阳市");
		
		lm2[2463]=new Array("开阳县","贵阳市");
		
		lm2[2464]=new Array("息烽县","贵阳市");
		
		lm2[2465]=new Array("修文县","贵阳市");
		
		lm2[2466]=new Array("清镇市","贵阳市");
		
		lm2[2467]=new Array("钟山区","六盘水市");
		
		lm2[2468]=new Array("六枝特区","六盘水市");
		
		lm2[2469]=new Array("水城县","六盘水市");
		
		lm2[2470]=new Array("盘县","六盘水市");
		
		lm2[2471]=new Array("市辖区","遵义市");
		
		lm2[2472]=new Array("红花岗区","遵义市");
		
		lm2[2473]=new Array("汇川区","遵义市");
		
		lm2[2474]=new Array("遵义县","遵义市");
		
		lm2[2475]=new Array("桐梓县","遵义市");
		
		lm2[2476]=new Array("绥阳县","遵义市");
		
		lm2[2477]=new Array("正安县","遵义市");
		
		lm2[2478]=new Array("道真仡佬族苗族自治县","遵义市");
		
		lm2[2479]=new Array("务川仡佬族苗族自治县","遵义市");
		
		lm2[2480]=new Array("凤冈县","遵义市");
		
		lm2[2481]=new Array("湄潭县","遵义市");
		
		lm2[2482]=new Array("余庆县","遵义市");
		
		lm2[2483]=new Array("习水县","遵义市");
		
		lm2[2484]=new Array("赤水市","遵义市");
		
		lm2[2485]=new Array("仁怀市","遵义市");
		
		lm2[2486]=new Array("市辖区","安顺市");
		
		lm2[2487]=new Array("西秀区","安顺市");
		
		lm2[2488]=new Array("平坝县","安顺市");
		
		lm2[2489]=new Array("普定县","安顺市");
		
		lm2[2490]=new Array("镇宁布依族苗族自治县","安顺市");
		
		lm2[2491]=new Array("关岭布依族苗族自治县","安顺市");
		
		lm2[2492]=new Array("紫云苗族布依族自治县","安顺市");
		
		lm2[2493]=new Array("铜仁市","铜仁地区");
		
		lm2[2494]=new Array("江口县","铜仁地区");
		
		lm2[2495]=new Array("玉屏侗族自治县","铜仁地区");
		
		lm2[2496]=new Array("石阡县","铜仁地区");
		
		lm2[2497]=new Array("思南县","铜仁地区");
		
		lm2[2498]=new Array("印江土家族苗族自治县","铜仁地区");
		
		lm2[2499]=new Array("德江县","铜仁地区");
		
		lm2[2500]=new Array("沿河土家族自治县","铜仁地区");
		
		lm2[2501]=new Array("松桃苗族自治县","铜仁地区");
		
		lm2[2502]=new Array("万山特区","铜仁地区");
		
		lm2[2503]=new Array("兴义市","黔西南自治州");
		
		lm2[2504]=new Array("兴仁县","黔西南自治州");
		
		lm2[2505]=new Array("普安县","黔西南自治州");
		
		lm2[2506]=new Array("晴隆县","黔西南自治州");
		
		lm2[2507]=new Array("贞丰县","黔西南自治州");
		
		lm2[2508]=new Array("望谟县","黔西南自治州");
		
		lm2[2509]=new Array("册亨县","黔西南自治州");
		
		lm2[2510]=new Array("安龙县","黔西南自治州");
		
		lm2[2511]=new Array("毕节市","毕节地区");
		
		lm2[2512]=new Array("大方县","毕节地区");
		
		lm2[2513]=new Array("黔西县","毕节地区");
		
		lm2[2514]=new Array("金沙县","毕节地区");
		
		lm2[2515]=new Array("织金县","毕节地区");
		
		lm2[2516]=new Array("纳雍县","毕节地区");
		
		lm2[2517]=new Array("威宁彝族回族苗族自治县","毕节地区");
		
		lm2[2518]=new Array("赫章县","毕节地区");
		
		lm2[2519]=new Array("凯里市","黔东南自治州");
		
		lm2[2520]=new Array("黄平县","黔东南自治州");
		
		lm2[2521]=new Array("施秉县","黔东南自治州");
		
		lm2[2522]=new Array("三穗县","黔东南自治州");
		
		lm2[2523]=new Array("镇远县","黔东南自治州");
		
		lm2[2524]=new Array("岑巩县","黔东南自治州");
		
		lm2[2525]=new Array("天柱县","黔东南自治州");
		
		lm2[2526]=new Array("锦屏县","黔东南自治州");
		
		lm2[2527]=new Array("剑河县","黔东南自治州");
		
		lm2[2528]=new Array("台江县","黔东南自治州");
		
		lm2[2529]=new Array("黎平县","黔东南自治州");
		
		lm2[2530]=new Array("榕江县","黔东南自治州");
		
		lm2[2531]=new Array("从江县","黔东南自治州");
		
		lm2[2532]=new Array("雷山县","黔东南自治州");
		
		lm2[2533]=new Array("麻江县","黔东南自治州");
		
		lm2[2534]=new Array("丹寨县","黔东南自治州");
		
		lm2[2535]=new Array("都匀市","黔南自治州");
		
		lm2[2536]=new Array("福泉市","黔南自治州");
		
		lm2[2537]=new Array("荔波县","黔南自治州");
		
		lm2[2538]=new Array("贵定县","黔南自治州");
		
		lm2[2539]=new Array("瓮安县","黔南自治州");
		
		lm2[2540]=new Array("独山县","黔南自治州");
		
		lm2[2541]=new Array("平塘县","黔南自治州");
		
		lm2[2542]=new Array("罗甸县","黔南自治州");
		
		lm2[2543]=new Array("长顺县","黔南自治州");
		
		lm2[2544]=new Array("龙里县","黔南自治州");
		
		lm2[2545]=new Array("惠水县","黔南自治州");
		
		lm2[2546]=new Array("三都水族自治县","黔南自治州");
		
		lm2[2547]=new Array("市辖区","昆明市");
		
		lm2[2548]=new Array("五华区","昆明市");
		
		lm2[2549]=new Array("盘龙区","昆明市");
		
		lm2[2550]=new Array("官渡区","昆明市");
		
		lm2[2551]=new Array("西山区","昆明市");
		
		lm2[2552]=new Array("东川区","昆明市");
		
		lm2[2553]=new Array("呈贡县","昆明市");
		
		lm2[2554]=new Array("晋宁县","昆明市");
		
		lm2[2555]=new Array("富民县","昆明市");
		
		lm2[2556]=new Array("宜良县","昆明市");
		
		lm2[2557]=new Array("石林彝族自治县","昆明市");
		
		lm2[2558]=new Array("嵩明县","昆明市");
		
		lm2[2559]=new Array("禄劝彝族苗族自治县","昆明市");
		
		lm2[2560]=new Array("寻甸回族彝族自治县","昆明市");
		
		lm2[2561]=new Array("安宁市","昆明市");
		
		lm2[2562]=new Array("市辖区","曲靖市");
		
		lm2[2563]=new Array("麒麟区","曲靖市");
		
		lm2[2564]=new Array("马龙县","曲靖市");
		
		lm2[2565]=new Array("陆良县","曲靖市");
		
		lm2[2566]=new Array("师宗县","曲靖市");
		
		lm2[2567]=new Array("罗平县","曲靖市");
		
		lm2[2568]=new Array("富源县","曲靖市");
		
		lm2[2569]=new Array("会泽县","曲靖市");
		
		lm2[2570]=new Array("沾益县","曲靖市");
		
		lm2[2571]=new Array("宣威市","曲靖市");
		
		lm2[2572]=new Array("市辖区","玉溪市");
		
		lm2[2573]=new Array("红塔区","玉溪市");
		
		lm2[2574]=new Array("江川县","玉溪市");
		
		lm2[2575]=new Array("澄江县","玉溪市");
		
		lm2[2576]=new Array("通海县","玉溪市");
		
		lm2[2577]=new Array("华宁县","玉溪市");
		
		lm2[2578]=new Array("易门县","玉溪市");
		
		lm2[2579]=new Array("峨山彝族自治县","玉溪市");
		
		lm2[2580]=new Array("新平彝族傣族自治县","玉溪市");
		
		lm2[2581]=new Array("元江哈尼族彝族傣族自治县","玉溪市");
		
		lm2[2582]=new Array("市辖区","保山市");
		
		lm2[2583]=new Array("隆阳区","保山市");
		
		lm2[2584]=new Array("施甸县","保山市");
		
		lm2[2585]=new Array("腾冲县","保山市");
		
		lm2[2586]=new Array("龙陵县","保山市");
		
		lm2[2587]=new Array("昌宁县","保山市");
		
		lm2[2588]=new Array("市辖区","昭通市");
		
		lm2[2589]=new Array("昭阳区","昭通市");
		
		lm2[2590]=new Array("鲁甸县","昭通市");
		
		lm2[2591]=new Array("巧家县","昭通市");
		
		lm2[2592]=new Array("盐津县","昭通市");
		
		lm2[2593]=new Array("大关县","昭通市");
		
		lm2[2594]=new Array("永善县","昭通市");
		
		lm2[2595]=new Array("绥江县","昭通市");
		
		lm2[2596]=new Array("镇雄县","昭通市");
		
		lm2[2597]=new Array("彝良县","昭通市");
		
		lm2[2598]=new Array("威信县","昭通市");
		
		lm2[2599]=new Array("水富县","昭通市");
		
		lm2[2600]=new Array("市辖区","丽江市");
		
		lm2[2601]=new Array("古城区","丽江市");
		
		lm2[2602]=new Array("玉龙纳西族自治县","丽江市");
		
		lm2[2603]=new Array("永胜县","丽江市");
		
		lm2[2604]=new Array("华坪县","丽江市");
		
		lm2[2605]=new Array("宁蒗彝族自治县","丽江市");
		
		lm2[2606]=new Array("市辖区","思茅市");
		
		lm2[2607]=new Array("翠云区","思茅市");
		
		lm2[2608]=new Array("普洱哈尼族彝族自治县","思茅市");
		
		lm2[2609]=new Array("墨江哈尼族自治县","思茅市");
		
		lm2[2610]=new Array("景东彝族自治县","思茅市");
		
		lm2[2611]=new Array("景谷傣族彝族自治县","思茅市");
		
		lm2[2612]=new Array("镇沅彝族哈尼族拉祜族自治县","思茅市");
		
		lm2[2613]=new Array("江城哈尼族彝族自治县","思茅市");
		
		lm2[2614]=new Array("孟连傣族拉祜族佤族自治县","思茅市");
		
		lm2[2615]=new Array("澜沧拉祜族自治县","思茅市");
		
		lm2[2616]=new Array("西盟佤族自治县","思茅市");
		
		lm2[2617]=new Array("市辖区","临沧市");
		
		lm2[2618]=new Array("临翔区","临沧市");
		
		lm2[2619]=new Array("凤庆县","临沧市");
		
		lm2[2620]=new Array("云县","临沧市");
		
		lm2[2621]=new Array("永德县","临沧市");
		
		lm2[2622]=new Array("镇康县","临沧市");
		
		lm2[2623]=new Array("双江拉祜族佤族布朗族傣族自治县","临沧市");
		
		lm2[2624]=new Array("耿马傣族佤族自治县","临沧市");
		
		lm2[2625]=new Array("沧源佤族自治县","临沧市");
		
		lm2[2626]=new Array("楚雄市","楚雄自治州");
		
		lm2[2627]=new Array("双柏县","楚雄自治州");
		
		lm2[2628]=new Array("牟定县","楚雄自治州");
		
		lm2[2629]=new Array("南华县","楚雄自治州");
		
		lm2[2630]=new Array("姚安县","楚雄自治州");
		
		lm2[2631]=new Array("大姚县","楚雄自治州");
		
		lm2[2632]=new Array("永仁县","楚雄自治州");
		
		lm2[2633]=new Array("元谋县","楚雄自治州");
		
		lm2[2634]=new Array("武定县","楚雄自治州");
		
		lm2[2635]=new Array("禄丰县","楚雄自治州");
		
		lm2[2636]=new Array("个旧市","红河自治州");
		
		lm2[2637]=new Array("开远市","红河自治州");
		
		lm2[2638]=new Array("蒙自县","红河自治州");
		
		lm2[2639]=new Array("屏边苗族自治县","红河自治州");
		
		lm2[2640]=new Array("建水县","红河自治州");
		
		lm2[2641]=new Array("石屏县","红河自治州");
		
		lm2[2642]=new Array("弥勒县","红河自治州");
		
		lm2[2643]=new Array("泸西县","红河自治州");
		
		lm2[2644]=new Array("元阳县","红河自治州");
		
		lm2[2645]=new Array("红河县","红河自治州");
		
		lm2[2646]=new Array("金平苗族瑶族傣族自治县","红河自治州");
		
		lm2[2647]=new Array("绿春县","红河自治州");
		
		lm2[2648]=new Array("河口瑶族自治县","红河自治州");
		
		lm2[2649]=new Array("文山县","文山自治州");
		
		lm2[2650]=new Array("砚山县","文山自治州");
		
		lm2[2651]=new Array("西畴县","文山自治州");
		
		lm2[2652]=new Array("麻栗坡县","文山自治州");
		
		lm2[2653]=new Array("马关县","文山自治州");
		
		lm2[2654]=new Array("丘北县","文山自治州");
		
		lm2[2655]=new Array("广南县","文山自治州");
		
		lm2[2656]=new Array("富宁县","文山自治州");
		
		lm2[2657]=new Array("景洪市","西双版纳州");
		
		lm2[2658]=new Array("勐海县","西双版纳州");
		
		lm2[2659]=new Array("勐腊县","西双版纳州");
		
		lm2[2660]=new Array("大理市","大理自治州");
		
		lm2[2661]=new Array("漾濞彝族自治县","大理自治州");
		
		lm2[2662]=new Array("祥云县","大理自治州");
		
		lm2[2663]=new Array("宾川县","大理自治州");
		
		lm2[2664]=new Array("弥渡县","大理自治州");
		
		lm2[2665]=new Array("南涧彝族自治县","大理自治州");
		
		lm2[2666]=new Array("巍山彝族回族自治县","大理自治州");
		
		lm2[2667]=new Array("永平县","大理自治州");
		
		lm2[2668]=new Array("云龙县","大理自治州");
		
		lm2[2669]=new Array("洱源县","大理自治州");
		
		lm2[2670]=new Array("剑川县","大理自治州");
		
		lm2[2671]=new Array("鹤庆县","大理自治州");
		
		lm2[2672]=new Array("瑞丽市","德宏自治州");
		
		lm2[2673]=new Array("潞西市","德宏自治州");
		
		lm2[2674]=new Array("梁河县","德宏自治州");
		
		lm2[2675]=new Array("盈江县","德宏自治州");
		
		lm2[2676]=new Array("陇川县","德宏自治州");
		
		lm2[2677]=new Array("泸水县","怒江傈自治州");
		
		lm2[2678]=new Array("福贡县","怒江傈自治州");
		
		lm2[2679]=new Array("贡山独龙族怒族自治县","怒江傈自治州");
		
		lm2[2680]=new Array("兰坪白族普米族自治县","怒江傈自治州");
		
		lm2[2681]=new Array("香格里拉县","迪庆自治州");
		
		lm2[2682]=new Array("德钦县","迪庆自治州");
		
		lm2[2683]=new Array("维西傈僳族自治县","迪庆自治州");
		
		lm2[2684]=new Array("市辖区","拉萨市");
		
		lm2[2685]=new Array("城关区","拉萨市");
		
		lm2[2686]=new Array("林周县","拉萨市");
		
		lm2[2687]=new Array("当雄县","拉萨市");
		
		lm2[2688]=new Array("尼木县","拉萨市");
		
		lm2[2689]=new Array("曲水县","拉萨市");
		
		lm2[2690]=new Array("堆龙德庆县","拉萨市");
		
		lm2[2691]=new Array("达孜县","拉萨市");
		
		lm2[2692]=new Array("墨竹工卡县","拉萨市");
		
		lm2[2693]=new Array("昌都县","昌都地区");
		
		lm2[2694]=new Array("江达县","昌都地区");
		
		lm2[2695]=new Array("贡觉县","昌都地区");
		
		lm2[2696]=new Array("类乌齐县","昌都地区");
		
		lm2[2697]=new Array("丁青县","昌都地区");
		
		lm2[2698]=new Array("察雅县","昌都地区");
		
		lm2[2699]=new Array("八宿县","昌都地区");
		
		lm2[2700]=new Array("左贡县","昌都地区");
		
		lm2[2701]=new Array("芒康县","昌都地区");
		
		lm2[2702]=new Array("洛隆县","昌都地区");
		
		lm2[2703]=new Array("边坝县","昌都地区");
		
		lm2[2704]=new Array("乃东县","山南地区");
		
		lm2[2705]=new Array("扎囊县","山南地区");
		
		lm2[2706]=new Array("贡嘎县","山南地区");
		
		lm2[2707]=new Array("桑日县","山南地区");
		
		lm2[2708]=new Array("琼结县","山南地区");
		
		lm2[2709]=new Array("曲松县","山南地区");
		
		lm2[2710]=new Array("措美县","山南地区");
		
		lm2[2711]=new Array("洛扎县","山南地区");
		
		lm2[2712]=new Array("加查县","山南地区");
		
		lm2[2713]=new Array("隆子县","山南地区");
		
		lm2[2714]=new Array("错那县","山南地区");
		
		lm2[2715]=new Array("浪卡子县","山南地区");
		
		lm2[2716]=new Array("日喀则市","日喀则地区");
		
		lm2[2717]=new Array("南木林县","日喀则地区");
		
		lm2[2718]=new Array("江孜县","日喀则地区");
		
		lm2[2719]=new Array("定日县","日喀则地区");
		
		lm2[2720]=new Array("萨迦县","日喀则地区");
		
		lm2[2721]=new Array("拉孜县","日喀则地区");
		
		lm2[2722]=new Array("昂仁县","日喀则地区");
		
		lm2[2723]=new Array("谢通门县","日喀则地区");
		
		lm2[2724]=new Array("白朗县","日喀则地区");
		
		lm2[2725]=new Array("仁布县","日喀则地区");
		
		lm2[2726]=new Array("康马县","日喀则地区");
		
		lm2[2727]=new Array("定结县","日喀则地区");
		
		lm2[2728]=new Array("仲巴县","日喀则地区");
		
		lm2[2729]=new Array("亚东县","日喀则地区");
		
		lm2[2730]=new Array("吉隆县","日喀则地区");
		
		lm2[2731]=new Array("聂拉木县","日喀则地区");
		
		lm2[2732]=new Array("萨嘎县","日喀则地区");
		
		lm2[2733]=new Array("岗巴县","日喀则地区");
		
		lm2[2734]=new Array("那曲县","那曲地区");
		
		lm2[2735]=new Array("嘉黎县","那曲地区");
		
		lm2[2736]=new Array("比如县","那曲地区");
		
		lm2[2737]=new Array("聂荣县","那曲地区");
		
		lm2[2738]=new Array("安多县","那曲地区");
		
		lm2[2739]=new Array("申扎县","那曲地区");
		
		lm2[2740]=new Array("索县","那曲地区");
		
		lm2[2741]=new Array("班戈县","那曲地区");
		
		lm2[2742]=new Array("巴青县","那曲地区");
		
		lm2[2743]=new Array("尼玛县","那曲地区");
		
		lm2[2744]=new Array("普兰县","阿里地区");
		
		lm2[2745]=new Array("札达县","阿里地区");
		
		lm2[2746]=new Array("噶尔县","阿里地区");
		
		lm2[2747]=new Array("日土县","阿里地区");
		
		lm2[2748]=new Array("革吉县","阿里地区");
		
		lm2[2749]=new Array("改则县","阿里地区");
		
		lm2[2750]=new Array("措勤县","阿里地区");
		
		lm2[2751]=new Array("林芝县","林芝地区");
		
		lm2[2752]=new Array("工布江达县","林芝地区");
		
		lm2[2753]=new Array("米林县","林芝地区");
		
		lm2[2754]=new Array("墨脱县","林芝地区");
		
		lm2[2755]=new Array("波密县","林芝地区");
		
		lm2[2756]=new Array("察隅县","林芝地区");
		
		lm2[2757]=new Array("朗县","林芝地区");
		
		lm2[2758]=new Array("市辖区","西安市");
		
		lm2[2759]=new Array("新城区","西安市");
		
		lm2[2760]=new Array("碑林区","西安市");
		
		lm2[2761]=new Array("莲湖区","西安市");
		
		lm2[2762]=new Array("灞桥区","西安市");
		
		lm2[2763]=new Array("未央区","西安市");
		
		lm2[2764]=new Array("雁塔区","西安市");
		
		lm2[2765]=new Array("阎良区","西安市");
		
		lm2[2766]=new Array("临潼区","西安市");
		
		lm2[2767]=new Array("长安区","西安市");
		
		lm2[2768]=new Array("蓝田县","西安市");
		
		lm2[2769]=new Array("周至县","西安市");
		
		lm2[2770]=new Array("户县","西安市");
		
		lm2[2771]=new Array("高陵县","西安市");
		
		lm2[2772]=new Array("市辖区","铜川市");
		
		lm2[2773]=new Array("王益区","铜川市");
		
		lm2[2774]=new Array("印台区","铜川市");
		
		lm2[2775]=new Array("耀州区","铜川市");
		
		lm2[2776]=new Array("宜君县","铜川市");
		
		lm2[2777]=new Array("市辖区","宝鸡市");
		
		lm2[2778]=new Array("渭滨区","宝鸡市");
		
		lm2[2779]=new Array("金台区","宝鸡市");
		
		lm2[2780]=new Array("陈仓区","宝鸡市");
		
		lm2[2781]=new Array("凤翔县","宝鸡市");
		
		lm2[2782]=new Array("岐山县","宝鸡市");
		
		lm2[2783]=new Array("扶风县","宝鸡市");
		
		lm2[2784]=new Array("眉县","宝鸡市");
		
		lm2[2785]=new Array("陇县","宝鸡市");
		
		lm2[2786]=new Array("千阳县","宝鸡市");
		
		lm2[2787]=new Array("麟游县","宝鸡市");
		
		lm2[2788]=new Array("凤县","宝鸡市");
		
		lm2[2789]=new Array("太白县","宝鸡市");
		
		lm2[2790]=new Array("市辖区","咸阳市");
		
		lm2[2791]=new Array("秦都区","咸阳市");
		
		lm2[2792]=new Array("杨凌区","咸阳市");
		
		lm2[2793]=new Array("渭城区","咸阳市");
		
		lm2[2794]=new Array("三原县","咸阳市");
		
		lm2[2795]=new Array("泾阳县","咸阳市");
		
		lm2[2796]=new Array("乾县","咸阳市");
		
		lm2[2797]=new Array("礼泉县","咸阳市");
		
		lm2[2798]=new Array("永寿县","咸阳市");
		
		lm2[2799]=new Array("彬县","咸阳市");
		
		lm2[2800]=new Array("长武县","咸阳市");
		
		lm2[2801]=new Array("旬邑县","咸阳市");
		
		lm2[2802]=new Array("淳化县","咸阳市");
		
		lm2[2803]=new Array("武功县","咸阳市");
		
		lm2[2804]=new Array("兴平市","咸阳市");
		
		lm2[2805]=new Array("市辖区","渭南市");
		
		lm2[2806]=new Array("临渭区","渭南市");
		
		lm2[2807]=new Array("华县","渭南市");
		
		lm2[2808]=new Array("潼关县","渭南市");
		
		lm2[2809]=new Array("大荔县","渭南市");
		
		lm2[2810]=new Array("合阳县","渭南市");
		
		lm2[2811]=new Array("澄城县","渭南市");
		
		lm2[2812]=new Array("蒲城县","渭南市");
		
		lm2[2813]=new Array("白水县","渭南市");
		
		lm2[2814]=new Array("富平县","渭南市");
		
		lm2[2815]=new Array("韩城市","渭南市");
		
		lm2[2816]=new Array("华阴市","渭南市");
		
		lm2[2817]=new Array("市辖区","延安市");
		
		lm2[2818]=new Array("宝塔区","延安市");
		
		lm2[2819]=new Array("延长县","延安市");
		
		lm2[2820]=new Array("延川县","延安市");
		
		lm2[2821]=new Array("子长县","延安市");
		
		lm2[2822]=new Array("安塞县","延安市");
		
		lm2[2823]=new Array("志丹县","延安市");
		
		lm2[2824]=new Array("吴旗县","延安市");
		
		lm2[2825]=new Array("甘泉县","延安市");
		
		lm2[2826]=new Array("富县","延安市");
		
		lm2[2827]=new Array("洛川县","延安市");
		
		lm2[2828]=new Array("宜川县","延安市");
		
		lm2[2829]=new Array("黄龙县","延安市");
		
		lm2[2830]=new Array("黄陵县","延安市");
		
		lm2[2831]=new Array("市辖区","汉中市");
		
		lm2[2832]=new Array("汉台区","汉中市");
		
		lm2[2833]=new Array("南郑县","汉中市");
		
		lm2[2834]=new Array("城固县","汉中市");
		
		lm2[2835]=new Array("洋县","汉中市");
		
		lm2[2836]=new Array("西乡县","汉中市");
		
		lm2[2837]=new Array("勉县","汉中市");
		
		lm2[2838]=new Array("宁强县","汉中市");
		
		lm2[2839]=new Array("略阳县","汉中市");
		
		lm2[2840]=new Array("镇巴县","汉中市");
		
		lm2[2841]=new Array("留坝县","汉中市");

		
		lm2[2842]=new Array("佛坪县","汉中市");
		
		lm2[2843]=new Array("市辖区","榆林市");
		
		lm2[2844]=new Array("榆阳区","榆林市");
		
		lm2[2845]=new Array("神木县","榆林市");
		
		lm2[2846]=new Array("府谷县","榆林市");
		
		lm2[2847]=new Array("横山县","榆林市");
		
		lm2[2848]=new Array("靖边县","榆林市");
		
		lm2[2849]=new Array("定边县","榆林市");
		
		lm2[2850]=new Array("绥德县","榆林市");
		
		lm2[2851]=new Array("米脂县","榆林市");
		
		lm2[2852]=new Array("佳县","榆林市");
		
		lm2[2853]=new Array("吴堡县","榆林市");
		
		lm2[2854]=new Array("清涧县","榆林市");
		
		lm2[2855]=new Array("子洲县","榆林市");
		
		lm2[2856]=new Array("市辖区","安康市");
		
		lm2[2857]=new Array("汉滨区","安康市");
		
		lm2[2858]=new Array("汉阴县","安康市");
		
		lm2[2859]=new Array("石泉县","安康市");
		
		lm2[2860]=new Array("宁陕县","安康市");
		
		lm2[2861]=new Array("紫阳县","安康市");
		
		lm2[2862]=new Array("岚皋县","安康市");
		
		lm2[2863]=new Array("平利县","安康市");
		
		lm2[2864]=new Array("镇坪县","安康市");
		
		lm2[2865]=new Array("旬阳县","安康市");
		
		lm2[2866]=new Array("白河县","安康市");
		
		lm2[2867]=new Array("市辖区","商洛市");
		
		lm2[2868]=new Array("商州区","商洛市");
		
		lm2[2869]=new Array("洛南县","商洛市");
		
		lm2[2870]=new Array("丹凤县","商洛市");
		
		lm2[2871]=new Array("商南县","商洛市");
		
		lm2[2872]=new Array("山阳县","商洛市");
		
		lm2[2873]=new Array("镇安县","商洛市");
		
		lm2[2874]=new Array("柞水县","商洛市");
		
		lm2[2875]=new Array("市辖区","兰州市");
		
		lm2[2876]=new Array("城关区","兰州市");
		
		lm2[2877]=new Array("七里河区","兰州市");
		
		lm2[2878]=new Array("西固区","兰州市");
		
		lm2[2879]=new Array("安宁区","兰州市");
		
		lm2[2880]=new Array("红古区","兰州市");
		
		lm2[2881]=new Array("永登县","兰州市");
		
		lm2[2882]=new Array("皋兰县","兰州市");
		
		lm2[2883]=new Array("榆中县","兰州市");
		
		lm2[2884]=new Array("市辖区","嘉峪关市");
		
		lm2[2885]=new Array("市辖区","金昌市");
		
		lm2[2886]=new Array("金川区","金昌市");
		
		lm2[2887]=new Array("永昌县","金昌市");
		
		lm2[2888]=new Array("市辖区","白银市");
		
		lm2[2889]=new Array("白银区","白银市");
		
		lm2[2890]=new Array("平川区","白银市");
		
		lm2[2891]=new Array("靖远县","白银市");
		
		lm2[2892]=new Array("会宁县","白银市");
		
		lm2[2893]=new Array("景泰县","白银市");
		
		lm2[2894]=new Array("市辖区","天水市");
		
		lm2[2895]=new Array("秦城区","天水市");
		
		lm2[2896]=new Array("北道区","天水市");
		
		lm2[2897]=new Array("清水县","天水市");
		
		lm2[2898]=new Array("秦安县","天水市");
		
		lm2[2899]=new Array("甘谷县","天水市");
		
		lm2[2900]=new Array("武山县","天水市");
		
		lm2[2901]=new Array("张家川回族自治县","天水市");
		
		lm2[2902]=new Array("市辖区","武威市");
		
		lm2[2903]=new Array("凉州区","武威市");
		
		lm2[2904]=new Array("民勤县","武威市");
		
		lm2[2905]=new Array("古浪县","武威市");
		
		lm2[2906]=new Array("天祝藏族自治县","武威市");
		
		lm2[2907]=new Array("市辖区","张掖市");
		
		lm2[2908]=new Array("甘州区","张掖市");
		
		lm2[2909]=new Array("肃南裕固族自治县","张掖市");
		
		lm2[2910]=new Array("民乐县","张掖市");
		
		lm2[2911]=new Array("临泽县","张掖市");
		
		lm2[2912]=new Array("高台县","张掖市");
		
		lm2[2913]=new Array("山丹县","张掖市");
		
		lm2[2914]=new Array("市辖区","平凉市");
		
		lm2[2915]=new Array("崆峒区","平凉市");
		
		lm2[2916]=new Array("泾川县","平凉市");
		
		lm2[2917]=new Array("灵台县","平凉市");
		
		lm2[2918]=new Array("崇信县","平凉市");
		
		lm2[2919]=new Array("华亭县","平凉市");
		
		lm2[2920]=new Array("庄浪县","平凉市");
		
		lm2[2921]=new Array("静宁县","平凉市");
		
		lm2[2922]=new Array("市辖区","酒泉市");
		
		lm2[2923]=new Array("肃州区","酒泉市");
		
		lm2[2924]=new Array("金塔县","酒泉市");
		
		lm2[2925]=new Array("安西县","酒泉市");
		
		lm2[2926]=new Array("肃北蒙古族自治县","酒泉市");
		
		lm2[2927]=new Array("阿克塞哈萨克族自治县","酒泉市");

		
		lm2[2928]=new Array("玉门市","酒泉市");
		
		lm2[2929]=new Array("敦煌市","酒泉市");
		
		lm2[2930]=new Array("市辖区","庆阳市");
		
		lm2[2931]=new Array("西峰区","庆阳市");
		
		lm2[2932]=new Array("庆城县","庆阳市");
		
		lm2[2933]=new Array("环县","庆阳市");
		
		lm2[2934]=new Array("华池县","庆阳市");
		
		lm2[2935]=new Array("合水县","庆阳市");
		
		lm2[2936]=new Array("正宁县","庆阳市");
		
		lm2[2937]=new Array("宁县","庆阳市");
		
		lm2[2938]=new Array("镇原县","庆阳市");
		
		lm2[2939]=new Array("市辖区","定西市");
		
		lm2[2940]=new Array("安定区","定西市");
		
		lm2[2941]=new Array("通渭县","定西市");
		
		lm2[2942]=new Array("陇西县","定西市");
		
		lm2[2943]=new Array("渭源县","定西市");
		
		lm2[2944]=new Array("临洮县","定西市");
		
		lm2[2945]=new Array("漳县","定西市");
		
		lm2[2946]=new Array("岷县","定西市");
		
		lm2[2947]=new Array("市辖区","陇南市");
		
		lm2[2948]=new Array("武都区","陇南市");
		
		lm2[2949]=new Array("成县","陇南市");
		
		lm2[2950]=new Array("文县","陇南市");
		
		lm2[2951]=new Array("宕昌县","陇南市");
		
		lm2[2952]=new Array("康县","陇南市");
		
		lm2[2953]=new Array("西和县","陇南市");
		
		lm2[2954]=new Array("礼县","陇南市");
		
		lm2[2955]=new Array("徽县","陇南市");
		
		lm2[2956]=new Array("两当县","陇南市");
		
		lm2[2957]=new Array("临夏市","临夏自治州");
		
		lm2[2958]=new Array("临夏县","临夏自治州");
		
		lm2[2959]=new Array("康乐县","临夏自治州");
		
		lm2[2960]=new Array("永靖县","临夏自治州");
		
		lm2[2961]=new Array("广河县","临夏自治州");
		
		lm2[2962]=new Array("和政县","临夏自治州");
		
		lm2[2963]=new Array("东乡族自治县","临夏自治州");
		
		lm2[2964]=new Array("积石山保安族东乡族撒拉族自治县","临夏自治州");
		
		lm2[2965]=new Array("合作市","甘南自治州");
		
		lm2[2966]=new Array("临潭县","甘南自治州");
		
		lm2[2967]=new Array("卓尼县","甘南自治州");
		
		lm2[2968]=new Array("舟曲县","甘南自治州");
		
		lm2[2969]=new Array("迭部县","甘南自治州");
		
		lm2[2970]=new Array("玛曲县","甘南自治州");
		
		lm2[2971]=new Array("碌曲县","甘南自治州");
		
		lm2[2972]=new Array("夏河县","甘南自治州");
		
		lm2[2973]=new Array("市辖区","西宁市");
		
		lm2[2974]=new Array("城东区","西宁市");
		
		lm2[2975]=new Array("城中区","西宁市");
		
		lm2[2976]=new Array("城西区","西宁市");
		
		lm2[2977]=new Array("城北区","西宁市");
		
		lm2[2978]=new Array("大通回族土族自治县","西宁市");
		
		lm2[2979]=new Array("湟中县","西宁市");
		
		lm2[2980]=new Array("湟源县","西宁市");
		
		lm2[2981]=new Array("平安县","海东地区");
		
		lm2[2982]=new Array("民和回族土族自治县","海东地区");
		
		lm2[2983]=new Array("乐都县","海东地区");
		
		lm2[2984]=new Array("互助土族自治县","海东地区");
		
		lm2[2985]=new Array("化隆回族自治县","海东地区");
		
		lm2[2986]=new Array("循化撒拉族自治县","海东地区");
		
		lm2[2987]=new Array("门源回族自治县","海北自治州");
		
		lm2[2988]=new Array("祁连县","海北自治州");
		
		lm2[2989]=new Array("海晏县","海北自治州");
		
		lm2[2990]=new Array("刚察县","海北自治州");
		
		lm2[2991]=new Array("同仁县","黄南自治州");
		
		lm2[2992]=new Array("尖扎县","黄南自治州");
		
		lm2[2993]=new Array("泽库县","黄南自治州");
		
		lm2[2994]=new Array("河南蒙古族自治县","黄南自治州");
		
		lm2[2995]=new Array("共和县","海南自治州");
		
		lm2[2996]=new Array("同德县","海南自治州");
		
		lm2[2997]=new Array("贵德县","海南自治州");
		
		lm2[2998]=new Array("兴海县","海南自治州");
		
		lm2[2999]=new Array("贵南县","海南自治州");
		
		lm2[3000]=new Array("玛沁县","果洛自治州");
		
		lm2[3001]=new Array("班玛县","果洛自治州");
		
		lm2[3002]=new Array("甘德县","果洛自治州");
		
		lm2[3003]=new Array("达日县","果洛自治州");
		
		lm2[3004]=new Array("久治县","果洛自治州");
		
		lm2[3005]=new Array("玛多县","果洛自治州");
		
		lm2[3006]=new Array("玉树县","玉树自治州");
		
		lm2[3007]=new Array("杂多县","玉树自治州");
		
		lm2[3008]=new Array("称多县","玉树自治州");
		
		lm2[3009]=new Array("治多县","玉树自治州");
		
		lm2[3010]=new Array("囊谦县","玉树自治州");
		
		lm2[3011]=new Array("曲麻莱县","玉树自治州");
		
		lm2[3012]=new Array("格尔木市","海西自治州");
		
		lm2[3013]=new Array("德令哈市","海西自治州");
		
		lm2[3014]=new Array("乌兰县","海西自治州");
		
		lm2[3015]=new Array("都兰县","海西自治州");
		
		lm2[3016]=new Array("天峻县","海西自治州");
		
		lm2[3017]=new Array("市辖区","银川市");
		
		lm2[3018]=new Array("兴庆区","银川市");
		
		lm2[3019]=new Array("西夏区","银川市");
		
		lm2[3020]=new Array("金凤区","银川市");
		
		lm2[3021]=new Array("永宁县","银川市");
		
		lm2[3022]=new Array("贺兰县","银川市");
		
		lm2[3023]=new Array("灵武市","银川市");
		
		lm2[3024]=new Array("市辖区","石嘴山市");
		
		lm2[3025]=new Array("大武口区","石嘴山市");
		
		lm2[3026]=new Array("惠农区","石嘴山市");
		
		lm2[3027]=new Array("平罗县","石嘴山市");
		
		lm2[3028]=new Array("市辖区","吴忠市");
		
		lm2[3029]=new Array("利通区","吴忠市");
		
		lm2[3030]=new Array("盐池县","吴忠市");
		
		lm2[3031]=new Array("同心县","吴忠市");
		
		lm2[3032]=new Array("青铜峡市","吴忠市");
		
		lm2[3033]=new Array("市辖区","固原市");
		
		lm2[3034]=new Array("原州区","固原市");
		
		lm2[3035]=new Array("西吉县","固原市");
		
		lm2[3036]=new Array("隆德县","固原市");
		
		lm2[3037]=new Array("泾源县","固原市");
		
		lm2[3038]=new Array("彭阳县","固原市");
		
		lm2[3039]=new Array("市辖区","中卫市");
		
		lm2[3040]=new Array("沙坡头区","中卫市");
		
		lm2[3041]=new Array("中宁县","中卫市");
		
		lm2[3042]=new Array("海原县","中卫市");
		
		lm2[3043]=new Array("市辖区","乌鲁木齐市");
		
		lm2[3044]=new Array("天山区","乌鲁木齐市");
		
		lm2[3045]=new Array("沙依巴克区","乌鲁木齐市");
		
		lm2[3046]=new Array("新市区","乌鲁木齐市");
		
		lm2[3047]=new Array("水磨沟区","乌鲁木齐市");
		
		lm2[3048]=new Array("头屯河区","乌鲁木齐市");
		
		lm2[3049]=new Array("达坂城区","乌鲁木齐市");
		
		lm2[3050]=new Array("东山区","乌鲁木齐市");
		
		lm2[3051]=new Array("乌鲁木齐县","乌鲁木齐市");
		
		lm2[3052]=new Array("市辖区","克拉玛依市");
		
		lm2[3053]=new Array("独山子区","克拉玛依市");
		
		lm2[3054]=new Array("克拉玛依区","克拉玛依市");
		
		lm2[3055]=new Array("白碱滩区","克拉玛依市");
		
		lm2[3056]=new Array("乌尔禾区","克拉玛依市");
		
		lm2[3057]=new Array("吐鲁番市","吐鲁番地区");
		
		lm2[3058]=new Array("鄯善县","吐鲁番地区");
		
		lm2[3059]=new Array("托克逊县","吐鲁番地区");
		
		lm2[3060]=new Array("哈密市","哈密地区");
		
		lm2[3061]=new Array("巴里坤哈萨克自治县","哈密地区");
		
		lm2[3062]=new Array("伊吾县","哈密地区");
		
		lm2[3063]=new Array("昌吉市","昌吉自治州");
		
		lm2[3064]=new Array("阜康市","昌吉自治州");
		
		lm2[3065]=new Array("米泉市","昌吉自治州");
		
		lm2[3066]=new Array("呼图壁县","昌吉自治州");
		
		lm2[3067]=new Array("玛纳斯县","昌吉自治州");
		
		lm2[3068]=new Array("奇台县","昌吉自治州");
		
		lm2[3069]=new Array("吉木萨尔县","昌吉自治州");
		
		lm2[3070]=new Array("木垒哈萨克自治县","昌吉自治州");
		
		lm2[3071]=new Array("博乐市","博尔塔拉州");
		
		lm2[3072]=new Array("精河县","博尔塔拉州");
		
		lm2[3073]=new Array("温泉县","博尔塔拉州");
		
		lm2[3074]=new Array("库尔勒市","巴音郭楞州");
		
		lm2[3075]=new Array("轮台县","巴音郭楞州");
		
		lm2[3076]=new Array("尉犁县","巴音郭楞州");
		
		lm2[3077]=new Array("若羌县","巴音郭楞州");
		
		lm2[3078]=new Array("且末县","巴音郭楞州");
		
		lm2[3079]=new Array("焉耆回族自治县","巴音郭楞州");
		
		lm2[3080]=new Array("和静县","巴音郭楞州");
		
		lm2[3081]=new Array("和硕县","巴音郭楞州");
		
		lm2[3082]=new Array("博湖县","巴音郭楞州");
		
		lm2[3083]=new Array("阿克苏市","阿克苏地区");
		
		lm2[3084]=new Array("温宿县","阿克苏地区");
		
		lm2[3085]=new Array("库车县","阿克苏地区");
		
		lm2[3086]=new Array("沙雅县","阿克苏地区");
		
		lm2[3087]=new Array("新和县","阿克苏地区");
		
		lm2[3088]=new Array("拜城县","阿克苏地区");
		
		lm2[3089]=new Array("乌什县","阿克苏地区");
		
		lm2[3090]=new Array("阿瓦提县","阿克苏地区");
		
		lm2[3091]=new Array("柯坪县","阿克苏地区");
		
		lm2[3092]=new Array("阿图什市","克孜勒苏州");
		
		lm2[3093]=new Array("阿克陶县","克孜勒苏州");
		
		lm2[3094]=new Array("阿合奇县","克孜勒苏州");
		
		lm2[3095]=new Array("乌恰县","克孜勒苏州");
		
		lm2[3096]=new Array("喀什市","喀什地区");
		
		lm2[3097]=new Array("疏附县","喀什地区");
		
		lm2[3098]=new Array("疏勒县","喀什地区");
		
		lm2[3099]=new Array("英吉沙县","喀什地区");
		
		lm2[3100]=new Array("泽普县","喀什地区");
		
		lm2[3101]=new Array("莎车县","喀什地区");
		
		lm2[3102]=new Array("叶城县","喀什地区");
		
		lm2[3103]=new Array("麦盖提县","喀什地区");
		
		lm2[3104]=new Array("岳普湖县","喀什地区");
		
		lm2[3105]=new Array("伽师县","喀什地区");
		
		lm2[3106]=new Array("巴楚县","喀什地区");
		
		lm2[3107]=new Array("塔什库尔干塔吉克自治县","喀什地区");
		
		lm2[3108]=new Array("和田市","和田地区");
		
		lm2[3109]=new Array("和田县","和田地区");
		
		lm2[3110]=new Array("墨玉县","和田地区");
		
		lm2[3111]=new Array("皮山县","和田地区");
		
		lm2[3112]=new Array("洛浦县","和田地区");
		
		lm2[3113]=new Array("策勒县","和田地区");
		
		lm2[3114]=new Array("于田县","和田地区");
		
		lm2[3115]=new Array("民丰县","和田地区");
		
		lm2[3116]=new Array("伊宁市","伊犁自治州");
		
		lm2[3117]=new Array("奎屯市","伊犁自治州");
		
		lm2[3118]=new Array("伊宁县","伊犁自治州");
		
		lm2[3119]=new Array("察布查尔锡伯自治县","伊犁自治州");
		
		lm2[3120]=new Array("霍城县","伊犁自治州");
		
		lm2[3121]=new Array("巩留县","伊犁自治州");
		
		lm2[3122]=new Array("新源县","伊犁自治州");
		
		lm2[3123]=new Array("昭苏县","伊犁自治州");
		
		lm2[3124]=new Array("特克斯县","伊犁自治州");
		
		lm2[3125]=new Array("尼勒克县","伊犁自治州");
		
		lm2[3126]=new Array("塔城市","塔城地区");
		
		lm2[3127]=new Array("乌苏市","塔城地区");
		
		lm2[3128]=new Array("额敏县","塔城地区");
		
		lm2[3129]=new Array("沙湾县","塔城地区");
		
		lm2[3130]=new Array("托里县","塔城地区");
		
		lm2[3131]=new Array("裕民县","塔城地区");
		
		lm2[3132]=new Array("和布克赛尔蒙古自治县","塔城地区");
		
		lm2[3133]=new Array("阿勒泰市","阿勒泰地区");
		
		lm2[3134]=new Array("布尔津县","阿勒泰地区");
		
		lm2[3135]=new Array("富蕴县","阿勒泰地区");
		
		lm2[3136]=new Array("福海县","阿勒泰地区");
		
		lm2[3137]=new Array("哈巴河县","阿勒泰地区");
		
		lm2[3138]=new Array("青河县","阿勒泰地区");
		
		lm2[3139]=new Array("吉木乃县","阿勒泰地区");
		
		lm2[3140]=new Array("石河子市","新疆省辖单位");
		
		lm2[3141]=new Array("阿拉尔市","新疆省辖单位");
		
		lm2[3142]=new Array("图木舒克市","新疆省辖单位");
		
		lm2[3143]=new Array("五家渠市","新疆省辖单位");
		
		lmcount=345;//全国市的数目
		lmcount2=3144;//全国县的数目
//定义函数：用于联动省 和 市 两级-----city为市级下拉框的id名，pro为省下拉框的id 号。 用法：onChange="changepro('省id名','市id名');"///////////////////		
		function changepro(city,pro)
		{
		var city=city;
		var pro=document.getElementById(pro).value;
		var i;
		document.getElementById(city).length=1; 
			for (i=0;i<lmcount;i++){
			if (lm[i][1]==pro){ 
			document.getElementById(city).options[document.getElementById(city).length]=new Option(lm[i][0], lm[i][0]);
			}        
			}
		
		} 
//定义函数：用于联动市 和 县 两级-----county 为县级下拉框的id名，city为市下拉框的id 号。 用法：onChange="changecity('市id名','县id名');"///////////////////		
		function changecity(county,city)
		{
		var county=county;
		var city=document.getElementById(city).value;
		var j;
		document.getElementById(county).length=1; 
			for (j=0;j<lmcount2;j++){
			if (lm2[j][1]==city){ 
			document.getElementById(county).options[document.getElementById(county).length]=new Option(lm2[j][0], lm2[j][0]);
			}        
			}
		
		} 

// JavaScript Document