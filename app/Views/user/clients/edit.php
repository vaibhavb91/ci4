<!DOCTYPE html>
<html lang="en">
<?= view('shared/head') ?>

<body>
  <div class="wrapper">
    <?= view('user/navbar') ?>
    <?php /** @var \App\Entities\Clients $item */ ?>
    <div class="content-wrapper p-4">
      <div class="container">
        <div class="card">
          <div class="card-body">
          <form method="post">
  <div class="d-flex mb-3">
    <h1 class="h3 mb-0 mr-auto">Add Client</h1>
    <a href="/user/clients/" class="btn btn-outline-secondary ml-2">Back</a>
  </div>

  <label class="d-block mb-3">
    <span>Name</span>
    <input type="text" class="form-control" name="name" value="<?= esc($item->name ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Birth Date</span>
    <input type="date" class="form-control" name="birth_date" value="<?= esc($item->birth_date ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Age</span>
    <input type="number" class="form-control" name="age" value="<?= esc($item->age ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Gender</span>
    <select name="gender" class="form-control">
      <option value="Male" <?= ($item->gender ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
      <option value="Female" <?= ($item->gender ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
      <option value="Other" <?= ($item->gender ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
    </select>
  </label>

  <label class="d-block mb-3">
    <span>Mobile No</span>
    <input type="text" class="form-control" name="mobile_no" value="<?= esc($item->mobile_no ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Alternative No</span>
    <input type="text" class="form-control" name="alternative_no" value="<?= esc($item->alternative_no ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Address</span>
    <input type="text" class="form-control" name="address" value="<?= esc($item->address ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>State</span>
    <select class="form-control form-control-sm" name="state">
      <option value="">Select State</option>
      <?php 
      $states = ["Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam","Bihar","Chandigarh","Chhattisgarh","Dadra and Nagpur Haveli","Daman and Diu","Delhi","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Lakshadweep","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Narora","Natwar","Odisha","Paschim Medinipur","Pondicherry","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","Vaishali","West Bengal"]; // Add all states here
      foreach ($states as $state): ?>
        <option value="<?= $state ?>" <?= (isset($item->state) && $item->state === $state) ? 'selected' : '' ?>>
          <?= $state ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>

  <label class="d-block mb-3">
    <span>Pincode</span>
    <input type="text" class="form-control" name="pincode" value="<?= esc($item->pincode ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Email</span>
    <input type="email" class="form-control" name="email" value="<?= esc($item->email ?? '') ?>">
  </label>

  <label class="d-block mb-3">
    <span>Referred By</span>
    <input type="text" class="form-control" name="referred_by" value="<?= esc($item->referred_by ?? '') ?>">
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

</html>