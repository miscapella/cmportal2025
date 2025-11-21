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

if (!isset($myCtrl)) {
    $myCtrl = 'Form';
}
_auth();
$ui->assign('_sysfrm_menu', 'form');
$ui->assign('_title', 'Form - ' . $config['CompanyName']);
$ui->assign('_st', 'Form');
$ui->assign('ncomp', $_SESSION['ncomp']);
$action = $routes['2'];
$user = User::_info();
$nama_user = $user["fullname"];
$ui->assign('user', $user);
$spath = 'prog/' . $_SESSION['menu'] . '/';

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');

function pushApproval(&$approvekey, &$rejectkey, &$commentkey, &$approvedate, &$approvestatus, &$approvecomment, &$target, &$temp_target, &$current, $uid)
{
    if (is_numeric($temp_target)) {
        $current = (int)$temp_target;
    } else {
        array_push($approvekey, generateRandomString(24));
        array_push($rejectkey, generateRandomString(24));
        array_push($commentkey, generateRandomString(24));
        array_push($approvedate, 'NULL');
        array_push($approvestatus, 'In Progress');
        array_push($approvecomment, 'NULL');
        if ($temp_target == 'supervisor') {
            $x = ORM::for_table('sys_users', 'dblogin')->find_one($uid);
            array_push($target, $x['supervisor']);
        } else if ($temp_target == 'manager') {
            $x = ORM::for_table('sys_users', 'dblogin')->find_one($uid);
            $y = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', $x['kode_dept'])->find_one();
            array_push($target, $y['atasan']);
        } else array_push($target, $temp_target);
    }
}

switch ($action) {
    case 'list':
        Event::trigger('form/list/');
        _auth1('FORM-LIST', $user['id']);
        $msg = $routes['3'];
        $ui->assign('msg', $msg);
        $ui->assign('_sysfrm_menu1', 'listform');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
 ');
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-form', 'numeric')));
        $ui->display($spath . 'list-form.tpl');
        break;

    case 'add':
        Event::trigger('form/add/');
        _auth1('FORM-ADD', $user['id']);
        $clist = '';
        $clist .= '<option value="">Choose Data Type</option>';
        $clist .= '<option value="string">STRING</option>';
        $clist .= '<option value="datetime">DATETIME</option>';
        $clist .= '<option value="date">DATE</option>';
        $clist .= '<option value="statement">STATEMENT</option>';
        $clist .= '<option value="time">TIME</option>';
        $clist .= '<option value="file">FILE</option>';
        $clist .= '<option value="14harikerja">14 HARI KERJA</option>';
        if ($user['user_type'] == 'Admin') {
            $tg = ORM::for_table('daftar_datatype')->where('status', 'AKTIF')->find_many();
        } else {
            $dept = '%:' . $user['kode_dept'];
            $tg = ORM::for_table('daftar_datatype')->where('status', 'AKTIF')->where_like('kode', $dept)->find_many();
        }
        foreach ($tg as $r) {
            $clist .= '<option value="' . $r['kode'] . '">' . $r['kode'] . ' - ' . $r['nama'] . '</option>';
        }
        $ui->assign('opt_tipe', $clist);
        $ui->assign('_sysfrm_menu1', 'listform');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-form', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
        $ui->display($spath . 'add-form.tpl');
        break;

    case 'add-post':
        Event::trigger('form/add-post/');

        $section_title = explode(',', _post('section_title'));
        $section_description = explode(',', _post('section_description'));
        $question = explode(',', _post('question'));
        $question_description = explode(',', _post('question_description'));
        $tipe = explode(',', _post('tipe'));
        $question_section = explode(',', _post('question_section'));
        $msg = '';
        $msg_title = '';
        $i = 0;
        $ii = 0;
        foreach ($section_title as $code) {
            if ($section_title[$i] == '')    $msg_title = 'Ada Section Title yang masih kosong';
            if ($code <> '') $ii++;
            $i++;
        }
        if ($ii > 0) {
            if ($msg_title <> '')
                $msg .= $msg_title . '<br>';
        } else $msg .= 'Form Title tidak boleh kosong<br>';

        $msg_question = '';
        $msg_tipe = '';
        $i = 0;
        $ii = 0;
        foreach ($question as $code) {
            if ($question[$i] == '')    $msg_question = 'Ada Question yang masih kosong';
            if ($tipe[$i] == '')    $msg_tipe = 'Ada Tipe yang masih kosong';
            if ($code <> '') $ii++;
            $i++;
        }
        if ($ii > 0) {
            if ($msg_question <> '')
                $msg .= $msg_question . '<br>';
            if ($msg_tipe <> '')
                $msg .= $msg_tipe . '<br>';
        } else $msg .= 'Question tidak boleh kosong<br>';

        if ($msg == '') {
            ORM::get_db()->beginTransaction();
            try {
                $chk = ORM::for_table('form_master')->raw_query('select * from form_master where kode_form like "%' . $user['kode_dept'] . '%" order by kode_form desc')->find_one();
                if ($chk) {
                    $no = ++$chk['kode_form'];
                } else {
                    $no = 'FORM/' . $user['kode_dept'] . '/0001';
                }

                $i = 0;
                foreach ($section_title as $item) {
                    $ssection_title = $section_title[$i];
                    $ssection_description = $section_description[$i];
                    if ($i == 0) {
                        $d = ORM::for_table('form_master')->create();
                        $d->kode_form = $no;
                        $d->nama_form = $ssection_title;
                        $d->deskripsi = $ssection_description;
                        $d->add_by = $user['id'];
                        $d->add_date = date('Y-m-d H:i:s');
                        $d->status = 'NONAKTIF';
                        $d->save();
                    } else {
                        $d = ORM::for_table('form_detail')->create();
                        $d->kode_form = $no;
                        $d->pertanyaan = $ssection_title;
                        $d->deskripsi = $ssection_description;
                        $section_number = $i + 1;
                        $d->section = $section_number;
                        $d->save();
                    }
                    $i++;
                }

                $i = 0;
                $current_section = 1;
                $subsection = 0;
                foreach ($question as $item) {
                    $squestion = $question[$i];
                    $squestion_description = $question_description[$i];
                    $stipe = $tipe[$i];
                    $squestion_section = $question_section[$i];

                    $d = ORM::for_table('form_detail')->create();
                    $d->kode_form = $no;
                    $d->pertanyaan = $squestion;
                    $d->deskripsi = $squestion_description;
                    $d->tipe = $stipe;
                    if ($squestion_section == $current_section) {
                        $subsection += 0.01;
                        $section_number = $current_section + $subsection;
                    } else {
                        $current_section += 1;
                        $subsection = 0.01;
                        $section_number = $current_section + $subsection;
                    }

                    $d->section = $section_number;
                    $d->save();
                    $i++;
                }


                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Form : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

                Event::trigger('form/add-post/_on_finished');
                $data = array(
                    'msg'            =>  'Berhasil Update FORM : ' . $no,
                    'dataval'        =>    1
                );
                echo json_encode($data);
            } catch (PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        } else {
            $data = array(
                'msg'            =>  $msg,
                'dataval'        =>    'a'
            );
            echo json_encode($data);
        }
        break;

    case 'edit':
        Event::trigger('form/edit/');

        _auth1('FORM-EDIT', $user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('form_master')->find_one($cid);
        if ($d) {
            $e = ORM::for_table('form_detail')->where('kode_form', $d['kode_form'])->order_by_asc('section')->find_many();
            $clist = '';
            $clist .= '<option value="">Choose Data Type</option>';
            $clist .= '<option value="string">STRING</option>';
            $clist .= '<option value="statement">STATEMENT</option>';
            $clist .= '<option value="datetime">DATETIME</option>';
            $clist .= '<option value="date">DATE</option>';
            $clist .= '<option value="time">TIME</option>';
            $clist .= '<option value="file">FILE</option>';
            if ($user['user_type'] == 'Admin') {
                $tg = ORM::for_table('daftar_datatype')->where('status', 'AKTIF')->find_many();
            } else {
                $dept = '%:' . $user['kode_dept'];
                $tg = ORM::for_table('daftar_datatype')->where('status', 'AKTIF')->where_like('kode', $dept)->find_many();
            }
            foreach ($tg as $r) {
                $clist .= '<option value="' . $r['kode'] . '">' . $r['kode'] . ' - ' . $r['nama'] . '</option>';
            }
            $ui->assign('opt_tipe', $clist);

            $ui->assign('d', $d);
            $ui->assign('e', $e);
            $ui->assign('tg', $tg);
            $ui->assign('cid', $cid);
            $ui->assign('_sysfrm_menu1', 'listform');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'edit-form', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
            $ui->display($spath . 'edit-form.tpl');
        } else r2(U . 'form/list', 'e', 'Form tersebut tidak ditemukan');
        break;

    case 'edit-post':
        Event::trigger('form/edit-post/');

        $section_title = explode(',', _post('section_title'));
        $section_description = explode(',', _post('section_description'));
        $question = explode(',', _post('question'));
        $question_description = explode(',', _post('question_description'));
        $tipe = explode(',', _post('tipe'));
        $question_section = explode(',', _post('question_section'));
        $kode = _post('kode');
        $aktif = _post('aktif');
        $msg = '';
        $msg_title = '';
        $i = 0;
        $ii = 0;
        foreach ($section_title as $code) {
            if ($section_title[$i] == '')    $msg_title = 'Ada Section Title yang masih kosong';
            if ($code <> '') $ii++;
            $i++;
        }
        if ($ii > 0) {
            if ($msg_title <> '')
                $msg .= $msg_title . '<br>';
        } else $msg .= 'Form Title tidak boleh kosong<br>';

        $msg_question = '';
        $msg_tipe = '';
        $i = 0;
        $ii = 0;
        foreach ($question as $code) {
            if ($question[$i] == '')    $msg_question = 'Ada Question yang masih kosong';
            if ($tipe[$i] == '')    $msg_tipe = 'Ada Tipe yang masih kosong';
            if ($code <> '') $ii++;
            $i++;
        }
        if ($ii > 0) {
            if ($msg_question <> '')
                $msg .= $msg_question . '<br>';
            if ($msg_tipe <> '')
                $msg .= $msg_tipe . '<br>';
        } else $msg .= 'Question tidak boleh kosong<br>';

        if ($msg == '') {
            ORM::get_db()->beginTransaction();
            try {
                $no = $kode;
                $i = 0;
                foreach ($section_title as $item) {
                    $ssection_title = $section_title[$i];
                    $ssection_description = $section_description[$i];
                    if ($i == 0) {
                        $d = ORM::for_table('form_master')->where('kode_form', $no)->find_one();
                        $d->nama_form = $ssection_title;
                        $d->deskripsi = $ssection_description;
                        $d->edit_by = $user['id'];
                        $d->edit_date = date('Y-m-d H:i:s');
                        if ($aktif == 'AKTIF') {
                            $d->status = 'AKTIF';
                        } else {
                            $d->status = 'NONAKTIF';
                        }
                        $d->save();
                        $e = ORM::for_table('form_detail')->where('kode_form', $no)->find_many();
                        $e->delete();
                    } else {
                        $d = ORM::for_table('form_detail')->create();
                        $d->kode_form = $no;
                        $d->pertanyaan = $ssection_title;
                        $d->deskripsi = $ssection_description;
                        $section_number = $i + 1;
                        $d->section = $section_number;
                        $d->save();
                    }
                    $i++;
                }

                $i = 0;
                $current_section = 1;
                $subsection = 0;
                foreach ($question as $item) {
                    $squestion = $question[$i];
                    $squestion_description = $question_description[$i];
                    $stipe = $tipe[$i];
                    $squestion_section = $question_section[$i];

                    $d = ORM::for_table('form_detail')->create();
                    $d->kode_form = $no;
                    $d->pertanyaan = $squestion;
                    $d->deskripsi = $squestion_description;
                    $d->tipe = $stipe;
                    if ($squestion_section == $current_section) {
                        $subsection += 0.01;
                        $section_number = $current_section + $subsection;
                    } else {
                        $current_section += 1;
                        $subsection = 0.01;
                        $section_number = $current_section + $subsection;
                    }

                    $d->section = $section_number;
                    $d->save();
                    $i++;
                }


                $cid = $d->id();
                ORM::get_db()->commit();
                _log1('Tambah Data Form : ' . $no . ' [CID: ' . $cid . ']', $user['username'], $user['id']);

                Event::trigger('form/add-post/_on_finished');
                $data = array(
                    'msg'            =>  'Berhasil Update FORM : ' . $no,
                    'dataval'        =>    1
                );
                echo json_encode($data);
            } catch (PDOException $ex) {
                ORM::get_db()->rollBack();
                throw $ex;
                echo $ex;
            }
        } else {
            $data = array(
                'msg'            =>  $msg,
                'dataval'        =>    'a'
            );
            echo json_encode($data);
        }
        break;

    case 'setting':
        Event::trigger('form/setting/');
        _auth1('SETTING-FORM', $user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('form_master')->find_one($cid);
        if ($d) {
            $e = ORM::for_table('daftar_setting')->where('kode_form', $d['kode_form'])->find_many();
            $clist = '';
            $clist = '<option value="">Choose Section</option>';
            $clist .= '<option value=1>Section 1</option>';
            $f = ORM::for_table('form_detail')->where('kode_form', $d['kode_form'])->find_many();
            foreach ($f as $r) {
                if (fmod($r['section'], 1) == 0) {
                    $clist .= '<option value=' . $r['section'] . '>Section ' . (int)$r['section'] . '</option>';
                }
            }

            $ui->assign('clist', $clist);
            $ui->assign('d', $d);
            $ui->assign('e', $e);
            $ui->assign('f', $f);
            $ui->assign('cid', $cid);
            $ui->assign('_sysfrm_menu1', 'listform');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'setting-form', 'numeric')));
            $ui->display($spath . 'setting-form.tpl');
        }
        break;

    case 'setting-post':
        $kode_form = _post('kode_form');
        $start = explode(',', _post('start'));
        $value = explode(',', _post('value'));
        $target = explode(',', _post('target'));
        $msg = '';
        $msg_start = '';
        $msg_value = '';
        $msg_target = '';
        $i = 0;
        $ii = 0;
        foreach ($start as $code) {
            if ($start[$i] == '')    $msg_start = 'Ada Question yang masih kosong';
            if ($value[$i] == '')    $msg_value = 'Ada Value yang masih kosong';
            if ($target[$i] == '')    $msg_target = 'Ada Target yang masih kosong';
            if ($code <> '') $ii++;
            $i++;
        }
        if ($ii > 0) {
            if ($msg_start <> '')
                $msg .= $msg_start . '<br>';
            if ($msg_value <> '')
                $msg .= $msg_value . '<br>';
            if ($msg_target <> '')
                $msg .= $msg_target . '<br>';
        }

        if ($msg == '') {
            ORM::get_db()->beginTransaction();
            try {
                $chk = ORM::for_table('daftar_setting')->raw_query('select * from daftar_setting order by id desc')->find_one();
                if ($chk) {
                    $no = ++$chk['kode_setting'];
                } else {
                    $no = 'SET/0001';
                }
                $i = 0;
                $x = ORM::for_table('daftar_setting')->where('kode_form', $kode_form)->find_many();
                $x->delete();
                if ($start[0] != '') {
                    foreach ($start as $item) {
                        $sstart = $start[$i];
                        $svalue = $value[$i];
                        $starget = $target[$i];

                        $d = ORM::for_table('daftar_setting')->create();
                        $d->kode_setting = $no;
                        $d->kode_form = $kode_form;
                        $d->start = $sstart;
                        $d->value = $svalue;
                        $d->target = $starget;
                        $d->end_page = true;
                        $d->save();
                        $i++;
                    }
                    // Edit by steven 15/12/2023
                    $settings = ORM::for_table('daftar_setting')->select('id')->select('target')->where('kode_form', $kode_form)->find_many();
                    foreach ($settings as $item) {
                        $id = $item->id;
                        $target = $item->target;
                        $target = floor($target);
                        $check_end = ORM::for_table('daftar_setting')->where_raw('FLOOR(start) = ?', $target)->where_not_equal('id', $id)->where('kode_form', $kode_form)->find_one();
                        if (!$check_end) {
                            $item->set('end_page', true);
                        } else {
                            $item->set('end_page', false);
                        }
                        $item->save();
                    }
                }
                ORM::get_db()->commit();
                _log1('Tambah Form Setting : ' . $no, $user['username'], $user['id']);
                $data = array(
                    'msg'            =>  'Berhasil Update',
                    'dataval'        =>    1
                );
                echo json_encode($data);
                Event::trigger('form/setting-post/_on_finished');
            } catch (PDOException $ex) {
                ORM::get_db()->rollBack();
                $data = array('msg' => $ex);
                echo json_encode($data);
            }
        } else {
            $data = array('msg' => $msg, 'dataval' => 'a');
            echo json_encode($data);
        }
        break;

    case 'approval':
        Event::trigger('form/approval/');
        _auth1('APPROVAL-FORM', $user['id']);
        $cid = $routes['3'];
        $d = ORM::for_table('form_master')->find_one($cid);
        if ($d) {
            $e = ORM::for_table('daftar_approval')->where('kode_form', $d['kode_form'])->order_by_asc('urutan')->find_many();
            $e_size = ORM::for_table('daftar_approval')->where('kode_form', $d['kode_form'])->order_by_asc('urutan')->count();
            $tg = ORM::for_table('sys_users', 'dblogin')->find_many();
            $clist = '';
            foreach ($tg as $r) {
                $clist .= '<option value="' . $r['username'] . '">' . $r['username'] . '</option>';
            }
            $kondisi = '';
            $f = ORM::for_table('form_detail')->where('kode_form', $d['kode_form'])->where_not_in('tipe', array('', 'string', 'datetime', 'file'))->order_by_asc('section')->find_many();
            foreach ($f as $fs) {
                $section = floor($fs['section']);
                $kondisi .= '<option value="' . $fs['section'] . '">Section ' . $section . ' - ' . $fs['pertanyaan'] . '</option>';
            }
            $ui->assign('opt', $clist);
            $ui->assign('kondisi', $kondisi);
            $ui->assign('tg', $tg);
            $ui->assign('d', $d);
            $ui->assign('e', $e);
            $ui->assign('esize', $e_size);
            $ui->assign('f', $f);
            $ui->assign('cid', $cid);
            $ui->assign('_sysfrm_menu1', 'listform');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'approval-form', 'numeric')));
            $ui->display($spath . 'approval-form.tpl');
        }
        break;

    case 'approval-post':
        $kode_form = _post('kode_form');
        $condition_target = explode(',', _post('condition_target'));
        $condition = explode(',', _post('condition'));
        $condition_value = explode(',', _post('condition_value'));
        $case_number = explode(',', _post('case_number'));
        $msg = '';
        $msg_target = '';
        $msg_value = '';
        $msg_condition = '';
        $i = 0;
        $ii = 0;
        foreach ($case_number as $code) {
            if ($condition_target[$i] == '')
                $msg_target = 'Ada target yang masih kosong';
            else {
                if (is_numeric($condition_target[$i])) {
                    if ((int)$case_number[$i] >= (int)$condition_target[$i])
                        $msg .= 'Error : Case ' . $case_number[$i] . ' Target level approval tidak boleh lebih rendah atau sama dengan number level<br>';
                }
            }
            if ($condition_value[$i] == '') $msg_value = 'Ada value yang masih kosong';
            if ($condition[$i] == '') $msg_condition = 'Ada condition yang masih kosong';

            if ($code <> '') $ii++;
            $i++;
        }
        if ($ii > 0) {
            if ($msg_target <> '')
                $msg .= $msg_target . '<br>';
            if ($msg_value <> '')
                $msg .= $msg_value . '<br>';
            if ($msg_condition <> '')
                $msg .= $msg_condition . '<br>';
        }
        if ($msg == '') {
            ORM::get_db()->beginTransaction();
            try {
                $i = 0;
                $level = 1;
                $x = ORM::for_table('daftar_approval')->where('kode_form', $kode_form)->find_many();
                $x->delete();
                if ($case_number[0] != '') {
                    foreach ($case_number as $item) {
                        $scondition = $condition[$i];
                        $scondition_target = $condition_target[$i];
                        $scondition_value = $condition_value[$i];
                        $scase_number = $case_number[$i];
                        $d = ORM::for_table('daftar_approval')->create();
                        $d->kode_form = $kode_form;
                        if ($i != 0) {
                            if ($scase_number == $case_number[$i - 1]) {
                                $level += 0.01;
                            } else {
                                $level = floor($level) + 1;
                            }
                        }
                        $d->urutan = $level;
                        $d->kepada = $scondition_target;
                        $d->kondisi = $scondition;
                        $d->value = $scondition_value;
                        $d->save();
                        $i++;
                    }
                }
                ORM::get_db()->commit();
                _log1('Tambah Form Approval : ' . $no, $user['username'], $user['id']);
                $data = array(
                    'msg'            =>  'Berhasil Update',
                    'dataval'        =>    1
                );
                echo json_encode($data);
                Event::trigger('form/approval-post/_on_finished');
            } catch (PDOException $ex) {
                ORM::get_db()->rollBack();
                $data = array('msg' => $ex);
                echo json_encode($data);
            }
        } else {
            $data = array('msg' => $msg, 'dataval' => 'a');
            echo json_encode($data);
        }
        break;

    case 'list-input':
        Event::trigger('form/list-input/');
        $msg = $routes['3'];
        $d = ORM::for_table('form_master')->where('status', 'AKTIF')->order_by_asc('kode_form')->find_many();
        $ui->assign('d', $d);
        $ui->assign('msg', $msg);
        $ui->assign('_sysfrm_menu', 'formresponse');
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';
    ');
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-form', 'numeric')));
        $ui->display($spath . 'list-input-form.tpl');
        break;

    case 'history-input':
        Event::trigger('form/history-input/');
        $response = ORM::for_table('daftar_response')->where('user_id', $user['username'])->find_many();
        $e = ORM::for_table('form_master')->find_many();
        $d = [];
        $form = [];
        $respondent = [];
        $approve = [];
        $reject = [];
        $comment = [];
        $status = [];
        foreach ($response as $item) {
            array_push($d, $item['id']);
            array_push($status, $item['status']);
            array_push($form, $item['kode_form']);
            array_push($respondent, $item['add_date']);
        }

        $ui->assign('d', $d);
        $ui->assign('e', $e);
        $ui->assign('form', $form);
        $ui->assign('status', $status);
        $ui->assign('respondent', $respondent);
        $ui->assign('_sysfrm_menu', 'historyresponse');
        $ui->assign('jsvar', '_L[\'are_you_sure\'] = \'' . $_L['are_you_sure'] . '\';');
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'modal', 'btn-top/btn-top', 'css/loader')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'list-approval', 'numeric')));
        $ui->display($spath . 'history-input.tpl');
        break;

    case 'add-input':
        Event::trigger('form/add-input/');

        $cid = $routes['3'];
        $d = ORM::for_table('form_master')->where('status', 'AKTIF')->find_one($cid);
        if ($d) {
            $e = ORM::for_table('form_detail')->where('kode_form', $d['kode_form'])->order_by_asc('section')->find_many();
            $tg = ORM::for_table('daftar_datatype')->find_many();
            $listwaktu = "";
            // for($x = 0; $x < 24; $x++) {
            //     $jam = sprintf("%02d", $x) .":00";
            //     $listwaktu .= '<option value="'.$jam.'">'.$jam.'</option>';
            //     $menit = sprintf("%02d", $x) .":30";
            //     $listwaktu .= '<option value="'.$menit.'">'.$menit.'</option>';
            // }
            for ($hours = 0; $hours < 24; $hours++) {
                for ($minutes = 0; $minutes < 60; $minutes += 1) {
                    $time = sprintf("%02d:%02d", $hours, $minutes);
                    $listwaktu .= '<option value="' . $time . '">' . $time . '</option>';
                }
            }

            $ui->assign('waktu', $listwaktu);
            $ui->assign('d', $d);
            $ui->assign('e', $e);
            $ui->assign('tg', $tg);
            $ui->assign('cid', $cid);
            $ui->assign('_sysfrm_menu1', 'listinputform');
            $ui->assign('xheader', Asset::css(array('s2/css/select2.min', 'dp/dist/datepicker.min', 'btn-top/btn-top')));
            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min', 's2/js/i18n/' . lan(), $spath . 'add-input-form', 'dp/dist/datepicker.min', 'btn-top/btn-top', 'numeric')));
            $ui->display($spath . 'add-input-form.tpl');
        } else r2(U . 'form/list-input', 'e', 'Form tersebut tidak ditemukan');

        break;

    case 'upload-file':
        if (isset($_FILES['file']['name'])) {
            $filename = $_FILES['file']['name'];
            $filename = str_replace(' ', '_', $filename);
            $timestamp = time();
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $name = basename($filename, "." . $extension);
            $extension = strtolower($extension);
            $allowed_extensions = array("jpg", "jpeg", "png", "pdf", "xlsx", "xls");
            $response = array();
            $status = -1;
            if (in_array(strtolower($extension), $allowed_extensions)) {
                $new_filename = $name . '-' . $timestamp . '.' . $extension;
                $location = "uploads/FORM/" . $new_filename;
                if (file_exists($location)) {
                    $status = 2;
                } else {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                        $status = 1;
                        $response['path'] = $location;
                        $response['extension'] = $extension;
                    }
                }
            }
            $response['status'] = $status;
            $response['filename'] = $new_filename;
            echo json_encode($response);
            exit;
        }
        echo 0;
        break;

    case 'add-input-post':
        Event::trigger('form/add-input-post/');

        $kode = _post('kode');
        $require = _post('require');
        $jawaban = _post('jawaban');
        $pertanyaan = _post('pertanyaan');
        $isi_jawaban = explode('|', _post('jawaban'));
        $isi_pertanyaan = explode('|', _post('pertanyaan'));
        $attachment = explode(',', _post('attachment'));
        $dept = ORM::for_table('daftar_department', 'dblogin')->where('kode_dept', $user['kode_dept'])->find_one();
        if (!$dept)
            $require == -1;
        $tes = '';

        if ($require == 0) {
            ORM::get_db()->beginTransaction();
            try {
                $r = ORM::for_table('daftar_approval')->where('kode_form', $kode)->order_by_asc('urutan')->find_many();
                $approvekey = [];
                $rejectkey = [];
                $commentkey = [];
                $approvedate = [];
                $approvestatus = [];
                $approvecomment = [];
                $target = [];
                $current = 1;
                $temp_kondisi = [];
                $temp_value = [];
                $temp_target = [];
                foreach ($r as $item) {
                    if ($item['urutan'] == $current + 1) {
                        $current = $current + 1;
                        $panjang = count($temp_kondisi);

                        if ($panjang == 1) {
                            pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[0], $current, $user['id']);
                        } else {
                            $default = 0;
                            for ($x = 1; $x < $panjang; $x++) {
                                if ($temp_kondisi[$x] == 'golongan') {
                                    if ($user['golongan'] == $temp_value[$x]) {
                                        pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[$x], $current, $user['id']);
                                        $default = 1;
                                        break;
                                    }
                                } else {
                                    $k = ORM::for_table('form_detail')->where('kode_form', $kode)->order_by_asc('section')->find_many();
                                    $i_value = 0;
                                    foreach ($k as $ks) {
                                        if (fmod($ks['section'], 1) != 0) {
                                            if ($temp_kondisi[$x] == $ks['section'])
                                                break;
                                            $i_value = $i_value + 1;
                                        }
                                    }
                                    if ($temp_value[$x] == $isi_jawaban[$i_value]) {
                                        pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[$x], $current, $user['id']);
                                        $default = 1;
                                        break;
                                    }
                                }
                            }
                            if ($default == 0) {
                                pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[0], $current, $user['id']);
                            }
                        }
                        $temp_kondisi = [];
                        $temp_value = [];
                        $temp_target = [];
                    }
                    if (floor($item['urutan']) == $current) {
                        array_push($temp_kondisi, $item['kondisi']);
                        array_push($temp_target, $item['kepada']);
                        array_push($temp_value, $item['value']);
                    }
                }
                $panjang = count($temp_kondisi);
                if ($panjang == 1) {
                    pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[0], $current, $user['id']);
                } else {
                    $default = 0;
                    for ($x = 1; $x < $panjang; $x++) {
                        if ($temp_kondisi[$x] == 'golongan') {
                            if ($user['golongan'] == $temp_value[$x]) {
                                pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[$x], $current, $user['id']);
                                $default = 1;
                                break;
                            }
                        } else {
                            $k = ORM::for_table('form_detail')->where('kode_form', $kode)->order_by_asc('section')->find_many();
                            $i_value = 0;
                            foreach ($k as $ks) {
                                if (fmod($ks['section'], 1) != 0) {
                                    if ($temp_kondisi[$x] == $ks['section'])
                                        break;
                                    $i_value = $i_value + 1;
                                }
                            }
                            if ($temp_value[$x] == $isi_jawaban[$i_value]) {
                                pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[$x], $current, $user['id']);
                                $default = 1;
                                break;
                            }
                        }
                    }
                    if ($default == 0) {
                        pushApproval($approvekey, $rejectkey, $commentkey, $approvedate, $approvestatus, $approvecomment, $target, $temp_target[0], $current, $user['id']);
                    }
                }

                $d = ORM::for_table('daftar_response')->create();
                $d->kode_form = $kode;
                $d->user_id = $user['username'];
                $d->fullname = $user['fullname'];
                $d->emp_id = $user['emp_id'];

                $d->department = $dept['nama_dept'];
                $d->value = $jawaban;
                $d->question = $pertanyaan;
                $d->add_date = date('Y-m-d H:i:s');
                $d->approve_key = implode(',', $approvekey);
                $d->reject_key = implode(',', $rejectkey);
                $d->comment_key = implode(',', $commentkey);
                $d->approval_by = implode(',', $target);
                $d->approval_date = implode(',', $approvedate);
                $d->approval_status = implode(',', $approvestatus);
                $d->comment = implode(',', $approvecomment);
                $d->save();
                $cid = $d->id();

                $count = ORM::for_table('daftar_approval')->where('kode_form', $kode)->count();
                $d = ORM::for_table('daftar_response')->find_one($cid);
                if ($count != 0) {
                    $d->status = 'In Progress';
                    $d->save();
                    ORM::get_db()->commit();
                    _log1('Isi Form : ' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);
                    // Send Email to Approval
                    $content = '
                        <table style="width: 100%;">
                            <tr style="text-align: left; font-size:9pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Respondent</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $user['fullname'] . '</th>
                            </tr>
                            <tr style="font-size:9pt">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Employee Id</td>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $user['emp_id'] . '</td>
                            </tr>
                            <tr style="font-size:9pt">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Unit Usaha</td>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $dept['nama_dept'] . '</td>
                            </tr>';
                    $i = 0;
                    foreach ($isi_jawaban as $item) {
                        if ($item != '') {
                            $content .= '
                                <tr style="font-size:9pt">
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $isi_pertanyaan[$i] . '</td>
                                    <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $item . '</td>
                                </tr>
                            ';
                        }
                        $i++;
                    }
                    $content .= '
                        </table>                    
                    ';
                    $approval_content = '
                        <table style="width: 100%;">
                            <tr style="text-align: left; font-size:9pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">In Progress</th>
                            </tr>
                        </table> ';
                    $e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Form:Request Approval')->find_one();
                    $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                    $subject = new Template($e['subject']);
                    $subject->set('business_name', $config['CompanyName']);
                    $subj = $subject->output();
                    $message = new Template($e['message']);
                    $message->set('business_name', $config['CompanyName']);
                    $message->set('request_id', $cid);
                    $message->set('tanggal', date('d F Y'));
                    $message->set('title', $f['nama_form']);
                    $message->set('content', $content);
                    $message->set('approval_content', $approval_content);
                    $linkcomment = APP_URL . '/?ng=form-api/comment-form/' . $cid . '/token_' . $commentkey[0];
                    $linkapprove = APP_URL . '/?ng=form-api/approve-form/' . $cid . '/token_' . $approvekey[0];
                    $linkreject = APP_URL . '/?ng=form-api/reject-form/' . $cid . '/token_' . $rejectkey[0];
                    $message->set('link_comment', $linkcomment);
                    $message->set('link_approve', $linkapprove);
                    $message->set('link_reject', $linkreject);
                    $message_o = $message->output();
                    Notify_Email::_send($target[0], $target[0], $subj, $message_o, $attachment);

                    // Send Email to Requester
                    $h = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Form:Request Sent')->find_one();
                    $subject = new Template($h['subject']);
                    $subject->set('business_name', $config['CompanyName']);
                    $subj = $subject->output();
                    $message = new Template($h['message']);
                    $message->set('business_name', $config['CompanyName']);
                    $message->set('request_id', $cid);
                    $message->set('tanggal', date('d F Y'));
                    $message->set('title', $f['nama_form']);
                    $message->set('content', $content);
                    $message_o = $message->output();
                    Notify_Email::_send($user['username'], $user['username'], $subj, $message_o, $attachment);
                } else {
                    $d->status = 'Approved';
                    $d->save();
                    ORM::get_db()->commit();
                    _log1('Isi Form : ' . $kode . ' [CID: ' . $cid . ']', $user['username'], $user['id']);
                }

                // ORM::get_db()->commit();
                // _log1('Isi Form : '.$kode.' [CID: '.$cid.']',$user['username'],$user['id']);
                Event::trigger('form/add-input-post/_on_finished');
                $data = array(
                    'msg'            =>  'Berhasil Isi FORM : ' . $kode,
                    'dataval'        =>    1
                );
                echo json_encode($data);
            } catch (PDOException $ex) {
                ORM::get_db()->rollBack();
                $data = array(
                    'msg'            =>  'error: hubungi admin ' . $ex,
                    'dataval'        =>    'a'
                );
                echo json_encode($data);
            }
        } else if ($require == -1) {
            $data = array(
                'msg'            =>  'Department anda tidak terdaftar, hubungi admin untuk informasi lebih lanjut',
                'dataval'        =>    'a'
            );
            echo json_encode($data);
        }
        // else if($require == -1){
        //     $data = array(
        //         'msg'			=>  'Department anda tidak terdaftar, hubungi admin untuk informasi lebih lanjut',
        //         'dataval'		=>	'a');
        //     echo json_encode($data);
        // }
        else {
            $data = array(
                'msg'            =>  'Jawaban tidak boleh ada yang kosong',
                'dataval'        =>    'a'
            );
            echo json_encode($data);
        }
        break;

    case 'approve-form':
        $v_uid = $routes['3'];
        $v_token = $routes['4'];
        $v_token = str_replace('token_', '', $v_token);

        $d = ORM::for_table('daftar_response')->find_one($v_uid);
        $kode = $d['kode_form'];
        if ($d) {
            $kepada = explode(',', $d['approval_by']);
            $approval = explode(',', $d['approval_status']);
            $tanggal = explode(',', $d['approval_date']);
            $approve_token = explode(',', $d['approve_key']);
            $index = 0;
            foreach ($approve_token as $k) {
                if ($v_token == $k) {
                    $approval[$index] = 'Approved';
                    $tanggal[$index] = date('Y-m-d H:i:s');
                    $d->approval_status = implode(',', $approval);
                    $d->approval_date = implode(',', $tanggal);

                    foreach ($approval as $l) {
                        if ($l == 'In Progress') $status = 1;
                    }
                    $content = '
                    <table style="width: 100%;">
                    <tr style="text-align: left; font-size:9pt;">
                        <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Respondent</th>
                        <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $user['fullname'] . '</th>
                    </tr>
                    <tr style="font-size:9pt">
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Employee Id</td>
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $user['emp_id'] . '</td>
                    </tr>
                    <tr style="font-size:9pt">
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Unit Usaha</td>
                        <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $dept['nama_dept'] . '</td>
                    </tr>';
                    $i = 0;
                    $isi_jawaban = explode('|', $d['value']);
                    $isi_pertanyaan = explode('|', $d['question']);
                    foreach ($isi_jawaban as $item) {
                        if ($item != '') {
                            $content .= '
                            <tr style="font-size:9pt">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $isi_pertanyaan[$i] . '</td>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $item . '</td>
                            </tr>
                        ';
                        }
                        $i++;
                    }
                    $content .= '
                    </table>                    
                ';

                    $status = 0;
                    if ($status == 0) {
                        $d->status = 'Approved';
                        $d->approve_key = '';
                        $d->reject_key = '';
                        $d->comment_key = '';
                        $target = $d['user_id'];
                        $d->save();

                        // Send Email to Requester
                        $approval_content = '
                        <table style="width: 100%;">
                            <tr style="text-align: left; font-size:9pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approved</th>
                            </tr>';
                        $i = 0;
                        foreach ($approval as $item) {
                            $approval_content = '
                            <tr style="text-align: left; font-size:9pt;">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $kepada[$i] . '</th>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $item . '</th>
                            </tr>';
                            $i++;
                        }
                        $approval_content = '</table> ';
                        $e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Form:Approval')->find_one();
                        $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                        $subject = new Template($e['subject']);
                        $subject->set('business_name', $config['CompanyName']);
                        $subject->set('status', 'Approved');
                        $subject->set('id_status', $v_uid);
                        $subj = $subject->output();
                        $message = new Template($e['message']);
                        $message->set('business_name', $config['CompanyName']);
                        $message->set('request_id', $v_uid);
                        $message->set('tanggal', date('d F Y'));
                        $message->set('title', $f['nama_form']);
                        $message->set('content', $content);
                        $message->set('approval_content', $approval_content);
                        $message_o = $message->output();
                        Notify_Email::_send($target, $target, $subj, $message_o);
                    } else {
                        $d->save();
                        // Send Email to Approval
                        $approval_content = '
                        <table style="width: 100%;">
                            <tr style="text-align: left; font-size:9pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">In Progress</th>
                            </tr>';
                        $i = 0;
                        foreach ($approval as $item) {
                            $approval_content = '
                            <tr style="text-align: left; font-size:9pt;">
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $kepada[$i] . '</th>
                                <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $item . '</th>
                            </tr>';
                            $i++;
                        }
                        $approval_content = '</table> ';
                        $e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Form:Request Approval')->find_one();
                        $f = ORM::for_table('form_master')->where('kode_form', $kode)->find_one();
                        $j = $index + 1;
                        $subject = new Template($e['subject']);
                        $subject->set('business_name', $config['CompanyName']);
                        $subj = $subject->output();
                        $message = new Template($e['message']);
                        $message->set('business_name', $config['CompanyName']);
                        $message->set('request_id', $v_uid);
                        $message->set('tanggal', date('d F Y'));
                        $message->set('title', $f['nama_form']);
                        $message->set('content', $content);
                        $message->set('approval_content', $approval_content);
                        $linkcomment = U . 'form/comment-form/' . $v_uid . '/token_' . $commentkey[$j];
                        $linkapprove = U . 'form/approve-form/' . $v_uid . '/token_' . $approvekey[$j];
                        $linkreject = U . 'form/reject-form/' . $v_uid . '/token_' . $rejectkey[$j];
                        $message->set('link_comment', $linkcomment);
                        $message->set('link_approve', $linkapprove);
                        $message->set('link_reject', $linkreject);
                        $message_o = $message->output();
                        Notify_Email::_send($kepada[$j], $kepada[$j], $subj, $message_o);
                    }

                    _msglog('s', 'Request Berhasil Di Approve');
                    r2(U . 'form/list/');
                }
                $index++;
            }
            _msglog('e', 'Request Berhasil Di Reject');
            r2(U . 'form/list/');
        } else {
            r2(U . 'itemstock/list/');
        }
        break;

    case 'tes-send':
        $attachment = [];
        // array_push($attachment,'./uploads/FORM/Daftar nama peserta.pdf');
        echo "<script type='text/javascript'>alert('$attachment');</script>";
        $e = ORM::for_table('sys_email_templates', 'dblogin')->where('tplname', 'Form:Request Approval')->find_one();
        $subject = new Template($e['subject']);
        $subject->set('business_name', $config['CompanyName']);
        $subject->set('status', 'Approved');
        $subject->set('id_status', 'tes');
        $subj = $subject->output();
        $message = new Template($e['message']);
        $message->set('business_name', $config['CompanyName']);
        $message->set('request_id', 'tes');
        $message->set('tanggal', date('d F Y'));
        $message->set('title', 'tes');
        $message->set('content', 'tes');
        $message->set('approval_content', 'tes');
        $message_o = $message->output();
        Notify_Email::_send('capella.zoom@gmail.com', 'capella.zoom@gmail.com', $subj, $message_o, $attachment);
        break;

    case 'print-approve':
        $cid = $routes['3'];
        $status = _post('status');

        $today_time = date('d-M-Y - H:i:s');
        $d = ORM::for_table('daftar_response')->find_one($cid);

        $title = 'PRINT RESPONSE';
        $print = '
            <div class="cetak-pembelian" >
                
                        <table style="width:80%; solid #d8d8d8;margin-bottom:3px;">
                            <tr>
                             <td style="font-size: 9pt; text-align: left;">Dicetak Oleh : ' . $nama_user . ' / ' . $today_time . '</td>
                             <td style="font-size: 10pt; text-align:left; ">Request : #<u>' . $d["id"] . '</u></td>
                            </tr> 
                        </table>
                        <table style="width:80%; solid #d8d8d8;margin-bottom:3px;">
                            <tr>
                             <td style="font-size: 9pt; text-align: left;">Pemohon : ' . $d['fullname'] . ' / ' . date('d-M-Y - H:i:s', strtotime($d['add_date']))  . '</td>
                            </tr>
                            
                        </table>
          
                <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
                <sethtmlpagefooter name="MyFooter1" value="on" />
        ';

        $print .= '
            <table class="tabel-isi" style="width:80%;; font-size: 20px;">
              <tr>
                <td style="width: 50px; text-align: center;"><b>Question</b></td>
                <td style="width: 150px; text-align: center;" ><b>Response</b></td>
              </tr>';
              

        $i = 0;
        $isi_jawaban = explode('|', $d['value']);
        $isi_pertanyaan = explode('|', $d['question']);
        foreach ($isi_jawaban as $item) {
            if ($item != '') {

                $print .= '
                          <tr class="tabel-isi" style="font-size:20pt">
                              <td style="border-bottom:3px; padding-bottom: 5px; padding-top: 5px;">' . $isi_pertanyaan[$i] . '</td>
                              <td style="border-bottom:3px; padding-bottom: 5px; padding-top: 5px;">' . $item . '</td>
                          </tr>
                      ';
            }
            $i++;
        }
        $print .= '
            </table>
            </div>
        ';

        $e = ORM::for_table('daftar_response')->find_one($cid);
        $kode = $e['kode_form'];
        if ($e) {
            $kepada = explode(',', $e['approval_by']);
            $approval = explode(',', $e['approval_status']);
            $tanggal = explode(',', $e['approval_date']);
            $approve_token = explode(',', $e['approve_key']);
            $message = explode(',', $e['comment']);
            $index = 0;
            $print .= '
                        <table class="tabel-isi" style="width:80%;; solid #d8d8d8;">
                            <tr class="tabel-isi" style="text-align: left; font-size:20pt;">
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Approval</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Date</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Message</th>
                                <th style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">Status</th>
                            </tr>';
            $i = 0;
            foreach ($approval as $item) {
                $print .= '
                        <tr class="tabel-isi"  style="text-align: left; font-size:20pt;">
                            <td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $kepada[$i] . '</td>
                            <td style="width: 50px; text-align: center; width:150px; border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $tanggal[$i] . '</td>';

                if ($message[$i] == 'NULL') {
                    $print .= '<td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;"></td>';
                } else {
                    $print .= '<td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;">' . $message[$i] . '</td>';
                }

                if ($item == 'Approved') {
                    $print .=  '<td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;"><span class="btn btn-primary btn-xs">' . $item . "</span></td>";
                } elseif ($item == 'Rejected') {
                    $print .=  '<td style="border-bottom:3px solid #d8d8d8; padding-bottom: 5px; padding-top: 5px;"><span class="btn btn-danger btn-xs">' . $item . "</span></td>";
                } else {
                    $print .= '<td style="border-bottom:3px solid #d8d8d8; width:100px;padding-bottom: 5px; padding-top: 5px;"><span class="btn btn-warning btn-xs">' . $item . "</span></td>";
                }

                $i++;
            }
            $print .= '</table> ';
        }
        if ($kode == 'FORM/GAS/0001'){
            _mpdf($title, $print, 'L');    
        }else{
            _mpdf($title, $print, 'P');
        }

        break;

    case 'render-question':
        $kode = _post('kode');
        $kode_form = _post('kode_form');
        if ($kode <> '') {
            $opt = '<option value="">Pilih Question</option>';
            $y = ORM::for_table('form_detail')->where('kode_form', $kode_form)->find_many();
            foreach ($y as $r) {
                if ($kode == floor($r['section'])) {
                    if ($r['tipe'] != 'string' and $r['tipe'] != 'datetime' and $r['tipe'] != 'file' and $r['tipe'] != '') {
                        $opt .= '<option value="' . $r['section'] . '">' . $r['pertanyaan'] . '</option>';
                    }
                }
            }
            $data = array(
                'opt'            =>    $opt
            );
            echo json_encode($data);
        } else {
            $data = array(
                'opt'    =>    '<option value="">Pilih Question</option>'
            );
            echo json_encode($data);
        }
        break;

    case 'render-value':
        $kode = _post('kode');
        $kode_form = _post('kode_form');
        if ($kode <> '') {
            if ($kode == 'golongan') {
                $opt = '<option value="">Pilih Tingkatan</option>';
                $opt .= '<option value="1">Tingkatan 1</option>';
                $opt .= '<option value="2">Tingkatan 2</option>';
                $opt .= '<option value="3">Tingkatan 3</option>';
                $opt .= '<option value="4">Tingkatan 4</option>';
                $opt .= '<option value="5">Tingkatan 5</option>';
                $opt .= '<option value="6">Tingkatan 6</option>';
                $opt .= '<option value="7">Tingkatan 7</option>';
                $opt .= '<option value="8">Tingkatan 8</option>';
                $opt .= '<option value="9">Tingkatan 9</option>';
            } else if ($kode == 'default') {
                $opt = '<option value="default">Default</option>';
            } else {
                $opt = '<option value="">Pilih Value</option>';
                $y = ORM::for_table('form_detail')->where('kode_form', $kode_form)->where('section', $kode)->find_one();
                $z = ORM::for_table('daftar_datatype')->where('kode', $y['tipe'])->find_one();
                $value = explode(',', $z['value']);
                foreach ($value as $r) {
                    $opt .= '<option value="' . $r . '">' . $r . '</option>';
                }
            }
            $data = array(
                'opt'            =>    $opt
            );
            echo json_encode($data);
        } else {
            $data = array(
                'opt'    =>    '<option value="">Pilih Value</option>'
            );
            echo json_encode($data);
        }
        break;

    case 'next-page':
        $kode = _post('kode');
        $isi = explode('|', _post('isi'));
        // $isi = _post('isi');
        $tipearr = explode('|', _post('tipearr'));
        $section = _post('section');
        // $start = [];
        // $value = [];
        // $target = [];
        $require = 0;
        if ($kode <> '') {
            $index = 0;
            foreach ($isi as $item) {
                if ($item == '') {
                    $require = 1;
                } else if ($tipearr[$index] == 'datetime') {
                    $tanggal = explode(' ', $item);
                    $tgl = $tanggal[0];
                    $waktu = $tanggal[1];
                    if ($tgl == '' || $waktu == '') {
                        $require = 1;
                    }
                }
                $index++;
            }
            $d = ORM::for_table('daftar_setting')->where('kode_form', $kode)->where_in('value', $isi)->where_raw('FLOOR(start) = ?', $section)->find_one();
            if ($d) {
                // foreach($d as $ds) {
                // array_push($start, $d['start']);
                // array_push($value, $d['value']);
                // array_push($target, $d['target']);
                $target = $d['target'];
                // Edit by steven 15/12/2023
                $end_page = $d['end_page'];
                // }
                $data = array(
                    'target'            =>    $target,
                    'end_page'          => $end_page,
                    'require'            =>    $require,
                );
                echo json_encode($data);
            } else {
                $data = array(
                    'target'            =>    $target,
                    'end_page'          => $end_page,
                    'require'            =>    $require,
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'target'            =>    $target,
                'end_page'          => $end_page,
                'require'            =>    $require,
            );
            echo json_encode($data);
        }
        break;

    default:
        echo 'action not defined';
}
