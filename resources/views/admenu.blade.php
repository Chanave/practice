<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <title>kindeeAdMenu</title>
</head>

<body style="font-family: 'Mitr', sans-serif;">
    <p style=" text-align: center; font-size: 50px; background-color: rgb(201, 76, 76);">kindeeAdMenu
    <p>

    <form class="container" action='{{URL("saveMenu")}}' method="POST"
        action="http://www.javatpoint.com/javascriptpages/valid.jsp" onsubmit="return validateform()">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="@if(isset($editMenu)){{$editMenu[0]->kin_id}} @endif">



        <div class="mb-3">
            <label for="kin_id" class="form-label"><i class="fas fa-file-signature"></i>kin_id</label>
            <input type="number" class="form-control" id="kin_id" name="kin_id" @if(isset($editMenu)) readOnly @endif
                value="@if(isset($editMenu)){{$editMenu[0]->kin_id}}@endif">

        </div>
        <div class="mb-3">
            <label for="kin_Date" class="form-label"><i class="fas fa-file-signature"></i>kin_Date</label>
            <input type="date" class="form-control" id="kin_date" name="kin_date" @if(isset($editMenu)) @endif
                value="@if(isset($editMenu)){{$editMenu[0]->kin_date}}@endif">

        </div>

        <div class="mb-3">
            <label for="kin_Menu" class="form-label"><i class="fas fa-file-signature"></i>kin_Menu</label>
            <input type="text" class="form-control" id="kin_menu" name="kin_menu"
                value="@if(isset($editMenu)){{$editMenu[0]->kin_menu}}@endif">

        </div>


        <button type="submit" class="btn btn-primary" onsubmit="return validateform()">SAVE</button><br>

        </from>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%" style="text-align: center" class="text-12px">Edit</th>
                    <th width="5%" style="text-align: center" class="text-12px">delete</th>
                    <th width="5%" style="text-align: center" class="text-12px">id</th>
                    <th width="5%" style="text-align: center" class="text-12px">Date</th>
                    <th width="5%" style="text-align: center" class="text-12px">Menu</th>


                </tr>
            </thead>
            <tbody>

                @foreach($data as $value)
                <tr>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("editMenu/".$value->kin_id."")}}' class="btn btn-primary">Edit</a>
                        </div>

                    </td>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("deleteMenu/".$value->kin_id."")}}' class="btn btn-danger">Delete</a>
                    </td>
                    <td class="text-center">
                        {{$value->kin_id}}
                    </td>

                    <td class="text-center">
                        {{$value->kin_date}}
                    </td>
                    <td class="text-center">
                        {{$value->kin_menu}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </form>


</body>
<script type='text/javascript'>
function validateform() {
    var kin_id = $("#kin_id").val();
    var kin_date = $("#kin_date").val();
    var kin_menu = $("#kin_menu").val();
    if (kin_id == "") {
        alert("กรุณาใส่ kin_id");
        return false;
    } else if (kin_date == "") {
        alert("กรุณาใส่ kin_date");
        return false;

    } else if (kin_menu == "") {
        alert("กรุณาใส่ kin_menu");
        return false;
    }
}
</script>

</html>