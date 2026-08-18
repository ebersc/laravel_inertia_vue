<template>

    <AppHeader title="Users" />
    <div>
        <h1>Users</h1>
        <div v-if="$page.props.flash.success" class="alert alert-success">
            {{ $page.props.flash.success }}
        </div>
        <ul class="list-group">
            <!--- {{ $page.props.auth.user.id }} -->
            <li v-for="user in users.data" :key="user.id" class="list-group-item d-flex justify-content-between">
                {{ user.nome }} <Link href="/user/delete" :data="{id:user.id}" method="delete" as="button" class="btn btn-danger btn-sm"> Deletar </Link>
            </li>
        </ul>
        <hr>
        <Paginator :data="users"/>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import Paginator from '../../Components/Paginator.vue';

let page = usePage();

let props = defineProps({
    users: Object
})
</script>

<style scoped></style>
