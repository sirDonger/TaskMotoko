<html>
<head>
    <title>HTML</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card card-default">
                    <div class="card-header">
                        Select script:
                    </div>
                    <div class="card-body">
                        <select id="script_selector">
                            <option>
                                    empty
                            </option>
                        </select>

                        <input type="text" disabled>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-default">
                    <div class="card-header">
                        Ener name here:
                    </div>
                    <div class="card-body">
                        <input id="input_text" type="text" >
                        <button id="confirm_button">Confirm</button>
                        <div class="row" id="name_holder" >
                            <div class="col-4" style="border: 1px solid black;margin-top: 5px ">
                                <h5>Name</h5>
                                <p>first name</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>

</div>
<script>
    window.token = '{{csrf_token()}}'
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="soluttion/main.js"></script>

</body>