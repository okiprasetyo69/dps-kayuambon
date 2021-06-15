

$(document).ready(function () {
    //Create or Update
    $("body").on("submit", "#frm-add-dps", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/api/dps",
            data: new FormData(this),
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#btn-save").attr("disabled", true);
            },
            success: function (response) {
                //console.log(response);
                document.getElementById("frm-add-dps").reset();
                $("#modalAddDps").modal("toggle");
                $.confirm({
                    title: "Message ",
                    content: "Data berhasil diubah atau ditambahkan !",
                    buttons: {
                        somethingElse: {
                            text: "Ok",
                            btnClass: "btn-success",
                            keys: ["enter", "shift"],
                            action: function () {
                                tableDps.ajax.reload();
                            },
                        },
                    },
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showMessageValidate(xhr)
                $("#btn-save").attr("disabled", false);
            },
        });
    });

    //Import file
    $("body").on("submit", "#frm-import-file", function(e){
        e.preventDefault();
        //console.log('Masuk')
        //return ;
        $.ajax({
            type: "POST",
            url: "/api/dps/import",
            data: new FormData(this),
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#btn-import").attr("disabled", true);
                $("#modalImportFile").modal("toggle");
                $(".loader").show();
            },
            success: function (response) {
                console.log(response);
                document.getElementById("frm-add-dps").reset();
                //$("#modalImportFile").modal("toggle");
                $(".loader").hide();
                $.confirm({
                    title: "Message ",
                    content: "Data berhasil di import !",
                    buttons: {
                        somethingElse: {
                            text: "Ok",
                            btnClass: "btn-success",
                            keys: ["enter", "shift"],
                            action: function () {
                                tableDps.ajax.reload();
                            },
                        },
                    },
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#btn-save").attr("disabled", false);
            },
            complete: function () {
                $("#modalImportFile").find("#loading").hide();
            },
        });
    });
});

function showMessageValidate(xhr){
    $("#err_nkk").html("");
    $("#err_nik").html("");
    $("#err_nama").html("");
    $("#err_tempat_lahir").html("");
    $("#err_tgl_lahir").html("");
    $("#err_kawin").html("");
    $("#err_jenis_kelamin").html("");
    $("#err_alamat").html("");
    $("#err_rt").html("");
    $("#err_rw").html("");
    $("#err_difabel").html("");
    $("#err_keterangan").html("");
    $("#err_sumber_data").html("");
    $("#err_tps").html("");
    let err_nkk = xhr.responseJSON.nkk;
    let err_nik = xhr.responseJSON.nik;
    let err_nama =  xhr.responseJSON.nama;
    let err_tempat_lahir =  xhr.responseJSON.tempat_lahir;
    let err_tgl_lahir =  xhr.responseJSON.tgl_lahir;
    let err_kawin =  xhr.responseJSON.kawin;
    let err_jenis_kelamin =  xhr.responseJSON.jenis_kelamin;
    let err_alamat =  xhr.responseJSON.alamat;
    let err_rt =  xhr.responseJSON.rt;
    let err_rw =  xhr.responseJSON.rw;
    let err_difabel =  xhr.responseJSON.difabel;
    let err_keterangan =  xhr.responseJSON.keterangan;
    let err_sumber_data =  xhr.responseJSON.sumberdata;
    let err_tps =  xhr.responseJSON.tps;
    $("#err_nkk").html(err_nkk).attr("class", "badge badge-danger");
    $("#err_nik").html(err_nik).attr("class", "badge badge-danger");
    $("#err_nama").html(err_nama).attr("class", "badge badge-danger");
    $("#err_tempat_lahir").html(err_tempat_lahir).attr("class", "badge badge-danger");
    $("#err_tgl_lahir").html(err_tgl_lahir).attr("class", "badge badge-danger");
    $("#err_kawin").html(err_kawin).attr("class", "badge badge-danger");
    $("#err_jenis_kelamin").html(err_jenis_kelamin).attr("class", "badge badge-danger");
    $("#err_alamat").html(err_alamat).attr("class", "badge badge-danger");
    $("#err_rt").html(err_rt).attr("class", "badge badge-danger");
    $("#err_rw").html(err_rw).attr("class", "badge badge-danger");
    $("#err_difabel").html(err_difabel).attr("class", "badge badge-danger");
    $("#err_keterangan").html(err_keterangan).attr("class", "badge badge-danger");
    $("#err_sumber_data").html(err_sumber_data).attr("class", "badge badge-danger");
    $("#err_tps").html(err_tps).attr("class", "badge badge-danger");
}
function clearMessagedValidate(){
    $("#err_nkk").html("");
    $("#err_nik").html("");
    $("#err_nama").html("");
    $("#err_tempat_lahir").html("");
    $("#err_tgl_lahir").html("");
    $("#err_kawin").html("");
    $("#err_jenis_kelamin").html("");
    $("#err_alamat").html("");
    $("#err_rt").html("");
    $("#err_rw").html("");
    $("#err_difabel").html("");
    $("#err_keterangan").html("");
    $("#err_sumber_data").html("");
    $("#err_tps").html("");
}