<?php
// ***************************************************************************
// **                                                                       **
// ** Email : fortunate@fortunateshop.com                                   **
// ** Website : www.fortunateshop.com                                       **
// ** Copyright (c) Taniwan. All Rights Reserved                            **
// **                                                                       **
// ***************************************************************************
// **                                                                       **
// ** This software is furnished under a license and may be used and copied **
// ** only  in  accordance  with  the  terms  of such  license and with the **
// ** inclusion of the above copyright notice.                              **
// **                                                                       **
// ***************************************************************************
_auth();
$ui->assign('_sysfrm_menu', 'contacts');
$ui->assign('_st', $_L['Search']);
$ui->assign('_title', $_L['Accounts'].'- '. $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('ncomp',$_SESSION['ncomp']);
switch ($action) {
    case 'ps':
		$type = _post('stype');
		$name = _post('txtsearch');

		if($type=='Komposisi')
			$d = ORM::for_table('sys_items')->where('type','Product')->where_like('name',"%$name%")->order_by_asc('name');
		else
			if($type == 'Product')
				$d = ORM::for_table('sys_barang')->raw_query("SELECT * FROM sys_barang where type='$type' and (name like '%$name%' or code like '%$name%' or equip_no like '%$name%' or draw_no like '%$name%' or pci_no like '%$name%') order by code desc")->find_many();
			else
				$d = ORM::for_table('sys_barang')->where('type',$type)->where_like('name',"%$name%")->order_by_asc('name')->find_many();

		$e = $d->find_many();
		$f = $d->count();
		if($f > 0){
			echo '<table class="table table-hover">
				<thead>
				<tr>';
				if ($type=='Product') {
					echo '<th width="15%">#SMC PN</th>
					<th width="15%">Part No</th>
					<th width="25%">Part Name</th>
					<th width="15%">DWG No</th>
					<th width="15%">Equip No</th>
					<th width="15%" class="text-right">Manage</th>';
				} elseif($type == 'Service') {
					echo '<th width="25%">#Equip No</th>
					<th width="35%">Equip Name</th>
					<th width="25%">Plant</th>
					<th width="15%" class="text-right">Manage</th>';
				}
				echo '</tr>
				</thead>
				<tbody>';

			foreach ($e as $ds){
				
				if($type=='Komposisi')
					$price = number_format($ds['target'],2,$config['dec_point'],$config['thousands_sep']);
				else {
					$price = number_format($ds['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
					$querystock=ORM::for_table('sys_stock')->where('code',$ds['code'])->sum(item_number);
				}
				if($type == 'Product') {
					echo ' <tr>
					<td><a href="#" class="cedit"  id="t'.$ds['id'].'" name="'. $type .'">'.$ds['code'].'</a></td>
					<td>'.$ds['no_part'].'</td>
					<td>'.$ds['name'].'</td>
					<td>'.$ds['draw_no'].'</td>
					<td>'.$ds['equip_no'].'</td>
					<td class="project-actions" align="right">
						<a href="'.$_url.'?ng=ps/edit-form" class="btn btn-primary btn-sm cedit" id="e'.$ds['id'].'" name="'. $type .'"><i class="fa fa-pencil"></i> '.$_L['Edit'].' </a>
						<a href="#" class="btn btn-danger btn-sm cdelete" id="pid'.$ds['id'].'" name="'. $type .'"><i class="fa fa-trash"></i> '.$_L['Delete'].' </a>
					</td>
					</tr>';
				} elseif($type == 'Service') {
					echo ' <tr>
					<td><a href="#" class="cedit"  id="t'.$ds['id'].'" name="'. $type .'">'.$ds['code'].'</a></td>
					<td>'.$ds['name'].'</td>
					<td>'.$ds['description'].'</td>
					<td class="project-actions" align="right">
						<a href="'.$_url.'?ng=ps/edit-form" class="btn btn-primary btn-sm cedit" id="e'.$ds['id'].'" name="'. $type .'"><i class="fa fa-pencil"></i> '.$_L['Edit'].' </a>
						<a href="#" class="btn btn-danger btn-sm cdelete" id="pid'.$ds['id'].'" name="'. $type .'"><i class="fa fa-trash"></i> '.$_L['Delete'].' </a>
					</td>
					</tr>';
				}
			}
			echo '</tbody>
			</table>';
		}
		else{
			echo '<h4>Nothing Found</h4>';
		}

	break;

    case 'kemasan':
	$type = _post('stype');
	$name = _post('txtsearch');

	$d = ORM::for_table('sys_barang')->where('type',$type)->where_like('name',"%$name%")->order_by_asc('name')->find_many();

	if($d){
		echo '<table class="table table-hover">
			<tbody>';


    foreach ($d as $ds){
		$price = number_format($ds['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
		$querystock=ORM::for_table('sys_stock')->where('code',$ds['code'])->sum(item_number);
        echo ' <tr>

                <td class="project-title" width="70%">
                    <a href="#" class="cedit"  id="t'.$ds['id'].'" name="'. $type .'">'.$ds['code'].' - '.$ds['name'].'</a>
                    <br>';
					if($type<>'Komposisi')
						if(!$querystock)
							echo '<small>Stock : <b>TIDAK ADA STOCK</b></small>';
						else
							echo '<small>Stock : <b>'.$querystock.' '.$ds['unit'].'</b></small>';
                echo '</td>
                <td align="right">Harga Beli : ';

                   echo $price;

                echo '</td>

                <td class="project-actions" align="right">

                    <a href="'.$_url.'?ng=ps/edit-form" class="btn btn-primary btn-sm cedit" id="e'.$ds['id'].'" name="'. $type .'"><i class="fa fa-pencil"></i> '.$_L['Edit'].' </a>
                    <a href="#" class="btn btn-danger btn-sm cdelete" id="pid'.$ds['id'].'" name="'. $type .'"><i class="fa fa-trash"></i> '.$_L['Delete'].' </a>
                </td>
            </tr>';
    }


    echo '
        </tbody>
    </table>';
}
else{
    echo '<h4>Nothing Found</h4>';
}

        break;

    case 'users':
echo '<table class="table table-bordered table-hover trclickable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Access Level</th>
                    <th>Active</th>
                </tr>
                </thead>
                <tbody>
                <tr id="_tr120">
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" data-on-text="Yes">
                                <label class="onoffswitch-label" for="fixednavbar">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div></td>
                </tr>

                </tbody>
            </table>';
        break;

    default:
        echo 'action not defined';
}