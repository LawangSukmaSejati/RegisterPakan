<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        <!-- BASIC -->
        <div class="box border green">
            <div class="box-title">
                <h4><i class="fa fa-reorder"></i>Form B. Jenis Bahan Pelengkap dan Imbuhan Pakan FL/01B/PB/002</h4>
                <div class="tools hidden-xs">
                    
                </div>
            </div>
            <div class="box-body big">
                <form class="form-horizontal row-border"  method="post" id="form">                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama Dagang/Merk Pakan:</label> 
                        <div class="col-md-10"> 
                            <div class="row">
                                <label class="col-md-1 control-label">Kode:</label> 
                                <div class="col-md-4">
                                    <input  class="form-control" type="text" name="merk_dagang" id="merk_dagang" placeholder="Merk Dagang" disabled value="<?php echo $form_a->merk_dagang;?>">
                                </div>
                                <label class="col-md-1 control-label">Kode:</label> 
                                <div class="col-md-4">
                                    <input  class="form-control" type="text" name="kode" id="kode" placeholder="Kode" disabled value="<?php echo $form_a->kode;?>">
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Jenis bahan pelengkap dan imbuhan pakan:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="jenis_bahan_pelengkap" id="jenis_bahan_pelengkap" placeholder="jenis_bahan_pelengkap">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Presentase Bahan:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="presentase_bahan" id="presentase_bahan" placeholder="presentase_bahan">
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <div class="row">                       
                            <div class="col-md-12">     
                                <div id="loading"></div>
                                <input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id;?>">
                                <input type="hidden" name="p_form_identity" id="p_form_identity" value="<?php echo $identity->id;?>">
                                <input type="hidden" name="p_form_a" id="p_form_a" value="<?php echo $form_a->id;?>">
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
                url: url+'execute/save/p_form_b_bahan_pelengkap',
                type: "POST",
                dataType:"json",
                data: $("#form").serialize(),
                beforeSend: function(){
                    $("#send").addClass('disabled'); 
                    $("#loading").text('Loading...'); 
                },
                success:function(data){
                    new PNotify({
                        title: 'Formulir B jenis_bahan_pelengkap',
                        text: 'Formulir B Created Success',
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
                        
                        window.location= url+'registrasi/permohonan/form_b/<?php echo $identity->id;?>/<?php echo $form_a->id;?>';
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
