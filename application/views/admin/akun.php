<div class="container-fluid">
    <div class="chit-chat-layer1">
        <div class="col-md-12 chit-chat-layer1">
            <div class="work-progres" style="background-color: #eef0fd">
                <div class="row" style="margin-left: 5px; margin-right: 5px;">
                    <form method="post" action="<?php echo base_url()?>verifikator/ganti_password">
                        <h2 style="text-align: center;">Ganti Password</h2>
                        <hr>
                        <label style="font-size: 20px">Username</label><br>
                        <input name="id" type="hidden" class="form-control" value="<?= $v->id ?>">
                        <input name="username" type="text" class="form-control" value="<?= $v->username ?>"
                            readonly><br>
                        <label>Nama</label><br>
                        <input class="form-control" type="text" name="nama" value="<?= $v->nama ?>" readonly><br>
                        <label>Departemen / Prodi</label><input class="form-control" type="text" name="departemen"
                            value="<?= $v->departemen ?>" readonly>
                        <hr>
                        <h3>Ganti Password</h3>
                        <div class="form-group"><label>Password Baru</label><input class="form-control" type="password"
                                name="pass" id="txtPassword"></div>
                        <div class="form-group"><label>Ulangi Password</label><input class="form-control"
                                type="password" name="re" id="txtConfirmPassword"></div>
                        <hr>
                        <div class="text-center">
                            <button id="btnSubmit" type="submit" onclick="return Validate()" class="btn btn-success">
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
    var k = 0;
    $(".add-mengingat").click(function() {
        k = k + 1;
        var html = $(".copy-mengingat").html();
        $(".before-add-mengingat").before(html);
        $("#editor-copy-mengingat").attr("id", "editor-copy-mengingat" + k);
        CKEDITOR.replace('editor-copy-mengingat' + k);
    });
    $("body").on("click", ".remove-mengingat", function() {
        $(this).parents(".control-group").remove();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    var j = 0;
    $(".add-menimbang").click(function() {
        j = j + 1;
        var html = $(".copy-menimbang").html();
        $(".before-add-menimbang").before(html);
        $("#editor-copy-menimbang").attr("id", "editor-copy-menimbang" + j);
        CKEDITOR.replace('editor-copy-menimbang' + j);
    });
    $("body").on("click", ".remove-menimbang", function() {
        $(this).parents(".control-group").remove();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    var i = 0;
    $(".add-menetapkan").click(function() {
        i = i + 1;
        var html = $(".copy-menetapkan").html();
        $(".before-add-menetapkan").before(html);
        $("#editor-copy-menetapkan").attr("id", "editor-copy-menetapkan" + i);
        CKEDITOR.replace('editor-copy-menetapkan' + i);
    });
    $("body").on("click", ".remove-menetapkan", function() {
        $(this).parents(".control-group").remove();
    });
});
</script>

<script type="text/javascript">
function Validate() {
    var password = document.getElementById("txtPassword").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;
    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}
</script>
<!-- <script>
    $("textarea").each(function(){
        CKEDITOR.replace( this );
});
</script> -->