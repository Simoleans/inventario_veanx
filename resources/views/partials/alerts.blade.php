<script src="{{ asset('js/sweetalert2@8.js') }}"></script>

	@if (\Session::has('error'))
		<script type="text/javascript">
		  Swal.fire("Error", "{!! \Session::get('error') !!}", "error");
		</script>
	@else

	{{-- @if (\Session::has('login'))
		<script type="text/javascript">
		  // Swal.fire("{!! \Session::get('login') !!}");
		  Swal.fire({
			  title: '{!! \Session::get("login") !!}',
			  width: 800,
			  padding: '3em',
			  backdrop: `
			    rgb(0, 0, 0,0.5)
			    left top
			  `
			})
		</script>
	@endif --}}

	@if (\Session::has('success'))
		<script type="text/javascript">
		  Swal.fire("¡Buen Trabajo!", "{!! \Session::get('success') !!}", "success");
		</script>
	@endif

	@if (\Session::has('warning'))
		<script type="text/javascript">
		  Swal.fire("Advertencia", "{!! \Session::get('warning') !!}", "warning");
		</script>
	@endif

	@if (\Session::has('info'))
		<script type="text/javascript">
		  Swal.fire("Información", "{!! \Session::get('info') !!}", "info");
		</script>
	@endif

@endif