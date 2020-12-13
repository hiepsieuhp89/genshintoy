@extends('genshintoy.templates.master')
@section('content')
<div class="content-section">
				<div class="row">
					<div class="col-md-12">
						<div class="main-content">
							<div class="title-bar d-flex">
								<div class="title-content center-verticle mr-auto" style="color: white;">
									Tất cả vũ khí
								</div>
								<div class="search-section center-verticle">
									<form class="form-inline" action="/action_page.php">
									    <input id="find-character" style="
									    background-color: #2828287a;
									    color:white;
									    " class="form-control mr-sm-2" type="text" placeholder="Tìm vũ khí">
									</form>
								</div>
							</div>
							<div class="weapon-filter d-flex center-verticle">
								@foreach($weapontype as $value)
								<div class="item">
									<div class="weapon-item active">
										<a href="javascript:void(0);" data-target="{{ $value->id }}" class="weapon-type" title="{{ ucwords($value->name) }}">
											<img src="{{ $value->icon }}" alt="" class="icon">
										</a>
									</div>
								</div>
								@endforeach
							</div>							
							<div class="inner-content character-list d-flex" style="justify-content: center;">
								@foreach($weapon as $value)
									<div class="item">
										<a href="javascriptr:void(0);" data-toggle="popover" 
										data-content="{{ ucfirst($value->refinement_rank1) }}" 
										data-wp="{{ $value->weapon_type_id }}" class="char-direction block-relative" title="{{ ucwords($value->name) }}">
											<div class="character-icon block-relative">
												<img class="icon" src="{{ $value->image }}" alt="">
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