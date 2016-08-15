<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/15/16
 * Time: 9:16 PM
 */
session_start();

include "../config/koneksi.php";
include "library.php";

$id_proyek = $_GET['id_proyek'];

$data = [];

$q = mysql_query("SELECT * FROM proyek_pekerjaan WHERE id_proyek='$id_proyek' AND have_child='0' ORDER BY tanggal_mulai, COALESCE(parent, id), parent IS NOT NULL");
while($d = mysql_fetch_object($q))
{
    $pekerjaan = [];
    $pekerjaan['title'] = $d->nama;
    $pekerjaan['start'] = $d->tanggal_mulai;
    $pekerjaan['end'] = $d->tanggal_selesai;

    switch ($d->status)
    {
        case 'sudah':
            $status = "bg-success";
            break;
        case 'sedang':
            $status = "bg-warning";
            break;
        default:
            $status = "bg-danger";
    }

    $pekerjaan['className'] = $status.' pekerjaan-'.$d->id;
    $pekerjaan['id_proyek_pekerjaan'] = $d->id;
    $pekerjaan['id_proyek'] = $d->id_proyek;
    $pekerjaan['is_developer'] = ($_SESSION['status'] == 'DEVELOPER') ? TRUE : FALSE;

    $stakeholders = [];
    $stakeholder_query = mysql_query("SELECT proyek_pekerjaan_stakeholder.*, user.nama as user_nama, proyek_pekerjaan.tanggal_mulai FROM proyek_pekerjaan_stakeholder JOIN proyek_pekerjaan ON proyek_pekerjaan.tanggal_mulai='$d->tanggal_mulai' JOIN user ON user.id_user=proyek_pekerjaan_stakeholder.id_user WHERE proyek_pekerjaan_stakeholder.id_pekerjaan='$d->id'");
    while($d_stakeholder = mysql_fetch_object($stakeholder_query))
    {
        if($d_stakeholder->raci == 'r')
        {
            $stakeholders[] = $d_stakeholder->user_nama;
        }
    }

    $stakeholders = array_unique($stakeholders);

    $pekerjaan['messages'] = "Nama Pekerjaan: ".$d->nama."\n";
    $pekerjaan['messages'] .= "Stakeholders: \n - ";
    $pekerjaan['messages'] .= implode("\n - ", $stakeholders);

    $data[] = $pekerjaan;
}

echo json_encode($data);