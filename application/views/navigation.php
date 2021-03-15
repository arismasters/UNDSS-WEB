<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="navigation-side <?=($menu_collapsed) ? 'collapsed' : ''?>">
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
        <li id="link-dashboard" class="link <?=(isset($menu) && $menu == "dashboard") ? 'active': ''?>"><a href="<?=base_url();?>dashboard"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">map</span><span class="navigation-side-label">Incident Maps</span></a></li>
        <li id="link-search" class="link <?=(isset($menu) && $menu == "search") ? 'active': ''?>"><a href="<?=base_url();?>search"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">search</span><span class="navigation-side-label">Search regulation</span></a></li>
        <li class="uk-nav-header">Data enntry</li>
        <li id="link-incident" class="link <?=(isset($menu) && $menu == "incident") ? 'active': ''?>"><a href="<?=base_url();?>incident"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">assignment_turned_in</span><span class="navigation-side-label">Incident</span></a></li>
        <li id="link-regulation" class="link <?=(isset($menu) && $menu == "regulation") ? 'active': ''?>"><a href="<?=base_url();?>regulation"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">gavel</span><span class="navigation-side-label">Regulation</span></a></li>
        <li class="uk-nav-header">Reports</li>
        <li id="link-reports" class="link <?=(isset($menu) && $menu == "reports") ? 'active': ''?>"><a href="<?=base_url();?>reports"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">description</span><span class="navigation-side-label">Incident report</span></a></li>
        <li class="uk-nav-header">Maintenance</li>
        <li id="link-master" class="link <?=(isset($menu) && $menu == "master") ? 'active': ''?>"><a href="<?=base_url();?>master"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">library_books</span><span class="navigation-side-label">Data master</span></a></li>
        <li id="link-settings" class="link <?=(isset($menu) && $menu == "settings") ? 'active': ''?>"><a href="<?=base_url();?>settings"><span class="navigation-side-icon material-icons md-20 uk-margin-small-right">settings</span><span class="navigation-side-label">Settings</span></a></li>
    </ul>
</div>