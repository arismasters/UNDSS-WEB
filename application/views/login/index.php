<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login-frame">
    <div class="uk-container uk-container-small">
        <div class="login-form">
            <button uk-toggle="target: #modal-info" type="button" class="uk-button uk-button-small uk-button-default uk-width-auto uk-position-absolute uk-position-small uk-position-top-right"><span class="material-icons md-20 uk-text-middle">info</span></button>
            <div class="login-header uk-padding uk-flex-middle">
                <img src="<?=base_url()?>assets/img/desc-logo-undss.png" class="login-logo" alt="Logo UNDSS" />
            </div>
            <div class="uk-grid-match" uk-grid="true">
                <div class="uk-width-3-5 uk-position-relative">
                    <img class="images" src="<?=base_url()?>assets/img/security.svg" alt="Survey" />
                </div>
                <div class="uk-width-2-5 uk-position-relative">
                    <div class="uk-margin-bottom">
                        <h2 class="text-color-primary uk-text-light">Welcome back :)</h2>
                        <p>Sign in and start managing incident data and more</p>
                    </div>
                    <form class="uk-width-1-1" action="<?=base_url()?>dashboard">
                        <div class="uk-margin">
                            <div class="uk-inline input uk-width-1-1">
                                <span class="uk-form-icon"><span class="material-icons md-20 uk-text-middle">person</span></span>
                                <input class="uk-input" type="text" placeholder="Username" name="username" value=""/>
                            </div>
                            <div class="uk-inline input uk-width-1-1">
                                <span class="uk-form-icon"><span class="material-icons md-20 uk-text-middle">lock</span></span>
                                <input class="uk-input" type="password" placeholder="Password" name="password" value="" />
                            </div>
                        </div>
                        <p class="uk-align-right uk-button uk-button-link" onClick={this.togglePasswordVisiblity}><span class="material-icons md-20 uk-text-middle">visibility</span> <span class="uk-text-small">Show characters</span></p>
                        <div class="uk-margin-top">
                            <button type="submit" class="uk-button uk-button-primary red uk-border-pill uk-width-1-1">Sign in</button>
                        </div>
                        <p class="uk-text-small">2021 &copy; United Nations Department for Safety and Security Indonesia</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-info" class="uk-flex-top" uk-modal="true">
        <div class="uk-modal-dialog uk-width-large uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close="true"></button>
            <form class="uk-form-stacked">
                <div class="uk-modal-body no-header no-footer uk-padding-remove" uk-overflow-auto="">
                    <div class="uk-padding body-frame">
                        <div uk-grid="true">
                            <div class="uk-width-1-3">
                                <img class="" src="<?=base_url()?>assets/img/logo-undss-blue.png" alt="Logo UNDSS" />
                            </div>
                            <div class="uk-width-2-3">
                                <p>
                                    <strong class="text-color-primary">United Nations Department for Safety and Security Indonesia</strong>
                                </p>
                                <p>
                                    <strong>UNDSS Dashboard</strong><br />
                                    processing collected incidents data into a data bank to be managed and converted into spatial data.
                                </p>
                                <p>
                                    Designed by <a href="https://idsolutions.id" rel="noopener noreferrer" target="_blank" class="uk-button uk-button-link">IDsolutions</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>