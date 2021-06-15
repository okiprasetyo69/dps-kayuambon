

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