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
									Tính lượng sát thương tạo thành
								</div>
							</div>		
							<div class="inner-content damage-calculator row">
									<div class="col-md-7">
										<form class="form-inline" action="/action_page.php">
				    					<div class="form-group p-1">
				    						<label for="ATK_input">Chỉ số tấn công (ATK)</label>
				    						<input id="ATK_input" class="form-control mr-sm-2 ml-2" type="number"  placeholder="ATK" min="0" value="0">
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="crit-rate_input">Tỉ lệ chí mạng (CRIT RATE)</label>
				    						<input id="crit-rate_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="Crit-rate" min="5" value="5">
				    						<p>%</p>
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="crit-DMG_input">Buff sát thương chí mạng (CRIT DMG)</label>
				    						<input id="crit-DMG_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="Crit DMG" min="0" value="50">
				    						<p>%</p>
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="ele-sk-buff_input">Buff sát thương nguyên tố</label>
				    						<input id="ele-sk-buff_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="Elemental DMG buff" min="0" value="0">
				    						<p>%</p>
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="physic-buff_input">Buff sát thương vật lý</label>
				    						<input id="physic-buff_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="Physical DMG buff" min="0" value="0">
				    						<p>%</p>
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="normal_atk_buff_input">%ATK đòn đánh thường / nguyên tố</label>
				    						<input id="normal_atk_buff_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="Normal DMG scale" min="0" value="100">
				    						<p>%</p>
				    					</div>
				    					<!--
				    					<div class="rule mt-3 mb-3" style="background-color: white;width: 100%;height: 1px;">
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="maxHP_input">Máu tối đa (Max HP)</label>
				    						<input id="maxHP_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="Max HP" min="0" value="0">
				    					</div>
				    					<div class="form-group p-1">
				    						<label for="DEF_input">Chỉ số phòng thủ (DEF)</label>
				    						<input id="DEF_input" class="form-control mr-sm-2 ml-2" type="number" placeholder="DEF" min="0" value="0">
				    					</div>
				    				-->
				    				</form>
									</div>
									<div class="col-md-5 p-0">
										<div class="DMG_type_list" style="height: 100%;">
											<div class="item d-flex" >
												<p class="center-verticle dmg-type-label">vật lý:</p>
												<p class="center-verticle DMG-output ml-3" data-target="physic"></p>
											</div>
											<div class="item d-flex" s>
												<p class="center-verticle dmg-type-label">nguyên tố:</p>
												<p class="center-verticle DMG-output ml-3" data-target="element"></p>
											</div>
											<div class="item d-flex" s>
												<p class="center-verticle dmg-type-label w-100" style="text-align: left">Sát thương trung bình / đòn đánh vật lý:</p>
												<p class="center-verticle DMG-output ml-3" data-target="physic_overall" style="margin-right: 0;margin-left: auto !important;"></p>
											</div>
											<div class="item d-flex" s>
												<p class="center-verticle dmg-type-label w-100" style="text-align: left">Sát thương trung bình / đòn đánh nguyên tố:</p>
												<p class="center-verticle DMG-output ml-3" data-target="element_overall" style="margin-right: 0;margin-left: auto !important;"></p>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection