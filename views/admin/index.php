<?php

use Pagekit\Application as App;

$view->script('webcam', 'webcam:js/admin/webcam.js', 'vue');
?>

<div id="webcam" class="uk-form uk-form-horizontal" v-cloak>
    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Settings' | trans }}</h2>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary" @click="save">{{ 'Save' | trans }}</button>
        </div>
    </div>

    <div class="uk-form-row">
        <span class="uk-form-label">{{ 'URL' | trans }}</span>
        <div class="uk-form-controls uk-form-controls-text">
            <p class="uk-form-controls-condensed">
                <input v-model="url"/>
            </p>
        </div>
    </div>

    <div class="uk-form-row">
        <span class="uk-form-label">{{ 'Benutzername' | trans }}</span>
        <div class="uk-form-controls uk-form-controls-text">
            <p class="uk-form-controls-condensed">
                <input v-model="user"/>
            </p>
        </div>
    </div>

    <div class="uk-form-row">
        <span class="uk-form-label">{{ 'Passwort' | trans }}</span>
        <div class="uk-form-controls uk-form-controls-text">
            <p class="uk-form-controls-condensed">
                <input v-model="password" type="password"/>
            </p>
        </div>
    </div>
</div>