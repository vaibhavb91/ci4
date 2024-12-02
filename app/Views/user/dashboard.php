<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>
    <div class="content-wrapper p-4">
      <div class="container" style="max-width: 720px;">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="mb-4">Welcome to Portal!</h5>
            <div class="btn-group btn-block">
              <a href="/user/clients/" class="btn btn-outline-primary py-4">
                <i class="fas fa-2x fa-info"></i><br>
                Clients
              </a>
              <a href="/user/manage/" class="btn btn-outline-primary py-4">
                <i class="fas fa-2x fa-users"></i><br>
                Users
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>