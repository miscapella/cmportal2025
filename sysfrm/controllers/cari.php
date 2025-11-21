<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
_auth();
$ui->assign('_sysfrm_menu', 'search');
$ui->assign('_st', 'Cari Transaksi');
$ui->assign('_title', 'Cari Transaksi - ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);


switch ($action) {
    case 'list':

        Event::trigger('cari/list/');
		_auth1('SEARCH',$user['id']);

        $ui->assign('xfooter', Asset::js(array('numeric','list-cari')));
        $paginator = Paginator1::bootstrap('sys_invoices','ORM::for_table(\'sys_invoiceitems\')->table_alias(\'a\')->select(\'a.*\')->select(\'b.*\')->join(\'sys_invoices\',array(\'a.invoiceid\',\'=\',\'b.id\'),\'b\')->order_by_desc(\'b.date_pr\')->count()');
        $d = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.*')->join('sys_invoices',array('a.invoiceid','=','b.id'),'b')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('b.date_pr')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
		$(".filter").hide();
 ');
        $ui->display('list-cari.tpl');
        break;
    
    case 'modal-cari':
		$kata = _post('kata');
		$_url = _post('_url');
		if($kata <> '') {
			$d1 = ORM::for_table('sys_invoiceitems')->table_alias('a')->select('a.*')->select('b.*')->select('c.manufacture')->select('c.pci_no')->join('sys_invoices',array('a.invoiceid','=','b.id'),'b')->join('sys_barang',array('a.code','=','c.code'),'c')->where_raw('(a.code like ? or c.manufacture like ? or c.pci_no like ?)',array("%$kata%","%$kata%","%$kata%"))->order_by_desc('b.date_pr');
			$e = $d1->find_many();
			$f = $d1->count();
			echo '<table class="table table-bordered table-hover sys_table" id="items_table" style="white-space: nowrap;">
					<thead>
					<tr>
						<th>Code</th>
						<th>Tgl Cust PR</th>
						<th>No Cust PR</th>
						<th>Tgl Supp PR</th>
						<th>No Supp PR</th>
						<th>Tgl Supp QT</th>
						<th>No SUPP QT</th>
						<th>Tgl Cust QT</th>
						<th>No Cust QT</th>
						<th>Tgl Cust PO</th>
						<th>No Cust PO</th>
						<th>Tgl Supp PO</th>
						<th>No Supp PO</th>
					</tr>
					</thead>
					<tbody>';
			if($f > 0){
				foreach($e as $ds1){
					echo '<tr id="hasil-cari">
						<td>'.$ds1['code'].'</td>
						<td>'.($ds1['date_pr'] == null ? '' : date( $_c['df'], strtotime($ds1['date_pr']))).'</td>
						<td><a href="'.$_url.'custpr/view/'.$ds1['id'].'" target="_blank">'.$ds1['custprnum'].'</a></td>
						<td>'.($ds1['date_supppr'] == null ? '' : date( $_c['df'], strtotime($ds1['date_supppr']))).'</td>
						<td><a href="'.$_url.'supppr/view/'.$ds1['id'].'" target="_blank">'.$ds1['suppprnum'].'</td>
						<td>'.($ds1['date_suppqt'] == null ? '' : date( $_c['df'], strtotime($ds1['date_suppqt']))).'</td>
						<td><a href="'.$_url.'suppqt/view/'.$ds1['id'].'" target="_blank">'.$ds1['suppqtnum'].'</td>
						<td>'.($ds1['date_qt'] == null || $ds1['date_qt'] == '' ? '' : date( $_c['df'], strtotime($ds1['date_qt']))).'</td>
						<td><a href="'.$_url.'custqt/view/'.$ds1['id'].'" target="_blank">'.$ds1['custqtnum'].'</td>
						<td>'.($ds1['date_po'] == null ? '' : date( $_c['df'], strtotime($ds1['date_po']))).'</td>
						<td><a href="'.$_url.'custpo/view/'.$ds1['id'].'" target="_blank">'.$ds1['custponum'].'</td>
						<td>'.($ds1['date_supppo'] == null ? '' : date( $_c['df'], strtotime($ds1['date_supppo']))).'</td>
						<td><a href="'.$_url.'supppo/view/'.$ds1['id'].'" target="_blank">'.$ds1['suppponum'].'</td>
					</tr>';
				}
				echo '</tbody></table>';
			}
			else {
				echo '<tr>
						<td colspan="12"><b>Tidak ada data</b></td>
					</tr>';
			}
		}
	break;

    default:
        echo 'action not defined';
}