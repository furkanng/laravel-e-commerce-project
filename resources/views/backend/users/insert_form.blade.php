@extends("backend.shared.backend_theme")
@section("section_title","Yeni Kullanıcı Ekle")
@section("add_new_url",url("/users"))
@section("url_name","Geri Dön")
@section("content")
    <form action="{{url("/users")}}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8 border p-3">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" value="{{old("name")}}"
                               placeholder="Ad Soyad"
                        >
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email" value="{{old("email")}}"
                               placeholder="E posta">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>

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

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin">
                            <label class="form-check-label" for="is_admin">
                                Admin
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked name="is_active"
                                   id="is_active">
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>
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


