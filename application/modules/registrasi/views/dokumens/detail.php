<div class="row">
        <div class="col-md-12">
        <?php if(!empty($this->session->flashdata('upload'))){ ?>
        
        <div class="alert alert-block alert-info fade in">
                                            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                                                <p></p><h4><i class="fa fa-check-square-o"></i> Upload</h4> <?php echo $this->session->flashdata('upload');?>.<p></p>
                                        </div>
                                        <?php }?>
        <!-- BOX -->
            <div class="box border blue">
                <div class="box-title">
                                        <h4><i class="fa fa-cloud-arrow-circle-o-up"></i>FL/02/PB/002 CHECK LIST KELENGKAPAN DOKUMEN</h4>
                                        <div class="tools hidden-xs">                                            
                                            <a href="javascript:;" class="reload">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <a href="javascript:;" class="collapse">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                </div>
                <div class="box-body">
                                    <?php 
                    
                        if(
                            !empty($identity->alamat_perusahaan) and
                            !empty($berkas_fc_pj->id) and 
                            !empty($berkas_skdp->id) and
                            !empty($berkas_fapp->id) and
                            !empty($berkas_siu->id) and
                            !empty($berkas_siup->id) and
                            !empty($berkas_npwp->id) and
                            !empty($form_a->merk_dagang) and 
                            !empty($form_a->sifat) and 
                            !empty($form_a->bentuk_jp) and 
                            !empty($form_a->ukuran) and 
                            !empty($form_a->kode) and
                            !empty($form_a->peruntukan) and
                            !empty($form_a->bentuk_kbb) and 
                            !empty($form_a->volume) and
                            !empty($form_a->protein) and 
                            !empty($form_a->air) and
                            !empty($form_a->abu) and 
                            !empty($form_a->lemak) and
                            !empty($form_a->serat_kasar) and
                            count($form_b_a) > 0 and
                            count($form_b_b) > 0 and
                            !empty($form_c)
                            ){
                    ?>                    
                
                    <button data-id="<?php echo $identity->id;?>"class="btn btn-danger pull-right" onclick="update_status(this);">Berkas Lengkap</button>
                    <?php }else{ ?>
                    <button class="btn btn-danger pull-right" disabled>Berkas Belum Lengkap</button>
                    <?php } ?>

                <br/>
                <br/>
                <br/>

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
                            <input  class="form-control" type="text" name="status_berkas" value="<?php 
                            
                            if($identity->status == "open")
                                echo "Berkas Belum Lengkap";
                            else 
                                echo $identity->status;
                            ?>"id="nomor_pemohon" disabled>                           
                        </div>
                    </div>                    
                    
                    
                </form>  
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Persyaratan Dokumen</th>
                            <th>Kelangkapan Dokumen</th>
                            <th>Keterangan</th>                            
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>               
                        <tr>
                            <td>1</td>
                            <td>Surat Permohonan</td>
                            <td>Lengkap</td>
                            <td></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nama dan Alamat Perusahaan</td>
                            <td><?php echo (empty($identity->alamat_perusahaan) ? "Belum Lengkap": "Lengkap"); ?></td>
                            
                            <td></td>
                            <td><?php echo (empty($identity->alamat_perusahaan) ? "Silahkan Isi Kelangkapan Dokumen <a href='".site_url('registrasi/permohonan/identity_edit/'.$indetitiy->code)."'>Disini</a>": ""); ?></td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Fotocopy Penangung Jawab</td>
                            <td><?php echo (empty($berkas_fc_pj->id) ? "Berkas Belum Lengkap": "Berkas Lengkap")?></td>
                            <td></td>
                            <td>
                                <form action="<?php echo site_url('registrasi/dokumen/uploaded/'.$identity->id);?>" method="POST" enctype="multipart/form-data">
                               
                                <input name="userfile" id="userfile" type="file">
                                
                                <input name="flag" id="flag" type="hidden" value="fotocopy_penaggung_jawab">
                                <br/>                                   
                                <input name="submit" type="submit">
                                
                                </form>
                                <?php
                                if(!empty($berkas_fc_pj->id)){ 
                                echo $berkas_fc_pj->filename;
                                ?> 
                                <button id="remove" onclick="removes(this);" class="fa fa-trash-o" data-name="<?php echo $berkas_fc_pj->filename;?>" data-id="<?php echo $berkas_fc_pj->id;?>"></button>
                                <?php } ?>

                                    
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Surat Keterangan Domisili Perusahaan</td>
                            <td><?php echo (empty($berkas_skdp->id) ? "Berkas Belum Lengkap": "Berkas Lengkap")?></td>
                            <td></td>
                            <td>
                                 <form action="<?php echo site_url('registrasi/dokumen/uploaded/'.$identity->id);?>" method="POST" enctype="multipart/form-data">
                               
                                <input name="userfile" id="userfile" type="file">
                                
                                <input name="flag" id="flag" type="hidden" value="Surat_Keterangan_Domisili_Perusahaan">
                                <br/>                                   
                                <input name="submit" type="submit">
                                
                                </form>
                                <?php
                                if(!empty($berkas_skdp->id)){ 
                                echo $berkas_skdp->filename;
                                ?> 
                                <button id="remove" onclick="removes(this);" class="fa fa-trash-o" data-name="<?php echo $berkas_skdp->filename;?>" data-id="<?php echo $berkas_skdp->id;?>"></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Fotocopy akte pendirian perusahaan bagi perusahaan pakan ikan yang berbadan hukum</td>
                            <td><?php echo (empty($berkas_fapp->id) ? "Berkas Belum Lengkap": "Berkas Lengkap")?></td>
                            <td></td>
                            <td>
                                 <form action="<?php echo site_url('registrasi/dokumen/uploaded/'.$identity->id);?>" method="POST" enctype="multipart/form-data">
                               
                                <input name="userfile" id="userfile" type="file">
                                
                                <input name="flag" id="flag" type="hidden" value="Fotocopy_Akte_Pendirian_Perusahaan">
                                <br/>                                   
                                <input name="submit" type="submit">
                                
                                </form>
                                <?php
                                if(!empty($berkas_fapp->id)){ 
                                echo $berkas_fapp->filename;
                                ?> 
                                <button id="remove" onclick="removes(this);" class="fa fa-trash-o" data-name="<?php echo $berkas_fapp->filename;?>" data-id="<?php echo $berkas_fapp->id;?>"></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Fotocopy Surat Izin Usaha</td>
                            <td><?php echo (empty($berkas_siu->id) ? "Berkas Belum Lengkap": "Berkas Lengkap")?></td>
                            <td></td>
                            <td>
                                 <form action="<?php echo site_url('registrasi/dokumen/uploaded/'.$identity->id);?>" method="POST" enctype="multipart/form-data">
                               
                                <input name="userfile" id="userfile" type="file">
                                
                                <input name="flag" id="flag" type="hidden" value="Fotocopy_Surat_Izin_Usaha">
                                <br/>                                   
                                <input name="submit" type="submit">
                                
                                </form>
                                <?php
                                if(!empty($berkas_siu->id)){ 
                                echo $berkas_siu->filename;
                                ?> 
                                <button id="remove" onclick="removes(this);" class="fa fa-trash-o" data-name="<?php echo $berkas_siu->filename;?>" data-id="<?php echo $berkas_siu->id;?>"></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Fotocopy Surat Izin Usaha Perdagangan</td>
                            <td><?php echo (empty($berkas_siup->id) ? "Berkas Belum Lengkap": "Berkas Lengkap")?></td>
                            <td></td>
                            <td>
                                 <form action="<?php echo site_url('registrasi/dokumen/uploaded/'.$identity->id);?>" method="POST" enctype="multipart/form-data">
                               
                                <input name="userfile" id="userfile" type="file">
                                
                                <input name="flag" id="flag" type="hidden" value="Fotocopy_Surat_Izin_Usaha_Perdagangan">
                                <br/>                                   
                                <input name="submit" type="submit">
                                
                                </form>
                                <?php
                                if(!empty($berkas_siup->id)){ 
                                echo $berkas_siup->filename;
                                ?> 
                                <button id="remove" onclick="removes(this);" class="fa fa-trash-o" data-name="<?php echo $berkas_siup->filename;?>" data-id="<?php echo $berkas_siup->id;?>"></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Fotocopy Nomor Pokok Wajib Pajak</td>
                            <td><?php echo (empty($berkas_npwp->id) ? "Berkas Belum Lengkap": "Berkas Lengkap")?></td>
                            <td></td>
                            <td>
                                 <form action="<?php echo site_url('registrasi/dokumen/uploaded/'.$identity->id);?>" method="POST" enctype="multipart/form-data">
                               
                                <input name="userfile" id="userfile" type="file">
                                
                                <input name="flag" id="flag" type="hidden" value="Fotocopy_Nomor_Pokok_Wajib_Pajak">
                                <br/>                                   
                                <input name="submit" type="submit">
                                
                                </form>
                                <?php
                                if(!empty($berkas_npwp->id)){ 
                                echo $berkas_npwp->filename;
                                ?> 
                                <button id="remove" onclick="removes(this);" class="fa fa-trash-o" data-name="<?php echo $berkas_npwp->filename;?>" data-id="<?php echo $berkas_npwp->id;?>"></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Merk, jenis & kode pakan ikan yang diproduksi dan atau diimpor (Form A)</td>
                            <td><?php if(empty($form_a->merk_dagang) or empty($form_a->sifat) or empty($form_a->bentuk_jp) or empty($form_a->ukuran) or empty($form_a->kode)) $sembilan =  "Belum Lengkap"; else $sembilan ="Lengkap"; echo $sembilan;?></td>
                            <td></td>
                            <td>
                                Lengkapi field Peruntukan pada Form A <a href="<?php echo site_url('registrasi/permohonan/form_a_form/'.$identity->id.'/'.$form_a->id)?>">disini</a>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Peruntukkan (form A)</td>
                            <td><?php echo (empty($form_a->peruntukan) ? "Belum Lengkap" : "Lengkap")?></td>
                            <td></td>
                            <td>
                                Lengkapi field Peruntukan pada Form A <a href="<?php echo site_url('registrasi/permohonan/form_a_form/'.$identity->id.'/'.$form_a->id)?>">disini</a>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Berat bersih pakan ikan dalam kemasan (Form A)</td>
                            <td><?php if(empty($form_a->bentuk_kbb) or empty($form_a->volume)) $bb = "Belum Lengkap"; else $bb = "Lengkap"; echo $bb; ?></td>
                            <td></td>
                            <td>
                                Lengkapi field Berat bersih pada Form A <a href="<?php echo site_url('registrasi/permohonan/form_a_form/'.$identity->id.'/'.$form_a->id)?>">disini</a>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Kandungan gizi dan persentasenya (form A)</td>
                            <td><?php if(
                                        empty($form_a->protein) or 
                                        empty($form_a->air) or 
                                        empty($form_a->abu) or 
                                        empty($form_a->lemak) or 
                                        empty($form_a->serat_kasar)){
                                            $bc = "Belum Lengkap";
                                        }else{
                                            $bc = "Lengkap";
                                        } 
                                        echo $bc; ?></td>
                            <td></td>
                            <td>
                                Lengkapi field Kandungan gizi dan persentasenya pada Form A <a href="<?php echo site_url('registrasi/permohonan/form_a_form/'.$identity->id.'/'.$form_a->id)?>">disini</a>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Jenis bahan baku yang digunakan (Sesuai form B)</td>
                            <td><?php echo (count($form_b_a) < 1 ? "Belum Lengkap": "Lengkap")?></td>
                            <td></td>
                            <td>
                                Lengkapi Form Jenis bahan baku pada Form B <a href="<?php echo site_url('registrasi/permohonan/form_b/'.$identity->id.'/'.$form_a->id)?>">disini</a>
                            </td>
                        </tr>
                       <tr>
                            <td>14</td>
                            <td>Jenis bahan pelengkap dan imbuhan pakan yang ditambahkan (Sesuai form B)</td>
                            <td><?php echo (count($form_b_b) < 1 ? "Belum Lengkap": "Lengkap")?></td>
                            <td></td>
                            <td>
                                Lengkapi Form Jenis bahan Pelengkap dan imbuhan pakan yang ditambahkan pada Form B <a href="<?php echo site_url('registrasi/permohonan/form_b/'.$identity->id.'/'.$form_a->id)?>">disini</a>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Surat pernyataan bebas dari penggunaan bahan berbahaya terhadap keamanan pangan  (form C) </td>
                            <td><?php echo (empty($form_c) ? "Belum Lengkap": "Lengkap")?></td>
                            <td></td>
                            <td>
                                Lengkapi Form Surat Pernyataaan pada Form C <a href="<?php echo site_url('registrasi/permohonan/form_c/'.$identity->id)?>">disini</a>
                            </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Contoh label pakan</td>
                            <td>-</td>
                            <td></td>
                            <td>
                                <input name="file" type="file">
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Angka Pengenal Importir</td>
                            <td>-</td>
                            <td></td>
                            <td>
                                <input name="file" type="file">
                            </td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Surat keterangan/publikasi yang menyatakan bahwa pakan ikan tersebut sudah diperdagangkan di negara asal </td>
                            <td>-</td>
                            <td></td>
                            <td>
                                <input name="file" type="file">
                            </td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Certificate of analysis dari institusi yang berwenang di negara asal </td>
                            <td>-</td>
                            <td></td>
                            <td>
                                <input name="file" type="file">
                            </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Surat penunjukan dari perusahaan di luar negeri kepada perusahaan di Indonesia sebagai importir</td>
                            <td>-</td>
                            <td></td>
                            <td>
                                <input name="file" type="file">
                            </td>
                        </tr>
                    </tbody>               

                </div>
            </div>
        <!-- /BOX -->
        </div>
</div>
<script type="text/javascript">
var url = "<?php echo site_url();?>";
function removes(btn)
{
    var cek = confirm("Apakah anda yakin akan menghapus File Ini??");
    if(cek==false)
    {
        return false;
    }
    else
    {
        var id = $(btn).attr('data-id');
        var name = $(btn).attr('data-name');
        $.ajax({
            
            url: url+'registrasi/dokumen/remove_file/<?php //echo $identity->id;?>',
            type: "POST",
            data:{data_id:id,name:name},
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
function update_status(btn){
    var cek = confirm("Berkas anda Sudah Lengkap??");
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
            data:{status:"berkas lengkap"},
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