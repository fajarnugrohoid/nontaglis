<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdata1 extends CI_Model{
	
	function __construct()
  {
    parent::__construct();
  }

  function select_data_nontaglis($id = NULL) {
    $noagenda = $id;   
    
    $query = $this->db->query("BEGIN BILL52.PKG_INFOAGENDA.CARI('$noagenda',LCURSOR1,LCURSOR2,LCURSOR3,v); END;");
    return $query->result();   
  }   


  function select_data_nontaglis2($id = NULL) {
    $noagenda = $id;   
    
    $query = $this->db->query("DECLARE 
      v VARCHAR2(100);
      LCURSOR1 SYS_REFCURSOR;
      LCURSOR2 SYS_REFCURSOR;
      LCURSOR3 SYS_REFCURSOR; 

      BEGIN 
      BILL52.PKG_INFOAGENDA.CARI('553000511308190147',LCURSOR1,LCURSOR2,LCURSOR3,v); 
      :to_grid := LCURSOR1;
      END;");
    return $query->result();   
  }   

  function save_data_nontaglis() {		
    $noagenda = $this->input->post('inNoAgenda');			
    $user = $this->input->post('inUser');	

    $query = $this->db->query("BEGIN BILL52.FLAGMANUAL('$noagenda', '$user'); END;");		
    print_r($query);

  }	


  public function get_data($no_agenda){
    $results = '';
    $this->pblmig_db = $this->load->database('pblmig', true);
    if (!$this->pblmig_db) {
      $m = oci_error();
      trigger_error(htmlentities($m['message']), E_USER_ERROR);
    }

<<<<<<< HEAD
    $p1 = $no_agenda;
    $v = '';

    $stid = oci_parse($this->pblmig_db->conn_id, 'begin BILL52.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
    $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
    $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
    $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

    //Send parameters variable  value  lenght
    oci_bind_by_name($stid, ':p1', $p1,18) or die('Error binding string1');
    oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
    oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
    oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
    oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
    //Bind Cursor     put -1

    if(oci_execute($stid)){
      oci_execute($p_cursor1, OCI_DEFAULT);
      oci_fetch_all($p_cursor1, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
      //echo '<br>';
      $results = $cursor;
      //print_r($cursor);  
    }else{
      $e = oci_error($stid);
      $results =  $e['message'];
    } 
    oci_free_statement($stid);
    oci_close($this->pblmig_db->conn_id);

    return $results;

  } 

  /*end ==>*/    
=======
    function select_data_nontaglis($id = NULL) {      
        if(!empty($id)){
        	$query = $this->db->query("SELECT  A.NOAGENDA,NVL(D.IDPEL,A.IDPEL) AS IDPEL,A.UNITUP,
            DECODE(A.JENIS_MK,'C','KOREKSI ALAMAT', A.JENIS_TRANSAKSI) JENIS_TRANSAKSI,
            A.TGLAGENDA AS TGLPERMOHONAN,A.NAMA,
             UPPER((SELECT NAMA FROM BILL52.MASTER_PAKET_SAR SAR
                        WHERE SAR.KD_PAKET_SAR = A.KD_PAKET_SAR)) AS PAKETSAR,
             DECODE (A.pnj, NULL, '', A.pnj || ' ')
                          || A.namapnj
                          || DECODE (A.nobang, NULL, '', ' No. ' || A.nobang || ' ' || a.ketnobang)
                          || DECODE (A.rt, NULL, '', ' RT ' || A.rt)
                          || DECODE (A.rw, NULL, '', ' RW ' || A.rw) AS ALAMAT,
                          DECODE (TRIM(A.NOTELP), NULL, '', ' PELANGGAN : ' || A.NOTELP) 
                          || DECODE (TRIM(A.NOTELP_HP) , NULL, '', '-', '', '0', '', ' / ' || A.NOTELP_HP)
                          || DECODE (TRIM(C.NOTELP_PEMOHON), NULL, '',' PEMOHON : ' || C.NOTELP_PEMOHON) 
                          || DECODE (TRIM(C.NOTELP_HP_PEMOHON) , NULL, '', '-', '', '0', '', ' / ' || C.NOTELP_HP_PEMOHON) AS TELP_HP,
            C.NAMA_PEMOHON AS NAMA_PEMOHON,
            DECODE (c.pnj_pemohon, NULL, '', c.pnj_pemohon || ' ')
                          || c.namapnj_pemohon
                          || DECODE (c.nobang_pemohon, NULL, '', ' No. ' || c.nobang_pemohon || ' ' || c.ketnobang_pemohon)
                          || DECODE (c.rt_pemohon, NULL, '', ' RT ' || c.rt_pemohon)
                          || DECODE (c.rw_pemohon, NULL, '', ' RW ' || c.rw_pemohon)  AS ALAMAT_PEMOHON,
             A.TARIF,A.DAYA,
             B.TARIF_LAMA AS TARIF_LAMA,
             B.DAYA_LAMA AS DAYA_LAMA,
             DECODE((select (select keterangan from BILL52.master_kriteria_pending z where z.kode_kriteria = s.kode_kriteria) alasan_keputusan 
                         from BILL52.trans_realisasi_sambung s where s.noagenda = a.noagenda),null,E.KD_KEPUTUSAN,'P') AS KD_KEPUTUSAN,
             DECODE(A.TGLBATAL,--NULL,E.ALASAN_KEPUTUSAN,
                    NULL,(select (select keterangan from BILL52.master_kriteria_pending z where z.kode_kriteria = s.kode_kriteria) alasan_keputusan 
                         from BILL52.trans_realisasi_sambung s where s.noagenda = a.noagenda),
                    A.ALASANBATAL) AS ALASAN_KEPUTUSAN,
             a.nokolektif,
             decode((SELECT JENISPP FROM SECMAN.USERTAB WHERE ID_USER = a.PETUGASCATAT), '99', 'WEB ONLINE', '05', 'LOKET', '01', 'CALL CENTER',' ') asalmohon,
             (select (select namabank from BILL52.master_kode_bank where kd_bank = z.kd_bank) from BILL52.trans_ftul235 z where z.noagenda = a.noagenda) namabank,
             (select norekening from BILL52.trans_ftul235 where noagenda = a.noagenda) norekening,
             (select namadirekening from BILL52.trans_ftul235 where noagenda = a.noagenda) namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             a.kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             (select koordinatx from BILL52.trans_flow_fso where (noagenda,tglcatat) in(
                select noagenda, max(tglcatat) from BILL52.trans_flow_fso  where noagenda=a.noagenda
                group by noagenda
                )) as latitudepetugas,
             (select koordinaty from BILL52.trans_flow_fso where (noagenda,tglcatat) in(
                select noagenda, max(tglcatat) from BILL52.trans_flow_fso  where noagenda=a.noagenda
                group by noagenda
                )) as longitudepetugas ,
                a.koordinat_x latitudepelanggan,
                a.koordinat_y longitudepelanggan,
                (select kd_keperluan || ' (' || keperluan || ')' from BILL52.master_keperluan where kd_keperluan=a.kd_keperluan) keperluan
        FROM BILL52.TRANS_101 A, 
             BILL52.TRANS_101_DATALAMA B,
             BILL52.TRANS_101_PEMOHON C,
             BILL52.TRANS_106 D,
             BILL52.TRANS_KEPUTUSAN E
        WHERE A.NOAGENDA=B.NOAGENDA(+)
            AND A.NOAGENDA=C.NOAGENDA(+)
            AND A.NOAGENDA=D.NOAGENDA(+)
            AND A.NOAGENDA=E.NOAGENDA(+)
            AND A.NOAGENDA='$id'
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'TRANSAKSI BONGKAR' AS JENIS_TRANSAKSI,A.TGL_AGENDA AS TGLPERMOHONAN,A.NAMA,
             NULL AS PAKETSAR,
             DECODE (A.pnj, NULL, '', A.pnj || ' ')
                          || A.namapnj
                          || DECODE (A.nobang, NULL, '', ' No. ' || A.nobang)
                          || DECODE (A.rt, NULL, '', ' RT ' || A.rt)
                          || DECODE (A.rw, NULL, '', ' RW ' || A.rw) 
                          || DECODE (TRIM(A.NOTELP), NULL, '', ' TELP ' || A.NOTELP) AS ALAMAT,
                          ' ' AS TELP_HP,
            ' ' AS NAMA_PEMOHON, ' ' AS ALAMAT_PEMOHON,
             A.TARIF,A.DAYA,
             A.TARIF AS TARIF_LAMA,
             A.DAYA AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan   
        FROM BILL52.TRANS_BONGKAR A, 
             BILL52.TRANS_106 B
        WHERE A.NOAGENDA=B.NOAGENDA(+)
            AND A.NOAGENDA='$id'
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'P2TL' || A.JENISPENETAPAN AS JENIS_TRANSAKSI,A.TGLENTRI AS TGLPERMOHONAN,A.NAMA,
             NULL AS PAKETSAR,
             A.ALAMAT AS ALAMAT, ' ' AS TELP_HP,
            ' ' AS NAMA_PEMOHON, ' ' AS ALAMAT_PEMOHON,
             A.TARIP,A.DAYA,
             A.TARIP AS TARIF_LAMA,
             A.DAYA AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan            
        FROM SIP3NONREK.P2TL A
        WHERE
             A.NOAGENDA='$id'
        UNION ALL
        SELECT A.NOAGENDA,A.PELANGGANSS IDPEL,
             A.UNITUP, 'JBST / PESTA'  AS JENIS_TRANSAKSI,A.TGLENTRI AS TGLPERMOHONAN,A.NAMA_PELANGGAN NAMA,
             NULL AS PAKETSAR,
             A.ALAMAT_PELANGGAN AS ALAMAT, A.TELEPON AS TELP_HP,
             A.NAMA_PEMOHON, A.ALAMAT_PEMOHON,
             A.TARIFBARU TARIP,A.DAYABARU DAYA,
             A.TARIFLAMA AS TARIF_LAMA,
             A.DAYALAMA AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.pelangganss),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             (select koordinatx from BILL52.trans_flow_fso where (noagenda,tglcatat) in(
                select noagenda, max(tglcatat) from BILL52.trans_flow_fso  where noagenda=a.noagenda
                group by noagenda
                )) as latitudepetugas,
             (select koordinaty from BILL52.trans_flow_fso where (noagenda,tglcatat) in(
                select noagenda, max(tglcatat) from BILL52.trans_flow_fso  where noagenda=a.noagenda
                group by noagenda
                )) as longitudepetugas,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan             
        FROM SIP3NONREK.PESTA A
        WHERE A.NOAGENDA='$id'
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'PENGADUAN' JENIS_TRANSAKSI,A.TGL_PENGADUAN AS TGLPERMOHONAN, nvl(B.NAMA,A.NAMA_PENGADU) NAMA,
             NULL AS PAKETSAR,
             DECODE (c.pnj, NULL, '', c.pnj || ' ')
                          ||nvl(c.namapnj, a.alamat_pengadu) 
                          || DECODE (c.nobang, NULL, '', ' No. ' || c.nobang)
                          || DECODE (c.rt, NULL, '', ' RT ' || c.rt)
                          || DECODE (c.rw, NULL, '', ' RW ' || c.rw) AS ALAMAT,' ' AS TELP_HP,
            A.NAMA_PENGADU AS NAMA_PEMOHON,
            A.ALAMAT_PENGADU AS ALAMAT_PEMOHON,
             B.TARIF,B.DAYA,
             '' AS TARIF_LAMA,
             0 AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             decode(a.idpel,'NON-PLG',0,nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0)) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan                      
        FROM BILL52.TRANS_i14 A, BILL52.DIL_MAIN B, BILL52.DIL_ALAMAT C
        WHERE A.IDPEL=B.IDPEL(+) --and a.tglbatal is null
            AND B.IDPEL=C.IDPEL(+)
            AND A.NOAGENDA='$id'
        UNION ALL        
        SELECT A.NOAGENDA, A.IDPEL,
               A.UNITUP, 'GESER METER' AS JENIS_TRANSAKSI,A.TGL_CATAT AS TGLPERMOHONAN, A.NAMA,
               NULL AS PAKETSAR,
               A.PNJ || '.' || TRIM(A.NAMAPNJ) AS ALAMAT, ' ' AS TELP_HP,
               A.NAMA_PEMOHON, A.PNJ_PEMOHON || '.' || TRIM(A.NAMAPNJ_PEMOHON) AS ALAMAT_PEMOHON,
               A.TARIF TARIP, A.DAYA DAYA,
               ' ' AS TARIF_LAMA,
               0 AS DAYA_LAMA,
               ' ' AS KD_KEPUTUSAN,
               ' ' AS ALASAN_KEPUTUSAN,
               ' ' as nokolektif,
               ' ' as asalmohon,
               ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan      
        FROM BILL52.TRANS_GESER_METER A        
        WHERE A.NOAGENDA='$id'
        UNION ALL   
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'TAGIHAN SUSULAN' JENIS_TRANSAKSI,A.TGLCATAT AS TGLPERMOHONAN,A.NAMA,
             '' AS PAKETSAR,
             DECODE (A.pnj, NULL, '', A.pnj || ' ')
                          || A.namapnj
                          || DECODE (A.nobang, NULL, '', ' No. ' || A.nobang)
                          || DECODE (A.rt, NULL, '', ' RT ' || A.rt)
                          || DECODE (A.rw, NULL, '', ' RW ' || A.rw) AS ALAMAT, ' ' AS TELP_HP,
             A.NAMA_PEMOHON AS NAMA_PEMOHON,
             A.ALAMAT_PEMOHON AS ALAMAT_PEMOHON,
             A.TARIF,A.DAYA,
             '' AS TARIF_LAMA,
             0 AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan                
        FROM BILL52.TRANS_TS A
        WHERE A.NOAGENDA = '$id'
        UNION ALL   
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'UPDATE ANGSURAN' JENIS_TRANSAKSI,A.TGLCATAT AS TGLPERMOHONAN,A.NAMA,
             '' AS PAKETSAR,
             DECODE (A.pnj, NULL, '', A.pnj || ' ')
                          || A.namapnj
                          || DECODE (A.nobang, NULL, '', ' No. ' || A.nobang)
                          || DECODE (A.rt, NULL, '', ' RT ' || A.rt)
                          || DECODE (A.rw, NULL, '', ' RW ' || A.rw) AS ALAMAT, ' ' AS TELP_HP,
             A.NAMA_PEMOHON AS NAMA_PEMOHON,
             A.ALAMAT_PEMOHON AS ALAMAT_PEMOHON,
             A.TARIF,A.DAYA,
             '' AS TARIF_LAMA,
             0 AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan           
        FROM BILL52.TRANS_UPDATE_ANGSURAN A
        WHERE A.NOAGENDA = '$id'
    UNION ALL   
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'PB KOLEKTIF' JENIS_TRANSAKSI,A.TGLCATAT AS TGLPERMOHONAN,A.NAMA,
             '' AS PAKETSAR,
             DECODE (A.pnj, NULL, '', A.pnj || ' ')
                          || A.namapnj
                          || DECODE (A.nobang, NULL, '', ' No. ' || A.nobang)
                          || DECODE (A.rt, NULL, '', ' RT ' || A.rt)
                          || DECODE (A.rw, NULL, '', ' RW ' || A.rw) AS ALAMAT, ' ' AS TELP_HP,
             '' AS NAMA_PEMOHON,
             '' AS ALAMAT_PEMOHON,
             NULL TARIF,0 DAYA,
             '' AS TARIF_LAMA,
             0 AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             null as ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan            
        FROM BILL52.TRANS_PB_KOLEKTIF A
        WHERE A.NOAGENDA = '$id'
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             A.UNITUP, 'BERHENTI SEMENTARA' JENIS_TRANSAKSI,A.TGL_CATAT AS TGLPERMOHONAN,A.NAMA,
             '' AS PAKETSAR,
             DECODE (A.pnj, NULL, '', A.pnj || ' ')
                          || A.namapnj
                          || DECODE (A.nobang, NULL, '', ' No. ' || A.nobang)
                          || DECODE (A.rt, NULL, '', ' RT ' || A.rt)
                          || DECODE (A.rw, NULL, '', ' RW ' || A.rw) AS ALAMAT, ' ' AS TELP_HP,
             '' AS NAMA_PEMOHON,
             '' AS ALAMAT_PEMOHON,
             NULL TARIF,0 DAYA,
             '' AS TARIF_LAMA,
             0 AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             NULL as ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan ,
             '' keperluan            
        FROM BILL52.TRANS_PUTUS_SEMENTARA A
        WHERE A.NOAGENDA = '$id'
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             (select UNITUP from BILL52.dil_pdl where idpel=a.idpel) unitup, 'KOMPENSASI UJL' JENIS_TRANSAKSI,A.TGLHITUNG AS TGLPERMOHONAN,
             (select NAMA from BILL52.dil_main where idpel=a.idpel) nama ,
             ' ' AS PAKETSAR,
             (select DECODE (c.pnj, NULL, '', c.pnj || ' ')
                          || c.namapnj
                          || DECODE (c.nobang, NULL, '', ' No. ' || c.nobang)
                          || DECODE (c.rt, NULL, '', ' RT ' || c.rt)
                          || DECODE (c.rw, NULL, '', ' RW ' || c.rw) from BILL52.dil_alamat c where idpel=a.idpel) AS ALAMAT, ' ' AS TELP_HP,
             ' ' AS NAMA_PEMOHON,
             ' ' AS ALAMAT_PEMOHON,
             a.tarif TARIF,
             a.daya DAYA,
             a.tarif_lama AS TARIF_LAMA,
             a.daya_lama AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan             
        FROM BILL52.TRANS_KWH_SISA A
        WHERE A.NOAGENDA = '$id'
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             a.unitup,'KOREKSI PDL ' || a.JENIS_MK JENIS_TRANSAKSI,A.TGLCATAT AS TGLPERMOHONAN,
             a.nama ,
             ' ' AS PAKETSAR,
             (select DECODE (c.pnj, NULL, '', c.pnj || ' ')
                          || c.namapnj
                          || DECODE (c.nobang, NULL, '', ' No. ' || c.nobang)
                          || DECODE (c.rt, NULL, '', ' RT ' || c.rt)
                          || DECODE (c.rw, NULL, '', ' RW ' || c.rw) from BILL52.dil_alamat c where idpel=a.idpel) AS ALAMAT, ' ' AS TELP_HP,
             ' ' AS NAMA_PEMOHON,
             ' ' AS ALAMAT_PEMOHON,
             a.tarif TARIF,
             a.daya DAYA,
             ' ' AS TARIF_LAMA,
             0 AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             '' keperluan             
        FROM BILL52.TRANS_PDL A
        WHERE A.NOMORPDL = '$id'
            AND MK='K' 
            AND NOAGENDA IS NULL
        UNION ALL
        SELECT A.NOAGENDA,A.IDPEL,
             a.unitup, 'MUTASI KOREKSI' JENIS_TRANSAKSI,A.TGLCATAT AS TGLPERMOHONAN,
             (select NAMA from BILL52.dil_main where idpel=a.idpel) nama ,
             ' ' AS PAKETSAR,
             (select DECODE (c.pnj, NULL, '', c.pnj || ' ')
                          || c.namapnj
                          || DECODE (c.nobang, NULL, '', ' No. ' || c.nobang)
                          || DECODE (c.rt, NULL, '', ' RT ' || c.rt)
                          || DECODE (c.rw, NULL, '', ' RW ' || c.rw) from BILL52.dil_alamat c where idpel=a.idpel) AS ALAMAT, ' ' AS TELP_HP,
             ' ' AS NAMA_PEMOHON,
             ' ' AS ALAMAT_PEMOHON,
             a.tarif TARIF,
             a.daya DAYA,
             a.tarif_lama AS TARIF_LAMA,
             a.daya_lama AS DAYA_LAMA,
             ' ' AS KD_KEPUTUSAN,
             ' ' AS ALASAN_KEPUTUSAN,
             ' ' as nokolektif,
             ' ' as asalmohon,
             ' ' as namabank,
             ' ' as norekening,
             ' ' as namadirekening,
             nvl((select rpujl_real from BILL52.dil_bpujl z where z.idpel = a.idpel),0) ujlreal,
             ' ' as kd_paket_sar,
             (select no_sip from bill52.trans_sip where noagenda=a.noagenda) no_sip,
             (select tgljttempo from bill52.trans_sip where noagenda=a.noagenda) tgljttempo,
             '' latitudepetugas,
             '' longitudepetugas ,
             '' latitudepelanggan,
             '' longitudepelanggan,
             (select kd_keperluan || ' (' || keperluan || ')' from BILL52.master_keperluan where kd_keperluan=a.kd_keperluan) keperluan          
        FROM BILL52.TRANS_mutasi_koreksi A
        WHERE A.NOAGENDA = '$id'");
		
		
        return $query->result();
        }        
    }   

	function select_data_nontagliss($id = NULL) {      
        if(!empty($id)){
        	$query2 = $this->db->query("SELECT 'Permohonan' as Keterangan,to_char(tglagenda,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_101
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_mutasi_koreksi
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tgl_agenda,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_bongkar
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglentri,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.P2TL
					        where noagenda='$id' AND TGLBATAL IS NULL 
					         union all
					        SELECT 'Permohonan belum disahkan Manager' as Keterangan,to_char(tglsah,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.P2TL
					        where noagenda='$id' AND TGLBATAL IS NULL AND TGLSAH IS NULL
					        union all
					        SELECT 'Pengesahan Permohonan Manager' as Keterangan,to_char(tglsah,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.P2TL
					        where noagenda='$id' AND TGLBATAL IS NULL AND TGLSAH IS NOT NULL
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglentri,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.PESTA
					        where noagenda='$id' AND TGLBATAL IS NULL
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tgl_pengaduan,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_i14
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_ts
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan belum disahkan Manager' as Keterangan,to_char(tglsah,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_101_angsuran
					        where noagenda='$id' AND TGLSAH IS NULL
					        union all
					        SELECT 'Permohonan belum disahkan Manager' as Keterangan,to_char(tglsah,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_ts
					        where noagenda='$id' AND TGLBATAL IS NULL AND TGLSAH IS NULL
					        union all
					        SELECT 'Pengesahan Permohonan Manager' as Keterangan,to_char(tglsah,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_ts
					        where noagenda='$id' AND TGLBATAL IS NULL AND TGLSAH IS NOT NULL
					        union all
					        SELECT 'Pengesahan ' as Keterangan,to_char(tglsah,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_mutasi_koreksi
					        where noagenda='$id' AND TGLSAH IS NOT NULL
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_update_angsuran
					        where noagenda='$id'
					        UNION ALL
					        SELECT 'Permohonan' as Keterangan, to_char(tgl_CATAT,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_GESER_METER
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglagenda,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pb_kolektif
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tgl_catat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_putus_sementara a
					        where noagenda='$id'
					        union all
					        SELECT 'Permohonan' as Keterangan,to_char(tglhitung,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_kwh_sisa a
					        where noagenda='$id'
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_101
					        where noagenda='$id'
					        and tglbatal is not null
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.P2TL
					        where noagenda='$id' AND TGLBATAL IS NOT NULL 
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.PESTA
					        where noagenda='$id' AND TGLBATAL IS NOT NULL
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_i14
					        where noagenda='$id' AND TGLBATAL IS NOT NULL 
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_ts
					        where noagenda='$id' AND TGLBATAL IS NOT NULL
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_update_angsuran
					        where noagenda='$id' AND TGLBATAL IS NOT NULL 
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_bongkar
					        where noagenda='$id' AND TGLBATAL IS NOT NULL
					        union all
					        SELECT 'Pembatalan Permohonan' as Keterangan,to_char(tglbatal,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pb_kolektif a
					        where noagenda='$id' and A.TGLBATAL is not null
					        union all        
					        SELECT 'Persetujuan' as Keterangan,to_char(tgl_keputusan,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_keputusan
					        where noagenda='$id'
					        and kd_keputusan='S'
					        union all
					        SELECT 'Penangguhan' as Keterangan,to_char(tgl_keputusan,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_keputusan
					        where noagenda='$id'
					        and kd_keputusan='P'
					        union all                
					        SELECT 'Persetujuan' as Keterangan,to_char(TGL_KEPUTUSAN,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_GESER_METER
					        where noagenda='$id'        
					        union all
					        SELECT 'Pembayaran' as Keterangan,to_char(nvl(tgllunas_bank, tgl_106),'dd/MM/yyyy') as tanggal
					        from BILL52.trans_106
					        where noagenda='$id'
					        union all
					        SELECT 'Pembayaran' as Keterangan,to_char(nvl(tgllunas_bank,tgl_106),'dd/MM/yyyy') as tanggal
					        from BILL52.trans_bongkar
					        where noagenda='$id' and nvl(tgllunas_bank,tgl_106) is not null
					        union all
					        SELECT 'Pembayaran' as Keterangan,to_char(tgl_pelunasan,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.DPHNONREKBARU
					        where no_agenda='$id' AND TGLBATALTRANS IS NULL
					        union all
					        SELECT 'Pembayaran' as Keterangan,to_char(tgl_LUNAS,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_GESER_METER
					        where noagenda='$id'
					        union all
					        SELECT 'Pembayaran' as Keterangan,to_char(nvl(tgllunas_bank, A.TGLLUNASBP),'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pb_kolektif a
					        where noagenda='$id' and nvl(tgllunas_bank, A.TGLLUNASBP) is not null
					        union all
					        SELECT 'Pembayaran' as Keterangan,to_char(tgl_lunas,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_putus_sementara
					        where noagenda='$id'
					        union all
					        SELECT 'Pembuatan SPK' as Keterangan,to_char(tglpk,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_109
					        where noagenda='$id'
					        union all        
					        SELECT 'Pembuatan SPK' as Keterangan,to_char(TGL_SPK,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_GESER_METER A
					        where noagenda='$id'   
					        union all
					        SELECT decode(TGL_SPK,null,null,'Pembuatan SPK') as Keterangan,to_char(TGL_SPK ,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_putus_sementara
					        where noagenda='$id'             
					        union all
					        SELECT 'Penangguhan' as Keterangan,to_char(b.tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_101 a, BILL52.trans_realisasi_sambung b
					        where a.noagenda='$id' and a.noagenda = b.noagenda
					        and b.tglsiapsambung is null
					        union all
					        SELECT 'Penangguhan' as Keterangan,to_char(b.tglcatat,'dd/MM/yyyy') as tanggal
					        from sip3nonrek.pesta a, BILL52.trans_realisasi_sambung b
					        where a.noagenda='$id' and a.noagenda = b.noagenda
					        and b.tglsiapsambung is null
					        union all
					        SELECT 'PDL Awal' as Keterangan,to_char(a.tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pdl a, BILL52.trans_realisasi_sambung b
					        where a.noagenda='$id' and a.noagenda = b.noagenda(+)
					          and (b.noagenda is null or b.tglsiapsambung is not null) --and postingpdl in (0,9)
					        union all
					        SELECT 'PDL Awal' as Keterangan,to_char(a.tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pdl a
					        where a.nomorpdl='$id' 
					        and mk='K' and noagenda is null
					        union all
					        SELECT 'Pengesahan PDL' as Keterangan,to_char(tgl_pengesahan,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pdl a, BILL52.trans_realisasi_sambung b
					        where a.noagenda='$id' and a.noagenda = b.noagenda(+)
					          and (b.noagenda is null or b.tglsiapsambung is not null)
					        and postingpdl > 0 --in (1,9)--> 0
					        union all
					        SELECT 'Peremajaan PDL' as Keterangan,to_char(tglperemajaan,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pdl
					        where noagenda='$id'
					        and postingpdl = 2
					        union all
					        SELECT 'Peremajaan PDL' as Keterangan,to_char(a.tglperemajaan,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_pdl a 
					        where a.nomorpdl='$id'
					        and mk='K' and noagenda is null
					        and postingpdl=2
					        union all
					        SELECT 'Peremajaan PDL' as Keterangan,to_char(tgl_pdl,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_update_angsuran
					        where noagenda='$id' and tgl_pdl is not null
					        union all
					        SELECT 'Penetapan SPH' as Keterangan,to_char(tglcatat,'dd/MM/yyyy') as tanggal
					        from BILL52.trans_sph
					        where no_referensi='$id'
					        union all
					        SELECT 'Cetak PK Bongkar' as Keterangan,to_char(tglpkbongkar,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.PESTA
					        where noagenda='$id' AND tglpkbongkar IS NOT NULL
					        union all
					        SELECT 'Realisasi PK Bongkar' as Keterangan,to_char(tglbongkar,'dd/MM/yyyy') as tanggal
					        from SIP3NONREK.PESTA
					        where noagenda='$id' AND tglbongkar IS NOT NULL");
		
		
        return $query2->result();
        }        
    }

    
    function select_data_nontaglisss($id = NULL) {      
        if(!empty($id)){
        	$query3 = $this->db->query("SELECT * FROM
        (SELECT NMPIUTANG, RPBIAYA
        FROM BILL52.TRANS_BEA
        WHERE NOAGENDA='$id'
        --AND RPBIAYA >0
        UNION ALL
        SELECT 'BP' NMPIUTANG, RPBP RPBIAYA 
        FROM BILL52.TRANS_PB_KOLEKTIF P
        WHERE NOAGENDA='$id'
        UNION ALL
        SELECT 'MATERAI' NMPIUTANG, RPMATERAI RPBIAYA 
        FROM BILL52.TRANS_PB_KOLEKTIF P
        WHERE NOAGENDA='$id'
        UNION ALL
        SELECT 'Total' NMPIUTANG, RPBP+RPMATERAI RPBIAYA
        FROM BILL52.TRANS_PB_KOLEKTIF P
        WHERE NOAGENDA='$id'  
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(RPBIAYA) AS RPBIAYA
        FROM BILL52.TRANS_BEA
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(NVL(RP_UJL,0)+NVL(RP_ADMIN,0)+NVL(RP_KWH,0)+NVL(RP_BEBAN,0)+NVL(RP_MATERAI,0)+NVL(RP_PPJ,0)) AS RPBIAYA
        FROM BILL52.TRANS_BONGKAR
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(TOTALP2TL) AS RPBIAYA
        FROM SIP3NONREK.P2TL
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(RP_TOTAL) AS RPBIAYA
        FROM SIP3NONREK.PESTA
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT nvl((select uraian_biaya from BILL52.MASTER_BIAYA
            where kd_biaya=BILL52.TRANS_I14_JAWABAN.kd_biaya),(select uraian_biaya from bill52.x_MASTER_BIAYA
            where kd_biaya=BILL52.TRANS_I14_JAWABAN.kd_biaya)) as NMPIUTANG,RUPIAH AS RPBIAYA
        FROM BILL52.TRANS_I14_JAWABAN
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(RUPIAH) AS RPBIAYA
        FROM BILL52.TRANS_I14_JAWABAN
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(RPTOTAL) AS RPBIAYA
        FROM BILL52.TRANS_TS
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(RPSISAANGSUR_LAMA) AS RPBIAYA
        FROM BILL52.TRANS_UPDATE_ANGSURAN
        WHERE NOAGENDA = '$id' AND KALIANGSUR_BARU = 0
        UNION ALL
        SELECT 'Uang yang dibayar' as NMPIUTANG,SUM(RPUANGMUKA_BARU) AS RPBIAYA
        FROM BILL52.TRANS_UPDATE_ANGSURAN
        WHERE NOAGENDA = '$id' AND KALIANGSUR_BARU > 0
        UNION ALL
        SELECT 'Sisa Angsuran Baru' as NMPIUTANG,SUM(RPTOTANGSUR_BARU) AS RPBIAYA
        FROM BILL52.TRANS_UPDATE_ANGSURAN
        WHERE NOAGENDA = '$id' AND KALIANGSUR_BARU > 0
        UNION ALL
        SELECT 'Total' as NMPIUTANG,SUM(RPSISAANGSUR_LAMA) AS RPBIAYA
        FROM BILL52.TRANS_UPDATE_ANGSURAN
        WHERE NOAGENDA = '$id' AND KALIANGSUR_BARU > 0
        UNION ALL        
        SELECT 'Total' as NMPIUTANG, A.RPUJL AS RPBIAYA
        FROM BILL52.TRANS_GESER_METER A
        WHERE NOAGENDA = '$id'
        UNION ALL
        SELECT 'Total' NMPIUTANG, P.RPADMIN+P.RPPEMUTUSAN RPBIAYA
        FROM BILL52.TRANS_PUTUS_SEMENTARA P
        WHERE NOAGENDA='$id'
        UNION ALL
        SELECT 'Total' NMPIUTANG, B.RPTAG RPBIAYA
        FROM BILL52.TRANS_101 A, BILL52.TRANS_SIP B WHERE A.NOAGENDA = B.NOAGENDA AND A.JENIS_TRANSAKSI = 'PELUNASAN PRR' AND A.NOAGENDA='$id'
        UNION ALL
        SELECT 'RPPTL' NMPIUTANG, nvl(rpangsuran,0) RPBIAYA FROM BILL52.TRANS_KWH_SISA WHERE NOAGENDA='$id'
        UNION ALL
        SELECT 'RPPPJ' NMPIUTANG, nvl(rpppj,0) RPBIAYA FROM BILL52.TRANS_KWH_SISA WHERE NOAGENDA='$id'
        UNION ALL
        SELECT 'RPPPN' NMPIUTANG, nvl(rpppn,0) RPBIAYA FROM BILL52.TRANS_KWH_SISA WHERE NOAGENDA='$id'              
        ) WHERE RPBIAYA IS NOT NULL");

        	return $query3->result();
        }
    }

    function select_data_nontaglis2($id = NULL) {      
        if(!empty($id)){
        	$query4 = $this->db->query("DECLARE 
									    v VARCHAR2(100);
									    LCURSOR1 SYS_REFCURSOR;
									    LCURSOR2 SYS_REFCURSOR;
									    LCURSOR3 SYS_REFCURSOR; 
									                    
									    BEGIN 
									        BILL52.PKG_INFOAGENDA.CARI('553000511308190147',LCURSOR1,LCURSOR2,LCURSOR3,v); 								        
									    END;");
        	return $query4->result();
        }
    }

    function save_data_nontaglis() {		
		$noagenda = $this->input->post('inNoAgenda');			
		$user = $this->input->post('inUser');	
					
		$query = $this->db->query("BEGIN BILL52.FLAGMANUAL('$noagenda', '$user'); END;");		
		return $query->result();
              
    }	 
>>>>>>> 748eb3fb07967baebb9a7aa3efa30fe9d06fce86
}