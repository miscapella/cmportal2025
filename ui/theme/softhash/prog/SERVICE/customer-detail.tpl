{include file="sections/header.tpl"}

<style>
	.highlight-row {
		background-color: #d0e7ff !important;
	}
</style>

<script>
    // const _servis = {$servis};
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" style="position: sticky; top: 50px; z-index: 50;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body blue-bg">
                    <div class="col-lg-6">
                        <h3>DETAIL CUSTOMER</h3>
                    </div>
                    <div class="col-lg-6" style="text-align: right"><a href="{$_url}customer/list/" class="btn btn-primary btn-sm">Back</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Personal Information</h1>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Customer Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['customer_name']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="{$customer['alamat']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Equipment No.</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['equipment_no']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">No. Polisi</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['no_polisi']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tipe Kendaraan</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['tipe_kendaraan']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tahun Kendaraan</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['tahun_kendaraan']}" disabled>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Contacts Information</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Home</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control date" value="{$customer['home']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Office</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['office']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['mobile']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">CP Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['cp_name']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">CP Phone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['cp_phone']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">DM Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['dm_name']}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">DM Phone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" value="{$customer['dm_phone']}" disabled>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="row" id="servis">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body detail-pr-head">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Histori servis</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <table id="datatable" class="table table-bordered table-hover sys_table" data-equipment-no="{$customer['equipment_no']}">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="15%">Tanggal Servis</th>
                                            <th width="15%">Job Type</th>
                                            <th width="5%">Cabang</th>
                                            <th width="10%">Nama SA</th>
                                            <th width="15%">Tanggal Selesai</th>
                                            <th width="7%">KM</th>
                                            <th width="15%">Tanggal Delivery</th>
                                            <th width="15%">Customer Receive Car</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{include file="sections/footer.tpl"}