<template>

    <AppHeader title="Users" />
    <div>
        <h1>Users</h1>
        <div v-if="$page.props.flash.success" class="alert alert-success">
            {{ $page.props.flash.success }}
        </div>
        <ul>
            <!--- {{ $page.props.auth.user.id }} -->
            <li v-for="user in users" :key="user.id">
                {{ user.nome }} <Link href="/user/delete" :data="{id:user.id}" method="delete" as="button" class="btn btn-danger btn-sm"> Deletar </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';

let page = usePage();

let props = defineProps({
    users: Array
})
</script>

<style scoped></style>
