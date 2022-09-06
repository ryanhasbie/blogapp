<?php

class Blog_model extends CI_Model {

    public function getArtikel ($limit, $offset) {
        if ($this->input->get()) {
            $filter = $this->input->get('find');
            $this->db->like('judul', $filter);
        }
        $this->db->limit($limit,$offset);
        $this->db->order_by('tanggal','desc');
        return $this->db->get("blog");
    }

    public function getTotalArtikel () {
        if ($this->input->get()) {
            $filter = $this->input->get('find');
            $this->db->like('judul', $filter);
        }
        return $this->db->count_all_results("blog");
    }

    public function getSingleArtikel ($field, $value) {
        $this->db->where($field, $value);
        return $this->db->get("blog");
    }

    public function insertArtikel ($data) {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }

    public function updateArtikel ($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $post);
        return $this->db->affected_rows();
    }

    public function deleteArtikel ($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }
}