<?php
/**
 * 客户控制器
 */

namespace app\api\controller;

use think\response\Json;
use app\api\service\CustomerService;
use app\common\validate\CustomerValidate;
use app\api\exception\ApiServiceException;

class CustomerController extends ApiBaseController
{
    /**
     * 列表
     * @param CustomerService $service
     * @return Json
     */
    public function index(CustomerService $service): Json
    {
        try {
            $data   = $service->getList($this->param, $this->page, $this->limit);
            $result = [
                'customer' => $data,
            ];

            return api_success($result);
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 添加
     * @param CustomerValidate $validate
     * @param CustomerService $service
     * @return Json
     */
    public function add(CustomerValidate $validate, CustomerService $service): Json
    {
        $check = $validate->scene('api_add')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        $result = $service->createData($this->param);

        return $result ? api_success() : api_error();
    }

    /**
     * 详情
     * @param CustomerValidate $validate
     * @param CustomerService $service
     * @return Json
     */
    public function info(CustomerValidate $validate, CustomerService $service): Json
    {
        $check = $validate->scene('api_info')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        try {

            $result = $service->getDataInfo($this->id);
            return api_success([
                'user_level' => $result,
            ]);

        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 修改
     * @param CustomerService $service
     * @param CustomerValidate $validate
     * @return Json
     */
    public function edit(CustomerService $service, CustomerValidate $validate): Json
    {
        $check = $validate->scene('api_edit')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        try {
            $service->updateData($this->id, $this->param);
            return api_success();
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 删除
     * @param CustomerService $service
     * @param CustomerValidate $validate
     * @return Json
     */
    public function del(CustomerService $service, CustomerValidate $validate): Json
    {
        $check = $validate->scene('api_del')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        try {
            $service->deleteData($this->id);
            return api_success();
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    

    
}
