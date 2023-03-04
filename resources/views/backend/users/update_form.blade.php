@extends("backend.shared.backend_theme")
@section("section_title","Kullanıcı Düzenle")
@section("add_new_url",url("/users"))
@section("url_name","Geri Dön")
@section("content")

    <form action="{{url("/users/$user->user_id")}}" method="POST">
        @csrf
        @method("PUT")
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <!-- güncelleme işleminde email kayıtlı olduğu için bunu gönder -->
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8 border p-3">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" value="{{old("name",$user->name)}}"
                               placeholder="Ad Soyad"
                        >
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email"
                               value="{{old("email",$user->email)}}"
                               placeholder="E posta">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin"
                                   id="is_admin" {{$user->is_admin == 1 ? "checked" : ""}}>
                            <label class="form-check-label" for="is_admin">
                                Admin
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active"
                                   id="is_active" {{$user->is_active == 1 ? "checked" : ""}}>
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
