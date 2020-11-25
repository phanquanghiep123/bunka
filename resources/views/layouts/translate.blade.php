@if (@$data)
	@hook('ReplaceLanguage', true)
		@if(is_string ($data))
			{!! $data !!}
		@else
			{!! json_encode($data) !!}
		@endif
	@endhook
@endif