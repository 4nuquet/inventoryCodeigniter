<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_model
{
    //received Data
    function create($cod, $name, $cate, $stock, $pBuy, $pSell)
    {
        //Prepare Data
        $data = array(
            'item_name' => $name,
            'item_stock' => $stock,
            'item_category' => $cate,
            'item_pBuy' => $pBuy,
            'item_pSell' => $pSell
        );

        $this->db->insert('tbl_item', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    }

    function show(){

        $query = $this->db->get('tbl_item');

        return $query->result();
    }

    function find($id){

        $data = array(
            'item_id' => $id
        );

        $query = $this->db->get_where('tbl_item', $data);

        return $query->result();
    }

    function edit($id, $name, $cate, $stock, $pBuy, $pSell){

        //Prepare Data
        $data = array(
            'item_id' => $id,
            'item_name' => $name,
            'item_stock' => $stock,
            'item_category' => $cate,
            'item_pBuy' => $pBuy,
            'item_pSell' => $pSell
        );

        $this->db->replace('tbl_item', $data);

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
    
}
