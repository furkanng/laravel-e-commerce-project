@extends("backend.shared.backend_theme")
@section("section_title","Adresler")
@section("add_new_url",url("/users/$user->user_id/addresses/create"))
@section("url_name","Yeni Ekle")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Şehir</th>
            <th scope="col">İlçe</th>
            <th scope="col">Posta Kodu</th>
            <th scope="col">Adres</th>
            <th scope="col">Varsayılan</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($addrs) > 0)
            @foreach($addrs as $addr)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$addr->city}}</td>
                    <td>{{$addr->district}}</td>
                    <td>{{$addr->zipcode}}</td>
                    <td>{{$addr->address}}</td>
                    <td>
                        @if($addr->is_default == 1)
                            <span class="badge bg-success">Evet</span>
                        @else
                            <span class="badge bg-danger">Hayır</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{url("/users/$user->user_id/addresses/$addr->address_id/edit")}}" class="text-decoration-none">
                            <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm deleteUserBtn"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                value="{{$addr->address_id}}"><i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">

                        <form method="POST" action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}">
                            @csrf
                            @method("DELETE")
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span>Silmek istediğinize eminmisin ?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            @endforeach
        @else
            <tr>
                <th colspan="7" class="text-center">Herhangi bir adres bulunamadı.</th>
            </tr>

        @endif

        </tbody>
    </table>

@endsection
