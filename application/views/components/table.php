<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <?php foreach ($columns as $column) : ?>
          <th>
            <?= $column->label ?>
          </th>
        <?php endforeach; ?>
        <th>
          Acción
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
        <tr>
          <?php foreach ($columns as $column) : ?>
            <td>
              <?= $row->{$column->prop} ?>
            </td>
          <?php endforeach; ?>
          <td>
            <?= anchor(
              current_url() . '/' . $row->id,
              '<i class="fas fa-eye"></i>',
              ['class' => 'btn btn-outline-primary']
            ) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
