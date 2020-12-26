@extends('genshintoy.templates.master')
@section('body-background')
https://gi-wish-simulator.uzairashraf.dev/0236cba43ee34e7100a781778c9f1bc3.png
@endsection
@section('content')
<style>
	.main{
		height: 100vh;
	}
	.navigation.menu{
		display: none;
	}
</style>
<div class="content-section h-100" style="
	background-color: transparent; 
	backdrop-filter: none;
    margin: 0;
    padding: 20px;
    border-radius: 10px;">
    <video style="display: none;" class="roll" data-type="one" maxrarity=4>
    	<source src="https://gi-wish-simulator.uzairashraf.dev/videos/4starwish-single.mp4">
    </video>
    <video style="display: none;" class="roll" data-type="one" maxrarity=5>
    	<source src="https://gi-wish-simulator.uzairashraf.dev/videos/5starwish-single.mp4">
    </video>
    <video style="display: none;" class="roll" data-type="ten" maxrarity=5>
    	<source src="https://gi-wish-simulator.uzairashraf.dev/videos/5starwish.mp4">
    </video>
    <video style="display: none;" class="roll" data-type="ten" maxrarity=4>
    	<source src="https://gi-wish-simulator.uzairashraf.dev/videos/4starwish.mp4">
    </video>
				<div class="row h-100">
					<div class="col-md-12 banner d-flex" style="justify-content: center;height: 10%">
						<div class="d-flex items banner-items carousel-indicators" style="justify-content: center;">
							<div data-target="#carousel-banner" data-slide-to="0" class="item banner-item p-1 d-flex" style="width: 140px;height: auto;">
								<img style="width: 100%;height: auto;    margin-top: auto;" src="https://gi-wish-simulator.uzairashraf.dev/ff88befd8678600379f0cbd155a38c77.png" alt="" class="banner-image active" picked="https://i.imgur.com/MF0xV2K.png" unpicked="https://i.imgur.com/F5czVNd.png">
							</div>
							<div data-target="#carousel-banner" data-slide-to="1" class="item banner-item p-1 d-flex" style="width: 140px;height: auto;">
								<img style="width: 100%;height: auto;    margin-top: auto;" src="https://gi-wish-simulator.uzairashraf.dev/ff88befd8678600379f0cbd155a38c77.png" alt="" class="banner-image" picked="https://i.imgur.com/JHjzojm.png" unpicked="https://i.imgur.com/hM1Q35b.png">
							</div>
							<div data-target="#carousel-banner" data-slide-to="2" class="item banner-item p-1 d-flex" style="width: 140px;height: auto;">
								<img style="width: 100%;height: auto;    margin-top: auto;" src="https://gi-wish-simulator.uzairashraf.dev/ff88befd8678600379f0cbd155a38c77.png" alt="" class="banner-image" picked="https://i.imgur.com/Bc0V7s5.png" unpicked="https://i.imgur.com/9ScBoNk.png">
							</div>
						</div>
					</div>
					<div class="col-md-12 p-4" style="height: 82%;">
						<div id="carousel-banner" class="carousel slide h-100" data-ride="carousel" data-interval="false" style="border-radius: 10px;padding: 0 140px;">
						  <div class="carousel-inner h-100">
						    <div class="carousel-item h-100 active">
						      <img style="margin: auto;" class="d-block h-100" src="https://i.imgur.com/nZeYSmx.png" alt="First slide">
						    </div>
						    <div class="carousel-item h-100">
						      <img style="margin: auto;" class="d-block h-100" src="https://i.imgur.com/xZSr9gJ.png" alt="Second slide">
						    </div>
						    <div class="carousel-item h-100">
						      <img style="margin: auto;" class="d-block h-100" src="https://i.imgur.com/zbzKvvU.png" alt="Third slide">
						    </div>
						  </div>
						  <a style="width: 140px;position: absolute;left: 0;cursor: inherit;" class="carousel-control-prev carousel-control" href="#carousel-banner" role="button" data-slide="prev">
						  	<img style="width: 30px;" src="https://i.imgur.com/1qihXsJ.png" alt="">
						  </a>
						  <a style="width: 140px;position: absolute;right: 0;cursor: inherit;" class="carousel-control-next carousel-control" href="#carousel-banner" role="button" data-slide="next">
						    <img style="width: 30px;" src="https://i.imgur.com/WNmN8IQ.png" alt="">
						  </a>
						</div>
					</div>
					<div class="col-md-12" style="width: 100vw;height: 8%">
						<div class="buttons d-flex h-100" style="justify-content: space-between;">
							<div class="left-side-btn h-100 d-flex">
								<div class="history ml-3" style="position: relative;
										color: #4f4f4f;
									    font-size: 18px;
									    
									    border-radius: 20px;
									    width: 120px;
									    text-align: center;
									    height: 35px;
									    background-color: #cecece;
									    box-shadow: 0px 0px 13px 0px #0000003d;margin: auto;">
									<div style="line-height: 35px;">History</div>
								</div>
								<div class="detail ml-3" style="position: relative;
										color: #4f4f4f;
									    font-size: 18px;
									    
									    border-radius: 20px;
									    width: 120px;
									    text-align: center;
									    height: 35px;
									    background-color: #cecece;
									    box-shadow: 0px 0px 13px 0px #0000003d;margin: auto;">
									<div style="line-height: 35px;">Detail</div>
								</div>
								<div class="fate ml-3" style="margin: auto;"></div>
								<div class="primogems ml-3 d-flex pl-2 pr-3" style="background-color: #0000006e;color: white;height: 30px;border-radius: 20px;margin: auto;">
									<img style="height: 100%;" src="https://static.wikia.nocookie.net/gensin-impact/images/d/d4/Item_Primogem.png" alt="">
									<div style="margin: auto">9999999</div>
									<div class="add-primogems">
										
									</div>
								</div>
							</div>
							<div class="right-side-btn d-flex" style="width: fit-content;">
								<div class="button gacha" data-type="one" style="height: 55px;padding: 0 10px;position: relative;">
									<img style="height: 100%;" src="https://i.imgur.com/jcI5szL.png">
									<div class="content" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);height: 90%; color: #c3b2a3; font-size: 18px;">
										<div style="line-height: 20px;">Wish x1</div>
										<div class="d-flex" style="width: 100%;height: calc(100% - 20px);">
											<img style="max-height: 100%;" src="https://static.wikia.nocookie.net/gensin-impact/images/1/1f/Item_Intertwined_Fate.png" alt="">
											<div style="margin: auto 0;">x1</div>
										</div>
									</div>
								</div>
								<div class="button gacha" data-type="ten" style="height: 55px;padding: 0 10px;position: relative;">
									<img style="height: 100%;" src="https://i.imgur.com/jcI5szL.png">
									<div class="content" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);height: 90%; color: #c3b2a3; font-size: 18px;">
										<div style="line-height: 20px;">Wish x10</div>
										<div class="d-flex" style="width: 100%;height: calc(100% - 20px);">
											<img style="max-height: 100%;" src="https://static.wikia.nocookie.net/gensin-impact/images/1/1f/Item_Intertwined_Fate.png" alt="">
											<div style="margin: auto 0;">x10</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
@section('custom-script')
<script>
	const rarity = [4,5];
	function randomArray(a){
		if(Math.floor(Math.random()*a.length) >= a.length)
			return randomArray(a);
		else
			return a[Math.floor(Math.random()*a.length)];
	}
</script>
<script>
	$(document).ready(function(){
		$('body').css('height','100vh').css('overflow','hidden').append('<div class="skip-btn">Skip</div>');
		$('.container').addClass('container-fluid').removeClass('container').css('width','100vw').css('height','100vh');
		function updatebanner(){
			$.each($('.banner-item img'),function(){
				if($(this).hasClass('active'))
					$(this).attr('src',$(this).attr('picked'));
				else
					$(this).attr('src',$(this).attr('unpicked'));
			})
		}

		$('.banner-item img').on('click',function(){
			$.each($('.banner-item img'),function(){
				$(this).removeClass('active');
			})
			$(this).addClass('active');
			updatebanner();
		})
		$('.carousel-control').on('click',function(){
			$('.banner-item img').removeClass('active');
			if($(this).attr('data-slide')=='next'){
				$.each($('#carousel-banner .carousel-inner .carousel-item'),function(index,target){
					if($(target).hasClass('active')){
						$('.banner-item[data-slide-to="'+(index==$('#carousel-banner .carousel-inner .carousel-item').length-1?0:index+1)+'"] img').addClass('active');
					}
				})
			}
			if($(this).attr('data-slide')=='prev'){
				$.each($('#carousel-banner .carousel-inner .carousel-item'),function(index,target){
					if($(target).hasClass('active')){
						$('.banner-item[data-slide-to="'+(index==0?$('#carousel-banner .carousel-inner .carousel-item').length-1:index-1)+'"] img').addClass('active');
					}
				})
			}
			updatebanner();
		})
		$('.gacha').on('click',function(){
			var rar = randomArray(rarity);
			console.log(rar);
			$('video.roll[data-type="'+ $(this).attr('data-type') +'"][maxrarity='+ rar +']').show().trigger('play');
		})
		$('video').on('play',function(){
			$('.skip-btn').show();
		})
		$('.skip-btn').on('click',function(){
			$(this).hide();
			$('video').trigger('pause').hide();
			$.each($('video'),function(){
				$(this).get(0).currentTime = 0;
			})
		})
		$('video').on('ended',function(){
			$(this).hide();
			$('.skip-btn').hide();
		})
		updatebanner();
	})
</script>
@endsection