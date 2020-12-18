<!-- side menu -->
<div class="uk-flex uk-flex-left uk-background-secondary uk-position-top uk-height-viewport uk-visible@l" style="min-width: max-content; z-index: 9; max-width: max-content;">
    <div>
        <div class="uk-flex uk-flex-center">
            <a class="uk-margin" href="#" uk-toggle="target: .text-user; animation: uk-animation-slide-left; cls: uk-hidden;">
                <span uk-navbar-toggle-icon></span>
            </a>
        </div>
        <div class="uk-flex uk-flex-center uk-flex-middle vh-93">
            <ul class="uk-list uk-margin-small-left uk-margin-small-right">
                <li>
                    <div class="uk-flex uk-flex-middle">
                        <a href="<?=base_url();?>incident">
                            <span class="uk-margin-small-right" uk-icon="icon: folder"></span>
                            <span class="text-user uk-hidden">Incident Type</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-flex uk-flex-middle">
                        <a href="<?=base_url();?>user">
                            <span class="uk-margin-small-right" uk-icon="icon: users"></span>
                            <span class="text-user uk-hidden">Users</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-flex uk-flex-middle">
                        <a href="<?=base_url();?>setting">
                            <span class="uk-margin-small-right" uk-icon="icon: cog"></span>
                            <span  class="text-user uk-hidden">Setting</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end side menu -->