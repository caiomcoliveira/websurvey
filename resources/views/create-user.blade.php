<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JS Survey</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Styles -->

</head>

<body>
    <div id="modal-info" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">JS Survey</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>In this survey, you will be asked to predict the output of JavaScript code snippets.
                        The entire survey has only 10 questions, all of them with fewer than 15 lines.
                        For each question, you will be asked to fill in the text box with
                        the output the program would yield if it were run.
                    </p>
                    <p><b>Please try your best to focus for the next minutes. </b></p>
                    <p>We suggest that you take the survey in a quiet room, and avoid any interruptions during
                        the questionaire. Since there will be no grading for the answers, feel free to mark 'I do not
                        know' if this is the case. Answer the questions using your own reasoning, and nothing else.
                        Thank
                        you!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="panel panel-default" style="margin-top: 30px">
            <div class="panel-body">
                <div class="alert alert-info text-center">
                    <b>Survey on detection of atoms of confusion in JavaScript</b><br />
                    The purpose of the survey is determine if some JS constructs make the code more difficult to read.
                    To measure that,
                    we ask you to answer a few questions about the output of 10 snippets in JavaScript.
                </div>
                <form method="POST" action="/saveUser">
                    {{ csrf_field() }}
                    <input type="hidden" name="ref" id="ref" value="{{$ref}}"/>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience level<small> (development/programming - regardless of
                                languages or frameworks)</small></label>
                        <select name="experience" class="form-control">
                            <option value="">Choose experience level</option>
                            <option value="1">Less than a year</option>
                            <option value="2">Between 1 and 4 years</option>
                            <option value="3">Between 4 and 10 years</option>
                            <option value="4">Over than 10 years</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="degree">Education level</label>
                        <select name="degree" class="form-control">
                            <option value="">Select education level</option>
                            <option value="1">High school degree or equivalent</option>
                            <option value="2">Some university course but no degree</option>
                            <option value="3">Bachelor degree</option>
                            <option value="4">Master degree</option>
                            <option value="5">PhD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" />
                    </div>
                    <div class="alert alert-danger">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-check">
                                    <input id="agree" type="checkbox" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-11">
                                By checking this box you agree to have your answers reviewed and used to the purpose of
                                the research. You won't be identified,
                                and your email will only be used to raffle an $20 amazon gift.
                            </div>
                        </div>
                    </div>
                    <button disabled id="confirm" class="btn btn-success">Confirm</button>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>


        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        
        $("#modal-info").modal('show');
            
        $("#agree").click(function(){
            if($(this).is(":checked")){
                $("#confirm").attr("disabled", false);
            }
            else{
                $("#confirm").attr("disabled", true);
            }
        })
});

</script>

</html>