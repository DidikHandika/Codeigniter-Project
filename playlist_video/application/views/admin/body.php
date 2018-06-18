<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Form Actions Upload Video</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" role="form" action="<?php echo base_url()?>C_video/add_video" method="POST" enctype="multipart/form-data">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Upload Video</label>
                                                <div class="col-md-4">
                                                    <input type="file" class="form-control" name="video" id="video" required="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->

            <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Editable Table</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama Video </th>
                                                <th> Tgl Upload </th>
                                                <th> Status Tampil </th>
                                                <th> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach ($v_video as $key) {
                                                    $tampil = $key->tampil;
                                                    $id = $key->id;
                                                    $nama_video = $key->nama_video;?>
                                                    <tr>
                                                        <td> <?=$no;?> </td>
                                                        <td> <?=$key->nama_video;?> </td>
                                                        <td> <?=$key->tgl_upload;?> </td>
                                                        <td class="center"> 
                                                            <?php if($tampil == 1){ ?>
                                                                <a href="C_video/edit_video/<?=$id;?>">Ya</a>
                                                            <?php }else{ ?>
                                                                <a href="C_video/edit_video/<?=$id;?>">Tidak</a>
                                                        <?php }?> </td>
                                                        <td>
                                                            <a href="C_video/delete_video/<?=$id?>"> Delete </a>
                                                        </td>
                                                    </tr>

                                                <?php $no++; }
                                            ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

        </div>
        <!-- END CONTENT BODY -->


    </div>
    <!-- END CONTENT -->

   