<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <Link class="navbar-brand" href="#">Navbar</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link active" aria-current="page" href="/">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/users">Users</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/users/create">User Create</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link disabled" aria-disabled="true">Disabled</Link>
                    </li>
                </ul>
                <div class="d-flex justify-content-between">
                    <div>
                        <div v-if="auth">
                            Olá, {{ auth.user.nome }}
                            <Link href="/logout" method="delete" as="button" class="btn btn-danger" aria-disabled="true">Logout</Link>
                        </div>
                        <div v-else>
                            <Link href="/login" as="button" class="btn btn-primary" aria-disabled="true">Login</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
import {computed} from "vue";

let page = usePage();

let auth = computed(() => page.props.auth);
</script>

<style lang="scss" scoped></style>
