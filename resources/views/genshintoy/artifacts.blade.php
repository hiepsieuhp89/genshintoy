@extends('genshintoy.templates.master')
@section('body-background')
https://images5.alphacoders.com/109/thumb-1920-1099191.jpg
@endsection
@section('content')
<div class="content-section">
				<div class="row">
					<div class="col-md-12">
						<div class="main-content">
							<div class="title-bar d-flex">
								<div class="title-content center-verticle mr-auto" style="color: white;">
									Thánh di vật
								</div>
							</div>
							<!--
							<div class="weapon-filter d-flex center-verticle">
								@foreach($artifact as $value)
								<div class="item">
									<div class="weapon-item active">
										<a href="javascript:void(0);" data-target="{{ $value->id }}" class="weapon-type" title="{{ ucwords($value->name) }}">
											<img src="{{ $value->icon }}" alt="" class="icon">
										</a>
									</div>
								</div>
								@endforeach
							</div>	
							-->						
							<div class="inner-content character-list d-flex" style="justify-content: center;">
								@foreach($artifact as $value)
									<div class="item">
										<a href="javascript:void(0);" data-wp="{{$value->name}}" class="char-direction block-relative" title="{{ ucwords($value->name) }}">
											<div class="character-icon block-relative">
												<img class="icon" src="{{ $value->icon }}" alt="">
											</div>
										</a>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>	
@endsection