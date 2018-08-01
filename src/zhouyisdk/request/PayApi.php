<?php
namespace zhouyisdk\request;
/**
 * 支付请求类
 */
class PayApi extends BaseSdk
{
	/**
	 * Ali支付
	 * @param  string $order_id   [订单id]
	 * @param  string $payway     [支付方式]
	 * @param  string $isinwechat [是否在微信内部]
	 * @param  string $wpismobile [手机端与pc端区分]
	 * @return [type]             [description]
	 */
	public function Alipay($order_id = '' , $payway = '', $isinwechat = '', $wpismobile = '')
	{
		$module = 'pay';
        $action = 'Alipay';
        $params = [
        	'order_id'		=>	$order_id,
        	'payway'		=> 	$payway, 
        	'paychannel'	=>	$action, 
        	'isinwechat'	=>	$isinwechat,
        	'wpismobile'	=>	$wpismobile,
        ];
        // $params   =   [
        //     'payway'        =>  'alipay',//weixin
        //     'order_id'      =>  '2018070516CLJCWSRWWGDP',
        //     'paychannel'    =>  'Alipay',
        //     'isinwechat'    =>  '0',
        //     'wpismobile'    =>  'pc'
        // ];
        $results = $this->request($module, $params);
        return $results;
	} 

	/**
	 * 威富通接口调用
	 * @param  string $order_id   [订单id]
	 * @param  string $payway     [支付方式]
	 * @param  string $isinwechat [是否在微信内部]
	 * @param  string $wpismobile [手机端与pc端区分]
	 * @return [type]             [description]
	 */
	public function swiftpass($order_id = '' , $payway = '', $isinwechat = '', $wpismobile = '')
	{
		$module = 'pay';
        $action = 'swiftpass';
        $params = [
        	'order_id'		=>	$order_id,
        	'payway'		=> 	$payway, 
        	'paychannel'	=>	$action, 
        	'isinwechat'	=>	$isinwechat,
        	'wpismobile'  	=>	$wpismobile,
        ];
        $results = $this->request($module, $params);
        return $results;
	} 

	/**
	 * 微信接口调用
	 * @param  string $order_id   [订单id]
	 * @param  string $payway     [支付方式]
	 * @param  string $isinwechat [是否在微信内部]
	 * @param  string $wpismobile [手机端与pc端区分]
	 * @return [type]             [description]
	 */
	public function weixin($order_id = '' , $payway = '', $isinwechat = '', $wpismobile = '')
	{
		$module = 'pay';
        $action = 'weixin';
        $params = [
        	'order_id'		=>	$order_id,
        	'payway'		=>	$payway,
        	'paychannel'	=>	$action,
        	'isinwechat'	=>	$isinwechat,
        	'wpismobile'  	=>	$wpismobile,
        ];
        $results = $this->request($module, $params);
        return $results;
	} 
}

// $pay = new PayApi;
// $res = $pay->Alipay();
// echo '<pre>';
// var_dump($res);
// echo '</pre>';