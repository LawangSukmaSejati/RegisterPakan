<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        <!-- BASIC -->
        <div class="box border green">
            <div class="box-title">
                <h4><i class="fa fa-reorder"></i>Form A</h4>
                <div class="tools hidden-xs">
                    
                </div>
            </div>
            <div class="box-body big">
                <form class="form-horizontal row-border"  method="post" id="form">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nomor Pemohon:</label> 
                        <div class="col-md-7">
                            <input  class="form-control" type="text" name="nomor_pemohon" value="<?php echo $identity->nomor_pemohon;?>"id="nomor_pemohon" disabled>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama Perusahaan:</label> 
                        <div class="col-md-7">
                            <input  class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan" disabled value="<?php echo $identity->nama_perusahaan;?>">                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Status Pendaftaran:</label> 
                        <div class="col-md-7">
                            <input  class="form-control" type="text" name="nomor_pendaftaran" id="nomor_pendaftaran" disabled>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Merk Dagang:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="merk_dagang" id="merk_dagang" placeholder="Merk Dagang">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Jenis Pakan:</label> 
                        <div class="col-md-10"> 
                            <div class="row">                                
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="sifat" placeholder="Sifat">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="bentuk" placeholder="Bentuk">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="ukuran" placeholder="Ukuran">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kode:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="kode" id="kode" placeholder="Kode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kemasan dan Berat Bersih:</label> 
                        <div class="col-md-10"> 
                            <div class="row">                                
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="bentuk" placeholder="Bentuk">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="volume" placeholder="Volume">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kandungan Gizi dan Presentasenya:</label> 
                        <div class="col-md-10"> 
                            <div class="row">
                                <label class="col-md-2 control-label">Protein Min:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="protein_min" placeholder="Protein Min">
                                </div>
                                <label class="col-md-2 control-label">Protein Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="protein_max" placeholder="Protein Min">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Air Min:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="air_min" placeholder="Air Min">
                                </div>
                                <label class="col-md-2 control-label">Air Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="air_max" placeholder="Air Max">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Abu Min:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="abu_min" placeholder="Abu Min">
                                </div>
                                <label class="col-md-2 control-label">Abu Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="abu_max" placeholder="Abu Max">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Lemak Min:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="lemak_min" placeholder="Lemak Min">
                                </div>
                                <label class="col-md-2 control-label">Lemak Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="lemak_max" placeholder="Lemak Max">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Serat Kasar Min:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="serat_kasar_min" placeholder="Serat Kasar Min">
                                </div>
                                <label class="col-md-2 control-label">Serat Kasar Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="serat_kasar_max" placeholder="Serat Kasar Max">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <div class="row">                       
                            <div class="col-md-12">     
                                <div id="loading"></div>
                                <input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id;?>">
                                <input type="hidden" name="p_form_identity" id="p_form_identity" value="<?php echo $identity->id;?>">
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
                url: url+'execute/save/p_form_a',
                type: "POST",
                dataType:"json",
                data: $("#form").serialize(),
                beforeSend: function(){
                    $("#send").addClass('disabled'); 
                    $("#loading").text('Loading...'); 
                },
                success:function(data){
                    new PNotify({
                        title: 'Formulir A Created',
                        text: 'Formulir A Created Success',
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
                        
                        window.location= url+'registrasi/permohonan/form_a';
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
