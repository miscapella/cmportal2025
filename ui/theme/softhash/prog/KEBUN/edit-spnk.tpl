{include file="sections/header.tpl"}
<div class="alert alert-danger" id="emsg">
	<span id="emsgbody"></span>
</div>
{if $msg neq ''}
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	{$msg}
</div>
{/if}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>EDIT SURAT PERINTAH KERJA</h3>
				<div class="alert alert-danger" id="emsg" style="display: none;">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <ul style="padding: 0;list-style-type:none">
					<li><button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
				</ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPnK</label>
					<div class="col-lg-3"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="{$d['no_spmk']}" readonly></div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="tgl_smpk">Tanggal SPnK</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="idate" name="idate" class="form-control" value="{$d['tgl_spmk']}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
					</div>
				</div><br>
				<!-- <div class="form-group"><label class="col-lg-3 control-label" for="priority">Tingkat Kepentingan <span style="color: red;">*</span> </label>
					<div class="col-lg-3">
						<select name="priority" id="priority" class="form-control" readonly>
							<option value="">Pilih Kepentingan</option>
							<option value="URGENT" {if $d['priority'] eq 'URGENT'}selected{/if}>URGENT</option>
							<option value="TIDAK URGENT" {if $d['priority'] eq 'TIDAK URGENT'}selected{/if}>TIDAK URGENT</option>
						</select>
					</div>
				</div><br> -->
                <div class="form-group"><label class="col-lg-3 control-label" for="priority">Priority</label>
					<div class="col-lg-3"><input type="text" id="priority" name="priority" class="form-control" value="{$d['priority']}" readonly>
					</div>
				</div><br>
				<div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi</label>
					<div class="col-lg-3"><input type="text" id="divisi" name="divisi" class="form-control" value="{$d['divisi']}" readonly>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan</label>
					<div class="col-lg-3"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="{$d['jenis_pekerjaan']}" readonly>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi Kebun</label>
					<div class="col-lg-3"><input type="text" id="lokasi" name="lokasi" class="form-control" value="{$d['lokasi']}" readonly>
					</div>
				</div><br>
                <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
					<div class="col-lg-3"><input type="text" id="afdeling" name="afdeling" class="form-control" value="{$d['afdeling']}" readonly>
					</div>
				</div><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<table class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th>Keterangan / Rincian  Spesifikasi</th>
							<th>Block</th>
							<th>Ha</th>
							<th>PKK</th>
							<th><span style="color: red;">*</span> Kontraktor 1</th>
							<th><span style="color: red;">*</span> Harga Kontraktor 1</th>
							<th>Keterangan Kontraktor 1</th>
							<th>File Kontraktor 1</th>
							<th>Kontraktor 2</th>
							<th>Harga Kontraktor 2</th>
							<th>Keterangan Kontraktor 2</th>
							<th>File Kontraktor 2</th>
							<th>Kontraktor 3</th>
							<th>Harga Kontraktor 3</th>
							<th>Keterangan Kontraktor 3</th>
							<th>File Kontraktor 3</th>
							<th><span style="color: red;">*</span> Kontraktor Pilihan</th>
						</tr>
						</thead>
						<tbody>
						<div style="display:none" name="opt" id="opt">{$clist}</div>
						{assign var="nourut" value=1}
						{foreach $e as $ds}
							<tr>
								<td style="vertical-align: middle;"><input type="checkbox" name="chk[]" class="cekbox" checked="checked" style="display:none">{$nourut}</td>
								<td style="vertical-align: middle;"><input type="text" name="spesifikasi[]" class="spesifikasi" value="{$ds['spesifikasi']}" readonly></td>
                                <td style="vertical-align: middle;"><input type="text" name="block[]" class="block" value="{$ds['block']}" readonly></td>
                                <td style="vertical-align: middle;"><input type="text" name="ha[]" class="ha" value="{$ds['ha']}" readonly></td>
                                <td style="vertical-align: middle;"><input type="text" name="pkk[]" class="pkk" value="{$ds['pkk']}" readonly></td>
								{assign var="nama_kontraktor1" value=""}
                                {assign var="contact1" value=""}
                                {assign var="lama_bayar1" value=""}
                                {assign var="nama_kontraktor2" value=""}
                                {assign var="contact2" value=""}
                                {assign var="lama_bayar2" value=""}
                                {assign var="nama_kontraktor3" value=""}
                                {assign var="contact3" value=""}
                                {assign var="lama_bayar3" value=""}
                                {foreach $tg3 as $r3}
                                    {if $ds['kontraktor1'] eq $r3['kode_supplier']}
                                        {assign var="nama_kontraktor1" value="{$r3['nama_supplier']}"}
                                        {assign var="contact1" value="{$r3['contact']}"}
                                        {assign var="lama_bayar1" value="{$r3['lama_bayar']}"}
                                    {/if}
                                    {if $ds['kontraktor2'] eq $r3['kode_supplier']}
                                        {assign var="nama_kontraktor2" value="{$r3['nama_supplier']}"}
                                        {assign var="contact2" value="{$r3['contact']}"}
                                        {assign var="lama_bayar2" value="{$r3['lama_bayar']}"}
                                    {/if}
                                    {if $ds['kontraktor3'] eq $r3['kode_supplier']}
                                        {assign var="nama_kontraktor3" value="{$r3['nama_supplier']}"}
                                        {assign var="contact3" value="{$r3['contact']}"}
                                        {assign var="lama_bayar3" value="{$r3['lama_bayar']}"}
                                    {/if}
                                {/foreach}
								<td style="vertical-align: middle; display: none;"><input type="text" name="kontraktorid[]" class="kontraktorid" value="{$ds['id']}" readonly></td>
								<td style="vertical-align: middle;">
									<select name="kontraktor1[]" class="kontraktor" style="width: 200px;">
                                        <option value="">Pilih kontraktor 1</option>
									    {foreach $tg3 as $r4}
									        <option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kontraktor1']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga1[]" class="harga amount" value="{$ds['harga1']}"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor1[]" class="keterangan" value="{$ds['keterangan_kontraktor1']}"></td>
								<td style="vertical-align: middle;"><input type="file" id="s{$nourut}file_kontraktor1" name="sfile_kontraktor1[]" class="files"><input type="text" id="{$nourut}file_kontraktor1" name="file_kontraktor1[]" style="display: none;"></td>
								<td style="vertical-align: middle;">
									<select name="kontraktor2[]" class="kontraktor" style="width: 200px;">
										<option value="">Pilih kontraktor 2</option>
									    {foreach $tg3 as $r4}
									        <option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kontraktor2']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga2[]" class="harga amount" value="{$ds['harga2']}" ></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor2[]" class="keterangan" value="{$ds['keterangan_kontraktor2']}"></td>
								<td style="vertical-align: middle;"><input type="file" id="s{$nourut}file_kontraktor2" name="sfile_kontraktor2[]" class="files"><input type="text" id="{$nourut}file_kontraktor2" name="file_kontraktor2[]" style="display: none;"></td>
								<td style="vertical-align: middle;">
									<select name="kontraktor3[]" class="kontraktor"  style="width: 200px;">
										<option value="">Pilih kontraktor 3</option>
									    {foreach $tg3 as $r4}
									        <option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kontraktor3']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga3[]" class="harga amount" value="{$ds['harga3']}"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor3[]" class="keterangan" value="{$ds['keterangan_kontraktor3']}"></td>
								<td style="vertical-align: middle;"><input type="file" id="s{$nourut}file_kontraktor3" name="sfile_kontraktor3[]" class="files"><input type="text" id="{$nourut}file_kontraktor3" name="file_kontraktor3[]" style="display: none;"></td>
								<td style="vertical-align: middle;">
								    <input type="radio" name="{$ds["id"]}kontraktorpilihan[]" id="{$ds["id"]}kontraktorpilihan1[]" class="cekbox" value="kontraktor1" {if $ds['kontraktorpilihan'] eq $ds['kontraktor1'] and $ds['kontraktorpilihan'] neq '' } checked {/if}> <label style="font-weight: normal" for="{$ds["id"]}kontraktorpilihan1[]"> Kontraktor 1</label><br>
									<input type="radio" name="{$ds["id"]}kontraktorpilihan[]" id="{$ds["id"]}kontraktorpilihan2[]" class="cekbox" value="kontraktor2" {if $ds['kontraktorpilihan'] eq $ds['kontraktor2'] and $ds['kontraktorpilihan'] neq ''} checked {/if}> <label style="font-weight: normal" for="{$ds["id"]}kontraktorpilihan2[]"> Kontraktor 2</label><br>
									<input type="radio" name="{$ds["id"]}kontraktorpilihan[]" id="{$ds["id"]}kontraktorpilihan3[]" class="cekbox" value="kontraktor3" {if $ds['kontraktorpilihan'] eq $ds['kontraktor3'] and $ds['kontraktorpilihan'] neq ''} checked {/if}> <label style="font-weight: normal" for="{$ds["id"]}kontraktorpilihan3[]"> Kontraktor 3</label>
								</td>
							</tr>
				        {assign var="nourut" value=$nourut+1}
						{/foreach}
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}