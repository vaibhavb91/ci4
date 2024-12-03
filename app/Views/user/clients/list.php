<!DOCTYPE html>
<html lang="en">

<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>
    <div class="content-wrapper p-4">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <?php /** @var \App\Entities\Clients[] $data */ ?>
            <div class="d-flex">
             
              <div class="ml-auto">
                <?= view('shared/button', [
                  'actions' => ['add'],
                  'target' => '',
                  'size' => 'btn-lg'
                ]); ?>
              </div>
            </div>
            <?= view('shared/table', [
              'data' => $data,
              'columns' => [
                'Id' => function (\App\Entities\Clients $x) {
                  return $x->id;
                },
                'Name' => function (\App\Entities\Clients $x) {
                  return $x->name;
                },
                'Mobile' => function (\App\Entities\Clients $x) {
                  return $x->mobile_no;
                },
                'Address' => function (\App\Entities\Clients $x) {
                  return $x->address;
                },
                'Email' => function (\App\Entities\Clients $x) {
                  return $x->email;
                },
                'Edit' => function (\App\Entities\Clients $x) {
                  return view('shared/button', [
                    'actions' => ['edit'],
                    'target' => $x->id,
                    'size' => 'btn-sm'
                  ]);
                },
                'Delete' => function (\App\Entities\Clients $x) {
      return '
        <form method="POST" action="/user/clients/delete/' . $x->id . '" style="display:inline;" onsubmit="return confirm(\'Do you want to delete this client permanently?\')">
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i> Delete
          </button>
        </form>
      ';
    }
              ]
            ]) ?>
            <?= view('shared/pagination') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>