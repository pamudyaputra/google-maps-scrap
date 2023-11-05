<?php $pageTitle = "pengguna";
include '../components/header.php';
// include './components/header.php'; 
include '../components/navbar.php';
?>
<?php

if (isset($_GET['type'])) {
  if ($_GET['type'] == "restaurants") {
    if (file_exists("../restaurants.json")) {
      $file = "../restaurants.json";
      $data = file_get_contents($file);
      $arr = json_decode($data);
    }
  } else {
    if (file_exists("../attractions.json")) {
      $file = "../attractions.json";
      $data = file_get_contents($file);
      $arr = json_decode($data);
    }
  }
} else {
  if (file_exists("../attractions.json")) {
    $file = "../attractions.json";
    $data = file_get_contents($file);
    $arr = json_decode($data);
  }
}

?>
<main id="main" class="main">

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable scroll-x">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Reviews</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Last Fetched</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no  = 1;
                foreach ($arr as $row) {
                ?>
                  <tr class="d-flex align-items-center justify-content-center">
                    <th scope="row"><?= $no++; ?></th>
                    <td><a href=<?= $row->link; ?>><?= $row->title; ?></a></td>
                    <td><?= $row->main_category; ?></td>
                    <td><?= $row->rating; ?></td>
                    <td><?= $row->reviews; ?></td>
                    <td><?= $row->address; ?></td>
                    <td><?= $row->latitude; ?></td>
                    <td><?= $row->longitude; ?></td>
                    <td><?= $row->last_fetched; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


<?php
include '../components/footer.php';
?>