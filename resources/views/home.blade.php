<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session('success_message')}}
            </div>
        @elseif(session()->has('error_message'))
            <div class="alert alert-danger">
                {{session('error_message')}}
            </div>)
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <a href="{{ route('indexUser') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Show All Users</a>

                </div>
            </div>
        </div>
    </div>
</div>
