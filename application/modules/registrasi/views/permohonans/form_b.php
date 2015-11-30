<!-- PAGE table -->
<div class="row">
    <div class="col-md-12">
        
        <div class="box border orange">
            <div class="box-title">
                <h4><i class="fa fa-table"></i>Identity (<?php echo $identity->code;?>)</h4>              
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
                     <div class="form-group">
                        <label class="col-md-2 control-label">Merk Dagang:</label> 
                        <div class="col-md-4">
                            <input  class="form-control" type="text" name="tanggal_pemohon" value="<?php echo $form_a->merk_dagang;?>"id="nomor_pemohon" disabled>                           
                        </div>
                        <label class="col-md-2 control-label">Kode:</label> 
                        <div class="col-md-4">
                            <input  class="form-control" type="text" name="status_berkas" value="<?php echo $form_a->kode;?>"id="nomor_pemohon" disabled>                           
                        </div>
                    </div>
                </form>   
                <div class="separator"></div>                                           
            </div>
        </div>      
    </div>
</div>  
<!-- /PAGE table -->        
<div class="separator"></div>
<!-- PAGE table -->
<div class="row">
    <div class="col-md-6">
        <!-- BOX -->
       
        <div class="box border blue">
            <div class="box-title">
                <h4><i class="fa fa-table"></i>Form B. Jenis Bahan Baku FL/01B/PB/002</h4>              
            </div>
            <div class="box-body">
            <span class="label label-primary arrow-in">Jenis Bahan Baku</span>
                 <a  class="btn btn-info btn-md pull-right" href="<?php echo site_url('registrasi/permohonan/form_b_form/'.$identity->id.'/'.$form_a->id.'/bb');?>">Tambah</a>
                <br/>
                <br/>
                <br/>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Jenis Bahan Baku</th>
                            <th>Presentase Bahan</th>                                                                           
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1; foreach($p_form_b_bahan_baku as $key=>$value){?>
                        <tr id="rows-<?php echo $value->id;?>">
                            <td><?php echo $no;?></td>                            
                            <td><?php echo $value->jenis_bahan_baku;?></td>
                            <td><?php echo $value->presentase_bahan; ?></td>
                            <td>                                
                                <button title="Delete" class="btn btn-danger btn-xs" data-id="<?php echo $value->id;?>" onclick="del(this);">Hapus</button>
                            </td>
                        </tr>
                        <?php $no++;} ?>
                    </tbody>
                </table>                                
            </div>
        </div>      
    </div>
     <div class="col-md-6">
        <!-- BOX -->
       
        <div class="box border blue">
            <div class="box-title">
                <h4><i class="fa fa-table"></i>Form B. Jenis Bahan Pelengkap dan Imbuhan Pakan FL/01B/PB/002</h4>              
            </div>
            <div class="box-body">
            <span class="label label-primary arrow-in">Jenis Bahan Pelengkap dan Imbuhan Pakan</span>
                 <a  class="btn btn-info btn-md pull-right" href="<?php echo site_url('registrasi/permohonan/form_b_form/'.$identity->id.'/'.$form_a->id.'/bp');?>">Tambah</a>
                <br/>
                <br/>
                <br/>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data2">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Jenis Bahan Baku</th>
                            <th>Presentase Bahan</th>                                                                           
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1; foreach($p_form_b_bahan_pelengkap as $key=>$value){?>
                        <tr id="rows-<?php echo $value->id;?>">
                            <td><?php echo $no;?></td>                            
                            <td><?php echo $value->jenis_bahan_pelengkap;?></td>
                            <td><?php echo $value->presentase_bahan; ?></td>
                            <td>                                
                                <button title="Delete" class="btn btn-danger btn-xs" data-id="<?php echo $value->id;?>" onclick="del_bp(this);">Hapus</button>
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
        "aaSorting": [[0, "asc"]],
        "iDisplayLength": 10,                  
    });
    $('#data2').dataTable({
        'sPaginationType': 'bs_full',        
        "aaSorting": [[0, "asc"]],
        "iDisplayLength": 10,                  
    });
    
    $('#data').each(function(){
        var datatable = $(this);
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
    });
    $('#data2').each(function(){
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
            
            url: url+'execute/delete/p_form_b_bahan_baku/id/'+id,
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
function del_bp(btn)
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
            
            url: url+'execute/delete/p_form_b_bahan_pelengkap/id/'+id,
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
