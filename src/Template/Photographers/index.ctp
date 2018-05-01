<div class="page-header">
    <div class="row">
        <div class="col-6">
            <h3>Users</h3>
        </div>
        <div class="col-6 text-right">
          <a href="<?= $this->Url->build('photographers/add')?>" class="btn btn-secondary">New</a>
          <button class="btn btn-secondary" id="del-user">Remove</button>
        </div>
    </div>
</div>
<?= $this->Form->create(null, ['url' => ['action' => 'del'], 'id' => 'user-form']) ?>
<div class="block margin-bottom-sm">
    <div class="table-responsive">
        <table class="table" id="user-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Code name</th>
                <th>Photographer name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $index = 0; foreach ($users as $user) : $index++?>
                <tr>
                    <th scope="row" style="word-break: normal; white-space: nowrap"><?= $this->Form->checkbox('chk_users[]', ['value' => $user->id]) ?><?= $index ?></th>
                    <td><?= $user->code ?></td>
                    <td><?= $user->name ?></td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                          <a class="dropdown-item btn btn-secondary" href="<?=$this->Url->build(['controller' => 'photographers','action' => 'edit', $user->id])?>">Edit</a>
                          <a class="dropdown-item btn btn-secondary">Delete</a>
                        </div>
                      </div>
                    </td>
                </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>
</div>
<?= $this->Form->end()?>
<script>
    $(function() {
        $('#user-table').DataTable();

        $('#del-user').click(function() {
            var result = confirm('Are you sure to delete selected photographers?');
            if(result) {
                $('#user-form').submit();
            }

        });
    });
</script>