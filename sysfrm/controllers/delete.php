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
$ui->assign('_sysfrm_menu', 'accounts');
$ui->assign('_title', $_L['Delete'] . '- ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
switch ($action) {

	case 'crm-user':
		_auth1('CUSTOMER-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		$e = ORM::for_table('sys_invoices')->where('userid', $id)->count();
		if ($e <= 0) {
			$d = ORM::for_table('crm_accounts')->find_one($id);
			if ($d) {
				//delete all activity
				$savename = $d['account'];
				$x = ORM::for_table('sys_activity')->where('cid', $id)->delete_many();
				$x = ORM::for_table('sys_invoices')->where('userid', $id)->find_many();
				foreach ($x as $item) {
					$m = ORM::for_table('sys_purchase')->where('suppprnum', $item['suppprnum'])->find_many();
					foreach ($m as $item1) {
						$z = ORM::for_table('sys_purchaseitems')->where('invoiceid', $item['id'])->delete_many();
						$z = ORM::for_table('sys_purchaseorder')->where('invoiceid', $item['id'])->delete_many();
						if (file_exists('uploads/supppo/' . $item['attachment_order']))
							unlink('uploads/supppo/' . $item['attachment_order']);
					}
					$m->delete();
					$n = ORM::for_table('sys_invoiceitems')->where('invoiceid', $item['id'])->delete_many();
					$n = ORM::for_table('sys_invoiceorder')->where('invoiceid', $item['id'])->delete_many();
					if (file_exists('uploads/custpo/' . $item['attach_custpr']))
						unlink('uploads/custpo/' . $item['attach_custpr']);
					if (file_exists('uploads/supppo/' . $item['attach_supppr']))
						unlink('uploads/supppo/' . $item['attach_supppr']);
					if (file_exists('uploads/supppo/' . $item['attach_suppqt']))
						unlink('uploads/supppo/' . $item['attach_suppqt']);
					if (file_exists('uploads/supppo/' . $item['attach_suppqt1']))
						unlink('uploads/supppo/' . $item['attach_suppqt1']);
					if (file_exists('uploads/supppo/' . $item['attach_suppqt2']))
						unlink('uploads/supppo/' . $item['attach_suppqt2']);
					if (file_exists('uploads/supppo/' . $item['attach_suppqt3']))
						unlink('uploads/supppo/' . $item['attach_suppqt3']);
					if (file_exists('uploads/supppo/' . $item['attach_suppqt4']))
						unlink('uploads/supppo/' . $item['attach_suppqt4']);
					if (file_exists('uploads/custpo/' . $item['attach_custqt']))
						unlink('uploads/custpo/' . $item['attach_custqt']);
					if (file_exists('uploads/custpo/' . $item['attach_custqt1']))
						unlink('uploads/custpo/' . $item['attach_custqt1']);
					if (file_exists('uploads/custpo/' . $item['attach_custqt2']))
						unlink('uploads/custpo/' . $item['attach_custqt2']);
					if (file_exists('uploads/custpo/' . $item['attach_custqt3']))
						unlink('uploads/custpo/' . $item['attach_custqt3']);
					if (file_exists('uploads/custpo/' . $item['attach_custqt4']))
						unlink('uploads/custpo/' . $item['attach_custqt4']);
					if (file_exists('uploads/custpo/' . $item['attach_custpo']))
						unlink('uploads/custpo/' . $item['attach_custpo']);
					if (file_exists('uploads/supppo/' . $item['attach_supppo']))
						unlink('uploads/supppo/' . $item['attach_supppo']);
					if (file_exists('uploads/supppo/' . $item['attach_draw']))
						unlink('uploads/supppo/' . $item['attach_draw']);
				}
				$x->delete();
				#todo update payer and payee
				$d->delete();
				_log1('Customer Deleted : ' . $savename, $user['username'], $user['id']);
				r2(U . 'contacts/list', 's', $_L['Contact Deleted Successfully']);
			} else {
				r2(U . 'contacts/list', 'e', 'Customer not found');
			}
		} else {
			r2(U . 'contacts/list', 'e', 'Customer tersebut telah ada transaksi');
		}
		break;

	case 'supp-user':
		_auth1('SUPPLIER-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		$e = ORM::for_table('sys_purchase')->where('userid', $id)->count();
		if ($e <= 0) {
			$d = ORM::for_table('crm_accounts')->find_one($id);
			if ($d) {
				//delete all activity
				$savename = $d['account'];
				$x = ORM::for_table('sys_activity')->where('cid', $id)->delete_many();
				$x = ORM::for_table('sys_purchase')->where('userid', $id)->find_many();
				foreach ($x as $item) {
					$z = ORM::for_table('sys_purchaseitems')->where('invoiceid', $item['id'])->delete_many();
					$z = ORM::for_table('sys_purchaseorder')->where('invoiceid', $item['id'])->delete_many();
					if (file_exists('uploads/supppo/' . $item['attachment_order']))
						unlink('uploads/supppo/' . $item['attachment_order']);
				}
				$y = ORM::for_table('sys_purchase')->where('userid', $id)->delete_many();
				#todo update payer and payee
				$d->delete();
				_log1('Supplier Deleted : ' . $d['account'], $user['username'], $user['id']);
				r2(U . 'supplier/list', 's', 'Supplier berhasil di hapus');
			} else {
				r2(U . 'supplier/list', 'e', 'Supplier not found');
			}
		} else {
			r2(U . 'supplier/list', 'e', 'Supplier tersebut telah ada transaksi');
		}
		break;

	case 'company':
		_auth1('DELETE-COMPANY', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		if ($id <> $_SESSION['comp']) {
			$d = ORM::for_table('sys_company', 'dblogin')->find_one($id);
			if ($d) {
				$d->delete();
				_log('Compnay Deleted ' . $username, $user['username'], $user['id']);
				r2(U . 'company/list', 's', 'Berhasil menghapus Data Perusahaan');
			} else {
				echo 'Data Perusahaan tidak ditemukan';
			}
		} else {
			r2(U . 'company/list', 'e', 'Tidak dapat menghapus Data Perusahaan yang sedang Aktif');
		}
		break;

	case 'department':
		_auth1('DELETE-DEPARTMENT', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		$d = ORM::for_table('daftar_department', 'dblogin')->find_one($id);
		if ($d) {
			$d->delete();
			_log('Department Deleted ' . $username, $user['username'], $user['id']);
			r2(U . 'department/list', 's', 'Berhasil menghapus Data Department');
		} else {
			echo 'Data Department tidak ditemukan';
		}
		break;

	case 'ruangan':
		_auth1('DELETE-RUANGAN', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		$d = ORM::for_table('daftar_ruangan', 'dblogin')->find_one($id);
		if ($d) {
			$d->delete();
			_log('Ruangan Deleted ' . $username, $user['username'], $user['id']);
			r2(U . 'ruangan/list', 's', 'Berhasil menghapus Data Ruangan');
		} else {
			echo 'Data Ruangan tidak ditemukan';
		}
		break;

	case 'inventaris':
		_auth1('INVEN-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		if ($id <> $_SESSION['comp']) {
			$d = ORM::for_table('inventaris_mobil')->find_one($id);
			if ($d) {
				$d->delete();
				_log('Compnay Deleted ' . $username, $user['username'], $user['id']);
				r2(U . 'inventaris/list', 's', 'Berhasil menghapus Inventaris Mobil');
			} else {
				echo 'Data Perusahaan tidak ditemukan';
			}
		} else {
			r2(U . 'inventaris/list', 'e', 'Tidak dapat menghapus Data Mobil Inventaris');
		}
		break;



	case 'otoritas':
		_auth1('DELETE-OTORITAS', $user['id']);
		$id = $routes['2'];
		$id = str_replace('uid', '', $id);
		$d = ORM::for_table('daftar_otoritas', 'dblogin')->find_one($id);
		if ($d) {
			$d->delete();
			_log('Otoritas Deleted ' . $username, $user['username'], $user['id']);
			r2(U . 'settings/otoritas', 's', 'Berhasil menghapus Otoritas');
		} else {
			echo 'Otoritas tidak ditemukan';
		}

		break;

	case 'otoritas-group':
		_auth1('DELETE-GROUP-OTORITAS', $user['id']);
		$kode_group = $routes['2'];
		$kode_group = str_replace('uid', '', $kode_group);

		$d = ORM::for_table('sys_group', 'dblogin')->where('kode_group', $kode_group)->find_many();

		if ($d) {
			foreach ($d as $item) {
				$item->delete();
			}
			_log('Otoritas Group Deleted ' . $username, $user['username'], $user['id']);
			r2(U . 'settings/otoritas-group', 's', 'Berhasil menghapus Otoritas Group');
		} else {
			echo 'Otoritas Group tidak ditemukan';
		}

		break;

	case 'ps':
		$id = $routes['2'];
		$type = $routes['3'];
		$id = str_replace('pid', '', $id);
		if ($type == 'Komposisi')
			$d = ORM::for_table('sys_items')->find_one($id);
		else {
			if ($type == 'Product')
				_auth1('PART-DEL', $user['id']);
			else
				_auth1('EQUIPMENT-DEL', $user['id']);

			$d = ORM::for_table('sys_barang')->find_one($id);
		}

		if ($d) {
			//hapus detail
			if ($type == 'Komposisi')
				$x = ORM::for_table('sys_items_detail')->where('id', $d['id'])->delete_many();

			//hapus master
			if (file_exists('uploads/drawing/' . $d['gambar']))
				unlink('uploads/drawing/' . $d['gambar']);
			//        $type = $d['type'];
			$r = 'ps/s-list';
			if ($type == 'Product') {
				$r = 'ps/b-list';
			}
			if ($type == 'Komposisi') {
				$r = 'ps/p-list';
			}
			_log1($type . ' Deleted : ' . $d['name'] . ' [ID: ' . $d['id'] . ']', $user['username'], $user['id']);

			$d->delete();

			r2(U . $r, 's', $type . ' ' . $_L['Deleted Successfully']);
		} else {
			echo 'not found';
		}
		break;

	case 'prod':
		$id = $routes['2'];
		$id = str_replace('pid', '', $id);
		try {
			$d = ORM::for_table('sys_prod')->find_one($id);

			if ($d) {
				if ($d['status'] == 'Open') {
					$x = ORM::for_table('sys_prod_detail')->where('batch_number', $d['batch_number'])->find_many();
					foreach ($x as $item) {
						$qty = $item['qty'];
						$e = ORM::for_table('sys_stock')->where('code', $item['code'])->where('batch_number', $item['batch'])->find_one();
						echo "<script>alert('mau msk')</script>";
						if ($e) {
							echo "<script>alert('$qty')</script>";
							$cqty = $e['item_number'] + $qty;
							$e->item_number = $cqty;
							$e->save();
						}
						$z = ORM::for_table('sys_barang')->where('code', $item['code'])->find_one();
						if ($z) {
							$cqty = $z['item_number'] + $qty;
							$z->item_number = $cqty;
							$z->save();
						}
						$i++;
					}
					$y = ORM::for_table('sys_prod_detail')->where('batch_number', $d['batch_number'])->delete_many();
					//hapus master
					$d->delete();
					$r = 'prod/list';
					_log($type . ' Deleted: ' . $d['batch_number'], 'Admin', $user['id']);


					r2(U . $r, 's', $type . ' ' . $_L['Deleted Successfully']);
				} else
					r2(U . 'prod/list', 'e', ' Status bukan Open, tidah dapat di hapus');
			} else {
				echo 'not found';
			}
		} catch (PDOException $ex) {
			ORM::get_db()->rollBack();
			throw $ex;
		}

		break;

	case 'purchase':
		// $id = $routes['2'];
		// $id = str_replace('iid','',$id);
		// $d = ORM::for_table('sys_purchase')->find_one($id);
		// if($d){
		////delete all invoice items
		// $x = ORM::for_table('sys_purchaseitems')->where('invoiceid',$id)->delete_many();

		// $d->delete();
		// _log1('Purchase ID Deleted : '.$id,$user['username'],$user['id']);
		// r2(U.'purchase/list','s',$_L['Invoice Deleted Successfully']);

		// }
		// else{
		// echo 'Invoice not found';
		// }
		break;

	case 'invoice':
		// $id = $routes['2'];
		// $id = str_replace('iid','',$id);
		// $d = ORM::for_table('sys_invoices')->find_one($id);
		// if($d){
		////delete all invoice items
		// $a = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->find_many();
		// foreach ($a as $acs) {
		////kembalikan stock di tabel sys_stock
		// $z = ORM::for_table('sys_stock')->where('code',$acs['itemcode'])->where('batch_number',$acs['batch_number'])->find_one();
		// if($z) {
		// $cqty = $z['item_number'] + $acs['qty'];
		// $z->item_number = $cqty;
		// $z->save();
		// }
		// }
		// $x = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->delete_many();

		// $d->delete();
		// r2(U.'invoices/list','s',$_L['Invoice Deleted Successfully']);

		// }
		// else{
		// echo 'Invoice not found';
		// }
		break;

	case 'quote':
		// $id = $routes['2'];
		// $id = str_replace('iid','',$id);
		// $d = ORM::for_table('sys_quotes')->find_one($id);
		// if($d){
		////delete all invoice items
		// $x = ORM::for_table('sys_quoteitems')->where('qid',$id)->delete_many();

		// $d->delete();
		// r2(U.'quotes/list/','s',$_L['Quote Deleted Successfully']);

		// }
		// else{
		// echo 'Invoice not found';
		// }
		break;

	case 'tags':
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_tags')->find_one($id);
		if ($d) {
			//delete all invoice items


			$d->delete();
			r2(U . 'settings/tags', 's', $_L['Tag Deleted Successfully']);
		} else {
			echo 'Invoice not found';
		}
		break;

	case 'tax':
		$id = $routes['2'];
		$id = str_replace('t', '', $id);
		$d = ORM::for_table('sys_tax')->find_one($id);
		if ($d) {

			$d->delete();
			r2(U . 'tax/list/', 's', $_L['TAX Deleted Successfully']);
		} else {
			echo 'TAX not found';
		}
		break;


	case 'customfield':

		$id = $routes[2];
		$id = str_replace('d', '', $id);

		$d = ORM::for_table('crm_customfields')->find_one($id);
		if ($d) {

			$d->delete();
			r2(U . 'settings/customfields/', 's', $_L['Custom Field Deleted Successfully']);
		} else {
			echo 'Custom Field Not found';
		}

		break;

	case 'custpr':
		_auth1('CUSTPR-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if ($d) {
			if ($d['progress'] == 1) {
				//hapus master
				if (file_exists('uploads/custpo/' . $d['attach_custpr']))
					unlink('uploads/custpo/' . $d['attach_custpr']);
				//        $type = $d['type'];
				$x = ORM::for_table('sys_invoices')->where('id', $id)->delete_many();
				$x = ORM::for_table('sys_invoiceitems')->where('invoiceid', $id)->delete_many();
				_log1('Deleted Customer Purchase : ' . $d['custprnum'], $user['username'], $user['id']);

				$d->delete();

				r2(U . 'custpr/list', 's', $type . ' ' . $_L['Deleted Successfully']);
			} else {
				r2(U . 'custpr/list', 'e', 'Telah ada transaksi');
			}
		} else {
			r2(U . 'custpr/list', 'e', 'Not Found');
		}
		break;

	case 'supppr':
		_auth1('SUPPPR-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if ($d) {
			if ($d['progress'] <= 5) {
				try {
					ORM::get_db()->beginTransaction();
					$savnum = $d['suppprnum'];
					if (file_exists('uploads/supppo/' . $d['attach_supppr']))
						unlink('uploads/supppo/' . $d['attach_supppr']);
					//hapus master
					$d->suppprnum = '';
					$d->progress = 4;
					$d->date_supppr = null;
					$d->attach_supppr = '';
					$d->save();
					//hapus tabel purchase
					$x = ORM::for_table('sys_purchase')->where('invoicenum', $savnum)->find_one();
					if ($x) {
						//hapus tabel purchaseitems
						$x = ORM::for_table('sys_purchaseitems')->where('invoiceid', $x['id'])->delete_many();
					}
					$x = ORM::for_table('sys_purchase')->where('invoicenum', $savnum)->delete_many();

					ORM::get_db()->commit();
					_log('Deleted Supplier Purchase: ' . $savnum, $user['username'], $user['id']);
					r2(U . 'supppr/list', 's', $type . ' ' . $_L['Deleted Successfully']);
				} catch (PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else {
				r2(U . 'supppr/list', 'e', 'Telah ada transaksi');
			}
		} else {
			r2(U . 'supppr/list', 'e', 'Not Found');
		}
		break;

	case 'suppqt':
		_auth1('SUPPQT-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if ($d) {
			if ($d['progress'] <= 8) {
				try {
					ORM::get_db()->beginTransaction();
					$savnum = $d['suppprnum'];
					if (file_exists('uploads/supppo/' . $d['attach_suppqt']))
						unlink('uploads/supppo/' . $d['attach_suppqt']);
					if (file_exists('uploads/supppo/' . $d['attach_suppqt1']))
						unlink('uploads/supppo/' . $d['attach_suppqt1']);
					if (file_exists('uploads/supppo/' . $d['attach_suppqt2']))
						unlink('uploads/supppo/' . $d['attach_suppqt2']);
					if (file_exists('uploads/supppo/' . $d['attach_suppqt3']))
						unlink('uploads/supppo/' . $d['attach_suppqt3']);
					if (file_exists('uploads/supppo/' . $d['attach_suppqt4']))
						unlink('uploads/supppo/' . $d['attach_suppqt4']);
					//hapus master
					$d->suppqtnum = '';
					$d->progress = 7;
					$d->date_suppqt = null;
					$d->attach_suppqt = '';
					$d->attach_suppqt1 = '';
					$d->attach_suppqt2 = '';
					$d->attach_suppqt3 = '';
					$d->attach_suppqt4 = '';
					$d->save();
					//hapus tabel purchase
					$e = ORM::for_table('sys_purchase')->where('invoicenum', $savnum)->find_one();
					$e->quotenum = '';
					$e->date_qt = null;
					$e->save();
					//$x = ORM::for_table('sys_purchaseitems')->where('invoiceid',$e['id'])->delete_many();
					ORM::get_db()->commit();
					_log1('Deleted Supplier QT: ' . $savnum, $user['username'], $user['id']);

					r2(U . 'suppqt/list', 's', $type . ' ' . $_L['Deleted Successfully']);
				} catch (PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else {
				r2(U . 'suppqt/list', 'e', 'Telah ada transaksi');
			}
		} else {
			r2(U . 'suppqt/list', 'e', 'Not Found');
		}
		break;

	case 'custqt':
		_auth1('CUSTQT-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if ($d) {
			if ($d['progress'] <= 11) {
				try {
					ORM::get_db()->beginTransaction();
					$savnum = $d['custqtnum'];
					//hapus master
					//$x = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->delete_many();
					if (file_exists('uploads/custpo/' . $d['attach_custqt']))
						unlink('uploads/custpo/' . $d['attach_custqt']);
					if (file_exists('uploads/custpo/' . $d['attach_custqt1']))
						unlink('uploads/custpo/' . $d['attach_custqt1']);
					if (file_exists('uploads/custpo/' . $d['attach_custqt2']))
						unlink('uploads/custpo/' . $d['attach_custqt2']);
					if (file_exists('uploads/custpo/' . $d['attach_custqt3']))
						unlink('uploads/custpo/' . $d['attach_custqt3']);
					if (file_exists('uploads/custpo/' . $d['attach_custqt4']))
						unlink('uploads/custpo/' . $d['attach_custqt4']);
					$d->custqtnum = '';
					$d->progress = 10;
					$d->date_qt = null;
					$d->attach_custqt = '';
					$d->attach_custqt1 = '';
					$d->attach_custqt2 = '';
					$d->attach_custqt3 = '';
					$d->attach_custqt4 = '';
					$d->save();

					ORM::get_db()->commit();
					_log1('Deleted Customer QT: ' . $d['custqtnum'], $user['username'], $user['id']);

					//$y->delete();

					r2(U . 'custqt/list', 's', $type . ' ' . $_L['Deleted Successfully']);
				} catch (PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else {
				r2(U . 'custqt/list', 'e', 'Telah ada transaksi');
			}
		} else {
			r2(U . 'custqt/list', 'e', 'Not Found');
		}
		break;

	case 'custpo':
		_auth1('CUSTPO-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if ($d) {
			if ($d['progress'] <= 14) {
				try {
					ORM::get_db()->beginTransaction();
					//hapus master
					if (file_exists('uploads/custpo/' . $d['attach_custpo']))
						unlink('uploads/custpo/' . $d['attach_custpo']);
					$x = ORM::for_table('sys_invoiceorder')->where('invoiceid', $id)->delete_many();
					$d->custponum = '';
					$d->progress = 13;
					$d->date_po = null;
					$d->date_po_close = null;
					$d->attach_custpo = '';
					$d->save();
					ORM::get_db()->commit();
					_log1('Deleted Customer PO: ' . $d['custponum'], $user['username'], $user['id']);

					//$y->delete();

					r2(U . 'custpo/list', 's', $type . ' ' . $_L['Deleted Successfully']);
				} catch (PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else {
				r2(U . 'custpo/list', 'e', 'Telah ada transaksi');
			}
		} else {
			r2(U . 'custpo/list', 'e', 'Not Found');
		}
		break;

	case 'supppo':
		_auth1('SUPPPO-DEL', $user['id']);
		$id = $routes['2'];
		$id = str_replace('iid', '', $id);
		$d = ORM::for_table('sys_invoices')->find_one($id);

		if ($d) {
			if ($d['progress'] <= 17) {
				//hapus master
				try {
					ORM::get_db()->beginTransaction();
					if (file_exists('uploads/supppo/' . $d['attach_supppo']))
						unlink('uploads/supppo/' . $d['attach_supppo']);
					$d->suppponum = '';
					$d->progress = 16;
					$d->date_supppo = null;
					$d->attach_supppo = '';
					$d->save();
					$y = ORM::for_table('sys_purchase')->where('invoicenum', $d['suppprnum'])->find_one();
					if ($y) {
						$y->ordernum = '';
						$y->date_po = null;
						$y->subtotal = 0;
						$y->discount_value = 0;
						$y->save();
						$x = ORM::for_table('sys_purchaseorder')->where('invoiceid', $y['id'])->delete_many();
					}

					ORM::get_db()->commit();
					_log1('Deleted Supplier Order: ' . $d['suppponum'], $user['username'], $user['id']);

					//$y->delete();

					r2(U . 'supppo/list', 's', $type . ' ' . $_L['Deleted Successfully']);
				} catch (PDOException $ex) {
					ORM::get_db()->rollBack();
					throw $ex;
				}
			} else {
				r2(U . 'supppo/list', 'e', 'Telah ada transaksi');
			}
		} else {
			r2(U . 'supppo/list', 'e', 'Not Found');
		}
		break;

	case 'kode':
		$kode = $routes['2'];
		$d = ORM::for_table('sys_kode')->where('kode', $kode)->where('type', 'U')->delete_many();
		//$d = ORM::for_table('sys_kode')->find_one(array('kode' => $kode,'type' => 'U'));
		if ($d) {
			r2(U . 'kode/list/', 's', 'Kode End User telah berhasil dihapus');
		} else {
			echo 'Kode End User tidak ditemukan';
		}
		break;
	case 'plant':
		$kode = $routes['2'];
		$d = ORM::for_table('sys_kode')->where('kode', $kode)->where('type', 'P')->delete_many();
		//$d = ORM::for_table('sys_kode')->find_one(array('kode' => $kode,'type' => 'U'));
		if ($d) {
			r2(U . 'plant/list/', 's', 'Kode Plantation telah berhasil dihapus');
		} else {
			echo 'Kode Plantatiaon tidak ditemukan';
		}
		break;

	default:
		echo 'action not defined';
}
