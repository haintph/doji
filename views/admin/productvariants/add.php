<?php
include_once ROOT_DIR . "views/admin/header.php"
?>
<div class="app-main__inner">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Add Product Variant
                    <div class="page-title-subheading">
                        Create a new product variant with detailed information.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="<?= ADMIN_URL . '?ctl=storevariant' ?>" method="post" enctype="multipart/form-data">
                        <div class="position-relative row form-group">
                            <label for="product_id" class="col-md-3 text-md-right col-form-label">Product</label>
                            <div class="col-md-9 col-xl-8">
                                <select required name="product_id" id="product_id" class="form-control">
                                    <option value="">-- Select Product --</option>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product['id'] ?>">
                                            <?= $product['product_name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="sku" class="col-md-3 text-md-right col-form-label">SKU</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="sku" id="sku" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price" class="col-md-3 text-md-right col-form-label">Price</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="price" id="price" type="number" step="0.01" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="stock_quantity" class="col-md-3 text-md-right col-form-label">Stock Quantity</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="stock_quantity" id="stock_quantity" type="number" 
                                       class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="<?= ADMIN_URL . '?ctl=variants' ?>" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Cancel</span>
                                </a>

                                <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once ROOT_DIR . "views/admin/footer.php"
?>
