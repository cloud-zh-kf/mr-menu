<?php
namespace Admin\Controller;
use Think\Controller;
use Tool\PurviewController;
class UserController extends PurviewController {
    public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
            
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
	
	
    /**
     *
     * 导出Excel
     */
    function expOrder(){//导出Excel
        $xlsName  = "user";
        $xlsCell  = array(
        array('username','手机号'),
        array('realname','真实姓名'),
	    array('school','学校'),
        array('profession','院系'),
        array('sex','性别'),
        array('sendtime','注册时间'),
        );
        $xlsModel = M('user');
        $xlsData  = $xlsModel->select();
        foreach ($xlsData as $k => $v)
        {	
              $xlsData[$k]['sendtime']=date('Y-m-d H:i:s',$v['sendtime']);
        }
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
            
    }
		
	
	//显示
    public function Index(){
		$db=D("user");
 		$realname=I('get.realname');
		$tel=I('get.tel');
		$username=I('get.username');
        $search=I('get.search');

 		if($realname) $map['realname']=array('eq',"$realname");
 		if($username) $map['username']=array('like',"%$username%");

        if($search=="导出"){
            $data = $db->field('*')->where($map)->order("id desc")->select();
            foreach ($data as $k => $v){
                $data[$k]['sendtime']=$v['sendtime']=date('Y-m-d H:i:s',$v['sendtime']);
             }

            // 导出Exl
            import("Org.Util.PHPExcel");
            import("Org.Util.PHPExcel.Worksheet.Drawing");
            import("Org.Util.PHPExcel.Writer.Excel2007");
            $objPHPExcel = new \PHPExcel();

            $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);

            $objActSheet = $objPHPExcel->getActiveSheet();

            // 水平居中（位置很重要，建议在最初始位置）
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('I')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('J')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('K')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('L')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('M')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('N')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('O')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('P')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('Q')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('R')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('S')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('T')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('U')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('V')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('W')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('X')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('Y')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('Z')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('T')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objActSheet->setCellValue('A1', '姓名');
            $objActSheet->setCellValue('B1', '性别');
            $objActSheet->setCellValue('C1', '民族');
            $objActSheet->setCellValue('D1', '出生年月');
            $objActSheet->setCellValue('E1', '国籍');
            $objActSheet->setCellValue('F1', '证件类型');
            $objActSheet->setCellValue('G1', '证件号码');
            $objActSheet->setCellValue('H1', '家庭住址');
            $objActSheet->setCellValue('I1', '毕业学校全称');
            $objActSheet->setCellValue('J1', '班级');
            $objActSheet->setCellValue('K1', '班主任');
            $objActSheet->setCellValue('L1', '班主任联系方式');
            $objActSheet->setCellValue('M1', '毕业学校所在地');
            $objActSheet->setCellValue('N1', '毕业学校所在区');
            $objActSheet->setCellValue('O1', '其他地区');
            $objActSheet->setCellValue('P1', '父亲姓名');
            $objActSheet->setCellValue('Q1', '父亲与学生关系');
            $objActSheet->setCellValue('R1', '父亲文化程度');
            $objActSheet->setCellValue('S1', '父亲工作单位');
            $objActSheet->setCellValue('T1', '父亲职务名称');
            $objActSheet->setCellValue('U1', '父亲工作单位地址');
            $objActSheet->setCellValue('V1', '父亲联系电话');
            $objActSheet->setCellValue('W1', '母亲姓名');
            $objActSheet->setCellValue('X1', '母亲与学生关系');
            $objActSheet->setCellValue('Y1', '母亲文化程度');
            $objActSheet->setCellValue('Z1', '母亲工作单位');
            $objActSheet->setCellValue('AA1', '母亲职务名称');
            $objActSheet->setCellValue('AB1', '母亲工作单位地址');
            $objActSheet->setCellValue('AC1', '母亲联系电话');

            $objActSheet->setCellValue('AD1', '其他联系人姓名');
            $objActSheet->setCellValue('AE1', '其他联系人与学生关系');
            $objActSheet->setCellValue('AF1', '其他联系人文化程度');
            $objActSheet->setCellValue('AG1', '其他联系人工作单位');
            $objActSheet->setCellValue('AH1', '其他联系人职务名称');
            $objActSheet->setCellValue('AI1', '其他联系人工作单位地址');
            $objActSheet->setCellValue('AJ1', '其他联系人联系电话');
            $objActSheet->setCellValue('AK1', '优先联系人');
            $objActSheet->setCellValue('AL1', '主要监护人姓名');
            $objActSheet->setCellValue('AM1', '兴趣爱好');
            $objActSheet->setCellValue('AN1', '最擅长的学习方式');
            $objActSheet->setCellValue('AO1', '特长及其水平');
            $objActSheet->setCellValue('AP1', '获奖情况');
            $objActSheet->setCellValue('AQ1', '上传证明材料1');
            $objActSheet->setCellValue('AR1', '上传证明材料2');
            $objActSheet->setCellValue('AS1', '上传证明材料3');
            $objActSheet->setCellValue('AT1', '上传证明材料4');
            $objActSheet->setCellValue('AU1', '上传证明材料5');
            $objActSheet->setCellValue('AV1', '上传证明材料6');
            $objActSheet->setCellValue('AW1', '上传证明材料7');
            $objActSheet->setCellValue('AX1', '上传证明材料8');
            $objActSheet->setCellValue('AY1', '您是通过何种渠道获知我校信息');
            $objActSheet->setCellValue('AZ1', '您在为孩子选择学校时最关心哪些方面:');
            $objActSheet->setCellValue('BA1', '备注:');
            $objActSheet->setCellValue('BB1', '报名时间');
            // 设置个表格宽度
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(20);

            // 垂直居中
            $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('M')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('N')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('O')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('P')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('Q')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('R')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('S')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('T')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('U')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('V')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('W')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('X')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('Y')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('Z')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AA')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AB')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AC')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AD')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AE')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AF')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AG')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AH')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AI')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AJ')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AK')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AL')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AN')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AO')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AP')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AQ')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AR')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AS')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AT')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AU')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AV')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AW')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AX')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AY')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('AZ')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('BA')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('BB')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

            foreach($data as $k=>$v){
                $k +=2;
                $objActSheet->setCellValue('A'.$k, $v['xs_realname']);
                $objActSheet->setCellValue('B'.$k, $v['sex']);
                $objActSheet->setCellValue('C'.$k, $v['mz']);
                $objActSheet->setCellValue('D'.$k, $v['csrq']);
                $objActSheet->setCellValue('E'.$k, $v['gj']);


                // 表格内容
                $objActSheet->setCellValue('F'.$k, $v['zjlx']);
                $objActSheet->setCellValue('G'.$k, $v['zjhm']);
                $objActSheet->setCellValue('H'.$k, $v['jtzz']);
                $objActSheet->setCellValue('I'.$k, $v['byxx']);
                $objActSheet->setCellValue('J'.$k, $v['bj']);
                $objActSheet->setCellValue('K'.$k, $v['bzr']);
                $objActSheet->setCellValue('L'.$k, $v['bzrlxfs']);
                $objActSheet->setCellValue('M'.$k, $v['city']);
                $objActSheet->setCellValue('N'.$k, $v['area']);
                $objActSheet->setCellValue('O'.$k, $v['qtarea']);
                $objActSheet->setCellValue('P'.$k, $v['fq_realname']);
                $objActSheet->setCellValue('Q'.$k, $v['fq_gx']);
                $objActSheet->setCellValue('R'.$k, $v['fq_whcd']);
                $objActSheet->setCellValue('S'.$k, $v['fq_gzdw']);
                $objActSheet->setCellValue('T'.$k, $v['fq_zwmc']);
                $objActSheet->setCellValue('U'.$k, $v['fq_gzdwdz']);
                $objActSheet->setCellValue('V'.$k, $v['fq_lxdh']);
                $objActSheet->setCellValue('W'.$k, $v['mq_realname']);
                $objActSheet->setCellValue('X'.$k, $v['mq_gx']);
                $objActSheet->setCellValue('Y'.$k, $v['mq_whcd']);
                $objActSheet->setCellValue('Z'.$k, $v['mq_gzdw']);
                $objActSheet->setCellValue('AA'.$k, $v['mq_zwmc']);

                $objActSheet->setCellValue('AB'.$k, $v['mq_gzdwdz']);

                $objActSheet->setCellValue('AC'.$k, $v['mq_lxdh']);

                $objActSheet->setCellValue('AD'.$k, $v['qt_realname']);
                $objActSheet->setCellValue('AE'.$k, $v['qt_gx']);
                $objActSheet->setCellValue('AF'.$k, $v['qt_whcd']);
                $objActSheet->setCellValue('AG'.$k, $v['qt_gzdw']);
                $objActSheet->setCellValue('AH'.$k, $v['qt_zwmc']);
                $objActSheet->setCellValue('AI'.$k, $v['qt_gzdwdz']);
                $objActSheet->setCellValue('AJ'.$k, $v['qt_lxdh']);
                $objActSheet->setCellValue('AK'.$k, $v['yxlxr']);
                $objActSheet->setCellValue('AL'.$k, $v['zyjhrxm']);
                $objActSheet->setCellValue('AM'.$k, $v['xqah']);
                $objActSheet->setCellValue('AN'.$k, $v['xxfs']);
                $objActSheet->setCellValue('AO'.$k, $v['tc']);
                $objActSheet->setCellValue('AP'.$k, $v['hj']);


                $objDrawingAQ[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAQ[$k]->setPath('.'.$v['img1']);
                // 设置宽度高度
                $objDrawingAQ[$k]->setHeight(80);//照片高度
                $objDrawingAQ[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAQ[$k]->setCoordinates('AQ'.$k);
                // 图片偏移距离
                $objDrawingAQ[$k]->setOffsetX(12);
                $objDrawingAQ[$k]->setOffsetY(12);
                $objDrawingAQ[$k]->setWorksheet($objPHPExcel->getActiveSheet());

                $objDrawingAR[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAR[$k]->setPath('.'.$v['img2']);
                // 设置宽度高度
                $objDrawingAR[$k]->setHeight(80);//照片高度
                $objDrawingAR[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAR[$k]->setCoordinates('AR'.$k);
                // 图片偏移距离
                $objDrawingAR[$k]->setOffsetX(12);
                $objDrawingAR[$k]->setOffsetY(12);
                $objDrawingAR[$k]->setWorksheet($objPHPExcel->getActiveSheet());

                $objDrawingAS[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAS[$k]->setPath('.'.$v['img3']);
                // 设置宽度高度
                $objDrawingAS[$k]->setHeight(80);//照片高度
                $objDrawingAS[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAS[$k]->setCoordinates('AS'.$k);
                // 图片偏移距离
                $objDrawingAS[$k]->setOffsetX(12);
                $objDrawingAS[$k]->setOffsetY(12);
                $objDrawingAS[$k]->setWorksheet($objPHPExcel->getActiveSheet());

                $objDrawingAT[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAT[$k]->setPath('.'.$v['img4']);
                // 设置宽度高度
                $objDrawingAT[$k]->setHeight(80);//照片高度
                $objDrawingAT[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAT[$k]->setCoordinates('AT'.$k);
                // 图片偏移距离
                $objDrawingAT[$k]->setOffsetX(12);
                $objDrawingAT[$k]->setOffsetY(12);
                $objDrawingAT[$k]->setWorksheet($objPHPExcel->getActiveSheet());


                $objDrawingAU[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAU[$k]->setPath('.'.$v['img5']);
                // 设置宽度高度
                $objDrawingAU[$k]->setHeight(80);//照片高度
                $objDrawingAU[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAU[$k]->setCoordinates('AU'.$k);
                // 图片偏移距离
                $objDrawingAU[$k]->setOffsetX(12);
                $objDrawingAU[$k]->setOffsetY(12);
                $objDrawingAU[$k]->setWorksheet($objPHPExcel->getActiveSheet());


                $objDrawingAV[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAV[$k]->setPath('.'.$v['img6']);
                // 设置宽度高度
                $objDrawingAV[$k]->setHeight(80);//照片高度
                $objDrawingAV[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAV[$k]->setCoordinates('AV'.$k);
                // 图片偏移距离
                $objDrawingAV[$k]->setOffsetX(12);
                $objDrawingAV[$k]->setOffsetY(12);
                $objDrawingAV[$k]->setWorksheet($objPHPExcel->getActiveSheet());

                $objDrawingAW[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAW[$k]->setPath('.'.$v['img7']);
                // 设置宽度高度
                $objDrawingAW[$k]->setHeight(80);//照片高度
                $objDrawingAW[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAW[$k]->setCoordinates('AW'.$k);
                // 图片偏移距离
                $objDrawingAW[$k]->setOffsetX(12);
                $objDrawingAW[$k]->setOffsetY(12);
                $objDrawingAW[$k]->setWorksheet($objPHPExcel->getActiveSheet());

                $objDrawingAX[$k] = new \PHPExcel_Worksheet_Drawing();
                $objDrawingAX[$k]->setPath('.'.$v['img8']);
                // 设置宽度高度
                $objDrawingAX[$k]->setHeight(80);//照片高度
                $objDrawingAX[$k]->setWidth(80); //照片宽度
                /*设置图片要插入的单元格*/
                $objDrawingAX[$k]->setCoordinates('AX'.$k);
                // 图片偏移距离
                $objDrawingAX[$k]->setOffsetX(12);
                $objDrawingAX[$k]->setOffsetY(12);
                $objDrawingAX[$k]->setWorksheet($objPHPExcel->getActiveSheet());

                $objActSheet->setCellValue('AY'.$k, $v['qd']);
                $objActSheet->setCellValue('AZ'.$k, $v['gx']);
                $objActSheet->setCellValue('BA'.$k, $v['bz']);
                $objActSheet->setCellValue('BB'.$k, $v['sendtime']);

                // 表格高度
                $objActSheet->getRowDimension($k)->setRowHeight(80);

            }

            $fileName = '报名信息';
            $date = date("Y-m-d",time());
            $fileName .= "_{$date}.xls";
            $fileName = iconv("utf-8", "gb2312", $fileName);
            //重命名表
            // $objPHPExcel->getActiveSheet()->setTitle('test');
            //设置活动单指数到第一个表,所以Excel打开这是第一个表
            $objPHPExcel->setActiveSheetIndex(0);
            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=\"$fileName\"");
            header('Cache-Control: max-age=0');
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output'); //文件通过浏览器下载
            // END
        }

        $count = $db->where($map)->count();
		$Page = new \Think\AdminPage($count,10);
 		
		$show = $Page->show();
		$list = $db->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
  		
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
    }
	

	//更新
    public function Show($id){
        $sys_guestid=cookie('sys_guestid');
        $db=D("user");
        $vs=$db->where("id='$id'")->order('id desc')->find();
        if(IS_POST){
            if(isset($_FILES['img1']) && $_FILES['img1']['error'] == 0){
                $ret = uploadimgOne('img1', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img1'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img2']) && $_FILES['img2']['error'] == 0){
                $ret = uploadimgOne('img2', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img2'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img3']) && $_FILES['img3']['error'] == 0){
                $ret = uploadimgOne('img3', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img3'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img4']) && $_FILES['img4']['error'] == 0){
                $ret = uploadimgOne('img4', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img4'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img5']) && $_FILES['img5']['error'] == 0){
                $ret = uploadimgOne('img5', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img5'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img6']) && $_FILES['img6']['error'] == 0){
                $ret = uploadimgOne('img6', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img6'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img7']) && $_FILES['img7']['error'] == 0){
                $ret = uploadimgOne('img7', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img7'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }
            if(isset($_FILES['img8']) && $_FILES['img8']['error'] == 0){
                $ret = uploadimgOne('img8', 'files', array(
                ));
                if($ret['ok'] == 1){
                    $_POST['img8'] = $ret['newsavepath'];
                }else {
                    $this->myerror($ret['error']);
                }
            }

            $_POST['id']=$id;
            $db->create();
            if($db->save()!== false){
                $this->mysuccess("修改成功","Admin-User-Show-id-{$id}.html");
                exit();
            }else{
                $this->myerror("修改失败");
            }
        }

        $this->assign('vs',$vs);
        $this->display();
    }
 	
	//审核
	public function Audit($id){
		$db=D("user");
		$list=$db->field("status")->find($id);
		$status=$list['status'];
		$_POST['id']=$id;
		$_POST['status']= $status ? 0 : 1;
		$db->create();
  		if($db->save()){
			sys_log("审核会员:(id:$id)");
			$this->success("审核成功！",U("User/Index"));
		}else{
			$this->error("审核失败！");
		}
	}
	
	//删除
	public function Del(){
		$db=M("user");
		$did=I('post.checkid');
		if(!empty($did) && is_array($did)){
			$id=implode(",",$did);
			$vs=$db->field('img1')->where("id={$id}")->find();
			$img1=$vs['img1'];
 
			foreach ($did as $k=>$v){
				F("user_{$v}",NULL,TEMP_PATH);//删除缓存
			}
			if($db->delete($id)){
 				sys_log("删除会员:(id:$id)");
				$this->success("删除成功！",U("User/Index"));
			}else{
				$this->error("删除失败！");
			}
		}else{
			$this->error('请选择删除信息!');
		}
	}
}

?>