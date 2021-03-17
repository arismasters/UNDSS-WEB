<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div>
    <div class="uk-padding-small uk-margin-small-top">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <strong class="text-color-primary">Incidents report</strong>
            </div>
            <div class="uk-width-auto">
                <div class="uk-button-group rounded">
                    <button uk-tooltip="title: Sort; pos: left" type="button" class="uk-button uk-button-small uk-border-rounded"><span class="material-icons md-18 uk-text-middle">filter_alt</span></button>
                    <button type="button" uk-toggle="target: #modal-add" class="uk-button uk-button-small uk-border-rounded uk-button-default border-left">
                        <span class="material-icons md-18 uk-text-middle uk-margin-small-right">download</span> Download
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="table-frame uk-overflow-auto uk-padding-small uk-padding-remove-right">
        <table class="uk-table uk-table-small uk-table-middle">
            <tbody>
                <tr class="uk-background-muted head border-remove-top">
                    <td class="uk-table-shrink uk-text-center border-right uk-text-bold">#</td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Date of incident</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Month</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Hours</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Region</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">SLS Area</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Province</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">District / Regency</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Spesific location</span></td>
                    <td class="border-right"><span class="uk-text-bold uk-text-nowrap">Threat</span></td>
                </tr>
                <?php $index = 0; foreach ($items as $item) { $index++; ?>
                    <tr>
                        <td class="border-bottom border-right"><?=$index?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->date?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->month?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->hours?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->region?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->sls_area?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->province?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->district?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->specific_location?></td>
                        <td class="uk-text-nowrap border-bottom border-right"><?=$item->threat?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>