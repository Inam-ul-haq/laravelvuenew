<template>
    <div>
        <h1>Posts</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Post</router-link>
            </div>
        </div><br/>
        <br/>
        <br/>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.body.substring(0,20)+"...." }}</td>
                <td><router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary"><font-awesome-icon icon="user-secret" /></router-link><button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button></td>

            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';
    import Swal from 'sweetalert2';
    export default {
        data() {
            return {
                posts: []
            }
        },

        methods: {
            list(){
                let uri = "http://127.0.0.1:8000/api/posts";
                this.axios.get(uri).then(response => {
                    this.posts = response.data.data;
                });
                // console.log(response.data)
            // this.axios.get("/user").then(({posts}))=>(this.users =response.data.data));
            },
            deletePost(id)
            {   Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                 }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    let uri = `http://127.0.0.1:8000/api/post/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.posts.splice(this.posts.indexOf(id), 1);
                    });
                }
            })




            }
        },
        created() {
            this.list();
        },
    }
</script>
