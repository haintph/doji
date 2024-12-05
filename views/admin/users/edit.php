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
                    User
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
                    <form action="?ctl=user/edit" method="post" enctype="multipart/form-data">
                        <div class="position-relative row form-group">
                            <label for="image"
                                class="col-md-3 text-md-right col-form-label">Avatar</label>
                            <div class="col-md-9 col-xl-8">
                                <?php if (!empty($user['image'])): ?>
                                    <img src="../images/users/<?= htmlspecialchars($user['image']) ?>" alt="User Image" style="max-width: 300px;">
                                <?php endif; ?>
                                <input name="image" type="file" onchange="changeImg(this)"
                                    class="image form-control-file" style="display: none;" value="">
                                <input type="hidden" name="image_old" value="">
                                <small class="form-text text-muted">
                                    Click on the image to change (required)
                                </small>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="username" id="name" value="<?= $user['username'] ?>" type="text"
                                    class="form-control" value="">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email"
                                class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="email" id="email" value="<?= $user['email'] ?>" type="email"
                                    class="form-control" value="">
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="level"
                                class="col-md-3 text-md-right col-form-label">Level</label>
                            <div class="col-md-9 col-xl-8">
                                <select required name="role" class="form-control">
                                    <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Client</option>                                  
                                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>
                                       Admin
                                    </option>
                                </select>
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