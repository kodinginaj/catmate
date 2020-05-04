<div class="section light-bg" id="features">

        <div class="container">
            <div class="row">

              <?php
              foreach($kucing as $row): ?>

                <div class="col-lg-3 mb-4">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="bungkus-card">
                                <img src="<?= base_url($row['foto']); ?>" class="w-100">
                                <div class="overlay">
                                    <div class="text">
                                        <?= $row['nama']; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-catmate btn-lg btn-block mt-4">Detail Kucing</a>
                        </div>
                    </div>
                </div>

                <?php
                endforeach;
                ?>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- Pagination   -->
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                      <li class="page-item active">
                        <a class="page-link" href="">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="">2</a>
                      </li>
                    <li class="page-item">
                      <a class="page-link" aria-label="Next" href="">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            <!-- Akhir Pagination -->
                </div>
            </div>

        </div>

    </div>

    <!-- // end .section -->

    <!-- // end .section -->
