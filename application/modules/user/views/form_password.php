<ul class="uk-text-emphasis uk-breadcrumb uk-flex uk-flex-right">
    <li><a href="<?=base_url()?>user">User</a></li>
    <li>Ubah Password</li>
</ul>

<div class="uk-card uk-card-default">
    <div class="uk-card-header uk-text-center">
        <span class="uk-text-bold uk-margin-remove-bottom">Ubah Password</span>
    </div>
    <div id="alert"></div>
    <form action="<?=$base_api;?>" method="<?=$method;?>" class="uk-form-horizontal" id="formUpdatePassword">
        <div class="uk-card-body">
            <div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-2@l" uk-grid>                
                <div>
                    <div class="uk-margin">
                        <label class="uk-text-bold uk-form-label">Password Lama</label>
                        <input name="password_lama" class="uk-input" type="password" placeholder="">
                    </div>
                </div>

                <div>
                    <div class="uk-margin">
                        <label class="uk-text-bold uk-form-label">Password Baru</label>
                        <input name="password_baru" class="uk-input" type="password" placeholder="">
                    </div>
                </div>
                <div>
                    <div class="uk-margin">
                        <label class="uk-text-bold uk-form-label">konfirmansi Password Baru</label>
                        <input name="confirm_password" class="uk-input" type="password" placeholder="">
                    </div>
                </div>
                <input type="hidden" value="<?=(!is_null($user))? $user->user_id:'';?>" name="id">
            </div>

        </div>

        <div class="uk-card-footer uk-flex uk-flex-right">
            <div>
                <a href="<?=base_url()?>user" class="uk-button uk-button-secondary">Cancel</a>
                <button class="uk-button uk-button-primary">Save</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=base_url();?>assets/js/user.js"></script>