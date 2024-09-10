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
                    <input type="text" class="form-control" id="name" placeholder="Insert task name" name="name" required>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block submit-button">Add</button>
                </div>
            </form>
        </div>
        <div class="col-md-5 task-container">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 5%">#</td>
                        <td style="width: 80%">Task</td>
                        <td style="width: 15%"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if ($task->complete === 0)
                                <td>{{ $task->name }}</td>
                            @else
                                <td><del>{{ $task->name }}</del></td>
                            @endif
                            <td>
                                @if ($task->complete === 0)
                                    <div style="display: flex; gap: 5px;">
                                        <form action="{{ route('task.update', $task->id) }}" method="post">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="btn btn-success btn-sm done action-button">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </button>
                                        </form>
                                        <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm remove action-button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<footer class="text-center footer-text">Copyright &copy; 2020 All Rights Reserved</footer>
</html>
