<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <title>Document</title>

    <style>
        .form-control:focus {
           border: 1px solid pink !important;
            box-shadow: 0 0 0 0.2rem pink
                /* box-shadow: none; */
        }

        #show {
            display: none;
            color: red;
            text-align: center;
            margin-top:10px;
            border: 2px solid pink !important;
        }
        #show1{
            display: none;
        }

        div h1 {
            background-color: pink;
            padding: 12px 0;
        }

     
        input[type=time],input[type=date]{
            border-color:pink;
            background-color:pink;
           
        }


        .button {
            background-color: pink !important;
            color:black !important;
            box-shadow: none !important;
           border-color:pink !important;
           font-weight:bold;
        }
        .label{
            font-size:20px;
            font-weight:bold;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center "> Age Calculator</h1>
            <form class="col-md-4 mx-auto mt-4" id="myform">
                <div class="label">Choose Date</div>
                <input type="date" name="bdate" class="form-control" ><br>
                <div  class="label">Choose Time</div> 
                <input type="time" name="time" class="form-control" step="1"required ><br>
                <input type="submit" name="submit" value="Calculate" class="btn btn-primary button col-12 mt-3" id="submit"><br>
                <div class="label mt-4" id="show1">Your Current Age Is:</div>
                <div id="show" class="form-control "></div>
            </form>
        </div>
    </div>

</body>
<script>
    $(document).ready(function () {
        $("#submit").click(function (e) {
            e.preventDefault();
            $('#show').css('display', 'block');
            $.ajax({
                url: 'calculate.php',
                type: 'POST',
                data: $('#myform').serialize(),
                success: function (data) {
                    console.log(data);
                    if(data!="**Invalid DOB" && data!="**Feild Is Blank"){
                        $('#show1').css('display', 'block');
                    }
                    
                    $("#show").html(data);
                }
            });
            setInterval(myfun, 1000);

        });

    });

    function myfun() {
        $.ajax({
            url: 'calculate.php',
            type: 'POST',
            datatype: 'html',
            data: $('#myform').serialize(),
            success: function (data) {
                if(data!="**Invalid DOB" &&data!="**Feild Is Blank"){
                        $('#show1').css('display', 'block');
                    }
                $("#show").html(data);
            }
        });
    }

</script>

</html>