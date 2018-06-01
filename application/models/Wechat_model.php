<?php
/**
 * Created by PhpStorm.
 * User: johnd
 * Date: 2017/9/10
 * Time: 下午10:45
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $this->load->model('Event_model');
        $this->load->model('User_model');
        $this->load->library('CI_Wechat');
    }


    /**
     * 用于添加事件，若添加成功返回true, 否则返回false
     *
     * @param $build
     * @param $room
     * @param $description
     * @return bool
     */
    public function sendNotice($id, $openid)
    {
        $url = "http://123.206.59.147/m/admin?id=" . $id;   //生成维修消息url
        $data = $this->Event_model->getById($id);
        $datatmp = [
            "touser" => $openid,
            "template_id" => 'DV4bbRPAyI9WXVQHqBMmOc1dRm0pbOiBhF3TWUWdkrE',
            "url" => $url,
            "topcolor" => "#FF0000",
            "data" => [
                'message' => [
                    'value' => $data['description'],
                    "color" => "#173177"
                ],
                'time' => [
                    'value' => $data['time'],
                    "color" => "#173177"
                ],
                'address' => [
                    'value' => $data['build'] . ' 教 ' . $data['room'] . ' 室',
                    "color" => "#173177"
                ],
            ]
        ];
        $this->ci_wechat->sendTemplateMessage($datatmp);
        return true;
    }

    public function broadcastEvent($id)
    {
        $list = $this->User_model->getAll();
        foreach ($list as $user) {
            $this->sendNotice($id, $user['openid']);
        }
    }
}