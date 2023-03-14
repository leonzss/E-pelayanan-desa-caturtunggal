$(document).ready(function() {

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // Datatables
    $('#verifikator_verifikasi_user').DataTable();
    $('#verifikator_verifikasi_pengajuan_surat').DataTable();
    $('#verifikator_verifikasi_pengajuan_surat2').DataTable();
    $('#verifikator_verifikasi_pengaduan_layanan').DataTable();
    $('#verifikator_verifikasi_pengaduan_layanan2').DataTable();
    
    $('#rt_pengajuan_surat').DataTable();
    $('#rt_pengajuan_surat2').DataTable();
    $('#rt_pengaduan_layanan').DataTable();
    $('#rt_pengaduan_layanan2').DataTable();
    
    $('#rw_pengajuan_surat').DataTable();
    $('#rw_pengajuan_surat2').DataTable();
    $('#rw_pengaduan_layanan').DataTable();
    $('#rw_pengaduan_layanan2').DataTable();
    
    $('#kades_pengajuan_surat').DataTable();
    $('#kades_pengaduan_layanan').DataTable();
    
    $('#admin_informasi').DataTable();    
    
} );
