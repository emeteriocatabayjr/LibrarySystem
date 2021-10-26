<script>
    $(document).ready(function(){
        $('#addbook_form').on("submit", function(event){  
            event.preventDefault();  
            if($('#booktitle').val() == ""){  
                alert("Book Title is required");  
            }  
            else if($('#category').val() == ''){  
                alert("Category is required");  
            }  
            else if($('#author').val() == ''){  
                alert("Author is required");  
            }
            else if($('#publishername').val() == ''){  
                alert("Publisher Name is required");  
            }
            else if($('#datepublished').val() == ''){  
                alert("Date Published is required");  
            }
            else if($('#copies').val() == ''){  
                alert("Copies is required");  
            }
            else{  
                $.ajax({  
                    url:"allbooks_insert.php",  
                    method:"POST",
                    data:$('#addbook_form').serialize(),  
                    beforeSend:function(){  
                        $('#addbtn').val("Inserting");  
                    },  
                    success:function(data){  
                        $('#addbook_form')[0].reset();  
                        $('#addbook_modal').modal('hide');  
                        $('#result').html(data);
                    }  
                });  
            }  
        });
    });

    $(document).on('click', '#editbtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
           url:"allbooks_update.php",
           method:"POST",
           data:{borrower_id:borrower_id},
           success:function(data){
            $('#borrower_detail').html(data);
            $('#editbook_modal').modal('show');
        }
    });
    });

    $(document).on('click', '#deletebtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
           url:"allbooks_delete.php",
           method:"POST",
           data:{borrower_id:borrower_id},
           success:function(data){
            $('#borrower_detail').html(data);
            $('#editbook_modal').modal('show');
        }
    });
    });

    $(document).on('click', '#uploadbtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
            url:"allbooks_upload.php",
            method:"POST",
            data:{borrower_id:borrower_id},
            success:function(data){
                $('#borrower_photo').html(data);
                $('#upload_modal').modal('show');
            }
        });
    });

    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"allbooks_fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });


    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


</script>