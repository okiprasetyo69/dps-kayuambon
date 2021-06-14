var tableListAbsence;

$(document).ready(function () {
    //Start Initializing libs
    var today = moment().format('YYYY-MM-DD');
    document.getElementById("absence_date").value = today;
    $('#absence_date').datepicker({
        "dateFormat": "yy-mm-dd",
    })
    //End Initializing libs

    //Start function
    listTableAbsence();
    //End function

    //Event trigger
    $('#search').on('keyup', function(){
        listTableAbsence()
    });
    $('#absence_date').on('change', function(){
        listTableAbsence()
    })
    //End Event trigger
})


function listTableAbsence(){
    var form = $("form")[0];
    var formdata = new FormData(form);
    $("#tableListAbsence").DataTable().clear().destroy();
    tableListAbsence = $("#tableListAbsence").DataTable({
        processing: true,
        serverSide: true,
        bLengthChange: false,
        searching: false,
        orderable: [
            [0, "desc"],
            [1, "asc"]
        ],
        language: {
            emptyTable: "Data tidak tersedia",
            zeroRecords: "Tidak ada data yang ditemukan",
            infoFiltered: "",
            infoEmpty: "",
            paginate: {
                previous: "‹",
                next: "›"
            },
            info: "Show _START_ till _END_ From _TOTAL_ Absence",
            aria: {
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            }
        },
        ajax: {
                url: "/api/listabsence",
                contentType: "application/json",
                type: "POST",
                data: function (d) {
                    //console.log(d);
                    var dataparam = {
                        draw: d.draw,
                        page: d.start / d.length + 1,
                        length: d.length,
                        search_text: $("#search").val(),
                        absence_date :  $("#absence_date").val(),
                    };
                    return JSON.stringify(dataparam);
                },
                dataSrc: function (response) {
                    console.log(response)
                    return response.data;
                }
        },
        columns: [
            {
                data: null,
                "width": "5%"
            },
            {
                data: "absence_date",
                "width": "15%"
            },
            {
                data: "name",
                "width": "35%"
            },
            {
                data: "position",
            },
            {
                data: null,
                "width": "15%"
            }
        ],
        columnDefs: [
            {
                targets: 0,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                    $(td).html(tableListAbsence.page.info().start + row + 1);
                }
            },
            {
                targets: 1,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                    let act_date = moment(rowData.absence_date).format('DD-MM-YYYY'); 
                    $(td).html(act_date);

                }
            },
            {
                targets: 2,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                }
            },
            {
                targets: 3,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");

                }
            },
            {
                targets: 4,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                    let name = rowData.name
                    let signature = rowData.signature_url
                    var html = "<label onclick='signatureDetail(\""+name+"\", \""+signature+"\")'><i class='fa fa-ellipsis-h'></i></label>";
                    $(td).html(html);
                }
            }
        ]
    });
}

function signatureDetail(name, signature){
    //console.log(name, signature);
    let img_signature = '<img src="http://localhost:8000/'+signature+'" style="width:100%; height:100%;" />';
    $('.img-signature').html('');
    $('#modal-title').html(name);
    $('.img-signature').append(img_signature);
    $("#modalSignature").modal("toggle");
}