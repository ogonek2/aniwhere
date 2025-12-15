<template>
    <section class="mb-8">
        <div class="container-grid">
            <h2 class="text-xl font-display font-bold mb-4 text-[#00E5FF]">
                Категорії
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div 
                    v-for="category in categories" 
                    :key="category.id"
                    class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 hover:border-[#7A1FFF]/50 transition-all duration-200 cursor-pointer group p-4"
                >
                    <div class="flex items-center space-x-3">
                        <div class="text-2xl">{{ category.icon }}</div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-white group-hover:text-[#00E5FF] transition-colors">
                                {{ category.name }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">{{ category.topics }} тем</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const categories = ref([
    {
        id: 1,
        name: 'Аніме',
        icon: '🎌',
        topics: 1245
    },
    {
        id: 2,
        name: 'Манга',
        icon: '📚',
        topics: 856
    },
    {
        id: 3,
        name: 'Новинки',
        icon: '✨',
        topics: 234
    },
    {
        id: 4,
        name: 'Обговорення',
        icon: '💬',
        topics: 567
    },
    {
        id: 5,
        name: 'Фан-арт',
        icon: '🎨',
        topics: 432
    },
    {
        id: 6,
        name: 'Косплей',
        icon: '📸',
        topics: 321
    }
]);
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}
</style>
