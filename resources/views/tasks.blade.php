<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-md-1 col-md-offset-2">
            <img src="{{ asset('images/logo.png') }}" alt="MLP Logo" class="main-logo">
        </div>
    </div>
    <div class="row list-container">
        <div class="col-md-3 col-md-offset-2">
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Insert task name" name="name">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block submit-button">Add</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 task-container">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 80%">Task</th>
                        <th style="width: 15%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Build based on client specification</td>
                        <td>
                            <div class="done action-button">
                                <span class="glyphicon glyphicon-ok"></span>
                            </div>
                            <div class="remove action-button">
                                <span class="glyphicon glyphicon-remove"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><del>Cross browser checks</del></td>
                        <td>
                            <div class="done action-button">
                                <span class="glyphicon glyphicon-ok"></span>
                            </div>
                            <div class="remove action-button">
                                <span class="glyphicon glyphicon-remove"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Site navigable with JS disabled</td>
                        <td>
                            <div class="done action-button">
                                <span class="glyphicon glyphicon-ok"></span>
                            </div>
                            <div class="remove action-button">
                                <span class="glyphicon glyphicon-remove"></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
