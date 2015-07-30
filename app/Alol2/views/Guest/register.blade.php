{{-- views/guest/login.blade.php --}}
@extends('layouts.base')

@section('styles')
@stop

@section('header')
Crear Cuenta.
@stop

@section('subheader')
Nueva cuenta en la Plataforma Live!Online.
@stop

@section('contents')
								<div class="panel panel-default">

									<div class="panel-heading">
										<h5>Introduce tus datos para crear una nueva cuenta.</h5>
									</div>

									<div class="panel-body">

										{!! Form::open(
											array(
												'action'=>	'\App\Alol2\Controllers\Guest\RegisterController@update'
											),
											array(
												'accept-charset' => 'UTF-8',
												'role' 	=>	'form',
												'id'	=>	'register-form'
											)
										)!!}

											<div class="row">

												<div class="col-md-6">

													{!! Field::text('first_name', null, array(
														'placeholder' => 'Introduce tu Nombre.'
													))!!}

												</div>

												<div class="col-md-6">

													{!! Field::text('last_name', null, array(
														'placeholder' => 'Introduce tus Apellidos.'
													))!!}

												</div>

											</div>

											<div class="row">

												<div class="col-md-6">

													{!! Field::email('email', null, array(
														'placeholder' => 'Introduce tu dirección Email.'
													))!!}

												</div>

												<div class="col-md-6">


												</div>

											</div>

											<div class="row">

												<div class="col-md-6">

													{!! Field::password('password', array(
														'placeholder' => 'Introduce una contraseña.'
													))!!}

												</div>

												<div class="col-md-6">

													{!! Field::password('password_confirmation', array(
														'placeholder' => 'Repite de nuevo la contraseña.'
													))!!}

												</div>

											</div>

											<div class="row">
											
												<div class="col-md-12">
													<div class="form-group">
														<span>
															{!! Form::button('Enviar',array(
																'type'	=>	'submit',
																'class'	=>	'btn btn-default'
															))!!}
														</span>
													</div>												
												</div>	

											</div>

										{!! Form::close() !!}


									</div>

								</div>

@stop

@section('script')

@stop