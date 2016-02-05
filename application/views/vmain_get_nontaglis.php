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

	<div data-options="region:'north',border:false" style="height:50px;background:#00008B;padding:1px 1px 1px 10px">
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
            <div title="Info Agenda" style="padding:10px;background:#fefeff" >
	            <div style="padding:10px 15px 15px 15px">
	            <div class="easyui-panel" title="Pencarian Data Berdasarkan No Agenda" style="width:1000px;padding: 10px 10px 10px 10px">
					<form action="<?php echo site_url('home/save') ?>" method="post">	        
						<?php foreach ($DataNontaglis as $val) {} ?>	
						
            				      							
							<table cellpadding="3" >			
								<tr>
									<td>No Agenda</td>
									<td>&nbsp;&nbsp;</td>
									<td> 
										<input value="<?php echo $val->NOAGENDA; ?>" class="easyui-textbox" type="text" name="inNoAgenda" id="inNoAgenda" data-options="required:false,readonly:true" style="width:150px;height:26px;float:lefts;"></input>
										<a href="<?php echo base_url('home');?>" data-options="iconCls:'icon-reload'" class="easyui-linkbutton" style="float:lefts;width:80px;height:28px;">Reset</a>
										<button type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="float:lefts;width:80px;height:28px;" >SIMPAN</button>
										<button type="button" class="easyui-linkbutton" data-options="iconCls:'icon-print'" style="float:lefts;width:80px;height:28px;" >CETAK</button>																											
									</td>
								</tr>
							</table>
						
						<fieldset style="border:0.5px solid #95b8e7;width:98%;margin: 15px 0 15px 0;padding:15px 10px 10px 10px" >
							<legend>INFO PELANGGAN</legend>
							<table cellpadding="3" width="100%">
								<tr>
									<td>Unit UP</td>
									<td>
										<input value="<?php echo $val->UNITUP; ?>" class="easyui-textbox" type="text" name="inUnitUp" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input>
										<input type="hidden" name="inUser" id="inUser" value="<?php echo $this->session->userdata('id_user');?>"></input>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>No Agenda</td>
									<td style="width:50px"><input value="<?php echo $val->NOAGENDA; ?>" class="easyui-textbox" type="text" name="inNoAgenda2" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td><input value="<?php echo $val->KETAGENDA; ?>" class="easyui-textbox" type="text" name="inKetAgenda" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
								</tr>
								<tr>
									<td>Id Pelanggan</td>
									<td><input value="<?php echo $val->IDPEL; ?>" class="easyui-textbox" type="text" name="inIdPelanggan" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Tanggal Agenda</td>
									<td><input value="<?php echo $val->TGLAGENDA; ?>" class="easyui-textbox" type="text" name="inTanggalAgenda" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
								</tr>
								<tr>
									<td>Nama Pelanggan</td>
									<td><input value="<?php echo $val->NAMAPEL; ?>" class="easyui-textbox" type="text" name="inNamaPelanggan" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Asal Mohon</td>
									<td><input value="<?php echo $val->ASALMOHON; ?>" class="easyui-textbox" type="text" name="inAsalMohon" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
									
									
								</tr>
								<tr>
									<td>Alamat Pelanggan</td>
									<td><textarea class="easyui-textbox" type="text" rows="2" cols="42" value="" name="inAlamat" data-options="required:false,readonly:true" style="width:200px;height:50px;"><?php echo $val->ALAMATPEL; ?></textarea></td>
									<td>&nbsp;&nbsp;</td>
									<td>Tarif </td>
									<td><input value="<?php echo $val->TARIFLAMA; ?>" class="easyui-textbox" type="text" name="inTarifLama" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
									<td><input value="<?php echo $val->TARIFBARU; ?>" class="easyui-textbox" type="text" name="inTarifBaru" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
								</tr>	
								<tr>
									<td>Telpon/Hp</td>
									<td><input value="<?php echo $val->TELP; ?>" class="easyui-textbox" type="text" name="inHp" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Daya </td>
									<td><input value="<?php echo $val->DAYALAMA; ?>" class="easyui-textbox" type="text" name="inDayaLama" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
									<td><input value="<?php echo $val->DAYABARU; ?>" class="easyui-textbox" type="text" name="inDayaBaru" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
								</tr>
								<tr>
									<td>Nama Pemohon</td>
									<td><input value="<?php echo $val->NAMAPEM; ?>" class="easyui-textbox" type="text" name="inNamaPemohon" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Paket SAR </td>
									<td><input value="<?php echo $val->PKTSAR; ?>" class="easyui-textbox" type="text" name="inPaketSar" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
								</tr>
								<tr>
									<td>Alamat Pemohon</td>
									<td><input value="<?php echo $val->ALAMATPEM; ?>" class="easyui-textbox" type="text" name="inAlamat Pemohon" data-options="required:false,readonly:true" style="width:200px;height:50px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Alasan Ditangguhkan </td>
									<td><textarea class="easyui-textbox" type="text" rows="2" cols="42" value="" name="inAlasanDitangguhkan" data-options="required:false,readonly:true" style="width:200px;height:50px;"><?php echo $val->ALASAN; ?></textarea></td>
								</tr>
								<tr>
									<td>No Register</td>
									<td><input value="<?php echo $val->NOREG; ?>" class="easyui-textbox" type="text" name="inNoRegister" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>No Kolektif </td>
									<td><input value="<?php echo $val->NOKOLEKTIF; ?>" class="easyui-textbox" type="text" name="inNoKolektif" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
								</tr>
								<tr>
									<td>Jatuh Tempo</td>
									<td><input value="<?php echo $val->JTEMPO; ?>" class="easyui-textbox" type="text" name="inJatuhTempo" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Bank/No.Rekening </td>
									<td><input value="<?php echo $val->BANK; ?>" class="easyui-textbox" type="text" name="inBank" data-options="required:false,readonly:true" style="width:200px;height:26px;padding:left"></input></td>					
									<td><input value="<?php echo $val->NOREK; ?>" class="easyui-textbox" type="text" name="inNorek" data-options="required:false,readonly:true" style="width:200px;height:26px;padding:left"></input></td>					
								</tr>
								
								<tr>
									<td>UJL Realisasi</td>
									<td><input value="<?php echo $val->UJLREALISASI; ?>" class="easyui-textbox" type="text" name="inUJL" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>
									<td>&nbsp;&nbsp;</td>
									<td>Nama Di Rekening </td>
									<td><input value="<?php echo $val->NAMAREK; ?>" class="easyui-textbox" type="text" name="inNamaRek" data-options="required:false,readonly:true" style="width:200px;height:26px;"></input></td>					
								</tr>				
							</table>
						</fieldset>
						<fieldset style="border:0.5px solid #95b8e7;float:left;width:98%;border:false;margin: 0 0 15px 0" >
							<table style="float:left;width:50%">
								<tr>
									<td colspan="2" align="center">
										<table id="dg" title="Data Flow" style="width:100%;height:150px" data-options="
													rownumbers:true,
													singleSelect:true,												
													autoRowHeight:false,
													pagination:false,
													pageSize:10">
											<thead>
												<tr>	                    												
													<th field="KETERANGAN" width="80" align="center">KETERANGAN</th>
													<th field="TANGGAL" width="85" align="center">TANGGAL</th>																		
												</tr>
											</thead>
										</table>						
										
									</td>
								</tr>
							</table>
							<table style="float:left;width:50%">
								<tr>				
									<td colspan="2" align="center">
										<table id="dg2" title="Data Biaya" style="width:100%;height:150px" data-options="
													rownumbers:true,
													singleSelect:true,
													autoRowHeight:false,
													pagination:false,
													pageSize:10">
											<thead>
												<tr>	                    												
													<th field="NMPIUTANG" width="80" align="center">NMPIUTANG</th>
													<th field="JUMLAH" width="85" align="center">JUMLAH</th>																	
												</tr>
											</thead>
										</table>	
									</td>										
								</tr>								
							</table>
						</fieldset>
					</form>
					</div>
                		       
	            </div>
	            <!-- </div> -->
	            					
            </div>
			            								
        </div>
    </div>

	<div region="center" border="false" border="false">
        <div class="easyui-tabs" fit="true" id="tt">
            <div title="Info Agenda" style="padding:10px;">
				<div class="easyui-panel" title="Koreksi Tarif Index Meter" style="width:865px">
	            	<div style="padding:10px 15px 15px 15px">
						<form action="<?php echo site_url('home/save') ?>" method="post">	        
						<?php foreach ($DataNontaglis as $val) {} ?>					
		                	<table cellpadding="3">			
		                		<tr>
		                			<td>No Agenda</td>
		                			<td>
										<input value="<?php echo $val->NOAGENDA; ?>" class="easyui-textbox" type="text" name="inNoAgenda" id="inNoAgenda" data-options="required:false,disabled:true" style="width:150px;height:26px;"></input>
										<a href="<?php echo base_url('home');?>" class="easyui-linkbutton" style="width:50px;height:26px;">Reset</a>																
									</td>
		            				<td>&nbsp;&nbsp;</td> 
		            				<td>Jenis Transaksi</td>
		                			<td> 
		            					<select class="easyui-combobox" name="inJenisTransaksi" style="width: 200px; height: 26px;" data-options="panelHeight:'auto'">
		            						<option value="1">Token Susulan </option>
		            						<option value="2">Perubahan Tarif Index </option>		            													
		            					</select>				
										<input type="hidden" name="inUser" id="inUser" value="<?php echo $this->session->userdata('id_user');?>"></input>	
		            				</td>					
		                		</tr>
		            			<tr>
		                			<td>Id Pelanggan</td>
		                			<td><input value="<?php echo $val->IDPEL; ?>" class="easyui-textbox" type="text" name="inIdPelanggan" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
		            				<td>&nbsp;&nbsp;</td>
		            				<td>Nama</td>
		                			<td><input value="<?php echo $val->NAMA; ?>" class="easyui-textbox" type="text" name="inNama" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>					
		                		</tr>
		            			<tr>
		                			<td>Tarif</td>
		                			<td><input value="<?php echo $val->TARIF; ?>" class="easyui-textbox" type="text" name="inTarif" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
		            				<td>&nbsp;&nbsp;</td>
		            				<td>Daya</td>
		                			<td><input value="<?php echo $val->DAYA; ?>" class="easyui-textbox" type="text" name="inDaya" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>					
		                		</tr>
		            			<tr>
		                			<td>No Meter</td>
		                			<td><input value="<?php echo $val->NOMORKWH; ?>" class="easyui-textbox" type="text" name="inNoMeter" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
		            				<td>&nbsp;&nbsp;</td>
		            				<td>Tarif Index</td>
		                			<td><input value="<?php echo $val->TARIFINDEX; ?>" class="easyui-textbox" type="text" name="inTarifIndex" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>					
		                		</tr>	
		            			
		            			<tr><td colspan="5"><hr></td></tr>				
		            
		                		<tr>
	                    			<td colspan="2" align="center">
		            					<table id="dg" title="Data Token Lama" style="width:400px;height:150px" data-options="
		                                			rownumbers:true,
		                                			singleSelect:true,												
		                                			autoRowHeight:false,
		                                			pagination:false,
		                                			pageSize:10">
		                                	<thead>
		                                		<tr>	                    												
		            								<th field="TOKEN_MT1" width="80" align="center">TOKEN_MT1</th>
		            							    <th field="TOKEN_MT2" width="85" align="center">TOKEN_MT2</th>
		            							    <th field="TOKEN_MT3" width="80" align="center">TOKEN_MT3</th>
		            							    <th field="TOKEN_MT4" width="110" align="center">TOKEN_MT4</th>																		
		                                		</tr>
		                                	</thead>
		                                </table>						
		            					
		            				</td>
		            				<td>&nbsp;</td>					
		                			<td colspan="2" align="center">
		            					<table id="dg2" title="Data Token Baru" style="width:400px;height:150px" data-options="
		                                			rownumbers:true,
		                                			singleSelect:true,
		                                			autoRowHeight:false,
		                                			pagination:false,
		                                			pageSize:10">
		                                	<thead>
		                                		<tr>	                    												
		            								<th field="TOKEN_MT1" width="80" align="center">TOKEN_MT1</th>
		            							    <th field="TOKEN_MT2" width="85" align="center">TOKEN_MT2</th>
		            							    <th field="TOKEN_MT3" width="80" align="center">TOKEN_MT3</th>
		            							    <th field="TOKEN_MT4" width="110" align="center">TOKEN_MT4</th>																		
		                                		</tr>
		                                	</thead>
		                                </table>	
		            				</td>										
		                		</tr>
		            			
		            			<tr><td colspan="5"><hr></td></tr>
		            			
		            			<tr>
		                			<td>Tarif Index</td>
		                			<td colspan="1">
		            					<select class="easyui-combobox" name="inTarifIndex2" id="inTarifIndex2" style="width: 20%; height: 26px; float:left;">
											<?php
												if (count($ComboTarifIndex)) {
											        foreach ($ComboTarifIndex as $list) {
											            echo "<option value='". $list['TARIF_INDEX'] . "'>" . $list['TARIF_INDEX'] . "</option>";
											        }
											    }									
											?>
										
		            						<!--<option value="1">Tarif Index 1 </option>
		            						<option value="2">Tarif Index 2 </option>	
		            						<option value="3">Tarif Index 3 </option>		
		            						<option value="4">Tarif Index 4 </option> !-->												
		            					</select>
		            				</td>		
									<td>&nbsp;</td>	
									<td>&nbsp;</td>									
									<td>									
										<button type="submit" class="easyui-linkbutton" style="width:80px; float:right;" >Simpan</button>									
									</td>								
		                		</tr>
		            			
		                	</table>			
		            
		                </form>
                		       
	                </div>
	            </div>							
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

		function getData(){
			var rows = [];
			for(var i=1; i<=1; i++){
				var amount = Math.floor(Math.random()*1000);
				var price = Math.floor(Math.random()*1000);
				// var TOKEN_MT1 = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_MT2 = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_MT3 = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_MT4 = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_KCT1_BR = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_KCT1_BR = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_KCT1_BR = '<?php echo $val->TOKEN_MT1; ?>';
				// var TOKEN_KCT1_BR = '<?php echo $val->TOKEN_MT1; ?>';                                
				var KETERANGAN = '<?php echo $val->KETERANGAN; ?>';
				var TANGGAL = '<?php echo $val->TANGGAL; ?>';
				var NMPIUTANG = '<?php echo $val->NMPIUTANG; ?>';
				var JUMLAH = '<?php echo $val->JUMLAH; ?>';

				rows.push({
					inv: 'Inv No '+i,
					date: $.fn.datebox.defaults.formatter(new Date()),
					name: 'Name '+i,
					amount: amount,
					price: price,
					cost: amount*price,
					note: 'Note '+i,
					KETERANGAN:KETERANGAN,
					TANGGAL:TANGGAL,
					NMPIUTANG:NMPIUTANG,
					JUMLAH:JUMLAH					
				});
			}
			return rows;
		}
		
		$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg2').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg3').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg4').datagrid({data:getData()}).datagrid('clientPaging');	
			
			$('#inTanggalEntriF').textbox('disable');	
			$('#inSampaiF').textbox('disable');

			$("#inFilter1, #inFilter2").change(function(){               
                if($("#inFilter1").is(":checked")){
                    //alert("111");
					$('#inNoAgendaF').textbox('enable');	
					$('#inNoMeterF').textbox('enable');						
					$('#inTanggalEntriF').textbox('disable');	
					$('#inSampaiF').textbox('disable');	

                }
                else if($("#inFilter2").is(":checked")){
                    //alert("222");  
					$('#inNoAgendaF').textbox('disable');	
					$('#inNoMeterF').textbox('disable');						
					$('#inTanggalEntriF').textbox('enable');	
					$('#inSampaiF').textbox('enable');						
                }
            });
			
		});
		function addTab(title){				
            if ($('#tt').tabs('exists', title)){
                $('#tt').tabs('select', title);
            } 
        }				
	</script>	

</body>
</html>