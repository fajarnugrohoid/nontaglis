<?php if(!defined('BASEPATH')) exit('No direct script allowed');



class mdata1 extends CI_Model{
	
	function __construct()
    {
        parent::__construct();
    }

    function select_data_nontaglis($id = NULL) {      
        if(!empty($id)){
        	$query = $this->db->query("select * from BILL52.DIL_MAIN");
		
		
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
}