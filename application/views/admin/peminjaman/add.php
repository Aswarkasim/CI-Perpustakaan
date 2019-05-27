<?php if(count($limit) >= $konfigurasi->max_jumlah_peminjaman){ ?>

    <div class="alert alert-warning text-center">
        <i class="fa fa-warning fa-3x"></i>
        <p>Mohon maaf, peminjaman buku baru tidak dapat di lakukan. Karena buku yang dipinjam harus dikembalikan terlebih dahulu</p>
    </div>
<?php }else{ ?>
<button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
<i class="fa fa-plus"></i> Tambah Peminjaman Buku
</button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Peminjaman Buku</h4>
    </div>
    <div class="modal-body">
       <script>
    // Set default datepicker options     
$.datepicker.setDefaults({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
    defaultDate: +2,
    minDate: 0,
    maxDate: '+2y',
    numberOfMonths: 2,
    showAnim: 'fadeIn',
    showButtonPanel: true
});

function splitDepartureDate(dateText) {
    var depSplit = dateText.split("-", 3);
    $('#alt-tanggal_kembali-d').val(depSplit[0]);
    $('#alt-tanggal_kembali-m').val(depSplit[1]);
    $('#alt-tanggal_kembali-y').val(depSplit[2]);
}


// Set arrival datepicker options       
$(function() {
    $('#tanggal_pinjam').datepicker({
        onSelect: function(dateText, instance) {

            // Split arrival date in 3 input fields                        
            var arrSplit = dateText.split("-");
            $('#alt-tanggal_pinjam-d').val(arrSplit[0]);
            $('#alt-tanggal_pinjam-m').val(arrSplit[1]);
            $('#alt-tanggal_pinjam-y').val(arrSplit[2]);

            // Populate departure date field 
            var nextDayDate = $('#tanggal_pinjam').datepicker('getDate', '+3d');
            nextDayDate.setDate(nextDayDate.getDate() + <?php echo $konfigurasi->max_hari_peminjaman ?>);
            $('#tanggal_kembali').datepicker('setDate', nextDayDate);
            splitDepartureDate($("#tanggal_kembali").val());
        },
        onClose: function() {
            $("#tanggal_kembali").datepicker("show");
        }
    });
});


// Set departure datepicker options        
$(function() {
    $('#tanggal_kembali').datepicker({

        // Prevent selecting departure date before arrival:
        beforeShow: customRange,
        onSelect: splitDepartureDate
    });
});


// Prevent selecting departure date before arrival


function customRange(a) {
    var b = new Date();
    var c = new Date(b.getFullYear(), b.getMonth(), b.getDate());
    if (a.id == 'tanggal_kembali') {
        if ($('#tanggal_pinjam').datepicker('getDate') != null) {
            c = $('#tanggal_pinjam').datepicker('getDate');
        }
    }
    return {
        minDate: c
    }
}



// CREATE REQUEST URL   
$('#fbooking').submit(function() {
    var baseURL = $('#fbooking').attr("action");
    var checkAvl = $(this).serialize();
    alert(baseURL + checkAvl)
    return false;
});
</script>
<!-- start tambah -->

<?php 

//error
    echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ','</div>');

    echo form_open(base_url('admin/peminjaman/add/'.$anggota->id_anggota));

 ?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Judul Buku yang akan dipinjam</label>
            <br>
            <select name="id_buku" class="form-control js-example-basic-single" style="width: 100%; padding: 10px 20px !important">
                <option value="">Pilih Buku</option>
                <?php foreach($buku as $buku){ ?>
                <option value="<?php echo $buku->id_buku ?>">
                    <?php echo $buku->judul_buku ?> - <?php echo $buku->kode_buku ?>    
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<div class="col-md-4">
    <div class="form-group">
        <label>Nama peminjam</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $anggota->nama_anggota ?>" readonly disabled>
    </div>
    
    <div class="form-group">
        <label>Status Kembali</label><br>
        <select name="status_kembali" class="form-control js-example-basic-single" style="width: 100%">
            <option>Status Kembali</option>
            <option value="Belum">Belum (Baru Pinjam)</option>
        </select>
    </div>
    

</div>

<div class="col-md-8">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tangggal peminjaman</label>
                <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo set_value('tanggal_pinjam') ?>" placeholder = 'YYYY-MM-DD' id="tanggal_pinjam">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tangggal harus kembali</label>
                <input type="text" name="tanggal_kembali" class="form-control" value="<?php echo set_value('tanggal_kembali') ?>" placeholder = 'YYYY-MM-DD' id="tanggal_kembali">
            </div>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo set_value('keterangan') ?>" placeholder = 'Keterangan'>
        </div>
    </div>
</div>
</div>

<div class="col-md-12 text-center">
    <button type="submit" name="Submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan Data Peminjaman
    </button>

    <button type="reset" name="Reset" class="btn btn-default">
        <i class="fa fa-times"></i> Reset
    </button>
    <a href="<?php echo base_url('admin/peminjaman') ?>" class="btn btn-danger">
        <i class="fa fa-backward"></i> Kembali
    </a>
</div>

<?php echo form_close(); ?>

<!-- end tambah -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
</div>
</div>

<?php } ?>
