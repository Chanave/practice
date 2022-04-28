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
    <title>Division</title>
</head>

<body>
    <p style=" text-align: center; font-size: 50px; background-color: rgb(201, 76, 76);">Division
    <p>

    <form class="container" action='{{URL("saveDivision")}}' method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="@if(isset($editDivision)){{$editDivision[0]->division_id}} @endif">
       



        <div class="mb-3">
            <label for="division_name" class="form-label"><i class="fas fa-file-signature"></i>division_id</label>
            <input type="text" class="form-control" id="division_id" name="division_id" @if(isset($editDivision)) readonly 
                @endif value="@if(isset($editDivision)){{$editDivision[0]->division_id}}@endif">              <!--readonly หมายถึง แก้ไม่ได้อ่านเท่านั้น-->

        </div>

       <div class="mb-3">
            <label for="division_name" class="form-label"><i class="fas fa-file-signature"></i>division_name</label>
            <input type="text" class="form-control" id="division_name" name="division_name" @if(isset($editDivision)) 
                @endif value="@if(isset($editDivision)){{$editDivision[0]->division_name}}@endif"><!--readonly-->

        </div>


        <div class="mb-3">
            <label for="dept_id" class="form-label"><i class="fas fa-file-signature"></i>dept_name</label>
            <select class="form-control" id="dept_id" name="dept_id">
            @foreach($department as $value)
                    <?php
                      $deptSelected = "";
                    ?>                
                 @if(isset($editdepartment))
                    @if ($editdepartment[0]->dept_id==$value->dept_id)
                        <?php
                          $deptSelected = "selected";
                        ?>
                    @endif
                  @endif
                  <option value="{{$value->dept_id}}" {{$deptSelected}}>{{$value->dept_name}}</option>
                @endforeach
            </select>

        </div>


        <button type="submit" class="btn btn-primary">SAVE</button><br>

        </from>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th width="5%" style="text-align: center" class="text-12px">Edit</th>
                    <th width="5%" style="text-align: center" class="text-12px">delete</th>
                    <th width="5%" style="text-align: center" class="text-12px">division_id</th>
                    <th width="5%" style="text-align: center" class="text-12px">division_name</th>
                    <th width="5%" style="text-align: center" class="text-12px">dept_name</th>
                </tr>
            </thead>
            <tbody>

                @foreach($data as $value)
                <tr>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("editDivision/".$value->division_id."")}}' class="btn btn-primary">Edit</a>
                        </div>

                    </td>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("deleteDivision/".$value->division_id."")}}' class="btn btn-danger">Delete</a>
                    </td>

                    <td class="text-center">
                        {{$value->division_id}}
                    </td>
                    <td class="text-center">
                        {{$value->division_name}}
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