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
    <title>Department</title>
</head>

<body>
    <p style=" text-align: center; font-size: 50px; background-color: rgb(201, 76, 76);">Department
    <p>

    <form class="container" action='{{URL("saveDepartment")}}' method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="@if(isset($editDepartment)){{$editDepartment[0]->dept_id}} @endif">



        <div class="mb-3">
            <label for="dept_name" class="form-label"><i class="fas fa-file-signature"></i>dept_id</label>
            <input type="name" class="form-control" id="dept_id" name="dept_id" @if(isset($editDepartment)) readonly
                @endif value="@if(isset($editDepartment)){{$editDepartment[0]->dept_id}}@endif">

        </div>

        <div class="mb-3">
            <label for="dept_name" class="form-label"><i class="fas fa-file-signature"></i>dept_name</label>
            <input type="name" class="form-control" id="dept_name" name="dept_name"
                value="@if(isset($editDepartment)){{$editDepartment[0]->dept_name}}@endif">

        </div>


        <button type="submit" class="btn btn-primary">SAVE</button><br>

        </from>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%" style="text-align: center" class="text-12px">Edit</th>
                    <th width="5%" style="text-align: center" class="text-12px">delete</th>
                    <th width="5%" style="text-align: center" class="text-12px">Dept_id</th>
                    <th width="5%" style="text-align: center" class="text-12px">Dept_name</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach($data as $value)
                <tr>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("editDepartment/".$value->dept_id."")}}' class="btn btn-primary">Edit</a>
                        </div>

                    </td>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("deleteDepartment/".$value->dept_id."")}}' class="btn btn-danger">Delete</a>
                    </td>

                    <td class="text-center">
                        {{$value->dept_id}}
                    </td>
                    <td class="text-center">
                        {{$value->dept_name}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>