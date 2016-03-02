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
			
		<form action="<?php echo site_url('home/getdata') ?>" method="post" onsubmit="return validasi_input(this)">

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
		
		$(function(){
			var vKosong = '<?php echo $kosong ?>';
			console.log(vKosong);
			alert (vKosong);
			if (vKosong==1) {		
				$.messager.alert('Informasi','ID Pelanggan Tidak Boleh Kosong !!! ','info');
				vKosong = '0';
			} else if (vKosong==2) {
				$.messager.alert('Informasi','iD Pelanggan Tidak Ditemukan !!! ','info');
				Kosong = '0';
			} else if (vKosong==3) {
				$.messager.alert('Informasi','Data Berhasil Disimpan','info');
				Kosong = '0';
			} else if (vKosong==4){
				$.messager.alert('Informasi','Data Gagal Disimpan','info');
				Kosong = '0';
			} else if (vKosong==5){
				$.messager.alert('Informasi','No TIKET TIDAK BOLEH KOSONG','info');
				Kosong = '0';
			}
		  
		});


		function addTab(title){				
            if ($('#tt').tabs('exists', title)){
                $('#tt').tabs('select', title);
            } 
        }	

	function validasi_input(form){		
		
		if (form.inIdpel.value == ""){
		    $.messager.alert('Informasi','Id Pelanggan harus diisi','info');
		       return (false);
		    }else {
			   return (true);
		    }
		 }


	</script>	

	<script>
	
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