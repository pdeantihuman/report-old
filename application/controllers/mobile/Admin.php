<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->library('CI_Wechat');
        //    $this->load->model('Profession_model');
        $this->load->model('Event_model');
        $this->load->model('User_model');
        $this->load->model('Wechat_model');
        $this->load->helper('url');

        //    $this->load->model('User_model');
    }

//    //测试函数
//    public function testNotice()
//    {
////        $this->entry();
////        print_r('access_denied');
//        $this->Wechat_model->broadcastEvent(1028);
//        print_r('access_denied');
//    }

//    //入口逻辑
//    public function entry()
//    {
////        $this->setSession();
////        $this->User_model->pushUser($this->session->openid);
//    }

    //设置openid
//    public function setSession()
//    {
//
//        $openid = $this->session->openid;
//        if (isset($openid)) {
//            return;
//        }
//
//
////        $accessToken = $this->ci_wechat->getOauthAccessToken();
//
////        if ($accessToken['openid'] === null) {
////            print_r('access denied');
////        }
////        var_dump($accessToken);
////        $data['openid'] = $accessToken['openid'];
////        $this->session->set_userdata($data);
////        print_r($data['openid'].'1000');
////        exit;
//    }

    //静态页面
    //事件详情页
    public function index()
    {
        $id = $this->input->get('id');
        $data = $this->Event_model->getById($id);
        $this->load->view('mobile/admin/info', $data);
    }

    //成功提交页
    public function success()
    {
        $this->load->view('mobile/admin/success');
    }

    //api
    //提交解决的API
    public function deal()
    {
        $id = $this->input->post('id');
        $state = 1; //[0:'未处理',1:'已处理']
        $this->Event_model->markEvent($id, $state);

        redirect('/m/deal/success');
    }
}
