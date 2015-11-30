<!-- PAGE table -->
<div class="row">
	<div class="col-md-12">
		<!-- BASIC -->
		<div class="box border green">
			<div class="box-title">
				<h4><i class="fa fa-reorder"></i>Form Identity</h4>
				<div class="tools hidden-xs">
					
				</div>
			</div>
			<div class="box-body big">
				<form class="form-horizontal row-border"  method="post" id="form">
					<div class="form-group">
						<label class="col-md-3 control-label">Nomor Register:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="code" id="code" value="<?php echo $loops->code;?>" placeholder="" readonly="readonly">*) Auto Generate
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nomor Pemohon:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="nomor_pemohon" id="nomor_pemohon" value="<?php echo $loops->nomor_pemohon;?>" placeholder="Nomor Pemohon">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-md-3 control-label">Tanggal Pemohon:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="tanggal_pemohon" id="tanggal_pemohon" placeholder="" value="<?php echo $loops->tanggal_pemohon;?>">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-md-3 control-label">Nama Perusahaan:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $loops->nama_perusahaan;?>">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-md-3 control-label">Nama Pimpinan Perusahaan:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="nama_pimpinan_perusahaan" id="nama_pimpinan_perusahaan" placeholder="Nama Pimpinan Perusahaan" value="<?php echo $loops->nama_pimpinan_perusahaan;?>">
						</div>
					</div>					
                    <div class="form-group">
						<label class="col-md-3 control-label">Nama Penanggung Jawab Perusahaan:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="nama_penanggung_jawab_perusahaan" id="nama_penanggung_jawab_perusahaan" placeholder="Nama Penanggung Jawab Perusahaan" value="<?php echo $loops->nama_penanggung_jawab_perusahaan;?>">
						</div>
					</div>					
                    <div class="form-group">
						<label class="col-md-3 control-label">Jabatan Perusahaan:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="jabatan_perusahaan" id="jabatan_perusahaan" placeholder="Jabatan Perusahaan" value="<?php echo $loops->jabatan_perusahaan;?>">
						</div>
					</div>			
                    <div class="form-group">
						<label class="col-md-3 control-label">Alamat Perusahaan:</label> 
						<div class="col-md-5">
                            <textarea class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" style="margin: 0px -0.34375px 0px 0px; width: 402px; height: 159px;"><?php echo $loops->alamat_perusahaan;?></textarea>							
						</div>
					</div>			
                    		
                    <div class="form-group">
						<label class="col-md-3 control-label">Produsen Importir:</label> 
						<div class="col-md-5">
							<select name="produsen_importir" id="produsen_importir" class="form-control">
                                <option value="produsen">Produsen</option>
                                <option value="importir">Importir</option>
                                <option value="distributor">Distributor</option>
                            </select>
						</div>
					</div>			
                    <div class="form-group">
						<label class="col-md-3 control-label">Jumlah Merk:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="jumlah_merk" id="jumlah_merk" placeholder="Jumlah Merk" value="<?php echo $loops->jumlah_merk;?>">
						</div>
					</div>			
                    <div class="form-group">
						<label class="col-md-3 control-label">Tanggal Diterima Sekretariat:</label> 
						<div class="col-md-5">
							<input  class="form-control" type="text" name="tanggal_diterima_sekretariat" id="tanggal_diterima_sekretariat" placeholder="tanggal diterima sekretariat" value="<?php echo $loops->tanggal_diterima_sekretariat;?>">
						</div>
					</div>			
                    
					<div class="form-actions">
						<div class="row">						
							<div class="col-md-12">		
								<div id="loading"></div>
                                <input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id;?>">
								<input type="submit" class="btn btn-primary btn-lg pull-right" onclick="sends(this);" id="send" value="Create"/>													
							</div>							
						</div>
					</div>										   
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /BASIC -->
<div class="separator"></div>
<script type="text/javascript">
var url = "<?php echo site_url(); ?>";

function sends(){
	$('#form').validate({
	    rules: {
			/* destination: {				
				required: true
			}, */
			fullname: {
				required: true	        
			},
            username: {
				required: true	        
			},
            password: {
				required: true	        
			},
	    },
		highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
			element
			.text('OK!').addClass('valid')
			.closest('.control-group').removeClass('error').addClass('success');
		},
		submitHandler: function(form){
			$.ajax({
				url: url+'execute/update/p_form_identity/id/<?php echo $loops->id;?>',
				type: "POST",
				dataType:"json",
				data: $("#form").serialize(),
				beforeSend: function(){
					$("#send").addClass('disabled'); 
					$("#loading").text('Loading...'); 
				},
				success:function(data){
					new PNotify({
						title: 'Identity Created',
						text: 'Identity Created Success',
						animation: {
							effect_in: 'show',
							effect_out: 'slide'
						},
						type : "success",
						styling: 'bootstrap3'
					});
						
					
					//clear();
					$("#loading").remove(); 
					$('#form').trigger("reset");
					$("#send").removeClass('disabled');
					setInterval(function() {
						
						window.location= url+'registrasi/permohonan/';
					}, 1000);
				},
				error: function(message){
					
					new PNotify({
						title: message.status,
						text: message.statusText,
						animation: {
							effect_in: 'show',
							effect_out: 'slide'
						},
						styling: 'bootstrap3',
						type : "error",
					});
					$("#loading").remove(); 
					$("#send").removeClass('disabled'); 
				}
			}); 
		},			
		debug:true
	});	
}
$('#tanggal_pemohon').datepicker({
    format: "yyyy-mm-dd",
    startView: 1,
    autoclose: true
});
$('#tanggal_diterima_sekretariat').datepicker({
    format: "yyyy-mm-dd",
    startView: 1,
    autoclose: true
});
$("#phonegroup").select2({ allowClear: !0});
$('#destination').tokenfield({});
function chagetype(param){
	
	if(param =='group'){
		$("#group").show();
		$("#single").hide();
	}
	if(param =='single'){
		$("#group").hide();
		$("#single").show();
	}
	if(param =='broadcast'){
		$("#group").hide();
		$("#single").hide();
	}
}
function countChar(val) {
    var len = val.value.length;        
		$('#charNum').text(len+" Character");

};
</script>

<style type="text/css">
	label.valid {
		width: 24px;
		height: 24px;
		display: inline-block;
		text-indent: -9999px;
	}
	label.error {
		font-weight: bold;
		color: red;
		padding: 2px 8px;
		margin-top: 1px;
	}
</style>