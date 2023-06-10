<div class="container-fluid">
    <div class="chit-chat-layer1">
        <!-- Progress Bar -->
        <?php $this->load->view('progress_bar') ?>
        <hr>
        <div class="text-center">
            <a href="" data-toggle="modal" data-target="#force">
                <button class="btn btn-danger btn-lg" type="button"><i class="fa fa-send"></i> Force Action</button>
            </a>
        </div>
        <!-- Modal force review -->
        <div class="modal fade" id="force" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                    <div class="modal-header">
                        <h3>Force Action</h3>
                    </div>
                    <div class="modal-body">
                        <div>
                            <span style="color: red; text-align:center"> Force Action akan melewati review atau
                                mengembalikan SK ke pihak tertentu </span>
                        </div><br>
                        <div class=" md-stepper-horizontal green">
                            <?php if(0>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="1-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="draft" />
                                    <div class="submit" onClick="document.forms['1-form'].submit();">
                                        <div class="md-step-circle"><span>1</span></div>
                                        <div class="md-step-title">Departemen</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="1-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="draft" />
                                    <div class="submit" onClick="document.forms['1-form'].submit();">
                                        <div class="md-step-circle"><span>1</span></div>
                                        <div class="md-step-title">Departemen</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(1>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="2-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="0" />
                                    <div class="submit" onClick="document.forms['2-form'].submit();">
                                        <div class="md-step-circle"><span>2</span></div>
                                        <div class="md-step-title">Kadep</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="2-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="0" />
                                    <div class="submit" onClick="document.forms['2-form'].submit();">
                                        <div class="md-step-circle"><span>2</span></div>
                                        <div class="md-step-title">Kadep</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(2>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="3-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="1" />
                                    <div class="submit" onClick="document.forms['3-form'].submit();">
                                        <div class="md-step-circle"><span>3</span></div>
                                        <div class="md-step-title">Verifikator</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="3-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="1" />
                                    <div class="submit" onClick="document.forms['3-form'].submit();">
                                        <div class="md-step-circle"><span>3</span></div>
                                        <div class="md-step-title">Verifikator</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(3>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="4-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="2" />
                                    <div class="submit" onClick="document.forms['4-form'].submit();">
                                        <div class="md-step-circle"><span>4</span></div>
                                        <div class="md-step-title">SPV 1</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="4-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="2" />
                                    <div class="submit" onClick="document.forms['4-form'].submit();">
                                        <div class="md-step-circle"><span>4</span></div>
                                        <div class="md-step-title">SPV 1</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(4>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="4-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="3" />
                                    <div class="submit" onClick="document.forms['4-form'].submit();">
                                        <div class="md-step-circle"><span>5</span></div>
                                        <div class="md-step-title">SPV 2</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="4-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="3" />
                                    <div class="submit" onClick="document.forms['4-form'].submit();">
                                        <div class="md-step-circle"><span>5</span></div>
                                        <div class="md-step-title">SPV 2</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(4>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="5-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="4" />
                                    <div class="submit" onClick="document.forms['5-form'].submit();">
                                        <div class="md-step-circle"><span>6</span></div>
                                        <div class="md-step-title">Manager</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="5-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="4" />
                                    <div class="submit" onClick="document.forms['5-form'].submit();">
                                        <div class="md-step-circle"><span>6</span></div>
                                        <div class="md-step-title">Manager</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(5>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="6-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="5" />
                                    <div class="submit" onClick="document.forms['6-form'].submit();">
                                        <div class="md-step-circle"><span>7</span></div>
                                        <div class="md-step-title">Wadek 1</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="6-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="5" />
                                    <div class="submit" onClick="document.forms['6-form'].submit();">
                                        <div class="md-step-circle"><span>7</span></div>
                                        <div class="md-step-title">Wadek 1</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(6>=$sk->status) { ?>
                            <div class="md-step active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="7-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="6" />
                                    <div class="submit" onClick="document.forms['7-form'].submit();">
                                        <div class="md-step-circle"><span>8</span></div>
                                        <div class="md-step-title">Wadek 2</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="7-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="6" />
                                    <div class="submit" onClick="document.forms['7-form'].submit();">
                                        <div class="md-step-circle"><span>8</span></div>
                                        <div class="md-step-title">Wadek 2</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } if(7>=$sk->status) { ?>
                            <div class="md-step orange active">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="8-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="7" />
                                    <div class="submit" onClick="document.forms['8-form'].submit();">
                                        <div class="md-step-circle"><span>9</span></div>
                                        <div class="md-step-title">Dekan</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="md-step active done">
                                <form action="<?= base_url('Admin/update_status') ?>" method="post" name="8-form">
                                    <input type="hidden" name="id" value="<?=$id?>" />
                                    <input type="hidden" name="status" value="7" />
                                    <div class="submit" onClick="document.forms['8-form'].submit();">
                                        <div class="md-step-circle"><span>9</span></div>
                                        <div class="md-step-title">Dekan</div>
                                        <div class="md-step-bar-left"></div>
                                        <div class="md-step-bar-right"></div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Progress Bar -->
        <div class="col-md-3 chit-chat-layer1">
            <div class="panel-primary">
                <div class="row" style="background-color:#337AB7; padding:15px; color: white">
                    <div style="width: 20%; float:left">
                        <i style="font-size: 55px;" class="fa fa-clock-o"></i>
                    </div>
                    <div style="width: 80%; float:right">
                        <?= $sk->departemen ?><span style="text-align: right; font-size:15px"><br>
                            <?php   if (empty($dekan->tgl)){
                                        $now = date("Y-m-d");
                                        }
                                        else {
                                        $now = $dekan->tgl;
                                        }
                                        $tgl1 = new DateTime("$sk->tgl");
                                        $tgl2 = new DateTime("$now");
                                        $jarak = $tgl2->diff($tgl1)->days + 1; ?>
                            <span style="font-size:10px">
                                Rentang waktu pengajuan <b style="font-size:12px"><?= $jarak ?>
                                    hari</b><br>sampai
                                finish
                                draft
                            </span>
                    </div>
                </div>
                <div class="row" style="padding: 15px; background: #eef0fd">
                    <div class="justify-content-center">
                        <?php if(!empty($dep)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".supervisor">
                                <div class="market-update-block clr-block-2" style="background: #641111">
                                    <h4><i style="color: white" class="fa fa-file-text"></i> Catatan
                                        Departemen</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade supervisor" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Departemen</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $dep->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($kadep)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".kadep">
                                <div class="market-update-block clr-block-1">
                                    <h4><i style="color: white" class="fa fa-file-text"></i> Catatan
                                        Kadep</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade kadep" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Kadep</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $kadep->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($verifikator)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".verifikator">
                                <div class="market-update-block clr-block-2">
                                    <h4><i style="color: white" class="fa fa-file-text"></i> Catatan
                                        Verifikator</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade verifikator" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Verifikator</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $verifikator->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($supervisor)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".supervisor">
                                <div class="market-update-block clr-block-2" style="background: #641111">
                                    <h4><i style="color: white" class="fa fa-file-text"></i> Catatan
                                        Supervisor 1</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade supervisor" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Supervisor 1</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $supervisor->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($supervisor2)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".supervisor">
                                <div class="market-update-block clr-block-2" style="background: #641111">
                                    <h4><i style="color: white" class="fa fa-file-text"></i> Catatan
                                        Supervisor 2</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade supervisor" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Supervisor 2</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $supervisor2->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($manager)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".manager">
                                <div class="market-update-block clr-block-1" style="background: #0CB8B8F6">
                                    <h4><i style="color: white" class="fa fa-file-text"></i> Catatan
                                        Manager</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade manager" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Manager</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $manager->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($wadek1)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".wadek1">
                                <div class="market-update-block clr-block-2" style="background: #0F52A0F6">
                                    <h4><i style=" color: white" class="fa fa-file-text"></i> Catatan
                                        Wadek 1</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade wadek1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Wadek 1</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $wadek1->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($wadek2)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".wadek2">
                                <div class="market-update-block clr-block-2" style="background: #8C22E2F6">
                                    <h4><i style=" color: white" class="fa fa-file-text"></i> Catatan
                                        Wadek 2</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade wadek2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Wadek 2</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $wadek2->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($dekan)) { ?>
                        <div class="col-md-12 market-update-gd text-center" style="padding-top: 10px;">
                            <a href="" data-toggle="modal" data-target=".kadep">
                                <div class="market-update-block clr-block-1" style="background: #D82626F6">
                                    <h4><i style=" color: white" class="fa fa-file-text"></i> Catatan
                                        Dekan</h4>
                                </div>
                            </a>
                        </div>
                        <!-- Modal Cat -->
                        <div class="modal fade dekan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content text-left" style="margin-left:5px; margin-right:5px;">
                                    <div class="modal-header">
                                        <h3>Catatan Dekan</h3>
                                    </div>
                                    <div class="modal-body">
                                        <?= $dekan->catatan ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 chit-chat-layer1">
            <div class="work-progres" style="background-color: #eef0fd">
                <div class="row" style="margin-left: 5px; margin-right: 5px;">
                    <form method="post" action="<?php echo base_url()?>admin/update_pengajuan">
                        <h2 style="text-align: center;">Edit SK Dekan</h2>
                        <hr>
                        <input type="hidden" name="id" value="<?=$id?>" />
                        <label style="font-size: 20px">Judul</label><br>
                        <textarea name="judul" type="text" placeholder="Write here..."
                            class="form-control"><?= $sk->judul ?></textarea>
                        <hr>
                        <!-- Mengingat -->
                        <div class="form-group">
                            <label style="font-size: 20px">Mengingat</label><br>
                            <label style="color:red; font-size:12px;">*Isikan tanpa menggunakan nomor urut</label>
                            <div class="input-group-btn">
                                <button class="btn btn-success add-mengingat" type="button"><i class="fa fa-plus"></i>
                                    Add</button>
                            </div>
                            <div class="control-group after-add-mengingat">
                                <?php foreach($mengingat as $v) { ?>
                                <div class="control-group input-group">
                                    <textarea name="mengingat[]" id="<?=$v->id?>editor-mengingat"
                                        class="form-control"><?= $v->mengingat ?></textarea><br>
                                    <div class="input-group-btn">
                                        <button class="btn-sm btn-danger remove-mengingat" type="button"><i
                                                class="fa fa-remove"></i> <br>Remove</button>
                                    </div>
                                </div>
                                <script>
                                CKEDITOR.replace("<?=$v->id?>editor-mengingat");
                                </script>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="copy-mengingat hide">
                            <div class="control-group input-group">
                                <textarea name="mengingat[]" id="editor-copy-mengingat" type="text"
                                    placeholder="Write here..." class="form-control"></textarea><br>
                                <div class="input-group-btn">
                                    <button class="btn-sm btn-danger remove-mengingat" type="button"><i
                                            class="fa fa-remove"></i> <br>Remove</button>
                                </div>
                            </div>
                        </div>

                        <!-- Menimbang -->
                        <div class="form-group">
                            <label style="font-size: 20px">Menimbang</label><br>
                            <label style="color:red; font-size:12px;">*Isikan tanpa menggunakan nomor urut</label>
                            <div class="input-group-btn">
                                <button class="btn btn-success add-menimbang" type="button"><i class="fa fa-plus"></i>
                                    Add</button>
                            </div>
                            <div class="control-group after-add-menimbang">
                                <?php foreach($menimbang as $v) { ?>
                                <div class="control-group input-group">
                                    <textarea name="menimbang[]" id="<?=$v->id?>editor-menimbang"
                                        class="form-control"><?= $v->menimbang ?></textarea><br>
                                    <div class="input-group-btn">
                                        <button class="btn-sm btn-danger remove-menimbang"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                                            type="button"><i class="fa fa-remove"></i> <br>Remove</button>
                                    </div>
                                </div>
                                <script>
                                CKEDITOR.replace("<?=$v->id?>editor-menimbang");
                                </script>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="copy-menimbang hide">
                            <div class="control-group input-group">
                                <textarea name="menimbang[]" id="editor-copy-menimbang" type="text"
                                    placeholder="Write here..." class="form-control"></textarea><br>
                                <div class="input-group-btn">
                                    <button class="btn-sm btn-danger remove-menimbang"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" type="button"><i
                                            class="fa fa-remove"></i> <br>Remove</button>
                                </div>
                            </div>
                        </div>

                        <!-- Menetapkan -->
                        <div class="form-group">
                            <label style="font-size: 20px">Menetapkan</label><br>
                            <label style="color:red; font-size:12px;">*Isikan tanpa menggunakan nomor urut</label>
                            <div class="input-group-btn">
                                <button class="btn btn-success add-menetapkan" type="button"><i class="fa fa-plus"></i>
                                    Add</button>
                            </div>
                            <div class="control-group after-add-menetapkan">
                                <?php foreach($menetapkan as $v) { ?>
                                <div class="control-group input-group">
                                    <textarea name="menetapkan[]" id="<?=$v->id?>editor-menetapkan"
                                        class="form-control"><?= $v->menetapkan ?></textarea><br>
                                    <div class="input-group-btn">
                                        <button class="btn-sm btn-danger remove-menetapkan"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                                            type="button"><i class="fa fa-remove"></i> <br>Remove</button>
                                    </div>
                                </div>
                                <script>
                                CKEDITOR.replace("<?=$v->id?>editor-menetapkan");
                                </script>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="copy-menetapkan hide">
                            <div class="control-group input-group">
                                <textarea name="menetapkan[]" id="editor-copy-menetapkan" placeholder="Write here..."
                                    class="form-control"></textarea><br>
                                <div class="input-group-btn">
                                    <button class="btn-sm btn-danger remove-menetapkan"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" type="button"><i
                                            class="fa fa-remove"></i> <br>Remove</button>
                                </div>
                            </div>
                        </div>
                        <!-- Lampiran -->
                        <div class="form-group">
                            <label style="font-size: 20px">File Lampiran</label><br>
                            <?php if (!empty($sk->lamp)) : ?>
                            <div class="form-group">
                                <button method="post"
                                    onclick=" window.open('<?= base_url('assets/lampiran');?>/<?=$sk->lamp?>', '_blank'); return false;"
                                    class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                        alt="attach" width="50" height="50" /></button>
                            </div>

                            <?php else : ?>

                            <?php endif; ?>
                            <input type="file" name="file"> <br>
                            <label style="color:red; font-size:12px;">maks 10mb</label>
                        </div><br>
                        <div class="form-group">
                            <label style="font-size: 20px">Catatan dari departemen</label><br>
                            <div class="control-group after-add-mengingat">
                                <?php if(empty($dep)){ ?>
                                <textarea rows="5" name="catatan" type="text" placeholder="Write here..."
                                    class="form-control"></textarea><br>
                                <?php } else { ?>
                                <textarea rows="5" name="catatan" type="text" placeholder="Write here..."
                                    class="form-control"><?=$dep->catatan?></textarea><br>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(".add-mengingat").click(function() {
        var html = $(".copy-mengingat").html();
        $(".after-add-mengingat").after(html);
        CKEDITOR.replace('editor-copy-mengingat');
    });
    $("body").on("click", ".remove-mengingat", function() {
        $(this).closest(".control-group").remove();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $(".add-menimbang").click(function() {
        var html = $(".copy-menimbang").html();
        $(".after-add-menimbang").after(html);
        CKEDITOR.replace('editor-copy-menimbang');
    });
    $("body").on("click", ".remove-menimbang", function() {
        $(this).closest(".control-group").remove();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $(".add-menetapkan").click(function() {
        var html = $(".copy-menetapkan").html();
        $(".after-add-menetapkan").after(html);
        CKEDITOR.replace('editor-copy-menetapkan');
    });
    $("body").on("click", ".remove-menetapkan", function() {
        $(this).closest(".control-group").remove();
    });
});
</script>