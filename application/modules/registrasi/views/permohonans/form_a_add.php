<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        <!-- BASIC -->
        <div class="box border green">
            <div class="box-title">
                <h4><i class="fa fa-reorder"></i>FL/01A/PB/002 Form A : Merek, Jenis, Kode, Peruntukkan, Berat Bersih, Kandungan Gizi Pakan </h4>
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
                        <label class="col-md-2 control-label">Status:</label> 
                        <div class="col-md-7">
                            <input  class="form-control" type="text" name="nomor_pendaftaran" id="nomor_pendaftaran" value="<?php echo $identity->status;?>" disabled>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Merk Dagang:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="merk_dagang" id="merk_dagang" placeholder="Merk Dagang" value="<?php echo (empty($form_a->merk_dagang) ? "": $form_a->merk_dagang);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Jenis Pakan:</label> 
                        <div class="col-md-10"> 
                            <div class="row">                                
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="sifat" placeholder="Sifat" value="<?php echo (empty($form_a->sifat) ? "": $form_a->sifat);?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="bentuk_jp" placeholder="Bentuk" value="<?php echo (empty($form_a->bentuk_jp) ? "": $form_a->bentuk_jp);?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="ukuran" placeholder="Ukuran" value="<?php echo (empty($form_a->ukuran) ? "": $form_a->ukuran);?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kode:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="kode" id="kode" placeholder="Kode" value="<?php echo (empty($form_a->kode) ? "": $form_a->kode);?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">Peruntukan:</label> 
                        <div class="col-md-10">
                            <input  class="form-control" type="text" name="peruntukan" id="peruntukan" placeholder="Peruntukan" value="<?php echo (empty($form_a->peruntukan) ? "": $form_a->peruntukan);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kemasan dan Berat Bersih:</label> 
                        <div class="col-md-10"> 
                            <div class="row">                                
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="bentuk_kbb" placeholder="Bentuk" value="<?php echo (empty($form_a->bentuk_kbb) ? "": $form_a->bentuk_kbb);?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="volume" placeholder="Volume" value="<?php echo (empty($form_a->volume) ? "": $form_a->volume);?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kandungan Gizi dan Presentasenya:</label> 
                        <div class="col-md-10"> 
                            <div class="row">
                                <label class="col-md-2 control-label">Protein:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="protein" placeholder="Protein" value="<?php echo (empty($form_a->protein) ? "": $form_a->protein);?>">
                                </div>
                               <!--  <label class="col-md-2 control-label">Protein Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="protein_max" placeholder="Protein Min">
                                </div> -->
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Air:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="air" placeholder="Air" value="<?php echo (empty($form_a->air) ? "": $form_a->air);?>">
                                </div>
                                <!-- <label class="col-md-2 control-label">Air Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="air_max" placeholder="Air Max">
                                </div> -->
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Abu:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="abu" placeholder="Abu" value="<?php echo (empty($form_a->abu) ? "": $form_a->abu);?>">
                                </div>
                               <!--  <label class="col-md-2 control-label">Abu:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="abu" placeholder="Abu">
                                </div> -->
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Lemak:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="lemak" placeholder="Lemak" value="<?php echo (empty($form_a->lemak) ? "": $form_a->lemak);?>">
                                </div>
                                <!-- <label class="col-md-2 control-label">Lemak Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="lemak_max" placeholder="Lemak Max">
                                </div> -->
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-md-2 control-label">Serat Kasar:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="serat_kasar" placeholder="Serat Kasar" value="<?php echo (empty($form_a->serat_kasar) ? "": $form_a->serat_kasar);?>">
                                </div>
                               <!--  <label class="col-md-2 control-label">Serat Kasar Max:</label> 
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="serat_kasar_max" placeholder="Serat Kasar Max">
                                </div> -->
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
                <?php if(empty($form_a->id)): ?>
                url: url+'execute/save/p_form_a',
                <?php else: ?>
                url: url+'execute/update/p_form_a/id/<?php echo $form_a->id;?>',
                <?php endif; ?>
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
                        
                        window.location= url+'registrasi/permohonan/form_a/<?php echo $identity->id;?>';
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
