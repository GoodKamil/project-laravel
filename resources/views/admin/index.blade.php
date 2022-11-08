@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lista użytkowników</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Lp</th>
                            <th>Imie</th>
                            <th>Nazwisko</th>
                            <th>Email</th>
                            <th>Stanowisko</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email_users->email }}</td>
                                <td>{{ $user->positions->position }}</td>
                                <td><div>
                                        <a href="{{ route('admin.edit', ['idU' => $user->id_U]) }}"><button type="button" class="btn btn-light">Edytuj</button></a>
                                        <a href="{{ route('admin.show', ['idU' => $user->id_U]) }}"><button type="button" class="btn btn-info">Szczegóły</button></a>
                                        <a href="{{ route('admin.delete', ['idU' => $user->id_U]) }}"><button type="button" class="btn btn-danger">Usuń</button></a>

                                    </div></td>
                            </tr>
                        @empty
                            <tr><td colspan="6">Brak informacji o użytkownikach</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
