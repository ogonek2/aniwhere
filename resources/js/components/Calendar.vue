<template>
    <section class="mb-8">
        <div class="container-grid">
            <h2 class="text-xl font-display font-bold mb-4 text-[#00E5FF]">
                Календар
            </h2>
            <div class="space-y-3">
                <div 
                    v-for="item in calendarItems" 
                    :key="item.id"
                    class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 hover:border-[#7A1FFF]/50 transition-all cursor-pointer group p-4"
                >
                    <div class="flex items-center space-x-4">
                        <!-- Poster -->
                        <div class="flex-shrink-0 w-16 h-24 rounded overflow-hidden border border-[#2A1A4A]/50">
                            <img 
                                :src="item.poster" 
                                :alt="item.title"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-white group-hover:text-[#00E5FF] transition-colors mb-1">
                                {{ item.title }}
                            </h3>
                            <div class="flex items-center space-x-3 text-xs text-gray-400">
                                <span>{{ item.episode }} епізод</span>
                                <span>•</span>
                                <span class="text-[#00E5FF] font-medium">{{ item.time }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const calendarItems = ref([
    {
        id: 1,
        title: '2200-й: Котяча країна — Японія',
        episode: '11 епізод',
        time: '9 год. 17 хв.',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
    },
    {
        id: 2,
        title: 'Ваша величносте, прошу, забудьте мене',
        episode: '11 епізод',
        time: '17 год. 13 хв.',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
    },
    {
        id: 3,
        title: 'Monster Strike: Deadverse Reloaded',
        episode: '9 епізод',
        time: '18 год. 17 хв.',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
    },
    {
        id: 4,
        title: 'Чітосе в пляшці рамуне',
        episode: '11 епізод',
        time: '18 год. 17 хв.',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
    }
]);
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}
</style>

