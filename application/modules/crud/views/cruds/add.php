<!-- PAGE table -->
<div class="row">
	<div class="col-md-10">
		<!-- BASIC -->
		<div class="box border blue">
			<div class="box-title">
				<h4><i class="fa fa-reorder"></i>CRUD</h4>
				<div class="tools hidden-xs">
					
				</div>
			</div>
			<div class="box-body big">
				<form class="form-horizontal row-border"  method="post" id="form">
					<div class="form-group">
						<label class="col-md-2 control-label">Code:</label> 
						<div class="col-md-4">
							<input  class="form-control" type="text" name="code" id="code" placeholder="Code">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">name:</label> 
						<div class="col-md-4">
							<input  class="form-control" type="text" name="name" id="name" placeholder="name">
						</div>
					</div>
					<div class="form-actions">
						<div class="row">						
							<div class="col-md-12">		
								<div id="loading"></div>
								<input type="submit" class="btn btn-primary btn-lg pull-right" onclick="sends(this);" id="send" value="Send"/>													
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
			messages: {
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
				url: url+'execute/save/crud',
				type: "POST",
				dataType:"json",
				data: $("#form").serialize(),
				beforeSend: function(){
					$("#send").addClass('disabled'); 
					$("#loading").text('Loading...'); 
				},
				success:function(data){
					new PNotify({
						title: 'Send Sms',
						text: 'Send Sms Success',
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
						
						window.location.reload();
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