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
                    <form method="post" action="<?= '?ctl=updatecate' ?>" enctype="multipart/form-data">
                        <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label">Name</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="category_name" id="name" placeholder="Name" type="text" value="<?= $categories['category_name'] ?>"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Image</label>
                            
                            <div class="col-md-9 col-xl-8">
                                <img src="<?= ROOT_URL . 'images/' . $categories['img_category'] ?>" width="200" alt="">
                                <input  name="img_category" id="name" placeholder="Name" type="file"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Type</label>
                            <div class="col-md-9 col-xl-8">
                                <input type="radio" name="type" id="" value="1" <?= $categories['type'] ? 'checked' : '' ?>>Tran suc
                                <input type="radio" name="type" id="" value="0" <?= $categories['type'] == 0 ? 'checked' : '' ?>>Phu kien
                            </div>
                        </div>
                        <!-- Luu id vao hidden -->
                        <input type="hidden" name="id" value="<?= $categories['id'] ?>">
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
include_once ROOT_DIR . "views/admin/header.php"
?>