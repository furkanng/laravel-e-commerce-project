@extends("backend.shared.backend_theme")
@section("section_title","Kullanıcılar")
@section("add_new_url",url("/users/create"))
@section("url_name","Yeni Ekle")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">Eposta</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_active}}</td>
                    <td>
                        <a href="{{url("/users/$user->user_id/edit")}}" class="text-decoration-none">
                            <button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm deleteUserBtn"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                value="{{$user->user_id}}"><i class="fa fa-trash-alt"></i>
                        </button>
                        <a href="{{url("/users/$user->user_id/change-password")}}"
                           class="text-decoration-none">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-lock"></i>
                            </button>
                        </a>
                        <a href="{{url("/users/$user->user_id/addresses")}}"
                           class="text-decoration-none">
                            <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-address-book"></i>
                            </button>
                        </a>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">

                        <form method="POST" action="{{url("users/$user->user_id")}}">
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
                <th colspan="5" class="text-center">Herhangi bir kullanıcı bulunamadı.</th>
            </tr>

        @endif

        </tbody>
    </table>

@endsection
