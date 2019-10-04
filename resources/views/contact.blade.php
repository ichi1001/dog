<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>お問い合わせ</title>
</head>
<body>
    <div id="app">
        <label>名前</label>
        <input type="text" v-model="params.name">
        <div v-if="errors.name">@{{ errors.name }}</div>
        <br>
        <label>メールアドレス</label>
        <input type="text" v-model="params.email">
        <div v-if="errors.email">@{{ errors.email }}</div>
        <br>
        <label>内容</label>
        <textarea v-model="params.body"></textarea>
        <div v-if="errors.body">@{{ errors.body }}</div>
        <br>
        <button type="button" @click="onClick">送信する</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.prototype.$http = axios;

        new Vue({
            el: '#app'
            data: {
                params: {
                    name: '',
                    email: '',
                    body: ''
                    }
                  },
                errors: {
                    name: '',
                    email: '',
                    body: ''
                    }
                  },
            methods: {
            onClick: function() {
              var self = this;
              this.errors = {
                name: '',
                email: '',
                body: ''
                };

              this.$http.post('/ajax/contacts', this.params)
            .then(function(response){

              self.params = {
                name: '',
                email: '',
                body: ''
            };
            alert('送信が完了しました。');

            }).catch(function(error){

              for(var key in error.response.data) {

                self.errors[key] = error.response.data[key][0];

                    }

                   });

                }
            }
        });

    </script>
</body>
</html>
