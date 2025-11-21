{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Otoritas - User : <b>{$username}</b></h5>
            </div>
            
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="{$_url}settings/users-oto/{$id}" name="tambahoto">
                    <div class="col-md-11" style="padding: 0; width: 300px;">
                        <select name="otoritas_group" id="otoritas_group" class="form-control">
                            <option value="">Contain</option>
                            <option value="semua">ALL</option>
                            <option value="user">Daftar Otoritas User</option>
                            {$group}
                        </select>
                    </div>
                </form>
				<div class="ibox-tools col-md-1">
					<a href="{$_url}settings/otoritas-user" class="btn btn-primary"><i class="fa fa-reply"></i> Back</a>
				</div>
                <br><br>
				<div class="alert alert-danger" id="emsg">
					<span id="emsgbody"></span>
				</div>
				{*{if ($user['id']) eq 1}
                <a href="{$_url}settings/users-add" class="btn btn-primary"><i class="fa fa-plus"></i> {$_L['Add_New_Otoritas']}</a>
				{/if}*}
                <table class="table table-striped table-bordered" id="isi_oto">
					<thead>
						<th width="5%"><input type="checkbox" id="select_all" name="select_all"></th>
						<th width="5%">No.</th>
						<th width="20%">Kode Otoritas</th>
						<th width="20%">Program</th>
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
<!--					<button class="btn btn-sm btn-primary" type="submit" id="submit">{$_L['Save']}</button>-->
				</div>
			</div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}
