<?php
namespace zhouyisdk\request;
/**
 * 工具类信息
 */
class Appinfo extends BaseSdk
{


	/**
	 * 工具信息获取方法
	 * @param  string $appid [相关app的对应id]
	 * @return [array]       [app工具的相关信息]
	 */
	public function getAppinfo($appid = '',$pf_code = '')
	{
		$module = 'appinfo';
        $action = 'getAppinfo';

        $params = [
        	'action'		=>	$action,
        	'appid'			=>	$appid,
        ];

        $results = $this->request($module, $params);
  		
        return $results;
	}

	public function yuliu()
	{
		
	}
}