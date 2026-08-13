<template>

    <AppHeader title="Users" />
    <div>
        <h1>Users</h1>
        <ul>
            <li v-for="user in users" :key="user.id">
                {{ user.nome }} <Link href="/user/delete" :data="{id:user.id}" method="delete" as="button" class="btn btn-danger btn-sm"> Deletar </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
let props = defineProps({
    users: Array
})
</script>

<style scoped></style>
