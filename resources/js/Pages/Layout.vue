<script setup>
import NavBar from '../Components/NavBar.vue';
</script>

<template>
    <main>
        <header>
            <NavBar />
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>