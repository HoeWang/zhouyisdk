<?php
namespace zhouyisdk\request;
/**
 * 免费工具类
 */
class FreeTool extends BaseSdk
{



	/**
	 * 免费工具测试结果请求
	 * @param  [array] $user      [用户信息数组]
	 * @param  string $tool_code  [测试工具的标识]
	 * @return [array]            [测试的结果信息]
	 */
	public function tool($data = [],$users = [],$ln = '')
	{
		$module = 'freetool';
        $action = 'tool';

        $params = [
        	'action'		=>	$action,
        	'data'			=>	$data,
        	'users'			=>	$users,
        	'ln'			=>	$ln
        ];

        $results = $this->request($module, $params);
        return $results;
	}
	public function setcookies($data = [])
	{
		$module = 'freetool';
        $action = 'setcookies';
        $params = [
        	'action'		=>	$action,
        	'data'		=>	$data,
        ];

        $results = $this->request($module, $params);
        return $results;
	}

	/**
	 * 工具信息获取方法
	 * @param  string $appid [相关app的对应id]
	 * @return [array]       [app工具的相关信息]
	 */
	public function getAppinfo($appid = '')
	{
		$module = 'freetool';
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