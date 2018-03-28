Save file image
 $('#image').on('change',function(e){
            var files = e.target.files;
            var formdata= new FormData();
            formdata.append('file',$(this)[0].files[0]);
            formdata.append('id_roomcase',id);
            formdata.append('flag','roomcases');
            if(files[0].type=="image/jpeg"||files[0].type=="image/png") {
                $.ajax({
                    url: 'http://hidocter.dev-altamedia.com/room/store_file',
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        location.reload();
                    },
                    error: function (xhr, error, thrown) {
                        if(xhr.status==401){
                            location.href=xhr.responseJSON.url;
                        }

                    }
                });
            }


        });