<template>
    <div>
        <button class="btn btn-success ml-3 mb-2 " @click="LinkUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'connected'],
        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.connected,
            }
        },

        methods: {
            LinkUser()  {
              axios.post('/link/' + this.userId )
                  .then(response => {
                      this.status = ! this.status;
                      console.log(response.data);
                })
                  .catch(errors => {
                      if (errors.response.status == 401) {
                          window.location = '/login';
                      }
                  });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unlink' : 'Link';
            }
        }
    }
</script>
