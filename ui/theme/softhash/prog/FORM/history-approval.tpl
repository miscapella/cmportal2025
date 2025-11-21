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
            <div class="loader-container hide">
                <div class="loader"></div>
            </div>
            <div class="panel-body">
                <table id="datatable-history-approval"  class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 15%;">Tanggal</th>
                        <th style="width: 20%;">Nama Form</th>
                        <th style="width: 25%;">Respondent</th>
                        <th style="width: 18%;">Details</th>
                        <th class="text-right">Status</th>
                    </tr>
                    </thead>
                    <!-- <tbody>
					{assign var="nourut" value=1}
                    {assign var="i" value=0}
                    {foreach $d as $ds}
                        <tr>
                            <td>{$nourut}</td>
                            <td>{$date[$i]}</td>
                            <td>
                            {foreach $e as $es}
                                {if $form[$i] eq $es['kode_form']}
                                    {$es['nama_form']}
                                {/if}
                            {/foreach}
                            </td>
                            <td>{$respondent[$i]}</td>
                            <td class="text-center"><span class="btn {if $status[$i] eq 'Rejected'}btn-danger{else if $status[$i] eq 'Approved'}btn-primary{else}btn-warning{/if} btn-xs" value="{$ds}">{$status[$i]}</span></td>
                            <td class="text-center">
                                <a href="#" class="details" value="{$ds}"><u>Details</u></a>
                            </td>
                            <td class="text-center"><span class="status btn {if $stat[$i] eq 'Rejected'}btn-danger{else if $stat[$i] eq 'Approved'}btn-primary{else}btn-warning{/if} btn-xs" value="{$ds}">{$stat[$i]}</span></td>
                        </tr>
                        {assign var="i" value=$i+1}
                        {assign var="nourut" value=$nourut+1}
                    {/foreach}
                    </tbody> -->
                </table>
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