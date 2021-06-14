$(document).ready(function () {
    //Start Initializing libs
    var signaturePad = $('#signaturePad').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.signature('clear');
        $("#signature64").val('');
    });

    $('#absence_date').datepicker({
        dateFormat: "yy-mm-dd",
        minDate:0,
        maxDate:0,
        
    });
    //End Initilizing Libs
    //
    $('#btnSave').on('click', function(e){
        addAbsence();
    });
    
});

function addAbsence(){
    let absence_date = $('#absence_date').val();
    let name = $('#name').val();
    let position = $('#position').val();
    let signed = $('#signature64').val();
    if( (absence_date == "") || (name=="") || (position == "") || (signed == "") ){
        //alert("All field must be entered");
        $.alert({
            title: 'Message',
            content: 'All field must be entered',
        });
        return;
    }
    form = $('#frm-add').serialize();
    $.ajax({
        type: "POST",
        url: "/api/absence",
        data: form,
        success: function (response) {
            console.log(response)
            let success = response.success
            if(success){
                $.confirm({
                    title: 'Message ',
                    content: 'Absence has been submitted !',
                    buttons: {
                        somethingElse: {
                            text: 'Ok',
                            btnClass: 'btn-success',
                            keys: ['enter', 'shift'],
                            action: function(){
                                location.reload();
                            }
                        }
                    }
                });
            }
        }
    });
}
