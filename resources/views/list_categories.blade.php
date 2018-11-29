@extends('layouts.app')

@section('list_clients')
  <div class="container">
      <div class="justify-content-center">
        <br /><br />
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-8">
                    Listado de clientes
                  </div>
                </div>
              </div>
              <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Cedula</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
                    @foreach($clients as $key)
                      <tr>
                        <th scope="row">{{ $key->name }}</th>
                        <td>
                          <a href="/view_clients/{{ $key->id }}" id="{{ $key->id }}">Ver</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $clients->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>
@endsection
