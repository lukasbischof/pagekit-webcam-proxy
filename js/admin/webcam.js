$(function () {
    Vue.component('webcam-row', {
        template: '#webcam-row†',
        data: function () {
            return {
                url: window.$data.access.url,
                user: window.$data.access.user,
                password: window.$data.access.password
            };
        },
    })

    var vm = new Vue({
        el: '#webcam',
        data: {
            url: window.$data.access.url,
            user: window.$data.access.user,
            password: window.$data.access.password
        },
        methods: {
            save: function () {
                this.$http.post("admin/webcamAdmin/save", {
                    access: {
                        url: this.url,
                        user: this.user,
                        password: this.password
                    }
                }).then(function () {
                    this.$notify("Settings saved.");
                }, function (t) {
                    this.$notify(t.data, "danger")
                });
            }
        }
    });
});
