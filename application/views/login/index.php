<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login-frame">
    <div class="uk-container uk-container-small">
        <div class="login-form">
            <button uk-toggle="target: #modal-info" type="button" class="uk-button uk-button-small uk-button-default uk-width-auto uk-position-absolute uk-position-small uk-position-top-right"><Icon.Info size={16} /></button>
            <div class="login-header uk-padding">
                <img src={logo} class="login-logo" alt="Logo clove" />
            </div>
            <div class="uk-grid-match" uk-grid="true">
                <div class="uk-width-3-5 uk-position-relative">
                    <img class="images" src={image} alt="Survey" />
                </div>
                <div class="uk-width-2-5 uk-position-relative">
                    <div class="uk-margin-bottom">
                        <h2 class="text-color-primary uk-text-light">Welcome back :)</h2>
                        <p>Sign in and start managing your surveys data and more</p>
                    </div>
                    <form class="uk-width-1-1" onSubmit={this.handleSubmit}>
                        <div class="uk-margin">
                            <div class="uk-inline input uk-width-1-1">
                                <span class="uk-form-icon"><Icon.User size={16} /></span>
                                <input class="uk-input" type="text" placeholder="Username" name="username" value={this.state.value} onChange={this.handleChange} />
                            </div>
                            <div class="uk-inline input uk-width-1-1">
                                <span class="uk-form-icon"><Icon.Lock size={16} /></span>
                                <input class="uk-input" type={passwordShown ? "text" : "password"} placeholder="Password" name="password" value={this.state.value} onChange={this.handleChange} />
                            </div>
                        </div>
                        <p class="uk-align-right uk-button uk-button-link" onClick={this.togglePasswordVisiblity}><Icon.Eye size={14} /> <span class="uk-text-small">{passwordShown ? "Hide" : "Show"} characters</span></p>
                        <div class="uk-margin-top">
                            {
                                (!signin) ?
                                    <button type="submit" class="uk-button uk-button-primary red uk-border-pill uk-width-1-1">Sign in</button>
                                :
                                    <button type="button" class="uk-button uk-button-primary red uk-border-pill uk-width-1-1"><span uk-spinner="ratio: 1"></span></button>
                            }

                        </div>
                        <p class="uk-text-small">2020 &copy; Clove research and Marketing Analytics</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-info" class="uk-flex-top" uk-modal="true">
        <div class="uk-modal-dialog uk-width-large uk-margin-auto-vertical">
            <button class="uk-modal-close-default" type="button" uk-close="true"></button>
            <form class="uk-form-stacked" onSubmit={this.handleSubmit}>
                <div class="uk-modal-body no-header no-footer uk-padding-remove" uk-overflow-auto="">
                    <div class="uk-padding body-frame">
                        <div uk-grid="true">
                            <div class="uk-width-1-3">
                                <img class="" src={logoRed} alt="Logo info" />
                            </div>
                            <div class="uk-width-2-3">
                                <p>
                                    <strong class="text-color-primary">Clove research and Marketing Analytics</strong>
                                </p>
                                <p>
                                    <strong>Clove Survey Manager</strong><br />
                                    processing raw survey data into a data bank to be managed and filtered into clean data.
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