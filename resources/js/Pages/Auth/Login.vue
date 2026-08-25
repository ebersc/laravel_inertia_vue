<template>
    <div>
        <h1 class="mt-4 mb-4">Login</h1>

        <template v-if="$page.props.auth">
            <div class="alert alert-success">
                You are logged in!
            </div>
        </template>

        <template v-else>
            <form @submit.prevent="login">

                <div v-if="flash.error" class="text text-danger" v-text="flash.error"></div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" v-model="form.email" class="form-control" id="email" placeholder="Email"></input>
                    <div v-if="errors.email" v-text="errors.email" class="text text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" v-model="form.password" class="form-control" id="password" placeholder="Password"></input>
                    <div v-if="errors.password" v-text="errors.password" class="text text-danger"></div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Login</button>
            </form>
        </template>
    </div>
</template>

<script setup>

    import {useForm} from "@inertiajs/vue3";

    defineProps({
        flash: Object,
        errors: Object
    })

    const form = useForm({
        email: 'fabio.rocha@email.com',
        password: '123456',
    });
    function login() {
        form.post('/login');
    }
</script>
<style lang="scss" scoped>

</style>
