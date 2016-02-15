<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Koreksi Tarif Index Meter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/demo/demo.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.easyui.min.js"></script>
	<style type="text/css">	
		a:link {color:#000000; text-decoration:none; }
		a:visited {color:#000000; text-decoration:none;}
		a:hover {color:#000000; text-decoration:none;}
		a:active {color:#000000; text-decoration:none;} 	
	</style>	
</head>
<body class="easyui-layout">

	<div data-options="region:'north',border:false" style="height:50px;background:#2e5385;padding:1px 1px 1px 10px">
		<table style="width:100%;height:100%">
			<tr>
				<td><b style="font-size:14px; color:white;">Selamat Datang : <?php echo $this->session->userdata('nama_user');?></b></td>
				<td><a href="<?php echo base_url('auth/logout');?>" class="easyui-linkbutton" style="width:80px; float:right;">Log Out</a></td>
				<td></td>				
			</tr>
		</table>		
	</div>	
		

	<div data-options="region:'west',split:true,title:'Menu'" style="width:250px;padding:5px;">
		<ul class="easyui-tree" data-options="animate:true">
			<li>
				<span>Menu</span>
				<ul>					
					<li><a href="#" onclick="addTab('Input')">Info Agenda</a></li>				
				</ul>
			</li>
		</ul>
	</div>	
	

	<div region="center" border="false" border="false">
        <div class="easyui-tabs" fit="true" id="tt">
            <div title="Info Agenda" style="padding:10px;background:#e1e6f9" >
	            <div style="padding:0px 5px 5px 5px">
	            <div class="easyui-panel" title="Pencarian Data Berdasarkan No Agenda" style="width:985px;padding: 10px 13px 10px 10px">
					<form action="<?php echo site_url('home/save') ?>" method="post">	        		
						<?php foreach ($DataNontaglis as $val) {} ?>    							
							<table cellpadding="3" >			
								<tr>
									<td>No Agenda</td>
									<td>&nbsp;&nbsp;</td>
									<td> 
										<input value="<?php echo $val->NOAGENDA; ?>" class="easyui-textbox" type="text" name="inNoAgenda" id="inNoAgenda" data-options="required:false,readonly:true" style="width:150px;float:lefts;"></input>
										<a href="<?php echo base_url('home');?>" data-options="iconCls:'icon-reload'" class="easyui-linkbutton" style="float:lefts;width:80px;height:24px;">RESET</a>
										<button type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="float:lefts;width:80px;height:26px;" >SIMPAN</button>
										</td>
								</tr>
							</table>
						
						<fieldset style="border:0.5px solid #95b8e7;width:98%;margin: 15px 0 15px 0;padding:15px 10px 10px 10px" >
							<legend style="color:#39516d;font-weight: bold;">INFO PELANGGAN</legend>
							<table cellpadding="3" width="100%">
								<tr>
									<td>Unit UP</td>
									<td>
										<input value="<?php echo $val->UNITUP; ?>" class="easyui-textbox" type="text" name="inUnitUp" data-options="required:false,readonly:true" style="width:100px;"></input>
										<input type="hidden" name="inUser" id="inUser" value="<?php echo $this->session->userdata('id_user');?>"></input>
									</td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>Jenis Transaksi</td>
									<td colspan="2"><input value="<?php echo $val->JENIS_TRANSAKSI; ?>" class="easyui-textbox" type="text" name="inKetAgenda" data-options="required:false,readonly:true" style="width:150px;"></input></td>					
									<td>&nbsp;</td>	
								</tr>
								<tr>
									<td>Id Pelanggan</td>
									<td><input value="<?php echo $val->IDPEL; ?>" class="easyui-textbox" type="text" name="inIdPelanggan" data-options="required:false,readonly:true" style="width:130px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Tanggal Permohonan</td>
									<td><input value="<?php echo $val->TGLPERMOHONAN; ?>" class="easyui-textbox" type="text" name="inTanggalAgenda" data-options="required:false,readonly:true" style="width:150px;"></input></td>					
								</tr>
								<tr>
									<td>Nama Pelanggan</td>
									<td><input value="<?php echo $val->NAMA; ?>" class="easyui-textbox" type="text" name="inNamaPelanggan" data-options="required:false,readonly:true" style="width:200px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Asal Mohon</td>
									<td><input value="<?php echo $val->ASALMOHON; ?>" class="easyui-textbox" type="text" name="inAsalMohon" data-options="required:false,readonly:true" style="width:150px;"></input></td>					
									
									
								</tr>
								<tr>
									<td>Alamat Pelanggan</td>
									<td><textarea class="easyui-textbox" type="text" rows="2" cols="42" name="inAlamat" data-options="required:false,readonly:true" style="width:200px;height:50px;"><?php echo $val->ALAMAT; ?></textarea></td>
									<td>&nbsp;&nbsp;</td>
									<td>Tarif </td>
									<td><input value="<?php echo $val->TARIF_LAMA; ?>" class="easyui-textbox" type="text" name="inTarifLama" data-options="required:false,readonly:true" style="width:150px;"></input></td>				
									<td><input value="<?php echo $val->TARIF; ?>" class="easyui-textbox" type="text" name="inTarifBaru" data-options="required:false,readonly:true" style="width:150px;"></input></td>
								</tr>	
								<tr>
									<td>Telpon/Hp</td>
									<td><input value="<?php echo $val->TELP_HP; ?>" class="easyui-textbox" type="text" name="inHp" data-options="required:false,readonly:true" style="width:200px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Daya </td>
									<td><input value="<?php echo $val->DAYA_LAMA; ?>" class="easyui-textbox" type="text" name="inDayaLama" data-options="required:false,readonly:true" style="width:150px;"></input></td>					
									<td><input value="<?php echo $val->DAYA; ?>" class="easyui-textbox" type="text" name="inDayaBaru" data-options="required:false,readonly:true" style="width:150px;"></input></td>					
								</tr>
								<tr>
									<td>Nama Pemohon</td>
									<td><input value="<?php echo $val->NAMA_PEMOHON; ?>" class="easyui-textbox" type="text" name="inNamaPemohon" data-options="required:false,readonly:true" style="width:200px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Paket SAR </td>
									<td colspan="2"><input value="<?php echo $val->PAKETSAR; ?>" class="easyui-textbox" type="text" name="inPaketSar" data-options="required:false,readonly:true" style="width:200px;"></input></td>					
								</tr>
								<tr>
									<td>No SIP</td>
									<td><input value="<?php echo $val->NO_SIP; ?>" class="easyui-textbox" type="text" name="inNoSip" data-options="required:false,readonly:true" style="width:150px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Kode Paket SAR</td>
									<td colspan="2"><input value="<?php echo $val->KD_PAKET_SAR; ?>" class="easyui-textbox" type="text" name="inKodePaketSar" data-options="required:false,readonly:true" style="width:170px;"></input></td>					
								</tr>
								<tr>
									<td>Alamat Pemohon</td>
									<td><textarea class="easyui-textbox" type="text" rows="2" cols="42" name="inAlamat" data-options="required:false,readonly:true" style="width:200px;height:50px;"><?php echo $val->ALAMAT_PEMOHON; ?></textarea></td>
									<td>&nbsp;&nbsp;</td>
									<td>Alasan Keputusan </td>
									<td colspan="2"><textarea class="easyui-textbox" type="text" rows="2" cols="42" value="ALASAN_KEPUTUSAN" name="inAlasanKeputusan" data-options="required:false,readonly:true" style="width:230px;height:50px;"><?php echo $val->ALASAN_KEPUTUSAN; ?></textarea></td>
								</tr>
								<tr>
									<td>Kode Keputusan</td>
									<td><input value="<?php echo $val->KD_KEPUTUSAN; ?>" class="easyui-textbox" type="text" name="inKodeKeputusan" data-options="required:false,readonly:true" style="width:150px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>No Kolektif </td>
									<td colspan="2"><input value="<?php echo $val->NOKOLEKTIF; ?>" class="easyui-textbox" type="text" name="inNoKolektif" data-options="required:false,readonly:true" style="width:170px;"></input></td>					
								</tr>
								<tr>
									<td>Jatuh Tempo</td>
									<td><input value="<?php echo $val->TGLJTTEMPO; ?>" class="easyui-textbox" type="text" name="inJatuhTempo" data-options="required:false,readonly:true" style="width:150px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Bank/No.Rekening </td>
									<td><input value="<?php echo $val->NAMABANK; ?>" class="easyui-textbox" type="text" name="inBank" data-options="required:false,readonly:true" style="width:150px;padding:left"></input></td>				
									<td colspan="2"><input value="<?php echo $val->NOREKENING; ?>" class="easyui-textbox" type="text" name="inNorek" data-options="required:false,readonly:true" style="width:170px;padding:left"></input></td>					
								</tr>
								
								<tr>
									<td>UJL Realisasi</td>
									<td><input value="<?php echo $val->UJLREAL; ?>" class="easyui-textbox" type="text" name="inUJL" data-options="required:false,readonly:true" style="width:150px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Nama Di Rekening </td>
									<td colspan="2"><input value="<?php echo $val->NAMADIREKENING; ?>" class="easyui-textbox" type="text" name="inNamaRek" data-options="required:false,readonly:true" style="width:170px;"></input></td>					
								</tr>				
							</table>
						</fieldset>
							<table style="float:left;width:50%">
								<tr>
									<td colspan="2" align="center">
										<table id="dg" title="Data Flow" style="width:100%;height:160px" data-options="
													rownumbers:false,
													singleSelect:true,												
													autoRowHeight:false,
													pagination:false,
													pageSize:10">
											<thead>
												<tr>	                    												
													<th field="KETERANGAN" width="150" align="center">KETERANGAN</th>
													<th field="TANGGAL" width="150" align="center">TANGGAL</th>																		
												</tr>
											</thead>
										</table>						
										
									</td>
								</tr>
							</table>
							<table style="float:left;width:50%">
								<tr>				
									<td colspan="2" align="center">
										<table id="dg2" title="Data Biaya" style="width:100%;height:160px" data-options="
													rownumbers:false,
													singleSelect:true,
													autoRowHeight:false,
													pagination:false,
													pageSize:10">
											<thead>
												<tr>	                    												
													<th field="NMPIUTANG" width="150" align="center">NMPIUTANG</th>
													<th field="RPBIAYA" width="150" align="center">RPBIAYA</th>																	
												</tr>
											</thead>
										</table>	
									</td>										
								</tr>								
							</table>
					</form>
					</div>
                		       
	            </div>
	            <!-- </div> -->
	            					
            </div>
			            								
        </div>
    </div>

	<script>
		(function($){
			function pagerFilter(data){
				if ($.isArray(data)){	// is array
					data = {
						total: data.length,
						rows: data
					}
				}
				var dg = $(this);
				var state = dg.data('datagrid');
				var opts = dg.datagrid('options');
				if (!state.allRows){
					state.allRows = (data.rows);
				}
				var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
				var end = start + parseInt(opts.pageSize);
				data.rows = $.extend(true,[],state.allRows.slice(start, end));
				return data;
			}

			var loadDataMethod = $.fn.datagrid.methods.loadData;
			$.extend($.fn.datagrid.methods, {
				clientPaging: function(jq){
					return jq.each(function(){
						var dg = $(this);
                        var state = dg.data('datagrid');
                        var opts = state.options;
                        opts.loadFilter = pagerFilter;
                        var onBeforeLoad = opts.onBeforeLoad;
                        opts.onBeforeLoad = function(param){
                            state.allRows = null;
                            return onBeforeLoad.call(this, param);
                        }
						dg.datagrid('getPager').pagination({
							onSelectPage:function(pageNum, pageSize){
								opts.pageNumber = pageNum;
								opts.pageSize = pageSize;
								$(this).pagination('refresh',{
									pageNumber:pageNum,
									pageSize:pageSize
								});
								dg.datagrid('loadData',state.allRows);
							}
						});
                        $(this).datagrid('loadData', state.data);
                        if (opts.url){
                        	$(this).datagrid('reload');
                        }
					});
				},
                loadData: function(jq, data){
                    jq.each(function(){
                        $(this).data('datagrid').allRows = null;
                    });
                    return loadDataMethod.call($.fn.datagrid.methods, jq, data);
                },
                getAllRows: function(jq){
                	return jq.data('datagrid').allRows;
                }
			});						
		})(jQuery);

		function getData2(){
			var rows = [];

			<?php 
				foreach ($DataNontagliss as $val2) {

						$KETERANGAN = $val2->KETERANGAN;
						$TANGGAL = $val2->TANGGAL;										
			?>

				var KETERANGAN = '<?php echo $KETERANGAN; ?>';
				var TANGGAL = '<?php echo $TANGGAL; ?>';


				rows.push({
					KETERANGAN:KETERANGAN,
					TANGGAL:TANGGAL				
				});


			<?php 
				} 
			?>	

			return rows;			
		}		

		function getData3(){
			var rows = [];

			<?php 
				foreach ($DataNontaglisss as $val3) {

						$NMPIUTANG = $val3->NMPIUTANG;
						$RPBIAYA = $val3->RPBIAYA;										
			?>

				var NMPIUTANG = '<?php echo $NMPIUTANG; ?>';
				var RPBIAYA = '<?php echo $RPBIAYA; ?>';


				rows.push({
					NMPIUTANG:NMPIUTANG,
					RPBIAYA:RPBIAYA				
				});


			<?php 
				} 
			?>	

			return rows;			
		}	



		
		$(function(){
			$('#dg').datagrid({data:getData2()}).datagrid('clientPaging');
			$('#dg2').datagrid({data:getData3()}).datagrid('clientPaging');			
		});

		function addTab(title){				
            if ($('#tt').tabs('exists', title)){
                $('#tt').tabs('select', title);
            } 
        }				
	</script>	

</body>
</html>