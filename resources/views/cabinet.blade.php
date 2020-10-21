@extends("layouts.temp")
@section("title")Cabinet @endsection


@section("content")
    <main role="main" class="p-2  container">
        @if(Auth::user()->email_verified_at === null)
            <div class="alert alert-danger p-2">
                <a class="text-decoration-none text-danger" href="{{route("verification.notice")}}">Click to confirm mail</a>
            </div>
        @endif
        <div class="card p-0 container ">
            <div class="card-header">
                    <h3 class="text-center col">User information</h3>
                <a href="{{route("edit")}}"><img src="{{asset('images/edit_icon.png')}}" class=" icon-rot" ></a>
            </div>

            <div class="row card-body ">
                <div class="col" style="">
                    <img class="rounded img mx-auto d-block" id="user-image" src="{{asset($user["image"])}}"  alt="" style="max-width: 100%">
                </div>
                <div class="col border-left border-dark">
                    <div class="col border-left border-dark">
                        <lable class = "m-3"><strong>Name:</strong> {{$user["first_name"]}}</lable><br>
                        <lable class = "m-3"><strong>Surname:</strong> {{$user["second_name"]}}</lable><br>
                        <lable class = "m-3"><strong>Date of Birth:</strong> {{$user["date_of_birth"]}} </lable><br>
                        <lable class = "m-3"><strong>Email:</strong> {{$user["email"]}}</lable><br>
                        <lable class = "m-3"><strong>Number:</strong> {{$user["number"]}}</lable><br>
                        <lable class = "m-3"><strong>Town:</strong> {{$user["town"]["country"]}},
                            {{$user["town"]["region"]}},{{$user["town"]["city"]}}</lable>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="test">

    </div>
@endsection



