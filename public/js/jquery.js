    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // read();
        loadData();
        // load_list(page);
    });

    // Read Database
    function loadData() {
        // $('tbody').html('');
        $.ajax({
            url : "{{ url('konsultasi.index') }}",
            type : 'GET',
            dataType: 'json',
            success: function(data){
                $.each(data, function(key, values){
                });
                    // console.log(response.data);        
            }
        });
    }
    // function read() {
    //     $.get("{{ url('read') }}", {}, function(data, status) {
    //         $(#read).html(data);
    //     });
    // }
//     function main_content(obj){
//     $("#layoutSidenav_content").hide();
//     $("#" + obj).show();
// }

//     function load_list(page){
//         $.get('?page=' + page, $('#content_filter').serialize(), function(result) {
//             $('#list_result').html(result);
//             main_content('layoutSidenav_content');
//         }, "html");
//     }

    // Modal Create
    function create() {
        $.get("{{ url('input')  }}",{},function(data,status){
            $("#exampleModalLabel").html('Tambah Konsultasi')
            $("#page").html(data);
            $("#exampleModal").modal('show');
            loadData();
        });
        
    }

    // Modal Create Data
    function save(form, url, method) {      
        var data = $(form).serialize()


        $.ajax({
            type:method,
            url:url,
            data: data,
            dataType: "json",
            success:function(response){
                // console.log(response.errors.keluhan,tanggal_konsultasi,waktu_konsultasi);
                if(response.status == 400)
                {
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_values) {
                        $('#saveform_errList').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    toastr.success('Data Berhasil Dibuat', 'Success');
                    $("#exampleModal").modal('hide');
                    loadData();
                }
                
            }
        });
    }

    // Modal Show
    function show(id) {
        $.get("{{ url('show') }}/" + id,{},function(data,status){
            $("#exampleModalLabel").html('Edit Konsultasi')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
        
    }

    // Modal update data 
    // function update(id) {
    //     var data = {
    //         'nama':$('#nama').val(),
    //         'nim':$('#nim').val(),
    //         'keluhan':$('#keluhan').val(),
    //         'tanggal_konsultasi':$('#tanggal_konsultasi').val(),
    //         'waktu_konsultasi':$('#waktu_konsultasi').val(),
    //     }

    //     $.ajax({
    //         type:"post",
    //         url:"{{ url('update') }}/" + id,
    //         data: data,
    //         success:function(data){
    //             $(".btn-close").click();
    //             toastr.success('Data Berhasil Diubah', 'Success');
    //             // read()
    //         }
    //     });
    // }

    // Modal Show
    // function tunjukkan(id) {
    //     $.get("{{ url('tunjukkan') }}/" + id,{},function(data,status){
    //         $("#exampleModalLabel2").html('Edit Comment')
    //         $("#page").html(data);
    //         $("#exampleModal").modal('show');
    //     });
        
    // }

    // Modal update data 
    // function perbarui(id) {
    //     var data = {
    //         'username':$('#username').val(),
    //         'komentar':$('#komentar').val(),
    //     }

    //     $.ajax({
    //         type:"get",
    //         url:"{{ url('perbarui') }}/" + id,
    //         data: data,
    //         success:function(data){
    //             $(".btn-close").click();
    //             // read()
    //         }
    //     });
    // }