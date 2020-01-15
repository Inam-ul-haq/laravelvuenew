

<template>
<!--    https://appdividend.com/2018/11/17/vue-laravel-crud-example-tutorial-from-scratch/-->
    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="addPost"  @keydown="form.onKeydown($event)">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post Title:</label>
                        <input type="text" class="form-control" v-model="post.title"  name="title":class="{ 'is-invalid': form.errors.has('title') }">
                        <has-error :form="form" field="title"></has-error>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post Body:</label>
                        <textarea class="form-control" v-model="post.body" rows="5"  name="body":class="{ 'is-invalid': form.errors.has('body') }"></textarea>
                        <has-error :form="form" field="body"></has-error>
                    </div>
                </div>
            </div>

            <br/>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
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
                // Submit the form via a POST request
                this.form.post('/create')
                    .then(({ data }) => { console.log(data) })
            }
        }
    }




</script>
