@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="text-center">Heading</h1>

                <div class="panel panel-default">
                    <div class="panel-heading">Sub-Heading</div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <form method="post" action="{{ route("Payments.Deposit") }}">
                                <div class='form-row'>
                                    <div class='form-group required'>
                                        <label class='control-label' for="amount">User: </label>
                                        <input id="userId" name="userId" class='form-control' required type='text'>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group required'>
                                        <label class='control-label' for="amount">Amount: <span
                                                    id="usdAmount"></span></label>
                                        <input id="amount" name="amount" class='form-control' required type='number'>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group card required'>
                                        <label for="unit" class='control-label'>Unit: </label>
                                        <select id="unit" name="unit">
                                            <option value="IOTA" data-multiply="1">IOTA</option>
                                            <option value="MIOTA" data-multiply="1000000">MIOTA</option>
                                            <option value="GIOTA" data-multiply="1000000000">GIOTA</option>
                                            <option value="PIOTA" data-multiply="1000000000000">PIOTA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='form-row'>
                                    <div class='form-group'>
                                        <label class='control-label'></label>

                                        <button class='form-control btn btn-success' type='submit'> Transfer →</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before-body-end')
    <script>
        $(document).ready(function () {
            src = "{{ route('Search.User') }}";
            $("#userId").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function (data) {
                            response(data);

                        }
                    });
                },
                minLength: 3
            });
        });
    </script>
@endsection