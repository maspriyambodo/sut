<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">nama perusahaan</label>
            <p class="text-uppercase"><?= $value[0]->perusahaan; ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">no preorder</label>
            <p class="text-uppercase" id="no_po"><?= $value[0]->no_po; ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">nama karyawan</label>
            <p class="text-uppercase"><?= $value[0]->nama; ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">email</label>
            <p class="text-uppercase"><?= $value[0]->mail; ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">telepon</label>
            <p class="text-uppercase"><?= $value[0]->telepon; ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">tanggal po</label>
            <p class="text-uppercase"><?= $value[0]->tgl_po; ?></p>
        </div>
    </div>
</div>
<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
        <ul class="dropdown-menu">
        </ul>
    </div>

    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a data-edit="fontSize 5">
                    <p style="font-size:17px">Huge</p>
                </a>
            </li>
            <li>
                <a data-edit="fontSize 3">
                    <p style="font-size:14px">Normal</p>
                </a>
            </li>
            <li>
                <a data-edit="fontSize 1">
                    <p style="font-size:11px">Small</p>
                </a>
            </li>
        </ul>
    </div>

    <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
    </div>

    <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
    </div>

    <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
    </div>

    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
        <div class="dropdown-menu input-append">
            <input class="span2" placeholder="URL" type="text" data-edit="createLink">
            <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
    </div>
    <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
    </div>
</div>

<div id="editor-one" class="editor-wrapper placeholderText" contenteditable="true">
    <img src="<?= base_url('assets/images/Logo/SANINDO_.jpg'); ?>" style="width:150px;"/>
    <p>Head Office: Jl. Tebet Barat XI No.8-9, Jakarta Selatan 12810</p>
    <p>Phone: (021) 22837646, Email: generaladmin@sanindo.co.id</p>
</div>
<div class="form-group text-right" style="margin:20px 0px;">
    <button type="button" class="btn btn-default" onclick="Kirim()">Kirim</button>
</div>
<script>
    function Kirim() {
        var a, b;
        a = document.getElementById('editor-one').innerHTML;
        b = document.getElementById('no_po').innerHTML;
        $.ajax({
            url: "<?= base_url('Admin/Preorder/Kirim/'); ?>" + b,
            method: 'POST',
            data: {pesan: a},
            success: function (data) {
                alert(data.textStatus);
                window.location.href = '<?= base_url('Admin/Preorder/index/'); ?>';
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    }
    window.onload = function () {
        $('#editor-one').wysiwyg();
    };
</script>