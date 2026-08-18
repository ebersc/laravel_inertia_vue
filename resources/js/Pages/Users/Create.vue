<template>
    <AppHeader title="Users Create" />
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 p-3">Create user</h2>

        <form class="space-y-4 p-3" @submit.prevent="create">
            <span v-if="form.isDirty">Unsaved changes</span>
            <div class="form-group mb-3">
                <label class="form-label block text-sm font-medium mb-1">Name</label>
                <input type="text" class="form-control w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name" v-model="form.name" />
                <span v-if="form.errors.name" class="text-danger" v-text="form.errors.name"></span>
            </div>

            <div class="form-group mb-3">
                <label class="form-label block text-sm font-medium mb-1">Email</label>
                <input type="text" class="form-control w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" v-model="form.email"/>
                <span v-if="form.errors.email" class="text-danger" v-text="form.errors.email"></span>
            </div>

            <div class="form-group mb-3">
                <label class="form-label block text-sm font-medium mb-1">Password</label>
                <input type="password" class="form-control w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your password" v-model="form.password" />
                <span v-if="form.errors.password" class="text-danger" v-text="form.errors.password"></span>
            </div>

            <button type="submit" class="btn btn-primary w-full py-2 px-4 rounded hover:bg-blue-700 transition" :disabled="form.processing || !form.isDirty">
                Register
            </button>
        </form>
    </div>
    <Link href="/users/create" class="btn btn-primary btn-lg">Refresh</Link>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: ''
});

function create() {
    form.post('/users', {
        onFinish: () => {
            setTimeout(() => {
                form.clearErrors();
            }, 3000);
            //form.reset(); //basta passar os campos como parametro
        },
        preserveScroll: true // Preserva o scroll da tela
    });
}
</script>

<style scoped>
</style>