<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>
    <?php /** @var \App\Entities\Sales $item */ ?>
    <div class="content-wrapper p-4">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form method="post">
              <div class="d-flex mb-3">
                <h1 class="h3 mb-0 mr-auto">Add/Edit Sale</h1>
                <a href="/user/sales/" class="btn btn-outline-secondary ml-2">Back</a>
              </div>

              <label class="d-block mb-3">
                <span>Date</span>
                <input type="date" class="form-control" name="date" value="<?= esc($item->date ?? '') ?>">
              </label>

              <label class="d-block mb-3">
                <span>Client</span>
                <select name="client_id" class="form-control selectpicker" data-live-search="true">
                  <option value="">Select Client</option>
                  <?php foreach ($clients as $client): ?>
                    <option value="<?= $client->id ?>" <?= (isset($item->client_id) && $item->client_id == $client->id) ? 'selected' : '' ?>>
                      <?= $client->name ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </label>

              <label class="d-block mb-3">
                <span>Service Details</span>
                <textarea class="form-control" name="service_details"><?= esc($item->service_details ?? '') ?></textarea>
              </label>

              <label class="d-block mb-3">
                <span>Cash Type</span>
                <select name="cash_type" class="form-control">
                  <option value="online" <?= ($item->cash_type ?? '') === 'online' ? 'selected' : '' ?>>Online</option>
                  <option value="cash" <?= ($item->cash_type ?? '') === 'cash' ? 'selected' : '' ?>>Cash</option>
                  <option value="check" <?= ($item->cash_type ?? '') === 'check' ? 'selected' : '' ?>>Check</option>
                  <option value="other" <?= ($item->cash_type ?? '') === 'other' ? 'selected' : '' ?>>Other</option>
                </select>
              </label>

              <label class="d-block mb-3">
                <span>Amount</span>
                <input type="number" step="0.01" class="form-control" name="amount" value="<?= esc($item->amount ?? '') ?>">
              </label>

              <label class="d-block mb-3">
                <span>GST Amount</span>
                <input type="number" step="0.01" class="form-control" name="gst_amount" value="<?= esc($item->gst_amount ?? '') ?>">
              </label>

              <label class="d-block mb-3">
                <span>Total</span>
                <input type="number" step="0.01" class="form-control" name="total" value="<?= esc($item->total ?? '') ?>">
              </label>

              <label class="d-block mb-3">
                <span>Address</span>
                <input type="text" class="form-control" name="address" value="<?= esc($item->address ?? '') ?>">
              </label>

              <label class="d-block mb-3">
                <span>Mobile No</span>
                <input type="text" class="form-control" name="mobile_no" value="<?= esc($item->mobile_no ?? '') ?>">
              </label>

              <input type="submit" value="Save" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?= view('shared/summernote') ?>
</body>
<script>
  document.querySelector('select[name="client_id"]').addEventListener('change', function() {
    const clientId = this.value;

    if (clientId) {
        fetch(`/user/clients/details/${clientId}`)
            .then(response => response.json())
            .then(data => {
                document.querySelector('input[name="mobile_no"]').value = data.mobile_no || '';
                document.querySelector('input[name="address"]').value = data.address || '';
            })
            .catch(error => console.error('Error fetching client details:', error));
    } else {
        document.querySelector('input[name="mobile_no"]').value = '';
        document.querySelector('input[name="address"]').value = '';
    }
});

</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $('.selectpicker').selectpicker();
  });
</script>

</html>
