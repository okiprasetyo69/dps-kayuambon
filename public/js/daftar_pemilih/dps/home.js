$(document).ready(function () {
    //console.log('test')
    $('#btn-reset').on('click', function(e){
        e.preventDefault
        $('#rowData').html("");
        $('#nik').html("");
        $('#nik').val("");
    });
    $("body").on("submit", "#frm-filter-dps", function (e) {
        e.preventDefault();
        let nik = $('#nik').val();
        //console.log('test')
        $.ajax({
            type: "get",
            url: "/api/dps/nik/" + nik,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                //console.log(response)
                if(response == "" || response == undefined){
                    $.confirm({
                        title: "Pesan",
                        content: "Data tidak ditemukan !",
                        buttons: {
                            confirm: {
                                text: "Ok",
                                btnClass: "btn-info",
                                action: function () {
                                    $('#nik').val("");
                                    $('#nik').html("")
                                },
                            },
                        },
                    });
                } else {
                    let row_data = '';
                    //let keterangan = response.keterangan == null ? 0 : response.keterangan
                    row_data= '<tr class="text-center"><td> '+response.nkk+' </td><td>'+response.nik+'</td><td>'+response.nama+'</td><td>'+response.tempat_lahir+'</td><td>'+response.tgl_lahir+'</td><td>'+response.kawin+'</td><td>'+response.alamat+'</td><td>'+response.rt+'</td><td>'+response.rw+'</td><td>'+response.difabel+'</td><td>'+ response.keterangan +'</td><td>'+response.sumberdata+'</td><td>'+response.tps+'</td> </tr>';
                    $('#rowData').html("");
                    $('#rowData').append(row_data);
                }              
            }
        });
        
    });
});
