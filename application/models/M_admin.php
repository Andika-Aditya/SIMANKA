<?php 
    class M_admin extends CI_Model
    {
        /*----------------------------------------------------------------------------------
        *------ METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN DASHBOARD --------------
        *----------------------------------------------------------------------------------
        */

        // ---------------------------------------------------------------------------------
        // ============================ INFO BOX 1 =========================================
        // ---------------------------------------------------------------------------------

        // Method untuk menghitung total pegawai dengan status "Aktif"
        // SELECT COUNT(*) as TotalPegawaiAktif FROM tb_pegawai WHERE status_pegawai = 'Aktif'
        public function HitungTotalPegawaiAktif(){
            $this->db->select('COUNT(*) as TotalPegawaiAktif');
            $this->db->from('tb_pegawai');
            $this->db->where('status_pegawai', 'Aktif');

            $query = $this->db->get();
            if ($query) {
                $row = $query->row();
                return $row->TotalPegawaiAktif;
            } else {
                return 0; // Jika terjadi kesalahan atau tidak ada hasil
            }
        }

        // Method untuk menghitung total pegawai yang sedang dalam cuti
        // SELECT COUNT(*) as TotalPegawaiCuti FROM tb_cuti WHERE tanggal_selesai_cuti >= NOW()
        public function HitungTotalPegawaiCuti(){
            $this->db->select('COUNT(*) as TotalPegawaiCuti');
            $this->db->from('tb_kehadiran');
            $this->db->where('Status_hadir', 'CUTI');
            $this->db->where('validasi', 'SUDAH');
            $this->db->where('tanggal_selesai >= NOW()', null, false);

            $query = $this->db->get();
            return $query->row()->TotalPegawaiCuti;                
        }


        public function HitungTotalPegawaiIzin(){
            $this->db->select('COUNT(*) as TotalPegawaiIzin');
            $this->db->from('tb_kehadiran');
            $this->db->where('Status_hadir', 'IZIN');
            $this->db->where('validasi', 'SUDAH');
            $this->db->where('tanggal_selesai >= NOW()', null, false);

            $query = $this->db->get();
            return $query->row()->TotalPegawaiIzin;
        }

        // Method untuk menghitung total pegawai yang datang tepat waktu
        // SELECT COUNT(*) as TotalPegawaiTepatWaktu FROM tb_kehadiran WHERE DATE(NOW()) = DATE(tanggal_kehadiran) AND jam_masuk <= '08:00:00';
        public function HitungTotalPegawaiDatangTepatWaktu(){
            $this->db->select('COUNT(*) as TotalPegawaiTepatWaktu');
            $this->db->from('tb_kehadiran');
            $this->db->where('DATE(NOW()) = DATE(tanggal_kehadiran) AND jam_masuk <= "08:00:00"', null, false);

            $query = $this->db->get();
            return $query->row()->TotalPegawaiTepatWaktu;
        }

        // ---------------------------------------------------------------------------------
        // ============================ INFO BOX 2 =========================================
        // ---------------------------------------------------------------------------------

        // Method untuk mengambil data jumlah pegawai
        // Menghitung jumlah pegawai dalam tabel tb_pegawai 
        // SELECT COUNT(id_pegawai) as JumlahPegawai FROM tb_pegawai
        public function tampil_data_jumlah_pegawai(){
            $this->db->select('COUNT(id_pegawai) as JumlahPegawai');
            $this->db->from('tb_pegawai');

            $query = $this->db->get();
            $result = $query->row(); // Mengambil hasil pertama
            return $result->JumlahPegawai;
        }
        
        /*----------------------------------------------------------------------------------
        *------ METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN DATA PEGAWAI -----------
        *----------------------------------------------------------------------------------
        */

        // Method untuk mengambil data pegawai
        // SELECT * FROM tb_pegawai
        public function tampil_data_pegawai(){
            return $this->db->get('tb_pegawai');
        }

        /*----------------------------------------------------------------------------------
        *---------- METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN ABSEN --------------
        *----------------------------------------------------------------------------------
        */

        // Method untuk mengambil data absen pegawai yang sudah digabungkan dengan nama lengkap dan NRP pegawai
        // SELECT tb_kehadiran.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP 
        // FROM tb_kehadiran INNER JOIN tb_pegawai ON tb_kehadiran.id_absenpegawai = tb_pegawai.id_pegawai;
        public function tampil_data_absen(){
            $this->db->select('tb_kehadiran.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
            $this->db->from('tb_kehadiran');
            $this->db->join('tb_pegawai', 'tb_kehadiran.id_absenpegawai = tb_pegawai.id_pegawai');
            
            $query = $this->db->get();
            return $query->result();
        }


        /*----------------------------------------------------------------------------------
        *---------- METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN LAPORAN --------------
        *----------------------------------------------------------------------------------
        */

        // Method untuk mengambil data laporan pegawai
        // SELECT * FROM tb_pegawai
        public function tampil_data_laporan(){
            return $this->db->get('tb_pegawai');
        }

        public function lihat_laporan_pegawai()
        {
            # code...
            $this->db->select('*');
            $this->db->from('tb_pegawai');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function lihat_laporan_absen($tanggal)
        {
            $this->db->select('tb_kehadiran.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
            $this->db->from('tb_kehadiran');
            $this->db->join('tb_pegawai', 'tb_kehadiran.id_absenpegawai = tb_pegawai.id_pegawai');
            $this->db->where("DATE_FORMAT(tanggal_kehadiran, '%Y-%m') =", $tanggal);
            $this->db->where('validasi', 'SUDAH');
            $this->db->order_by('tanggal_kehadiran', 'DESC');
    
            $query = $this->db->get();
            return $query->result();
        }

        /*----------------------------------------------------------------------------------
        *-------------------------- METHOD KELOLA DATA ------------------------------------
        *----------------------------------------------------------------------------------
        */

        // ---------------------------------------------------------------------------------
        // ================ METHOD HAPUS DATA ==============================================
        // ---------------------------------------------------------------------------------

        // Method untuk menghapus data dari tabel
        // DELETE FROM 'tb_pegawai' WHERE 'id_pegawai' = {$id}
        public function hapus_data($id, $tabel){
            $this->db->where('id_pegawai', $id);

            // Menghapus data dari tabel
            $this->db->delete($tabel);

            return $this->db->affected_rows();
        }
        
          // ---------------------------------------------------------------------------------
        // ============================ METHOD GET FOTO ====================================
        // ---------------------------------------------------------------------------------

        // Method untuk mendapatkan nama file foto pegawai berdasarkan ID pegawai
        // SELECT Foto_pegawai FROM tb_pegawai WHERE id_pegawai = {$id}
        // Mendefinisikan fungsi 'get_foto' dengan parameter '$id'
        public function get_foto($id){ 
            
            // Memilih kolom 'Foto_pegawai' dari tabel yang akan ditentukan
            $this->db->select('Foto_pegawai');

            // Menentukan bahwa data akan diambil dari tabel 'tb_pegawai' 
            $this->db->from('tb_pegawai'); 

            // Menambahkan kondisi dimana 'id_pegawai' harus sama dengan '$id'
            $this->db->where('id_pegawai', $id); 

            // Melakukan eksekusi query dan mengembalikan hasilnya sebagai objek baris tunggal
            return $this->db->get()->row(); 
        }

    
        // ---------------------------------------------------------------------------------
        // ============================ METHOD GET DATA ====================================
        // ---------------------------------------------------------------------------------

        // Method untuk mendapatkan data pegawai berdasarkan ID
        // SELECT * FROM 'tb_pegawai' WHERE 'id_pegawai' = {$id}
        public function get_data($id, $table){

            // Mendapatkan data dari tabel berdasarkan ID pegawai
            $this->db->where('id_pegawai', $id);

            return $this->db->get($table)->row();
        }        

        // ---------------------------------------------------------------------------------
        // ============================ METHOD UPDATE ABSEN ================================
        // ---------------------------------------------------------------------------------

        // Mendefinisikan fungsi 'update_absen' dengan parameter '$id' dan '$data'
        public function update_absen($id,$data){ 

            // Menambahkan kondisi dimana 'id_absen' harus sama dengan '$id'
            $this->db->where('id_absen', $id); 

            // Melakukan pembaruan pada tabel 'tb_kehadiran' dengan data yang diberikan
            $this->db->update('tb_kehadiran', $data); 

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi pembaruan ini
            return $this->db->affected_rows(); 
        }

        public function get_old_pw($data, $table)
        {
          $this->db->select('password');
          $this->db->where('id', $data);
      
          return $this->db->get($table)->row();
      
        }

        public function update_user($id, $data, $table)
        {
          $this->db->where('id', $id);
      
          // Mengupdate data di dalam tabel
          $this->db->update($table, $data);
          return $this->db->affected_rows();
        }

        public function get_nama_adm($data, $table)
        {
          $this->db->where('username', $data);
      
          return $this->db->get($table)->row();
      
        }

        public function simpan_perubahan_pangkat($data, $id){
 
            $this->db->where('id_pegawai', $id); 

            // Melakukan pembaruan pada tabel 'tb_kehadiran' dengan data yang diberikan
            $this->db->update('tb_pegawai', $data); 

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi pembaruan ini
            return $this->db->affected_rows(); 
        }

        public function get_pegawai_by_id($pegawai_id) {
            // Sesuaikan dengan nama tabel dan kolom yang sesuai di database Anda
            $this->db->where('id_pegawai', $pegawai_id);
            $query = $this->db->get('tb_pegawai');
    
            // Mengembalikan satu baris hasil query
            return $query->row();
        }

        public function get_pegawai_by_jenis_perubahan_realtime($tanggal) {
            $this->db->select('*');
            $this->db->from('tb_pegawai');
            $this->db->where("DATE_FORMAT(Tgl_perubahan_pangkat, '%Y-%m') =", $tanggal);
            $this->db->where_in('Jenis_perubahan', array('kenaikan', 'penurunan'));
            $this->db->order_by('Pangkat_current', 'ASC');
    
            $query = $this->db->get();
    
            return $query->result();
        }

        public function get_pegawai_by_jenis_perubahan() {
            $this->db->select('*');
            $this->db->from('tb_pegawai');
            $this->db->where_in('Jenis_perubahan', array('kenaikan', 'penurunan'));
            $this->db->order_by('Pangkat_current', 'ASC');
    
            $query = $this->db->get();
    
            return $query->result();
        }

    }
    
?>