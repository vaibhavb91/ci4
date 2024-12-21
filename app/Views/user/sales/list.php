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
            <?php /** @var \App\Entities\Sales[] $data */ ?>
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
                'Id' => function (\App\Entities\Sales $x) {
                  return $x->id;
                },
                'client_id' => function (\App\Entities\Sales $x) {
                  return $x->	client_id;
                },
                'Cash Type' => function (\App\Entities\Sales $x) {
                  return $x->cash_type;
                },
                'Address' => function (\App\Entities\Sales $x) {
                  return $x->address;
                },
                'Amount' => function (\App\Entities\Sales $x) {
                  return $x->amount;
                },
                'gst_amount' => function (\App\Entities\Sales $x) {
                  return $x->gst_amount;
                },
                'total' => function (\App\Entities\Sales $x) {
                  return $x->total;
                },
                'Edit' => function (\App\Entities\Sales $x) {
                  return view('shared/button', [
                    'actions' => ['edit'],
                    'target' => $x->id,
                    'size' => 'btn-sm'
                  ]);
                },
                'Delete' => function (\App\Entities\Sales $x) {
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