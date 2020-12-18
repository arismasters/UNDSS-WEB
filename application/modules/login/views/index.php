<div class="uk-section uk-margin-medium-top uk-margin-large-bottom">
    <div class="uk-child-width-1-1@s uk-child-width-1-3@m uk-child-width-1-3@l uk-grid-match uk-flex-center" uk-grid>
        <div>
            <div class="uk-card-default uk-card-body">
                <div class="uk-text-center">
                    <h3>Login</h3>
                </div>
                <div id="alert"></div>
                <form action="<?=$base_api;?>" method="<?=$method;?>" class="uk-form-horizontal" id="formLogin">
                    <div class="uk-margin">
                        <input name="user_name" class="uk-input" type="text" placeholder="user name">
                    </div>
                    <div class="uk-margin">
                        <input name="password" class="uk-input" type="password" placeholder="password">
                    </div>
                    <button class="uk-button uk-button-primary uk-width-1-1">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url();?>assets/js/login.js"></script>