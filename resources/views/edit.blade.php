@extends("layouts.temp")
@section("title")Edit data @endsection

@section('content')
<main class="pt-2  container">
    @if(session()->has('message'))
        <div class="mt-2 alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" text-center h3 card-header">{{ __('Edit data') }}</div>

                <div class="card-body">
                    <div >
                        <form method="POST" action="{{ route('edit') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user["first_name"] }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="second_name" class="col-md-4 col-form-label text-md-right">{{ __('Second Name') }}</label>

                                <div class="col-md-6">
                                    <input id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ $user["second_name"] }}" required autocomplete="second_name" autofocus>

                                    @error('second_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user["email"] }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="tell" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $user["number"] }}" required autocomplete="number" autofocus>

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Town" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" id = 'city-id' value = '{{$town["city_id"]}}'>
                                    <input type="hidden" id = 'region-id'value = '{{$town["region_id"]}}'>
                                    <input type="hidden" id = 'country-id' value = '{{$town["country_id"]}}'>
                                    <select id="country" name="country " class = "form-control m-1 @error('country') is-invalid @enderror" ></select>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                    <select id="region" name="region" class = "form-control m-1 @error('region') is-invalid @enderror"></select>
                                    @error('region')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                    <select id="city" name="city" class = "form-control m-1 @error('city') is-invalid @enderror" ></select>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $user['date_of_birth'] }}" required>

                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Save") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" text-center h3 card-header">{{ __('Edit Password') }}</div>
                <div class="card-body">
                    <div>
                        <form method="POST" action="{{route("edit.password")}}">
                            @csrf
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Confirm') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="new_password_confirmation" required autocomplete="new-password_confirmation">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Save password") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" text-center h3 card-header">{{ __('Edit Image') }}</div>

                <div class="card-body">
                    <div >
                        <form method="POST" action="{{route("edit.image")}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('New image') }}</label>

                                <div class="col-md-4">
                                    <input id="image" type="file" accept=".jpg,.gif,.png" class="form-control-file @error('image') is-invalid @enderror" name="image" required autocomplete="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <img class="rounded img mx-auto d-block col-md-4" id="user-image" src="{{asset($user["image"])}}"  alt="" style="max-width: 25%">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Save image") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

@push('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/location.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/edit.js') }}"></script>
@endpush





