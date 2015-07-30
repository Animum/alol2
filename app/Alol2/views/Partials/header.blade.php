<nav class="navigation navigation--header pull-left">

	<ul class="nav nav-pills">

		<li>
			<a class="toggle-sidebar" data-tooltip="" data-placement="right" data-title="Sidebar" data-original-title="" title="">
				<i class="glyphicon glyphicon-menu-hamburger"></i>
			</a>
		</li>

	</ul>

</nav>

<nav class="navigation navigation--header pull-right">

	<ul class="nav navbar-nav navbar-right" data-sidebar-navigation role="navigation">

		@if (1)
		
		<li class="item dropdown">

			<a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop-account-menu" href="#">
				<i class="glyphicon glyphicon-user"></i>
				<span>No Identificado</span>
				<b class="caret"></b>
			</a>

			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				<li class="dropdown">
					<a href="{{url('login')}}">
						<i class="glyphicon glyphicon-log-in"></i>
						<span>Iniciar sesión</span>
					</a>
				</li>

				<li class=" dropdown">
					<a href="{{url('register')}}" target="_self">
						<i class="glyphicon glyphicon-edit"></i>
						<span>Quiero registrarme</span>
					</a>
				</li>
			</ul>

		</li>

	    @else

	    @endif
	
	</ul>

</nav>
