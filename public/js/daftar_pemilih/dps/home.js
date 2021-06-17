$(document).ready(function () {
    //console.log('test')
    $('#dps-card').hide();
    $('#btn-reset').hide();
    $('#btn-reset').on('click', function(e){
        e.preventDefault
        $('#nik').html("");
        $('#nik').val("");
        $('#nik').focus(); 
        $('#dps-card').hide();
        $('#btn-reset').hide();
        clearElement();
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
                    //let row_data = '';
                    let jenis_kelamin = response.jenis_kelamin;
                    //let male =  "{!! asset('images/user_male.jpg') !!}";
                    //let female =  "{!! asset('images/user_female.png') !!}";
                    let male =  "http://localhost:8000/images/user_male.jpg";
                    let female =  "http://localhost:8000/images/user_female.png";
                  
                    $('#dps-card').show();
                    $('#btn-reset').show();
                    
                    clearElement();
                    //row_data= '<tr class="text-center"><td> '+response.nkk+' </td><td>'+response.nik+'</td><td>'+response.nama+'</td><td>'+response.tempat_lahir+'</td><td>'+response.tgl_lahir+'</td><td>'+response.kawin+'</td><td>'+response.alamat+'</td><td>'+response.rt+'</td><td>'+response.rw+'</td><td>'+response.difabel+'</td><td>'+ response.keterangan +'</td><td>'+response.sumberdata+'</td><td>'+response.tps+'</td> </tr>';
                    if(jenis_kelamin == "L"){
                        $("#img-dps").attr('src', male)
                    } else {
                        $('#img-dps').attr('src', female)
                    }   

                    $('#nama').html('Nama : ' +response.nama);
                    $('#alamat').html('Alamat : ' +response.alamat);
                    $('#nkk').html('NKK : ' + response.nama);
                    $('#nik-card').html('NIK : ' +response.nik);
                    $('#jenis_kelamin').html('Jenis Kelamin : ' + response.jenis_kelamin);
                    $('#kawin').html('Kawin : ' + response.kawin);
                    $('#tempat_lahir').html('Tempat Lahir : ' + response.tempat_lahir);
                    $('#tgl_lahir').html('Tanggal Lahir : ' +response.tgl_lahir);
                    $('#rt').html('RT : ' + response.rt);
                    $('#rw').html('RW : ' + response.rw);
                    $('#difabel').html('Difabel : ' + response.difabel);
                    $('#keterangan').html('Keterangan : ' + response.keterangan);
                    $('#sumberdata').html('Sumber Data : ' + response.sumberdata);
                    $('#tps').html('TPS : ' + response.tps);
                }              
            }
        });
        
    });
});

function clearElement(){
    $('#nama').html("");
    $('#alamat').html("");
    $('#nkk').html("");
    $('#nik-card').html("");
    $('#nama').html("");
    $('#jenis_kelamin').html("");
    $('#kawin').html("");
    $('#tempat_lahir').html("");
    $('#tgl_lahir').html("");
    $('#rt').html("");
    $('#rw').html("");
    $('#difabel').html("");
    $('#keterangan').html("");
    $('#sumberdata').html("");
    $('#tps').html("");
}