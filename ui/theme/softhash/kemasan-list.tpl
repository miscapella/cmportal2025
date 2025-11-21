{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInUp">

	<div class="ibox">
		<div class="ibox-title">
	    	<h5>{$_L['List']} Kemasan</h5>
	    	<div class="ibox-tools">
                <a href="{$_url}ps/kemasan-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Kemasan</a>
            </div>
		</div>
		<div class="ibox-content" id="ibox_form">
			<div class="input-group"><input type="text" placeholder="{$_L['Search by Name']} ..." id="txtsearch" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" id="search" class="btn btn-sm btn-primary"> {$_L['Search']}</button> </span></div>
    <input type="hidden" id="stype" value="{$type}">

<div class="project-list mt-md">
    <div id="progressbar">
    </div>

<div id="sysfrm_ajaxrender">


</div>


</div>
</div>
</div>
</div>
<input type="hidden" id="_lan_are_you_sure" value="{$_L['are_you_sure']}">

{include file="sections/footer.tpl"}