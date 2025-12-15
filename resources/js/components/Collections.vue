<template>
    <section class="mb-8">
        <div class="container-grid">
            <h2 class="text-xl font-display font-bold mb-4 text-[#00E5FF]">
                Колекції
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div 
                    v-for="collection in collections" 
                    :key="collection.id"
                    class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 hover:border-[#7A1FFF]/50 transition-all cursor-pointer group overflow-hidden"
                >
                    <!-- Posters Grid -->
                    <div class="grid grid-cols-3 gap-0.5 p-0.5 bg-[#1A1A1A]/40">
                        <div 
                            v-for="(poster, index) in collection.posters" 
                            :key="index"
                            class="aspect-[2/3] overflow-hidden"
                        >
                            <img 
                                :src="poster" 
                                :alt="`Poster ${index + 1}`"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                    
                    <!-- Info -->
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-6 h-6 rounded-full bg-gradient-to-br from-[#FF2CCC] to-[#7A1FFF] flex items-center justify-center text-xs font-bold">
                                    {{ collection.author.charAt(0) }}
                                </div>
                                <span class="text-xs font-medium text-gray-300">{{ collection.author }}</span>
                                <span class="text-xs text-gray-500">{{ collection.time }}</span>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-[#00E5FF] transition-colors mb-1">
                            {{ collection.title }}
                        </h3>
                        <div class="flex items-center space-x-2 text-xs text-gray-500">
                            <span>{{ collection.items }} персонажів</span>
                            <span>•</span>
                            <span class="text-[#7A1FFF]">{{ collection.category }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const collections = ref([
    {
        id: 1,
        title: 'Месники',
        author: 'Snigh',
        time: 'близько 13 годин тому',
        items: 25,
        category: 'персонажі',
        posters: [
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
        ]
    },
    {
        id: 2,
        title: 'Fate і все, що з ним пов\'язане',
        author: 'A_Sarisez',
        time: 'близько 21 години тому',
        items: 35,
        category: 'fate',
        posters: [
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
        ]
    },
    {
        id: 3,
        title: 'Театр абсурду в аніме',
        author: 'Mizuno21',
        time: '6 днів тому',
        items: 48,
        category: 'anime',
        posters: [
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
            'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80'
        ]
    }
]);
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}
</style>

