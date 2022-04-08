<?php
/**
 * 首页控制器
 */

declare (strict_types=1);

namespace app\admin\controller;

use app\common\model\User;
use Exception;
use think\facade\View;

class IndexController extends AdminBaseController
{
    /**
     * 后台首页
     * @return string
     * @throws Exception
     */
    public function index (): string
    {
        // 查找一周内注册用户信息
        $user = \app\common\model\User::where ('create_time', '>', time () - 60 * 60 * 24 * 7)->count ();
        $this->assign ([
            'user' => $user,
        ]);
        return $this->fetch ();
    }
}