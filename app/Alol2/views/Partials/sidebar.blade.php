<aside class="sidebar" data-sidebar>

	<div class="sidebar__brand">

		<figure>
			<a href="/">
				<img src="{{ asset('resources/img/logo.png') }}" alt="Company Image">
				<figcaption>
				</figcaption>
			</a>
		</figure>

	</div>

	<nav class="navigation navigation--sidebar">
	    <ul class="menu menu--sidebar" id="nav-stacked-sidebar1">
	    	@yield('columna_menu')
	    </ul>
	</nav>

	<div class="sidebar__copyright">
		<span>Solicitud v.2.x<br/>
		Una aplicación basada en Laravel<br/>
		© 2011-2015, Animum Formación SL</span>
	</div>

</aside>
