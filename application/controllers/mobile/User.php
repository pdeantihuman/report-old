<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        //    $this->load->model('Profession_model');
        $this->load->model('Event_model');
        $this->load->model('Wechat_model');
        $this->load->library('CI_Wechat');
        $this->load->helper('url');
        //    $this->load->model('User_model');
    }


    //微信设置系统
    //微信接口验证，配置文件位于config/wechat
    public function verify()
    {
        $this->ci_wechat->valid();
    }

    //设置菜单
    public function setMenu()
    {
        $data = array(
            "button" => array(
                array(
                    "name" => "服务中心",
                    "sub_button" => array(
                        array('type' => 'view', 'name' => '校园VR', 'url' => 'http://123.206.59.147/m/admin?id=1028'),
                        array('type' => 'view', 'name' => '测试', 'url' => 'http://123.206.59.147/testNotice'),
//                        array('type' => 'click', 'name' => '电费查询', 'key' => 'df'),
//                        array('type' => 'view', 'name' => '校历查询', 'url' => 'http://weixin.henbf.com/url/calenday'),
//                        array('type' => 'view', 'name' => '图书查询', 'url' => 'http://weixin.henbf.com/url/book')
                    )
                ),
//                array(
//                    "name" => "网络服务",
//                    "sub_button" => array(
//                        array('type' => 'view', 'name' => '账号绑定', 'url' => 'http://weixin.henbf.com/url/bind'),
//                        array('type' => 'view', 'name' => '申请开网', 'url' => 'http://weixin.henbf.com/url/net'),
//                        array('type' => 'view', 'name' => '网络报修', 'url' => 'http://weixin.henbf.com/url/repair'),
//                        array('type' => 'view', 'name' => '网络助手', 'url' => 'http://weixin.henbf.com/news/news/')
//                    )
//                ),
//
//                array('type' => 'view', 'name' => '个人中心', 'url' => 'http://weixin.henbf.com/url/ucenter')
            )
        );
        $result = $this->ci_wechat->createMenu($data);
        print_r($result);
    }

    //静态页面
    //成功页面
    public function success()
    {
        $this->load->view('mobile/user/success');
    }

    //手册页
    public function repair()
    {
        $this->load->view('mobile/user/repair');
    }

    //入口
    public function index()
    {
        $this->load->view('mobile/user/index');
    }

    //申请报修
    public function apply()
    {
        $this->load->view('mobile/user/submit');
    }

    //报修申请api
    public function submit()
    {
        $build = $this->input->post('build');
        $room = $this->input->post('room');
        $description = $this->input->post('description');
        $id = $this->Event_model->pushEvent($build, $room, $description); //默认添加未处理状态
        $this->Wechat_model->broadcastEvent($id);// TODO: 这里建议异步
        redirect('/m/submit/success', 'refresh'); //重定向到成功提交页面
    }
}
