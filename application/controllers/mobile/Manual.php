<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual extends CI_Controller
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
//        $this->load->library('session');
//        $this->load->library('CI_Wechat');
        //    $this->load->model('Profession_model');
        $this->load->model('Manual_model');
//        $this->load->model('User_model');
//        $this->load->model('Wechat_model');
//        $this->load->helper('url');

        //    $this->load->model('User_model');
    }

    public function index()
    {
        $id = $this->input->get('id');
//        $content = $this->Manual_model->getById($id);
        $data = $this->Manual_model->getById($id);
        //设置左子树和右子树的url
        $data['rightChild'] = '/manual?id=' . $data['rightChild'];
        $data['leftChild'] = '/manual?id=' . $data['leftChild'];
        $this->load->view('mobile/manual', $data);
    }
}
