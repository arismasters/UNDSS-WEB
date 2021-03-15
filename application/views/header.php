<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="navigation-top uk-background-primary red">
    <div class="uk-navbar-container uk-navbar-transparent" uk-navbar="true">
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li>
                    <div class="logo"><img src="<?=base_url();?>assets/img/undss-logo.png" alt="Logo UNDSS" /></div></li>
                <li>
                    <span class="uk-light uk-text-small brand"><b>UNDSS</b><br/>Dashboard</span>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-flex-middle">
                <li>
                    <a to="/settings/profile" class="uk-button uk-button-small uk-button-default uk-padding-remove">
                        <span class="uk-light uk-text-small uk-margin-small-right uk-text-capitalize">James Alibaba</span>
                        <span class="initial-name bg-color-1">JA</span>
                    </a>
                </li>
                <li>
                    <a to="/settings" class="uk-button uk-button-small uk-button-default uk-padding-remove">
                        <span class="material-icons md-18">settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>