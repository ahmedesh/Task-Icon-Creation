{{--<form method="POST" action="{{ route('register.submit') }}">--}}
{{--    @csrf--}}

{{--    <div>--}}
{{--        <label for="name">Name</label>--}}
{{--        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>--}}

{{--        @error('name')--}}
{{--        <span>{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label for="email">Email</label>--}}
{{--        <input type="email" name="email" id="email" value="{{ old('email') }}" required>--}}

{{--        @error('email')--}}
{{--        <span>{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label for="password">Password</label>--}}
{{--        <input type="password" name="password" id="password" required>--}}

{{--        @error('password')--}}
{{--        <span>{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label for="password_confirmation">Confirm Password</label>--}}
{{--        <input type="password" name="password_confirmation" id="password_confirmation" required>--}}
{{--    </div>--}}

{{--    <button type="submit">Register</button>--}}
{{--</form>--}}



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
        <h6 class="section-title h1">Repository Pattern Registration</h6>
        <div class="row">
            <div class="col-md-12 ">
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-store" role="tabpanel" aria-labelledby="nav-store-tab">
                        @if(session()->has('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @elseif(session()->has('error_message'))
                            <div class="alert alert-danger">
                                {{session('error_message')}}
                            </div>)
                        @endif
                        <form action="{{route('register.submit')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" required>
                                    @error('password')
                                    <span>{{ $message }}</span>
                                    @enderror
                            </div>
                    </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="submit" value="Register" class="btn btn-primary"/>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</body>
</html>

