<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class WisataModel extends CI_Model
{

    // start datatables
    var $column_order = array(null, 'nama_member', 'nama_wisata', 'harga', 'lama', 'tgl_bayar', 'tgl_konfirmasi');
    var $column_search = array('nama_member', 'harga', 'lama');
    var $order = array('id' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('pemesanan.*, wisata.nama as nama_wisata, wisata.harga, member.nama as nama_member');
        $this->db->from('pemesanan');
        $this->db->join('wisata', 'wisata.id=pemesanan.id_wisata');
        $this->db->join('member', 'member.id=pemesanan.id_member');
        $i = 0;
        foreach ($this->column_search as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
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
        $this->db->from('pemesanan');
        return $this->db->count_all_results();
    }
    // end datatables


    // func get data wisata
    function getAllWisata()
    {
        $result = $this->db->get('wisata');
        return $result->result_array();
    }

    // func insert data wisata
    function insertWisata($data)
    {
        $this->db->insert('wisata', $data);
    }

    // func ambil id wisata
    function getIdWisata($id)
    {
        $row   = $this->db->get_where('wisata', ['id' => $id]);
        return $row->row_array();
    }
    
    function getIdPost($id)
    {
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->join('admin','admin.id = informasi.admin_id');
        $this->db->where(['informasi.id_info' => $id]);
        return $this->db->get();
    }
    // func edit data
    function updateWisata($row, $data)
    {
        $this->db->where($row);
        $this->db->update('wisata', $data);
    }
    
    function editPost($row, $data)
    {
        $this->db->where($row);
        $this->db->update('informasi', $data);
    }
    
    // func hapus wisata
    function deleteWisata($row)
    {
        $this->db->where($row);
        $this->db->delete('wisata');
    }

    // data member
    function getMemberWisata()
    {
        $result = $this->db->get('member');
        return $result->result_array();
    }

    // func delete member 
    function deleteMember($row)
    {
        $this->db->where($row);
        $this->db->delete('member');
    }

    // pemesanan wisata/kontrakan
    // func insert data pemesanan wisata
    function insertPemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    // ambil seluruh data pemesanan
    function getPemesananData()
    {
        $this->db->select('pemesanan.*, wisata.nama as nama_wisata, wisata.jenis_wisata, wisata.harga, member.email ,member.nama as nama_member');
        $this->db->from('pemesanan');
        $this->db->join('wisata', 'wisata.id=pemesanan.id_wisata', 'LEFT');
        $this->db->join('member', 'member.id=pemesanan.id_member', 'LEFT');
        $result = $this->db->get();
        return $result->result_array();
    }

    // func ambil data pemesanan
    function getPemesananUser()
    {
        $this->db->select('pemesanan.*, wisata.nama as nama_wisata, wisata.jenis_wisata, wisata.harga, member.nama as nama_member');
        $this->db->from('pemesanan');
        $this->db->join('wisata', 'wisata.id=pemesanan.id_wisata', 'LEFT');
        $this->db->join('member', 'member.id=pemesanan.id_member', 'LEFT');
        $this->db->where('id_member', $this->session->userdata('id'));
        $result = $this->db->get();
        return $result->result_array();
    }

    function getPemesananUserr()
    {
        $this->db->select('pemesanan.*, wisata.nama as nama_wisata, wisata.jenis_wisata, wisata.harga, member.nama as nama_member');
        $this->db->from('pemesanan');
        $this->db->join('wisata', 'wisata.id=pemesanan.id_wisata', 'LEFT');
        $this->db->join('member', 'member.id=pemesanan.id_member', 'LEFT');
        $this->db->where('id_member', $this->session->userdata('id'));
        return $this->db->get();
    }

    // func delete data pemesanan
    function deletePemesanan($row)
    {
        $this->db->where($row);
        $this->db->delete('pemesanan');
    }

    // komplain wisata
    function insertKomplain($data)
    {
        $this->db->insert('keluhan', $data);
    }

    // func ambil data komplain
    function getKomplainWisata()
    {
        $this->db->select('ulasan.*, wisata.nama as nama_wisata, member.nama as nama_member');
        $this->db->from('ulasan');
        $this->db->join('wisata', 'wisata.id=ulasan.id_wisata', 'LEFT');
        $this->db->join('member', 'member.id=ulasan.id_member', 'LEFT');
        $result = $this->db->get();
        return $result->result_array();
    }

    // func delete data komplain
    function deleteKomplain($row)
    {
        $this->db->where($row);
        $this->db->delete('keluhan');
    }
    
    function deletePost($row)
    {
        $this->db->where($row);
        $this->db->delete('informasi');
    }


    function data_review($id){
        $this->db->select('ulasan.*,member.nama,member.image');
        $this->db->from('ulasan');
        $this->db->join('member','member.id = ulasan.id_member');
        $this->db->join('wisata', 'wisata.id = ulasan.id_wisata');
        $this->db->where('ulasan.id_wisata',$id);
        return $this->db->get();
    }
}
