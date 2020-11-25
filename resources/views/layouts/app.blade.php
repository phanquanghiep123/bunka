
	@section("header")
		@include("layouts.header")
	@show
	@hook('ReplaceLanguage', true)
		@section("wrapper")
			@include("layouts.main")
		@show	
	@endhook
	@hook('ReplaceLanguage', true)
		@section("footer")
			@include("layouts.footer")
		@show	
	@endhook

