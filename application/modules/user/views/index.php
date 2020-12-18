<ul class="uk-text-emphasis uk-breadcrumb uk-flex uk-flex-right">
    <li>Users</li>
</ul>

<div id="alert"></div>

<div class="uk-card uk-card-default">
    <div class="uk-card-header uk-text-center">
        <span class="uk-text-bold uk-margin-remove-bottom">user</span>
        <div class="uk-position-top-right uk-margin-small-top uk-margin-small-right">
            <a href="<?=base_url()?>user/add" class="uk-icon-button uk-button-primary uk-margin-small-right" uk-icon="plus" uk-tooltip="tambah baru"></a>
        </div>
    </div>
    <div class="uk-card-body">
        <div class="uk-width-expand uk-overflow-auto ">
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th class="uk-text-emphasis">User Name</th>
                        <th class="uk-text-emphasis">Name</th>
                        <th class="uk-text-emphasis">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!is_null($users)):
                        foreach($users as $key => $user):
                        ?>
                            <tr>
                                <td><?=$user->user_name;?></td>
                                <td><?=$user->name;?></td>
                                <td>
                                    <div class="uk-inline">
                                        <a class="uk-icon-button uk-button-primary" uk-icon="list"></a>
                                        <div class="uk-text-center" uk-dropdown="mode: click; pos: bottom-right">
                                            <a href="<?=base_url()?>user/edit/<?=$user->user_id;?>" class="uk-icon uk-text-warning" uk-icon="file-edit" uk-tooltip="edit"></a>
                                            <a href="<?=base_url()?>user/password/<?=$user->user_id;?>" class="uk-icon uk-text-warning" uk-icon="file-edit" uk-tooltip="edit password"></a>
                                            <a class="uk-icon uk-text-danger modal-hapus" uk-icon="trash" uk-tooltip="delete" data-id="<?=$user->user_id;?>" data-action="<?=base_url().'user/api_user';?>" uk-toggle="target: #modal-hapus"></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- This is the modal -->
<div id="modal-hapus" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <h2 class="uk-modal-title">Delete</h2>
        <p>Anda akan menghapus data ini!</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary hapus-iya" type="button">Delete</button>
        </p>
    </div>
</div>