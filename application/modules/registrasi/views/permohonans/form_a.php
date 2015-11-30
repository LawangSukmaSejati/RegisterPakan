
<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        <!-- BOX -->
        <a  class="btn btn-info btn-md pull-right" href="<?php echo site_url('registrasi/permohonan/form_a_form/'.$identity->id);?>">Tambah</a>
                <br/>
                <br/>
                <br/>
        <div class="box border blue">
            <div class="box-title">
                <h4><i class="fa fa-table"></i>Form A : Merek, Jenis, Kode, Peruntukkan, Berat Bersih, Kandungan Gizi Pakan Ikan (FL/01A/PB/002) / <?php echo $identity->code;?></h4>              
            </div>
            <div class="box-body">
                <form class="form-horizontal "  >
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nomor Pemohon:</label> 
                        <div class="col-md-4">
                            <input  class="form-control" type="text" name="nomor_pemohon" value="<?php echo $identity->nomor_pemohon;?>"id="nomor_pemohon" disabled>                           
                        </div>
                        <label class="col-md-2 control-label">Tanggal Pemohon:</label> 
                        <div class="col-md-4">
                            <input  class="form-control" type="text" name="tanggal_pemohon" value="<?php echo $identity->tanggal_pemohon;?>"id="nomor_pemohon" disabled>                           
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama Perusahaan:</label> 
                        <div class="col-md-4">
                            <input  class="form-control" type="text" name="tanggal_pemohon" value="<?php echo $identity->nama_perusahaan;?>"id="nomor_pemohon" disabled>                           
                        </div>
                        <label class="col-md-2 control-label">Status:</label> 
                        <div class="col-md-4">
                            <input  class="form-control" type="text" name="status_berkas" value="<?php echo $identity->status;?>"id="nomor_pemohon" disabled>                           
                        </div>
                    </div>
                </form>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Kode</th>
                            <th>Merk Dagang</th>                                                     
                            <th>Sifat</th>                                                    
                            <th>Bentuk Jenis Pakan</th>                                                      
                            <th>Ukuran</th>                                                     
                            <th>Volume</th>                                                     
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1; foreach($form_a as $key=>$value){?>
                        <tr id="rows-<?php echo $value->id;?>">
                            <td><?php echo $no;?></td>                            
                            <td><?php echo $value->kode;?></td>
                            <td><?php echo $value->merk_dagang; ?></td>
                            <td><?php echo $value->sifat; ?></td>
                            <td><?php echo $value->bentuk_jp;?></td>
                            <td><?php echo $value->ukuran;?></td>
                            <td><?php echo $value->volume;?></td>
                            
                            <td>
                                <a  title="Form B" class="btn btn-warning btn-xs" href="<?php echo site_url('registrasi/permohonan/form_b/'.$value->p_form_identity.'/'.$value->id);?>">Form B</a>
                                <a  title="Detail" class="btn btn-info btn-xs" href="<?php echo site_url('registrasi/permohonan/form_a_form_detail/'.$value->id);?>">Detail</a>
                                <a  title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('registrasi/permohonan/form_a_form/'.$value->p_form_identity.'/'.$value->id);?>">Edit</a>
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
        "aaSorting": [[0, "asc"]],
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
            
            url: url+'execute/delete/p_form_a/id/'+id,
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
                //$("#data").dataTable().fnClearTable(data);
               window.location.reload();
            },  
        });
        return false;
    }
}
</script>
