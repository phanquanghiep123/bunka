<div class="main-panel">
	<div class="content-wrapper">
		@hasSection('dashboad-tiles')
			@yield("dashboad-tiles")
		@endif
		@hasSection('content')
			@section("header-page")
				@include("layouts.includes.header-title-page")
			@show
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							@section("content")

							@show
						</div>
					</div>
				</div>
			</div>
		@endif
 	</div>
</div>


