@extends('layout.templateLog')


@section('contentLog')

    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <img class="img-profile rounded-circle" src="{{ url('/img/profile/account.png') }}"style="width: 90px; height: 90px; margin-bottom: 20px"> <br>
                    <span class="h3 text-gray-900 mb-4" >Toko Bajuku.</span>
                    <br>
                     <br>
                </div>
                                
                @if ($message = Session::get('login_failed'))
                    <center>
                        <div class="alert alert-danger col-lg-8">
                            <center><p>{{ $message }}</p></center>
                        </div>
                    </center>
                @endif

                <form class="user" method="POST" action="{{ url('/postLogin') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Username" name="username" required>
                     </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Login">
                    <div style="margin-top: 10px">
                        <center><a name="register" style="font-size: 10pt;" href="{{ url('register') }}">Belum memiliki akun? Register sekarang!</a></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
