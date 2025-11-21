{include file="sections/header.tpl"}
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
				<h3>DETAIL SURAT PERMINTAAN KERJA</h3>
				<div class="alert alert-danger" id="emsg">
					<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg"></i></a>
					<span id="emsgbody"></span>
				</div>
                <div class="ibox-tools">
					<a href="{$_url}pembelian/{if $d['status'] == 'PENDING' || $d['status'] == 'REVISI'}list-spmk-pending{else if $d['status'] == 'REJECT'}list-spmk-reject{/if}/" class="btn btn-primary btn-sm">Daftar SPMK</a>
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
        <div class="ibox-content" id="ibox_form">
          <div class="form-group"><label class="col-lg-3 control-label" for="no_spmk">No. SPMK</label>
            <div class="col-lg-9"><input type="text" id="no_spmk" name="no_spmk" class="form-control" value="{$d['no_spmk']}" disabled></div>
          </div><br>
          <div class="form-group"><label class="col-lg-3 control-label" for="tgl_pr">Tanggal SPMK</label>
            <div class="col-lg-9"><input type="text" id="idate" name="idate" class="form-control" value="{$idate}" datepicker data-date-format="dd-mm-yyyy" data-auto-close="true" disabled>
            </div>
          </div><br>
          <div class="form-group"><label class="col-lg-3 control-label" for="divisi">Divisi</label>
            <div class="col-lg-9"><input type="text" id="divisi" name="divisi" class="form-control" value="{$d['divisi']}" disabled></div>
          </div><br>
          <div class="form-group"><label class="col-lg-3 control-label" for="jenis_pekerjaan">Jenis Pekerjaan</label>
            <div class="col-lg-9"><input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="{$d['jenis_pekerjaan']}" disabled></div>
          </div><br>
          <div class="form-group"><label class="col-lg-3 control-label" for="lokasi">Lokasi</label>
            <div class="col-lg-9"><input type="text" id="lokasi" name="lokasi" class="form-control" value="{$d['lokasi']}" disabled></div>
          </div><br>
          <div class="form-group"><label class="col-lg-3 control-label" for="afdeling">Afdeling</label>
            <div class="col-lg-9"><input type="text" id="afdeling" name="afdeling" class="form-control" value="{$d['afdeling']}" disabled></div>
          </div><br>
        </div>
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
								<td style="display: none;"><input type="text" name="kode_item[]" class="kode_item" readonly value="{$ds['block']}"></td>
								{assign var="nama_line" value=""}
								{foreach $tg2 as $r2}
									{if $ds['line'] eq $r2['kode_kategori']}
										{assign var="nama_line" value="{$r2['nama_kategori']}"}
									{/if}
								{/foreach}
								{if $nama_line eq ''}
									{assign var="nama_line" value="STOCK"}
								{/if}
								<td style="display:none;"><input type="text" name="item[]" class="item" value="{$ds['kode_item']}" readonly></td> 
								{assign var="nama_item" value=""}
								{foreach $tg1 as $r1}
									{if $ds['kode_item'] eq $r1['kode_item']}
										{assign var="nama_item" value="{$r1['nama_item']}"}
									{/if}
								{/foreach}
								<td style="vertical-align: middle;"><input type="text" name="block[]" class="" value={$ds['block']} readonly></td>
								<td style="vertical-align: middle;"><input type="text" name="ha[]" class="qty amount" value={$ds['ha']} readonly></td>
								<td style="vertical-align: middle;"><input type="text" name="pkk[]" class="qty amount" value={$ds['pkk']} readonly></td>
								{assign var="nama_supplier1" value=""}
                                {assign var="contact1" value=""}
                                {assign var="lama_bayar1" value=""}
                                {assign var="nama_supplier2" value=""}
                                {assign var="contact2" value=""}
                                {assign var="lama_bayar2" value=""}
                                {assign var="nama_supplier3" value=""}
                                {assign var="contact3" value=""}
                                {assign var="lama_bayar3" value=""}
                                {foreach $tg3 as $r3}
                                    {if $ds['kontraktor1'] eq $r3['kode_supplier']}
                                        {assign var="nama_supplier1" value="{$r3['nama_supplier']}"}
                                        {assign var="contact1" value="{$r3['contact']}"}
                                        {assign var="lama_bayar1" value="{$r3['lama_bayar']}"}
                                    {/if}
                                    {if $ds['kontraktor2'] eq $r3['kode_supplier']}
                                        {assign var="nama_supplier2" value="{$r3['nama_supplier']}"}
                                        {assign var="contact2" value="{$r3['contact']}"}
                                        {assign var="lama_bayar2" value="{$r3['lama_bayar']}"}
                                    {/if}
                                    {if $ds['kontraktor3'] eq $r3['kode_supplier']}
                                        {assign var="nama_supplier3" value="{$r3['nama_supplier']}"}
                                        {assign var="contact3" value="{$r3['contact']}"}
                                        {assign var="lama_bayar3" value="{$r3['lama_bayar']}"}
                                    {/if}
                                {/foreach}
																<td style="vertical-align: middle; display: none;"><input type="text" name="kontraktorid[]" class="kontraktorid" value="{$ds['id']}" readonly></td>
								<td style="vertical-align: middle;">
									<select name="kode_kontraktor1[]" class="kode_kontraktor" style="width: 200px;">
										<option value="">Pilih Kontraktor 1</option>
										{foreach $tg3 as $r4}
											<option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kontraktor1']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga1[]" class="harga amount" value="{$ds['harga1']}"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor1[]" class="keterangan" value="{$ds['keterangan_kontraktor1']}"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s{$nourut}file_kontraktor1" name="sfile_kontraktor1[]" class="files">
									<input type="text" id="{$nourut}file_kontraktor1" name="file_kontraktor1[]" value="{$ds['file_kontraktor1']}" style="display: none;">
									{if $ds['file_kontraktor1'] neq ''}
										<a href="uploads/KEBUN/{$ds['file_kontraktor1']}" target="_blank">{$ds['file_kontraktor1']}</a>
									{else}
										<a>Tidak ada file</a>
									{/if}
								</td>
								<td style="vertical-align: middle;">
									<select name="kode_kontraktor2[]" class="kode_kontraktor" style="width: 200px;">
										<option value="">Pilih Kontraktor 2</option>
										{foreach $tg3 as $r4}
											<option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kontraktor2']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga2[]" class="harga amount" value="{$ds['harga2']}" ></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_supplier2[]" class="keterangan" value="{$ds['keterangan_kontraktor2']}"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s{$nourut}file_kontraktor2" name="sfile_kontraktor2[]" class="files">
									<input type="text" id="{$nourut}file_kontraktor2" name="file_kontraktor2[]" value="{$ds['file_kontraktor2']}" style="display: none;">
									{if $ds['file_kontraktor2'] neq ''}
										<a href="uploads/KEBUN/{$ds['file_kontraktor2']}" target="_blank">{$ds['file_kontraktor2']}</a>
									{else}
										<a>Tidak ada file</a>
									{/if}
								</td>
								<td style="vertical-align: middle;">
									<select name="kode_kontraktor3[]" class="kode_kontraktor"  style="width: 200px;">
										<option value="">Pilih Kontraktor 3</option>
										{foreach $tg3 as $r4}
											<option value="{$r4['kode_supplier']}" {if $r4['kode_supplier'] eq $ds['kontraktor3']} selected{/if}>{$r4['kode_supplier']} - {$r4['nama_supplier']}</option>
										{/foreach}
									</select>
								</td>
								<td style="vertical-align: middle;"><input type="text" name="harga3[]" class="harga amount" value="{$ds['harga3']}"></td>
								<td style="vertical-align: middle;"><input type="text" name="keterangan_kontraktor3[]" class="keterangan" value="{$ds['keterangan_kontraktor3']}"></td>
								<td style="vertical-align: middle;">
									<input type="file" id="s{$nourut}file_kontraktor3" name="sfile_kontraktor3[]" class="files">
									<input type="text" id="{$nourut}file_kontraktor3" name="file_kontraktor3[]" value="{$ds['file_kontraktor3']}" style="display: none;">
									{if $ds['file_kontraktor3'] neq ''}
										<a href="uploads/KEBUN/{$ds['file_kontraktor3']}" target="_blank">{$ds['file_kontraktor3']}</a>
									{else}
										<a>Tidak ada file</a>
									{/if}
								</td>
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