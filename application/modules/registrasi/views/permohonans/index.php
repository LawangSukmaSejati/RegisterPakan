
<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        <!-- BOX -->
        <a  class="btn btn-info btn-md pull-right" href="<?php echo site_url('registrasi/permohonan/identity');?>">Tambah</a>
                <br/>
                <br/>
                <br/>
        <div class="box border blue">
            <div class="box-title">
                <h4><i class="fa fa-table"></i>FL01 Permohonan Pendaftaran Pakan (FL 01/PB/002)</h4>              
            </div>
            <div class="box-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Nomor Register</th>                            
                            <th>Nomor Permohonan</th>
                            <th>Tanggal Permohonan</th>                                                     
                            <th>Nama Perusahaan</th>                                                    
                            <th>Nama Pananggung Jawab</th>                                                      
                            <th>Status</th>                                                     
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1; foreach($permohonan as $key=>$value){?>
                        <tr>
                            <td><?php echo $no;?></td>                            
                            <td><a  title="Identity" class="btn btn-xs" href="<?php echo site_url('registrasi/permohonan/identity_edit/'.$value->code);?>"><?php echo $value->code; ?></a></td>
                            <td><?php echo $value->nomor_pemohon; ?></td>
                            <td><?php echo $value->tanggal_pemohon; ?></td>
                            <td><?php echo $value->nama_perusahaan;?></td>
                            <td><?php echo $value->nama_penanggung_jawab_perusahaan;?></td>
                            <td><?php echo $value->status;?></td>
                            <td>
                                <?php
                                if($value->status == "berkas lengkap"){
                                    $ajukan_disabled = "";    
                                }elseif($value->status == "open"){
                                    $ajukan_disabled = "disabled";    
                                } ?>
                                <button  <?php echo $ajukan_disabled;?>title="Ajukan" class=" btn btn-warning btn-xs" onclick="update_status(this);" data-id="<?php echo $value->id;?>">Ajukan</button>
                                <a  title="View" class="btn btn-primary btn-xs" href="<?php echo site_url('registrasi/permohonan/view/'.$value->id);?>">Cetak</a>
                                <a  title="Form A" class="btn btn-success btn-xs" href="<?php echo site_url('registrasi/permohonan/form_a/'.$value->id);?>">Form A</a>
                                <a  title="Form C" class="btn btn-purple btn-xs" href="<?php echo site_url('registrasi/permohonan/form_c/'.$value->id)?>">Form C</a>
                               
                                <button title="Delete" class="btn btn-danger btn-xs" data-id="<?php echo $value->id;?>" onclick="del(this);">Hapus</button>
                            </td>
                        </tr>
                        <?php $no++;} ?>
                    </tbody>
                </table>                                
            </div>
        </div>      
    </div>
</div>  
<!-- /PAGE table -->        
<div class="separator"></div>
<div class="footer-tools">
    <span class="go-top"><i class="fa fa-chevron-up"></i> Top </span>
</div>
    
<script type="text/javascript">
var url = "<?php echo site_url();?>";

$(document).ready(function() {    
    $('#data').dataTable({
        'sPaginationType': 'bs_full',
        //"bProcessing": true,
        //"bServerSide": true,
        //"sAjaxSource": url+"smsgateway/messages/load_inbox",
        //"sServerMethod": "POST",        
        "aaSorting": [[1, "asc"]],
        "iDisplayLength": 10,           
        /* "aoColumns" : [                                   
            
            {"mData": "RecipientID"},
            {"mData": "ReceivingDateTime"},
            {"mData": "SenderNumber"},
            {"mData": "TextDecoded"},
            {"mData": "show",
                "mRender" : function ( data, type, full ) {             
                    var link = '<a  title="Balas"class="btn btn-warning btn-xs" href='+url+'smsgateway/messages/balas/'+full.ID+'>Balas</a> || '+
                    '<button title="Delete" class="btn btn-danger btn-xs" data-id='+full.ID+' onclick="del(this);">Hapus</button>';
                    return link;
               }
            },
        ], */
    });
    
    $('#data').each(function(){
        var datatable = $(this);
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });
    $('#data').delegate('.checkbox','change',function() {
        var i = $(this).attr('data-id');        
        var id = $(this).attr('data-id');
        if(this.checked){            
            $.ajax({
                url: url+'unit/unit/execute/active',
                type: 'post',
                data: 'active=0&id='+i,
                success: function(result)
                {
                    $('span-'+id).removeClass('label-default ').addClass('label-info');
                    $('span-'+id).html('Active');                   
                    window.location.reload();
                }
            });
        }else {
            $.ajax({
                url: url+'unit/unit/execute/active',
                type: 'post',
                data: 'active=1&id='+i,                         
                success: function(result)
                {
                    $('span-'+id).removeClass('label-info ').addClass('label-default');
                    $('span-'+id).html('Inactive');
                    window.location.reload();
                }
            });
        }
    });
});
function del(btn)
{
    var cek = confirm("Apakah anda yakin akan menghapus??");
    if(cek==false)
    {
        return false;
    }
    else
    {
        var id = $(btn).attr('data-id');        
        $.ajax({
            
            url: url+'execute/delete/p_form_identity/id/'+id,            
            type: "POST",
            data:{data_id:id},
            crossDomain:true,
            beforeSend: function(){
                $("#msg").html("loading"); 
            },
            complete : function(){
                $("#msg").html("delete Sukses"); 
            }, 
            success: function(data) {               
                $("#data").dataTable().fnClearTable();
            },  
        });
        return false;
    }
}
function update_status(btn){
    var cek = confirm("Apakah Anda yakin Akan Mengajukan ini??");
    if(cek==false)
    {
        return false;
    }
    else
    {
        var id = $(btn).attr('data-id');        
        $.ajax({
            
            url: url+'execute/update/p_form_identity/id/'+id,
            type: "POST",
            data:{status:"diajukan"},
            crossDomain:true,
            beforeSend: function(){
                $("#msg").html("loading"); 
            },
            complete : function(){
                $("#msg").html("delete Sukses"); 
            }, 
            success: function(data) {               
                //$("#data").dataTable().fnClearTable(data);
                window.location.reload();
            },  
        });
        return false;
    }
}
</script>
