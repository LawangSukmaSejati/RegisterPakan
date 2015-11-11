<!-- PAGE table -->
<div class="row">
	<div class="col-md-12">
		<!-- BOX -->
		<a  class="btn btn-info btn-md pull-right" href="<?php echo site_url('smsgateway/contact/addphbk');?>">Add New</a>
				<br/>
				<br/>
				<br/>
		<div class="box border blue">
			<div class="box-title">
				<h4><i class="fa fa-table"></i>Phone Book</h4> 
				<div class="tools hidden-xs">
					
				</div>
			</div>
			<div class="box-body">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
					<thead>
						<tr>
							<th>No</th>
                            <th>Code</th>                           
							<th>Name</th>
							<th>Number</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php $no= 1; foreach ($phonebook as $key => $value) { ?>
							
						<tr>

							<td><?php echo $no; ?></td>
							<td><?php echo $value->code; ?></td>
							<td><?php echo $value->name; ?></td>
							<td><?php echo $value->number;?></td>
							<td>
								<a href="<?php echo site_url('smsgateway/contact/editphbk/'.$value->id);?>"title="<?php echo lang('edit'); ?>" class="btn btn-warning btn-xs" data-button="edit"><i class="fa fa-pencil"></i></a> || <a href="#" onclick="del(<?php echo $value->id;?>);" title="<?php echo lang('delete'); ?>" class="btn btn-danger btn-xs" data-button="delete"><i class="fa fa-trash-o"></i></a>

							</td>

						</tr>
						<?php $no++; } ?>
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
        "bProcessing": true,
        //"bServerSide": true,
       // "sAjaxSource": url+"unit/unit/load",
        //"sServerMethod": "POST",        
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
		$.ajax({
			url: url+'smsgateway/contact/deletephbk/'+btn,
			type: "POST",
			data:{data_id:btn},
			crossDomain:true,
			beforeSend: function(){
				$("#msg").html("loading"); 
			},
			complete : function(){
				$("#msg").html("delete Sukses"); 
			}, 
			success: function(data) {				
				//$("#data").dataTable().fnClearTable();
				window.location.reload();
			},	
		});
		return false;
	}
}
</script>
