$(function () {
  Vue.component('webcam-row', {
    template: '#webcam-row',
    props: {
      webcam: {
        url: String,
        user: String,
        password: String,
        id: Number,
      },
    },
  });

  var vm = new Vue({
    el: '#webcam',
    data: {
      webcams: window.$data.webcams,
    },
    computed: {
      output: function () {
        return JSON.stringify(this.$data);
      },
    },
    methods: {
      save: function () {
        this.$http.post('admin/webcamAdmin/save', {
          webcams: this.webcams,
        }).then(function () {
          this.$notify('Settings saved.');
        }, function (t) {
          this.$notify(t.data, 'danger');
        });
      },
      addWebcam: function () {
        var lastIndex = this.$data.webcams.length - 1;
        this.$data.webcams.push({
          url: '',
          user: '',
          password: '',
          id: lastIndex < 0 ? 1 : this.$data.webcams[lastIndex].id + 1,
        });
      },
      onRemoveWebcam: function (id) {
        var index = this.webcams.findIndex(function (webcam) {
          return webcam.id === id;
        });
        console.log(index);

        if (index < 0) {
          return;
        }

        this.webcams.splice(index, 1);
      },
    },
  });
});
