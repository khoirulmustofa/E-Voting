<?php

define("BOT_TOKEN", "");

function kirimTelegram($chat_id, $pesan)
{
    // $pesan = json_encode($pesan);
    $API = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendmessage?chat_id=" . $chat_id . "&text=.$pesan.&parse_mode=HTML";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function msg_sukses($string)
{
    return '<div class="alert alert-success" role="alert">' . $string . '  </div>';
}

function msg_error($string)
{
    return '<div class="alert alert-danger" role="alert">' . $string . '  </div>';
}

function set_validation_style($field)
{
    if ($_POST) {
        // Apakah nama_field = array
        if (is_array($field)) {
            $last_status = false;
            for ($i = 0; $i < count($field); $i++) {
                if (form_error($field[$i]) || $last_status) {
                    $last_status = true; // ya, ada error
                } else {
                    $last_status = false; // no, tidak ada error
                }
            }

            if ($last_status) {
                echo 'has-error';
            } else {
                echo 'has-success';
            }

            // Bukan array
        } else {
            if (form_error($field)) {
                echo 'has-error';
            } else {
                echo 'has-success';
            }
        }
    }
}

function date_to_eng($tanggal)
{
    $tgl = date('Y-m-d', strtotime($tanggal));
    if ($tgl == '1970-01-01') {
        return '';
    } else {
        return $tgl;
    }
}

function date_to_indo($tanggal)
{
    $tgl = date('d-m-Y', strtotime($tanggal));
    if ($tgl == '01-01-1970') {
        return '';
    } else {
        return $tgl;
    }
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulann(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulann($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function is_login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('logged_in') != true) {
        redirect(site_url('login'));
    }
}

function is_admin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('logged_in') != 'Administrator') {
        redirect(site_url('dashboard'));
    }
}

function show_access($class_meth)
{
    $ci = &get_instance();
    $groups_arr = $ci->session->userdata('groups_arr');

    if (count($groups_arr) > 0) {
        $ci = &get_instance();
        $groups_arr = $ci->session->userdata('groups_arr');
        $ci->load->model('Auth_model');
        $count_santri = $ci->Auth_model->get_groups_role_by_group_clasmeth($groups_arr, $class_meth)->num_rows();
        if ($count_santri > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        $ci->session->set_flashdata('msg', msg_error('Maaf Penggunga Belum Punya Group'));
        redirect(site_url('auth'));
    }
}

function have_access($class_meth)
{
    $ci = &get_instance();
    $groups_arr = $ci->session->userdata('groups_arr');
    if (count($groups_arr) > 0) {
        $ci->load->model('Auth_model');
        $count_santri = $ci->Auth_model->get_groups_role_by_group_clasmeth($groups_arr, $class_meth)->num_rows();
        if ($count_santri > 0) {
            return true;
        } else {
            redirect(site_url('block'));;
        }
    } else {
        $ci->session->set_flashdata('msg', msg_error('Maaf Penggunga Belum Punya Group'));
        redirect(site_url('auth'));
    }
}

function km_encrypt($value)
{
    $key = "KhoirulMutofajossg4ndo55R3w0rew0";
    return urlencode(base64_encode($key . $value));
}

function km_decrypt($string)
{
    $key = "KhoirulMutofajossg4ndo55R3w0rew0";
    $urldecode = urldecode($string);
    $base64_decode = base64_decode($urldecode);
    $hasil = str_replace($key, "", $base64_decode);
    return urldecode($hasil);
}

function insert_uuid()
{
    return uniqid("nf-");
}

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function sort_sesi_status_presensi($string)
{
    $arr = explode(",", $string);
    sort($arr);
    return implode(',', $arr);
}

function rort_sesi_status_presensi($string)
{
    $arr = explode(",", $string);
    rsort($arr);
    return implode(',', $arr);
}

function param_not_found()
{
    echo 'Hayo Kamu ketik manual yaaa <a href="javascript:history.back()">Klik Disini untuk balik</a>';
}
