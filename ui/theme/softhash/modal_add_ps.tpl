<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Tambah PART</h3>
</div>
<div class="modal-body">

    <form class="form-horizontal" id="rform">

        <div class="form-group"><label class="col-lg-2 control-label" for="code">SMC PN</label>
			<div class="col-lg-1">
				<select id="code1" name="code1" class="form-control">
					<option value="">Pilih Kode End User</option>
					{$kode_data}
				</select>
			</div>
			<div class="col-lg-1">
				<select id="code2" name="code2" class="form-control">
					<option value="">Pilih Plant</option>
					{$plant_data}
				</select>
			</div>
			<div class="col-lg-1">
				<select id="code3" name="code3" class="form-control">
					<option value="">Pilih Type</option>
					{$mark_data}
				</select>
			</div>
			{*<div class="col-lg-2">
				<input type="text" id="code4" name="code4" class="form-control" autocomplete="off" maxlength="6">
			</div>*}
        </div>

        <div class="form-group"><label class="col-lg-2 control-label" for="name">Part No</label>

            <div class="col-lg-10"><input type="text" id="part_no" name="part_no" class="form-control">

            </div>
        </div>
        <div class="form-group"><label class="col-lg-2 control-label" for="name">Part Name</label>

            <div class="col-lg-10"><input type="text" id="name" name="name" class="form-control">

            </div>
        </div>
        
        <div class="form-group"><label class="col-lg-2 control-label" for="dwg_no">DWG No.</label>

            <div class="col-lg-10"><input type="text" id="dwg_no" name="dwg_no" class="form-control" >

            </div>
        </div>
        <div class="form-group"><label class="col-lg-2 control-label" for="equip_no">Equip No.</label>

            <div class="col-lg-10"><input type="text" id="equip_no" name="equip_no" class="form-control" >

            </div>
        </div>
        <div class="form-group"><label class="col-lg-2 control-label" for="satuan">Unit</label>

            <div class="col-lg-10"><input type="text" id="satuan" name="satuan" class="form-control" >

            </div>
        </div>
    </form>

</div>
<div class="modal-footer">

    <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Cancel']}</button>
    <button class="btn btn-primary part_submit" type="submit" id="part_submit"><i class="fa fa-check"></i> Tambah Part</button>
</div>