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
	<div class="col-md-9">
    </div>
    <div class="col-md-3">
		<a href="{$_url}struktur-organisasi/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Organisasi</a>			
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="just-padding">
        </div>
	</div>
</div>
{include file="sections/footer.tpl"}