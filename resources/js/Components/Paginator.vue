<template>
    <ul class="pagination">
        <li class="page-item" v-for="link in data.links">
            <template v-if="link.url != null">
                <Link :href="link.url || '#'" v-html="link.label" class="page-link" :class="{'active':link.active}"/>
            </template>
        </li>
    </ul>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

    defineProps({
        data: Object
    })
</script>

<style lang="scss" scoped>

</style>