<?php
/**
 * Created by PhpStorm.
 * User: johnd
 * Date: 2017/9/10
 * Time: 下午10:45
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /**
     * 用于添加事件，若添加成功返回事件id
     *
     * @param $build
     * @param $room
     * @param $description
     * @return int
     */
    public function pushEvent($build, $room, $description)
    {
        $state = 0; //[0:'未处理',1:'已处理']
        $data = [
            'build' => $build,
            'room' => $room,
            'description' => $description,
            'state' => $state
        ];
        $this->db->insert('event', $data);
        return $this->db->insert_id();
    }


    /**
     * 用于获取事件信息，$page为页数，$limit每页最大个数，若$state留空则返回所
     * 有项，按时间排序，若$state=0或1则获取指定状态数据
     *
     * @param $page
     * @param $limit
     */
    public function get($page, $limit, $state = 2) //
    {
        $min = ($page - 1) * $limit;
        $this->db->select('*');
        $this->db->limit($limit, $min);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('event')->result_array();
        return $data;
    }

    public function getCount()
    {
        return $this->db->count_all('event');
    }


    /**
     * 标记事件状态
     *
     * @param $id
     * @param $state
     * @return mixed
     */
    public function markEvent($id, $state)
    {
        $this->db->where('id', $id);
        $data = [
            'state' => $state //[0:'未处理',1:'已处理']
        ];
        return $this->db->update('event', $data);
    }


    /**
     * 根据id检索事件
     *
     * @param $id
     */
    public function getById($id){
        $this->db->where('id',$id);
        $data = $this->db->get('event')->row_array();
        return $data;
    }
}