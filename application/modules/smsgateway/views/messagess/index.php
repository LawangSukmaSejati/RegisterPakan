<!-- PAGE table -->
<div class="row">
	<div class="col-md-10">
		<!-- BASIC -->
		<div class="box border purple">
			<div class="box-title">
				<h4><i class="fa fa-reorder"></i>New Messages</h4>
				<div class="tools hidden-xs">
					
				</div>
			</div>
			<div class="box-body big">
				<form class="form-horizontal row-border"  method="post" id="form">
					<div class="form-group">
						<label class="col-md-2 control-label">Device:</label> 
						<div class="col-md-4">
							<select name="device" id="device" class="form-control">								
								<option value="Phone1">Slot 1</option>								
								<option value="Phone2">Slot 2</option>								
								<option value="Phone3">Slot 3 </option>								
								<option value="Phone4">Slot 4 </option>								
								<option value="Phone5">Slot 5 </option>								
								<option value="Phone6">Slot 6 </option>								
								<option value="Phone7">Slot 7 </option>								
								<option value="Phone8">Slot 8 </option>																
							</select>							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Protocol:</label> 
						<div class="col-md-4">
							<select name="protokol" id="protokol" class="form-control">								
								<option value="sms">SMS</option>
								<option value="wa">Whatsapp (Inactive)</option>							
								<option value="email">Email (Inactive)</option>							
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Type:</label>
						<div class="col-md-8">
							<label class="radio-inline">
								<input type="radio" onchange="chagetype('single');" class="uniform" name="type" value="single" checked="checked"/> Single / Multiple
							</label>
							<!--label class="radio-inline">
								<input type="radio" onchange="chagetype('group');" class="uniform" name="type" value="group"  /> Group 
							</label-->
							<label class="radio-inline">
								<input type="radio" onchange="chagetype('broadcast');" class="uniform" name="type" value="broadcast"  /> Broadcast 
							</label>
						</div>
					</div>
					<div class="form-group" id="single">
						<label class="col-md-2 control-label">Destination:</label> 
						<div class="col-md-10">
							<input  class="form-control" type="text" name="destination" id="destination" placeholder="Exp. 0838154123">
						</div>
					</div>
					<div class="form-group" id="group" style="display:none">
						<label class="col-md-2 control-label">Group:</label> 
						<div class="col-md-10">
							<select class="col-md-12 full-width-fix" name="phonegroup" id="phonegroup">								
								<?php foreach($phonegroup as $key=>$value){
									echo '<option value="'.$value->id.'">'.$value->name.'</option>';
								} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Messages:</label> 
						<div class="col-md-10">
							<textarea name="messages" id="messages" onkeyup="countChar(this)" cols="30" rows="10" class="form-control"></textarea>
							<div id="charNum" class="pull-right"> 0 Character</div> 
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
				url: url+'smsgateway/messages/send',
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