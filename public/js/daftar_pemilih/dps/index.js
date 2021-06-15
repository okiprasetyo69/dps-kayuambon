var tableDps;
$(document).ready(function () {
    //console.log('Test')
    listTableDps();
    $(".loader").hide();
    $('#search').on('keyup paste', function(){
        listTableDps();
    });
});

function listTableDps() {
    var form = $("form")[0];
    var formdata = new FormData(form);
    $("#tableDps").DataTable().clear().destroy();
    tableDps = $("#tableDps").DataTable({
        processing: true,
        serverSide: true,
        bLengthChange: false,
        searching: false,
        orderable: [
            [0, "desc"],
            [1, "asc"],
        ],
        language: {
            emptyTable: "Data not available",
            zeroRecords: "Data not found",
            infoFiltered: "",
            infoEmpty: "",
            paginate: {
                previous: "‹",
                next: "›",
            },
            info: "Show _START_ till _END_ dari _TOTAL_ DPS",
            aria: {
                paginate: {
                    previous: "Previous",
                    next: "Next",
                },
            },
        },
        ajax: {
            url: "/api/dps/datatable",
            contentType: "application/json",
            type: "POST",
            data: function (d) {
                //console.log(d);
                var dataparam = {
                    draw: d.draw,
                    page: d.start / d.length + 1,
                    length: d.length,
                    search_text: $("#search").val(),
                };
                return JSON.stringify(dataparam);
            },
            dataSrc: function (response) {
                //console.log(response);
                return response.data;
            },
        },
        columns: [
            {
                data: null,
                width: "5%",
            },
            {
                data: "nkk",
            },
            {
                data: "nik",
            },
            {
                data: "nama",
            },
            {
                data: null,
                width: "15%",
            },
        ],
        columnDefs: [
            {
                targets: 0,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                    $(td).html(tableDps.page.info().start + row + 1);
                },
            },
            {
                targets: 1,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                },
            },
            {
                targets: 2,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                },
            },
            {
                targets: 3,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                },
            },
            {
                targets: 4,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                    let dps_id = rowData.id;
                    //console.log(id)
                    let html = "";
                    html =
                        "<div class='dropdown'>" +
                        "<button class='btn btn-light btn-sm' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>" +
                        "<i class='fa fa-ellipsis-h'></i>" +
                        "<span class='caret'></span>" +
                        "</button>" +
                        "<ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>" +
                        "<li><a class='text-dark detail' href='#' onclick='detail(" +
                        rowData.id +
                        ")' >Detail</a></li>" +
                        "<li><a class='text-dark edit' href='#' onclick='edit(" +
                        rowData.id +
                        ")'>Edit</a></li>" +
                        "<li><a class='text-dark' href='#' onclick='deleteDps(" +
                        rowData.id +
                        ")'>Delete</a></li>" +
                        "</ul>" +
                        "</div>";
                    $(td).html(html);
                },
            },
        ],
    });
}

function addDps() {
    clearForm();
    clearMessagedValidate()
    $("#modal-title-dps").html("Add DPS")
    $("#btn-save").show();
    $("#btn-save").attr('disabled', false);
    $("#modalAddDps").modal("toggle");
}

function importFile() {
    $("#modalImportFile").modal("toggle");
    
}

function detail(id) {
    jQuery.ajax({
        type: "get",
        url: "/api/dps/detail/" + id,
        beforeSend: function () {},
        success: function (response) {
            //console.log(response)
            $("#modal-title-dps").html("Detail DPS");

            $("#dps_id").val(response.id);
            $("#nkk").val(response.nkk);
            $("#nkk").attr("readonly", true);

            $("#nik").val(response.nik);
            $("#nik").attr("readonly", true);

            $("#nama").val(response.nama);
            $("#nama").attr("readonly", true);

            $("#tempat_lahir").val(response.tempat_lahir);
            $("#tempat_lahir").attr("readonly", true);

            $("#tgl_lahir").val(response.tgl_lahir);
            $("#tgl_lahir").attr("readonly", true);

            $("#tgl_lahir").val(response.nik);
            $("#tgl_lahir").attr("readonly", true);

            $("#kawin").val(response.kawin);
            $("#kawin").attr("readonly", true);

            $("#jenis_kelamin").val(response.jenis_kelamin);
            $("#jenis_kelamin").attr("readonly", true);

            $("#alamat").val(response.alamat);
            $("#alamat").attr("readonly", true);

            $("#rt").val(response.rt);
            $("#rt").attr("readonly", true);

            $("#rw").val(response.rw);
            $("#rw").attr("readonly", true);

            $("#difabel").val(response.difabel);
            $("#difabel").attr("readonly", true);

            $("#keterangan").val(response.keterangan);
            $("#keterangan").attr("readonly", true);

            $("#sumberdata").val(response.sumberdata);
            $("#sumberdata").attr("readonly", true);

            $("#tps").val(response.tps);
            $("#tps").attr("readonly", true);

            $("#btn-save").hide();
            clearMessagedValidate();
            $("#modalAddDps").modal("toggle");
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $.alert({
                title: "Message",
                content: "Failed get data",
            });
        },
        complete: function () {},
    });
}

function edit(id) {
    jQuery.ajax({
        type: "get",
        url: "/api/dps/detail/" + id,
        beforeSend: function () {},
        success: function (response) {
            $("#modal-title-dps").html("Edit");

            $("#dps_id").val(response.id);
            $("#nkk").val(response.nkk);
            $("#nkk").attr("readonly", false);

            $("#nik").val(response.nik);
            $("#nik").attr("readonly", false);

            $("#nama").val(response.nama);
            $("#nama").attr("readonly", false);

            $("#tempat_lahir").val(response.tempat_lahir);
            $("#tempat_lahir").attr("readonly", false);

            $("#tgl_lahir").val(response.tgl_lahir);
            $("#tgl_lahir").attr("readonly", false);

            $("#tgl_lahir").val(response.nik);
            $("#tgl_lahir").attr("readonly", false);

            $("#kawin").val(response.kawin);
            $("#kawin").attr("readonly", false);

            $("#jenis_kelamin").val(response.jenis_kelamin);
            $("#jenis_kelamin").attr("readonly", false);

            $("#alamat").val(response.alamat);
            $("#alamat").attr("readonly", false);

            $("#rt").val(response.rt);
            $("#rt").attr("readonly", false);

            $("#rw").val(response.rw);
            $("#rw").attr("readonly", false);

            $("#difabel").val(response.difabel);
            $("#difabel").attr("readonly", false);

            $("#keterangan").val(response.keterangan);
            $("#keterangan").attr("readonly", false);

            $("#sumberdata").val(response.sumberdata);
            $("#sumberdata").attr("readonly", false);

            $("#tps").val(response.tps);
            $("#tps").attr("readonly", false);

            $("#btn-save").show();
            $("#btn-save").attr('disabled', false);
            clearMessagedValidate()
            $("#modalAddDps").modal("toggle");
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $.alert({
                title: "Message",
                content: "Failed get data",
            });
        },
        complete: function () {},
    });
}

function deleteDps(id) {
    $.confirm({
        title: "Delete DPS",
        content: "Apa anda yakin akan menghapus data ini ?",
        buttons: {
            cancel: {
                text: "Cancel",
                btnClass: "btn-default",
            },
            confirm: {
                text: "Delete DPS",
                btnClass: "btn-danger",
                action: function () {
                    removeDps(id);
                },
            },
        },
    });
}

function removeDps(id) {
    jQuery.ajax({
        type: "post",
        url: "/api/dps/delete/" + id,
        beforeSend: function () {
            //$("body").loading();
        },
        success: function () {
            $.confirm({
                title: "Message",
                content: "Success delete DPS !",
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
            var errorMsg = "failed delete user";
            if (xhr.responseJSON) {
                errorMsg = xhr.responseJSON.message;
            }
        },
        complete: function () {
            //$("body").loading("stop");
        },
    });
}

function clearForm() {
    $("#dps_id").val("");
    $("#dps_id").attr("readonly", false);

    $("#nkk").val("");
    $("#nkk").attr("readonly", false);

    $("#nik").val("");
    $("#nik").attr("readonly", false);

    $("#nama").val("");
    $("#nama").attr("readonly", false);

    $("#tempat_lahir").val("");
    $("#tempat_lahir").attr("readonly", false);

    $("#tgl_lahir").val("");
    $("#tgl_lahir").attr("readonly", false);

    $("#kawin").val("");
    $("#kawin").attr("readonly", false);

    $("#jenis_kelamin").val("");
    $("#jenis_kelamin").attr("readonly", false);

    $("#alamat").val("");
    $("#alamat").attr("readonly", false);

    $("#rt").val("");
    $("#rt").attr("readonly", false);

    $("#rw").val("");
    $("#rw").attr("readonly", false);

    $("#difabel").val("");
    $("#difabel").attr("readonly", false);

    $("#keterangan").val("");
    $("#keterangan").attr("readonly", false);

    $("#sumberdata").val("");
    $("#sumberdata").attr("readonly", false);

    $("#tps").val("");
    $("#tps").attr("readonly", false);
}
