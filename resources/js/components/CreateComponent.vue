<template>

    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="addPost" >
            <div class="row">
                <div class="col-md-6">
            <div class="form-group">
                <label>Title</label>
                <input v-model="form.title" type="text" name="title"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" required>
                <has-error :form="form" field="title"></has-error>
            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
            <div class="form-group">
                <label>Body</label>
                <textarea v-model="form.body" type="text" name="body"
                          class="form-control" :class="{ 'is-invalid': form.errors.has('body') }" required></textarea>
                <has-error :form="form" field="body"></has-error>
            </div></div></div>
            <br/>
            <div class="form-group">
                <button   class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    import Form from 'vform';
    import Swal from 'sweetalert2';

    // import Swal from 'sweetalert2';

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

                   const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-end',
                       showConfirmButton: false,
                       timer: 3000,
                       timerProgressBar: true,
                       onOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                       }
                   })

                   Toast.fire({
                       icon: 'success',
                       title: 'Save data in successfully'
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
