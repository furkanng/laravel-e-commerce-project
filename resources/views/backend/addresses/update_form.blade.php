@extends("backend.shared.backend_theme")
@section("section_title","Adres Düzenle")
@section("add_new_url",url("/users"))
@section("url_name","Geri Dön")
@section("content")

    <form action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" method="POST">
        @csrf
        @method("PUT")
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <input type="hidden" name="address_id" value="{{$addr->address_id}}">
        <!-- güncelleme işleminde email kayıtlı olduğu için bunu gönder -->
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8 border p-3">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="city" value="{{old("city",$addr->city)}}"
                               placeholder="Şehir"
                        >
                        @error("city")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="district"
                               value="{{old("district",$addr->district)}}"
                               placeholder="İlçe">
                        @error("district")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="zipcode" value="{{old("zipcode",$addr->zipcode)}}"
                               placeholder="Posta Kodu"
                        >
                        @error("zipcode")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_default"
                                   id="is_default" {{$addr->is_default == 1 ? "checked" : ""}}>
                            <label class="form-check-label" for="is_default">
                                Varsayılan
                            </label>
                        </div>
                        @error("is_default")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-3 col-lg-12">
                    <textarea name="address" id="address" cols="105" rows="4">{{$addr->address}}</textarea>
                    @error("address")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
