<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <div class="uk-grid-small uk-grid-match-height uk-viewport-height" uk-grid="true">
        <div class="list-frame uk-width-1-3@m uk-viewport-height">
            <div class="list-header">
                <div class="uk-grid-small uk-flex-middle" uk-sticky="offset: 0" uk-grid="true">
                    <div class="uk-width-auto">
                        <a href="<?=base_url()?>settings" uk-tooltip="title: Back; pos: left" type="button" class="uk-button uk-button-small uk-border-rounded"><span class="material-icons md-18 uk-text-middle">arrow_back</span></a>
                    </div>
                    <div class="uk-width-expand uk-padding-remove">
                        <strong class="text-color-primary">Profile</strong>
                    </div>
                    <div class="uk-width-auto">
                        <div class="uk-button-group rounded">
                            <button uk-tooltip="title: Sort; pos: left" type="button" class="uk-button uk-button-small uk-border-rounded"><span class="material-icons md-18 uk-text-middle">filter_alt</span></button>
                            <div uk-dropdown="mode: click; pos: left-top">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><button type="button" class="uk-button uk-button-small uk-button-default">Newest</button></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><button type="button" class="uk-button uk-button-small uk-button-default">Oldest</button></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><button type="button" class="uk-button uk-button-small uk-button-default">A - Z</button></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><button type="button" class="uk-button uk-button-small uk-button-default">Z - A</button></li>
                                </ul>
                            </div>
                            <button uk-tooltip="title: Delete; pos: left" type="button" class="uk-button uk-button-small border-left">
                                <span class="material-icons md-18 uk-text-middle">delete</span>
                            </button>
                            <button type="button" uk-toggle="target: #modal-add" class="uk-button uk-button-small uk-border-rounded uk-button-primary red">
                                <span class="material-icons uk-text-middle">add</span> Add
                            </button>
                        </div>
                    </div>
                </div>
                <div class="uk-inline uk-width-1-1 uk-margin-top">
                    <span class="material-icons uk-text-middle uk-form-icon small">search</span>
                    <input type="text" name="key" class="uk-input custom-default uk-border-rounded uk-background-default" placeholder="Search..." />
                </div>
            </div>
            <ul class="uk-list uk-list-divider uk-margin-remove">
                <li class="list">
                    <div class="uk-grid-small uk-flex-top uk-padding-small uk-padding-remove-vertical " uk-grid="true">
                        <div class="uk-width-auto bulk-items">
                            <input class="uk-checkbox uk-border-circle" type="checkbox" name="bulkId" defaultValue={value.id} onChange={this.handleBulkChange} />
                        </div>
                        <div class="uk-width-expand">
                            <a href="#">
                                <div class="uk-grid-small uk-flex-top uk-padding-small uk-padding-remove-vertical " uk-grid="true">
                                    <div class="uk-width-auto">
                                        <span class="initial-name bg-color-7">SI</span>
                                    </div>
                                    <div class="uk-width-expand">
                                        <p class="uk-text-truncate"><b>Shooting Inncident</b></p>
                                        <p class="uk-text-truncate">Description of this incindent, Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="detail-frame uk-width-2-3@m uk-viewport-height">
           <div class="detail-header">
                <div class="empty-image">
                    <img src="<?=base_url()?>assets/img/none.svg" class="large" alt="Empty" />
                    <p class="uk-text-lead">Select an item to view details</p>
                    <p class="uk-text-meta">None selected</p>
                </div>
            </div>
        </div>
    </div>
</div>