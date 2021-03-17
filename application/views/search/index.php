<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <div class="uk-grid-small uk-grid-match-height uk-viewport-height" uk-grid="true">
        <div class="list-frame uk-width-4-5@m uk-viewport-height">
            <div class="list-header">
                <div class="uk-grid-small uk-flex-middle" uk-sticky="offset: 0" uk-grid="true">
                    <div class="uk-width-expand">
                        <strong class="text-color-primary">Search regulation</strong>
                    </div>
                    <div class="uk-width-auto">
                        <div class="uk-button-group rounded">
                            <select class="uk-select custom">
                                <option value="">Goverment level</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-auto">
                        <div class="uk-button-group rounded">
                            <select class="uk-select custom">
                                <option value="">Activities and operation</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-auto">
                        <div class="uk-button-group rounded">
                            <select class="uk-select custom">
                                <option value="">Subject</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="uk-inline uk-width-1-1 uk-margin-top">
                    <span class="material-icons uk-text-middle uk-form-icon small">search</span>
                    <input type="text" name="key" class="uk-input custom-default uk-border-rounded uk-background-default" placeholder="Search..." />
                </div>
            </div>
            <ul class="uk-list uk-list-divider uk-margin-remove">
                <?php $index = 0; foreach ($items as $item) { $index++; ?>
                    <li class="list">
                        <a href="#" target="_blank">
                            <div class="uk-grid-small uk-flex-top uk-padding-small uk-padding-remove-vertical " uk-grid="true">
                                <div class="uk-width-expand">
                                    <p>
                                        <b><?=$item->title?></b><br/>
                                        <span class="uk-text-meta"><?=$item->number?></span>
                                    </p>
                                    <p><?=$item->description?></p>
                                    <p>Status : <span class="uk-text-<?=($item->status == 'Available') ? 'primary' : 'danger'?>"><?=$item->status?></span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>