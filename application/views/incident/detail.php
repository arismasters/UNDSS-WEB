<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <div class="detail-header border-bottom uk-margin-bottom">
        <div class="uk-grid-small uk-flex-middle" uk-grid="true">
            <div class="uk-width-expand">
                <h5>Information</h5>
            </div>
            <div class="uk-width-auto">
                <div class="uk-button-group">
                    <a href="/#" uk-toggle="target: #modal-edit" uk-tooltip="title: Edit; pos: left" class="uk-button uk-button-default uk-button-small uk-text-center"><span class="material-icons md-18 uk-text-middle">create</span></a>
                    <button type="button" uk-tooltip="title: Delete; pos: left" class="uk-button uk-button-default uk-button-small border-left uk-text-center"><span class="material-icons md-18 uk-text-middle">delete</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-clearfix"></div>
    <div class="uk-margin-top uk-flex-top" uk-grid="true">
        <div class="uk-width-expand">
            <div class="uk-width-4-5@m">
                <p>
                    <strong>Address</strong><br />
                    {items.address}
                </p>
                <p>
                    <strong>Postal code</strong><br />
                    {items.postal_code}
                </p>
                <hr/>
                <div class="uk-grid-small uk-child-width-1-2" uk-grid="true">
                    <div>
                        <p>
                            <strong>Phone</strong><br />
                            {items.phone}
                        </p>
                    </div>
                    <div>
                        <p>
                            <strong>Telephone</strong><br />
                            {items.telephone}
                        </p>
                    </div>
                    <div>
                        <p>
                            <strong>Email</strong><br />
                            {items.email}
                        </p>
                    </div>
                    <div>
                        <p>
                            <strong>Instagram</strong><br />
                            {items.instagram}
                        </p>
                    </div>
                    <div>
                        <p>
                            <strong>Facebook</strong><br />
                            {items.facebook}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Edit survey_id={this.state.id} items={items} />
</div>