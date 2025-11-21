<?php /* Smarty version Smarty-3.1.13, created on 2025-04-25 11:44:32
         compiled from "ui\theme\softhash\prog\HRD\analitik-karyawan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120670819667fe060abdbec3-80748467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cbeb5219b9f2467010f52d0e8c96b3f81335084' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\HRD\\analitik-karyawan.tpl',
      1 => 1745556271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120670819667fe060abdbec3-80748467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_67fe060ac2cc47_84877270',
  'variables' => 
  array (
    'cuti' => 0,
    'employee' => 0,
    'dataDate' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67fe060ac2cc47_84877270')) {function content_67fe060ac2cc47_84877270($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<style>
	.highlight-row {
		background-color: #d0e7ff !important;
	}
</style>

<script>
    const _cuti = <?php echo $_smarty_tpl->tpl_vars['cuti']->value;?>
;
</script>

<div class="row" style="position: sticky; top: 50px; z-index: 50;">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body <?php if ($_smarty_tpl->tpl_vars['employee']->value['terminated']==0){?>blue-bg<?php }else{ ?>red-bg<?php }?>">
                <div class="col-lg-6">
                    <h3>DETAIL <?php if ($_smarty_tpl->tpl_vars['employee']->value['terminated']==1){?>TERMINATED<?php }?> KARYAWAN - <span class="tdate"><?php echo $_smarty_tpl->tpl_vars['dataDate']->value;?>
</span></h3>
                </div>
                <div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
analitik/masterdata/" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-head">
                <h1 class="text-center">Personal Information</h1>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Employee Id</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['employee_id'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Employee Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['employee_name'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Date of Birth</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control date" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['date_of_birth'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Gender</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['gender'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Marital Status</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['marital_status'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Religion</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['religion'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Blood Type</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['blood_type'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Citizenship</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['citizenship'];?>
" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-head">
                <h1 class="text-center">Working Information</h1>
                <br>
                <?php if ($_smarty_tpl->tpl_vars['employee']->value['terminated']==1){?>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Termination Date</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control date" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['termination_date'];?>
" disabled>
                        </div>
                    </div>
                <?php }?>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First Join Date</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control date" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['first_join_date'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Years in Service</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['years_in_service'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Grade</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['grade'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Work Location</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['work_location'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Employee Category</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['employee_category'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ready for Cross Company</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['employee']->value['ready_for_cross_company']==0){?>No<?php }else{ ?>Yes<?php }?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Employee Status</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['employee_status'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Employment Type</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['employment_type'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Contract Category</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['contract_category'];?>
" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-head">
                <h1 class="text-center">Employee Education</h1>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Level Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['education_level_name'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Field Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['education_field_name'];?>
" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-head">
                <h1 class="text-center">BPJS Kesehatan</h1>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Join Date</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control date" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['bpjs_kesehatan_join_date'];?>
" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kelas Rawat</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['kelas_rawat'];?>
" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="cuti">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body detail-pr-head">
                <h1 class="text-center">Histori Cuti</h1>
                <br>
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="23%">Request Date</th>
                            <th width="20%">Request Status</th>
                            <th width="22%">Leave Type</th>
                            <th width="23%">Number of Working Applied</th>
                            <th width="15%">Manage</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cuti-modal" tabindex="-1" role="dialog" aria-labelledby="cutiDetailModalLabel" aria-hidden="true" style="z-index: 10000;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title" id="cutiDetailModalLabel">Detail Cuti</h5>
			</div>
			<div id="cuti-modal-body" class="modal-body">
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Request Date</label>
                    <div class="col-lg-9">
                        <input id="request_date" type="text" class="form-control date" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Request Status</label>
                    <div class="col-lg-9">
                        <input id="request_status" type="text" class="form-control" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Leave Type</label>
                    <div class="col-lg-9">
                        <input id="leave_type" type="text" class="form-control" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Leave From</label>
                    <div class="col-lg-9">
                        <input id="leave_from" type="text" class="form-control datetime" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Leave To</label>
                    <div class="col-lg-9">
                        <input id="leave_to" type="text" class="form-control datetime" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Reports to Work on</label>
                    <div class="col-lg-9">
                        <input id="reports_to_work_on" type="text" class="form-control datetime2" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-wrap" style="white-space: normal;">Number of Working Applied</label>
                    <div class="col-lg-9">
                        <input id="number_of_working_applied" type="text" class="form-control" disabled style="background-color: transparent; cursor: default;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Reason</label>
                    <div class="col-lg-9">
                        <textarea id="reason" class="form-control" rows="3" disabled style="background-color: transparent; cursor: default; resize: none;"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label">Note</label>
                    <div class="col-lg-9">
                        <textarea id="note" class="form-control" rows="3" disabled style="background-color: transparent; cursor: default; resize: none;"></textarea>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>