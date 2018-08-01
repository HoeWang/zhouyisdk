<?php
namespace zhouyisdk\request;
/**
 * 订单请求类
 */
class OrderApi extends BaseSdk
{
	/**
	 * [handle description]
	 * @param  [array] $users        [用户信息的数组]
	 * @param  [string] $from_id     [来源ID]
	 * @param  [string] $tool_code   [所属付费工具标识]
	 * @param  [string] $name        [名称]
	 * @param  [string] $ffcs_domain [所属付费平台域名]
	 * @param  [string] $ip          [来源IP]
	 * @param  [string] $from_agent  [来源终端类型]
	 * @param  [string] $refer_url   [来源URL]
	 * @param  [int] $id          	 [订单id，有则为修改订单，无为订单入库]
	 * @return [array]              [创建成功返回的相关信息]
	 */
	public function handle($users = [],$from_id,$tool_code,$name,$ffcs_domain,$ip,$from_agent,$refer_url,$id = null)
	{
		$module = 'order';
        $action = 'handle';
        $params = [
        	'users'			=>	$users,
        	'action'		=> 	$action,
            'from_id' 		=> 	$from_id,
            'tool_code'		=> 	$tool_code,
            'name' 			=> 	$name,
            'ffcs_domain' 	=> 	$ffcs_domain,
            'ip' 			=> 	$ip,
            'from_agent' 	=> 	$from_agent,
            'refer_url' 	=> 	$refer_url,
            // 'id'			=>	$id,
        ];

        // $params = [
        //     'users' => [
        //         [   
        //             // 'id'            => 109,
        //             'username'      => '王大仙',
        //             'cal_type'      => '2',//农历
        //             'birthday'      => '2018-06-03 06:02:00',
        //             'sex'           => '2',
        //             'type'          => '1',
        //             'is_tester'     => '1',
        //         ],
        //         [
        //             // 'id'            => 110,
        //             'username'      => '王大仙二号',
        //             'cal_type'      => '1',//农历
        //             'birthday'      => '2018-06-03 06:00:00',
        //             'sex'           => '1',
        //             'type'          => '2',
        //             'is_tester'     => '0',
        //         ],
        //     ],
        //     'from_id'       =>  'QDsmxs3',
        //     'ffcs_domain'   =>  'https://ffcs.smxs.com',
        //     'tool_code'     =>  'bzhh',
        //     'from_agent'    =>  'PC',
        //     'ip'            =>  '127.0.0.2',
        //     'refer_url'     =>  'https://m.smxs.com',
        //     'name'          =>  '大王打算打算',
            
        //     'action'        =>  'handle',
        //     // 'id'            =>  52
        // ];


        if(!is_null($id)){
        	$params['id']	=	$id;
        }

        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 请求结果
	 * @param  string $order_id  [订单号]
	 * @return [array]           [status以及相关信息]
	 */
	public function results($order_id = '')
	{
		$module = 'order';
        $action = 'results';
        $params = [
        	'order_id'		=>	$order_id,
        	'action'		=> 	$action,           
        ];

        // $params   =   [
            
        //     'action'        =>  'results',
        //     'order_id'      =>  '2018062716ZFCZAMCTIPMX'

        // ];

        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 查询订单
	 * @param  [string] $keyword         [可以是手机号，邮箱，订单号]
	 * @param  [array] $historyOrderids  [为ajax请求过来的时候就不需要historyOrderids]
	 * 手机邮箱但订单查询(ajax),手机邮箱历史订单查询(非ajax)
	 * @return [array]                   [对应订单的信息]
	 */
	public function query($keyword = '',$historyOrderids = [] )
	{
		$module = 'order';
        $action = 'query';
        $params = [
        	'action'		=> 	$action,
        	'keyword'		=>	$keyword,           
        ];

        // $params   =   [
        //     'action'        	=>  'query',
        //     'keyword'      		=>  '2018071018JQZOZENOJNNE',
        //     'historyOrderids' 	=> [
        //         '2018071018JQZOZENOJNNE',
        //         '2018070516CLJCWSRWWGDP',
        //         '2018070516HVWPZKROCIIN',
        //         '2018070515TZZKOGBREIDW',
        //         '2018070515BHXMOPUAGPVM'
        //     ],
        // ];

        if($historyOrderids){
        	$params['historyOrderids']	=	$historyOrderids;
        }
        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * ajax请求订单状态
	 * @param  string $order_id  [订单号]
	 * @return [array]           [status和msg对应的信息]
	 */
	public function ajaxGetOrderStatus($order_id = '')
	{
		$module = 'order';
        $action = 'ajaxGetOrderStatus';
        $params = [
        	'order_id'		=>	$order_id,
        	'action'		=> 	$action,           
        ];

        // $params   =   [
        //     'action'        =>  'ajaxGetOrderStatus',
        //     'order_id'      =>  '2018062716ZFCZAMCTIPMX'
        // ];

        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 管理者通过相关日期获取订单信息
	 * @param  [string] $date 		[对应日期]
	 * @return [string] $results  	[对应日期的下单数以及支付订单数]
	 */
	public function adminTempGetOrderByDate($date = '')
	{
		$module = 'order';
        $action = 'adminTempGetOrderByDate';
        $params = [
        	'date'		=>	$date,
        	'action'	=> 	$action,           
        ];
        $params   =   [
            'action'        =>  'adminTempGetOrderByDate',
            'date'          =>  '2018-06-27'
        ];
        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 管理者通过姓名以及生日请求一个礼拜内已支付订单信息
	 * @param  string $username [用户的姓名]
	 * @param  string $birthday [用户的生日]
	 * @return [string]         [展示相关的姓名以及日期对应的支付订单]
	 */
	public function adminTempQueryOrderInfo($username = '', $birthday = '')
	{
		$module = 'order';
        $action = 'adminTempQueryOrderInfo';
        $params = [
        	'username'		=>	$username,
        	'action'		=> 	$action,
        	'birthday'  	=>	$birthday,         
        ];

        // $params   =   [
        //     'action'        =>  'adminTempQueryOrderInfo',
        //     'username'      =>  '王大仙',
        //     'birthday'      =>  '2018-06-03 06:00:00'
        // ];

        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 管理员根据订单id删除订单
	 * @param  string $order_id [订单号]
	 * @return [array]          [['status'=>'','msg'=>'']]
	 */
	public function adminTempDeleteOrderById($order_id = '')
	{
		$module = 'order';
        $action = 'adminTempDeleteOrderById';
        $params = [
        	'order_id'		=>	$order_id,
        	'action'		=> 	$action,           
        ];

        // $params   =   [
        //     'action'        =>  'adminTempDeleteOrderById',
        //     'order_id'      =>  '2018062716PIALIYFNRZYW'
        // ];
        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 管理者改变订单生日信息（传一个birthday是非bzhh测算，当时bzhh测算的时候，传一个birthday1为修改男性的生日，birthday2位修改女性的生日，修改单个只需要传其中一个就行,修改两个人的要都是和原来不一样的生日）
	 * @param  string $order_id  [订单id]
	 * @param  string $birthday  [生日]
	 * @param  string $birthday1 [男性用户生日]
	 * @param  string $birthday2 [女性用户2生日]
	 * @return [string]          [提示信息]
	 */
	public function adminTempChangeOrderBirthday($order_id = '',$birthday = '',$birthday1 = '',$birthday2 = '')
	{
		$module = 'order';
        $action = 'adminTempChangeOrderBirthday';
        $params = [
        	'order_id'		=>	$order_id,
        	'action'		=> 	$action,           
        ];

        // $params   =   [
        //     'action'        =>  'adminTempChangeOrderBirthday',
        //     'order_id'      =>  '2018062716HAFUVNDEXVSU',
        //     'birthday1'     =>  '2018-06-29 09:00:00',
        //     'birthdat2'     =>  '2018-06-29 03:00:00',
        //     //传一个birthday是非bzhh测算，当时bzhh测算的时候，传一个birthday1为修改男性的生日，birthday2位修改女性的生日，修改单个只需要传其中一个就行
        // ];


        if($birthday){
        	$params['birthday']		=	$birthday;
        }
        if($birthday1){
        	$params['birthday1']	=	$birthday1;
        }
        if($birthday2){
        	$params['birthday2']	=	$birthday2;
        }

        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 管理者解绑手机
	 * @param  string $order_id [订单id]
	 * @param  string $mobile   [手机号]
	 * @return [string]         [订单操作成功数量提示]
	 */
	public function adminTempDeletePhone($order_id = '', $mobile='')
	{
		$module = 'order';
        $action = 'adminTempDeletePhone';
        $params = [
        	'order_id'		=>	$order_id,
        	'action'		=> 	$action, 
        	'mobile'		=>	$mobile,          
        ];

        // $params   =   [
        //     'action'        =>  'adminTempDeletePhone',
        //     'order_id'      =>  '2018070515HJVHWALRHMNA',
        //     'mobile'        =>  '18606984608',
        // ];
        $results = $this->request($module, $params);
        return $results;
	}

	

}
// $order = new OrderApi;
// $res = $order->adminTempDeletePhone();
// echo '<pre>';
// var_dump($res);
// echo '</pre>';