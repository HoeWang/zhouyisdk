<?php
namespace zhouyisdk\request;
/**
 * 测试请求类
 */
class TestApi extends BaseSdk
{
	/**
	 * 接口连接测试
	 * @return [array] [status,msg] || [code,massage]
	 */
	public function testclient()
	{
		$module = 'testclient';
        $action = 'testclient';
        $params = [
        	'action'		=> 	$action,     
        ];
        $results = $this->request($module, $params);
        return $results;
	}

}

// $test = new TestApi;
// $res = $test->testclient();
// echo '<pre>';
// var_dump($res);
// echo '</pre>';