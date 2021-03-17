<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <div class="detail-header">
        <strong class="text-color-primary uk-margin-small-left">Settings</strong>
    </div>
    <div class="uk-width-1-2@m uk-padding-small">
        <ul class="uk-list uk-list-divider">
            <li>
                <a href="<?=base_url()?>settings/users">
                    <strong>Users</strong><br/>
                    List of users who have been granted permission to access this system
                </a>
            </li>
            <li>
                <a href="<?=base_url()?>settings/profile">
                    <strong>Profile</strong><br/>
                    Short description of you account that gives important and useful details
                </a>
            </li>
            <li>
                <a href="<?=base_url()?>login"><strong>Sign Out</strong></a>
            </li>
        </ul>
    </div>
</div>