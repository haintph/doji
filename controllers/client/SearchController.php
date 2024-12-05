<?php
class SearchController
{
    public function search()
    {
        $keyword = $_POST['keyword'] ?? ''; // Dùng $_POST thay vì $_GET
        $products = (new Product)->searchProductName($keyword);

        // Tra html ve ajax
        if ($products) {
            foreach ($products as $pro) {

                echo '<div class="axil-product-list">
                    <div class="thumbnail">
                        <a href="' . ROOT_URL . '?ctl=details&id=' . $pro['id'] . '">
                            <img src="' . ROOT_URL . 'images/' . $pro['img_product'] . '" width="100" alt="' . htmlspecialchars($pro['product_name']) . '">
                        </a>
                    </div>
                    <div class="product-content">
                        <div class="product-rating">
                            <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                            <span class="rating-number"><span>100+</span> Reviews</span>
                        </div>
                        <h6 class="product-title"><a href="' . ROOT_URL . '?ctl=details&id=' . $pro['id'] . '">' . htmlspecialchars($pro['product_name']) . '</a></h6>
                        <div class="product-price-variant">
                            <span class="price old-price">' . number_format($pro['price']) . '</span>
                        </div>
                        <div class="product-cart">
                        
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "Không tìm thấy sản phẩm";
        }
    }
}
