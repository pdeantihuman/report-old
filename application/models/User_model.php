<?php
/**
 * Created by PhpStorm.
 *
 * 谨记，此处User指的是微信用户，即电教中心维修人员
 *
 * User: johnd
 * Date: 2017/9/10
 * Time: 下午10:45
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //is函数
    public function isUser($openid)
    {
        $this->db->select('id');
        $this->db->where('openid', $openid);
        $result = $this->db->get('User')->row_array();
        if (isset($result))
            return true;
        else
            return false;
    }

    //添加新访客
    public function pushUser($openid)
    {
        $data = [
            'openid' => $openid
        ];
        $this->db->insert('User', $data);
        return $this->db->affected_rows() > 0;
    }

    //获取所有维修人员openid
    public function getAll(){
        $this->db->select('openid');
        $result = $this->db->get('User')->result_array();
        return $result;
    }
}