<?php
namespace zhouyisdk\request;
// $vendorDir = dirname(dirname(__FILE__));
// $baseDir = dirname($vendorDir);
// require_once($baseDir.'/zhouyisdk/config/ZhouyiConfig.php');
use zhouyisdk\config\ZhouyiConfig;
/**
 *请求类
 */
class BaseSdk
{
	protected 	$appid = null;//pf_code
	protected 	$appkey = null;//key
	private 	$gateway = null;//url:pay user order test comment...
	protected 	$timeout = null;//请求超时设置
	protected 	$debugInfo = '';

	public function __construct()
	{
		$this->setAppID(ZhouyiConfig::APPID);
        $this->setAppKey(ZhouyiConfig::KEY);
        $this->setTimeout(ZhouyiConfig::TIMEOUT);
	}

	/**
     * 设置应用ID
     * @param string $appid 应用ID
     * @return $this
     */
    public function setAppID($appid)
    {
        if (!empty($appid)) {
            $this->appid = $appid;
        }

        return $this;
    }

    /**
     * 设置应用密钥
     * @param string $appkey 应用密钥
     * @return $this
     */
    public function setAppKey($appkey)
    {
        if (!empty($appkey)) {
            $this->appkey = $appkey;
        }

        return $this;
    }

    /**
     * 设置请求网关
     * @param string $gateway 网关
     * @return $this
     */
    public function setGateway($gateway)
    {
        if (!empty($gateway)) {
            $this->gateway = $gateway;
        }

        return $this;
    }

    /**
     * 设置请求超时
     * @param int $timeout 超时(s)
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $timeout = intval($timeout);
        if ($timeout > 0) {
            $this->timeout = $timeout;
        }

        return $this;
    }


    /**
     * 执行请求
     * @param string $module 模块名
     * @param string $action 方法名
     * @param array $params 参数列表
     * @return array|null
     */
    protected function request($module, $params = [])
    {
    	$this->setGateway($module);//设置网关
    	
    	$data = $params;
    	$data['key']		=	$this->appkey;
    	$data['pf_code']	=	$this->appid;

        // 参数
        ksort($data);
        $access_token_key = strtolower(md5(urldecode(http_build_query($data))));
        $data['access_token_key'] = $access_token_key;
        $url  = ZhouyiConfig::URL . $this->gateway;

        // 执行请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);//todo
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $json_string = curl_exec($ch);
        $this->debugInfo = $json_string;//todo
        curl_close($ch);
        // 解析数据
        $res = json_decode($json_string, true);
        return $res;
    }

}