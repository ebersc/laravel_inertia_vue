<template>

    <AppHeader title="Users" />
    <div>
        <h1>Users</h1>

        <div class="mt-4 mb-4">
            <input type="text" v-model="search" placeholder="Search...">
        </div>

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
import { Link, router, usePage } from '@inertiajs/vue3';
import Paginator from '../../Components/Paginator.vue';
import { ref, watch } from 'vue';
import { debounce } from 'lodash';


let props = defineProps({
    users: Object,
    searched: String
})

let page = usePage();

let search = ref(props.searched);

watch(search, debounce((value) => {
    router.get('/users', {search: value}, {
        preserveState: true,
        replace: true,
        only: ['users']
    })
}, 500));

</script>

<style scoped></style>
