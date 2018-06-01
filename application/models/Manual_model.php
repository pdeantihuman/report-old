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

class Manual_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getById($id){
        //获取左子内容和右子内容的指针，注意，并非子树的指针
        $this->db->select('leftChild, rightChild');
        $this->db->where('content',$id);
        $node = $this->db->get('structure')->row_array();
        //获取当前节点的内容
        $this->db->select('content');
        $this->db->where('id',$id);
        $content = $this->db->get('manual')->row_array()['content'];
        $data = [
            'content' => $content,
            'leftChild' => $node['leftChild'],
            'rightChild' => $node['rightChild']
        ];
        return $data;
    }
}