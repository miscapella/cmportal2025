
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-10">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Kartu Piutang</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="{$_url}reports/arcard-print" id="tform" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No. Jual &#11020; No. Serial &#11020; No. Engine</label>
                        <div class="col-sm-8">
							<select id="no" name="no" class="form-control">
								<option value="">Pilih No. Jual...</option>
								{foreach $d as $ds}
									<option value="{$ds['no_jual']}">{$ds['no_jual']} &#11020; {$ds['no_chassis']} &#11020; {$ds['no_engine']}</option>
								{/foreach}

							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
