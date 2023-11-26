<?php 
class M_pegawai extends CI_Model {

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
        $this->db->from('tb_cuti');
        $this->db->where('tanggal_selesai_cuti >= NOW()', null, false);

        $query = $this->db->get();
        return $query->row()->TotalPegawaiCuti;                
    }

    // Method untuk menghitung total pegawai yang sedang dinilai kinerjanya
    // SELECT COUNT(*) as TotalPegawaiDinilaiKinerja FROM tb_evaluasikerja WHERE tanggal_selesai_evaluasi >= NOW()
    public function HitungTotalPegawaiDinilai(){
        $this->db->select('COUNT(*) as TotalPegawaiDinilaiKinerja');
        $this->db->from('tb_evaluasikerja');
        $this->db->where('tanggal_selesai_evaluasi >= NOW()', null, false);

        $query = $this->db->get();
        return $query->row()->TotalPegawaiDinilaiKinerja;
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

  // ---------------------------------------------------------------------------------
  // ============================ INFO BOX 2 & PIE CHART  ============================
  // --------------------------------------------------------------------------------- 

    // Method untuk menghitung total pegawai laki-laki
    // SELECT COUNT(*) as TotalPegawai_LK FROM tb_pegawai WHERE Jenis_kelamin = 'Laki-laki'
    public function HitungTotalPegawai_LK(){
        $this->db->select('COUNT(*) as TotalPegawai_LK');
        $this->db->from('tb_pegawai');
        $this->db->where('Jenis_kelamin', 'Laki-laki');

        $query = $this->db->get();
        return $query->row()->TotalPegawai_LK;
    }

    // Method untuk menghitung total pegawai perempuan
    // SELECT COUNT(*) as TotalPegawai_PR FROM tb_pegawai WHERE Jenis_kelamin = 'Perempuan'
    public function HitungTotalPegawai_PR(){
        $this->db->select('COUNT(*) as TotalPegawai_PR');
        $this->db->from('tb_pegawai');
        $this->db->where('Jenis_kelamin', 'Perempuan');

        $query = $this->db->get();
        return $query->row()->TotalPegawai_PR;
    }

  // ---------------------------------------------------------------------------------
  // ============================ DONUT CHART ========================================
  // ---------------------------------------------------------------------------------

    // Method untuk menghitung total pegawai yang menikah
    // SELECT COUNT(*) as TotalPegawai_M FROM tb_pegawai WHERE Status_pernikahan = 'Menikah';
    public function HitungTotalPegawai_M(){
        $this->db->select('COUNT(*) as TotalPegawai_M');
        $this->db->from('tb_pegawai ');
        $this->db->where('Status_pernikahan', 'Menikah');

        $query = $this->db->get();
        return $query->row()->TotalPegawai_M;
    }

    // Method untuk menghitung total pegawai yang belum menikah
    // SELECT COUNT(*) as TotalPegawai_BM FROM tb_pegawai WHERE Status_pernikahan = 'Belum Menikah';
    public function HitungTotalPegawai_BM(){
        $this->db->select('COUNT(*) as TotalPegawai_BM');
        $this->db->from('tb_pegawai');
        $this->db->where('Status_pernikahan', 'Belum Menikah');

        $query = $this->db->get();
        return $query->row()->TotalPegawai_BM;
    }

  // ---------------------------------------------------------------------------------
  // ============================ LINE CHART =========================================
  // ---------------------------------------------------------------------------------

    // Method untuk menghitung jumlah kehadiran pegawai
    // SELECT MONTH(tanggal_kehadiran) AS bulan, COUNT(*) AS jumlah_pegawai_hadir 
    // FROM tb_kehadiran WHERE YEAR(tanggal_kehadiran) = YEAR(CURRENT_DATE()) GROUP BY bulan
    public function statistik_kehadiran_pegawai()
    {
        $this->db->select('MONTH(tanggal_kehadiran) AS bulan, COUNT(*) AS jumlah_pegawai_hadir');
        $this->db->from('tb_kehadiran');
        $this->db->where('YEAR(tanggal_kehadiran) = YEAR(CURRENT_DATE())');
        $this->db->group_by('bulan');
        
        return $this->db->get();
    }

  // ---------------------------------------------------------------------------------
  // ============================ BAR CHART ==========================================
  // ---------------------------------------------------------------------------------

    // Method untuk menghitung jumlah pegawai berdasarkan unit kerja
    // SELECT Unit_kerja, COUNT(*) as Jumlah_pegawaiUK FROM tb_pegawai GROUP BY Unit_kerja
    public function HitungTotalUnitkerja(){
        $this->db->select('Unit_kerja, COUNT(*) as Jumlah_pegawaiUK');
        $this->db->from('tb_pegawai');
        $this->db->group_by('Unit_kerja');

        $query = $this->db->get();
        return $query->result_array(); // Menggunakan result_array() untuk mengambil seluruh hasil query
    }

  // ---------------------------------------------------------------------------------
  // ============================ TABLE ==============================================
  // ---------------------------------------------------------------------------------

    // Method untuk mengambil data cuti yang diajukan pada hari ini
    // SELECT tb_cuti.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP 
    // FROM tb_cuti JOIN tb_pegawai ON tb_cuti.id_cutipegawai = tb_pegawai.id_pegawai 
    // WHERE tb_cuti.tanggal_mulai_cuti = CURDATE();
    public function tampil_data_ajuan_cuti(){
        $this->db->select('tb_cuti.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_cuti');
        $this->db->join('tb_pegawai', 'tb_cuti.id_cutipegawai = tb_pegawai.id_pegawai');
        $this->db->where('tb_cuti.tanggal_mulai_cuti = CURDATE()'); // Menampilkan hanya cuti yang diajukan hari ini

        $query = $this->db->get();
        return $query->result();
    }

    // Method untuk mengambil data izin yang diajukan pada hari ini
    // SELECT tb_izin.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP 
    // FROM tb_izin INNER JOIN tb_pegawai ON tb_izin.id_izinpegawai = tb_pegawai.id_pegawai 
    // WHERE DATE(tb_izin.tanggal_mulai_izin) = CURDATE();
    public function tampil_data_ajuan_izin(){
        $this->db->select('tb_izin.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_izin');
        $this->db->join('tb_pegawai', 'tb_izin.id_izinpegawai = tb_pegawai.id_pegawai');
        $this->db->where('tb_izin.tanggal_mulai_izin = CURDATE()'); // Menampilkan hanya izin yang diajukan hari ini
        
        $query = $this->db->get();
        return $query->result();
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
   *---------- METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN CUTI ---------------
   *----------------------------------------------------------------------------------
  */

    // Method untuk mengambil data cuti pegawai yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_cuti.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP 
    // FROM tb_cuti INNER JOIN tb_pegawai ON tb_cuti.id_cutipegawai = tb_pegawai.id_pegawai;
    public function tampil_data_cuti(){
        $this->db->select('tb_cuti.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_cuti');
        $this->db->join('tb_pegawai', 'tb_cuti.id_cutipegawai = tb_pegawai.id_pegawai');

        $query = $this->db->get();
        return $query->result();
    }

  /*----------------------------------------------------------------------------------
   *---------- METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN IZIN --------------
   *----------------------------------------------------------------------------------
  */

    // Method untuk mengambil data izin pegawai yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_izin.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP FROM tb_izin 
    // INNER JOIN tb_pegawai ON tb_izin.id_izinpegawai = tb_pegawai.id_pegawai;
    public function tampil_data_izin(){
        $this->db->select('tb_izin.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_izin');
        $this->db->join('tb_pegawai', 'tb_izin.id_izinpegawai = tb_pegawai.id_pegawai');

        $query = $this->db->get();
        return $query->result();
    }

  /*----------------------------------------------------------------------------------
   *------ METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN PENGGAJIAN -------------
   *----------------------------------------------------------------------------------
  */

    // Method untuk mengambil data gaji pegawai yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_gaji.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP FROM tb_gaji
    // INNER JOIN tb_pegawai ON tb_gaji.id_gajipegawai = tb_pegawai.id_pegawai;
    public function tampil_data_gaji(){
        $this->db->select('tb_gaji.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_gaji');
        $this->db->join('tb_pegawai', 'tb_gaji.id_gajipegawai = tb_pegawai.id_pegawai');

        $query = $this->db->get();
        return $query->result();
    }

  /*----------------------------------------------------------------------------------
   *---- METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN EVALUSI KINERJA ----------
   *----------------------------------------------------------------------------------
  */

    // Method untuk mengambil data evaluasi kinerja pegawai yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_evaluasikerja.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP
    // FROM tb_evaluasikerja
    // INNER JOIN tb_pegawai ON tb_evaluasikerja.id_evaluasipegawai = tb_pegawai.id_pegawai;
    public function tampil_data_evaluasi_kinerja(){
        $this->db->select('tb_evaluasikerja.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_evaluasikerja');
        $this->db->join('tb_pegawai', 'tb_evaluasikerja.id_evaluasipegawai = tb_pegawai.id_pegawai');

        $query = $this->db->get();
        return $query->result();
    }

  /*----------------------------------------------------------------------------------
   *-------- METHOD UNTUK PROSES PENGAMBILAN DATA UNTUK HALAMAN PROMOSI PEGAWAI ------
   *----------------------------------------------------------------------------------
  */

    // Method untuk mengambil data perubahan jabatan pegawai yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_riwayat_perubahan.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP
    // FROM tb_riwayat_perubahan
    // INNER JOIN tb_pegawai ON tb_riwayat_perubahan.id_pegawai_riwayat_perubahan = tb_pegawai.id_pegawai;
    public function tampil_data_promosi(){
        $this->db->select('tb_riwayat_perubahan.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');
        $this->db->from('tb_riwayat_perubahan');
        $this->db->join('tb_pegawai', 'tb_riwayat_perubahan.id_pegawai_riwayat_perubahan = tb_pegawai.id_pegawai');

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



  /*----------------------------------------------------------------------------------
   *-------------------------- METHOD KELOLA DATA ------------------------------------
   *----------------------------------------------------------------------------------
  */


  // ---------------------------------------------------------------------------------
  // ================ METHOD INPUT DATA ==============================================
  // ---------------------------------------------------------------------------------
    
    // Method untuk memasukkan data ke dalam tabel
    // INSERT INTO tb_pegawai VALUES {$data}.  $data adalah sebuah variabel yang menyimpan data array
    public function input_data($tabel, $data){

        // Memasukkan data inputan ke dalam tabel
        $this->db->insert($tabel, $data);

        return $this->db->affected_rows();
    }

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
  // ============================ METHOD UPDATE DATA =================================
  // ---------------------------------------------------------------------------------

    // Method untuk mengupdate data di dalam tabel
    // UPDATE 'tb_pegawai' SET '$data' WHERE 'id_pegawai' = {$id}
    public function update_data($id, $data, $table){
        $this->db->where('id_pegawai', $id);

        // Mengupdate data di dalam tabel
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

  // ---------------------------------------------------------------------------------
  // ===================== METHOD DETAIL DATA ========================================
  // ---------------------------------------------------------------------------------

    // Method untuk menampilkan detail data dari tabel
    // SELECT * FROM 'tb_pegawai' WHERE {$where}
    public function detail_data($where, $table){
        $this->db->where($where);

        return $this->db->get($table)->row();
    }

  // ---------------------------------------------------------------------------------
  // ============================ METHOD BUKTI ABSEN =================================
  // ---------------------------------------------------------------------------------

    // Method untuk mengambil data butki izin pegawai 
    // yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_kehadiran.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP 
    // FROM tb_kehadiran 
    // JOIN tb_pegawai ON tb_kehadiran.id_absenpegawai = tb_pegawai.id_pegawai WHERE {$where}
    public function buktiAbsen($where) {
        // Menggunakan metode Query Builder untuk memilih kolom yang akan diambil.
        $this->db->select('tb_kehadiran.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');

        // Menentukan tabel utama dari mana data akan diambil, yaitu 'tb_kehadiran'.
        $this->db->from('tb_kehadiran');

        // Melakukan JOIN dengan tabel 'tb_pegawai' 
        // berdasarkan kunci hubungan 'id_absenpegawai' dan 'id_pegawai'.
        $this->db->join('tb_pegawai', 'tb_kehadiran.id_absenpegawai = tb_pegawai.id_pegawai');

        $this->db->where($where);

        // Melakukan eksekusi query dan mengembalikan hasil sebagai array objek.
        $query = $this->db->get();
        return $query->row();
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

  // ---------------------------------------------------------------------------------
  // ============================ METHOD BUKTI IZIN =================================
  // ---------------------------------------------------------------------------------

    // Method untuk mengambil data butki izin pegawai 
    // yang sudah digabungkan dengan nama lengkap dan NRP pegawai
    // SELECT tb_kehadiran.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP 
    // FROM tb_kehadiran 
    // JOIN tb_pegawai ON tb_kehadiran.id_absenpegawai = tb_pegawai.id_pegawai WHERE {$where}
    public function buktiIzin($where) {
        // Menggunakan metode Query Builder untuk memilih kolom yang akan diambil.
        $this->db->select('tb_izin.*, tb_pegawai.Nama_lengkap, tb_pegawai.NRP');

        // Menentukan tabel utama dari mana data akan diambil, yaitu 'tb_kehadiran'.
        $this->db->from('tb_izin');

        // Melakukan JOIN dengan tabel 'tb_pegawai' 
        // berdasarkan kunci hubungan 'id_izinpegawai ' dan 'id_pegawai'.
        $this->db->join('tb_pegawai', 'tb_izin.id_izinpegawai = tb_pegawai.id_pegawai');

        $this->db->where($where);

        // Melakukan eksekusi query dan mengembalikan hasil sebagai array objek.
        $query = $this->db->get();
        return $query->row();
    }

   // ---------------------------------------------------------------------------------
   // ============================ METHOD UPDATE IZIN ================================
   // ---------------------------------------------------------------------------------

    // Mendefinisikan fungsi 'update_izin' dengan parameter '$id' dan '$data'
    public function update_izin($id,$data){ 

        // Menambahkan kondisi dimana 'id_izin' harus sama dengan '$id'
        $this->db->where('id_izin', $id); 

        // Melakukan pembaruan pada tabel 'tb_izin' dengan data yang diberikan
        $this->db->update('tb_izin', $data); 

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi pembaruan ini
        return $this->db->affected_rows(); 
    }

}
?>
