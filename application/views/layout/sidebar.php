<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <?php if($role==2){ $rul="departemen"?>
        <h3>Operator</h3>
        <?php } elseif($role==3){ $rul="kadep"?>
        <h3>Kadep</h3>
        <?php } elseif($role==4){ $rul="verifikator"?>
        <h3>Verifikator</h3>
        <?php } elseif($role==5){ $rul="supervisor1"?>
        <h3>Spv 1</h3>
        <?php } elseif($role==6){ $rul="supervisor2"?>
        <h3>Spv 2</h3>
        <?php } elseif($role==7){ $rul="manager"?>
        <h3>Manager</h3>
        <?php } elseif($role==8){ $rul="wadek1"?>
        <h3>Wadek 1</h3>
        <?php } elseif($role==9){ $rul="wadek2"?>
        <h3>Wadek 2</h3>
        <?php } elseif($role==10){ $rul="dekan"?>
        <h3>Dekan</h3>
        <?php } ?>

        <?php if($role==2){ ?>
        <ul class="nav side-menu">
            <li><a href="<?=base_url('/')?>"><i class="fa fa-home"></i> Home </a></li>
            <li><a><i class="fa fa-edit"></i> Surat <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href='<?=base_url("$rul/pengajuan_surat")?>'>Pengajuan Surat</a></li>
                    <li><a href='<?=base_url("$rul/daftar_draft")?>'>Surat draft</a></li>
                    <li><a href='<?=base_url("$rul/daftar_total")?>'>Total surat diajukan</a></li>
                    <li><a href='<?=base_url("$rul/daftar_approve")?>'>Total surat disetujui</a></li>
                </ul>
            </li>
        </ul>
        <?php } else{ ?>
        <ul class="nav side-menu">
            <li><a href="<?=base_url('/')?>"><i class="fa fa-home"></i> Home </a></li>
            <li><a><i class="fa fa-edit"></i> Surat <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href='<?=base_url("$rul/daftar_process")?>'>Surat harus segera diproses</a></li>
                    <li><a href='<?=base_url("$rul/daftar_total")?>'>Total surat diajukan</a></li>
                    <li><a href='<?=base_url("$rul/daftar_approve")?>'>Total surat disetujui</a></li>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </div>
</div>
<!-- /sidebar menu -->