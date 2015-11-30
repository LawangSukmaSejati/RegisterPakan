<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        <!-- BASIC -->
        <div class="box border green">
            <div class="box-title">
                <h4><i class="fa fa-reorder"></i>Form C. SURAT PERNYATAAN (FL/01C/PB/002) / <?php echo $identity->code;?></h4>
                <div class="tools hidden-xs">
                    
                </div>
            </div>
            <div class="box-body big">
                <form class="form-horizontal row-border"  method="post" id="form">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nomor Surat:</label> 
                        <div class="col-md-5">
                            <input  class="form-control" type="text" name="nomor" id="nomor" placeholder="Nomor Surat" value="<?php echo (empty($form_c->nomor) ?  "" : $form_c->nomor)?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama:</label> 
                        <div class="col-md-5">
                            <input  class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo (empty($form_c->nama) ?  "" : $form_c->nama)?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label">Jabatan:</label> 
                        <div class="col-md-5">
                            <input  class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo (empty($form_c->jabatan) ?  "" : $form_c->jabatan)?>">
                        </div>
                    </div>                              
                    <div class="form-group">
                        <label class="col-md-3 control-label">Alamat:</label> 
                        <div class="col-md-5">
                            <textarea class="form-control" name="alamat" id="alamat" style="margin: 0px -0.34375px 0px 0px; width: 402px; height: 159px;"><?php echo (empty($form_c->alamat) ?  "" : $form_c->alamat);?></textarea>                          
                        </div>
                    </div>          
                            
                            
                    
                    <div class="form-actions">
                        <div class="row">                       
                            <div class="col-md-12">     
                                <div id="loading"></div>
                                <input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id;?>">
                                <input type="hidden" name="p_form_identity" id="p_form_identity" value="<?php echo $identity->id;?>">
                                <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>">
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
                <?php if(empty($form_c->id)){?>
                url: url+'execute/save/p_form_c',
                <?php }else{?>
                url: url+'execute/update/p_form_c/id/<?php echo $form_c->id;?>',
                <?php }?>
                type: "POST",
                dataType:"json",
                data: $("#form").serialize(),
                beforeSend: function(){
                    $("#send").addClass('disabled'); 
                    $("#loading").text('Loading...'); 
                },
                success:function(data){
                    new PNotify({
                        title: 'Form C Created',
                        text: 'Form C Created Success',
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