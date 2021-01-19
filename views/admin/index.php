<?php

use Pagekit\Application as App;

$view->script('webcam', 'webcam:js/admin/webcam.js', 'vue');
?>

<script type="text/x-template" id="webcam-row">
    <div>
        <div class="uk-form-row">
            <span class="uk-form-label">URL</span>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input v-model="webcam.url"/>
                </p>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">Benutzername</span>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input v-model="webcam.user"/>
                </p>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">Passwort</span>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <input v-model="webcam.password" type="password"/>
                </p>
            </div>
        </div>
        <button class="uk-button uk-button-danger" @click="$emit('remove-webcam', webcam.id)">Webcam entfernen</button>
    </div>
    <hr class="uk-divider-icon uk-margin"/>
</script>

<div id="webcam" class="uk-form uk-form-horizontal" v-cloak>
    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Settings' | trans }}</h2>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary" @click="save">{{ 'Save' | trans }}</button>
        </div>
    </div>

    <div v-for="webcam in webcams" :key="webcam.id">
        <webcam-row v-bind:webcam="webcam" v-on:remove-webcam="onRemoveWebcam" />
    </div>

    <button class="uk-button uk-button-secondary" @click="addWebcam">+ Webcam hinzufügen</button>
</div>
