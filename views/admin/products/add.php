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
                    Product
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
                    <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data">
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="product_name" id="product_name" type="text"
                                    class="form-control" value="">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="category_id"
                                class="col-md-3 text-md-right col-form-label">Danh muc</label>
                            <div class="col-md-9 col-xl-8">
                                <select  name="category_id" id="brand_id" class="form-control">
                                    <option value="">-- Danh muc --</option>
                                    <?php foreach ($categories as $cate): ?>
                                        <option value="<?= $cate['id'] ?>"><?= $cate['category_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Image</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="img_product" id="" type="file"
                                    class="form" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-3 text-md-right col-form-label">Description</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Price</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="price"  type="text"
                                    class="form-control" value="">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Quantity</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="quantity"  type="text"
                                    class="form-control" value="">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label  class="col-md-3 text-md-right col-form-label">Trang thai</label><br>
                            <input type="radio" name="status" id="" value="1" checked>Dang kinh doanh
                            <input type="radio" name="status" id="" value="0">Ngung kinh doanh
                        </div>
                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-3 text-md-right col-form-label">Brand</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="brand" id="brand" type="text"
                                    class="form-control" value="">
                            </div>
                        </div>


                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="#" class="border-0 btn btn-outline-danger mr-1">
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