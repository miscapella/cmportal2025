{include file="sections/header.tpl"}

{if _auth2('UPDATE-MASTERDATA-TIPE-KENDARAAN', $user['id'])}
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <a href="{$_url}tipe-kendaraan/export/" class="btn btn-success btn-block"><i class="fa fa-file-excel-o"></i> Export Excel</a>
    </div>
    <div class="col-md-3">
        <a href="{$_url}tipe-kendaraan/add/" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Tipe Kendaraan</a>
    </div>
</div>
{/if}

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Daftar Tipe Kendaraan</h1>
                <br>
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Merek</th>
                            <th width="20%">Kategori</th>
                            <th width="35%">Nama Tipe Mobil</th>
                            <th width="30%">{$_L['Manage']}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $items as $i}
                        <tr>
                            <td></td>
                            <td>{$i.merek|escape}</td>
                            <td>{$i.kategori|escape}</td>
                            <td>{$i.nama_tipe_mobil|escape}</td>
                            <td>
                                {if _auth2('UPDATE-MASTERDATA-TIPE-KENDARAAN', $user['id'])}
                                <a href="{$_url}tipe-kendaraan/edit/{$i.id}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {/if}
                                {if _auth2('DELETE-MASTERDATA-TIPE-KENDARAAN', $user['id'])}
                                <a href="{$_url}tipe-kendaraan/delete/uid{$i.id}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?');"><i class="fa fa-trash"></i> Hapus</a>
                                {/if}
                            </td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}
