<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="preloader">
        <div class="browser-screen-loading-content">
		  <div class="loading-dots dark-gray">
			<img src="images/puff.svg" alt="Preloader" />
		  </div>
		</div>
    </div>
	
	<section class="banner" id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<!-- <div class="banner-desc">
						<p>Chào mừng bạn đến với nhà hàng</p>
					
						
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<section class="history" id="aboutus">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-6">
					<div class="history-single">
						<div class="main-title">
							<p>Nhà hàng ẩm thực</p>
							<h2>Hiệu ND</h2>
						</div>
						
						<div class="history-desc">
							<p>Đôi khi, món ngon không nhất thiết phải là cao lương mà chỉ cần hợp khẩu vị và lạ miệng là đủ. Gà nước nướng mọi, chim sẻ rô ti, vịt nướng chao, gà h’mông tiềm bí đỏ, ếch xông hơi… toàn rặt những món dân dã quê mùa mà rất hao cơm. Thực khách cũng có thể chọn lẩu cá đặc sản như cá tầm, cá quế ngon miệng, bổ dưỡng hay gà rang muối đậm đà, gà hấp mắm nhĩ thơm lừng, đầy kích thích vị giác. Có khi, thực khách lại chuộng tìm một chút hương vị lạ miệng như món răng mực xào tỏi độc chiêu của nơi này. Phần răng mực tưởng chừng là hàng thứ phẩm của con mực, nhưng chỉ cần qua vài công đoạn chế biến điệu nghệ </p>
							
							<p>Nhà hàng có
								Khuôn viên thoáng mát, hồ cá Coi đẹp mắt.
								Khu nhà Huế, nhà Sàn, Phòng Vip, điều hoà.
								Khu vui chơi, hồ bơi ngoài trời</p>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="services" id="service">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<p>Dịch vụ</p>
						<!-- <h2>Hòa Moi</h2> -->
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3 col-md-offset-3 col-sm-4">
					<div class="service-single">
						<div class="icon-box"><i class="flaticon-chef"></i></div>
						<h3>Phục vụ chuyên nghiệp</h3>
						<!-- <p>lorem ispum dummy text lorem ispum dummy text lorem ispum dummy text lorem ispum dummy text lorem ispum  dummy text lorem ispum</p> -->
					</div>
				</div>
				
				<div class="col-md-3 col-sm-4">
					<div class="service-single">
						<div class="icon-box"><i class="flaticon-recipe"></i></div>
						<h3>Menu nhiều món</h3>
						<!-- <p>lorem ispum dummy text lorem ispum dummy text lorem ispum dummy text lorem ispum dummy text lorem ispum  dummy text lorem ispum</p> -->
					</div>
				</div>
				
				<div class="col-md-3 col-sm-4">
					<div class="service-single">
						<div class="icon-box"><i class="flaticon-coffee-cup"></i></div>
						<h3>Đồ uống đa dạng</h3>
						<!-- <p>lorem ispum dummy text lorem ispum dummy text lorem ispum dummy text lorem ispum dummy text lorem ispum  dummy text lorem ispum</p> -->
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<section class="gallery" id="gallery">
		<div class="container-fluid">
			<div class="row no-pad">
				<div class="col-md-12">
					<div class="main-title">
						<p>Hình ảnh</p>
						<h2>Hiệu ND</h2>
					</div>
				</div>
			</div>
			
			<div class="row no-pad">
				<div class="col-md-12">
					<div class="gallery-image-box">
						<div class="cstiles" data-cstiles-size="4,auto" data-cstiles-margin="4">
							<div class="cstiles__item" data-cstiles-size="2">
								<img class="cstiles__item-image" src="images/g1.jpg" alt=" ">
								<div class="gallery-overlay">
									<a href="images/g1.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1">
								<img class="cstiles__item-image" src="images/g2.jpg" alt=" ">
								<div class="gallery-overlay">
									<a href="images/g2.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1,2">
								<img class="cstiles__item-image" src="images/g3.jpg" alt=" ">
								<div class="gallery-overlay">
									<a href="images/g3.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1" data-cstiles-order="1" data-cstiles-order-tablet="1">
								 <img class="cstiles__item-image" src="images/g4.jpg" alt=" ">
								 <div class="gallery-overlay">
									<a href="images/g4.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="2,1" data-cstiles-order="2" data-cstiles-order-tablet="2" data-cstiles-image_position="left,bottom">
								<img class="cstiles__item-image" src="images/g5.jpg" alt=" ">
								<div class="gallery-overlay">
									<a href="images/g5.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1">
								 <img class="cstiles__item-image" src="images/g6.jpg" alt=" ">
								 <div class="gallery-overlay">
									<a href="images/g6.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1">
								<img class="cstiles__item-image" src="images/g7.jpg" alt=" ">
								<div class="gallery-overlay">
									<a href="images/g7.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="2,1">
								 <img class="cstiles__item-image" src="images/g8.jpg" alt=" ">
								 <div class="gallery-overlay">
									<a href="images/g8.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1">
								<img class="cstiles__item-image" src="images/g9.jpg" alt=" ">
								<div class="gallery-overlay">
									<a href="images/g9.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
							<div class="cstiles__item" data-cstiles-size="1">
							  <img class="cstiles__item-image" src="images/g10.jpg" alt=" ">
							  <div class="gallery-overlay">
									<a href="images/g10.jpg"><i class="pe-7s-plus"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="testimonial" id="testimonial">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<p>Dịch vụ tốt nhất</p>
						<h2>Giá cả phải chăng</h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel owl-theme testimonial-slider" id="testimonial-slider">
						<div class="item">
							<div class="testimonial-single">
								<p>"Đồ ăn đa dạng , giá cả phải chăng ... Tôi sẽ quay lại trong thời gian tới"</p>
								<h3>Nguyễn Hương</h3>
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="testimonial-single">
								<p>"Nhân viên phục vụ chuyên nghiệp , đồ lên cực nhanh luôn . Cho nhà hàng 5 sao"</p>
								<h3>Hoàng Ánh</h3>
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="testimonial-single">
								<p>"Lần đầu tiền ăn ở nhà hàng nhưng thấy thật đáng tiền bỏ ra , tuyệt vời "</p>
								<h3>Mai Hồng Quân</h3>
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contactus" id="contact">
		<div class="google-map">
			{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0747595029857!2d105.78405761526743!3d21.029694485997855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4c69bde3f9%3A0x7d8264f1eb538f6c!2zNzcgUGjhu5EgROG7i2NoIFbhu41uZyBI4bqtdSwgROG7i2NoIFbhu41uZyBI4bqtdSwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1623526355827!5m2!1svi!2s" width="600" style="border:0;" ></iframe> --}}
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.5340911100775!2d105.79720401424579!3d21.05132029238529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab249dd1ab85%3A0xf42f72a3f9a9ec2c!2s6th%20Element!5e0!3m2!1svi!2s!4v1653987706974!5m2!1svi!2s" height="750" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		
		
	</section>
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-box">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="contact-info">
									
									<div class="main-title " style="margin-top: 30px;">
										
										<p style="color: black;">Hãy gọi cho chúng tôi để đặt bàn</p>
										<p style="margin-top: 10px;">Thông tin liên hệ</p>
									</div>
									{{-- <div class="contact-image">
										<img src="images/contact.png" alt="" />
									</div> --}}
									<div class="contact-information">
										<div class="contact-info-single">
											<div class="icon-box"><i class="pe-7s-map-marker"></i></div>
											<p>6th Element<br />
											Xuân La, Tây Hồ, Hà Nội</p>
										</div>
										
										<div class="contact-info-single">
											<div class="icon-box"><i class="pe-7s-call"></i></div>
											<p>0988356147<br />
												0961967684</p>
										</div>
										
										<div class="contact-info-single">
											<div class="icon-box"><i class="pe-7s-mail"></i></div>
											<p>duyhieu@gmail.com<br />
											nhahanghieund@gmail.com</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="siteinfo">
						<p>Copyright &copy; Hieu ND. All rights reserved</p>
					</div>
					
					
					
					<div class="footer-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</x-app-layout>
