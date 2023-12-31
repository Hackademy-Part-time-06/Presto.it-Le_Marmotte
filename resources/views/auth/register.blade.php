<x-main>
    <div class="container h-100">
        <div class="row h-100 m-5">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center m-4">
                        <h1 class="h2">{{ __('messages.register') }}</h1>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="https://images.pexels.com/photos/9496721/pexels-photo-9496721.jpeg"
                                        alt="Andrew Jones" class="img-fluid rounded-circle" width="132"
                                        height="132">
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="post" action={{ route('register') }}>
                                    @csrf
                                    @method('POST')
                                    <div class="form-group accenti mt-2 mb-2">
                                        <label>Username</label>
                                        <input class="form-control form-control-lg" type="text" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group accenti mt-2 mb-2">
                                        <label>Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group accenti mt-2 mb-2">
                                        <label>{{ __('messages.password') }}</label>
                                        <input class="form-control form-control-lg" type="password" name="password">
                                    </div>
                                    <div class="form-group accenti mt-2 mb-2">
                                        <label>{{ __('messages.confirm_password') }}</label>
                                        <input class="form-control form-control-lg" type="password"
                                            name="password_confirmation">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit"
                                            class="btn btn-presto btn btn-lg btn-primary">{{ __('messages.login') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
