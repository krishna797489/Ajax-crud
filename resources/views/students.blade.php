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
    <div class="container">
        <table class="table" border="1" id="students-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
          </table>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> {{--ye jquery ki link lagana jruri hea  --}}

<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "{{ route('listStudent') }}",
            success: function(data) {
                console.log(data);
                if (data.students.length > 0) {
                    for (let i = 0; i < data.students.length; i++) {
                        let img = data.students[i]['image'];
                        $("#students-table").append(
                            `<tr>
                                <td>` + (i + 1) + `</td>
                                <td>` + (data.students[i]['name']) + `</td>
                                <td>` + (data.students[i]['email']) + `</td>
                                <td>
                                    <img src="public/images` + img + `"  width="100px" height="30px" />
                                </td>
                            </tr>`
                        );
                    }
                } else {
                    $("#students-table").append("<tr><td colspan='4'>Data Not Found</td></tr>");
                }
            },
            error: function(err) {
                console.log(err.responseText);
            }
        });
    });
</script>

</html>
