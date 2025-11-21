{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInDown">
	<div class="row">
		<div class="ibox">
			<div class="ibox-title">
				<h5>{$_L['List']} {if $type eq 'Product'} {$_L['Products']} {elseif $type eq 'Service'} {$_L['Services']} {else} Assembly {/if}</h5>
				<div class="ibox-tools">
					<a href="{$_url}ps/b-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> {$_L['Add Product']}</a>
					<a href="{$_url}ps/s-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> {$_L['Add Service']}</a>
					{if $type eq 'Komposisi'}
						<a href="{$_url}ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Assembly</a>
					{/if}
				</div>
			</div>
			<div class="ibox-content" id="ibox_form">
				<div class="input-group">
					{if $type eq 'Product'}
						<input type="text" placeholder="Cari SMC PN, Nama, PCI No, Equip No atau DWG No ..." id="txtsearch" class="input-sm form-control">
					{else}
						<input type="text" placeholder="Cari Equip No atau Nama ..." id="txtsearch" class="input-sm form-control">
					{/if}
					<span class="input-group-btn"><button type="button" id="search" class="btn btn-sm btn-primary"> {$_L['Search']}</button></span>
				</div>
				<input type="hidden" id="stype" value="{$type}">

				<div class="project-list mt-md">
					<div id="progressbar">
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="ibox">
			<div class="ibox-content">
				<div id="sysfrm_ajaxrender">
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="_lan_are_you_sure" value="{$_L['are_you_sure']}">

{include file="sections/footer.tpl"}