<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Koreksi DIL</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/demo/demo.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.easyui.min.js"></script>
	<script src="http://ajax.googleapis/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
				<td><b style="font-size:14px; color:white;">Selamat Datang : <?php echo $this->session->userdata('nama_user');?>  |  UNIT : <?php echo $this->session->userdata('unit_up');?></b></td>
				<td><a href="<?php echo base_url('auth/logout');?>" class="easyui-linkbutton" style="width:80px; float:right;">Log Out</a></td>
				<td></td>				
			</tr>
		</table>		
	</div>	
	
	<!-- List Menu	 -->
	<div data-options="region:'west',split:true,title:'Menu'" style="width:250px;padding:5px;">
		<ul class="easyui-tree" data-options="animate:true">
			<li>
				<span>Menu</span>
				<ul>		
					<li><a href="#" onclick="addTab('Input')">Koreksi DIL</a></li>														
				</ul>
			</li>
		</ul>
	</div>	
	
	<!-- form Koreksi DIL -->
	<div region="center" border="false" border="false">
        <div class="easyui-tabs" fit="true" id="tt">
            <div title="Koreksi DIL" style="padding:10px;background:#e1e6f9" >
	            <div style="padding: 0 5px 5px 5px">
	            <div class="easyui-panel" title="Pencarian Data Berdasarkan Id Pelanggan" style="width:100%;padding: 10px 13px 10px 10px">	
			
		<form action="<?php echo site_url('home/getdata') ?>" method="post">	

			<table>
				<tr>
					<td>
						<fieldset style="border:0.5px solid #95b8e7;width:100%;margin: 0 0 0 0;padding:25px 15px 25px 15px" >
							<legend style="color:#39516d;font-weight: bold;">Pencarian Data</legend>
							<table width="100%">	
								<tr>
									<td><b>ID Pelanggan</b></td>
									<td width="50%"> 
										<input class="easyui-textbox" type="text" name="inIdpel" id="inIdpel" data-options="required:false,prompt:'Masukan No ID'" style="width:100%;"></input>
									</td>
									<td width="4%">
										<button type="submit" class="easyui-linkbutton" id="bcari" data-options="iconCls:'icon-search'" style="float:lefts;width:70px;height:26px;" >CARI</button>
									</td>
								</tr>
							</table>
						</fieldset>
					</td>
				</tr>
			</table>	
		</form>
	</div></div>
</div></div>
	<!-- 	<div style="padding: 0 5px 5px 5px">
	            </div>	

			<table>
				<tr>
					<td>
						<fieldset style="border:0.5px solid #95b8e7;width:100%;margin: 50 0 50 0;padding:25px 15px 25px 15px" >
						<legend style="color:#39516d;font-weight: bold;">Pilih Atributs DIL</legend>
							<table width="100%" style="100%">	
								<tr>
									<td>
										<input type="checkbox" name="inMAIN" id="main" onclick="MAIN">
									</td>

									<td><b>MAIN</b></td>
									
																
									<td>
										<input type="checkbox"  name="inPDL" id="pdl">
									</td>
									<td>
										<b>PDL</b>
									</td>
									
														
									<td>
										<input type="checkbox" name="inFTUL" id="ftul">
									</td>
									<td>
										<b>FTUL235</b>
									</td>

									<td>
										<input type="checkbox" name="inFAKMKWH" id="fakmkwh">
									</td>
									<td>
										<b>FAKMKWH</b>
									</td>

									<td>
										<input type="checkbox" name="inFAKMKVARH" id="fakmkvrh">
									</td>
									<td>
										<b>FAKMKVARH</b>
									</td>

																		
								</tr>

							</table>
						</fieldset>
					</td>

					</tr>
			</table>

	<div id="inAtributdil" class="easyui-tabs" style="width:1400px;height:250px;">
		    <div id="tabmain" title="MAIN">
		    	<tr>
			    	<td></td>
						<td>
							<input type="checkbox" name="cTarif" id="TARIF">
						</td>
						<td width="15%"><b>TARIF</td><td>&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text"  name="cTarif" id="tarif1" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
						<td>
							<input type="checkbox" name="inKdpt" id="KDPT">
						</td>
						<td width="15%"><b>KDPT</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdpt" id="KDPT" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>
					<td></td> 

					<tr>
						<td>
							<input type="checkbox" name="inKdpt2" id="KDPT2">
						</td>
						<td width="15%"><b>KDPT2</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdpt2" id="KDPT2" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>
									
		    </div>
				
    
		    <div title="PDL" id="tpdl">
		    	
		    	<tr>
					<td>
						<input type="checkbox" name="inThblmut" id="THBLMUT">
					</td>
						<td width="15%"><b>THBLMUT</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inThblmut" id="THBLMUT" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>


				<tr>
						<td>
							<input type="checkbox" name="inUnitupi" id="UNITUPI">
						</td>
						<td width="15%"><b>UNITUPI</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inUnitupi" id="UNITUPI" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>

				<tr>
						<td>
							<input type="checkbox" name="inKdpt2" id="UNITAP">
						</td>
						<td width="15%"><b>UNITAP</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdpt2" id="UNITAP" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>

				<tr>
						<td>
							<input type="checkbox" name="inUnitup" id="UNITUP">
						</td>
						<td width="15%"><b>UNITUP</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inUnitup" id="UNITUP" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>


				<tr>
						<td>
							<input type="checkbox" name="inTglrubahmk" id="TGLRUBAHMK">
						</td>
						<td width="15%"><b>TGLRUBAHMK</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inTglrubahmk" id="TGLRUBAHMK" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>

				

				<tr>
						<td>
							<input type="checkbox" name="inJensimkk" id="JENISMK">
						</td>
						<td width="15%"><b>JENISMK</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inJeniskmk" id="JENISMK" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>



				<tr>
						<td>
							<input type="checkbox" name="inKdproses" id="KDPROSES">
						</td>
						<td width="15%"><b>KDPROSES</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdproses" id="KDPROSES" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	

		    </div>



		     <div title="FTUL235" id="tftul">

				<tr>
						<td>
							<input type="checkbox" name="inKdam" id="KDAM">
						</td>
						<td width="15%"><b>KDAM</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdam" id="KDAM" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	


		     	<tr>
						<td>
							<input type="checkbox" name="inKddk" id="KDDK">
						</td>
						<td width="15%"><b>KDDK</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKddk" id="KDDK" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	

				

				<tr>
						<td>
							<input type="checkbox" name="inKdbacame" id="KDBACAME">
						</td>
						<td width="15%"><b>KDBACAME</td><td>&nbsp; &nbsp; &nbsp; </td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdbacame" id="KDBACAME" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	

				

				<tr>
						<td>
							<input type="checkbox" name="inKdklp" id="KDKLP">
						</td>
						<td width="15%"><b>KDKLP</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdklp" id="KDKLP" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	
				
				<tr>
						<td>
							<input type="checkbox" name="inKogol" id="KOGOL">
						</td>
						<td width="15%"><b>KOGOL</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKogol" id="KOGOL" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	
				

				<tr>
						<td>
							<input type="checkbox" name="inSubkogol" id="SUBKOGOL">
						</td>
						<td width="15%"><b>SUBKOGOL</td><td>&nbsp; &nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inSubkogol" id="SUBKOGOL" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	
				
				
				<tr>
						<td>
							<input type="checkbox" name="inKdppj" id="KDPPJ">
						</td>
						<td width="15%"><b>KDPPJ</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdppj" id="KDPPJ" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>	
				

				<tr>
						<td>
							<input type="checkbox" name="inThblmut" id="THBLMUT">
						</td>
						<td width="15%"><b>THBLMUT</td><td>&nbsp; &nbsp; &nbsp; &nbsp; </td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inThblmut" id="THBLMUT" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>
				
		    </div>

		    <div title="FAKMKWH" id="tfakmkwh">
		       	
		       	<tr>
					<td>
						<input type="checkbox" name="inPrimerkwh" id="CT_PRIMER_KWHCT_PRIMER_KWH">
					</td>

					<td><b>CTPRIMERKWH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <input type="text" name="inPrimerkwh" id="CT_PRIMER_KWHCT_PRIMER_KWH" style="width:10%"> </b></td><br>
				</tr>

				<td></td> 

				<tr>
					<td>
						<input type="checkbox" name="inSekunderkwh" id="CT_SEKUNDER_KWH">
					</td>

					<td><b>CTSEKUNDERKWH<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td> <input type="text" name="inKdpt" id="CT_SEKUNDER_KWH" style="width:10%"> </b></td><br>
				</tr>

				<td></td> 

				<tr>
					<td>
						<input type="checkbox" name="inPtpremier" id="PT_PRIMER_KWH">
					</td>

					<td><b>PTPRIMERKWH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>  <input type="text" name="inPtpremier" id="PT_PRIMER_KWH" style="width:10%"> </b></td><br>
				</tr>

				<tr>
					<td>
						<input type="checkbox" name="inPtsekunder" id="PT_SEKUNDER_KWH">
					</td>

					<td><b>PTSEKUNDERKWH<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td> <input type="text" name="inPtsekunder" id="PT_SEKUNDER_KWH" style="width:10%"> </b></td><br>
				</tr>

				<td></td> 


				<tr>
					<td>
						<input type="checkbox" name="inKonstanta" id="KONSTANTA_KWH">
					</td>

					<td><b>KONSTANTAKWH<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td> <input type="text" name="inKonstanta" id="KONSTANTA_KWH" style="width:10%"> </b></td><br>
				</tr>

				<td></td> 


				<tr>
					<td>
						<input type="checkbox" name="inFakmkwh" id="FAKMKWH">
					
					<td><b>FAKMKWH<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td> <input type="text" name="inFakmkwh" id="FAKMKWH" style="width:10%"> </b></td><br>
				</tr>

				<td></td> 

											
		       </div>

		    <div title="FAKMKVRH" id="tfakmkvrh">
		    	<tr>
						<td>
							<input type="checkbox" name="inCtprimerkvarh" id="CTPRIMERKVARH">
						</td>
						<td width="15%"><b>CTPRIMERKVARH</td><td>&nbsp; &nbsp; &nbsp; &nbsp; </td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inCtprimerkvarh" id="CTPRIMERKVARH" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
				</tr>

		      	

				<tr>
					<td>
						<input type="checkbox" name="inCtsekunderkvarh" id="CT_SEKUNDER_KVARH">
					</td>

					<td><b>CTSEKUNDERKVARH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</td> <input type="text" name="inCtsekundervarh" id="CT_SEKUNDER_KVARH" style="width:10%"> </b></td><br>
				</tr>

				<td></td> 

				<tr>
					<td>
						<input type="checkbox" name="inPtprimerkvarh" id="PT_PRIMER_KVARH">
					</td>

					<td><b>PTPRIMERKVARH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>  <input type="text" name="inPtprimerkvarh" id="PT_PRIMER_KVARH" style="width:10%">  </b></td><br>
				</tr>


				<tr>
					<td>
						<input type="checkbox" name="inPtsekunderkvarh" id="PT_PRIMER_KVARH">
					</td>

					<td><b>PTSEKUNDERKVARH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>  <input type="text" name="inPtsekunder" id="PT_SEKUNDER_KVARH" style="width:10%">  </b></td><br>
				</tr>
								
				<tr>
					<td>
						<input type="checkbox" name="inKonstantakvarh" id="KONSTANTA_KVARH">
					</td>

					<td><b>KONSTANTAKVARH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>  <input type="text" name="inKonstantavarh" id="KONSTANTA_KVARH" style="width:10%">  </b></td><br>
				</tr>
				
				<tr>
					<td>
						<input type="checkbox" name="inFakmkvarh" id="FAKMKVARH">
					</td>

					<td><b>FAKMKVARH <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>  <input type="text" name="inFakmvarh" id="FAKMKVARH" style="width:10%">  </b></td><br>
				</tr>
											

		      </div>		       
	</div>

 -->
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
		
		$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg2').datagrid({data:getData()}).datagrid('clientPaging');
			
			var vKosong ='<?php echo $kosong ?>';
			var VCocok ='<?php echo $cocok ?>';
			
			
			if (vKosong==1) {		
				$.messager.alert('Informasi','ID Pelanggan yang dicari tidak ditemukan ','info');
			} else if(vKosong==2){
				$.messager.alert('Warning','ID Pelanggan tidak boleh kosong! ','warning');
			} else if(vKosong==3){
				$.messager.alert('Warning','No Tiket tidak boleh kosong! ','warning');
			} else if(vKosong==4){
				$.messager.alert('Warning','ID Pelanggan dan No Tiket tidak boleh kosong! ','warning');
			}

			if (VCocok==1) {				
				$.messager.alert('Informasi','Data telah tersimpan!','info');
				
			} else if(vCocok==2){
				$.messager.alert('Warning','Data gagal disimpan','warning');
			}
					
			
		});
		function addTab(title){				
            if ($('#tt').tabs('exists', title)){
                $('#tt').tabs('select', title);
            } 
        }		
	</script>	

	<script>
	// assign function to onclick property of checkbox
	document.getElementById('active').onclick = function() {
    // call toggleSub when checkbox clicked
    // toggleSub args: checkbox clicked on (this), id of element to show/hide
    toggleSub(this, 'active_sub');
};
	

// called onclick of checkbox
	function toggleSub(box, id) {
    // get reference to related content to display/hide
    var el = document.getElementById(id);
    
    if ( box.checked ) {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}

	</script>
</body>
</html>