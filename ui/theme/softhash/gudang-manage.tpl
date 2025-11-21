
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Daftar Gudang</h5>

            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered">
                    <th>Kode Gudang</th>
                    <th>Lokasi</th>
                    <th>Manage</th>
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['kode_gudang']}</td>
                            <td>{$ds['lokasi']}</td>
                            <td>
                                <a href="{$_url}gudang/edit/{$ds['id']}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                                <a href="{$_url}gudang/delete/{$ds['id']}" id="{$ds['id']}" class="cdelete btn btn-danger btn-sm"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                            </td>
                        </tr>
                    {/foreach}


                </table>

            </div>
        </div>



    </div>



</div>


<input type="hidden" id="_lan_are_you_sure" value="{$_L['are_you_sure']}">

{include file="sections/footer.tpl"}
