<?php
// namespace linxun\zhouyisdk\ext;
require_once './vendor/autoload.php';
use zhouyisdk\request\FreeTool;

// function callSDK($module, $action, ...$arguments)
// {
    
//     $className = sprintf('\zhouyisdk\\request\\%s', $module);
//     $obj = new $className;   
//     return call_user_func_array([$obj, $action], $arguments);
// }
function callSDK($module, $action, ...$arguments)
{
    
    $className = sprintf('\zhouyisdk\\request\\%s', $module);
    $obj = new $className;
    // return call_user_func_array([$obj, $action], $arguments);
    return call_user_func_array([$obj, $action], $arguments);
}

// $users = [
//             [   
//                 // 'id'            => 109,
//                 'username'      => '王大仙',
//                 'cal_type'      => '2',//农历
//                 'birthday'      => '2018-06-03 06:00:00',
//                 'sex'           => '2',
//                 'type'          => '1',
//                 'is_tester'     => '1',
//             ],
//             [
//                 // 'id'            => 110,
//                 'username'      => '王大仙二号',
//                 'cal_type'      => '1',//农历
//                 'birthday'      => '2018-06-03 06:00:00',
//                 'sex'           => '1',
//                 'type'          => '2',
//                 'is_tester'     => '0',
//             ],
//         ];
// $res = callSDK('OrderApi','handle',$users,'QDsmxs3','bzhh','王志伟的测试','https://ffcs.smxs.com','127.0.0.2','PC','https://m.smxs.com');
// $res = callSDK('OrderApi','results','2018073115TPWTFJKPSDBN');

// $res = callSDK('PayApi','Alipay','2018072410ARDPWTRKYMNK','alipay','0','mobile');
// $res = callSDK('CommentApi','postComment','2018070515TZZKOGBREIDW',5,5,'非常准确','hzhh','order',0);
// $res = callSDK('TestApi','testclient');
// $users = [
//             [   
//                 // 'id'            => 109,
//                 'username'      => '王大仙',
//                 'cal_type'      => '1',//农历
//                 'birthday'      => '2011-11-11 11:00:00',
//                 'sex'           => '1',
//                 'type'          => '1',
//                 'is_tester'     => '1',
//             ],
//             [
//                 // 'id'            => 110,
//                 'username'      => '王大仙二号',
//                 'cal_type'      => '1',//农历
//                 'birthday'      => '2018-06-03 06:00:00',
//                 'sex'           => '2',
//                 'type'          => '2',
//                 'is_tester'     => '0',
//             ],
//         ];
// $res = callSDK('FreeTool','tool','hh',$users);
// $res = callSDK('FreeTool','getAppinfo',2);
// $res = callSDK('LingQian','tool','chegong','jieqian','15');
// $res = callSDK('LingQian','getAppinfo',2);


$res = callSDK('FreeTool','getAppinfo',2);
echo '<pre>';
var_dump($res);
echo '</pre>';
