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
    <title>Line Notify</title>
</head>


<body style="font-family: 'Mitr', sans-serif;">


    <p style=" text-align: center; font-size: 50px; background-color: rgb(201, 76, 76);">LineNotify
    <p>
    <form class="container" action='{{URL("saveLine")}}' method="POST">
    @foreach($data as $value)

@endforeach

@foreach($li as $line)
@endforeach


        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
            <label for="line_id" class="form-label"><i class="fas fa-file-signature"></i>line_id</label>
            <input type="text" class="form-control" id="line_id" name="line_id">
        </div>
        <div class="mb-3">
            <label for="line_box" class="form-label"><i class="fas fa-file-signature"></i>line_box</label>
            <input type="text" class="form-control" id="line_box" name="line_box">
        </div>
        <div class="mb-3">
            <label for="line_date" class="form-label"><i class="fas fa-file-signature"></i>line_date</label>
            <input type="date" class="form-control" id="line_date" name="line_date">
        </div>

        <td class="text-center">
                        <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white ">
                            <a href='{{URL("deleteLine/".$value->line_id."")}}' class="btn btn-danger">Delete</a>
        </td>


        <button type="submit" value="Submit" class="btn btn-primary">ส่งข้อความ</button>
    </form>



    <?php
    
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");
        $d=strtotime("yesterday");
        $now = date("d", $d)."/".date("m")."/".(date("Y")+543);
        /////////////////////////////////////////////////////
        $sToken = "YIyR5wMAacZypMtDbjmNaZeUoGPoxejVsOlI1i5ZoqC"; 
        $sMessage = "ยอดขายวันที่". $now ."\n"
                    ."ยอดขาย : $line->line_box"."\n"
                    ."จำนวนลูกค้า : ";

        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 
        
   //Result error 
    /*if(curl_error($chOne)) 
    { 
        echo 'error:' . curl_error($chOne); 
    } 
    else { 
        $result_ = json_decode($result, true); 
        echo "status : ".$result_['status']; echo "message : ". $result_['message'];
    } 
   curl_close( $chOne ); */  
    ?>
</body>

</html>