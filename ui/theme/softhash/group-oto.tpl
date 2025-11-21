{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Otoritas - Group : <b>{$kode_group}</b></h5>
            </div>
			<form class="form-horizontal" id="rform" method="post">
            <div class="ibox-content">
				<div class="ibox-tools">
					<a href="{$_url}settings/otoritas-group" class="btn btn-primary"><i class="fa fa-reply"></i> Back</a>
				</div><br><br>
				<div class="alert alert-danger" id="emsg">
					<span id="emsgbody"></span>
				</div>
                <table class="table table-striped table-bordered">
					<thead>
						<th width="5%"><input type="checkbox" id="select_all" name="select_all"></th>
						<th width="5%">No.</th>
						<th width="20%">Kode Otoritas</th>
						<th width="20%">program</th>
						<th width="50%">Keterangan</th>
					</thead>
					<tbody>
					{assign var="nourut" value=1}
                    {foreach $d as $ds}
                        <tr>
							<td><input onchange="cekOto('{$ds['kode_oto']}')" type="checkbox" name="no" id="{$ds['kode_oto']}" class="checkbox" value="{$ds['kode_oto']}" 
								{foreach $e as $es}
									{if $es['kode_oto'] eq $ds['kode_oto']} checked {/if}
								{/foreach}
							></td>
							<td>{$nourut}</td>
							<td>{$ds['kode_oto']}</td>
							<td>{$ds['program']}</td>
							<td>{$ds['ket_oto']}</td>
							{assign var="nourut" value=$nourut+1}
                        </tr>
                    {/foreach}
					</tbody>
                </table>
            </div>
			<div class="ibox">
				{*<div class="ibox-content">
					{$paginator['contents']}
				</div>*}
				<div class="ibox-content">
					<input type="hidden" name="id" id="id" value="{$id}">
					<input type="hidden" name="kode_group" id="kode_group" value="{$kode_group}">
				</div>
			</div>
			</form>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}
