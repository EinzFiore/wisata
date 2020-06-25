<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MemberModel extends CI_Model
{

    // start datatables
    var $column_order   = ['id', 'nama', 'gender', 'email', 'status', 'telepon'];
    var $column_search  = ['nama', 'gender', 'email', 'status', 'telepon'];
    var $order = ['id'  => 'asc'];

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('member');
        $i = 0;
        foreach ($this->column_search as $member) {
            if (@$_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($member, $_POST['search']['value']);
                } else {
                    $this->db->or_like($member, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from('member');
        return $this->db->count_all_results();
    }
    // end datatables
}
