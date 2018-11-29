@extends('layouts.app')

@section('clients')
  <div class="container">
      <div class="justify-content-center">
        <a href="{{ url('client/create') }}"><button type="button" class="btn btn-secondary btn-lg">Agregar Cliente</button></a>
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
                        <th scope="row">{{ $key->cedula }}</th>
                        <td>{{ $key->nombre }}</td>
                        <td>{{ $key->apellido }}</td>
                        <td>{{ $key->telefono }}</td>
                        <td>
                          <a href="#" id="{{ $key->id }}" class="a_delete">Eliminar</a>
                          <a href="/client/{{ $key->id }}/edit" id="{{ $key->id }}" class="a_edit">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $cñients->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>
  <script src="{{ asset('js/client.js') }}" defer></script>
@endsection
