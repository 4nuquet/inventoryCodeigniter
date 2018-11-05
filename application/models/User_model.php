<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model
{

      //received Data
      function create($nameuser,$identificacionuser,$passuser,$roluser)
      {
        

          //Prepare Data
          $data = array(
              'user_name' => $nameuser,
              'user_nid' => $identificacionuser,
              'user_rol' => $roluser,
              'pass' => $passuser,
              'user_state'=>true
          );
  
          $this->db->insert('tbl_user', $data);
  
          if ($this->db->affected_rows() > 0) {
              return true;
          }else
          {
              return false;
          }
      }


      function show(){

        $query = $this->db->get('tbl_user');

        return $query->result();
    }

    function find($id){

        $data = array(
            'user_id' => $id
        );

        $query = $this->db->get_where('tbl_user', $data);

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

    function edit($id, $name, $nid, $role, $state){

        //Prepare Data
        $data = array(
            'user_id' => $id,
            'user_name' => $name,
            'user_nid' => $nid,
            'user_rol' => $role,
            'user_state' => $state
        );

        //var_dump($data);
        //die();
        
        $this->db->replace('tbl_user', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }else
        {
            return false;
        }
    
    }


}