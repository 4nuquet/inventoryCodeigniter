<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model
{

      //received Data
      function create($nameuser,$identificacionuser,$passuser,$roluser,$resImg)
      {
          //Prepare Data
          $data = array(
              'user_name' => $nameuser,
              'user_nid' => $identificacionuser,
              'user_rol' => $roluser,
              'user_pass' => $passuser,
              'user_state'=>true,
              'user_picture'=>$resImg
          );
  
          $this->db->insert('tbl_user', $data);
  
          if ($this->db->affected_rows() > 0) {
              return true;
          }else
          {
              return false;
          }
      }


      function show($word, $init=FALSE, $mount=FALSE){


        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_picture','tbl_user.user_picture=tbl_picture.pic_id','left');
        $this->db->like('tbl_user.user_name',$word);
        
        $query = $this->db->get();

        return $query->result();
    }

    function find($id){

        $data = array(
            'user_id' => $id
        );

        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_picture','tbl_user.user_picture=tbl_picture.pic_id','left');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        //$query = $this->db->get_where('tbl_user', $data);

        return $query->result();
    }


    function remove($id){

        $this->db->where('user_id', $id);
        $query = $this->db->delete('tbl_user');

        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }else{
            return false;
        }
    }

    function edit($id, $name, $nid, $role, $state,$resImg){

        //Prepare Data
        $data = array(
            'user_id' => $id,
            'user_name' => $name,
            'user_nid' => $nid,
            'user_rol' => $role,
            'user_state' => $state,
            'user_picture'=>$resImg
        );
    $id = $data['user_id'];
        //var_dump($data);
        //die();
        $this->db->where('user_id',$id);
        $this->db->update('tbl_user', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
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