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

        <div class="card-header">

          <!-- <form>
            <div class="input-group">
              <input type="search" name="search" id="search"
                placeholder="Search everything" class="form-control">
              <span class="input-group-append">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>&nbsp;
                  Search
                </button>
              </span>
            </div>
          </form> -->

          <div class="btn-actions-pane-right">
            <div role="group" class="btn-group-sm btn-group">
              <button class="btn btn-focus">This week</button>
              <button class="active btn btn-focus">Anytime</button>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center"> Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Address</th>
                <th class="text-center">Level</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td class="text-center text-muted"><?= $user['id'] . 1 ?></td>
                  <td class="text-center">
                  <?= $user['username'] ?>
                  </td>
                  <td class="text-center"><?= $user['email'] ?></td>
                  <td class="text-center"><?= $user['phone'] ?></td>
                  <td class="text-center"><?= $user['address'] ?></td>
                  <td class="text-center">
                    <?= $user['role'] ?>
                  </td>
                  <td class="text-center">
                    <form action="<?= ADMIN_URL . '?ctl=updateuser' ?>" method="post">
                      <input type="hidden" name="id" value="<?= $user['id'] ?>">
                      <input type="hidden" name="active" value="<?= $user['active'] ?>">
                      <?php if ($user['role'] != 'admin') : ?>
                        <?php if ($user['active'] == 1) : ?>
                          <span class="text-white badge">
                            <button type="submit" class="btn btn-danger">Khóa</button>
                          </span>
                        <?php else : ?>
                          <span class="text-white badge ">
                            <button type="submit" class="btn btn-primary">Kích hoạt</button>
                          </span>
                        <?php endif ?>
                      <?php endif ?>
                    </form>
                  </td>
                </tr>
              <?php endforeach ?>



            </tbody>
          </table>
        </div>

        <div class="d-block card-footer">
          <nav role="navigation" aria-label="Pagination Navigation"
            class="flex items-center justify-between">
            <div class="flex justify-between flex-1 sm:hidden">
              <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                « Previous
              </span>

              <a href="#page=2"
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Next »
              </a>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-700 leading-5">
                  Showing
                  <span class="font-medium">1</span>
                  to
                  <span class="font-medium">5</span>
                  of
                  <span class="font-medium">9</span>
                  results
                </p>
              </div>

              <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                  <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                    <span
                      class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                      aria-hidden="true">
                      <svg class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </span>
                  </span>

                  <span aria-current="page">
                    <span
                      class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                  </span>
                  <a href="#page=2"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                    aria-label="Go to page 2">
                    2
                  </a>

                  <a href="#page=2" rel="next"
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                    aria-label="Next &amp;raquo;">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </a>
                </span>
              </div>
            </div>
          </nav>
        </div>

      </div>
    </div>
  </div>
</div>
<?php
include_once ROOT_DIR . "views/admin/footer.php"
?>