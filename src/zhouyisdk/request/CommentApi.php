<?php
namespace zhouyisdk\request;
/**
 * 评论请求类
 */
class CommentApi extends BaseSdk
{
	/**
	 * 订单评论
	 * @param  string  $order_id  [订单id]
	 * @param  integer $manyi     [满意评分]
	 * @param  integer $zhunque   [准确评分]
	 * @param  string  $comment   [评价内容]
	 * @param  string  $from      [评价的来由]
	 * @param  integer $pid       [分类id]
	 * @param  string  $tool_code [工具]
	 * @return [array]            [status，msg]
	 */
	public function postComment($order_id = '', $manyi = 5, $zhunque = 5, $comment = '', $tool_code = '',$from = 'order', $pid = 0 )
	{
		$module = 'comment';
        $action = 'postComment';
        $params = [
        	'order_id'		=>	$order_id,
        	'action'		=> 	$action,
        	'manyi'			=>	$manyi,
        	'zhunque'		=>	$zhunque,
        	'comment'		=>	$comment,
        	'from'			=>	$from,
        	'pid'			=>	$pid,
        	'tool_code'		=>	$tool_code      
        ];

        // $params = [
        //     'order_id'      =>  '2018061419FKWODOLZMOTK',
        //     'manyi'         =>  5,
        //     'zhunque'       =>  5,
        //     'comment'       =>  '非常准确啊！',
        //     'from'          =>  'order',
        //     'pid'           =>  0,
        //     'action' 		=> 	$action,
        //     'tool_code' 	=> 'bzhehun',      
        // ];

        $results = $this->request($module, $params);
        return $results;
	}
}

// $comment = new CommentApi;
// $res = $comment->postComment();
// echo '<pre>';
// var_dump($res);
// echo '</pre>';