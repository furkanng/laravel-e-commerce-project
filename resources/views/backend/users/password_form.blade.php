@extends("backend.shared.backend_theme")
@section("section_title","Şifre Değiştir")
@section("add_new_url",url("/users"))
@section("url_name","Geri Dön")
@section("content")

    <form action="{{url("/users/$user->user_id/change-password")}}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8 border p-3">

                <div class="row mt-3">
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Şifre Giriniz"
                        >
                        @error("password")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col">
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Şifre Tekrarı">
                        @error("password")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>


                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success mt-3">Kaydet</button>
                    </div>
                </div>


            </div>
            <div class="col-2"></div>
        </div>
    </form>
@endsection

