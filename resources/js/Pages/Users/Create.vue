<template>
    <AppHeader title="Users Create" />
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 p-3">Create user</h2>

        <form class="space-y-4 p-3" @submit.prevent="create">
            <div class="form-group mb-3">
                <label class="form-label block text-sm font-medium mb-1">Name</label>
                <input type="text" class="form-control w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name" v-model="user.name" />
                <span v-if="errors.name" class="text-danger" v-text="errors.name"></span>
            </div>

            <div class="form-group mb-3">
                <label class="form-label block text-sm font-medium mb-1">Email</label>
                <input type="text" class="form-control w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" v-model="user.email"/>
                <span v-if="errors.email" class="text-danger" v-text="errors.email"></span>
            </div>

            <div class="form-group mb-3">
                <label class="form-label block text-sm font-medium mb-1">Password</label>
                <input type="password" class="form-control w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your password" v-model="user.password" />
                <span v-if="errors.password" class="text-danger" v-text="errors.password"></span>
            </div>

            <button type="submit" class="btn btn-primary w-full py-2 px-4 rounded hover:bg-blue-700 transition" :disabled="creating">
                Register
            </button>
        </form>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3';

const user = reactive({
    name: '',
    email: '',
    password: ''
})

let creating = ref(false);

defineProps({
    errors: Object
});

function create() {
    router.post('/users', user, {
        onStart(){
            creating.value = true;
        },
        onFinish(){
            creating.value = false;
        }
    });
}
</script>

<style scoped>
</style>