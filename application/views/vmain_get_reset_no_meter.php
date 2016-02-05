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
					<li><a href="#" onclick="addTab('Input')">Koreksi Tarif Index Meter</a></li>	
					<li><a href="#" onclick="addTab('Reset No Meter')">Reset No Meter</a></li>					
					<li><a href="#" onclick="addTab('Monitoring')">Monitoring</a></li>						
				</ul>
			</li>
		</ul>
	</div>	
	
	<div region="center" border="false" border="false">
        <div class="easyui-tabs" fit="true" id="tt">
            <div title="Input" style="padding:10px;">
				<div class="easyui-panel" title="Koreksi Tarif Index Meter" style="width:865px">		
				
	            	<!--<div style="padding:15px 30px 20px 30px"> !-->
	            	<div style="padding:10px 15px 15px 15px">
					<form action="<?php echo site_url('home/save') ?>" method="post">	        
					<?php foreach ($dataKoreksi as $val) {} ?>					
	                	<table cellpadding="3">			
	                		<tr>
	                			<td>No Agenda</td>
	                			<td>
									<input class="easyui-textbox" type="text" name="inNoAgenda" id="inNoAgenda" data-options="required:false,disabled:true" style="width:150px;height:26px;"></input>
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
			
			<div title="Reset No Meter" style="padding:10px;">
                <div class="easyui-panel" title="Reset No Meter" style="width:360px">		
	            	<!--<div style="padding:15px 30px 20px 30px"> !-->
	            	<div style="padding:10px 15px 15px 15px">
						<form id="ff" method="post">	   					
							<table cellpadding="3">
								<tr>
									<td>No Meter</td>									
									<td> 
										<input value="<?php echo $val->NOMORKWH; ?>" class="easyui-textbox" type="text" name="inNoMeterReset" id="inNoMeterReset" data-options="required:false,disabled:true" style="width:150px;height:26px;"></input>										
										<a href="<?php echo base_url('home');?>" class="easyui-linkbutton" style="width:50px;height:26px;">Reset</a>
										<input type="hidden" name="inUserReset" id="inUserReset" value="<?php echo $this->session->userdata('id_user');?>"></input>																	
									</td>								
								
								</tr>
								<tr>
									<td>Id Pelanggan</td>
									<td><input value="<?php echo $val->IDPEL; ?>" class="easyui-textbox" type="text" name="inIdPelangganReset" id="inIdPelangganReset" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
								</tr>	
								<tr>
									<td>Nama Pelanggan</td>
									<td><input value="<?php echo $val->NAMA; ?>" class="easyui-textbox" type="text" name="inNamaPelangganReset" id="inNamaPelangganReset" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
								</tr>
								<tr>
									<td>Merk Meter</td>
									<td><input value="<?php echo $val->MEREKKWH; ?>" class="easyui-textbox" type="text" name="inMerkMeterReset" id="inMerkMeterReset" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
								</tr>
								<tr>
									<td>Type Meter</td>
									<td><input value="<?php echo $val->MEREKKWH; ?>" class="easyui-textbox" type="text" name="inTypeMeterReset" id="inTypeMeterReset" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
								</tr>
								<tr>
									<td>Tarif Index</td>
									<td><input value="<?php echo $val->TARIFINDEX; ?>" class="easyui-textbox" type="text" name="inTarifIndexReset" data-options="required:false,disabled:true" style="width:200px;height:26px;"></input></td>
								</tr>	
								<tr>
									<td>&nbsp;</td>
									<td><button type="submit" class="easyui-linkbutton" style="width:80px; float:right;" >Proses</button></td>
								</tr>									
							</table>											
						</form>
	                </div>
	            </div>
            </div>
			
			
            <div title="Monitoring" style="padding:10px;">
                <div class="easyui-panel" title="Monitoring" style="width:865px">		
	            	<!--<div style="padding:15px 30px 20px 30px"> !-->
	            	<div style="padding:10px 15px 15px 15px">
	                <form id="ff" method="post">	    	
	                	<table cellpadding="3">	
							<tr>
	                			<td>Filter Berdasarkan</td>								
	                			<td>
									<input type="radio" name="inFilter" id="inFilter1" value="1" checked> No Agenda</input>&nbsp;
									<input type="radio" name="inFilter" id="inFilter2" value="2" > Tanggal</input>
								</td>
	            				<td>&nbsp;&nbsp;</td>
	            				<td>&nbsp;&nbsp;</</td>
	                			<td>&nbsp;&nbsp;</td>					
	                		</tr>
							
							<tr><td colspan="5"><hr></td></tr>	
						
	                		<tr>
	                			<td>No Agenda</td>
	                			<td><input class="easyui-textbox" type="text" name="inNoAgendaF" id="inNoAgendaF" data-options="required:false" style="width:160px;height:26px;" enable/></input></td>
	            				<td>&nbsp;&nbsp;</td>
	            				<td>No Meter</td>
	                			<td><input class="easyui-textbox" type="text" name="inNoMeterF" id="inNoMeterF" data-options="required:false" style="width:160px;height:26px;"></input></td>					
	                		</tr>
	            			<tr>
	                			<td>Tanggal Entri</td>
	                			<td><input class="easyui-datebox" type="text" name="inTanggalEntriF" id="inTanggalEntriF" data-options="required:false" style="width:160px;height:26px;"></input></td>
	            				<td>&nbsp;&nbsp;</td>
	            				<td>Sampai</td>
	                			<td>
									<input class="easyui-datebox" type="text" name="inSampaiF" id="inSampaiF" data-options="required:false" style="width:160px;height:26px;"></input>									
									<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px; float:right;">Proses</a> 														
								</td>					
	                		</tr>	            	            
	            			
	            			<tr><td colspan="5"><hr></td></tr>				
	            
	                		<tr>
                    			<td colspan="2" align="center">
	            					<table id="dg3" title="Sudah Aktivasi" style="width:400px;height:250px" data-options="
	                                			rownumbers:true,
	                                			singleSelect:true,
	                                			autoRowHeight:false,
	                                			pagination:true,
	                                			pageSize:10">
	                                	<thead>
	                                		<tr>	                    												
	            								<th field="inv" width="80" align="center">No Agenda</th>
	            							    <th field="date" width="85" align="center">Tgl Entri</th>
	            							    <th field="name" width="80" align="center">Status</th>
	            							    <th field="note" width="110" align="center">Entri By</th>																		
	                                		</tr>
	                                	</thead>
	                                </table>						
	            					
	            				</td>
	            				<td>&nbsp;</td>					
	                			<td colspan="2" align="center">
	            					<table id="dg4" title="Belum Aktivasi" style="width:400px;height:250px" data-options="
	                                			rownumbers:true,
	                                			singleSelect:true,
	                                			autoRowHeight:false,
	                                			pagination:true,
	                                			pageSize:10">
	                                	<thead>
	                                		<tr>	                    												
	            								<th field="inv" width="80" align="center">No Agenda</th>
	            							    <th field="date" width="85" align="center">Tgl Entri</th>
	            							    <th field="name" width="80" align="center">Status</th>
	            							    <th field="note" width="110" align="center">Entri By</th>																		
	                                		</tr>
	                                	</thead>
	                                </table>	
	            				</td>										
	                		</tr>
	            			
	            			<tr><td colspan="5"><hr></td></tr>	            			
	            			
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
				var TOKEN_MT1 = '<?php echo $val->TOKEN_MT1; ?>';
				var TOKEN_MT2 = '<?php echo $val->TOKEN_MT1; ?>';
				var TOKEN_MT3 = '<?php echo $val->TOKEN_MT1; ?>';
				var TOKEN_MT4 = '<?php echo $val->TOKEN_MT1; ?>';
				
				rows.push({
					inv: 'Inv No '+i,
					date: $.fn.datebox.defaults.formatter(new Date()),
					name: 'Name '+i,
					amount: amount,
					price: price,
					cost: amount*price,
					note: 'Note '+i,
					TOKEN_MT1:TOKEN_MT1,
					TOKEN_MT2:TOKEN_MT2,
					TOKEN_MT3:TOKEN_MT3,
					TOKEN_MT4:TOKEN_MT4					
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