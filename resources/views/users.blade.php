<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<section id="tabs">

    <div class="container">
        <h6 class="section-title h1">Repository Pattern All Users</h6>
        <div class="row">
            <div class="col-md-12 ">
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div>
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Creation Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
</body>
</html>
