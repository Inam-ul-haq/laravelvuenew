

<template>

    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="addPost" >
            <div class="form-group">
                <label>Title</label>
                <input v-model="form.title" type="text" name="title"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('title') }"  >
                <has-error :form="form" field="title"></has-error>
            </div>
            <div class="form-group">
                <label>Body</label>
                <input v-model="form.body" type="text" name="body"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('body') }"  >
                <has-error :form="form" field="body"></has-error>
            </div>
            <br/>
            <div class="form-group">
                <button  class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    import Form from 'vform';
    import swal from 'sweetalert2';
    export default {


        data () {
            return {
                // Create a new form instance
                form: new Form({
                    title: '',
                    body: '',
                    remember: false
                })
            }
        },

        methods: {
            addPost () {

               if(this.form.title == '' || this.form.body == ''){
                   this.form.post('/create');
               }else{
                   this.form.post('/create');
                   // .then((response) => {
                   //         this.$router.push({name: 'posts'}); });
                   swal({
                       position: 'top-end',
                       icon: 'success',
                       title: 'post save on the database',
                       showConfirmButton: false,
                       timer: 100
                   })
               }
                // Submit the form via a POST request

                // .then(({ data }) => { console.log(data) })
            },



        },
        mounted() {
            console.log('component monted')
        }
    }




</script>
