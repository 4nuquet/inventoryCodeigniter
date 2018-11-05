<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_model
{
    //received Data
    function create($data)
    {
        $this->db->insert('tbl_item', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }

    function show(){
        
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->join('tbl_category', 'tbl_item.item_category = tbl_category.cat_id');
        $this->db->join('tbl_picture', 'tbl_item.item_picture = tbl_picture.pic_id ','inner');
        
        $query = $this->db->get();

        return $query->result();
    }

    function find($id){

        $data = array(
            'item_id' => $id
        );

        $query = $this->db->get_where('tbl_item', $data);

        return $query->result();
    }

    function edit($data){

        $this->db->where('item_id', $data['item_id']);
        $this->db->update('tbl_item', $data);


        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }

    function remove($id){

        $this->db->where('item_id', $id);
        $query = $this->db->delete('tbl_item');

        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }else{
            return false;
        }
    }

    function uploadImage($name){

        $data = array(
            'pic_url' => $name
        );

        $exist = $this->db->get_where('tbl_picture', $data);

        if($exist->num_rows() > 0){
            $exist = $exist->row();
            return $exist->pic_id;
        }else {
            $query = $this->db->insert('tbl_picture', $data);

            if ($this->db->affected_rows() > 0) {
                $query = $this->db->get_where('tbl_picture', $data);
                $res = $query->row();
    
                return $res->pic_id;
            }else
            {
                return false;
            }
        }

        

        

    }
    
}
