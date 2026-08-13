<template>
  <div>
    <h1>Users</h1>
    <ul>
        <li v-for="user in users" :key="user.id">
            {{ user.nome }}
        </li>
    </ul>
  </div>
</template>

<script setup>
    let props = defineProps({
        users:Array
    })

    console.log(props.users)
</script>

<style scoped>
</style>
