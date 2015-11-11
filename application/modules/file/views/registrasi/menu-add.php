<!-- PAGE table -->
<div class="row">
	<div class="col-md-12">
		<!-- BASIC -->
		<div class="box border orange">
			<div class="box-title">
				<h4><i class="fa fa-reorder"></i>Registrasi</h4>
				<div class="tools hidden-xs">
					
				</div>
			</div>
			<div class="box-body big">
				<form class="form-horizontal row-border"  method="post" id="form">
					
					<div class="form-group">
						<label class="col-md-2 control-label">Nama:</label> 
						<div class="col-md-4">
							<input  class="form-control" type="text" name="name" id="name" placeholder="Name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Otmilti:</label> 
						<div class="col-md-4">							
							<select class="col-md-12 full-width-fix" name="otmilti" id="otmilti" onchange="otmil_f(this)">								
								<option >-- Pilih --</option>
								<?php foreach($lookuptopmilti as $data){ ?>
								
								<option   value="<?php echo $data->kode_otmilti;?>" ><?php echo $data->nama;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Otmilti:</label> 
						<div class="col-md-4" id="lookupotmil">							
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Telepon:</label> 
						<div class="col-md-4">
							<input class="form-control" type="text" name="telepon" id="telepon" placeholder="telepon">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Alamat:</label> 
						<div class="col-md-4">
							<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
						</div>
					</div>	
					<div class="form-actions">
						<div class="row">						
							<div class="col-md-6">								
								<input type="submit" class="btn btn-primary btn-lg pull-right" onclick="save(this);" value="Save"/>													
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
// Fungsi Untuk Tambah Data
function save(){
	$('#form').validate({
	    rules: {
	      
	      nama: {
	        required: true,
	        minlength: 2
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
				url: url+'file/registras/execute/save',
				type: "POST",
				dataType:"json",
				data: $("#form").serialize(),
				beforeSend: function(){
					$("#loading").show(); 
				},
				success:function(data){
					$.pnotify({
						title: 'Registrasi Created',
						text: 'Registrasi Created',
						animation: {
							effect_in: 'show',
							effect_out: 'slide'
						},
						type : "success",
					});
						
					setInterval(function() {
						
						window.location = "./";
					}, 1000);
				},
				error: function(){
					$("#msg").slideDown();
				}
			}); 
		},			
		debug:true
	});	
} 
function otmil_f(){
	var idx = $("#otmilti").val()
	$.ajax({
		url: url+'file/registrasi/lookup',
		type: "POST",
		data: 'idx='+idx,
		beforeSend: function(){
			$("#lookupotmil").text("loading"); 
		},
		success:function(data){
			$("#lookupotmil").html(data); 
		}	
	});
}
$("#otmilti").select2({
    allowClear: !0
});



$("#link").select2({
    allowClear: !0
});
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
		margin-top: 2px;
	}
</style>