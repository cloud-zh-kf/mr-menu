<?php
namespace Tool;
use Think\Controller;

class TopController extends Controller {
    function __construct(){
 		parent::__construct();
		$now_ac=CONTROLLER_NAME."-".ACTION_NAME;
 	}
}
?>