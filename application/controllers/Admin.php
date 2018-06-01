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
        //    $this->load->model('Profession_model');
        $this->load->model('Event_model');
        //    $this->load->model('User_model');
    }

    public function index()
    {
        $page = $this->input->get('page');
        $limit = $this->input->get('limit');
        if ((!isset($page)) || (!isset($limit))) {//如果其中任何一个没设置，设置成首页的值
            $page = 1;
            $limit = 20; //默认条数为20
        }
        $data['list'] = $this->Event_model->get($page, $limit);
        $data['count'] = $this->Event_model->getCount();
        $data['page'] = $page;
        $this->load->view('administrator', $data);
    }

    public function deal()
    {
        $id = $this->input->post('id');
        $state = 1; //[0:'未处理',1:'已处理']
        $bool = $this->Event_model->markEvent($id, $state);
        if ($bool) {
            $data = [
                'state' => 0, // [0:'成功',1:'失败']
                'message' => '操作成功'
            ];

        } else {
            $data = [
                'state' => 1,
                'message' => '操作失败, 请联系网络中心'
            ];
        }

        echo json_encode($data);
    }
}
