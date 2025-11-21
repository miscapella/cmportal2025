{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>Pinjaman Barang Inventaris</h3>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal form-zoom" id="rform">
                    <div class="form-group"><label class="control-label" for="tanggal_meeting">Tanggal dan Waktu Pinjam</label>
                        <div class="row">
                            <input type="date" id="tanggal_meeting" name="tanggal_meeting" class="form-control col-lg-6" style="margin-left: 15px;">
                            <select id="waktu_meeting" name="waktu_meeting" class="col-lg-2" style="margin-left: 15px;"> 
                                <option value="">Pilih Waktu</option>
                                    {$waktu}
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="control-label" for="durasi">Lama Pinjam (dalam Jam)</label>
                        <input type="number" id="durasi" name="durasi" min="1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pinjaman">Pinjam inventaris barang IT</label><br>
                        <input class="form-check-input" type="checkbox" id="laptop-acer" name="pinjaman[]" value="laptop acer"> <label class="form-check-label" for="laptop-acer">Laptop Acer</label><br>
                        <input class="form-check-input" type="checkbox" id="laptop-hp" name="pinjaman[]" value="laptop hp"> <label class="form-check-label" for="laptop-hp">Laptop HP</label><br>
                        <input class="form-check-input" type="checkbox" id="infocus-a" name="pinjaman[]" value="infocus A"> <label class="form-check-label" for="infocus-1">Infocus A</label><br>
                        <!-- <input class="form-check-input" type="checkbox" id="infocus-b" name="pinjaman[]" value="infocus B"> <label class="form-check-label" for="infocus-2">Infocus B</label><br> -->
                        <input class="form-check-input" type="checkbox" id="speaker" name="pinjaman[]" value="speaker"> <label class="form-check-label" for="speaker">Speaker</label><br>
                        <input class="form-check-input" type="checkbox" id="microphone" name="pinjaman[]" value="microphone"> <label class="form-check-label" for="microphone">Microphone</label><br>
                        <input class="form-check-input" type="checkbox" id="webcam" name="pinjaman[]" value="webcam"> <label class="form-check-label" for="webcam">Webcam</label><br>
                        <input class="form-check-input" type="checkbox" id="tripod" name="pinjaman[]" value="tripod"> <label class="form-check-label" for="tripod">Tripod</label>
                    </div>
                    <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}