<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:38
         compiled from "ui\theme\softhash\prog\KUBOTA\arcard-print.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17058171026358a5a6762d01-61887820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5867a30427048ecd430412f27f8391743768ebf4' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\arcard-print.tpl',
      1 => 1565164442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17058171026358a5a6762d01-61887820',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'e' => 0,
    '_c' => 0,
    '_L' => 0,
    'f' => 0,
    'd' => 0,
    'item' => 0,
    't_debp' => 0,
    't_debb' => 0,
    't_krep' => 0,
    't_kreb' => 0,
    't_lp' => 0,
    't_lb' => 0,
    'trs_c' => 0,
    'trs' => 0,
    'tr' => 0,
    'emls_c' => 0,
    'emls' => 0,
    'eml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a5a6857e42_29447904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a5a6857e42_29447904')) {function content_6358a5a6857e42_29447904($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row animated fadeInDown" style="width:100%;overflow:auto">
    <div class="col-lg-12" id="sysfrm_ajaxrender" style="width:150%">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h2>KARTU PIUTANG</h2>
                
            </div>
            <div class="ibox-content">

                <div class="invoice">
                    <header class="clearfix">
                        <div class="row">
                            <div class="col-sm-6 mt-md">
                                <h2 class="h2 mt-none mb-sm text-dark text-bold">No. Jual : <?php echo $_smarty_tpl->tpl_vars['e']->value['no_jual'];?>
</h2>
                            </div>
                            <div class="col-sm-6 text-right mt-md mb-md">
                                <address class="ib mr-xlg">
                                    <?php echo $_smarty_tpl->tpl_vars['_c']->value['caddress'];?>

                                </address>
                                <div class="ib">
                                    <img src="sysfrm/uploads/system/logo.png" alt="Logo">
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="bill-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bill-to">
                                    <p class="h5 mb-xs text-dark text-semibold"><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoiced To'];?>
:</strong></p>
                                    <address>
                                        <?php if ($_smarty_tpl->tpl_vars['f']->value['company']!=''){?>
                                            <?php echo $_smarty_tpl->tpl_vars['f']->value['company'];?>

                                            <br>
                                           <?php echo $_smarty_tpl->tpl_vars['_L']->value['ATTN'];?>
: <?php echo $_smarty_tpl->tpl_vars['f']->value['account'];?>

                                            <br>
                                            <?php }else{ ?>
                                            <?php echo $_smarty_tpl->tpl_vars['f']->value['account'];?>

                                            <br>
                                        <?php }?>

                                        <?php echo $_smarty_tpl->tpl_vars['f']->value['address'];?>
 <br>
                                        <?php echo $_smarty_tpl->tpl_vars['f']->value['city'];?>
 <br>
                                        <?php echo $_smarty_tpl->tpl_vars['f']->value['state'];?>
 - <?php echo $_smarty_tpl->tpl_vars['f']->value['zip'];?>
 <br>
                                        <?php echo $_smarty_tpl->tpl_vars['f']->value['country'];?>

                                        <br>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['f']->value['phone'];?>

                                        <br>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['f']->value['email'];?>

                                    </address>
                                </div>
								<p class="mb-none">
									<span class="text-dark">Type : </span>
									<span class="value"><?php echo $_smarty_tpl->tpl_vars['e']->value['type_mobil'];?>
</span>
								</p>
								<p class="mb-none">
									<span class="text-dark">Tahun Buat : </span>
									<span class="value"><?php echo $_smarty_tpl->tpl_vars['e']->value['thn_buat'];?>
</span>
								</p>
								<p class="mb-none">
									<span class="text-dark">Warna : </span>
									<span class="value"><?php echo $_smarty_tpl->tpl_vars['e']->value['warna'];?>
</span>
								</p>
                            </div>
                            <div class="col-md-6">
                                <div class="bill-data text-right">
									<p class="mb-none">
										<span class="text-dark">No. Bast : </span>
										<span class="value"><?php echo $_smarty_tpl->tpl_vars['e']->value['no_bast'];?>
</span>
									</p>
									<p class="mb-none">
										<span class="text-dark">No. Faktur : </span>
										<span class="value"><?php echo $_smarty_tpl->tpl_vars['e']->value['no_faktur'];?>
</span>
									</p>
                                    <p class="mb-none">
                                        <span class="text-dark" style="text-transform:uppercase"><b><?php echo $_smarty_tpl->tpl_vars['e']->value['cara'];?>
</b></span>
										<?php if ($_smarty_tpl->tpl_vars['e']->value['cara']=='kredit'){?>
											<span style="text-transform:uppercase"> : <?php echo $_smarty_tpl->tpl_vars['e']->value['lama'];?>
 bulan</span>
										<?php }?>
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark">Tanggal Bast:</span>
                                        <span class="value"><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['e']->value['tgl_cetakbast']));?>
</span>
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
 I:</span>
                                        <span class="value"><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['e']->value['tgl_jto']));?>
</span>
                                    </p>
									<br>
                                    <h2> Harga Kosong: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['e']->value['harga_kosong'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
 </h2>
									<h2> Biaya Surat: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['credit'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
 </h2>
									<h2> Discount: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['e']->value['discount'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
 </h2>
									<h2> Panjar: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['e']->value['panjar'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
 </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table invoice-items table-condensed table-bordered">
                            <thead>
                            <tr class="h5 text-dark">
                                <th id="cell-id" class="text-semibold">Tgl</th>
                                <th id="cell-item" class="text-semibold">Tgl Jto</th>
                                <th id="cell-item" class="text-semibold">Keterangan</th>
                                <th id="cell-price" class="text-center text-semibold">Angsuran</th>
                                <th id="cell-qty" class="text-right text-semibold">Debet Pokok</th>
                                <th id="cell-qty" class="text-right text-semibold">Debet Bunga</th>
                                <th id="cell-qty" class="text-right text-semibold">Kredit Pokok</th>
                                <th id="cell-qty" class="text-right text-semibold">Kredit Bunga</th>
                                <th id="cell-qty" class="text-right text-semibold">Lain Pokok</th>
                                <th id="cell-qty" class="text-right text-semibold">Lain Bunga</th>
                                <th id="cell-total" class="text-right text-semibold">Saldo Akhir Pokok</th>
                                <th id="cell-total" class="text-right text-semibold">Saldo Akhir Bunga</th>
                                <th id="cell-total" class="text-right text-semibold">Saldo Akhir</th>
                            </tr>
                            </thead>
                            <tbody>

							<?php $_smarty_tpl->tpl_vars["t_debp"] = new Smarty_variable(0, null, 0);?>
							<?php $_smarty_tpl->tpl_vars["t_debb"] = new Smarty_variable(0, null, 0);?>
							<?php $_smarty_tpl->tpl_vars["t_krep"] = new Smarty_variable(0, null, 0);?>
							<?php $_smarty_tpl->tpl_vars["t_kreb"] = new Smarty_variable(0, null, 0);?>
							<?php $_smarty_tpl->tpl_vars["t_lp"] = new Smarty_variable(0, null, 0);?>
							<?php $_smarty_tpl->tpl_vars["t_lb"] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <tr>
                                    <td class="text-semibold text-dark"><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['item']->value['tgl']));?>
</td>
                                    <td class="text-semibold text-dark"><?php if ($_smarty_tpl->tpl_vars['item']->value['tgl_jto']!=null){?><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['item']->value['tgl_jto']));?>
<?php }?></td>
                                    <td class="text-semibold text-dark"><?php echo $_smarty_tpl->tpl_vars['item']->value['keterangan'];?>
</td>
                                    <td class="text-right"><?php if ($_smarty_tpl->tpl_vars['item']->value['angs_ke']!=0){?><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['angsuran'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
<?php }?></td>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['debet_pokok'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
									<?php if ($_smarty_tpl->tpl_vars['item']->value['byr_denda']>0){?>
										<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['debet_bunga']+$_smarty_tpl->tpl_vars['item']->value['byr_denda'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
									<?php }else{ ?>
										<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['debet_bunga'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
									<?php }?>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['kredit_pokok'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['kredit_bunga'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['lain_pokok'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
									<?php if ($_smarty_tpl->tpl_vars['item']->value['byr_denda']>0){?>
										<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['lain_bunga']+$_smarty_tpl->tpl_vars['item']->value['byr_denda'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
									<?php }else{ ?>
										<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['lain_bunga'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
									<?php }?>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['akhir_pokok'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['akhir_bunga'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['akhir_pokok']+$_smarty_tpl->tpl_vars['item']->value['akhir_bunga'],0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                </tr>
								<?php $_smarty_tpl->tpl_vars["t_debp"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_debp']->value+$_smarty_tpl->tpl_vars['item']->value['debet_pokok'], null, 0);?>
								<?php $_smarty_tpl->tpl_vars["t_debb"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_debb']->value+$_smarty_tpl->tpl_vars['item']->value['debet_bunga']+$_smarty_tpl->tpl_vars['item']->value['byr_denda'], null, 0);?>
								<?php $_smarty_tpl->tpl_vars["t_krep"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_krep']->value+$_smarty_tpl->tpl_vars['item']->value['kredit_pokok'], null, 0);?>
								<?php $_smarty_tpl->tpl_vars["t_kreb"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_kreb']->value+$_smarty_tpl->tpl_vars['item']->value['kredit_bunga'], null, 0);?>
								<?php $_smarty_tpl->tpl_vars["t_lp"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_lp']->value+$_smarty_tpl->tpl_vars['item']->value['lain_pokok'], null, 0);?>
								<?php $_smarty_tpl->tpl_vars["t_lb"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_lb']->value+$_smarty_tpl->tpl_vars['item']->value['lain_bunga']+$_smarty_tpl->tpl_vars['item']->value['byr_denda'], null, 0);?>
                            <?php } ?>
							<tr>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
								<td class="text-center">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4" class="text-center" style="background-color:#e6e6e6"><b>Grand Total</b></td>
								<td class="text-right" style="background-color:#e6e6e6"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['t_debp']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
								<td class="text-right" style="background-color:#e6e6e6"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['t_debb']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
								<td class="text-right" style="background-color:#e6e6e6"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['t_krep']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
								<td class="text-right" style="background-color:#e6e6e6"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['t_kreb']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
								<td class="text-right" style="background-color:#e6e6e6"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['t_lp']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
								<td class="text-right" style="background-color:#e6e6e6"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['t_lb']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
								<td colspan="3" class="text-center" style="background-color:#e6e6e6">&nbsp;</td>
							</tr>

                            </tbody>
                        </table>
                    </div>
                </div>

   <?php if (($_smarty_tpl->tpl_vars['trs_c']->value!='')){?>
       <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Related Transactions'];?>
</h3>
       <table class="table table-bordered sys_table">
           <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
           <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>


           <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

           <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>




           <?php  $_smarty_tpl->tpl_vars['tr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['trs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tr']->key => $_smarty_tpl->tpl_vars['tr']->value){
$_smarty_tpl->tpl_vars['tr']->_loop = true;
?>
               <tr class="<?php if ($_smarty_tpl->tpl_vars['tr']->value['cr']=='0.00'){?>warning <?php }else{ ?>info<?php }?>">
                   <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['tr']->value['date']));?>
</td>
                   <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['account'];?>
</td>


                   <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['tr']->value['amount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                   <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['description'];?>
</td>




               </tr>
           <?php } ?>



       </table>
   <?php }?>

                <?php if (($_smarty_tpl->tpl_vars['d']->value['notes'])!=''){?>
                    <div class="well m-t">
                        <?php echo $_smarty_tpl->tpl_vars['d']->value['notes'];?>

                    </div>
                <?php }?>

                <?php if (($_smarty_tpl->tpl_vars['emls_c']->value!='')){?>
                    <hr>
                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Related Emails'];?>
</h3>
                    <table class="table table-bordered sys_table">
                        <th width="20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</th>







                        <?php  $_smarty_tpl->tpl_vars['eml'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eml']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eml']->key => $_smarty_tpl->tpl_vars['eml']->value){
$_smarty_tpl->tpl_vars['eml']->_loop = true;
?>
                            <tr>
                                <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['eml']->value['date']));?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['eml']->value['subject'];?>
</td>
                            </tr>
                        <?php } ?>



                    </table>
                <?php }?>



            </div>


        </div>
    </div>
</div>

<input type="hidden" id="_lan_msg_confirm" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">


<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>