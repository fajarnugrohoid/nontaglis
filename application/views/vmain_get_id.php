<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pelunasan Nontaglis</title>
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
				<td><b style="font-size:14px; color:white;">Selamat Datang : <?php echo $this->session->userdata('nama_user');?>  
				<!-- |  UNIT : <?php echo $this->session->userdata('unit_up');?></b></td> -->
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
					<form action="<?php echo site_url('home/save') ?>" method="post">	
						<?php foreach ($datadil as $val) {} ?>
				
						<fieldset style="border:0.5px solid #95b8e7;width:100%;margin: 0 0 0 0;padding:25px 15px 25px 15px" >
						<legend style="color:#39516d;font-weight: bold;">Data Pelanggan</legend>
							<table  width="80%">	
								<tr>
									<td width="15%" style="align:center"><b>ID Pelanggan</td></b>
										
										<td width="25%"><input class="easyui-textbox" type="text" name="idpel" value="<?php echo $val->IDPEL; ?>" data-options="required:false,readonly
										:true"  id="idpel" style="width:60%;"></input></td>
									
									<td>&nbsp; &nbsp; &nbsp; &nbsp;</td>

									<td width="15%" style="align:center"><b>No Tiket</b></td>

									<td width="25%"> 
										<input class="easyui-textbox" type="text" name="inNotiket" id="iinNotiket"  data-options="required:false,prompt:'Masukan No Tiket'" style="width:60%;"></input>
									</td>

								</tr>

								<tr>
									<td width="15%" style="padding:10 5 10 5px"><b>Nama Pelanggan</b></td>
									
									<td width="5%"> 
										<input class="easyui-textbox" type="text" name="iinNamapel" id="iinNamapel" value="<?php echo $val->NAMA; ?>" data-options="required:false,readonly
										:true" style="width:60%;"></input>
									</td>
								</tr>

								<tr>
									<td width="15%" style="padding:10 5 10 5px"><b>Tarif </b></td>
									
									<td width="5%"> 
										<input class="easyui-textbox" type="text" name="inTarfi" id="inTarif" value="<?php echo $val->TARIF; ?>" data-options="required:false,readonly
										:true"style="width:60%;"></input>
									</td>
								</tr>

							</table>
						</fieldset>
					</td>
				</tr>
				</table>



			</form>
			</div>
			</div>


		 <div style="padding: 0 5px 5px 5px">
	            <div class="easyui-panel" title="Perubahan Data" style="width:100%;padding: 10px 13px 10px 10px">	
					<!-- <form action="<?php echo site_url('home/getdata') ?>" method="post">	 -->
			<table>
				<tr>
					<td>
						<fieldset style="border:0.5px solid #95b8e7;width:100%;margin: 50 0 50 0;padding:25px 15px 25px 15px" >
						<legend style="color:#39516d;font-weight: bold;">Pilih Atributs DIL</legend>
							<table  class="main" width="100%" style="100%">	
								<tr>
									<td>
										<input type="checkbox"  name="check1" value="main"  id="check1">
									</td>

									<td><b>MAIN</b></td>
																
									<td>
										<input type="checkbox"  name="check2" value="pdl" id="check2" >
									</td>
									<td>
										<b>PDL</b>
									</td>
									
														
									<td>
										<input type="checkbox" name="check3" value="ftul" id="check3">
									</td>
									<td>
										<b>FTUL235</b>
									</td>

									<td>
										<input type="checkbox" name="check4" value="fakmkwh" id="check4">
									</td>
									<td>
										<b>FAKMKWH</b>
									</td>

									<td>
										<input type="checkbox" name="check5" value="fakmkvarh" id="check5">
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

		</div>
</div>

<!-- MAIN -->
    	<div id="inAtributdil" class="easyui-tabs" style="width:1400px;height:250px;">
		    <div id="tabmain" title="MAIN" value="main1" style="display:none">
		    	<tr>
			    	<td></td>
			    	<form name="theForm">
			    		<td width="15%"><b>TARIF</td><td>&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox"  type="text" name="inTarif1" value="<?php echo $val->TARIF; ?>" data-options="required:false,readonly
										:true" id="tarif" style="width:10%"></input></td></td>
							</td>
						<input type="checkbox" name="theCB" onClick="toggleTB(this)">
						<td width="15%"><b>TARIF</td><td>&nbsp;&nbsp;</td></b>
							<td width="25%"><input type="text" name="tbTarif"  id="iintarif" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
			
				</tr>

					<td></td> 

					<tr>
					
							<td width="15%"><b>KDPT</td><td>&nbsp;&nbsp;&nbsp;</td></b>
								<td width="25%"><input class="easyui-textbox" type="text" name="inKdpt" value="<?php echo $val->KDPT; ?>" id="KDPT" style="width:10%;" data-options="required:false,readonly
											:true"style="width:100%;" ></input></td>
							
								<input type="checkbox" name="theCB1" onclick="toggleTB1(this)">
						
							<td width="15%"><b>KDPT</td><td>&nbsp;&nbsp;&nbsp;</td></b>
								<td width="25%"><input type="text" name="tbKdpt"   id="iinKDPT" style="width:10%;" style="width:100%;" ></input></td><br><br>
							<td width="5%"></td>
						
					</tr>

					<td></td> 

					<tr>
					<td width="15%"><b>KDPT2</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" readonly="" name="inKdpt2" value="<?php echo $val->KDPT_2; ?>" id="KDPT2" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						
							<input type="checkbox" name="theCB2" onclick="toggleTB2(this)">
						
						<td width="15%"><b>KDPT2</td><td>&nbsp;</td></b>
							<td width="25%"><input type="text" name="tbKdpt2" id="iinKDPT2" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
				</form>					
		    </div>
<!-- PDL		   -->
				
  <?php foreach ($datadil1 as $val1) {} ?>
   <div id="tbPDL" title="PDL" value="pdl" >
		    	<tr>
			    	<td></td>
			    	<td></td>
			    		<td width="15%"><b>THBLMUT</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inThblmut" value="<?php echo $val1->THBLMUT; ?>" data-options="required:false,readonly
										:true"  id="tarif" style="width:10%;"></input></td></td>
							<input type="checkbox" name="inTarif" id="THBLMUT">
						</td>
						<td width="15%"><b>THBLMUT</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inThblmut"   id="iinTHBLMUT" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
						<td width="15%"><b>UNITUPI</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inUnitup" value="<?php echo $val1->UNITUPI; ?>" id="KDPT" style="width:10%;" data-options="required:false,readonly
										:true"style="width:100%;" ></input>
						<td>
							<input type="checkbox" name="inKdpt" id="UNITUPI">
						</td>
						<td width="15%"><b>UNITUPI</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inUnitup"   id="iinUNITUPI" style="width:10%;" style="width:100%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
					<td></td> 

					<tr>
					<td width="15%"><b>UNITAP</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inUnitap" value="<?php echo $val1->UNITAP; ?>" id="KDPT2" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="theCB" onclick="toggleTB(this)">
						</td>
						<td width="15%"><b>UNITAP</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inUnitap" id="iinUNITAP" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
					<td width="15%"><b>UNITUP</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inUnitup" value="<?php echo $val1->UNITUP; ?>" id="KDPT2" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="theCB1" onclick="toggleTB1(this)">
						</td>
						<td width="15%"><b>UNITUP</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inUnitup" id="iinUNITUP" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
					<td width="15%"><b>TGLRUBAHMK</td><td></td></b>
							<td width="25%">&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inTglrbah" value="<?php echo $val1->TGLRUBAH_MK; ?>" id="TGLRUBAHMK" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKdpt2" id="UNITUP">
						</td>
						<td width="15%"><b>TGLRUBAHMK</td><td></td></b>
							<td width="25%">&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inTglrbah" id="iinTGLRUBAHMK" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
					<td width="15%"><b>KDPROSES</td><td></td></b>
							<td width="25%">&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inKdproses" value="<?php echo $val1->KDPROSES; ?>" id="TGLRUBAHMK" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKdpt2" id="KDPROSES">
						</td>
						<td width="15%"><b>KDPROSES</td><td></td></b>
							<td width="25%">&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKdproses" id="iinKDPROSES" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
									
		    </div> 
<!-- Ftul -->
	  <?php foreach ($datadil2 as $val2) {} ?>

		      <div id="tbFtul" title="FTUL235" value="ftul" >
		    	<tr>
			    	<td></td>
			    	<td></td>
			    		<td width="15%"><b>KDAM</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKdam"  value="<?php echo $val2->KDAM; ?>" data-options="required:false,readonly
										:true"  id="KDAM" style="width:10%;"></input></td></td>
							<input type="checkbox" name="inKdam" id="KDAM">
						</td>
						<td width="15%"><b>KDAM</td>&nbsp;&nbsp;&nbsp;&nbsp;<td></td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKdam"   id="iinKDAM" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
						<td width="15%"><b>KDDK</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKddk" value="<?php echo $val2->KDDK; ?>" id="KDDK" style="width:10%;" data-options="required:false,readonly
										:true"style="width:100%;" ></input>
						<td>
							<input type="checkbox" name="inKddk" id="KDDK">
						</td>
						<td width="15%"><b>KDDK</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKddk"   id="iinKDDK" style="width:10%;" style="width:100%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
						<td width="15%"><b>KDBACAMETER</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" readonly="" name="inKdpt2" value="<?php echo $val2->KDBACAMETER; ?>" id="KDBACAMETER" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKdbacameter" id="KDBACAMETER">
						</td>
						<td width="15%"><b>KDBACAMETER</td><td>&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKdabaca" id="iinKDBACAMETER" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
						<td width="15%"><b>KDKLP</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inKdklp" value="<?php echo $val2->KDKLP; ?>" id="KDKLP" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKdklp" id="KDKLP">
						</td>
						<td width="15%"><b>KDKLP</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKdklp" id="iinKDKLP" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>


					<tr>
						<td width="15%"><b>KOGOL</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inKogol" value="<?php echo $val2->KOGOL; ?>" id="KOGOL" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKogol" id="KOGOL">
						</td>
						<td width="15%"><b>KOGOL</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKogol" id="iinKOGOL" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>


					<tr>
						<td width="15%"><b>SUBKOGOL</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="insubogol" value="<?php echo $val2->SUBKOGOL; ?>" id="SUBKOGOL" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="insubogol" id="SUBKOGOL">
						</td>
						<td width="15%"><b>SUBKOGOL</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="insubogol" id="iinSUBKOGOL" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
						<td width="15%"><b>KDPPJ</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inKdppj" value="<?php echo $val2->KDPPJ; ?>" id="KDPPJ" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKdppj" id="KDPPJ">
						</td>
						<td width="15%"><b>KDPPJ</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKdppj" id="iinKDPPJ" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
						<td width="15%"><b>PEMDA</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inKdppj" value="<?php echo $val2->PEMDA; ?>" id="PEMDA" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="insubogol" id="PEMDA">
						</td>
						<td width="15%"><b>PEMDA</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKddpj" id="iinPEMDA" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
									
		    </div>
<!-- FAKMKWH			 -->

	 <?php foreach ($datadil3 as $val3) {} ?>

		<div id="tbFakmkwh" title="FAKMKWH" >
		    	<tr>
			    	<td></td>
			    	<td></td>
			    		<td width="15%"><b>CTPRIMER</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td bgcolor="" width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox"  type="text" name="inTarif1" value="<?php echo $val3->CT_PRIMER_KWH; ?>" data-options="required:false,readonly
										:true"  id="tarif" style="width:10%;"></input></td>
							<input type="checkbox" name="inCtprimer" id="CTPRIMER">
						</td>
						<td width="15%"><b>CTPRIMER</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inCtprimer"   id="iinCTPRIMER" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
						<td width="15%"><b>CTSEKUNDER</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inCtsekunder" value="<?php echo $val3->CT_SEKUNDER_KWH; ?>" id="CTSEKUNDER" style="width:10%;" data-options="required:false,readonly
										:true"style="width:100%;" ></input>
						<td>
							<input type="checkbox" name="inKdpt" id="CTSEKUNDER">
						</td>
						<td width="15%"><b>CTSEKUNDER</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inCtsekunder"   id="iinCTSEKUNDER" style="width:10%;" style="width:100%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
					<td></td> 

					<tr>
					<td width="15%"><b>PTPRIMER</td><td>&nbsp;&nbsp;&nbsp; </td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inPtprimer" value="<?php echo $val3->PT_PRIMER_KWH; ?>" id="PTPRIMER" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inPtprimer" id="PTPRIMER">
						</td>
						<td width="15%"><b>PTPRIMER</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inPtprimer" id="iinPTPRIMER" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
					<td width="15%"><b>PTSEKUNDER</td><td>&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inPtsekunder" value="<?php echo $val3->PT_SEKUNDER_KWH; ?>" id="PTSEKUNDER" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inPtsekunder" id="PTPRIMER">
						</td>
						<td width="15%"><b>PTSEKUNDER</td><td>&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inPtsekunder" id="iinPTSEKUNDER" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
					<td width="15%"><b>KONSTANTA</td><td>&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inKonstanta" value="<?php echo $val3->KONSTANTA_KWH; ?>" id="KONSTANTA" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inKonstanta" id="KONSTANTA">
						</td>
						<td width="15%"><b>KONSTANTA</td><td>&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inKonstanta" id="iinKONSTANTA" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
					<td width="15%"><b>FAKMKWH</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="easyui-textbox" type="text" readonly="" name="inFAKMKWH" value="<?php echo $val3->FAKMKWH; ?>" id="FAKMKWH" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inFAKMKWH" id="KONSTANTA">
						</td>
						<td width="15%">&nbsp;&nbsp;&nbsp;&nbsp;<b>FAKMKWH</td><td>&nbsp; &nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inFAKMKWH" id="iinFAKMKWH" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
									
		    </div>

<!-- FMKVRAH -->
<?php foreach ($datadil4 as $val4){} {} ?>
	<div id="tabFakmkvarh" title="FAKMKVARH" >
		    	<tr>
			    	<td></td>
			    	<td></td>
			    		<td width="15%"><b>CTPRIMERKV</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inTarif1" value="<?php echo $val4->CT_PRIMER_KVARH; ?>" data-options="required:false,readonly
										:true"  id="tarif" style="width:10%;"></input></td></td>
							<input type="checkbox" name="inCtprimetkv" id="CT_PRIMER_KVARH">
						</td>
						<td width="15%"><b>CTPRIMERKV</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inCtprimetkv"   id="iinCT_PRIMER_KVARH" style="width:10%;"></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
						<td width="15%"><b>CTSEKUNDERKV</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inCtsekunderkv" value="<?php echo $val4->CT_SEKUNDER_KVARH; ?>" id="CTSEKUNDERKV" style="width:10%;" data-options="required:false,readonly
										:true"style="width:100%;" ></input>
						<td>
							<input type="checkbox" name="inCtsekunderkv" id="CTSEKUNDERKV">
						</td>
						<td width="15%"><b>CTSEKUNDERKV</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inCtsekunderkv"   id="iinCTSEKUNDERKV" style="width:10%;" style="width:100%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<td></td> 

					<tr>
					<td width="15%"><b>PTPRIMERKV</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" readonly="" name="inKdpt2" value="<?php echo $val4->PT_PRIMER_KVARH; ?>" id="PTPRIMERKV" style="width:10%;" data-options="required:false,readonly
										:true" ></input></td> 
						<td>
							<input type="checkbox" name="inPtprimerkv" id="PTPRIMERKV">
						</td>
						<td width="15%"><b>PTPRIMERKV</td><td>&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inPtprimerkv" id="iinPTPRIMERKV" style="width:10%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
						<td width="15%"><b>PTSEKUNDERKV</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inPtsekunderkv" value="<?php echo $val4->PT_SEKUNDER_KVARH; ?>" id="PTSEKUNDERKV" style="width:10%;" data-options="required:false,readonly
										:true"style="width:100%;" >&nbsp;&nbsp; &nbsp;</input>
						<td>
							<input type="checkbox" name="inPtsekunderkv" id="PTSEKUNDERKV">
						</td>
						<td width="15%"><b>PTSEKUNDERKV</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%">&nbsp;&nbsp;<input class="easyui-textbox" type="text" name="inPtsekunderkv"   id="iinPTSEKUNDERKV" style="width:10%;" style="width:100%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>

					<tr>
						<td width="15%"><b>KONSTANTAKV</td><td>&nbsp;&nbsp;&nbsp;</td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKonstantakv" value="<?php echo $val4->KONSTANTA_KVARH; ?>" id="KONSTANTAKV" style="width:10%;" data-options="required:false,readonly
										:true"style="width:100%;" ></input>
						<td>&nbsp;&nbsp;
							<input type="checkbox" name="inKonstantakv" id="KONSTANTAKV">
						</td>
						<td width="15%"><b>KONSTANTAKV</td><td>&nbsp;&nbsp;&nbsp; </td></b>
							<td width="25%"><input class="easyui-textbox" type="text" name="inKonstantakv"   id="iinKONSTANTAKV" style="width:10%;" style="width:100%;" ></input></td><br><br>
						<td width="5%"></td>
					</tr>
					<input class="easyui-textbox" type="hidden" name="inuser"   id="user" value="<?php echo $this->session->userdata('nama_user');?>" >				
		    </div>
</div>



<form method="post" action="">
<input class="chk" type="checkbox" id="chek" name="jquery" value="jquery" />Apakah Anda yakin ingin merubah data ini<br/><br/>
<input type="submit" name="submit" id="submit" value="SAVE" />
</form>

<script type="text/javascript">
	function toggleTB(what){
		if (what.checked) {document.theForm.tbTarif.disabled=0}
			else{document.theForm.tbTarif.disabled=1}
		}
				
</script>
<script type="text/javascript">
	function toggleTB1(a){
		if (a.checked) {document.theForm.tbKdpt.disabled=0}
			else{document.theForm.tbKdpt.disabled=1}
				
		}
</script>
<script type="text/javascript">
	function toggleTB2(b){
		if (b.checked) {document.theForm.tbKdpt2.disabled=0}
			else{document.theForm.tbKdpt2.disabled=1}
				
		}
</script>
<script type="text/javascript">
	
	$('#submit').prop("disabled", true);
$('#chek').click(function() {
        if ($(this).is(':checked')) {
			$('#submit').prop("disabled", false);
        } else {
		if ($('.chk').filter(':checked').length < 1){
			$('#submit').attr('disabled',true);}
		}
});
</script>


<script type="text/javascript">
	$('#check1').click(function () {
if ($(this).is(':checked')) {
$("#tabmain").show();
} else {
$("#tabmain").hide();
}
});

</script>


<script type="text/javascript">
	$('#check2').click(function () {
if ($(this).is(':checked')) {
$("#tbPDL").show();
} else {
$("#tbPDL").hide();
}
});

</script>

<script type="text/javascript">
	$('#check3').click(function () {
if ($(this).is(':checked')) {
$("#tbFtul").show();
} else {
$("#tbFtul").hide();
}
});

</script>

<script type="text/javascript">
	$('#check3').click(function () {
if ($(this).is(':checked')) {
$("#tbFakmkwh").show();
} else {
$("#tbFakmkwh").hide();
}
});

</script>

<script type="text/javascript">
	$('#check3').click(function () {
if ($(this).is(':checked')) {
$("#tabFakmkvarh").show();
} else {
$("#tabFakmkvarh").hide();
}
});

</script>




<script type="text/javascript">
// $(document).ready(function(){
//     $('input[type="checkbox"]').click(function(){
//         if($(this).attr("value")=="tabmain"){
//             $(".tabmain").toggle();
//         }
//         if($(this).attr("value")=="pdl"){
//             $(".pdl").toggle();
//         }
//         if($(this).attr("value")=="ftul"){
//             $(".ftul").toggle();
//         }
//     });
// });
</script>





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
				foreach ($datadil as $val) {

						$TARIF = $val->TARIF;
						$KDPT = $val->KDPT;	
						$KDPT2 = $val->KDPT2;									
			?>

				var TARIF = '<?php echo $TARIF; ?>';
				var KDPT = '<?php echo $KDPT; ?>';
				var KDPT2 = '<?php echo $KDPT2; ?>';


				rows.push({
					TARIF:TARIF,
					KDPT:KDPT,
					KDPT2:KDPT2				
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

<script type="text/javascript">
	$(document).ready(function() {
    // Kondisi saat Form di-load
    if ($("#intarif").val() == "Y") {
        $('#iinTarif').removeAttr('disabled');
    } else {
        $('#intarif').attr('disabled','disabled'); 
    }
    // Kondisi saat ComboBox (Select Option) dipilih nilainya
    $("#x_AndaMhs").change(function() {
        if (this.value == "N") {
            $('#iintarif').attr('disabled','disabled'); 
            $('#intarif').val('');
        } else {
            $('#iintarif').removeAttr('disabled');
            $('#intarif').focus();
        } 
    });
}); 

</script>


<script type="text/javascript">
	
	$(function)(){

		$('#TARIF').click(function()){
			if ($(this).is('checked') {
				$("#intarif").removeAttr("disabled");
				$("#intarif").focus();
			}else{
				$("intarif").attr("disabled","disabled");

				}
			};
		}
</script>

<script>
		$(function () {
		var $btn = $(":submit[id$=btnSubmit]");
		var $chk = $(":input:CheckBox[id$=cb1]");

		// check on page load
		checkChecked($chk);

		$chk.click(function () {
		checkChecked($chk);
});

		function checkChecked(chkBox) {
		if ($chk.is(':checked')) {
		$btn.removeAttr('disabled');
	}
		else {
		$btn.attr('disabled', 'disabled')
			}
	}
});
</script>

	
</body>
</html>