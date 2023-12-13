<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
     <div class="container my-5">
        <form id="my-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label  class="form-label">Name</label>
              <input type="name" name="name" class="form-control">
            </div>
            <div class="mb-3">
              <label  class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" >
            </div>
            <div class="mb-3">
              <label  class="form-label">File</label>
              <input type="file" name="image" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
          </form>
          <span id="output"></span>
     </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> {{--ye jquery ki link lagana jruri hea  --}}
<script>
    $(document).ready(function(){
        $("#my-form").submit(function(event){
            event.preventDefault();
            var form=$("#my-form")[0];
            var data=new FormData(form);
            $("#btnSubmit").prop("disabled",true);

            $.ajax({
                type:"POST",
                url:"{{route('addStudent')}}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                  $("#output").text(data.res);
                    $("#btnSubmit").prop("disabled",false);
                    $("input[type='name']").val('');
                    $("input[type='email']").val('');
                    $("input[type='file']").val('');
                },
                error:function(e){
                    $("#output").text(e.responseText);
                    $("#btnSubmit").prop("disabled",false);
                    $("input[type='name']").val('');
                    $("input[type='email']").val('');
                    $("input[type='file']").val('');
                }

            });
        });
    });
</script>
</html>
