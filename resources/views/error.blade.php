<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JS Survey</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">

    <!-- Styles -->

</head>

<body>

    <div class="container">


            <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-5">
        
                            <div class="panel panel-body">
                                <div class="alert alert-danger">
                                    <h2>Oops!</h2>
                                    <p>
                                        Something isn't right.
                                        Please use the link provided to you when you were invited to the survey
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
        
                </div>  

    </div>
</body>

</html>