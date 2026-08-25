<template>

    <AppHeader title="Posts" />
    <div>
        <h1>Posts</h1>

        <div v-if="$page.props.flash.success" class="alert alert-success">
            {{ $page.props.flash.success }}
        </div>
        <ul class="list-group">
            <li v-for="post in posts.data" :key="post.id" class="list-group-item d-flex justify-content-between">
                {{ post.title }} <Link :href="`/posts/delete/${post.id}`" v-if="post.can.delete" :data="{id:post.id}" method="delete" as="button" class="btn btn-danger btn-sm"> Deletar </Link>
            </li>
        </ul>
        <hr>
        <Paginator :data="posts"/>
    </div>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import Paginator from '../../Components/Paginator.vue';

let props = defineProps({
    users: Object,
    posts: String
})


</script>

<style scoped></style>
