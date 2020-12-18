<!-- Top Bar -->
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <!-- <a class="uk-navbar-toggle" href="#" uk-toggle="target: #offcanvas-usage">
                <span uk-navbar-toggle-icon></span>
            </a> -->
            <a href="<?=base_url();?>" class="uk-navbar-toggle uk-icon-link uk-text-emphasis uk-margin-small-left" uk-icon="home"></a>
            <!-- <a class="uk-navbar-item uk-logo" href="#">Logo</a> -->
        </div>
        <div class="uk-navbar-center">
            <img src="<?=(!is_null($this->template->site_logo)) ? $this->template->site_logo:base_url('assets/favicon.ico');?>" width="55" alt="">
        </div>
    </nav>
</div>
<!-- #Top Bar -->

<!-- side menu -->
<div id="offcanvas-usage" uk-offcanvas>
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <hr class="uk-divider-icon">
        <ul class="uk-list">
            <li>
                <div class="uk-flex uk-flex-middle">
                    <span class="uk-margin-small-right" uk-icon="icon: home"></span>
                    <a href="<?=base_url();?>"><span>Home</span></a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- end side menu -->