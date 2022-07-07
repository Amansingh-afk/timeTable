
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You teacher bruh') }}
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('logout') }}">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>Logout</p>
            </a>