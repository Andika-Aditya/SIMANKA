<?php 
class M_pegawai extends CI_Model {

    public function input_data($tabel, $data){

        // Memasukkan data inputan ke dalam tabel
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }

      public function update_data($id, $data, $table){
        $this->db->where('id_pegawai', $id);

        // Mengupdate data di dalam tabel
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

      public function input_regis_data($tabel, $data){

        // Memasukkan data inputan ke dalam tabel
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }

    public function get_nama_pg($data, $table)
    {
      $this->db->where('NRP', $data);

      return $this->db->get($table)->row();

    }

      public function get_new_absen($data, $table)
    {
        $this->db->where('NRP', $data);
        $this->db->order_by('tanggal_kehadiran', 'desc'); // Assuming 'tanggal_kehadiran' is the date field
        $this->db->limit(1);

        return $this->db->get($table)->row();
    }


    public function get_data_hadir($data, $table)
    {
      $this->db->where('NRP', $data);
      $this->db->where('Status_hadir', 'HADIR');

      return $this->db->get($table)->result();
    }

    public function get_data_cuti_izin($data, $table)
    {
      $this->db->where('NRP', $data);
      $this->db->where_in('Status_hadir', array('IZIN', 'CUTI'));

      return $this->db->get($table)->result();

    }
    public function get_users($data, $table)
    {
      $this->db->where('user_pg', $data);

      return $this->db->get($table)->row();

    }
    public function get_old_pw($data, $table)
    {
      $this->db->select('pw_pg');
      $this->db->where('id_userpegawai', $data);

      return $this->db->get($table)->row();

    }
    
    public function input_data_absen($tabel, $data){

      // Memasukkan data inputan ke dalam tabel
      $this->db->insert($tabel, $data);

      return $this->db->affected_rows();
    }

    public function update_user($id, $data, $table)
    {
      $this->db->where('id_userpegawai', $id);

      // Mengupdate data di dalam tabel
      $this->db->update($table, $data);
      return $this->db->affected_rows();
    }

    public function is_pegawai_exists($nrp) {
      $this->db->select('NRP');
      $this->db->from('tb_pegawai');
      $this->db->where('NRP', $nrp);

      $query = $this->db->get();

      // Jika jumlah baris hasil query lebih dari 0, berarti data ditemukan
      return ($query->num_rows() > 0);
    }

    public function get_id_pegawai($nrp) {
      // Membuat query SQL
      $this->db->select('id_pegawai');
      $this->db->from('tb_pegawai');
      $this->db->where('NRP', $nrp);

      // Menjalankan query
      $query = $this->db->get();

      // Mengembalikan hasil query
      if ($query->num_rows() > 0) {
          return $query->row()->id_pegawai;
      } else {
          return null;
      }
    }

    public function get_data_by_nrp($nrp) {
      $this->db->select('*');
      $this->db->from('tb_pegawai');
      $this->db->where('NRP', $nrp);
      $this->db->where("(Jenis_perubahan = 'KENAIKAN' OR Jenis_perubahan = 'PENURUNAN')");
      
      $query = $this->db->get();
      return $query->result();
    }

}
?>