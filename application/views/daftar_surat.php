<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Tgl</th>
                                            <th>Departemen</th>
                                            <th>Judul</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php 
                                   foreach($view as $v){
                                    $tgl = date('d-m-Y', strtotime($v->tgl));
                              ?>
                                        <tr>
                                            <td style="text-align:center; width:10%"><?= $tgl ?></td>
                                            <td><?= $v->departemen ?></td>
                                            <td><?= $v->judul ?></td>
                                            <td style="text-align:center; width:25%">
                                                <form style="display:inline-block;">
                                                    <button class="btn btn-primary-outline" data-toggle="tooltip"
                                                        data-html="true" data-placement="top"
                                                        title="&lt;b&gt;From :&lt;/b&gt;&lt;br&gt; <?=$v->from?>&lt;br&gt;&lt;br&gt;&lt;b&gt;To:&lt;/b&gt;&lt;br&gt; <?=$v->to?>">
                                                        <i class="fa fa-info-circle"
                                                            style="font-size: 20px; color: #d7b017"> </i>
                                                    </button>
                                                </form>
                                                <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('common/detail') ?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="submit" class="btn btn-primary-outline"
                                                        data-toggle="tooltip" data-placement="top" title="Preview">
                                                        <i class="fa fa-eye" style="font-size: 20px; color: blue"> </i>
                                                    </button>
                                                </form>
                                                <?php if($v->status==(int)$st) { ?>
                                                <form style="display:inline-block;" method="post"
                                                    action="<?= base_url("$url/review") ?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="submit" class="btn btn-primary-outline"
                                                        data-toggle="tooltip" data-placement="top" title="Review">
                                                        <i class="fa fa-upload" style="font-size: 20px; color: green">
                                                        </i>
                                                    </button>
                                                </form>
                                                <?php } else {?>
                                                <form style="display:inline-block;">
                                                    <button class="btn btn-primary-outline" data-toggle="tooltip"
                                                        data-placement="top" title="Review">
                                                        <i class="fa fa-upload" style="font-size: 20px; color: grey">
                                                        </i>
                                                    </button>
                                                </form>
                                                <?php }?>
                                                <form style="display:inline-block;">
                                                    <button class="btn btn-primary-outline" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <i class="fa fa-pencil" style="font-size: 20px; color: grey">
                                                        </i>
                                                    </button>
                                                </form>
                                                <form style="display:inline-block;">
                                                    <button class="btn btn-primary-outline" data-toggle="tooltip"
                                                        data-placement="top" title="Ajukan Draft">
                                                        <i class="fa fa-trash" style="font-size: 20px; color: grey">
                                                        </i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>