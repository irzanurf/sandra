<link href="<?= base_url('assets/pg.css');?>" rel="stylesheet">
<!-- Progress Bar -->
<div class="md-stepper-horizontal green">
    <?php if($surat->status == "draft") { $surat->status = -1; } ?>
    <?php if(1>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>1</span></div>
        <div class="md-step-title">Kadep</div>
        <?php if (!empty($log_kadep)) { 
                      foreach ($log_kadep as $v) {
                      $tgl_kadep = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_kadep ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_kadep ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(1>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>1</span></div>
        <div class="md-step-title">Kadep</div>
        <?php if (!empty($log_kadep)) { 
                      foreach ($log_kadep as $v) {
                      $tgl_kadep = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_kadep ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_kadep ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(1<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>1</span></div>
        <div class="md-step-title">Kadep</div>
        <?php if (!empty($log_kadep)) { 
                      foreach ($log_kadep as $v) {
                      $tgl_kadep = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_kadep ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_kadep ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } if(2>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>2</span></div>
        <div class="md-step-title">Verifikator</div>
        <?php if (!empty($log_verifikator)) { 
                      foreach ($log_verifikator as $v) {
                      $tgl_verifikator = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_verifikator ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_verifikator ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(2<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>2</span></div>
        <div class="md-step-title">Verifikator</div>
        <?php if (!empty($log_verifikator)) { 
                      foreach ($log_verifikator as $v) {
                      $tgl_verifikator = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_verifikator ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_verifikator ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } if(3>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>3</span></div>
        <div class="md-step-title">Supervisor</div>
        <?php if (!empty($log_supervisor)) { 
                    
                      foreach ($log_supervisor as $v) {
                      $tgl_supervisor = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_supervisor ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_supervisor ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(3<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>3</span></div>
        <div class="md-step-title">Supervisor</div>
        <?php if (!empty($log_supervisor)) { 
                      foreach ($log_supervisor as $v) {
                      $tgl_supervisor = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_supervisor ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_supervisor ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } if(4>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>4</span></div>
        <div class="md-step-title">Manager</div>
        <?php if (!empty($log_manager)) { 
                      foreach ($log_manager as $v) {
                      $tgl_manager = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_manager ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_manager ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(4<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>4</span></div>
        <div class="md-step-title">Manager</div>
        <?php if (!empty($log_manager)) { 
                      foreach ($log_manager as $v) {
                      $tgl_manager = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_manager ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_manager ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } if(5>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>5</span></div>
        <div class="md-step-title">Wadek</div>
        <?php if (!empty($log_wadek)) { 
                      foreach ($log_wadek as $v) {
                      $tgl_wadek = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_wadek ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_wadek ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(5<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>5</span></div>
        <div class="md-step-title">Wadek</div>
        <?php if (!empty($log_wadek)) { 
                      foreach ($log_wadek as $v) {
                      $tgl_wadek = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_wadek ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_wadek ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } if(6>$surat->status){ ?>
    <div class="md-step">
        <div class="md-step-circle"><span>6</span></div>
        <div class="md-step-title">Dekan</div>
        <?php if (!empty($log_dekan)) { 
                      foreach ($log_dekan as $v) {
                      $tgl_dekan = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_dekan ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_dekan ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(6<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>6</span></div>
        <div class="md-step-title">Dekan</div>
        <?php if (!empty($log_dekan)) { 
                      foreach ($log_dekan as $v) {
                      $tgl_dekan = date('d-m-Y', strtotime($v->tgl)); 
                      if (($v->round)%2==0) {?>
        <div class="md-step-optional" style="color: green"><?= $tgl_dekan ?></div>
        <?php } else{ ?>
        <div class="md-step-optional" style="color: blue"><?= $tgl_dekan ?></div>
        <?php }}} ?>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } ?>
    <?php if(7>$surat->status){ ?>
    <div class="md-step done">
        <div class="md-step-circle"><span>7</span></div>
        <div class="md-step-title">Finish</div>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } elseif(7<=$surat->status) { ?>
    <div class="md-step active done">
        <div class="md-step-circle"><span>7</span></div>
        <div class="md-step-title">Finish</div>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
    </div>
    <?php } ?>
</div>
<!-- End Progress Bar -->
<br>