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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <title>Menu</title>
</head>

<body style="font-family: 'Mitr', sans-serif;">
    <p style=" text-align: center; font-size: 50px; background-color: rgb(201, 76, 76);">kindeemenu
    <p>

    <form class="container" action='{{URL("saveMenu")}}' method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="@if(isset($editMenu)){{$editMenu[0]->kin_menu}} @endif">






        </from>
        <br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="5%" style="text-align: center" class="text-12px">Date</th>
                    <th scope="col" width="5%" style="text-align: center" class="text-12px">Menu</th>

                </tr>
            </thead>
            <tbody>
                <?php 
        
        $datenow = date('Y-m-d');
        ?>
                @foreach($data as $value)
                <tr>

                    <td class="text-center" scope="row">
                        {{$value->kin_date}}
                    </td>


                    <td class="text-center" scope="row">
                        <?php $disabled = "";?>
                        @if ($value->kin_date <= $datenow)
                            <?php 
                                $disabled = "disabled";
                            ?>
                        @endif
                        <input type="checkbox" name="brand[]" {{$disabled}} checked> {{$value->kin_menu}}

                    </td>

                </tr>

                @endforeach
            </tbody>

        </table>

    </form>

    <div class="container">
        <button type="submit" class=" btn btn-success  ">จองอาหาร</button><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>