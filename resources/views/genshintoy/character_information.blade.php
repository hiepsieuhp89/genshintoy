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
								<div class="title-content center-verticle mr-auto">
									{{ ucwords($character->name) }}
								</div>
							</div>							
							<div class="inner-content d-flex" style="justify-content: center;">
								<div class="quickview-info w-100">
									<div class="row h-100 p-relative">
										<div class="col-md-3 image-collection-section">
											<div class="image-collection">
												<div class="image-type">
													<div class="row m-0 h-100">
														<div class="col-md-4 h-100 p-0 item current" data-target="card"><div class="title center-verticle">Card</div></div>
														<div class="col-md-4 h-100 p-0 item" data-target="portrait"><div class="title center-verticle">Portrait</div></div>
														<div class="col-md-4 h-100 p-0 item" data-target="ingame"><div class="title center-verticle">In game</div></div>
													</div>
												</div>
												<div class="image-items">
													<div class="item current" data-method="card">
														<img src="{{ $character->detail_information->card_image }}" alt="">
													</div>
													<div class="item" 			data-method="portrait">
														<img src="{{ $character->detail_information->portrait_image }}" alt="">
													</div>
													<div class="item" 		data-method="ingame">
														<img src="{{ $character->detail_information->ingame_image }}" alt="">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4 personal-info-section">
											<div class="items personal-info h-100 w-100">
												@if($character->detail_information->full_name)
												<div class="item w-100 d-flex p-3">
													<div class="data-type w-100 d-flex center-verticle">
														<div class="title" data-type="fullname">Tên đầy đủ</div>
														<div class="content">{{$character->detail_information->full_name}}</div>
													</div>
												</div>
												@endif
												<div class="item w-100 d-flex p-3">
													<div class="data-type w-100 d-flex center-verticle">
														<div class="title" data-type="weapontype">Vũ khí</div>
														<div class="content">{{$character->weapontype->name}}</div>
													</div>
												</div>
												<div class="item w-100 d-flex p-3">
													<div class="data-type w-100 d-flex center-verticle">
														<div class="title" data-type="element">Nguyên tố</div>
														<div class="content">{{$character->element->name}}</div>
													</div>
												</div>
												@if($character->detail_information->birthday)
												<div class="item w-100 d-flex p-3">
													<div class="data-type w-100 d-flex center-verticle">
														<div class="title" data-type="birthday">Ngày sinh</div>
														<div class="content">{{$character->detail_information->birthday}}</div>
													</div>
												</div>
												@endif
												@if($character->detail_information->special_dish)
												<div class="item w-100 d-flex p-3">
													<div class="data-type w-100 d-flex center-verticle">
														<div class="title" data-type="specialdish">Món ăn đặc biệt</div>
														<div class="content">{{$character->detail_information->special_dish}}</div>
													</div>
												</div>
												@endif
											</div>
										</div>
										<div class="col-md-5 best-build-section">
											<div class="items best-build h-100 w-100">
												@foreach($build as $key => $value)
												<div class="build-section">
													<div class="heading">{{ucwords($key)}}</div>
													<div class="{{$key}}}-recom line">
														@foreach($value as $item)
														<div class="{{$key}} item-build" title="
														{{ ucfirst($item->name) }}">
															<div class="icon">
																<img src="{{ $item->image ? $item->image : $item->icon }}" alt="">
															</div>
															<div class="passive">
																{{ ucfirst($item->passive) }}
															</div>
														</div>
														@endforeach
													</div>
												</div>
												@endforeach
											</div>
										</div>
										<!--
										<div class="col-md-9">
											<div class="info-collection h-100">
												<div class="row p-0 m-0 h-100">
													<div class="col-md-6 item personal-info h-100"></div>
													<div class="col-md-6 item best-build"></div>
												</div>
											</div>
										</div>
										-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
@endsection