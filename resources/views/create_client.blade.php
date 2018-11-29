@extends('layouts.app')

@section('create_client')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<div class="card">
					<div class="card-header">Formulario de Cliente
					</div>
					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif

						{!! Form::open(['url' => '/client', 'method' => 'POST']) !!}

					    <div class="form-group">
	                        {!! Form::label('cedula', 'Cedula') !!}
	                        {!! Form::text('ceula', '', ['placeholder' => '', 'class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
	                        {!! Form::label('nombre', 'Nombre') !!}
	                        {!! Form::text('nobre', '', ['placeholder' => '', 'class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
	                        {!! Form::label('apellido', 'Apellido') !!}
	                        {!! Form::text('apellido', '', ['placeholder' => '', 'class' => 'form-control', 'required']) !!}
						</div>
						<div class="form-group">
	                        {!! Form::label('telefono', 'Telefono') !!}
	                        {!! Form::text('telefono', '', ['placeholder' => '', 'class' => 'form-control', 'required']) !!}
                        </div>
			            </div>
                        <div class="form-group">
	                        <label for="id_category">Cliente:</label>
	                          <select class="form-control" name="id_category">
	                              @foreach($clients as $client)
	                              <option value="{{$client->id}}">{{$client->nombre}}</option>
	                              @endforeach
	                          </select>
                       </div>
                        {!! Form::submit('Registrar', ['class' => 'btn btn-info']) !!}

                      {!! Form::close() !!}

					</div>

				</div>
			</div>

		</div>
		
	</div>
	@endsection