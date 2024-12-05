<?php
include_once ROOT_DIR . "views/client/header.php"
?>

<main class="main-wrapper">
	<!-- Start Shop Area  -->
	<div class="axil-single-product-area bg-color-white">
		<div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 bg-vista-white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mb--40">
						<div class="row">
							<div class="col-lg-10 order-lg-2">
								<div class="single-product-thumbnail-wrap zoom-gallery">
									<div class="product-large-thumbnail single-product-thumbnail axil-product">
										<div class="thumbnail">
											<a href="<?= ROOT_URL . 'images/' . $product['img_product'] ?>" class="popup-zoom">
												<img src="<?= ROOT_URL . 'images/' . $product['img_product'] ?>" alt="Product Images">
											</a>
										</div>

									</div>
									<div class="label-block">
										<div class="product-badget">20% OFF</div>
									</div>
									<div class="product-quick-view position-view">
										<a href="<?= ROOT_URL . 'images/' . $product['img_product'] ?>" class="popup-zoom">
											<i class="far fa-search-plus"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-2 order-lg-1">
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb--40">
						<div class="single-product-content">
							<div class="inner">
								<h2 class="product-title"><?= $product['product_name'] ?></h2>
								<span class="price-amount"><?= number_format($product['price'])  ?> VNĐ </span>
								<div class="product-rating">
									<div class="star-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
									</div>
									<div class="review-link">
										<a href="#">(<span><?= count($commentListByProducts) ?></span> Bình luận)</a>
									</div>

								</div>
								<ul class="">
									<li>Trạng thái:
										<?php if ($product['quantity'] > 0) : ?>
											<span class="badge bg-success">Còn hàng</span>
										<?php else : ?>
											<span class="badge bg-danger">Hết hàng</span>
										<?php endif ?>
									</li>
								</ul>
								<ul>
									<li>Số lượng : <?= $product['quantity'] ?></li>
								</ul>
								<p class="description">
								<h4>Miêu tả :</h4><?= $product['description'] ?></p>

								<div class="product-variations-wrapper">


								</div>

								<!-- Start Product Action Wrapper  -->
								<div class="product-action-wrapper d-flex-center">
									<!-- Start Quentity Action  -->

									<!-- End Quentity Action  -->

									<!-- Start Product Action  -->
									<ul class="product-action d-flex-center mb--0">
										<li class="add-to-cart"><a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>" class="axil-btn btn-bg-primary">Add to Cart</a></li>
										<li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
									</ul>
									<!-- End Product Action  -->

								</div>
								<!-- End Product Action Wrapper  -->


							</div>
						</div>
					</div>
					<!-- comment -->
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 col-lg-6">
							<div class="" style="background-color: #f0f2f5;">

								<!-- Nút để mở phần bình luận -->
								<button id="toggle-review" class="btn btn-primary mt-3">Bình luận</button>

								<!-- Phần bình luận, ẩn ban đầu -->
								<div id="review-section" style="display: none; margin-top: 20px;">
									<!-- Form để bình luận -->
									<?php if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])): ?>
										<form action="?ctl=createComment" method="POST" class="mb-4">
											<div class="form-group">
												<textarea name="content" class="form-control" rows="3" placeholder="Nhập bình luận..." required></textarea>
											</div>
											<!-- kiem tra dang nhap chua -->
											<input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
											<input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
											<button type="submit" class="btn btn-success mt-2">Gửi bình luận</button>
										</form>
									<?php else: ?>
										<p class="">Bạn cần đăng nhập để bình luận <a href="<?= ROOT_URL . '?ctl=sign-in' ?>">Đăng nhập ngay</a></p>
									<?php endif; ?>

									<!-- Danh sách bình luận -->
									<div class="comments-list">
										<?php foreach ($commentListByProducts as $comment): ?>
											<div class="card mb-3">
												<div class="card-body">
													<div class="d-flex align-items-center mb-2">

														<span class="fw-bold"><?php echo htmlspecialchars($comment['username'] ?? ''); ?></span>
													</div>
													<h6 style="font-size: ;"><?php echo htmlspecialchars($comment['content']); ?><p><?= $comment['created_at'] ?></p> </h6>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End .single-product-thumb -->
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				const toggleButton = document.getElementById("toggle-review");
				const reviewSection = document.getElementById("review-section");

				toggleButton.addEventListener("click", function() {
					// Kiểm tra trạng thái hiện tại của phần bình luận
					if (reviewSection.style.display === "none" || reviewSection.style.display === "") {
						reviewSection.style.display = "block";
						toggleButton.textContent = "Ẩn bình luận"; // Thay đổi nội dung nút
					} else {
						reviewSection.style.display = "none";
						toggleButton.textContent = "Đánh giá"; // Thay đổi nội dung nút
					}
				});
			});
		</script>
		<style>
			#review-section {
				border: 1px solid #ddd;
				padding: 15px;
				border-radius: 5px;
				background-color: #f9f9f9;
			}

			.comments-list .card {
				background-color: #fff;
				border-radius: 5px;
				border: 1px solid #ddd;
			}

			.comments-list .card-body {
				padding: 10px 15px;
			}

			.comments-list .card img {
				border: 1px solid #ddd;
			}
		</style>
	</div>
	<!-- End Shop Area  -->

	<!-- Start Recently Viewed Product Area  -->
	<div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
		<div class="container">
			<div class="section-title-wrapper">
				<span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> <?= $category_name ?></span>
				<h2 class="title">Sản phẩm liên quan</h2>
			</div>
			<div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
				<?php foreach ($productReleads as $product) : ?>
					<div class="slick-single-layout">
						<div class="axil-product">
							<div class="thumbnail">
								<a href="<?= ROOT_URL . '?ctl=details&id=' . $product['id'] ?>">
									<img src="<?= ROOT_URL . 'images/' . $product['img_product'] ?>" alt="Product Images">
								</a>
								<div class="label-block label-right">
									<div class="product-badget"></div>
								</div>
								<div class="product-hover-action">
									<ul class="cart-action">
										<li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
										<li class="select-option"><a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>">Add to Cart</a></li>
										<li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="product-content">
								<div class="inner">
									<h5 class="title"><a href="<?= ROOT_URL . '?ctl=details&id=' . $product['id'] ?>"><?= $product['product_name'] ?></a></h5>
									<div class="product-price-variant">
										<span class="price current-price"><?= number_format($product['price']) ?> VNĐ</span>
									</div>
									<ul>
										<li>Số lượng: <?= $product['quantity'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<!-- End .slick-single-layout -->

			</div>
		</div>
	</div>
	<!-- End Recently Viewed Product Area  -->
	<!-- Start Axil Newsletter Area  -->
	<div class="axil-newsletter-area axil-section-gap pt--0">
		<div class="container">
			<div class="etrade-newsletter-wrapper bg_image bg_image--5">
				<div class="newsletter-content">
					<span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
					<h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
					<div class="input-group newsletter-form">
						<div class="position-relative newsletter-inner mb--15">
							<input placeholder="example@gmail.com" type="text">
						</div>
						<button type="submit" class="axil-btn mb--15">Subscribe</button>
					</div>
				</div>

				<?php
				include_once ROOT_DIR . "views/client/footer.php"
				?>