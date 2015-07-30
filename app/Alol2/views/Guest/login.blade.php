{{-- views/guest/login.blade.php --}}
@extends('layouts.base')

@section('styles')
@stop

@section('header')
Login.
@stop

@section('subheader')
Acceso a la Plataforma Live!Online.
@stop

@section('contents')
								<div class="panel panel-default">

									<div class="panel-heading">
										<h5>Introduce tus datos de usuario para acceder a los contenidos de tu Curso.</h5>
									</div>

									<div class="panel-body">
										{!! Form::open(
											
											array(
												'action'	=>	'LoginController@update'
											),
											array(
												'accept-charset' => 'UTF-8',
												'role' 		=>	'form',
												'id'		=>	'login-form'
											)
										)!!}

											<div class="col-md-5">

												{!! Field::email('email', '', array(
													'placeholder' => 'Introduce la dirección Email de tu usuario.'
												))!!}
												
												<div class="form-group">

													{!! Form::label('password','Contraseña')!!}
													{!! Form::password('password',array(
														'id'	=> 'password_id',
														'class'	=> 'form-control',
														'placeholder' => 'Introduce tu contraseña'
													))!!}

												</div>
												
												<div class="form-group">
													<span>
														{!! Form::button('Iniciar sesión',array(
															'type'	=>	'submit',
															'class'	=>	'btn btn-default'
														))!!}
													</span>
													<div class="pull-right">
														{!! Form::checkbox('remember','1',array(
															'id'	=>	'remember_id',
															'class'	=> 'form-control'
														))!!}
														{!! Form::label('remember','Recuérdame',array(
															'class'	=>	'checkbox'
														))!!}														
													</div>

												</div>

											</div>

											<div class="col-md-7">
												<h5>
													<span class="glyphicon glyphicon-info-sign"></span> &iquest;Todav&iacute;a no eres Alumno? 
												</h5>
												<p>
													Matric&uacute;late en uno de <a href="http://www.animum3d.com">nuestros cursos</a>.
												</p>
												<h5>
													<span class="glyphicon glyphicon-info-sign"></span> &iquest;Eres Alumno y no sabes como comenzar?
												</h5>
												<p>
													Solicita tu Email de Bienvenida a <a href="mailto:soporte@animum3d.com" >soporte@animum3d.com</a> indicando tu nombre completo y el curso que estudias con nosotros.
												</p>
												<h5>
													<span class="glyphicon glyphicon-info-sign"></span> &iquest;Has olvidado tu contrase&ntilde;a?
												</h5>
												<p>
													Solicita una <a href="{!!URL::action('\App\Alol2\Controllers\Guest\ForgetPasswordController@getIndex')!!}">Nueva Contraseña aquí</a> si la has olvidado.
												</p>

											</div>
										
										{!! Form::close() !!}

									</div>

								</div>

@stop

@section('script')

$(function () {
	ActivarOpcionMenu('navbar-top-menu','log-in');
	$('.tooltips').tooltip();
});

@stop