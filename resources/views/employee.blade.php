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
    <title>Employee</title>

</head>

<body>

    <p style=" text-align: center; font-size: 50px; background-color: rgb(201, 76, 76);">Employee
    <p>

        <!-------------------------------------------------------------------------------- From --------------------------------------------------------------------------->
    <form class="container" name="myform" action='{{URL("saveEmployee")}}' method="POST"
        action="http://www.javatpoint.com/javascriptpages/valid.jsp" onsubmit="return validateform()">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="@if(isset($editEmployee)){{$editEmployee[0]->emp_id}} @endif">

        <div class="mb-3">
            <label for="emp_name" class="form-label"><i class="fas fa-file-signature"></i>emp_id</label>
            <input type="text" class="form-control" id="emp_id" name="emp_id" title="55555" @if(isset($editEmployee)) readonly @endif
                value="@if(isset($editEmployee)){{$editEmployee[0]->emp_id}}@endif">
        </div>

        <div class="mb-3">
            <label for="emp_name" class="form-label"><i class="fas fa-file-signature"></i>emp_name</label>
            <input type="text" class="form-control" id="emp_name" name="emp_name"
                value="@if(isset($editEmployee)){{$editEmployee[0]->emp_name}}@endif">
        </div>

        <div class="mb-3">
            <label for="emp_lastname" class="form-label"><i class="fas fa-file-signature"></i>emp_lastname</label>
            <input type="text" class="form-control" id="emp_lastname" name="emp_lastname"
                value="@if(isset($editEmployee)){{$editEmployee[0]->emp_lastname}}@endif">
        </div>

        <div class="mb-3">
            <label for="emp_tel" class="form-label"><i class="fas fa-file-signature"></i>emp_tel</label>
            <input type="number" class="form-control" id="emp_tel" name="emp_tel"
                value="@if(isset($editEmployee)){{$editEmployee[0]->emp_tel}}@endif">
        </div>
        <!-- Dropdown dept_name -->
        <div class="mb-3">
            <label for="dept_name" class="form-label"><i class="fas fa-file-signature"></i>dept_name</label>
            <select class="form-control" id="dept_name" name="dept_name">
                <option value="">กรุณาเลือก Department</option>
                @foreach($department as $value)
                <?php
                      $deptSelected = "";
                    ?>
                @if(isset($editDepartment))
                @if ($editDepartment[0]->dept_name==$value->dept_id)
                <?php
                          $deptSelected = "selected";
                        ?>
                @endif
                @endif
                <option value="{{$value->dept_id}}" {{$deptSelected}}>{{$value->dept_name}}</option>
                @endforeach
            </select>

        </div>

        <!-- Dropdown division_name -->
        <div class="mb-3">
            <label for="division_id" class="form-label"><i class="fas fa-file-signature"></i>division_name</label>
            <select class="form-control" id="division_id" name="division_id" disabled>
            </select>

        </div>

        <button type="submit" class="btn btn-primary" onsubmit="return validateform()">SAVE</button><br>

        </from>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <br>
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th width="5%" style="text-align: center" class="text-12px">Edit</th>
                    <th width="5%" style="text-align: center" class="text-12px">delete</th>
                    <th width="5%" style="text-align: center" class="text-12px">emp_id</th>
                    <th width="5%" style="text-align: center" class="text-12px">emp_name</th>
                    <th width="5%" style="text-align: center" class="text-12px">emp_lastname</th>
                    <th width="5%" style="text-align: center" class="text-12px">emp_tel</th>
                    <th width="5%" style="text-align: center" class="text-12px">dept_name</th>
                    <th width="5%" style="text-align: center" class="text-12px">division_name</th>
                </tr>
            </thead>
            <tbody>
                <!-- Edit -->
                @foreach($data as $value)
                <tr>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("editEmployee/".$value->emp_id."")}}' class="btn btn-primary">Edit</a>
                        </div>
                        <!-- Delete -->
                    </td>
                    <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("deleteEmployee/".$value->emp_id."")}}' class="btn btn-danger">Delete</a>
                    </td>

                    <td class="text-center">
                        {{$value->emp_id}}
                    </td>
                    <td class="text-center">
                        {{$value->emp_name}}
                    </td>
                    <td class="text-center">
                        {{$value->emp_lastname}}
                    </td>
                    <td class="text-center">
                        {{$value->emp_tel}}
                    </td>
                    <td class="text-center">
                        {{$value->dept_name}}
                    </td>
                    <td class="text-center">
                        {{$value->division_name}}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    </form>
    <!--dept_name-->
    <!--division_id-->

</body>
  <!-- Script -->
  <script type='text/javascript'>
    $(document).ready(function() {
        // Department Change
        $('#dept_name').change(function() {
            $("#division_id").prop("disabled", false);
            // Department id
            var id = $(this).val();
            var token = $("#_token").val();

            // AJAX request 
            $.ajax({
                url: 'divisionById',
                type: 'post',
                data: {
                    'id': id,
                    '_token': token
                },

            }).done(function(response) {

                $("#division_id").empty();

                if (response.length == 0) {
                    alert("ไม่พบแผนกในสังกัดฝ่ายบุคคล");
                    $("#division_id").prop("disabled", true);
                } else {
                    $("#division_id").append("<option value=''>กรุณาเลือก Division</option>");
                    for (var i = 0; i < response.length; i++) {
                        $("#division_id").append('<option value=' + response[i]['division_id'] +
                            '>' + response[i]['division_name'] + '</option>');
                    }
                }

            });
        });

    });
  
        function validateform() {
            var emp_id = $("#emp_id").val();
            var emp_name =  $("#emp_name").val();
            var emp_lastname = $("#mp_lastname").val();
            var emp_tel = $("#emp_tel").val();
            var dept_name = $("#dept_name").val();
            var division_id = $("#division_id").val();
            if (emp_id == "") {
                alert("กรุณาใส่ Emp_ID");
                return false;
            } else if (emp_name == "") {
                alert("กรุณาใส่ emp_name");
                return false;

            } else if (emp_lastname == "") {
                alert("กรุณาใส่ emp_lastname");
                return false;
           
            }else if (emp_tel.length < 10 || emp_tel.length > 10) {
                alert("กรุณาใส่ emp_tel ให้ครบ 10 ตัว");
                return false;
            
            } else if (dept_name == "") {
                alert("กรุณาใส่ dept_name");
                return false;
            
            } else if (division_id == "") {
                alert("กรุณาใส่ division_id");
                return false;
        
            } 
        }    
    </script>
</html>