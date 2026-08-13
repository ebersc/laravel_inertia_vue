<!-- AppHead.vue -->

<script setup>
import { Head } from "@inertiajs/vue3";

defineProps({ title: String });
</script>

<template>
  <Head :title="title ? `${title} - My App` : 'My App'">
    <slot />
  </Head>
</template>