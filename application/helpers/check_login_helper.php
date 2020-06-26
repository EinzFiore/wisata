<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// cek apakah admin atau tidak
function check_admin()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('id')) {
        $CI->session->set_flashdata('flash-error', 'Akses ditolak, Silahkan Login dulu...');
        redirect('home', 'refresh');
    } else if ($CI->session->userdata('email')) {
        $CI->session->set_flashdata('flash-error', 'Maaf, Akses tidak diizinkan...');
        redirect('home', 'refresh');
    }
}

function check_member()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('email')) {
        $CI->session->set_flashdata('flash-error', 'Akses ditolak, Silahkan Login dulu...');
        redirect('home', 'refresh');
    } else if ($CI->session->userdata('username')) {
        $CI->session->set_flashdata('flash-error', 'Maaf, Akses tidak diizinkan...');
        redirect('dashboard', 'refresh');
    }
}

function is_login_member()
{
    $CI = &get_instance();
    if ($CI->session->userdata('email')) {
        $CI->session->set_flashdata('flash-error', 'Akses ditolak, Anda sudah login...');
        redirect('home', 'refresh');
    } else if ($CI->session->userdata('id')) {
        $CI->session->set_flashdata('flash-error', 'Maaf, Akses tidak diizinkan..');
        redirect('dashboard', 'refresh');
    }
}
