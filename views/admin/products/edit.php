<?php
include_once ROOT_DIR . "views/admin/header.php";
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Category
                    <div class="page-title-subheading">
                        View, create, update, delete and manage.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data">
                   
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Name:</label>
                            <div class="col-md-9 col-xl-8">
                            <input name="product_name" id="name" placeholder="Name" type="text" value="<?= $product['product_name'] ?>" class="form-control">

                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="category_id" class="col-md-3 text-md-right col-form-label">Category:</label>
                            <div class="col-md-9 col-xl-8">
                                <select name="category_id" id="category_id" class="form-control">
                                    <?php foreach ($categories as $cate): ?>
                                        <option value="<?= $cate['id'] ?>" <?= ($product['category_id'] == $cate['id']) ? 'selected' : '' ?>>
                                            <?= $cate['category_name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="img_product" class="col-md-3 text-md-right col-form-label">Image</label>
                            <div class="col-md-9 col-xl-8">
                                <?php if (!empty($product['img_product'])): ?>
                                    <img src="<?= ROOT_URL . 'images/' . $product['img_product'] ?>" width="200" alt="Product Image">
                                <?php endif; ?>
                                <input name="img_product" id="img_product" type="file" class="form-control">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="status" class="col-md-3 text-md-right col-form-label">Status</label>
                            <div class="col-md-9 col-xl-8">
                                <input type="radio" name="status" value="1" <?= $product['status'] ? 'checked' : '' ?>> Active
                                <input type="radio" name="status" value="0" <?= $product['status'] == 0 ? 'checked' : '' ?>> Inactive
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Price</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="price"  type="text"
                                    class="form-control" value="<?= $product['price'] ?>">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Quantity</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="quantity"  type="text"
                                    class="form-control" value="<?= $product['quantity'] ?>">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="brand" class="col-md-3 text-md-right col-form-label">Brand:</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="brand" id="brand" type="text" value="<?= $product['brand'] ?>" class="form-control">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label">Description:</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea name="description" class="form-control" rows="6" id="description"><?= $product['description'] ?></textarea>
                            </div>
                        </div>

                       
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="#" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Cancel</span>
                                </a>

                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <span>Update</span>
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
include_once ROOT_DIR . "views/admin/footer.php";
?> 