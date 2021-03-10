<!-- side menu -->
<!-- <div id="side-menu" class="uk-flex uk-flex-left uk-position-top uk-position-fixed" style="min-width: max-content; z-index: 9; max-width: max-content; margin-top: 55px;">
    <div class="uk-flex">
        <div id="close-menu" class="uk-hidden">
            <span class="uk-margin-small-right" uk-icon="icon: close" uk-toggle="target: #side-menu; animation: uk-animation-slide-left"></span>
        </div>

        <div class="uk-background-secondary p-5"uk-toggle="target: #close-menu; animation: uk-animation-slide-left; cls: uk-hidden">
            <a class="uk-margin" href="#" uk-toggle="target: .text-user; animation: uk-animation-slide-left; cls: uk-hidden;">
                <span uk-navbar-toggle-icon></span>
            </a>
        </div>
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
                    <a href="<?=base_url();?>threat_category">
                        <span class="uk-margin-small-right" uk-icon="icon: pencil"></span>
                        <span class="text-user uk-hidden">Threat Category</span>
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
</div> -->
<!-- end side menu -->

<div class="navigation-side collapsed">
    <div class="navigation-side-toggle uk-padding-small uk-padding-remove-horizontal">
        <div class="uk-grid-collapse" uk-grid="true">
            <div class="uk-width-auto">
                <button uk-toggle="target: .navigation-side, .container; cls: collapsed" type="button" class="button-menu uk-button uk-button-default uk-button-icon"><span class="icon" uk-icon="icon:menu; ratio:1"></span></button>
            </div>
            <div class="uk-width-expand">
                <a href="/#" uk-toggle="target: #modal-survey"  class="button-add uk-button uk-button-default uk-preserve-width uk-padding-remove uk-border-rounded">
                    <div class="uk-grid-collapse frame uk-border-rounded" uk-grid="true">
                        <div class="uk-width-auto icon">
                            <i uk-icon="icon: plus"></i>
                        </div>
                        <div class="uk-width-expand label">
                            <span class="navigation-side-label">New Incident</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <ul class="uk-nav uk-nav-default">
        <li class="uk-nav-header">Features</li>
        <li id="link-dashboard" class="link"><a href="/"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">map</span><span class="navigation-side-label">Incident Maps</span></a></li>
        <li id="link-search" class="link active"><a href="/"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">search</span><span class="navigation-side-label">Search regulation</span></a></li>
        <li class="uk-nav-header">Data enntry</li>
        <li id="link-incident" class="link"><a href="<?=base_url();?>incident"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">assignment_turned_in</span><span class="navigation-side-label">Incident</span></a></li>
        <li id="link-regulation" class="link"><a href="/"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">gavel</span><span class="navigation-side-label">Regulation</span></a></li>
        <li class="uk-nav-header">Reports</li>
        <li id="link-reports" class="link"><a href="/"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">description</span><span class="navigation-side-label">Incident</span></a></li>
        <li class="uk-nav-header">Maintenance</li>
        <li id="link-master" class="link"><a href="/"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">library_books</span><span class="navigation-side-label">Data master</span></a></li>
        <li id="link-settings" class="link"><a href="<?=base_url();?>setting"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">settings</span><span class="navigation-side-label">Settings</span></a></li>
    </ul>
</div>