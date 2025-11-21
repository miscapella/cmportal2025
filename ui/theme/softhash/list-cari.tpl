{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><b>Cari Transaksi</b></h5>
    </div>
	<div class="ibox">
			<div class="ibox-content" id="ibox_form">
				<div class="input-group">
					<input type="text" placeholder="Cari SMC No,PCI No atau Manufacture ..." id="kata" class="input-sm form-control">
					<span class="input-group-btn"><button type="button" id="search" class="btn btn-sm btn-primary"> {$_L['Search']}</button></span>
					<span class="input-group-btn"><button type="button" id="reset" class="btn btn-sm btn-warning"> Reset</button></span>
				</div>
				<input type="hidden" id="stype" value="{$type}">

				<div class="project-list mt-md">
					<div id="progressbar">
					</div>

				</div>
			</div>
	</div>
	<div class="ibox">
		<div class="ibox-content col-lg-12 col-md-12 col-sm-12 col-xs-12 small" style="overflow-y: scroll;">
			<div id="sysfrm_ajaxrender">
			</div>
		</div>
	</div>
	<div class="ibox">
		<div class="ibox-content">
			{$paginator['contents']}
		</div>
	</div>
</div>
{include file="sections/footer.tpl"}